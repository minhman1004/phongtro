<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Quản trị: Cài đặt');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings');
		$this->load->view('primary/adminFooter');
	}

	// Phan quyen
	public function decent() {
		$metadata = array('title'=>'Cài đặt: Phân quyền');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings');
		$this->load->view('primary/adminFooter');
	}

	// Loai tai khoan
	public function account() {
		$metadata = array('title'=>'Cài đặt: Loại tài khoản');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings');
		$this->load->view('primary/adminFooter');
	}

	// Dich vu
	public function service() {
		$metadata = array('title'=>'Cài đặt: Dịch vụ');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings');
		$this->load->view('primary/adminFooter');
	}
}