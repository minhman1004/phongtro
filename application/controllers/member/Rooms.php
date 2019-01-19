<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');
		if($data['mand'] != null && $data['quyen'] == 1) {
			$metadata = array('title' => 'Danh sách nhà trọ - phòng trọ');
			$this->load->helper('url');
			$this->load->view('main/member/metamember',$metadata);
			$this->load->view('main/member/headermember', $data);
			$this->load->view('main/member/menumember', $data);
			$this->load->view('main/member/rooms', $data);
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

	public function getNguoiTro() {
		$mapt = $this->input->post('mapt');
		$result = $this->Memroom_model->getNguoiTro($mapt);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getDsNhaTro() {
		$mand= $this->input->post('mand');
		$result = $this->Memroom_model->getDsNhaTro($mand);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getDsPhongTro() {
		$mant = $this->input->post('mant');
		$result = $this->Memroom_model->getDsPhongTro($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getTienTro() {
		$result = $this->Memroom_model->getTienTro();
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getPhongTro() {
		$mapt = $this->input->post('mapt');
		$result = $this->Memroom_model->getPhongTro($mapt);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function updateNguoiTro() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['cmnd'] = $this->input->post('cmnd');
		$data['sdt'] = $this->input->post('sdt');
		$data['diachi'] = $this->input->post('diachi');
		$data['gioitinh'] = $this->input->post('gioitinh');

		$result = $this->Room_model->updateNguoiTro($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addNguoiTro() {
		$data['mapt'] = $this->input->post('mapt');
		$data['hoten'] = $this->input->post('ten');
		$data['cmnd'] = $this->input->post('cmnd');
		$data['sdt'] = $this->input->post('sdt');
		$data['diachi'] = $this->input->post('diachi');
		$data['gioitinh'] = $this->input->post('gioitinh');

		$ttt['mano'] = $this->Room_model->addThanhVienTro($data, $data['mapt']);
		if(isset($ttt['mano'])) {
			$ttt['ngayo'] = date('Y-m-d h:m:s');
			$ttt['trangthai'] = 'dango';
			$ttt['mapt'] = $data['mapt'];
			$result = $this->Room_model->addThongTinTro($ttt);
		}
		if(isset($result)) {
		 	if($result != false) {
		 		echo $ttt['mano'];
		 		$this->updateSoNguoiDangO($data['mapt']);
		 	}
			else echo 'false';
		}
	}

	public function addThanhVienTro($nguoitro, $mapt) {
		$result = $this->Room_model->addThanhVienTro($nguoitro, $mapt);
		if($result != false) return $result;
		return false;
	}

	public function addThongTinTro($mano, $mapt) {
		$ttt['mano'] = $mano;
		$ttt['mapt'] = $mapt;
		$ttt['trangthai'] = 'dango';
		$ttt['ngayo'] = date('Y-m-d');
		$result = $this->Room_model->addThongTinTro($ttt);
		if($result == true) return true;
		return false;
	}

	public function updateSoNguoiDangO($mapt) {
		$sldo = $this->Room_model->getNguoiTro($mapt);
		if(isset($sldo)) {
			$data['sldo'] = count($sldo);
		}
		else {
			$data['sldo'] = 0;
		}
		$data['id'] = $mapt;
		$result = $this->Room_model->updateSoNguoiDangO($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function updateChuyenTro() {
		$mapt = $this->input->post('mapt');
		$id = $this->input->post('id');
		$result = $this->Room_model->updateChuyenTro($mapt, $id);
		if($result == true) {
			$rs = $this->updateSoNguoiDangO($mapt);
			echo $rs;
		}
		else echo 'false';
	}

	public function getKhuVuc() {
		$data['tinhtp'] = $this->Memroom_model->getTinhtp();
		$data['quanhuyen'] = $this->Memroom_model->getQuanhuyen();
		$data['phuongxa'] = $this->Memroom_model->getPhuongxa();
		$data['duong'] = $this->Memroom_model->getDuong();
		echo json_encode($data);
	}

	public function getNhaTro() {
		$mant = $this->input->post('mant');
		$result = $this->Memroom_model->getNhaTro($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getChiPhi() {
		$mant = $this->input->post('mant');
		$result = $this->Memroom_model->getChiPhi($mant);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}
}