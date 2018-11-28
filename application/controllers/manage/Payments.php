<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Quản trị: Thanh toán');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/payments');
		$this->load->view('primary/adminFooter');
	}
}