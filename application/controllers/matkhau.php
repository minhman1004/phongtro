<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class matkhau extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}
	public function index() {


			$viewdata = array();
			$viewdata['error_message'] = "";
			 if($this->input->post("matkhau") && $this->input->post("matkhaucu") && $this->input->post("nhaplaimatkhau") )
			{
				$matkhau = md5($this->input->post("matkhaucu"));
				$MAND = $this->session->userdata("MAND");
				if ($this->input->post("matkhau") != $this->input->post("nhaplaimatkhau"))
				{
					$error_message = "! Mật khẩu không khớp<br>"; 
					$viewdata = array('error_message' => $error_message);
				} 
				
				//echo json_encode($MAND);
				//else if ($this->Users_model->CheckSDT($this->input->post("SDT")))
				else if($this->nguoidung->CheckMatKhau($MAND,$matkhau)){
					$error_message = "Mật khẩu cũ sai<br>"; 
					$viewdata = array('error_message' => $error_message);
				}				
				else {
					$matkhau = md5($this->input->post("matkhau"));
					$matkhau= $this->input->post("matkhau");
						$count = $this->Users_model->updatePass($MAND,$matkhau);
							if($count = 1)
							{


								$error_message = "";
								$success_message = "Thay đổi mật khẩu thành công!";
								// chuyen về trang chủ.
								redirect(base_url() ."member/info");
								// chuyen mat khau thanh ma md5 trong sql database
								
								$viewdata = array('success_message' => $success_message);
								$viewdata["error"] = false;
								
							}
							else
							{
								$error_message = "Thay đổi mật khẩu không thành công";
								$viewdata = array('error_message' => $error_message);
								$viewdata["error"] = true;
							}
					}
					
				}
			

			$viewdata = array();
			$viewdata["error"] = true;
			$metadata = array('title' => 'matkhau');
			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('main/matkhau/pass',$viewdata);
			//$this->load->view('main/register/register')
		
		}
		
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */