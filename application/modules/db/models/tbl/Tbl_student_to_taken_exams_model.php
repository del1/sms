<?php
class Tbl_student_to_taken_exams_model extends MY_Model
{
	public $_table = 'tbl_student_to_taken_exams';
	public $primary_key = 'et_id';
	public function __construct()
	{
		parent::__construct();
	}


	public function get_students_by_tt_date($enquiry_dates='')
	{

		if((is_array($enquiry_dates) && !empty($enquiry_dates))&& (isset($enquiry_dates['tt_from_date']) && isset($enquiry_dates['tt_to_date'])))
		{
        	return $this->db->select('student_id')
			->get_where('tbl_student_to_taken_exams',array("tentative_date <=" => $enquiry_dates['tt_to_date'],"tentative_date >="=>$enquiry_dates['tt_from_date'],"exam_type_id"=>$enquiry_dates['exam_type_id']))->result();
		}
	}

}