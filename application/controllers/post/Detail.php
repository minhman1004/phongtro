<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	public function index() {
		$this->load->helper('url');
		$this->load->view('primary/meta');
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/post/detail');
		$this->load->view('primary/mainFooter');
	}
}