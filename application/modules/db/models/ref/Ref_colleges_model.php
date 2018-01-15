<?php
class Ref_colleges_model extends MY_Model
{
	public $_table = 'ref_colleges';
	public $primary_key = 'college_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );
	public $has_many = array( 'university' => array( 'model' => 'Db/ref/Ref_universities_model','primary_key'=>'university_id' ) );


	public function __construct()
	{
		parent::__construct();
	}

	public function get_collegesOfType($typeId)
	{
		return $this->db->select('ref_colleges.*,ref_universities.university_name,tbl_users.user_name')
			->join('ref_universities','ref_colleges.university_id = ref_universities.university_id')
			->join('tbl_users','ref_colleges.added_by = tbl_users.user_id')
			->get_where('ref_colleges',array('ref_colleges.college_type_id'=>$typeId))->result();
	}

	public function apply_college_list()
	{
		return $this->db->select('ref_colleges.college_id,ref_colleges.college_name')
			->join('ref_universities','ref_colleges.university_id = ref_universities.university_id')
			->join('ref_countries','ref_universities.country_id = ref_countries.country_id')
			->get_where('ref_colleges',array('ref_countries.country_code!='=>'IN',"ref_colleges.is_active"=>"true"))->result();
	}

	
}