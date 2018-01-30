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
		$data['college_list']=$this->ref_college->get_collegesOfType(1);
		$data['city_list']=$this->ref_city->get_country_cities(101);
		$view = 'admin/reports/lead_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function genrate_lead_report()
	{
		print_r($_POST);
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
		$data['states_list']=$this->ref_states->select('state_id,state_name')->get_many_by('country_id',101);
		$view = 'admin/reports/student_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function success()
	{
		$data['page']='success_report';
		$data['section']='report';
		$view = 'admin/reports/success_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}
}