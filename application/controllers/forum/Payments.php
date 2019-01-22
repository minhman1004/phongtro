<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payments extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Tìm kiếm phòng trọ đã, đang ở.');
		$this->load->helper('url');
		$this->load->view('main/forum/meta', $metadata);
		$this->load->view('main/forum/header');
		$this->load->view('main/forum/menu');
		$this->load->view('main/forum/payments');
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

	public function getThongTinTro() {
		$mano = $this->input->post('mano');
		$result = $this->Forum_model->getPhongTro2($mano);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getHoaDon() {
		$mapt = $this->input->post('mapt');
		$thang = intval($this->input->post('thang'));
		$nam = intval($this->input->post('nam'));
		$result = $this->Forum_model->getHoaDon($mapt, $thang, $nam);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getPhongTro() {
		$mapt = $this->input->post('mapt');
		$result = $this->Forum_model->getPhongTro($mapt);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}
}