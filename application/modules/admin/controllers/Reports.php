<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Del {

	public function __construct() 
	{
		parent::__construct();
		if (!$this->session->User_Type_Id || $this->session->User_Type_Id!=1 ) {
			redirect(base_url());	
		}
	}

	public function lead()
	{
		$data['page']='lead_report';
		$data['section']='report';
		$data['lead_types']=$this->ref_lead_types->select('lead_type_id,lead_type')->get_many_by('is_active','true');
		$data['source_list']=$this->ref_source->select('source_id,source_name')->get_many_by('is_active','true');
		$data['program_list']=$this->ref_program->select('program_id,program_name')->get_many_by('is_active','true');
		$data['enq_status']=$this->ref_enq_status->select('enq_status_id,enq_status')->get_many_by('is_active','true');
		$data['college_list']=$this->ref_college->get_collegesOfType(1);
		$data['city_list']=$this->ref_city->get_country_cities(101);
		$view = 'admin/reports/lead_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}
	public function test()
	{
		$intersect=array();
		$one=array(1);
		array_push($intersect,$one);
		$intersect=array_filter($intersect);
		$this->mprint($intersect);
	}

	public function genrate_lead_report()
	{
		//taking all the critereas and taking intersections of all the report
		$posted_data=$this->security->xss_clean($this->input->post());
		$intersect=array();
		$report_sample=array();
		//enquiry dates filter
		if(isset($posted_data['from_enquiry_date']) && strlen(trim($posted_data['from_enquiry_date'])))
		{
			$query=array();
			$query['enq_date <=']=$posted_data['to_enquiry_date'];
			$query['enq_date >=']=$posted_data['from_enquiry_date'];
			$enq_date_student_ids=$this->enquries->select('student_id')->get_many_by($query);
			if (!empty($enq_date_student_ids)) {
				foreach ($enq_date_student_ids as $key => $value) {
					$enq_date_stu_id_array[]=$value->student_id;
				}
				$report_sample['enquery_date_filter']=$enq_date_stu_id_array;
				array_push($intersect, $enq_date_stu_id_array);
			}
		}

		//type of lead filter
		if(isset($posted_data['lead_type']) && strlen(trim($posted_data['lead_type'])))
		{
			$lead_type_student_ids=$this->enquries->select('student_id')->get_many_by('lead_type_id',$posted_data['lead_type']);
			if (!empty($lead_type_student_ids)) {
				foreach ($lead_type_student_ids as $key => $value) {
					$lead_type_stu_id_array[]=$value->student_id;
				}
				$report_sample['lead_type_filter']=$lead_type_stu_id_array;
				array_push($intersect, $lead_type_stu_id_array);
			}
		}

		//source filter
		if(isset($posted_data['source']) && !empty($posted_data['lead_type']))
		{
			$input['type']='source_id';
			$input['src']=$posted_data['source'];
			$input['table']='tbl_enquiries';
			$source_student_ids=$this->genral->get_enquires_by_where_in($input);
			if (!empty($source_student_ids)) {
				foreach ($source_student_ids as $key => $value) {
					$source_stu_id_array[]=$value->student_id;
				}
				$report_sample['source_filter']=$source_stu_id_array;
				array_push($intersect, $source_stu_id_array);
			}
		}

		//Interested Program
		if(isset($posted_data['interested_program']) && !empty($posted_data['interested_program']))
		{
			$input['type']='interested_program_id';
			$input['src']=$posted_data['interested_program'];
			$input['table']='tbl_enquiries';
			$interested_pg_student_ids=$this->genral->get_enquires_by_where_in($input);
			if (!empty($interested_pg_student_ids)) {
				foreach ($interested_pg_student_ids as $key => $value) {
					$interested_pg_stu_id_array[]=$value->student_id;
				}
				$report_sample['ip_filter']=$interested_pg_stu_id_array;
				array_push($intersect, $interested_pg_stu_id_array);
			}
		}

		if(isset($posted_data['status']) && !empty($posted_data['status']))
		{
			$input['type']='enq_status_id';
			$input['table']='tbl_enquiries';
			$input['src']=$posted_data['status'];
			$enq_status_student_ids=$this->genral->get_enquires_by_where_in($input);
			if (!empty($enq_status_student_ids)) {
				foreach ($enq_status_student_ids as $key => $value) {
					$enq_status_stu_id_array[]=$value->student_id;
				}
				$report_sample['status_filter']=$enq_status_stu_id_array;
				array_push($intersect, $enq_status_stu_id_array);
			}
		}

		//undergraduate college
		if(isset($posted_data['ug_college']) && !empty($posted_data['ug_college']))
		{
			$input['type']='college_id';
			$input['table']='tbl_student_to_degrees';
			$input['src']=$posted_data['ug_college'];
			$ug_college_student_ids=$this->genral->get_enquires_by_where_in($input);
			if (!empty($ug_college_student_ids)) {
				foreach ($ug_college_student_ids as $key => $value) {
					$ug_college_stu_id_array[]=$value->student_id;
				}
				$report_sample['ugc_filter']=$ug_college_stu_id_array;
				array_push($intersect, $ug_college_stu_id_array);
			}
		}

		//Residing City
		if(isset($posted_data['ug_college']) && !empty($posted_data['ug_college']))
		{
			$input['type']='resident_city_id';
			$input['table']='tbl_student_profiles';
			$input['src']=$posted_data['res_city'];
			$city_student_ids=$this->genral->get_enquires_by_where_in($input);
			if (!empty($city_student_ids)) {
				foreach ($city_student_ids as $key => $value) {
					$city_stu_id_array[]=$value->student_id;
				}
				$report_sample['city_filter']=$city_stu_id_array;
				array_push($intersect, $city_stu_id_array);
			}
		}

		//Tentative GMAT date
		if(isset($posted_data['gmat_tentative_from_date']) && strlen(trim($posted_data['gmat_tentative_from_date'])))
		{
			$query['tentative_date <=']=$posted_data['gmat_tentative_to_date'];
			$query['tentative_date >=']=$posted_data['gmat_tentative_from_date'];
			$query['exam_type_id']=1;
			$gmat_student_ids=$this->student_to_exams->select('student_id')->get_many_by($query);
			if (!empty($gmat_student_ids)) {
				foreach ($gmat_student_ids as $key => $value) {
					$gmat_stu_id_array[]=$value->student_id;
				}
				$report_sample['gmat_filter']=$gmat_stu_id_array;
				array_push($intersect, $gmat_stu_id_array);
			}
		}

		//Tentative GRE date
		if(isset($posted_data['gre_tentative_from_date']) && strlen(trim($posted_data['gre_tentative_from_date'])))
		{
			$query['tentative_date <=']=$posted_data['gre_tentative_to_date'];
			$query['tentative_date >=']=$posted_data['gre_tentative_from_date'];
			$query['exam_type_id']=2;
			$gre_student_ids=$this->student_to_exams->select('student_id')->get_many_by($query);
			if (!empty($gre_student_ids)) {
				foreach ($gre_student_ids as $key => $value) {
					$gre_stu_id_array[]=$value->student_id;
				}
				$report_sample['gre_filter']=$gre_stu_id_array;
				array_push($intersect, $gre_stu_id_array);
			}
		}

		//Work Experience Range (in years)
		if(isset($posted_data['from_exp_range_date']) && strlen(trim($posted_data['from_exp_range_date'])))
		{
			$query=array();
			$query['total_experience <=']=$posted_data['to_exp_range_date'];
			$query['total_experience >=']=$posted_data['from_exp_range_date'];
			$exp_student_ids=$this->student_profile->select('student_id')->get_many_by($query);
			if (!empty($exp_student_ids)) {
				foreach ($exp_student_ids as $key => $value) {
					$exp_stu_id_array[]=$value->student_id;
					$report_sample['exp_filter']=$exp_stu_id_array;
				}
				array_push($intersect, $exp_stu_id_array);
			}
		}
		$intersect=array_filter($intersect);
		if(count($intersect) > 1)
		{
			$final_stu_list=call_user_func_array('array_intersect', $intersect);
		}else{
			$final_stu_list=$intersect[array_keys($intersect)[0]];
		}
		//final_stu_list-> final list of 
		$data['student_details']=$this->student_profile->get_lead_report_data($final_stu_list);
		$data['last_followup']=$this->student_followup->get_last_followup_details($final_stu_list);
		$view = 'admin/ajax/reports/ajax_lead_report_table_view';
		//print_r($data);
		$this->load->view($view,$data);
	}

	public function student()
	{
		$data['page']='student_report';
		$data['section']='report';
		$data['packages_list']=$this->ref_packages->get_packages();
		$data['degree_list']=$this->ref_degree->select('degree_id,degree_name,degree_type_id')->get_many_by('is_active','true');
		$data['colleges_list']=$this->ref_college->select('college_id,college_name,college_type_id')->get_many_by('is_active',"true");
		$data['employer_list']=$this->ref_employer->select('employer_id,employer_name')->get_many_by('is_active','true');
		$data['appround_list']=$this->ref_approunds->select('round_id,round_name')->get_many_by('is_active',"true");
		$data['apply_college_list']=$this->ref_college->apply_college_list();
		$data['app_status_list']=$this->ref_application_status->select('app_status_id,app_status')->get_many_by('is_active',"true");
		$data['program_list']=$this->ref_program->select('program_id,program_name')->get_many_by('is_active','true');
		$data['states_list']=$this->ref_states->select('state_id,state_name')->get_many_by('country_id',101);
		$view = 'admin/reports/student_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function genrate_student_report()
	{
		print_r($_POST);
	}

	public function success()
	{
		$data['page']='success_report';
		$data['section']='report';
		$view = 'admin/reports/success_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function genrate_success_report()
	{
		print_r($_POST);
	}
}