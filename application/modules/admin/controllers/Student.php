<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Del {

	public function __construct() 
	{
		parent::__construct();
		/*if (!$this->session->User_Type_Id || $this->session->User_Type_Id!=1 ) {
			redirect(base_url());	
		}	*/
	}

	public function summary()
	{
		$data['section']='student';
		$data['page']='student summary';
		$view = 'admin/student/student_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add()
	{
		$data['section']='student';
		$data['page']='Add student';
		$view = 'admin/student/add_student_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function edit()
	{
		$data['section']='student';
		$data['page']='Edit student Details';
		$view = 'admin/student/edit_student_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

}