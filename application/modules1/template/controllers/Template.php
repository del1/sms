<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('parser');
	}


	public function Auth_Template($view, $data) {
	  	$this->load->view('Auth/Auth_header');
		echo $data = $this->load->view($view,$data);
		$this->load->view('Auth/Auth_footer');
	}

	public function admin_template($view, $data) {
	  	$this->load->view('Admin/Admin_header',$data);
	  	$this->load->view('Admin/Admin_left_sidebar',$data);
		$this->load->view($view,$data);
		$this->load->view('Admin/Admin_footer');
	}
}