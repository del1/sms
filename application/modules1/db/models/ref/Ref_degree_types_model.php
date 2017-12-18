<?php
class Ref_degree_types_model extends MY_Model
{
	public $_table = 'ref_degree_types';
	public $primary_key = 'degree_type_id';
	
	public function __construct()
	{
		parent::__construct();
	}
}