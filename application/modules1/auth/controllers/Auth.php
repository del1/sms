<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Del 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model','Auth');
	}
	
	public function index() 
	{
		$this->login();
	}

	public function login()
	{
        if (isset($_POST['email'])) 
        {
            $this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
            $this->form_validation->set_rules( 'password', 'Password', 'required|trim' );

            if($this->form_validation->run() !== false){
                $data = array(
                    'email' => $this->input->post('email',TRUE),
                    'password' => $this->input->post('password',TRUE)
                    );
                $login=$this->Auth->M_login($data);
               	if(isset($login['User_Id']))
				{
					redirect('admin/');
					/*if($login['User_Type_Id']==1)
					{
						redirect('admin/');
					}else
					{
						redirect('consultant/');
					}*/
				}else
				{
					if(isset($login['error']))
					{
						$this->session->set_flashdata('error','<p class="alert alert-danger">'.$login['error'].'</p>');	
						 redirect('auth/');
					}
				}
            }else{
                $this->session->set_flashdata('error',  validation_errors('<p class="alert alert-danger">', '</p>'));
                redirect('auth/');
            }
        }else{
        	$data='';
			$view = 'auth/login_view';
			echo Modules::run('template/Auth_Template', $view, $data);	
        }
	}

	public function register()
	{
		if (isset($_POST['email'])) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|callback_isExist_username');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_isExist_email' );
			$this->form_validation->set_rules('password', 'Password', 'trim|required' );
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			if($this->form_validation->run($this) !== FALSE)
			{
				$input=array(
					'user_name'=>$this->input->post('username',TRUE),
					'email_id' =>$this->input->post('email',TRUE),
					'password' =>$this->input->post('password',TRUE),
					'signup_date' => date('Y-m-d H:i:s'),
					'userlevel_id'=>2,
					'last_updated'=>date('Y-m-d H:i:s'),
					'is_active'=>'false',
					'is_secure_request'=>'GzPq97' //random token
				);
				$id=$this->Auth->m_register($input);
				if($id)
				{
					$this->session->set_flashdata('success',  'Registration Successfull, We will review your request soon');
					redirect('login');
				}else
				{
					$this->session->set_flashdata('error',  '<p class="alert alert-danger">There was error occured, Please try later</p>');
					redirect('register');
				}
			}else{
				$this->session->set_flashdata('error',  validation_errors('<p class="alert alert-danger">', '</p>'));
    			redirect('register');
			}
		}else{
			$data='';
			$view = 'Auth/register_view';
			echo Modules::run('template/Auth_Template', $view, $data);
		}
	}

	public function isExist_username($username)
    {//write logic
    	$data=$this->Auth->isExist('user_name',$username);
        if (!empty($data))
        {
            $this->form_validation->set_message('isExist_username', $username.' is not available');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	public function isExist_email($email_id)
    {//write logic
        $data=$this->Auth->isExist('email_id',$email_id);
        if (!empty($data))
        {
            $this->form_validation->set_message('isExist_email', $email_id.' is not available');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }


	public function logOut()
	{
		$User_Id=$this->session->userdata("User_Id");
		if(@$User_Id)
		{
			//$this->Auth_model->logout($User_Id);
		}		
		$this->session->sess_destroy();
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.	   	
		$this->session->set_flashdata('success','You are successfully Logged out');	
		redirect('auth/');
	}

	public function test()
	{
		$msg = 'mahesh';
		$key='ss';
		$encrypted_string = $this->encrypt->encode($msg.$key);
		echo $encrypted_string;
		$plaintext_string = $this->encrypt->decode($encrypted_string,$key);
		echo "<br>".$plaintext_string;
	}
}