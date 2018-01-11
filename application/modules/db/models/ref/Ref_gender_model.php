<?php
class Ref_gender_model extends MY_Model
{
	public $_table = 'ref_genders';
	public $primary_key = 'gender_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}
}