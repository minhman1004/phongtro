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
		// $this->load->view('admin/user/alluser', $data);
		// $this->load->view('admin/user/normaluser', $data);
		// $this->load->view('admin/user/adminuser', $data);
		$this->load->view('primary/adminFooter');
	}

	public function updateUserPass() {
		$data['id'] = $this->input->post('id');
		$data['hoten'] = $this->input->post('hoten');
		$data['email'] = $this->input->post('email');
		$data['sdt'] = $this->input->post('sdt');
		$data['cmnd'] = $this->input->post('cmnd');
		$data['ngaysinh'] = $this->input->post('ngaysinh');
		$data['chucvu'] = $this->input->post('chucvu');
		$data['gioitinh'] = $this->input->post('gioitinh');
		$data['matkhau'] = $this->input->post('matkhau');
		$result = $this->Users_model->updateUserPass($data);
		if($result != false && $result > 0) {
			echo 'true';
		}
		else echo 'false';
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

	public function loadRow() {
		$id['id'] = $this->input->post('id');
		$data['chucvu'] = $this->Users_model->getChucVu();
		$data['user'] = $this->Users_model->getUser($id['id']);
		echo json_encode($data);
	}

	public function addUser() {
		$data['hoten'] = $this->input->post('hoten');
		$data['email'] = $this->input->post('email');
		$data['sdt'] = $this->input->post('sdt');
		$data['gioitinh'] = $this->input->post('gioitinh');
		$data['cmnd'] = $this->input->post('cmnd');
		$data['chucvu'] = $this->input->post('chucvu');
		$data['ngaysinh'] = $this->input->post('ngaysinh');
		$data['tendn'] = $this->input->post('tendn');
		$data['matkhau'] = $this->input->post('matkhau');

		$result = $this->Users_model->addUser($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function checkTenDN() {
		$data['tendn'] = $this->input->post('tendn');
		$result = $this->Users_model->checkTenDN($data['tendn']);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function user() {
		$data['id'] = $this->input->post('id');
		$result = $this->Users_model->getUser($data['id']);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}
}