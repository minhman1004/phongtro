<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');

		if($data['mand'] != null) {
			$data['nguoidung'] = $this->Member_model->getNguoiDung($data['mand']);
			$metadata = array('title' => 'Thông tin chung');
			$this->load->helper('url');
			$this->load->view('main/member/metamember',$metadata);
			$this->load->view('main/member/headermember', $data);
			$this->load->view('main/member/menumember', $data);
			$this->load->view('main/member/info', $data);
			$this->load->view('main/member/footermember');
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

	public function getNguoiDung() {
		$id = $this->input->post('id');
		$result =$this->Member_model->getNguoiDung($id);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function updateNguoiDung() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['sdt'] = $this->input->post('sdt');
		$data['email'] = $this->input->post('email');
		$data['ngaysinh'] = $this->input->post('ngaysinh');
		$data['gioitinh'] = $this->input->post('gioitinh');

		$result = $this->Member_model->updateNguoiDung($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function reload() {
		$id = $this->input->post('id');
		$data = $this->Member_model->getNguoiDung($id);
		if($data != false) echo json_encode($data);
		else echo 'false';
	}

	public function updatePass() {
		$data['id'] = $this->input->post('id');
		$data['pass'] = md5($this->input->post('pass'));
		$result = $this->Member_model->updatePass($data);
		if($result == true) echo json_encode($data);
		else echo 'false';
	}
}