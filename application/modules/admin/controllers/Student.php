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
		$data['page']='student summary';
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
		$this->form_validation->set_rules('agent_id', 'Agent', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email|callback_isExist_email' );
		$this->form_validation->set_rules('phonenumber', 'Phone Number', 'min_length[10]|callback_isExist_phone' );
		//$this->form_validation->set_rules('resident_state_id', 'Residing State', 'trim|required');
		$this->form_validation->set_rules('interested_program_id', 'Interested Program', 'trim|required');
		if($this->form_validation->run($this) !== FALSE){
			$posted_data=$this->security->xss_clean($this->input->post());
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

	public function manage_student($student_id='')
	{
		if($student_id)
		{
			$data['section']='student';
			//$data
			$data['enquiery_data']=$this->enquries->get_student_enquiries($student_id);
			$this->mprint($data);
			$data['page']='Edit student Details';
			$view = 'admin/student/edit_student_view';
			echo Modules::run('template/admin_template', $view, $data);	
		}
	}

	public function updateStudentInfo(){
		$this->mprint($_POST);
	}

	public function get_student_info(){
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['level'])&& isset($posted_data['user_id']) && ($posted_data['is_secure_request']=='uKrt)12'))
		{
			switch ($posted_data['level']) {
				case 'Personal':
					$data['student_info']=$this->users->get_personal_info($posted_data['user_id']);
					$view = 'admin/ajax/student/ajax_student_personal_view';
					break;
				case 'Professional':
					//$data['student_profile']=$this->student_profile->get_professional_detail();
					/*$data['student_info']=$this->users->select('user_id,first_name,last_name,email_id,signup_date,phonenumber,last_updated')->get($posted_data['user_id']);
					$view = 'admin/ajax/student/ajax_student_professional_view';*/
					break;
				case 'Application':
					# code...
					break;	
				
				default:
					# code...
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