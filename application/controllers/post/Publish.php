<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Call Publish_model
		$this->load->Model("Publish_model");
	}

	public function index() {
		// Lay thong tin dia diem
		$dsTinhTp = $this->Publish_model->getTinhTp();
		$dsQuanHuyen = $this->Publish_model->getQuanHuyen();
		$dsPhuongXa = $this->Publish_model->getPhuongXa();
		$dsDuong = $this->Publish_model->getDiaChiTT();
		$dsNhaTro = $this->Publish_model->getNhaTro();

		// Sap xep du lieu dia diem
		usort($dsQuanHuyen, 'cmp');
		usort($dsPhuongXa, 'cmp');
		usort($dsDuong, 'cmp');

		$datadisplay['tinhtp'] = $dsTinhTp;
		$datadisplay['quanhuyen'] = $dsQuanHuyen;
		$datadisplay['phuongxa'] = $dsPhuongXa;
		$datadisplay['diachitt'] = $dsDuong;
		$datadisplay['nhatro'] = $dsNhaTro;
		$datadisplay['filterQH'] = array_filter($dsQuanHuyen, 'filterQuanHuyen');
		$datadisplay['filterPX'] = array_filter($dsPhuongXa, 'filterPhuongXa');

		$metadata = array('title' => 'Đăng tin');
		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/post/publish', $datadisplay);
		$this->load->view('primary/mainFooter');
	}
}

// Hàm sắp xếp đối tượng
function cmp($a, $b) {
	return strcmp($a->TEN, $b->TEN);
}

// Hàm lọc quận huyện
function filterQuanHuyen($quanhuyen) {
	return $quanhuyen->MATTP == 1;
}

// Hàm lọc phường xã
function filterPhuongXa($phuongxa) {
	return $phuongxa->MAQH == 1;
}
