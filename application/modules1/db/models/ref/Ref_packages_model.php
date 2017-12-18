<?php
class Ref_packages_model extends MY_Model
{
	public $_table = 'ref_packages';
	public $primary_key = 'package_id';
	public $has_many = array( 'user' => array( 'model' => 'Db/tbl/Tbl_users_model','primary_key'=>'user_id' ) );

	public function __construct()
	{
		parent::__construct();
	}
	public function get_packages()
	{
		return $this->db->select('ref_packages.*,tbl_users.user_name')
			->join('tbl_users','ref_packages.added_by = tbl_users.user_id')
			->get('ref_packages')->result();
	}
}