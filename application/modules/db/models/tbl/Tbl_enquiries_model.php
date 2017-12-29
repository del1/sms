<?php
class Tbl_enquiries_model extends MY_Model
{
	public $_table = 'tbl_enquiries';
	public $primary_key = 'enq_id';
	public function __construct()
	{
		parent::__construct();
	}
}