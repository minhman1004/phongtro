<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	public function index()
	{
		$viewdata = array();
		$viewdata['error_message'] = "";
			 if($this->input->post("taikhoan") && $this->input->post("matkhau") )
			{
				if ($this->input->post("matkhau") != $this->input->post("nhaplaimatkhau")){
					$error_message = "! Mật khẩu không khớp<br>"; 
					$viewdata = array('error_message' => $error_message);
				} else if($this->nguoidung->checkUser($this->input->post("taikhoan"))){
					$error_message = "Tài khoản đã tồn tại<br>"; 
					$viewdata = array('error_message' => $error_message);
				}
				else if ($this->Users_model->CheckEmail($this->input->post("Email")))
					{
						$error_message = "Email này đã tồn tại<br>"; 
						$viewdata = array('error_message' => $error_message);
					}
				else if ($this->Users_model->CheckSDT($this->input->post("SDT")))
					{
						$error_message = "SDT này đã tồn tại<br>"; 
						$viewdata = array('error_message' => $error_message);
					}
				else {
					$data['TenDN'] = $this->input->post("taikhoan");
					$data['Email'] = $this->input->post("Email");
					$data['MatKhau'] = $this->input->post("matkhau");
					$data['SDT'] = $this->input->post("SDT");
					$data['GioiTinh'] = $this->input->post("gioitinh");
					$data['HoTen'] = null;
					$data['NgaySinh'] = $this->input->post("ngaysinh");
					$data['CMND'] = Null;
					$data['CHUCVU'] = $this->input->post("chucvu");
					$checkbox = $this->input->post("checkbox");
					if($checkbox != 1)
					{
 								$error_message = "Vui lòng chọn 'Tôi đồng ý với điều khoản'";
								$viewdata = array('error_message' => $error_message);
					}
					else
					{
					//echo json_encode($data);
							//echo json_encode($this->User_model->addUser($data));
							$count = $this->Users_model->addUser($data);
							if($count = 1)
							{


								$error_message = "";
								$success_message = "Bạn đã đăng ký thành công!";
								// chuyen mat khau thanh ma md5 trong sql database
								
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
			}

			$metadata = array('title' => 'Register');
			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('main/register/register', $viewdata);
	
		
		}
		
	
}
//ajax get value from option


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */