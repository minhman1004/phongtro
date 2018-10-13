<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDasboard extends CI_Controller {
	public function index() {
		$this->load->view('primary/mainHeader');
		$this->load->view('main/home/mainHome');
	}
}