<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');
		
		if($data['mand'] != null && ($data['quyen'] == 21 || $data['quyen'] == 22 || $data['quyen'] == 23)) {
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
		else {
			$this->comeback();
		}
	}

	public function comeback() {
		$metadata = array('title' => 'Lỗi');
		$this->load->helper('url');
		$this->load->view('main/member/metamember',$metadata);
		$this->load->view('errors/comback');
	}
}