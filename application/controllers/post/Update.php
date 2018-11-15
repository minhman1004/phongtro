<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model("Update_model");
	}

	public function index() {
		$chucvu = $this->session->userdata("ChuVu");
		print_r($chucvu);
		
		$slug = $_GET['name'];
		$id = getId($slug);
		$name = getName($slug);

		// Get danh sach tinh tp, quan huyen, phuong xa, duong xa
        $dsTinhTp = $this->Update_model->getTinhTp();
        $dsQuanHuyen = $this->Update_model->getQuanHuyen();
        $dsPhuongXa = $this->Update_model->getPhuongXa();
        $dsDiaChiTT = $this->Update_model->getDiaChiTT();

        // Sắp xếp danh sách địa điểm
        usort($dsQuanHuyen, "cmp");
        usort($dsPhuongXa, "cmp");
        usort($dsDiaChiTT, "cmp");

        // Lấy thông tin chi tiết bài viết cụ thể
        $baiviet = $this->Update_model->getBaiViet($id, $name);

        // Cập nhật bài viết
        if(isset($_POST['capnhat'])) {
	        // Lay thong tin duoc nhap
	        $tieude = $this->input->post("tieude");
	        $gia = $this->input->post("gia");
	        $ma_tinhtp = $_POST["tinhtp"];
	        $ma_quanhuyen = $this->input->post("quanhuyen");
	        $ma_phuongxa = $this->input->post("phuongxa");
	        $ma_duong = $this->input->post("duong");
	        $dctd = $this->input->post("dctd");
	        $mota = $this->input->post("motathem");

	        $dtBaiViet['mabv'] = $baiviet[0]->MABV;
	        $dtBaiViet['tieude'] = $tieude;

	        $dtPT['gia'] = $gia;
	        $dtPT['mapt'] = $baiviet[0]->MAPT;
	        
	        $dtNT['dctd'] = $dctd;
	        $dtNT['mant'] = $baiviet[0]->MANT;
	        
	        $dtCTBV['mota'] = $mota;
	        $dtCTBV['mabv'] = $baiviet[0]->MABV;

	        // print_r($data['tieude']);
	        // Update bai viet
	        $this->Update_model->updateBaiViet($dtBaiViet);

	        $newSlug = $baiviet[0]->MABV.'-'.postSlug($tieude);
	        $this->Update_model->updateCTBV($dtCTBV);
	        $this->Update_model->updateNhaTro($dtNT);
	        $this->Update_model->updatePhongTro($dtPT);

			header("Location: ".base_url().'post/detail?name='.$newSlug, true);
        }

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

// Hàm sắp xếp đối tượng
function cmp($a, $b) {
	return strcmp($a->TEN, $b->TEN);
}