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

	public function get_last_followup_details($student_ids='')
	{
		$response=array();
		if(is_array($student_ids) && !empty($student_ids))
		{
			foreach ($student_ids as $key => $value) {
				$response[$value]=$this->db->select('tbl_student_followups.*')
				->join('tbl_enquiries', 'tbl_student_followups.enq_id = tbl_enquiries.enq_id')
				->order_by('tbl_student_followups.followup_id',"desc")->limit(1)
		        ->get_where('tbl_student_followups',array('tbl_enquiries.student_id'=> $value))->result();
	    	}
	    	return $response;
		}
	}

}