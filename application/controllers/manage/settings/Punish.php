<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Punish extends CI_Controller {
	public function index() {
		$data['loi'] = $this->Punish_model->getLoiViPham();
		$data['mucphat'] = $this->Punish_model->getMucPhat();
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

	public function addmucphat() {
		$data['tenmd'] = $this->input->post('tenmd');
		$data['mucdo'] = $this->input->post('mucdo');
		$data['donvi'] = $this->input->post('donvi');
		$result = $this->Punish_model->addMucDo($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addloi() {
		$data['ten'] = $this->input->post('ten');
		$data['mota'] = $this->input->post('mota');
		$result = $this->Punish_model->addLoi($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function updateDonvi() {

	}

	public function updateMucDo() {

	}

	public function updateLoi() {

	}

	public function showDonVi() {
		$donvi = $this->Punish_model->getDonVi();
		if($donvi != false) {

		}
	}

	public function getDonVi() {
		$data['id'] = $this->input->post('id');
		$result = $this->Punish_model->getMotDonVi($data['id']);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}
}