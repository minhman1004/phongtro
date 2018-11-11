<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model("Detail_model");
	}

	public function index() {
		$slug = $_GET['ten'];
		$id = getId($slug);

		$baiviet = $this->Detail_model->getBaiViet($id);
		if(sizeof($baiviet) > 0) {
			$dsTinhTp = $this->Detail_model->getTinhTp();
			
			$data['chitiet'] = $baiviet;
			$data['tinhtp'] = $dsTinhTp;
			$metadata = array('title' => 'NTV - '.$baiviet[0]->TIEUDE);

			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('primary/mainHeader');
			$this->load->view('primary/mainMenu');
			$this->load->view('main/post/detail', $data);
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