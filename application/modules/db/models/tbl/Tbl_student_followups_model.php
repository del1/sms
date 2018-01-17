<?php
class Tbl_student_followups_model extends MY_Model
{
	public $_table = 'tbl_student_followups';
	public $primary_key = 'followup_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_followups($student_id="")
	{
		if($student_id)
		{
			return $this->db->select('tbl_student_followups.*,tbl_users.first_name, tbl_users.last_name')
			->join('tbl_enquiries', 'tbl_student_followups.enq_id = tbl_enquiries.enq_id')
			->join('tbl_users', 'tbl_student_followups.agent_id = tbl_users.user_id')
	        ->get_where('tbl_student_followups',array('tbl_enquiries.student_id'=> $student_id))->result();
	    }
	}

}