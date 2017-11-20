<?php
class Test_model extends MY_Model
{

    public function __construct(){
       parent::__construct();
       $this->table='city';
    }

    /*select*/
    #select * from

    public function demo1()
    {
    	//return $this->find_by_id(1);
    }

	public function short_select()
	{
		return $this->db->get('tbl_base_rate')->result_array();
	}
    //select get_where
	public function getStatesByCountryId($data)
	{ //get states by country id
		return $this->db->select('ref_states.*')->get_where('ref_states',$data)->result_array();
	}

	//#get_where_or_get
	public function getRefItemType($data='')
	{
		if(!empty($data))
		{
			return $this->db->get_where('ref_item_type',$data)->result_array();
		}else{
			return $this->db->get('ref_item_type')->result_array();
		}
		
	}

	public function getUserIds($data)
	{
		$this->db->select('User_Id');
		$this->db->like('First_Name', 'fname');
		return $this->db->from('tbl_users')->get()->result_array();
	}
	/*end of select*/


	//#update_or_insert
	public function addPaymentForBooking($data)
	{//mahesh 23-3-2017

		if(isset($data['falg']))
		{
			$invoice_Id=$data['invoice_Id'];
			unset($data['falg']);
			//unset($data['falg']);
	  		$this->db->where('invoice_Id',$invoice_Id);
			$this->db->update('tbl_payments',$data); 
		}else{
			$this->db->insert('tbl_payments',$data);	 
			return ($this->db->affected_rows() != 1) ? "fail" : "success";    
		}
	}

	#insert_batch
	public function UpdatePermissionOfSubUserType($data)
	{//mahesh 2nd jan-2017
		if(@$data['SubUserType'])
		{
				foreach ($data['Permissions'] as $key => $value) {
					$input['Subuser_Type_Id']=$SubUserType;
					$input['Permission_Id']=$value;
					$rowArray[]=$input;
				}
				$this->db->insert_batch('lnk_subuser_types_to_permissions',$rowArray);
		}
	}

	#update
	public function defaultContactTypeAction($data)
	{//mahesh 14-nov-2016
		$this->db->where(array('ref_contact_id' => $data['ref_contact_id'])); 
    	$this->db->update('ref_contact_type',$data); 
	}

	#join
	function getStuDetails($data)
	{
		return $this->db->select('tbl_student_profile.*,ref_religion.Description as relDesc, ref_gender.Description as genDesc,ref_country.Description as ctryDesc,ref_language.Description as LngDesc')
		->join('ref_religion','tbl_student_profile.Religion_Id = ref_religion.Religion_Id','left')
		->join('ref_gender','tbl_student_profile.Gender_Id = ref_gender.Gender_Id','left')
		->join('ref_country','tbl_student_profile.country = ref_country.Country_Id','left')
		->join('ref_language','tbl_student_profile.language = ref_language.Language_Id','left')
		->get_where('tbl_student_profile',$data)->result_array();
	}

	//#check for null
	public function UpdateRequestUpdateBySectionAsc($data)
	{
		//give you exact changes by section
		return $this->db->select('*')->order_by("log_id","ASC")
		->where('not_approved_note IS NULL', null, false)
		->where('is_approved',0)
		->where('section',$data['section'])
		->where('requested_by',$data['User_Id'])
		->get('global_change_log')
		->result_array();
	}
	#where_in
	public function getAllPicturesByRoomId($data)
	{
		$roomList=$data['roomList'];
		$abc=implode(',', $roomList);
        $this->db->select('*')->from('lnk_room_to_picture');
     	$this->db->where_in("room_id",$roomList);
		$query=$this->db->get();
		return $query->result_array();
	}

	public function deletePropertyPets($data)
	{//10-03-2017 //mentioned in dashboard while accepting admin functions-Mahesh
		$this->db->where("property_id",$data['property_id'])->delete('lnk_pets_to_property');
	}
}