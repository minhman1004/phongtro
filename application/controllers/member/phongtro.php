<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class phongtro extends CI_Controller {
	public function index() {

		$dsphongtro['pt']  = $this->quanlynhatro->getPhongtro();
		//print_r($dsphongtro['phongtro']);
		//$dsNhaTro['chiphi']  = $this->quanlynhatro->getChiphi();
		$metadata = array('title' => 'Nhà Trọ Việt - Trang Chủ', 'page' => 'home');
		$this->load->helper('url');
		$this->load->view('primary/meta',$metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/member/info/info',$dsphongtro);
		$this->load->view('primary/mainFooter');
		// $chucvu = $this->session->userdata("ChuVu");


	}

}