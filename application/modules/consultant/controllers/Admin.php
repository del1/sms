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


	/*Genral Function section begins*/


	public function changeAllStatus()
	{
		$model_name=$this->input->post('type',TRUE);
		$pk_id=$this->input->post('pk_id',TRUE);
		$status=$this->input->post('is_active',TRUE);
		$this->$model_name->update($pk_id, array( 'is_active' => $status));
	}

	public function show_stores_list($section='')
	{
		switch ($section) {
			case 'Events':
						$data['page']='Event And Trunk Shows';
						$data['next_action']='store_trunkshows_list';
						break;
			case 'Career':
						$data['page']='Career/Jobs';
						$data['next_action']='store_jobs_list';
						break;
			default:
						$data['page']='Event And Trunk Shows';
						$data['next_action']='store_trunkshows_list';
						break;
		}
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active',true);
		$view = 'admin/admin_show_stores_list_for_action';
		echo Modules::run('template/admin_template', $view, $data);	
	} 
	/*Genral function ends*/


	/*Store
	/*Store Methods*/

	public function stores_list()
	{
		$data['store_list']=$this->store->get_all();
		$data['page']='Store List';
		$view = 'admin/stores/admin_store_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_store($store_id='')
	{
		$data['store_details']='';
		if($store_id)
		{
			$data['store_details']=$this->store->get($store_id);
		}
		$data['page']='Store List';
		$view = 'admin/stores/admin_manage_store_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

	public function changeStoreStatus()
	{
		$this->store->update($this->input->post('store_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}

	public function delete_stores()
	{
		if(isset($_POST['store_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->store->delete($this->input->post('store_id',TRUE));
		}
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
	}
	/*end of store pages*/




	/*About us
	/*About us Methods*/
	public function manage_about_us()
	{
		$data['page']='Manage About-us';
        $data['about_us']=$this->ref_pages->get_section_by_pageId(1);
		$view = 'admin/admin_manage_about_us';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function update_about_us(){
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('About_us_Title', 'Section-1', 'Section-2','Quote'), $posted_data);
		$data['about_us']=$this->tbl_pages->update_about_us($required_array);
	}
	/*end of store pages*/




	/*Event and trunk shows
	/*Event and trunk shows Methods*/

	public function store_trunkshows_list($store_id)
	{
		$data['event_list']=$this->tbl_trunkshows->get_many_by('store_id',$store_id);
		$data['store_details']=$this->store->select('store_name')->get($store_id);
		$data['page']='Event And Trunk Shows';
		$view = 'admin/trunkshows/admin_storewise_trunkshows_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function changeEventStatus()
	{
		$this->tbl_trunkshows->update($this->input->post('event_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}

	public function manage_event($event_id='')
	{
		$data['event_details']='';
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active',true);
		if($event_id)
		{
			$data['event_details']=$this->tbl_trunkshows->get($event_id);
		}
		$data['page']='Event And Trunk Shows';
		$view = 'admin/trunkshows/admin_manage_event_view';
		echo Modules::run('template/admin_template', $view, $data);	
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
	}
	/*end of event pages*/







	/*Career Pages
	/*Career pages*/
	public function store_jobs_list($store_id)
	{
		$data['jobs_list']=$this->tbl_jobs->get_many_by('store_id',$store_id);
		$data['store_details']=$this->store->select('store_name')->get($store_id);
		$data['page']='Jobs list';
		$view = 'admin/careers/admin_storewise_job_list';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_job($job_id="")
	{
		$data['job_details']='';
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active',true);
		if($job_id)
		{
			$data['job_details']=$this->tbl_jobs->get($job_id);
		}
		$data['page']='Jobs list';
		$view = 'admin/careers/admin_manage_job_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function add_update_job()
	{
		$posted_data=$this->security->xss_clean($this->input->post());
		$required_array = elements(array('job_title','job_desc','job_responsibility', 'store_id', 'job_requirements','job_benifit'), $posted_data);
		if(isset($posted_data['job_id']))
		{
			$this->tbl_jobs->update($posted_data['job_id'], $required_array);
		}else{
			$this->tbl_jobs->insert($required_array);
		}
		redirect('admin/Store_jobs_list/'.$posted_data['store_id']);
	}

	public function changeJobStatus()
	{
		$this->tbl_jobs->update($this->input->post('job_id',TRUE), array( 'is_active' => $this->input->post('is_active',TRUE) ));
	}

	public function delete_job()
	{
		if(isset($_POST['job_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->tbl_jobs->delete($this->input->post('job_id',TRUE));
		}
	}
	/*end of career pages*/



	/*
	/*Career Pages
	/*Career pages*/

	public function all_products()
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
	}
	/*end of product page */





	/*
	/*Userlist Pages
	/*Userlist pages*/

	public function userlist()
	{
		$data['page']='Userlist';
		$data['users_list']=$this->users->get_many_by('userlevel_id',2);
		$view = 'admin/userlist/admin_userlist_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}


	public function delete_user()
	{
		if(isset($_POST['user_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->users->delete($this->input->post('user_id',TRUE));
		}
	}

	public function profile($user_id){
		$data['page']='Userlist';
		$data['user_details']=$this->users->get($user_id);
		$view = 'admin/userlist/admin_user_profile_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}



	/*
	/*story Pages
	/*story pages*/

	public function story_list()
	{
		$data['page']='Story List';
		$data['stories_list']=$this->stories->get_all();
		$view = 'admin/stories/admin_stories_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_story($story_id)
	{
		$data['page']='Story Details';
		$data['store_list']=$this->store->select('store_id,store_name')->get_many_by('is_active', 1);
		$data['story_details']=$this->stories->get($story_id);
		$view = 'admin/stories/admin_manage_story_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function delete_story()
	{
		if(isset($_POST['story_id']) && isset($_POST['is_secure_request']) && $this->input->post('is_secure_request',TRUE)=='uKrt)6')
		{
			$this->stories->delete($this->input->post('story_id',TRUE));
		}
	}

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



	public function collection_list()
	{
		$data['collection_list']=$this->ref_coll->get_all();
		$data['brands_list']=$this->ref_brand->get_all();
		$data['catagory_list']=$this->ref_cat->get_all();
		$data['season_list']=$this->ref_season->get_all();
		$data['page']='Collection List';
		$view = 'admin/collection/admin_collection_list_view';
		echo Modules::run('template/admin_template', $view, $data);	
	}

	public function manage_collection($collection_id)
	{
		$collection=$this->ref_coll->get_list_with_images($collection_id);
		if(!empty($collection))
		{
			$data['collectionDetails']=$collection;
			$data['page']='Collection List';
			$view = 'admin/collection/admin_manage_collection_view';
			echo Modules::run('template/admin_template', $view, $data);
		}else{
			redirect('admin/');
		}
	}



/* manage brands
/* manage brands

*/
	public function manage_brand($brand_id='')
	{
		$data['brand_details']='';
		if($brand_id)
		{
			$data['brand_details']=$this->ref_brand->get($brand_id);
			$data['brand_images']=$this->lnk_brands_to_docs->get_brand_images($brand_id);
		}
		$data['page']='Manage brand';
		$view = 'admin/collection/brands/admin_manage_brand_view';
		echo Modules::run('template/admin_template', $view, $data);
	}

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
	}



/*Download section*/
/* download*/
	public function exportUsers()
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

	}

	public function exportStyleList()
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

	}
}
