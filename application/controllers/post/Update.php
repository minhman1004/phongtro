<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model("Update_model");
	}

	public function index() {
		$slug = $_GET['name'];
		$id = getId($slug);
		$name = getName($slug);

		// Get danh sach tinh tp, quan huyen, phuong xa, duong xa
        $dsTinhTp = $this->Update_model->getTinhTp();
        $dsQuanHuyen = $this->Update_model->getQuanHuyen();
        $dsPhuongXa = $this->Update_model->getPhuongXa();
        $dsDiaChiTT = $this->Update_model->getDiaChiTT();
        $baiviet = $this->Update_model->getBaiViet($id, $name);

        if($baiviet != false) {
			$metadata = array('title' => 'Chỉnh sửa: '.$baiviet[0]->TIEUDE);
			$datadisplay['tinhtp'] = $dsTinhTp;
			$datadisplay['quanhuyen'] = $dsQuanHuyen;
			$datadisplay['phuongxa'] = $dsPhuongXa;
			$datadisplay['diachitt'] = $dsDiaChiTT;
			$datadisplay['baiviet'] = $baiviet[0];

			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('primary/mainHeader');
			$this->load->view('primary/mainMenu');
			$this->load->view('main/post/update', $datadisplay);
			$this->load->view('primary/mainFooter');
        }
        else {
			header("Location: https://google.com", true);
		}
	}
}

// Hàm lấy id trong đường dẫn
function getId($slug) {
	$slugLength = strlen($slug);
	$id = '';
	$i = 0;
	while($slug[$i] != '-') {
		$id .= $slug[$i];
		$i ++;
	}
	return $id;
}

// Hàm lấy tên bài viết trong đường dẫn
function getName($slug) {
	$id = getId($slug).'-';
	return str_replace($id, '', $slug);
}