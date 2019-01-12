<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Saigon');
class Current extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Tìm kiếm phòng trọ đã, đang ở.');
		$this->load->helper('url');
		$this->load->view('main/forum/meta', $metadata);
		$this->load->view('main/forum/header');
		$this->load->view('main/forum/menu');
		$this->load->view('main/forum/current');
		$this->load->view('main/forum/footer');
	}

	public function getPhongTroNhaTro() {
		$id = $this->input->post('id');
		$mano = $this->input->post('mano');
		$rs['phongtro'] = $this->Forum_model->getPhongTro($id);
		if($rs['phongtro'] != false) {
			$rs['nhatro'] = $this->Forum_model->getNhaTro($rs['phongtro'][0]->MANT);
			if($rs['nhatro'] != false) {
				$rs['chutro'] = $this->Forum_model->getChuTro($rs['nhatro'][0]->MAND);
				if($rs['chutro'] != false) {
					$rs['thongtintro'] = $this->Forum_model->getThongTinTro($rs['phongtro'][0]->MAPT, $mano);
					if($rs['thongtintro'] != false)	echo json_encode($rs);
					else echo 'false';
				}
			}
		}
	}

	public function getTienTro() {
		$mapt = $this->input->post('mapt');
		$matt = $this->input->post('matt');
		$result = $this->Forum_model->getTienTro($mapt, $matt);
		if($result != 'false') echo json_encode($result);
		else echo 'false';
	}

	public function getChiPhi() {
		$mant = $this->input->post('mant');
		$result = $this->Forum_model->getChiPhi($mant);
		if($result != 'false') echo json_encode($result);
		else echo 'false';
	}

	public function postTopic() {
		$data['mano'] = $this->input->post('mano');
		$data['mant'] = $this->input->post('mant');
		$data['noidung'] = $this->input->post('content');
		$data['cpbinhluan'] = $this->input->post('allow');
		$data['thich'] = 0;
		$data['kthich'] = 0;
		$data['ngaytao'] = $this->input->post('ngaytao');
		$data['trangthai'] = 'show';
		$data['mand'] = null;

		$result = $this->Forum_model->addTopic($data);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function getTopic() {
		$mant = $this->input->post('mant');
		$result = $this->Forum_model->getTopic($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}
}