<?php
class Lnk_student_to_packages_model extends MY_Model{
	public $_table = 'lnk_student_to_packages';
	public $primary_key = 'stp_id';
	public function __construct()
	{
		parent::__construct();
	}
}