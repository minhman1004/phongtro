<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Call Publish_model

	}

	public function index() {
		// hinh anh
		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'img/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $pathArr[$i]=$uploadPath.$fileData['file_name'];
                } else{
                	echo $this->upload->display_errors();
                }
            }
            $imageArr = $this->quanlynhatro->getImage(1);
			if(!empty($imageArr[0]->HINHANH)){
				$images = explode(",", $imageArr[0]->HINHANH);
				foreach ($images as $ima) {
					unlink($ima);
				}
			}
            $path = implode(",", $pathArr);


            //Insert file information into the database
            $insert = $this->sdf->uploadImage('thuan', 1);
        }
        $imageArr = $this->quanlynhatro->getImage(1);
        echo json_encode($imageArr[0]->HINHANH);
		if(!empty($imageArr[0]->HINHANH)){
			$images = explode(",", $imageArr[0]->HINHANH);
			//echo $imageArr[0];
		}
		// Lay thong tin dia diem
		$dsTinhTp = $this->Publish_model->getTinhTp();
		$dsQuanHuyen = $this->Publish_model->getQuanHuyen();
		$dsPhuongXa = $this->Publish_model->getPhuongXa();
		$dsDuong = $this->Publish_model->getDiaChiTT();
		$dsNhaTro = $this->Publish_model->getNhaTro(2);
		$nguoidung = $this->Publish_model->getNguoiDung(2);

		// Sap xep du lieu dia diem
		usort($dsQuanHuyen, 'cmp');
		usort($dsPhuongXa, 'cmp');
		usort($dsDuong, 'cmp');

		// Lay du lieu
		$datadisplay['tinhtp'] = $dsTinhTp;
		$datadisplay['quanhuyen'] = $dsQuanHuyen;
		$datadisplay['phuongxa'] = $dsPhuongXa;
		$datadisplay['diachitt'] = $dsDuong;
		$datadisplay['nhatro'] = $dsNhaTro;
		$datadisplay['filterQH'] = array_filter($dsQuanHuyen, 'filterQuanHuyen');
		$datadisplay['filterPX'] = array_filter($dsPhuongXa, 'filterPhuongXa');
		$datadisplay['nguoidung'] = $nguoidung[0];
		$datadisplay['images'] = $images;



		$metadata = array('title' => 'Đăng tin');
		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/post/publish', $datadisplay);
		$this->load->view('primary/mainFooter');

		// Publish bai viet
		// if(isset($_POST['dangtin'])) {
		// 	// Lay du lieu torng input
		// 	$date = date_format(new Datetime(), 'd/m/Y H:i:s');
		// 	$inTieuDe = $this->input->post('tieude');
		// 	$inGia = $this->input->post('giachothue');
		// 	$inTinhTp = $this->input->post('tinhtp');
		// 	$inQuanHuyen = $this->input->post('quanhuyen');
		// 	$inPhuongXa = $this->input->post('phuongxa');
		// 	$inDuong = $this->input->post('duong');
		// 	$inDCTD = $this->input->post('dctd');
		// 	$inMoTa = $this->input->post('mota');

		// 	// Bai viet
		// 	$dtBaiViet['TIEUDE'] = $inTieuDe;
		// 	$dtBaiViet['TRANGTHAI'] = 'Đang kiểm duyệt';
		// 	$dtBaiViet['TGDANG'] = $date;

		// 	// Chi tiet bai viet

		// 	// Nha tro

		// 	// Phong tro
		// }
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
