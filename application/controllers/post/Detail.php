<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model("Detail_model");
	}

	public function index() {
		$slug = $_GET['name'];
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$id = getId($slug);
		$name = getName($slug);

		$baiviet = $this->Detail_model->getBaiViet($id, $name);
		$vieclam = $this->Detail_model->getViecLam($id, $name);
		$tt =  $this->Detail_model->thongtinnhatro($id);

		if($baiviet != false) {
			$dsTinhTp = $this->Detail_model->getTinhTp();
			
			$data['chitiet'] = $baiviet;
			$data['vieclam'] = $vieclam;
			$data['tinhtp'] = $dsTinhTp;
			$data['tt'] = $tt;
			$data['slug'] = $slug;
			$metadata = array('title' => $baiviet[0]->TIEUDE);
			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('primary/mainHeader', $data);
			$this->load->view('primary/mainMenu', $data);
			$this->load->view('main/post/detail', $data);
			$this->load->view('primary/mainFooter');
		}
		else {
			header("Location: https://google.com", true);
		}
	}

// public function getvieclam($slug)
// {
// 	$slug = $_GET['name'];
// 	$id = getId($slug);
// 	$name = getName($slug);
// 	$vieclam = $this->Detail_model->getBaiViet1($id);
// 	$data['vieclam'] = $vieclam;
// 	echo json_encode($data);

// }

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
