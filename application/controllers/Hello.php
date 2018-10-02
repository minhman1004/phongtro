<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {
	public function index() {
		$data = [
			'hello'=>'Xin chao'
		];
		$this->load->view('hello/halo', $data);
	}
}