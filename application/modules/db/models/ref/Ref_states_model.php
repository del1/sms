<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02-01-2018
 * Time: 15:24
 */

class Ref_states_model extends MY_Model
{
    public $_table = 'ref_states';
    public $primary_key = 'state_id';
    //public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

    public function __construct()
    {
        parent::__construct();
    }
}