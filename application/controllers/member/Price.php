<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');
		if($data['mand'] != null && $data['quyen'] == 1) {
			$metadata = array('title' => 'Bảng chi phí');
			$this->load->helper('url');
			$this->load->view('main/member/metamember',$metadata);
			$this->load->view('main/member/headermember', $data);
			$this->load->view('main/member/menumember', $data);
			$this->load->view('main/member/payment/price', $data);
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