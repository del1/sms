<?php
class Lnk_student_to_applied_colleges_model extends MY_Model{
	public $_table = 'lnk_student_to_applied_colleges';
	public $primary_key = 'stac_id';
	public function __construct()
	{
		parent::__construct();
	}
}