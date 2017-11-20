<?php
class Ref_universities_model extends MY_Model
{
	public $_table = 'ref_universities';
	public $primary_key = 'university_id';
	//public $has_many = array( 'ref_country' => array( 'model' => 'author_m' ) );
	public $has_many = array( 'user' => array( 'model' => 'Db/tbl/Tbl_users_model','primary_key'=>'user_id' ) );

	public function __construct()
	{
		parent::__construct();
	}
	public function get_universities()
	{
		return $this->db->select('ref_universities.*,ref_countries.country_name,tbl_users.user_name')
			->join('ref_countries','ref_universities.country_id = ref_countries.country_id')
			->join('tbl_users','ref_universities.added_by = tbl_users.user_id')
			->get('ref_universities')->result();
	}
}