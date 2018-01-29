<?php
class Ref_city_model extends MY_Model
{
	public $_table = 'ref_cities';
	public $primary_key = 'city_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}

	public function get_country_cities($country_id='')
	{
		if($country_id)
		{
			return $this->db->select('ref_cities.city_id,ref_cities.city_name')
			->join('ref_cities','ref_states.state_id = ref_cities.state_id')
			->get_where('ref_states',array('ref_states.country_id'=>$country_id))->result();
		}
	}

	
}