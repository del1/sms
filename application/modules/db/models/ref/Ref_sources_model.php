<?php
class Ref_sources_model extends MY_Model
{
	public $_table = 'ref_sources';
	public $primary_key = 'source_id';
	public $has_many = array( 'user' => array( 'model' => 'Db/tbl/Tbl_users_model','primary_key'=>'user_id' ) );

	public function __construct()
	{
		parent::__construct();
	}
	public function get_sources()
	{
		return $this->db->select('ref_sources.*,tbl_users.user_name')
			->join('tbl_users','ref_sources.added_by = tbl_users.user_id')
			->get('ref_sources')->result();
	}
}