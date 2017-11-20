<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."third_party/MX/Controller.php";
/*
//using other controller methods
//$data['message1']=modules::load('User/User/')->playSessionValue('unset','message1');

*/
class Del extends MX_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));		


		$this->load->model('db/ref/Ref_universities_model','ref_universities');
		$this->load->model('db/ref/Ref_country_model','ref_county');
		$this->load->model('db/ref/Ref_application_rounds_model','ref_approunds');
		$this->load->model('db/ref/Ref_program_model','ref_program');
		$this->load->model('db/ref/Ref_packages_model','ref_packages');
		$this->load->model('db/ref/Ref_sources_model','ref_source');
		$this->load->model('db/ref/Ref_colleges_model','ref_college');
		$this->load->model('db/ref/Ref_college_types_model','ref_college_types');
		$this->load->model('db/ref/Ref_degree_model','ref_degree');
		$this->load->model('db/ref/Ref_degree_types_model','ref_degree_type');


		



		$this->load->model('db/tbl/Tbl_users_model','users');

		/*$this->load->model('db/ref/Ref_collection_model','ref_coll');
		$this->load->model('db/ref/Ref_brand_model','ref_brand');*/


		$auth_user = $this->session->get_userdata('userdata');
		if(@$auth_user['User_Id']){
			/*$this->userId=$auth_user['User_Id'];
			$this->userTypeId=$auth_user['User_Type_Id'];
			$this->userEmailId=$auth_user['Email_Address'];
			$this->userName=$auth_user['Username'];*/
		}
	}
	public function mprint($variable)
	{
		echo '<PRE>'.htmlspecialchars(print_r($variable, true)).'</PRE><HR>';
		flush();
		die;
	}

	public function adminCheckLogin(){
		$UserId=@$this->userId;

		if(isset($this->userId) && ($this->userTypeId==1))
		{
			return true;
		}else
		{
			redirect('Login');
		}
	}

	public function userCheckLogin(){
		if(isset($this->userId) && (@$this->userTypeId==4 || @$this->userTypeId==3))
		{
			return true;
		}else
		{
			redirect('Login');
		}
	}

	public function updateLog($artcid,$msg){
		// updated by divya 18 july
		$aArt=str_pad($artcid, 6, '0', STR_PAD_LEFT); 
		$artName ="AW".$aArt;

		$newfile = "assets/txt_log/".$artName;
		if (file_exists($newfile)) 
		{
          	$fh = fopen($newfile, 'a');
	        $today=date("Y-m-d H:i:s");	
	     	$content=strtoupper("[".date("F j, Y g:i a", strtotime(date("Y-m-d H:i:s")))."]");
	     	$content.=" ".$msg. " \n"; 
	        fwrite($fh, $content);
	        fclose($fh);
        }
	}


				

	public function checkFilesInFolder1($filepath)
	{//get the list of files in the directory
	 	$filelist=array();
		if(file_exists($filepath))
		{
			if ($handle = opendir($filepath.'/')) {
	    		while (false !== ($entry = readdir($handle))) {
		        	if ($entry != "." && $entry != "..") {
		        	$ib[]=$entry;
		        	}
	    		}
	    		closedir($handle);
			}
			if (isset($ib)) {
				$filelist=@$ib;
			}
		}//end of if file_exist
		return $filelist;
	}

}