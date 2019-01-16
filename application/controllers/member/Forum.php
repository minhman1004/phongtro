<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');

		$metadata = array('title' => 'Forum');
		$this->load->helper('url');
		$this->load->view('main/member/metamember',$metadata);
		$this->load->view('main/member/headermember');
		$this->load->view('main/member/menumember');
		$this->load->view('main/member/forum', $data);
		$this->load->view('main/member/footermember');
	}

	public function getAllNhaTro() {
		$mand = $this->input->post('mand');
		$result = $this->Member_model->getAllNhaTro($mand);
		if($result != false) {
			echo json_encode($result);
		}
		else echo 'false';
	}

	// public function getAllTopic($mant) {
	// 	$result = $this->Member_model->getAllTopic($mant);
	// 	if($result != false) echo json_encode($result);
	// 	else echo 'false';
	// }
}