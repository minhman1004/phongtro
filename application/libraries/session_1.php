<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session_1{

	public function __construct() {
		
	}
	//Login
	public function login($user)
	{
		// var_dump($user);
		$data = array(
			'MAND'  => $user[0]->MAND,
			'TenDN' => $user[0]->TenDN,
			'MatKhau' => $user[0]->MatKhau,
			'ChucVu' => $user[0]->PL,
			'HoTen' => $user[0]->HOTEN,
			'Quyen' => $user[0]->MAVT
			
		);
		$ci = &get_instance();
		$ci->session->set_userdata($data);
		$ci->session->userdata("TenDN");
		$ci->session->userdata("ChucVu");
		$ci->session->userdata("MAND");
		$ci->session->userdata("HoTen");
		$ci->session->userdata("Quyen");
	}
	
	// Logout 
	public function logout()
	{
		$ci = &get_instance();
		$ci->session->sess_destroy();
	}

}




