<?php
class Ref_application_rounds_model extends MY_Model
{
	public $_table = 'ref_application_rounds';
	public $primary_key = 'round_id';
	//public $has_many = array( 'ref_country' => array( 'model' => 'author_m' ) );
	public $has_many = array( 'user' => array( 'model' => 'Db/tbl/Tbl_users_model','primary_key'=>'user_id' ) );

	public function __construct()
	{
		parent::__construct();
	}
	public function get_application_rounds()
	{
		return $this->db->select('ref_application_rounds.*,tbl_users.user_name')
			->join('tbl_users','ref_application_rounds.added_by = tbl_users.user_id')
			->get('ref_application_rounds')->result();
	}
}