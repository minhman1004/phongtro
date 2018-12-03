<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index() {
		$dsUsers = $this->Users_model->getAllUser();
		$chucvu = $this->Users_model->getChucVu();


		$metadata = array('title'=>'Quản trị: Người dùng');
		$data['users'] = $dsUsers;
		$data['chucvu'] = $chucvu;
		
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/users', $data);
		$this->load->view('primary/adminFooter');
	}
}