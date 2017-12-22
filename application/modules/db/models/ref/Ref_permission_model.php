<?php
class Ref_permission_model extends MY_Model
{
	public $_table = 'ref_permissions';
	public $primary_key = 'permission_id';
	
	public function __construct()
	{
		parent::__construct();
	}
	
}