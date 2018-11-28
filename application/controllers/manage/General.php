<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Quản trị: Dữ liệu chung');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/general');
		$this->load->view('primary/adminFooter');
	}

	// Khu vuc
	public function location() {
		$metadata = array('title'=>'Dữ liệu chung: Khu vực');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/general');
		$this->load->view('primary/adminFooter');
	}

	// Bang gia
	public function price() {
		$metadata = array('title'=>'Dữ liệu chung: Bảng giá');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/general');
		$this->load->view('primary/adminFooter');
	}

	// Tien ich khu vuc
	public function extension() {
		$metadata = array('title'=>'Dữ liệu chung: Tiện ích');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/general');
		$this->load->view('primary/adminFooter');
	}

	// Loai tin
	public function posttype() {
		$metadata = array('title'=>'Dữ liệu chung: Loại tin');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/general');
		$this->load->view('primary/adminFooter');
	}
}