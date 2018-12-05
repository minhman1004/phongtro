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
		$this->load->view('admin/user/users', $data);
		$this->load->view('admin/user/alluser', $data);
		$this->load->view('admin/user/normaluser', $data);
		$this->load->view('admin/user/adminuser', $data);
		$this->load->view('primary/adminFooter');
	}

	public function updateUser() {
		$data['id'] = $this->input->post('id');
		$data['hoten'] = $this->input->post('hoten');
		$data['email'] = $this->input->post('email');
		$data['sdt'] = $this->input->post('sdt');
		$data['cmnd'] = $this->input->post('cmnd');
		$data['ngaysinh'] = $this->input->post('ngaysinh');
		$data['chucvu'] = $this->input->post('chucvu');
		$data['gioitinh'] = $this->input->post('gioitinh');
		$result = $this->Users_model->updateUser($data);
		if($result != false && $result > 0) {
			echo 'true';
		}
		else echo 'false';
	}

	public function showUser() {
		$dsUsers = $this->Users_model->getAllUser();
		$chucvu = $this->Users_model->getChucVu();

		$data['users'] = $dsUsers;
		$data['chucvu'] = $chucvu;
		echo json_encode($data);
	}
}