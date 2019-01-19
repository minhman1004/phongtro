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

        $metadata = array('title' => 'Trang Chủ', 'page' => 'home');

		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
        $data['tinhtp'] = $dsTinhTp;
        $data['quanhuyen'] = $dsQuanHuyen;
        $data['phuongxa'] = $dsPhuongXa;
        $data['baiviet'] = $dsBaiViet;

		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader', $data);
		$this->load->view('primary/mainMenu', $data);
		$this->load->view('main/home/mainHome', $data);
		$this->load->view('primary/mainFooter');
	}

	public function location($id) {
		// Gọi hàm trong Home_model
        $dsTinhTp = $this->Home_model->getTinhTp();
        $dsQuanHuyen = $this->Home_model->getQuanHuyen();
        $dsPhuongXa = $this->Home_model->getPhuongXa();
        $tinhTp = $this->Home_model->getTinhTpOnly($id);
		$dsBvTheoTinhTp = $this->Home_model->getBVKhuVuc($id);

		if(@$tinhTp) $metadata = array('title' => 'Khu vực '.$tinhTp[0]->TEN, 'page' => 'home');
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

	public function search() {
			$ttp = $_GET['mattp'];
			$qh = $_GET['maqh'];
			$gia = $_GET['giathue'];
			$dientich = $_GET['dientich'];
			
			
			//chon minh ttp
			if($gia =="all" && $dientich =="all" && $qh =="all" && $ttp != "all")
			{
				$ttp = $this->Home_model->getBaiViet_ttp($ttp);
				
			}
			// chon minh ttp/qh khong chon gia va dientihc
			else 
			if($gia =="all" && $dientich =="all" && $ttp !="all" and $qh!="all")
			{
				$ttp = $this->Home_model->getBaiViet_ttp_qh($ttp,$qh);				

			}
			// chon minh dien tich khong chon gia
			else if($gia =="all" && $dientich !="all" && $ttp !="all" && $qh!="all")
			{
				if($dientich == "20")
				{
					$ttp=$this->Home_model->getBaiViet_ttphohon20($ttp,$qh,$dientich);
						// nho hon 20
				}
				else if($dientich =="230")
				{

					$ttp=$this->Home_model->getBaiViet_ttphohon230($ttp,$qh);
				}
				else
				{
					$ttp=$this->Home_model->getBaiViet_ttphohon30($ttp,$qh);
				}

			}
			// chon dien tich 
			else if($gia !="all" && $dientich =="all" && $ttp !="all" && $qh!="all")
			{
				if($gia == "1")
				{
						// nho hon 1 trieu
						$ttp=$this->Home_model->getBaiViet_gianhohon_1trieu($ttp,$qh);
						

				}
				else if($gia == "12")
				{
						// tu 1 trieu den 2 triue
					$ttp=$this->Home_model->getBaiViet_gianhohon_1trieu_2trieu($ttp,$qh);
						
						
				}
				else
				{
					// lon hon 2 trieu
					$ttp=$this->Home_model->getBaiViet_gianhohon_2trieu($ttp,$qh);
						

				}

			}
			else if($gia !="all" && $dientich !="all" && $ttp !="all" && $qh!="all")
			{

					// giu nguyen
			}
			// chon minh gia
			else if($gia !="all" && $dientich =="all" && $ttp =="all" && $qh=="all")
				{
						if($gia == "1")
						{
								// nho hon 1 trieu
								$ttp=$this->Home_model->getBaiViet_gianhohon_1trieu_();
								

						}
						else if($gia == "12")
						{
								// tu 1 trieu den 2 triue
							$ttp=$this->Home_model->getBaiViet_gianhohon_1trieu_2trieu_();
								
								
						}
						else
						{
							// lon hon 2 trieu
							$ttp=$this->Home_model->getBaiViet_gianhohon_2trieu_();
						}

				}
				else if($gia =="all" && $dientich !="all" && $ttp =="all" && $qh=="all")
				{
						if($dientich == "20")
						{
							$ttp=$this->Home_model->getBaiViet_ttphohon20_();
								// nho hon 20
						}
						else if($dientich =="230")
						{

							$ttp=$this->Home_model->getBaiViet_ttphohon230_();
						}
						else
						{
							$ttp=$this->Home_model->getBaiViet_ttphohon30_();
						}
							
				}
			
			
			// if($gia !="all" && $dientich ="all" && $ttp ="all" && $qh="all")	
			// $dsBaiViet = $this->Home_model->getBaiViet1($id);
			// $data['baiviet'] = $dsBaiViet;

		$dsTinhTp = $this->Home_model->getTinhTp();
        $dsQuanHuyen = $this->Home_model->getQuanHuyen();
        $dsPhuongXa = $this->Home_model->getPhuongXa();
        $dsBaiViet = $this->Home_model->getBaiViet();

        $metadata = array('title' => 'Trang Chủ', 'page' => 'home');

		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
        $data['tinhtp'] = $dsTinhTp;
        $data['quanhuyen'] = $dsQuanHuyen;
        $data['phuongxa'] = $dsPhuongXa;
		$data['baiviet'] = $ttp;
		$this->load->helper('url');
		$this->load->view('primary/meta',$metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/home/mainHome', $data);
		$this->load->view('primary/mainFooter');


	}
}