<?php
class Tbl_users_model extends MY_Model
{
	public $_table = 'tbl_users';
	public $primary_key = 'user_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}

	public function get_consultants()
	{
		$this->db->select('a.*, b.user_id,b.user_name as add_by');
            $this->db->from('tbl_users as a');
            $this->db->join('tbl_users as b', 'a.added_by = b.user_id');
            $this->db->where('a.userlevel_id', 2);
            $this->db->order_by('a.user_id');
            $query = $this->db->get()->result();
            return $query;
	}

	public function getExclusiveUsername($userDetails)
	{
		$this->db->select('tbl_users.*');
        $this->db->where('user_name', $userDetails['user_name']);
        $this->db->where('user_id!=', $userDetails['user_id']);
        return $this->db->get('tbl_users')->result();
	}

	public function getExclusiveEmail($userDetails)
	{
		$this->db->select('tbl_users.*');
        $this->db->where('email_id', $userDetails['email_id']);
        $this->db->where('user_id!=', $userDetails['user_id']);
        return $this->db->get('tbl_users')->result();
	}
}