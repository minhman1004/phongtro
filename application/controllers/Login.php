<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}

	public function check_login() {
        if (MAND){
            redirect(base_url() );
        }
    }

	public function index() {

				$taikhoan = $this->input->post("taikhoan");
				$matkhau = $this->input->post("matkhau");
				$viewdata= array();
				if($taikhoan == null && $matkhau == null)
				{
					echo ("aaaaa");
				}
				else
				{
					
					if($user = $this->nguoidung->checkLogin($taikhoan,$matkhau))
					{
						   $this->session_1->login($user);
						   $TenDN = $this->session->userdata("TenDN");
						   $chucvu = $this->session->userdata("ChuVu");

					       redirect(base_url() );
					}
					else
						 $viewdata["error"] = true;
				}
		
		$metadata = array('title' => 'Login');
		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('main/login/login', $viewdata);

		
	}	
		  public function edit_info()
		    {
		        
		    }
		    
		    public function logout() {
		        $this->session_info_login->logout();
			redirect(base_url()."login" );
		    }


}
