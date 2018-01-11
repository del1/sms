<?php
class Tbl_student_profiles_model extends MY_Model
{
	public $_table = 'tbl_student_profiles';
	public $primary_key = 'student_id';
	//public $belongs_to = array( 'ref_country' => array( 'model' => 'author_m' ) );

	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_list()
	{
		$this->db->select('tbl_enquiries.enq_date,tbl_enquiries.is_converted, tbl_enquiries.student_id, tbl_users.user_id,tbl_users.user_id, tbl_users.first_name, tbl_users.last_name, tbl_users.email_id, tbl_users.phonenumber');
        $this->db->from('tbl_users');
        $this->db->join('tbl_student_profiles', 'tbl_users.user_id = tbl_student_profiles.user_id');
        $this->db->join('tbl_enquiries', 'tbl_student_profiles.student_id = tbl_enquiries.student_id');
        $this->db->where('tbl_users.userlevel_id', 3);
        return $this->db->get()->result();
	}

	public function get_professional_detail($student_id)
	{
		return $this->db->select('tbl_student_profiles.intro,tbl_student_profiles.total_experience,tbl_student_profiles.professional_qualification, tbl_student_profiles.remarks')
        
        ->get_where('tbl_student_profiles',array('tbl_student_profiles.student_id'=> $student_id))->result();
	}
}