<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// Gọi model Home_model
		$this->load->Model("Home_model");

		// Gọi hàm trong Home_model
        $dsTinhTp = $this->Home_model->getTinhTp();
        $dsQuanHuyen = $this->Home_model->getQuanHuyen();
        $dsPhuongXa = $this->Home_model->getPhuongXa();
        // $dsBaiViet = $this->Home_model->getBaiViet();

        $metadata = array('title' => 'Nhà Trọ Việt - Trang Chủ', 'page' => 'home');
        $dataDisplay['tinhtp'] = $dsTinhTp;
        $dataDisplay['quanhuyen'] = $dsQuanHuyen;
        $dataDisplay['phuongxa'] = $dsPhuongXa;

		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/home/mainHome', $dataDisplay);
		$this->load->view('primary/mainFooter');
	}
}