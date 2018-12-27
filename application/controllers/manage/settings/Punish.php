<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Punish extends CI_Controller {
	public function index() {
		$data['loi'] = $this->Punish_model->getLoiViPham();
		$data['mucphat'] = $this->Punish_model->getMucPhat();
		$data['donvi'] = $this->Punish_model->getDonVi();
		$metadata = array('title'=> 'Cài đặt: Quy định lỗi / Mức phạt / Đơn vị');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings/punish', $data);
		$this->load->view('primary/adminFooter');
	}

	public function adddonvi() {
		$data['tendv'] = $this->input->post('tendv');
		$data['kieu'] = $this->input->post('kieu');
		$result = $this->Punish_model->addDonVi($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addMucPhat() {
		$data['tenmd'] = $this->input->post('ten');
		$data['mucdo'] = $this->input->post('mucdo');
		$data['donvi'] = $this->input->post('donvi');
		$result = $this->Punish_model->addMucPhat($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addLoi() {
		$data['ten'] = $this->input->post('ten');
		$data['mota'] = $this->input->post('mota');
		$result = $this->Punish_model->addLoi($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function updateDonVi() {
		$data['id'] = $this->input->post('id');
		$data['tendv'] = $this->input->post('tendv');
		$data['kieu'] = $this->input->post('kieu');
		$result = $this->Punish_model->updateDonVi($data);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function updateMucPhat() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['mucdo'] = $this->input->post('mucphat');
		$data['donvi'] = $this->input->post('donvi');
		$result = $this->Punish_model->updateMucPhat($data);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function updateLoi() {

	}

	public function showDonVi() {
		$donvi = $this->Punish_model->getDonVi();
		if($donvi != false) {
			echo json_encode($donvi);
		}
		else echo 'false';
	}

	public function getDonVi() {
		$data['id'] = $this->input->post('id');
		$result = $this->Punish_model->getMotDonVi($data['id']);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getDSDonVi() {
		$result = $this->Punish_model->getDonVi();
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function showMucPhat() {
		$data['mucphat'] = $this->Punish_model->getMucPhat();
		$data['donvi'] = $this->Punish_model->getDonVi();
		if($data['mucphat'] != false && $data['donvi'] != false) echo json_encode($data);
		else echo 'false';
	}

	public function getMucPhat() {
		$data['id'] = $this->input->post('id');
		$rs['mucphat'] = $this->Punish_model->getMotMucPhat($data['id']);
		$rs['donvi'] = $this->Punish_model->getDonVi();
		if($rs['mucphat'] != false && $rs['donvi'] != false) echo json_encode($rs);
		else echo 'false';
	}
}