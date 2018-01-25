<?php
class Lnk_student_to_packages_model extends MY_Model{
	public $_table = 'lnk_student_to_packages';
	public $primary_key = 'stp_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_packages($student_id='')
	{
		if($student_id){
			return $this->db->select('ref_packages.package_name,tbl_users.first_name as fname,tbl_users.last_name lname, lnk_student_to_packages.signup_date,lnk_student_to_packages.consultant_id')
			->join('ref_packages','lnk_student_to_packages.package_id = ref_packages.package_id')
			->join('tbl_users','lnk_student_to_packages.consultant_id = tbl_users.user_id')
			->get_where('lnk_student_to_packages',array('lnk_student_to_packages.student_id'=>$student_id))->result();
		}
	}
}