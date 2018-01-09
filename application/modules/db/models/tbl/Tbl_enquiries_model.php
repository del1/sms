<?php
class Tbl_enquiries_model extends MY_Model
{
	public $_table = 'tbl_enquiries';
	public $primary_key = 'enq_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_enquiries($stundet_id='')
	{
		if($student_id){
			$this->db->select('tbl_enquiries.enq_id,tbl_enquiries.enq_date,tbl_enquiries.is_converted, tbl_enquiries.student_id, tbl_users.user_id,tbl_users.user_id, tbl_users.first_name, tbl_users.last_name, tbl_users.email_id, tbl_users.phonenumber');
            $this->db->from('tbl_users');
            $this->db->join('tbl_student_profiles', 'tbl_users.user_id = tbl_student_profiles.user_id');
            $this->db->join('tbl_enquiries', 'tbl_student_profiles.student_id = tbl_enquiries.student_id');
            $this->db->where('tbl_users.userlevel_id', 3);
            return $this->db->get()->result();
		}
	}
}