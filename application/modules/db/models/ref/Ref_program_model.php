<?php
class Ref_program_model extends MY_Model
{
	public $_table = 'ref_programs';
	public $primary_key = 'program_id';
	public $has_many = array( 'user' => array( 'model' => 'Db/tbl/Tbl_users_model','primary_key'=>'user_id' ) );

	public function __construct()
	{
		parent::__construct();
	}
	public function get_programs()
	{
		return $this->db->select('ref_programs.*,tbl_users.user_name')
			->join('tbl_users','ref_programs.added_by = tbl_users.user_id')
			->get('ref_programs')->result();
	}
}