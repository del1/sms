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
}