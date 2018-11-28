<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function index() {
		$metadata = array('title'=>'Quản trị: Bài viết');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/posts');
		$this->load->view('primary/adminFooter');
	}
}