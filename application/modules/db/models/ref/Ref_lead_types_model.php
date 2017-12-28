<?php
class Ref_lead_types_model extends MY_Model
{
	public $_table = 'ref_lead_types';
	public $primary_key = 'lead_type_id';
	
	public function __construct()
	{
		parent::__construct();
	}
	
}