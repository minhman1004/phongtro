<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Call Publish_model
		$this->load->Model("Publish_model");
	}

	public function index() {
		$this->load->helper('url');
		$this->load->view('primary/meta');
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('main/post/publish');
		$this->load->view('primary/mainFooter');
	}
}