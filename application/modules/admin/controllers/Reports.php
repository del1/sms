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