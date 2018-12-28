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
}