<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Del {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Auth/Auth_model','Auth');
		if (!$this->session->User_Type_Id || $this->session->User_Type_Id!=1 ) {
			redirect(base_url());	
		}
	}

	public function summary()
	{
		$data['section']='student';
		$data['page']='student_summary';
		$data['student_list']=$this->student_profile->get_student_list();
		$view = 'admin/student/student_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add()
	{
		$data['section']='student';
		$data['page']='Add student';
		$data['agent_list']=$this->users->select('user_id,user_name')->get_many_by(array('userlevel_id'=>4,'is_active'=>'true'));
		$data['source_list']=$this->ref_source->select('source_id,source_name')->get_many_by('is_active','true');
		$data['lead_types']=$this->ref_lead_types->select('lead_type_id,lead_type')->get_many_by('is_active','true');
		$data['county_list']=$this->ref_country->get_all();
		$data['ug_degree_list']=$this->ref_degree->select('degree_id,degree_name')->get_many_by('is_active','true');
		$data['program_list']=$this->ref_program->select('program_id,program_name')->get_many_by('is_active','true');
		
		$view = 'admin/student/add_student_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function create()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$this->form_validation->set_rules('agent_id', 'Agent', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email|callback_isExist_email' );
		$this->form_validation->set_rules('phonenumber', 'Phone Number', 'min_length[10]|callback_isExist_phone' );
		//$this->form_validation->set_rules('resident_state_id', 'Residing State', 'trim|required');
		$this->form_validation->set_rules('interested_program_id', 'Interested Program', 'trim|required');
		if($this->form_validation->run($this) !== FALSE){
			$posted_data['signup_date']=date('Y-m-d H:i:s');
			$posted_data['added_by'] =$this->session->User_Id;
			$posted_data['userlevel_id'] =3;
			$posted_data['last_updated'] =date('Y-m-d H:i:s');
			$posted_data['is_active']='true';
			
			//step-1 - creating student profile
			//step 2- inserting necessary details in student enquiry

			//step1- add it to tbl_user
		 	$user_proile = elements(array('email_id','first_name','last_name','phonenumber','signup_date','added_by','userlevel_id','last_updated','is_active'), $posted_data);


		 	try {

	 			$this->users->insert($user_proile);
		 		$posted_data['user_id']=$this->db->insert_id();

		 	}catch(Exception $e) {
		 		$this->mprint('Message: ' .$e->getMessage());
		 	}
		 	//end of adding user_details

		 	if(strlen(trim($posted_data['user_id'])))
		 	{
			 	//adding student details
			 	$strudent_proile = elements(array('user_id','resident_state_id','resident_city_id','resident_country_id','intro','total_experience'), $posted_data);//,''
			 	$this->student_profile->insert($strudent_proile);
			 	$posted_data['student_id']=$this->db->insert_id();


			 	//adding exams data
			 	$exams_data=array();
			 	if($posted_data['gmat']==1)
			 	{
			 		$row['exam_type_id']=1;
			 		$row['score']=$posted_data['gmat_score'];
			 		$row['tentative_date']=$posted_data['gmat_tentative_date'];
			 		$row['student_id']=$posted_data['student_id'];
			 		$exams_data[]=$row;
			 	}
			 	if($posted_data['gre']==1)
			 	{
			 		$row['exam_type_id']=2;
			 		$row['score']=$posted_data['gre_score'];
			 		$row['tentative_date']=$posted_data['gre_tentative_date'];
			 		$row['student_id']=$posted_data['student_id'];
			 		$exams_data[]=$row;
			 	}
			 	if(!empty($exams_data))
			 	{
			 		$this->student_to_exams->insert_many($exams_data);
			 	}


			 	//adding student enquiries
			 	$student_enquries = elements(array('student_id','enq_date','source_id','agent_id','interested_program_id','lead_type_id','is_active'), $posted_data);
			 	$this->enquries->insert($student_enquries);
			 	$posted_data['enq_id']=$this->db->insert_id();

			 	$this->session->set_flashdata('success',  'Student added Successfully');
			 	redirect('admin/student/summary');

			}else{
				$this->mprint('there was error in adding the form');
			}

		}else{
			$this->session->set_flashdata('error',  validation_errors('<p class="alert alert-danger">', '</p>'));
			$this->session->set_flashdata('setData', $posted_data);
            redirect('admin/student/add');
		}
	}

	public function update()
	{
		$posted_data=$this->security->xss_clean($this->input->post());

		/*update personal data*/
		if(isset($posted_data['gender_id']) && strlen(trim($posted_data['gender_id'])))
		{
			$personal_details = elements(array('gender_id','user_id'), $posted_data);
			$this->users->update($personal_details['user_id'], array( 'gender_id' => $personal_details['gender_id'] ));
		}
		/*end update personal data */

		/*updatting type of lead*/
		if(isset($posted_data['lead_type_id']) && strlen(trim($posted_data['lead_type_id'])))
		{
			$enquiry_details = elements(array('lead_type_id'), $posted_data);
			$this->enquries->update_by(array('student_id'=>$posted_data['student_id']),$enquiry_details);
		}
		/*end of updating type of lead*/


		//preparation about ug degree - approach delete insert

		$delete_id = $this->student_to_degrees->delete_by('student_id',$posted_data['student_id']);
		/*update UG data - -tbl_student_to_degrees*/
		if($posted_data['UG_degree_name']!="0" && $posted_data['UG_college_id']!="0" && $posted_data['UG_passing_year']!="0" && strlen(trim($posted_data['UG_gpa_marks'])))
		{
			$student_degrees = array(
				"student_id"=>$posted_data['student_id'],
				"degree_id"=>$posted_data['UG_degree_name'],
				"college_id"=>$posted_data['UG_college_id'],
				"passing_year"=>$posted_data['UG_passing_year'],
				"gpa_marks"=>$posted_data['UG_gpa_marks']);
			$update_id = $this->student_to_degrees->insert($student_degrees);
		}
		/*end UG data*/

		/*update PG data -tbl_student_to_degrees*/
		if($posted_data['PG_degree_name']!="0" && $posted_data['PG_college']!="0" && $posted_data['PG_passing_year']!="0" && strlen(trim($posted_data['PG_gpa_marks'])))
		{
			$student_degrees = array(
				"student_id"=>$posted_data['student_id'],
				"degree_id"=>$posted_data['PG_degree_name'],
				"college_id"=>$posted_data['PG_college'],
				"passing_year"=>$posted_data['PG_passing_year'],
				"gpa_marks"=>$posted_data['PG_gpa_marks']);
			$update_id = $this->student_to_degrees->insert($student_degrees);
		}
		/*end PG data*/

		/*update student profile data- tbl_student_profiles*/
		if(strlen(trim($posted_data['professional_qualification'])) && strlen(trim($posted_data['total_experience'])))
		{
			$student_profile_details = elements(array('professional_qualification','total_experience'), $posted_data);
			$this->student_profile->update($posted_data['student_id'], $student_profile_details);
		}
		/*end of student profile*/

		/*update professional history- tbl_student_professional_history*/
		$professional_history=array();
		$delete_id = $this->student_professional_history->delete_by('student_id',$posted_data['student_id']);
		if(trim($posted_data['c_employer_id'])!="0")
		{
			$row['student_id']=$posted_data['student_id'];
			$row['employer_id']=$posted_data['c_employer_id'];
			$row['is_current']="true";
			array_push($professional_history, $row);
		}
		if(trim($posted_data['p1_employer_id'])!="0")
		{
			$row['student_id']=$posted_data['student_id'];
			$row['employer_id']=$posted_data['p1_employer_id'];
			$row['is_current']="false";
			array_push($professional_history, $row);
		}
		if(trim($posted_data['p2_employer_id'])!="0")
		{
			$row['student_id']=$posted_data['student_id'];
			$row['employer_id']=$posted_data['p2_employer_id'];
			$row['is_current']="false";
			array_push($professional_history, $row);
		}
		if(!empty($professional_history))
		{
			$this->student_professional_history->insert_many($professional_history,FALSE);
		}
		//end of student profile*/

		//gmat insert*/
    	if($posted_data['gmat']=="1")
    	{
    		$gmat_array['exam_type_id']=1;
    		$gmat_array['score']=$posted_data['gmat_score'];
    		$gmat_array['tentative_date']=$posted_data['gmat_tentative_date'];
    		$gmat_array['student_id']=$posted_data['student_id'];
    		$row=$this->student_to_exams->get_by(array('student_id'=>$posted_data['student_id'],"exam_type_id"=>1));
    		if(!empty($row))
    		{
    			$this->student_to_exams->update_by(array('student_id'=>$posted_data['student_id'],"exam_type_id"=>1),$gmat_array);
    		}else{
    			$this->student_to_exams->Insert($gmat_array);
    		}
    	}
		//end of gmat*/

		//gre insert
		if($posted_data['gre']=="1")
    	{
    		$gmat_array['exam_type_id']=2;
    		$gmat_array['score']=$posted_data['gre_score'];
    		$gmat_array['tentative_date']=$posted_data['gre_tentative_date'];
    		$gmat_array['student_id']=$posted_data['student_id'];
    		$row=$this->student_to_exams->get_by(array('student_id'=>$posted_data['student_id'],"exam_type_id"=>2));
    		if(!empty($row))
    		{
    			$this->student_to_exams->update_by(array('student_id'=>$posted_data['student_id'],"exam_type_id"=>2),$gmat_array);
    		}else{
    			$this->student_to_exams->Insert($gmat_array);
    		}
    	}
		//end of gre insert

		//package update data
    	$this->lnk_student_to_packages->delete_by('student_id',$posted_data['student_id']);
		for ($i=0; $i < count($posted_data['signup_date']) ; $i++) { 
			$ar['package_id']=$posted_data['package_id'][$i];
			$ar['signup_date']=$posted_data['signup_date'][$i];
			$ar['consultant_id']=$posted_data['consultant_id'][$i];
			$ar['student_id']=$posted_data['student_id'];

			if($ar['consultant_id']!=0 && $ar['package_id']!=0)
			{//check if packages are entered correctly or not
				$row=$this->lnk_student_to_packages->get_by(array('student_id'=>$posted_data['student_id'],"package_id"=>$ar['package_id']));
				if(!empty($row))
				{
					$this->lnk_student_to_packages->update_by(array('student_id'=>$posted_data['student_id'],"package_id"=>$ar['package_id']),$ar);
				}else{
					$this->lnk_student_to_packages->insert($ar);
				}
			}
		}
	}

	public function updateCollege()
	{
		
		$posted_data=$this->security->xss_clean($this->input->post());
		$this->lnk_student_to_applied_colleges->delete_by('student_id',$posted_data['student_id']);
		for ($i=0; $i < count($posted_data['college_id']) ; $i++) { 
			$ar['student_id']=$posted_data['student_id'];
			$ar['college_id']=$posted_data['college_id'][$i];
			$ar['intake_year']=$posted_data['intake_year'][$i];
			$ar['round_id']=$posted_data['round_id'][$i];
			$ar['app_status_id']=$posted_data['app_status_id'][$i];
			$ar['intv_status_id']=$posted_data['intv_status_id'][$i];
			$ar['applied_program_id']=$posted_data['applied_program_id'][$i];
			$ar['admit_status_id']=$posted_data['admit_status_id'][$i];
			$ar['taken_our_assistance']= (($posted_data['taken_our_assistance'][$i]=="1")? "true" : "false");
			if(isset($posted_data['is_scholarship_awarded'][$i]))
			{
				$ar['is_scholarship_awarded']=$posted_data['is_scholarship_awarded'][$i];
			}else{
				$ar['is_scholarship_awarded']="false";
			}
			if(isset($posted_data['scholarship_amount'][$i]))
			{
				$ar['scholarship_amount']=$posted_data['scholarship_amount'][$i];
			}
			$row=$this->lnk_student_to_applied_colleges->get_by(array('student_id'=>$posted_data['student_id'],"college_id"=>$ar['college_id']));
			if(!empty($row))
			{
				$this->lnk_student_to_applied_colleges->update_by(array('student_id'=>$posted_data['student_id'],"college_id"=>$ar['college_id']),$ar);
			}else{
				$this->lnk_student_to_applied_colleges->insert($ar);
			}
		}
	}

	public function manage_student($student_id='')
	{
		if($student_id)
		{
			$data['section']='student';
			$data['enquiery_data']=$student_data=$this->enquries->get_student_enquiries($student_id);
			$data['gender_list']=$this->ref_gender->select('gender_id,gender')->get_all();
			$data['package_list']=$this->ref_packages->get_many_by('is_active','true');
			$data['consultant_list']=$this->users->get_consultants();

			$data['UG_degree_list']=$this->ref_degree->get_many_by(array('degree_type_id'=>1,'is_active'=>'true'));
			$data['PG_degree_list']=$this->ref_degree->get_many_by(array('degree_type_id'=>2,'is_active'=>'true'));

			$data['colleges_list']=$this->ref_college->select('college_id,college_name,college_type_id')->get_many_by('is_active',"true");

			$data['apply_college_list']=$this->ref_college->apply_college_list();
			$data['appround_list']=$this->ref_approunds->select('round_id,round_name')->get_many_by('is_active',"true");
			$data['app_status_list']=$this->ref_application_status->select('app_status_id,app_status')->get_many_by('is_active',"true");
			$data['interview_status_list']=$this->ref_interview_status->select('intv_status_id,intv_status')->get_many_by('is_active',"true");
			$data['program_list']=$this->ref_program->select('program_id,program_name')->get_many_by('is_active','true');
			$data['admit_status_list']=$this->ref_admit_status->select('admit_status_id,admit_status')->get_many_by('is_active','true');
			$data['employer_list']=$this->ref_employer->select('employer_id,employer_name')->get_many_by('is_active','true');
			$data['followup_data']=$this->student_followup->get_student_followups($student_id);
			$data['lead_types']=$this->ref_lead_types->select('lead_type_id,lead_type')->get_many_by('is_active','true');
			$data['university_list']=$this->ref_universities->select('university_id,university_name')->get_many_by('is_active','true');

			
			if(!empty($student_data)) //if enquiry data is avialable
			{
				$student_data=$student_data[0];
				$data['personal_details']=$this->users->get_personal_info($student_data->student_id);
				$data['professional_details']=$this->student_profile->get_professional_detail($student_data->student_id);
				//$data['college_details']=$this->student_to_degrees->get_many_by('student_id',$student_data->student_id);
				$data['education_details']=$this->student_to_degrees->get_education_detail($student_data->student_id);
				$data['companies_history']=$this->student_professional_history->get_companies_history($student_data->student_id);
				$data['exam_taken_details']=$this->student_to_exams->get_many_by('student_id',$student_data->student_id);
				$data['student_packages']=$this->lnk_student_to_packages->get_many_by('student_id',$student_data->student_id);
				$data['applied_student_colleges']=$this->lnk_student_to_applied_colleges->get_many_by('student_id',$student_data->student_id);
			}
			$data['page']='student_details';
			$view = 'admin/student/edit_student_view';
			echo Modules::run('template/admin_template', $view, $data);	
		}
	}

	public function followup_list(){
		$data['page']='Follow Up Updates';
		$view = 'admin/followup_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}


	public function updateStudentInfo(){
		$this->mprint($_POST);
	}

	public function get_student_info(){
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['level'])&& isset($posted_data['student_id']) && ($posted_data['is_secure_request']=='uKrt)12'))
		{
			switch ($posted_data['level']) {
				case 'Personal':
					$data['student_info']=$this->users->get_personal_info($posted_data['student_id']);
					$view = 'admin/ajax/student/ajax_student_personal_view';
					break;
				case 'Professional':
					$data['professional_details']=$this->student_profile->get_professional_detail($posted_data['student_id']);
					$data['education_details']=$this->student_to_degrees->get_education_detail($posted_data['student_id']);
					$data['companies_history']=$this->student_professional_history->get_companies_history($posted_data['student_id']);
					$view = 'admin/ajax/student/ajax_student_professional_view1';
					break;
				case 'Application':
					$data['exam_taken_details']=$this->student_to_exams->get_many_by('student_id',$posted_data['student_id']);
					$data['student_packages']=$this->lnk_student_to_packages->get_student_packages($posted_data['student_id']);
					$view = 'admin/ajax/student/ajax_student_application_view';
					break;	
				default:
					$data['student_info']=$this->users->get_personal_info($posted_data['student_id']);
					$view = 'admin/ajax/student/ajax_student_personal_view';
					break;
			}
			$this->load->view($view,$data);
		}
	}

	public function isExist_email($email_id)
    {//write logic
        $data=$this->Auth->isExist('email_id',$email_id);
        if (!empty($data))
        {
            $this->form_validation->set_message('isExist_email', $email_id.' is not available');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function isExist_phone($phonenumber)
    {//write logic
        $data=$this->Auth->isExist('phonenumber',$phonenumber);
        if (!empty($data))
        {
            $this->form_validation->set_message('isExist_phone', $phonenumber.' is already used');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }



	public function edit()
	{
		$data['section']='student';
		$data['page']='Edit student Details';
		$view = 'admin/student/edit_student_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}




}