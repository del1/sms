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
		$data['page']='Lead';
		$data['lead_types']=$this->ref_lead_types->select('lead_type_id,lead_type')->get_many_by('is_active','true');
		$data['source_list']=$this->ref_source->select('source_id,source_name')->get_many_by('is_active','true');
		$data['program_list']=$this->ref_program->select('program_id,program_name')->get_many_by('is_active','true');
		$data['college_list']=$this->ref_college->get_collegesOfType(1);
		$data['city_list']=$this->ref_city->get_country_cities(101);
		$view = 'admin/reports/lead_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function student()
	{
		$data['page']='student';
		$view = 'admin/reports/student_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function success()
	{
		$data['page']='success';
		$view = 'admin/reports/success_report_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}
}