<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	// Dich vu
	public function index() {
		$metadata = array('title'=>'Cài đặt: Dịch vụ');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings');
		$this->load->view('primary/adminFooter');
	}
}