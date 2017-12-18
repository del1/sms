<?php
class Ref_college_types_model extends MY_Model
{
	public $_table = 'ref_college_types';
	public $primary_key = 'college_type_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );
	/*public $has_many = array( 'university' => array( 'model' => 'Db/ref/Ref_universities_model','primary_key'=>'university_id' ) );*/


	public function __construct()
	{
		parent::__construct();
	}
}