<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Timkiem extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}
	

	public function index() {		
		
			$dsTinhTp = $this->Publish_model->getTinhTp();
			$dsQuanHuyen = $this->Publish_model->getQuanHuyen();
			$dsDuong = $this->Publish_model->getDiaChiTT();
			$datadisplay['tinhtp'] = $dsTinhTp;
			$datadisplay['quanhuyen'] = $dsQuanHuyen;
			//$datadisplay['filterQH'] = array_filter($dsQuanHuyen, 'filterQuanHuyen');

			$metadata = array('title' => 'Tìm kiếm');
			$this->load->helper('url');
			$this->load->view('primary/meta', $metadata);
			$this->load->view('primary/mainHeader');
			$this->load->view('primary/mainMenu');
			$this->load->view('main/timkiem/timkiem', $datadisplay);
			$this->load->view('primary/mainFooter');
	
		
	}	
	public function lietkeqh()
	{
		$id = $this->input->post('id');
		//$mattp = $this->Publish_model->getMotNhaTro($id);
		$maquanhuyen = $this->Publish_model->getQuanHuyen2($id);
		$datadisplay['tinhqh'] = $maquanhuyen;
		echo json_encode($datadisplay);
	}
	public function get_quanhuyenchange_ttp()
	{
		$id = $this->input->post('id');
		$danhsach = $this->Publish_model->get_allquanhuyen1($id);
		$datadisplay['danhsach'] = $danhsach;
		echo json_encode($datadisplay);
	}
	public function get_allnhatro()
	{
		$danhsach = $this->Publish_model->get_allnhatro();
		$datadisplay['danhsach'] = $danhsach;
		echo json_encode($datadisplay);
	}
		


}
