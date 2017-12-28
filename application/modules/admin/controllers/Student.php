<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Del {

	public function __construct() 
	{
		parent::__construct();
		if (!$this->session->User_Type_Id || $this->session->User_Type_Id!=1 ) {
			redirect(base_url());	
		}
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
		$data['agent_list']=$this->users->select('user_id,user_name')->get_many_by(array('userlevel_id'=>4,'is_active'=>'true'));
		$data['source_list']=$this->ref_source->select('source_id,source_name')->get_many_by('is_active','true');
		$data['lead_types']=$this->ref_lead_types->select('lead_type_id,lead_type')->get_many_by('is_active','true');
		$data['county_list']=$this->ref_county->get_all();
		$data['ug_degree_list']=$this->ref_degree->select('degree_id,degree_name')->get_many_by('is_active','true');
		$data['program_list']=$this->ref_program->select('program_id,program_name')->get_many_by('is_active','true');
		
		$view = 'admin/student/add_student_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function create()
	{
		$this->mprint($_POST);
	}

	public function edit()
	{
		$data['section']='student';
		$data['page']='Edit student Details';
		$view = 'admin/student/edit_student_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

}