<?php
class Auth_model extends MY_Model {
	public $_table = 'tbl_users';
	public $primary_key = 'user_id';
    public function __construct()
    {
        parent::__construct();
    }
 	public function __call($name,$arguments){
        echo "in __call method for ".$name;
	}

    public function isExist($field,$value)
    {
    	return $this->get_by($field,$value);
    }

    public function m_register($data)
    {
    	if(isset($data['is_secure_request']) && $data['is_secure_request']=='GzPq97')
    	{
    		unset($data['is_secure_request']);
    		$this->insert($data);
    		return $this->db->insert_id();
    	}else{
    		return FALSE;
    	}
    }

    public function m_login($data)
    {
    	$check_constrint=array('user_name','email_id');
    	foreach ($check_constrint as $value) {
    		$result=$this->isExist($value,$data['email']);
    		if(!empty($result) && count($result)==1)
    		{
    			if($result->password==$data['password'])
    			{
    				if($result->is_active==true)
    				{
		    			$responceArray=array("User_Id"=>$result->user_id,"Username"=>$result->user_name,
				  		"User_Type_Id"=>$result->userlevel_id,"Email_Address"=>$result->email_id);
				  		$this->session->set_userdata($responceArray);
				  		//$input['session_id']=$c_sess_id;
				  		$this->update($result->user_id, array( 'last_login' => date('Y-m-d H:i:s') ));
						return $responceArray;	
    				}else{
    					$responceArray['error']="Your Profile is inctive! Please contact administrator";
 						return $responceArray;
    				}
    			}else{
    				$responceArray['error']="Username or Password is Incorrect";
					return $responceArray;	
    			}
    		}
    	}
    	$responceArray['error']="Username or Password is Incorrect";
		return $responceArray;	
    }






/*  last model*/



    public function updateLoginTimeAndSessionId($data)
    {
        $q=$this->db->get_where('profiles',array('userid' => $data['userid']));
        if ( $q->num_rows() > 0 )  { 
        	$this->db->where(array('userid' => $data['userid'])); 
        	$this->db->update('profiles',$data); 
    	}
    }



    public function checkuserNameToRegister($data){ //shashi
    	$username=$data['username'];
		return $this->db->select('username')
		//->like("username",$username)->get('profiles')
		->get_where('profiles',array("username"=>$username))
		->result_array();	
    }

    public function checkEmailToRegister($data){ //shashi
    	$arr['email']=$data['email'];
    	if(isset($data['userid']))
    	{
    		$arr['userid']=$data['userid'];
    	}
		return $this->db->select('email')
		->get_where('profiles',$arr)
		->result_array();	
    }

    public function checkPhoneNoExist($data){ //shashi
    	$phone=$data['phone'];
		return $this->db->select('phone')
		->get_where('contacts_phone',array("phone"=>$phone))
		->result_array();	
    }

    


	public function fetch_user_data_by_attr($attr_array){ //shashi
		//input as $data=array('Email',$email) OR $data = array('User_id' => $user_id);;
	  	//returns reultant array->check empty array in caller
		$attr1=key($attr_array);
		/*return $this->db->select('userid, userlevel, password, email, fname, lname, username,is_active')*/
		return $this->db->select('*')
					->get_where('profiles',array($attr1 => $attr_array[$attr1]))
					->result_array();
	}


	public function logout($User_Id) //shashi
	{
		$data = array (
		'logout_time' => date('Y-m-d H:i:s'),
		'session_id'=>NULL,
		);
		$this->db->where(array('userid' => $User_Id)); 
		$this->db->update('profiles',$data); 
	}


/*edit  user_model part copied*/
		public function cancelAssignment($data)
		{
			//reason to add is checked the first time 
			$artcid=$data['artcid'];
			$userid=$data['userid'];
			//update deadline for assignment in deadlinetable
			$where="artcid = '$artcid' AND userid = $userid  AND  (ISNULL(isdisbaled) OR isdisbaled != 1) AND (ISNULL(iscompleted) OR iscompleted != 1)";

	     	$input['isdisbaled']=1;
	     	$this->db->where($where);
	     	$this->db->update('userartcrecord',$input);
	     	
	     	$userLevel=$this->getUserLevel($userid);
	     	if($userLevel['userlevelid']==4)
	     	{
		        $input4['artcid']=$artcid;
		        $input4['artcstatusid']=1;
		        $this->ChangeArtcStatus($input4);
	     	}elseif($userLevel['userlevelid']==3)
	     	{
		        $input4['artcid']=$artcid;
		        $input4['artcstatusid']=3;
		        $this->ChangeArtcStatus($input4);
	     	}
			$this->addUserToBlacklist($data);
		}







		public function resetPassword($data)
		{
			$UserId=$data['UserId'];
	        $this->db->where('UserId',$UserId); 
	        $this->db->update('usertable',$data); 
		}

		
    }