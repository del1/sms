<?php
class Tbl_student_to_degrees_model extends MY_Model
{
	public $_table = 'tbl_student_to_degrees';
	public $primary_key = 'sd_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_education_detail($student_id="")
	{
		if($student_id)
		{
			return $this->db->select('tbl_student_to_degrees.*,ref_degrees.degree_name, ref_degrees.degree_type_id,ref_colleges.college_name,ref_colleges.college_type_id,ref_programs.program_name')
        	->join('ref_degrees','tbl_student_to_degrees.degree_id = ref_degrees.degree_id')
        	->join('ref_colleges','tbl_student_to_degrees.college_id = ref_colleges.college_id')
        	->join('tbl_enquiries','tbl_student_to_degrees.student_id = tbl_enquiries.student_id')
        	->join('ref_programs','tbl_enquiries.interested_program_id = ref_programs.program_id')
        	->get_where('tbl_student_to_degrees',array('tbl_student_to_degrees.student_id'=> $student_id))->result();
		}
	}
}