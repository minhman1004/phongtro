<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index() {


		// Gọi hàm trong Home_model
        $baiviet = $this->Home_model->tongsobaiviet();
        $nguoidung = $this->Home_model->tongsonguoidung();
        $hoadon = $this->Home_model->tongsohoadon();
        $nhatro = $this->Home_model->tongsonhatro();

        $data['baiviet'] = $baiviet[0];
        $data['nguoidung'] = $nguoidung[0];
        $data['hoadon'] = $hoadon[0];
        $data['nhatro'] = $nhatro[0];


		$metadata = array('title'=>'Trang quản trị');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('primary/adminFooter');
		// echo json_encode($data);
	}
}