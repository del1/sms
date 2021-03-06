<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Del {

	public function __construct() 
	{
		parent::__construct();
		if (!$this->session->User_Type_Id || $this->session->User_Type_Id!=1 ) {
			redirect(base_url());	
		}	
	}

	public function index()
	{
		$data['page']='Dashboard';
		$view = 'admin/admin_home_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function subadmin(){
		$data['page']='Sub_Admin_list';
		$data['consultant_list']=$this->users->get_many_by('userlevel_id',4);
		$view = 'admin/subadmin/subadmin_list_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

	public function manage_subadmin($user_id=''){
		$data['user_details']=array();
		if($user_id){
			$data['user_details']=$this->users->get($user_id);
		}
		$view = 'admin/subadmin/manage_subadmin_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

	public function getStatesForCountry()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$states=$this->ref_states->select('state_id as id,state_name as text')->get_many_by('country_id',$posted_data['country_id']);
		echo json_encode($states);
	}

	public function getCitiesOfStates()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$states=$this->ref_city->select('city_id as id,city_name as text')->get_many_by('state_id',$posted_data['state_id']);
		echo json_encode($states);
	}

	

	public function add_update_subadmin()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		//step1-formvalidation
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_rules('gender_id', 'Gender', 'required' );
		$this->form_validation->set_rules('phonenumber', 'Phone Number', 'min_length[10]' );
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required' );
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required' );
		if($this->form_validation->run() !== false){
			//step2- data validation-checking if data is already exist
	        if (isset($posted_data['user_id']) && strlen(trim($posted_data['user_id']))) 
	        {
	        	$data['username']=Modules::run('auth/check_username');
	        	if(empty($data['username']))//optimisation
	        	{
	        		$data['email_id']=Modules::run('auth/check_email');
	        	}
	        }else{
	        	$data['username']=$this->users->get_by('user_name',$posted_data['user_name']);
	        	if(empty($data['username'])){
        			$data['email_id']=$this->users->get_by('email_id',$posted_data['email_id']);
	        	}
	        }
	        //step3- proceedfurthur
	        if(empty($data['email_id']) && empty($data['username']))
	        {
	        	//proceed further
	        	$required_array = elements(array('user_name','first_name','last_name','email_id','phonenumber','userlevel_id','gender_id'), $posted_data);
	        	$required_array['added_by']=$this->session->User_Id;
	        	$required_array['last_updated']=date('Y-m-d H:i:s');
	        	if(isset($posted_data['user_id']) && strlen(trim($posted_data['user_id'])))
	        	{//update
	        		$this->users->update($posted_data['user_id'],$required_array);
	        	}else{//insert
	        		$required_array['password']='asdasd';//setit and email
	        		$required_array['signup_date']=date('Y-m-d H:i:s');
	        		$this->users->insert($required_array);
	        	}
	        	$this->session->set_flashdata('error','<p class="alert alert-success">User Added successfully</p>');
	        	redirect('admin/subadmin');
	        }else{
	        	if(!empty($data['username']))
	        	{
	        		$this->session->set_flashdata('error','<p class="alert alert-danger">Username is already exists</p>');
	        	}
	        	if(!empty($data['email_id']))
	        	{
	        		$this->session->set_flashdata('error','<p class="alert alert-danger">Email Address is already exists</p>');
	        	}
				if(isset($posted_data['user_id']) && strlen($posted_data['user_id']))
	            {
	            	 redirect('admin/manage_subadmin/'.$posted_data['user_id']);
	            }else{
	            	$this->session->set_flashdata('setData', $posted_data);
	        	 	redirect('admin/manage_subadmin');
	            } 
	        }
	    }else{
            $this->session->set_flashdata('error',  validation_errors('<p class="alert alert-danger">', '</p>'));

            if(isset($posted_data['user_id']) && strlen($posted_data['user_id']))
            {
            	 redirect('admin/manage_subadmin/'.$posted_data['user_id']);
            }else{
            	$this->session->set_flashdata('setData', $posted_data);
        	 	redirect('admin/manage_subadmin');
            } 
        }
	}

	public function getsubadmin_rightslist()
	{ 
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['userid']) && isset($posted_data['is_secure_request']) && $posted_data['is_secure_request']=='uKrt)6')
		{
			$data['permission_list']=$this->ref_permission->get_many_by('is_active',true);
			$data['access_permission']=$this->lnk_user_to_permission->get_many_by('user_id',$posted_data['userid']);
			$data['userid']=$posted_data['userid'];
			$view = 'admin/ajax/ajax_subadmin_management_view';
			$this->load->view($view,$data);
		}
	}

	public function agent_update_permissions()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		if (isset($posted_data['userid']) && isset($posted_data['is_secure_request']) && $posted_data['is_secure_request']=='uKrt)6') {
			$user_id=$posted_data['userid'];
			unset($posted_data['userid']);
			unset($posted_data['is_secure_request']);
			foreach ($posted_data as $key => $value) {
				$input['user_id']=$user_id;
				$input['permission_id']=$key;
				if($value==1){
					$input['edit']='true';
					$input['view']='false';
				}else{
					$input['edit']='false';
					$input['view']='true';
				}
				$row[]=$input;
			}
			$this->lnk_user_to_permission->delete_by('user_id',$user_id);
			$this->lnk_user_to_permission->insert_many($row,FALSE);
		}
		if (!$this->input->is_ajax_request()) {
			redirect('admin/subadmin');
		}
	}

	public function request_follow_up()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$data['agent_list']=$this->users->select('user_id,first_name,last_name,user_name')->get_many_by(array('userlevel_id'=>4,'is_active'=>'true'));
		if($posted_data['action']=="edit" || $posted_data['action']=="add_new")
		{
			if($posted_data['action']=="edit")
			{
				$data['followup_data']=$this->student_followup->get($posted_data['followupid']);
			}else{
				$data['followup_data']= new stdClass();
				$data['followup_data']->enq_id=$posted_data['followupid'];
			}
			$view = 'admin/ajax/ajax_followup_popup';
			$this->load->view($view,$data);
		}
		if($posted_data['action']=="delete" && isset($posted_data['followupid']))
		{
			$this->student_followup->delete($posted_data['followupid']);
		}
	}

	public function request_conversation_table_update()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$student_id=$posted_data['student_id'];
		$data['followup_data']=$this->student_followup->get_student_followups($student_id);
		$view = 'admin/ajax/request_conversation_table_update';
		$this->load->view($view,$data);
	}

	public function add_follow_up()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['followup_id']))
		{
			$followup_data = elements(array('agent_id','followup_comment','followup_date'), $posted_data);
			$this->student_followup->update($posted_data['followup_id'], $followup_data);
			echo $this->db->insert_id();
		}else{
			$followup_data = elements(array('enq_id','agent_id','followup_comment','followup_date'), $posted_data);
			$this->student_followup->insert($followup_data);
			echo $this->db->insert_id();
		}
	}

	public function convert_student()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		if(isset($posted_data['student_id']) && isset($posted_data['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)12')
		{
			$res=$this->enquries->select('is_converted')->get_by('student_id',$posted_data['student_id']);
			if($res->is_converted=="false")
			{
				$q=$this->enquries->update_by(array('student_id'=>$posted_data['student_id']),array('is_converted'=>"true"));
				echo json_encode($q);
			}else{
				echo json_encode(false);
			}
			
		}
	}

	/*Genral Function section begins*/


	public function changeAllStatus()
	{
		$model_name=$this->input->post('type',TRUE);
		$pk_id=$this->input->post('pk_id',TRUE);
		$status=$this->input->post('is_active',TRUE);
		$this->$model_name->update($pk_id, array( 'is_active' => $status));
	}

	public function delete()
	{

		if(isset($_POST['pk_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$type=$_POST['type'];
			$result=$this->$type->delete($this->input->post('pk_id',TRUE));
		}
		$afftectedRows = $this->db->affected_rows();
		if((int)$result && (int)$afftectedRows)
		{
			echo "success";
		}else{
			echo "fail";
		}
	}



	//Manage Universities section

	public function universities()//list
	{
		$data['section']='masterlist';
		$data['page']='Universities';
		$data['universities_list']=$this->ref_universities->get_universities();
		$view = 'admin/masterlist/universities/universities_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_university($university_id='')
	{
		$data['details']='';
		if($university_id)
		{
			$data['details']=$this->ref_universities->get($university_id);
		}
		$data['county_list']=$this->ref_country->get_all();

		$view = 'admin/masterlist/universities/manage_university_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_university()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('university_name','country_id'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['university_id']))
		{
			$this->ref_universities->update($posted_data['university_id'], $required_array);
		}else{
			$this->ref_universities->insert($required_array);
		}
		redirect('admin/universities');
	}

	/*end Universities section*/



	/*manage application_rounds*/
	
	public function application_rounds()//list
	{
		$data['section']='masterlist';
		$data['page']='application_rounds';
		$data['appround_list']=$this->ref_approunds->get_application_rounds();
		$view = 'admin/masterlist/application_rounds/approunds_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_appround($round_id='')
	{
		$data['details']='';
		if($round_id)
		{
			$data['details']=$this->ref_approunds->get($round_id);
		}
		$view = 'admin/masterlist/application_rounds/manage_appround_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_appround()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('round_name'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['round_id']))
		{
			$this->ref_approunds->update($posted_data['round_id'], $required_array);
		}else{
			$this->ref_approunds->insert($required_array);
		}
		redirect('admin/application_rounds');
	}
	/*end Application round section*/



	/*manage programs*/
	
	public function programs()//list
	{
		$data['section']='masterlist';
		$data['page']='Program';
		$data['program_list']=$this->ref_program->get_programs();
		$view = 'admin/masterlist/programs/program_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_program($program_id='')
	{
		$data['details']='';
		if($program_id)
		{
			$data['details']=$this->ref_program->get($program_id);
		}
		$view = 'admin/masterlist/programs/manage_program_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_program()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('program_name'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['program_id']))
		{
			$this->ref_program->update($posted_data['program_id'], $required_array);
		}else{
			$this->ref_program->insert($required_array);
		}
		redirect('admin/programs');
	}
	/*end Application round section*/
	


	/*manage packages*/
	
	public function packages()//list
	{
		$data['section']='masterlist';
		$data['page']='Packages';
		$data['packages_list']=$this->ref_packages->get_packages();
		$view = 'admin/masterlist/packages/package_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_package($program_id='')
	{
		$data['details']='';
		if($program_id)
		{
			$data['details']=$this->ref_packages->get($program_id);
		}
		$view = 'admin/masterlist/packages/manage_package_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_package()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('package_name'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['package_id']))
		{
			$this->ref_packages->update($posted_data['package_id'], $required_array);
		}else{
			$this->ref_packages->insert($required_array);
		}
		redirect('admin/packages');
	}
	/*end Application round section*/




	/*manage sources*/
	
	public function sources()//list
	{
		$data['section']='masterlist';
		$data['page']='Sources';
		$data['source_list']=$this->ref_source->get_sources();
		$view = 'admin/masterlist/sources/source_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_source($source_id='')
	{
		$data['details']='';
		if($source_id)
		{
			$data['details']=$this->ref_source->get($source_id);
		}
		$view = 'admin/masterlist/sources/manage_source_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_source()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('source_name'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['source_id']))
		{
			$this->ref_source->update($posted_data['source_id'], $required_array);
		}else{
			$this->ref_source->insert($required_array);
		}
		redirect('admin/sources');
	}
	/*end Application round section*/


	public function consultants()//list
	{
		$data['section']='masterlist';
		$data['page']='Consultants';
		$data['consultant_list']=$this->users->get_consultants();
		$view = 'admin/masterlist/consultants/consultant_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_consultant($consultant_id='')
	{
		$data['section']='masterlist';
		$data['page']='consultants';
		$data['details']='';
		if($consultant_id)
		{
			$data['details']=$this->users->get($consultant_id);
		}
		$view = 'admin/masterlist/consultants/manage_consultant_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

	public function add_update_consultant()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('first_name','last_name','email_id','phonenumber'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=$required_array['signup_date']=date('Y-m-d H:i:s');
		$required_array['userlevel_id']=2;
		$required_array['is_active']='true';
		if(isset($posted_data['user_id']))
		{
			$this->users->update($posted_data['user_id'], $required_array);
		}else{
			$this->users->insert($required_array);
		}
		redirect('admin/consultants');
	}
	/*end of consultant*/


	/*masterlist-*/
	/*manage college */
	public function colleges($type)
	{
		$data['section']='masterlist';
		if($type){
			switch ($type) {
				case 'UG':
							$data['page']='ug_college';
							$data['type']='UG';
							$data['college_list']=$this->ref_college->get_collegesOfType(1);
							break;
				case 'PG':
							$data['page']='pg_college';
							$data['type']='PG';
							$data['college_list']=$this->ref_college->get_collegesOfType(2);
							break;
				default:
							$data['page']='ug_college';
							$data['type']='UG';
							$data['college_list']=$this->ref_college->get_collegesOfType(1);
				}
		}else{
			$data['page']='UG Colleges';
			$data['type']='UG';
		}
		$view = 'admin/masterlist/colleges/college_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}




	public function manage_college($type,$parameter='')
	{
		if($type){
			//$data['college_type_list']=$this->ref_college_types->get_many_by('is_active',true);
			$data['type']=$type;
			$data['college_type_id']=$this->ref_college_types->select('college_type_id')->get_by('short_desc', $type);
			$data['universities_list']=$this->ref_universities->select('university_id,university_name')->get_many_by('is_active',true);
			if($parameter)
			{
				$data['details']=$this->ref_college->get($parameter);
			}
			$data['page']='Manage College';
			$view = 'admin/masterlist/colleges/manage_college_view';
			echo Modules::run('template/admin_template', $view, $data);	

		}
	}

	public function add_update_college()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('college_name','college_type_id'), $posted_data);//'university_id',
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['college_id']))
		{
			$this->ref_college->update($posted_data['college_id'], $required_array);
		}else{
			$this->ref_college->insert($required_array);
		}
		redirect('admin/colleges/'.$posted_data['type']);
	}
	/*masterlist managecollege section end*/


	/*masterlist*/
	/*Manage Degree*/

	public function degree($type)
	{
		$data['section']='masterlist';
		if($type){
			switch ($type) {
				case 'UG':
							$data['page']='ug_degree';
							$data['type']='UG';
							$data['degree_list']=$this->ref_degree->get_degreesOfType(1);
							break;
				case 'PG':
							$data['page']='pg_degree';
							$data['type']='PG';
							$data['degree_list']=$this->ref_degree->get_degreesOfType(2);
							break;
				default:
							$data['page']='UG Degree';
							break;
				}
		}else{
			$data['page']='UG Degree';
			$data['type']='UG';
		}
		$view = 'admin/masterlist/degree/degree_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}




	public function manage_degree($type,$parameter='')
	{
		if($type){
			//$data['college_type_list']=$this->ref_college_types->get_many_by('is_active',true);
			$data['type']=$type;
			$data['degree_type_id']=$this->ref_degree_type->select('degree_type_id')->get_by('short_desc', $type);
			if($parameter)
			{
				$data['details']=$this->ref_degree->get($parameter);
			}
			$data['page']='Manage Degree';
			$view = 'admin/masterlist/degree/manage_degree_view';
			echo Modules::run('template/admin_template', $view, $data);	

		}
	}

	public function add_update_degree()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('degree_name','degree_type_id'), $posted_data);
		$required_array['added_by']=$this->session->User_Id;
		$required_array['last_updated']=date('Y-m-d H:i:s');
		if(isset($posted_data['degree_id']))
		{
			$this->ref_degree->update($posted_data['degree_id'], $required_array);
		}else{
			$this->ref_degree->insert($required_array);
		}
		redirect('admin/degree/'.$posted_data['type']);
	}



	/*Store
	/*Store Methods*/
/*


	public function changeStoreStatus()
	{
		$this->store->update($this->input->post('store_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}



	public function add_update_store()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('store_name', 'email_id', 'city','state','pincode', 'contact_number','address','store_desc'), $posted_data);
		if(isset($posted_data['store_id']))
		{
			$this->store->update($posted_data['store_id'], $required_array);
		}else{
			$this->store->insert($required_array);
		}
		redirect('admin/stores_list');
	}*/
	/*end of store pages



	public function changeEventStatus()
	{
		$this->tbl_trunkshows->update($this->input->post('event_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}


	public function add_update_events()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('event_name', 'store_id', 'start_date','end_date','event_desc'), $posted_data);
		if(isset($posted_data['event_id']))
		{
			$this->tbl_trunkshows->update($posted_data['event_id'], $required_array);
		}else{
			$this->tbl_trunkshows->insert($required_array);
		}
		redirect('admin/store_trunkshows_list/'.$posted_data['store_id']);
	}

	public function delete_events()
	{
		if(isset($_POST['event_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->tbl_trunkshows->delete($this->input->post('event_id',TRUE));
		}
	}*/
	/*end of event pages*/


	/*end of career pages*/

	/*
	/*Career Pages
	/*Career pages*/

	/*public function all_products()
	{
		$data['product_list']=$this->tbl_product->get_all_product();
		$data['page']='All Products';
		$view = 'admin/collection/admin_all_product_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}


	public function manage_product($product_id='')
	{
		$data['product_details']='';
		if($product_id)
		{
			$data['product_details']=$this->tbl_product->get($product_id);
			$data['product_subcat_list']=$this->lnk_produt_to_subcat->get_many_by('product_id',$product_id);
			$data['product_images_list']=$this->lnk_produt_to_docs->get_product_images_nactive($product_id);
		}
		$data['brands_list']=$this->ref_brand->select('brand_id,brand_name')->get_many_by('is_active',true);
		$data['catagory_list']=$this->ref_cat->select('cat_id,cat_name')->get_many_by('is_active',true);
		$data['sub_catlist']=$this->ref_subcat->select('sub_cat_id,sub_cat_name,cat_id')->get_many_by('is_active',true);
		$data['collection_list']=$this->ref_coll->select('collection_id,collection_name')->get_many_by('is_active',true);
		$data['season_list']=$this->ref_season->select('season_id,season')->get_many_by('is_active',true);
		$data['page']='All Products';
		$view = 'admin/collection/admin_manage_product_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_product()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('product_name', 'collection_id', 'brand_id','season_id','product_desc'), $posted_data);

		if(isset($posted_data['product_id']))
		{
			$this->tbl_product->update($posted_data['product_id'], $required_array);
			$product_id=$posted_data['product_id'];
		}else{
			$this->tbl_product->insert($required_array);
			$product_id=$this->db->insert_id();
		}

		$subcat_array=$this->input->post('sub_cat_id');
				//array for delete update
		if(!empty($subcat_array)) //to avoid work later
		{
			foreach ($subcat_array as $key => $value) {
				$row['product_id']=$product_id;
				$row['sub_cat_id']=$value;
				$final_subcat_array[]=$row;
			}
		}
		$this->lnk_produt_to_subcat->delete_by(array('product_id'=>$product_id));
		if(isset($final_subcat_array))
		{
			$this->lnk_produt_to_subcat->insert_many($final_subcat_array);	
		}

		//$cpt = count($_FILES['userfile']);
		if($_FILES['userfile']['name'][0]!="")
		{
	    	if(!file_exists("./assets/images/upload/".$product_id))
	    	{
	    		mkdir("./assets/images/upload/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/images/upload/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "gif|jpg|png",//* -for all file types
				'encrypt_name' => TRUE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	     	$files = $_FILES;
	     	$cpt=count($_FILES['userfile']['name']);
	     	//use of foreach here to speed things here
     	 	for($i=0; $i<$cpt; $i++)
            {
            	$_FILES['userfile']['name']= $files['userfile']['name'][$i];//keep orginal file name
            	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
            	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
         		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
         		$_FILES['userfile']['size']= $files['userfile']['size'][$i];
         		$config['file_name'] = $_FILES['userfile']['name'];
		      	$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload())
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->mprint($error);
		        }
		        else
		        {
		        	//upload image and update ids in db
		            $fileInfo = $this->upload->data();//get uploaded file info here
		           	$images=$fileInfo['full_path'];
		            $imageupload = \Cloudinary\Uploader::upload($images);
		            $img[]=$imageupload;

		            //insert into document table
		           // $str= substr($imageupload['secure_url'], strpos($imageupload['secure_url'], 'upload/'));
		            $str=explode('upload/', $imageupload['secure_url']);
		            $inp['doc_path']=$str[1];
		            $inp['is_active']=true;
		           	$this->documents->insert($inp);
					$document_id=$this->db->insert_id();
					//insert in to lnk table
					$inp1['document_id']=$document_id;
					$inp1['product_id']=$product_id;
					$this->lnk_produt_to_docs->insert($inp1);
		            unlink($images);
		        }
         	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}*/
	/*end of product page */



	/*public function story_list()


	public function add_update_story()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('b_fname', 'g_fname', 'email','style','wedding_day', 'purchased_from_store','weddingstory_desc','service_id','service_name','service_website'), $posted_data);
		if(isset($posted_data['store_id']))
		{
			$this->store->update($posted_data['story_id'], $required_array);
		}else{
			$this->stories->insert($required_array);
			$product_id=$this->db->insert_id();//story_id aka product_id
		}


		if($_FILES['userfile']['name'][0]!="")
		{
	    	if(!file_exists("./assets/images/upload/".$product_id))
	    	{
	    		mkdir("./assets/images/upload/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/images/upload/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "gif|jpg|png",//* -for all file types
				'encrypt_name' => FALSE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	     	$files = $_FILES;
	     	$cpt=count($_FILES['userfile']['name']);
	     	//use of foreach here to speed things here
     	 	for($i=0; $i<$cpt; $i++)
            {
            	$_FILES['userfile']['name']= $files['userfile']['name'][$i];//keep orginal file name
            	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
            	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
         		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
         		$_FILES['userfile']['size']= $files['userfile']['size'][$i];
         		$config['file_name'] = $_FILES['userfile']['name'];
		      	$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload())
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->mprint($error);
		        }
		        else
		        {
		        	//upload image and update ids in db
		            $fileInfo = $this->upload->data();//get uploaded file info here
		           	$images=$fileInfo['full_path'];
		            $imageupload = \Cloudinary\Uploader::upload($images);
		            $img[]=$imageupload;

		            //insert into document table
		           // $str= substr($imageupload['secure_url'], strpos($imageupload['secure_url'], 'upload/'));
		            $str=explode('upload/', $imageupload['secure_url']);
		            $inp['doc_path']=$str[1];
		           	$this->documents->insert($inp);
					$document_id=$this->db->insert_id();
					//insert in to lnk table
					$inp1['image_id']=$document_id;
					$inp1['story_id']=$product_id;
					$this->lnk_story_to_docs->insert($inp1);
		            unlink($images);
		        }
         	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}




*/
/* manage brands
/* manage brands*/
	/*public function manage_brand($brand_id='')


	public function add_update_brands()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('brand_name'), $posted_data);

		if(isset($posted_data['brand_id']))
		{
			$this->ref_brand->update($posted_data['brand_id'], $required_array);
			$product_id=$posted_data['brand_id'];
			$this->session->set_flashdata('success',  'Brand updated successfully');
		}else{
			$this->ref_brand->insert($required_array);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('success',  'Brand Added successfully');
		}

		//$cpt = count($_FILES['userfile']);
		if($_FILES['userfile']['name'][0]!="")
		{
	    	if(!file_exists("./assets/images/upload/".$product_id))
	    	{
	    		mkdir("./assets/images/upload/".$product_id, 0777, true);
	    	}
			$config = array(
				'upload_path' => "./assets/images/upload/".$product_id."/",
				'overwrite' => TRUE,
				'allowed_types' => "jpg|png|jpeg",//* -for all file types
				'encrypt_name' => TRUE //encrypting the file name
				//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
	     	$this->load->library('upload', $config);
	     	$files = $_FILES;
	     	$cpt=count($_FILES['userfile']['name']);
	     	//use of foreach here to speed things here
     	 	for($i=0; $i<$cpt; $i++)
            {
            	$_FILES['userfile']['name']= $files['userfile']['name'][$i];//keep orginal file name
            	$_FILES['userfile']['type']= $files['userfile']['type'][$i];
            	$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
         		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
         		$_FILES['userfile']['size']= $files['userfile']['size'][$i];
         		$config['file_name'] = $_FILES['userfile']['name'];
		      	$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload())
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->mprint($error);
		        }
		        else
		        {
		        	//upload image and update ids in db
		            $fileInfo = $this->upload->data();//get uploaded file info here
		           	$images=$fileInfo['full_path'];
		            $imageupload = \Cloudinary\Uploader::upload($images);
		            $img[]=$imageupload;

		            //insert into document table
		           // $str= substr($imageupload['secure_url'], strpos($imageupload['secure_url'], 'upload/'));
		            $str=explode('upload/', $imageupload['secure_url']);
		            $inp['doc_path']=$str[1];
		            $inp['is_active']=true;
		           	$this->documents->insert($inp);
					$document_id=$this->db->insert_id();
					//insert in to lnk table
					$inp1['image_id']=$document_id;
					$inp1['brand_id']=$product_id;
					$this->lnk_brands_to_docs->insert($inp1);
		            unlink($images);
		        }
         	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}*/

/*Download section*/
/* download*/
	/*public function exportUsers()
	{
		$subscribers=$this->users->get_many_by('userlevel_id',2);
		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Webmaster Impression Bridal')
				->setLastModifiedBy('Admin')
				->setTitle('UserList')
				->setSubject('All Userlist')
				->setDescription('this file contain all userlist');

		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);

		$spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);

		foreach(range('A','F') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'UserId')
				->setCellValue("B1",'UserEmail')
				->setCellValue("C1",'SignUp Date')
				->setCellValue("D1",'Last Logged')
				->setCellValue("E1",'Zipcode')
				->setCellValue("F1",'Status');

		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub->user_id)
					->setCellValue("B$x",$sub->email_id)
					->setCellValue("C$x",date("jS F Y, g:i a", strtotime($sub->signup_date)))
					->setCellValue("D$x",date("jS F Y, g:i a", strtotime($sub->last_login)))
					->setCellValue("E$x",$sub->zipcode)
					->setCellValue("F$x",(($sub->is_active==true)? "Active" : "Inactive"));
			$x++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Users Information');

		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="subscribers_sheet.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

	}*/

	/*public function exportStyleList()
	{
		$subscribers=$this->tbl_product->get_all_product();
		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Webmaster Impression Bridal')
				->setLastModifiedBy('Admin')
				->setTitle('StyleList')
				->setSubject('All StyleList')
				->setDescription('this file contain all Styles');

		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);

		$spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);

		foreach(range('A','E') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'Style No')
				->setCellValue("B1",'Collection')
				->setCellValue("C1",'Brand')
				->setCellValue("D1",'Season')
				->setCellValue("E1",'Status');

		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub->product_name)
					->setCellValue("B$x",$sub->collection_name)
					->setCellValue("C$x",$sub->brand_name)
					->setCellValue("D$x",$sub->season)
					->setCellValue("E$x",(($sub->is_active==true)? "Active" : "Inactive"));
			$x++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Styles List');

		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Stylelist_sheet.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

	}*/
}
