<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decent extends CI_Controller {
	// Phan quyen
	public function index() {
		$metadata = array('title'=>'Cài đặt: Phân quyền');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/settings');
		$this->load->view('primary/adminFooter');
	}
}