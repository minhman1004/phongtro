<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Find extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Tìm kiếm phòng trọ đã, đang ở.');
		$this->load->helper('url');
		$this->load->view('main/forum/meta', $metadata);
		$this->load->view('main/forum/header');
		$this->load->view('main/forum/menu');
		$this->load->view('main/forum/find');
		$this->load->view('main/forum/footer');
	}

	public function getNguoiTro() {
		$cmnd = $this->input->post('cmnd');
		$sdt = $this->input->post('sdt');
		$result = $this->Forum_model->getNguoiTro($cmnd, $sdt);
		if($result != false) echo json_encode($result);
		else {
			$kq_cmnd = $this->Forum_model->getNguoiCMND($cmnd);
			if($kq_cmnd != false) {
				echo 'cmndcorrect_sdtincorrect';
			}
			else {
				echo 'cmndnull';
			}
		}
	}
}