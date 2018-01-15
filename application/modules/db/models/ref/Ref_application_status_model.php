<?php
class Ref_application_status_model extends MY_Model
{
	public $_table = 'ref_application_status';
	public $primary_key = 'app_status_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}
}