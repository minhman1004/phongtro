<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model("Home_model");
	}

	public function index() {
		// Gọi hàm trong Home_model
        $dsTinhTp = $this->Home_model->getTinhTp();
        $dsQuanHuyen = $this->Home_model->getQuanHuyen();
        $dsPhuongXa = $this->Home_model->getPhuongXa();
        $dsBaiViet = $this->Home_model->getBaiViet();

        $metadata = array('title' => 'Nhà Trọ Việt - Trang Chủ', 'page' => 'home');
        $dataDisplay['tinhtp'] = $dsTinhTp;
        $dataDisplay['quanhuyen'] = $dsQuanHuyen;
        $dataDisplay['phuongxa'] = $dsPhuongXa;
        $dataDisplay['baiviet'] = $dsBaiViet;

		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/home/mainHome', $dataDisplay);
		$this->load->view('primary/mainFooter');
	}

	public function location($id) {
		// Gọi hàm trong Home_model
        $dsTinhTp = $this->Home_model->getTinhTp();
        $dsQuanHuyen = $this->Home_model->getQuanHuyen();
        $dsPhuongXa = $this->Home_model->getPhuongXa();
        $tinhTp = $this->Home_model->getTinhTpOnly($id);
		$dsBvTheoTinhTp = $this->Home_model->getBVKhuVuc($id);

		if(@$tinhTp) $metadata = array('title' => 'NTV - Khu vực '.$tinhTp[0]->TEN, 'page' => 'home');
		else  $metadata = array('title' => 'Nhà Trọ Viêt', 'page' => 'home');

        $dataDisplay['tinhtp'] = $dsTinhTp;
        $dataDisplay['quanhuyen'] = $dsQuanHuyen;
        $dataDisplay['phuongxa'] = $dsPhuongXa;
        $dataDisplay['baiviet'] = $dsBvTheoTinhTp;
        $dataDisplay['tentinh'] = $tinhTp[0];

		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/home/mainHome', $dataDisplay);
		$this->load->view('primary/mainFooter');
	}

	public function search($parameters) {

	}
}