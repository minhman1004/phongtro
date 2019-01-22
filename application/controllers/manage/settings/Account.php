<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	// Loai tai khoan
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');
		
		if($data['mand'] != null && ($data['quyen'] == 21 || $data['quyen'] == 22 || $data['quyen'] == 23)) {
			$chucvu = $this->Account_model->getChucVu();
			$data['chucvu'] = $chucvu;
			$metadata = array('title'=>'Cài đặt: Loại tài khoản');
			$this->load->helper('url');
			$this->load->view('primary/metaadmin', $metadata);
			$this->load->view('primary/adminHeader');
			$this->load->view('primary/adminMenu');
			$this->load->view('admin/settings/account', $data);
			$this->load->view('primary/adminFooter');
		}
		else {
			$this->comeback();
		}
	}

	public function comeback() {
		$metadata = array('title' => 'Lỗi');
		$this->load->helper('url');
		$this->load->view('main/member/metamember',$metadata);
		$this->load->view('errors/comback');
	}

	// Add Account
	public function addaccount() {
		$data['ten'] = $this->input->post('ten');
		$data['phanloai'] = $this->input->post('phanloai');
		$data['mota'] = $this->input->post('mota');
		$cmp = $this->Account_model->compareTen($data['ten']);
		if($cmp == false) {
			echo 'ten';
		}
		else {
			$data['trangthai'] = $this->input->post('trangthai');
			$result = $this->Account_model->addChucVu($data);
			echo $result;
		}
	}

	public function updateaccount() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['mota'] = $this->input->post('mota');
		$data['phanloai'] = $this->input->post('phanloai');
		$data['trangthai'] = $this->input->post('trangthai');
		$result = $this->Account_model->updateChucVu($data);
		echo $result;
	}

	// Show
	public function showChucVu() {
		$chucvu = $this->Account_model->getChucVu();
		echo json_encode($chucvu);
	}
}