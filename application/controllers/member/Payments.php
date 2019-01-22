<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');

		if($data['mand'] != null && $data['quyen'] == 1) {
			$metadata = array('title' => 'Quản lý thanh toán');
			$this->load->helper('url');
			$this->load->view('main/member/metamember',$metadata);
			$this->load->view('main/member/headermember');
			$this->load->view('main/member/menumember', $data);
			$this->load->view('main/member/payment', $data);
			$this->load->view('main/member/footermember');
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

	public function getAllNhaTro() {
		$mand = $this->input->post('mand');
		$result = $this->Memroom_model->getDsNhaTro($mand);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getAllPhongTro() {
		$mant = $this->input->post('mant');
		$result = $this->Memroom_model->getDsPhongTro($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getAllTienTro() {
		$result = $this->Memroom_model->getTienTro();
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getCTHD() {
		$mant = $this->input->post('mant');
		$mapt = $this->input->post('mapt');
		$result = $this->Mempayment_model->getCTHD($mant, $mapt);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getAllChiPhi() {
		$mant = $this->input->post('mant');
		$result = $this->Mempayment_model->getAllChiPhi($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function createThanhToan() {
		$data['mant'] = intval($this->input->post('mant'));
		$data['mapt'] = intval($this->input->post('mapt'));
		$data['thang'] = intval($this->input->post('thang'));
		$data['nam'] = intval($this->input->post('nam'));
		$data['diencu'] = intval($this->input->post('diencu'));
		$data['dienmoi'] = intval($this->input->post('dienmoi'));
		$data['nuoccu'] = intval($this->input->post('nuoccu'));
		$data['nuocmoi'] = intval($this->input->post('nuocmoi'));
		$data['gxe'] = intval($this->input->post('gxe'));
		$data['xedap'] = intval($this->input->post('xedap'));
		$data['xemay'] = intval($this->input->post('xemay'));
		$data['oto'] = intval($this->input->post('oto'));
		$data['wifi'] = intval($this->input->post('wifi'));

		$result = $this->Mempayment_model->createThanhToan($data);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function getAllHoaDon() {
		$mant = $this->input->post('mant');
		$result = $this->Mempayment_model->getAllHoaDon($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function completeHoaDon() {
		$data['mahd'] = $this->input->post('mahd');
		$data['trangthai'] = $this->input->post('trangthai');
		$data['ngaytra'] = date('Y-m-d');
		$result = $this->Mempayment_model->completeHoaDon($data);
		if($result != false) echo 'true';
		else echo 'false';
	}
}