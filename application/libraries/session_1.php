<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session_1{

	public function __construct() {
		
	}
	public function login($user)
	{
		// var_dump($user);
		$data = array(
			'MAND'  => $user[0]->MAND,
			'TenDN' => $user[0]->TenDN,
			'MatKhau' => $user[0]->MatKhau,
			'ChuVu' => $user[0]->ChucVu
			
		);
		$ci = &get_instance();
		$ci->session->set_userdata($data);
		$ci->session->userdata("TenDN");
		$ci->session->userdata("ChuVu");
		
	}
	public function logout()
	{
		$ci = &get_instance();
		$ci->session->sess_destroy();
	}

}




