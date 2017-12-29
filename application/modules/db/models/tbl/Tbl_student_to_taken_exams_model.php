<?php
class Tbl_student_to_taken_exams_model extends MY_Model
{
	public $_table = 'tbl_student_to_taken_exams';
	public $primary_key = 'et_id';
	public function __construct()
	{
		parent::__construct();
	}
}