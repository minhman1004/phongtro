<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$viewdata = array();
		$viewdata['error_message'] = "";
			 if($this->input->post("username") && $this->input->post("matkhau") )
			{
				if ($this->input->post("matkhau") != $this->input->post("matkhaulai")){
					$error_message = "Password không khớp<br>"; 
					$viewdata = array('error_message' => $error_message);
				} else if($this->nguoidung->checkUser($this->input->post("username"))){
					$error_message = "Username đã tồn tại<br>"; 
					$viewdata = array('error_message' => $error_message);
				}
				else {
					$tendn = $this->input->post("username");
					$matkhau = $this->input->post("matkhau");
					$email = $this->input->post("email");
					$SDT = $this->input->post("sdt");
					$Gioitinh = $this->input->post("gioitinh");
					$CMND =null;
					$chucvu = null;					
					
					$count = $this->nguoidung->addNguoiDung($tendn, $matkhau,$email, $SDT, $Gioitinh,$CMND, $chucvu);
					//echo $count;
					if($count == 1)
					{


						$error_message = "";
						$success_message = "Bạn đã đăng ký thành công!";
						$viewdata = array('success_message' => $success_message);
						$viewdata["error"] = false;
						
					}
					else
					{
						$error_message = "Đăng ký không thành công";
						$viewdata = array('error_message' => $error_message);
						$viewdata["error"] = true;
					}
					
				}
			}

			
			$metadata = array('title' => 'Login');
			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('main/register/register', $viewdata);
	
		
		}
		
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */