<?php
class Ref_employer_model extends MY_Model
{
	public $_table = 'ref_employer';
	public $primary_key = 'employer_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}
}