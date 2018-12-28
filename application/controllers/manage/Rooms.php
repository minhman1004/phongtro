<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
	public function index() {
		$data['tinhtp'] = $this->Home_model->getTinhTp();
		$data['quanhuyen'] = $this->Home_model->getQuanHuyen();
		$data['phuongxa'] = $this->Home_model->getPhuongXa();
		$data['duong'] = $this->Room_model->getDuong();
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['nhatro'] = $this->Room_model->getNhaTro();
		$metadata = array('title'=>'Quản trị: Nhà trọ');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/rooms', $data);
		$this->load->view('primary/adminFooter');
	}

	public function getDiaChi() {
		$data['tinhtp'] = $this->Home_model->getTinhTp();
		$data['quanhuyen'] = $this->Home_model->getQuanHuyen();
		$data['phuongxa'] = $this->Home_model->getPhuongXa();
		$data['duong'] = $this->Room_model->getDuong();
		$data['chutro'] = $this->Room_model->getChuTro();
		echo json_encode($data);
	}

	public function addNhaTroDuong() {
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['duong'] = $this->input->post('duong');
		$data['diachi'] = $this->input->post('diachi');

		$result = $this->Room_model->addNhaTroDuong($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addNhaTro() {
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['diachi'] = $this->input->post('diachi');

		$result = $this->Room_model->addNhaTro($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function showNhaTro() {
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['nhatro'] = $this->Room_model->getNhaTro();
		echo json_encode($data);
	}

	public function getNhaTroVaDiaChi() {
		$id = $this->input->post('id');
		$data['nhatro'] = $this->Room_model->getMotNhaTro($id);
		$data['tinhtp'] = $this->Home_model->getTinhTp();
		$data['quanhuyen'] = $this->Home_model->getQuanHuyen();
		$data['phuongxa'] = $this->Home_model->getPhuongXa();
		$data['duong'] = $this->Room_model->getDuong();
		$data['chutro'] = $this->Room_model->getChuTro();
		echo json_encode($data);
	}

	public function updateNhaTroDuong() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['duong'] = $this->input->post('duong');
		$data['diachi'] = $this->input->post('diachi');

		$result = $this->Room_model->updateNhaTroDuong($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function updateNhaTro() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['diachi'] = $this->input->post('diachi');

		$result = $this->Room_model->updateNhaTro($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function getNhaTroChuTro() {
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['nhatro'] = $this->Room_model->getNhaTro();
		echo json_encode($data);
	}

	public function getPhongTro() {
		
	}
}