<?php
class Ref_country_model extends MY_Model
{
	public $_table = 'ref_countries';
	public $primary_key = 'country_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}
}