<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		if($data['mand'] != null) {
			$data['baiviet'] = $this->Member_model->getBaiViet($data['mand']);
			$metadata = array('title' => 'Danh sách bài viết');
			$this->load->helper('url');
			$this->load->view('main/member/metamember',$metadata);
			$this->load->view('main/member/headermember', $data);
			$this->load->view('main/member/menumember', $data);
			$this->load->view('main/member/posts', $data);
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
}