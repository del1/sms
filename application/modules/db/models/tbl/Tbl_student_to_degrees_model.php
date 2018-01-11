<?php
class Tbl_student_to_degrees_model extends MY_Model
{
	public $_table = 'tbl_student_to_degrees';
	public $primary_key = 'sd_id';
	public function __construct()
	{
		parent::__construct();
	}
}