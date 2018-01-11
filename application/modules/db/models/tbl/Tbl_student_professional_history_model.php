<?php
class Tbl_student_professional_history_model extends MY_Model
{
	public $_table = 'tbl_student_professional_history';
	public $primary_key = 'history_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_companies_history($student_id='')
	{
		if($student_id)
		{
			return $this->db->select('tbl_student_professional_history.*,ref_employer.employer_name as company_name')
			->join('ref_employer', 'tbl_student_professional_history.employer_id = ref_employer.employer_id')
	        ->get_where('tbl_student_professional_history',array('tbl_student_professional_history.student_id'=> $student_id))->result();
    	}
	}
}

