<?php
class Ref_degree_model extends MY_Model
{
	public $_table = 'ref_degrees';
	public $primary_key = 'degree_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );
	//public $has_many = array( 'university' => array( 'model' => 'Db/ref/Ref_universities_model','primary_key'=>'university_id' ) );


	public function __construct()
	{
		parent::__construct();
	}

	public function get_degreesOfType($typeId)
	{
		return $this->db->select('ref_degrees.*,tbl_users.user_name')
			->join('tbl_users','ref_degrees.added_by = tbl_users.user_id')
			->get_where('ref_degrees',array('ref_degrees.degree_type_id'=>$typeId))->result();
	}

	
}