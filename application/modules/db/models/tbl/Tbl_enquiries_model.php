<?php
class Tbl_enquiries_model extends MY_Model
{
	public $_table = 'tbl_enquiries';
	public $primary_key = 'enq_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_enquiries($student_id='')
	{
		if($student_id){

            $this->db->select('tbl_enquiries.enq_id,tbl_enquiries.enq_date,tbl_enquiries.is_converted, tbl_enquiries.student_id,tbl_enquiries.lead_type_id,tbl_student_profiles.user_id as student_user_id,tbl_users.user_id as agent_id, tbl_users.first_name as agent_fname,tbl_users.last_name as agent_lname, ref_sources.source_name,ref_sources.source_id,ref_programs.program_name');
            $this->db->join('tbl_users', 'tbl_enquiries.agent_id = tbl_users.user_id');
         	$this->db->join('tbl_student_profiles', 'tbl_enquiries.student_id = tbl_student_profiles.student_id');
         	$this->db->join('ref_programs', 'tbl_enquiries.interested_program_id = ref_programs.program_id');
            $this->db->join('ref_sources', 'tbl_enquiries.source_id = ref_sources.source_id');
            return $this->db->get_where('tbl_enquiries',array('tbl_enquiries.student_id'=> $student_id))->result();
		}
	}

	public function get_enquires_between_dates($enquiry_dates='')
	{
		if((is_array($enquiry_dates) && !empty($enquiry_dates))&& (isset($enquiry_dates['from_enquiry_date']) && isset($enquiry_dates['to_enquiry_date'])))
		{
        	return $this->db->select('tbl_enquiries.student_id')
			->get_where('tbl_enquiries',array("enq_date <=" => $enquiry_dates['to_enquiry_date'],"enq_date >="=>$enquiry_dates['from_enquiry_date']))->result();
		}
	}
}