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
		 $this->check_login(); // kiểm tra nếu đã đăng nhập 

				$taikhoan = $this->input->post("taikhoan");
				$matkhau = $this->input->post("matkhau");
				$viewdata= array();
				// kiểm tra xem có đúng tài khoản mật khẩu nhập vào không.	
				if($taikhoan!= null && matkhau !=null)
				{
				
				 	$user = $this->nguoidung->checkLogin($taikhoan,$matkhau);
				 	if($user !=null)
					{
						   $this->session_1->login($user);
						   //Get session
						   $chucvu = $this->session->userdata("ChuVu");
						   //echo ($chucvu);
						   redirect(base_url() ."member/info");
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
		    $this->session->logout();
			redirect(base_url()."login" );
		    }


}
