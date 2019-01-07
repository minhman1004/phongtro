<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Call Publish_model

	}

	public function index()
    {
        // if(!empty($_FILES['userFiles']['name']))
        // {
        //     $filesCount = count($_FILES['userFiles']['name']);
        //     for($i = 0; $i < $filesCount; $i++)
        //     {
        //         $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
        //         $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
        //         $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
        //         $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
        //         $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

        //         $uploadPath = 'img/';
        //         $config['upload_path'] = $uploadPath;
        //         $config['allowed_types'] = 'gif|jpg|png|PNG';
                
        //         $this->load->library('upload', $config);
        //         $this->upload->initialize($config);
        //         if($this->upload->do_upload('userFile')){
        //             $fileData = $this->upload->data();
        //             $pathArr[$i]=$uploadPath.$fileData['file_name'];
        //         } 
        //         else{
        //             echo $this->upload->display_errors();
        //         }
        //     }
        //     $path = implode(",", $pathArr);
        //     //Insert file information into the database
        //     $insert = $this->restaurant_m->uploadImage($path, 2);
        // }        
        // $imageArr = $this->restaurant_m->getImage(2);
        // if(!empty($imageArr[0]->HinhAnh)){
        //     $images = explode(",", $imageArr[0]->HinhAnh);
        //     //echo $imageArr[0];
        // }
        // else
        // {
        //     $images ='';
        // }


        // lay thong tin nha tro da co
        //session->userdata("MAND");
        // check login

        $MAND = $this->session->userdata("MAND");
 		if($MAND != null)
 		{
				// Lay thong tin dia diem
				$dsTinhTp = $this->Publish_model->getTinhTp();
				$dsQuanHuyen = $this->Publish_model->getQuanHuyen();
				$dsPhuongXa = $this->Publish_model->getPhuongXa();
				$dsDuong = $this->Publish_model->getDiaChiTT();
				$dsNhaTro = $this->Publish_model->getNhaTro($MAND);
				$nguoidung = $this->Publish_model->getNguoiDung($MAND);


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
				// $datadisplay['images'] = $images;


					
				$metadata = array('title' => 'Đăng tin');
				$this->load->helper('url');
				$this->load->view('primary/meta', $metadata);
				$this->load->view('primary/mainHeader');
				$this->load->view('primary/mainMenu');
				$this->load->view('main/post/publish', $datadisplay);
				$this->load->view('primary/mainFooter');
			}
			else
			{
				redirect(base_url() ."login");
			}

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

	public function hienthint() {
				$id = $this->input->post('id');
				$mattp = $this->Publish_model->getMotNhaTro($id);
				$maquanhuyen = $this->Publish_model->getMotQuanHuyen($mattp);
				$maphuongxa = $this->Publish_model->getMotPhuongXa($mattp);
				$maduong = $this->Publish_model->getMotDuong($mattp);
				$MAND = $this->session->userdata("MAND");
				$dsTinhTp = $this->Publish_model->getTinhTp1($id);
				$dsQuanHuyen = $this->Publish_model->getQuanHuyen1($id);
				$dsPhuongXa = $this->Publish_model->getPhuongXa1($id);
				$dsDuong = $this->Publish_model->getDiaChiTT1($id);	
				$dsNhaTro = $this->Publish_model->getNhaTro($MAND);
				$getnhatro1_ = $this->Publish_model->getnhatro1($id);
				$position = $this->Room_model->getPosition($id);

		
				// Lay du lieu
				$datadisplay['tinhtp'] = $dsTinhTp;
				$datadisplay['quanhuyen'] = $dsQuanHuyen;
				$datadisplay['phuongxa'] = $dsPhuongXa;
				$datadisplay['diachitt'] = $dsDuong;
				$datadisplay['motquanhuyen1'] = $maquanhuyen;
				$datadisplay['maphuongxa1'] = $maphuongxa;
				$datadisplay['motduong1'] = $maduong;
				$datadisplay['getnhatro1'] = $getnhatro1_;
				$datadisplay['position_gg'] = $position;
				echo json_encode($datadisplay);
		
	}
	public function ketqua()
	{
		$dsTinhTp = $this->Publish_model->getTinhTp();
		$data['thuan'] = $dsTinhTp;
		echo ($data);
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
