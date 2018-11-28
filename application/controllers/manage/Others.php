<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Quản trị: Danh mục khác');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/others');
		$this->load->view('primary/adminFooter');
	}
}