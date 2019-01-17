<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');

		$metadata = array('title' => 'Forum');
		$this->load->helper('url');
		$this->load->view('main/member/metamember',$metadata);
		$this->load->view('main/member/headermember');
		$this->load->view('main/member/menumember');
		$this->load->view('main/member/forum', $data);
		$this->load->view('main/member/footermember');
	}

	public function getAllNhaTro() {
		$mand = $this->input->post('mand');
		$result = $this->Member_model->getAllNhaTro($mand);
		if($result != false) {
			echo json_encode($result);
		}
		else echo 'false';
	}

	public function getThongTinChung() {
		$mant = $this->input->post('mant');
		$data['sophong'] = $this->countPhongTro($mant);
		$data['songuoio'] = $this->countNguoiO($mant);
		$data['banggia'] = $this->getBangGia($mant);
		if($data['sophong'] != false && $data['songuoio'] != false && $data['banggia'] != false) 
			echo json_encode($data);
		else echo 'false';
	}

	public function getNhaTro($mant) {
		$result = $this->Member_model->getNhaTro($mant);
		if($result != false) return $result;
		return false;
	}

	public function countPhongTro($mant) {
		$result = $this->Member_model->countPhongTro($mant);
		if($result != false) return $result;
		return false;
	}

	public function countNguoiO($mant) {
		$result = $this->Member_model->countNguoiO($mant);
		if($result != false) return $result;
		return false;
	}
	public function getBangGia($mant) {
		$result = $this->Member_model->getBangGia($mant);
		if($result != false) return $result;
		return false;
	}

	public function getAllTopic() {
		$mand = $this->input->post('mand');
		$result['topic'] = $this->Member_model->getAllTopic($mand);
		$result['nguoio'] = $this->Member_model->getNguoiTro($result['topic'][0]->MAND);
		if($result['topic'] != false && $result['nguoio'] != false) echo json_encode($result);
		else echo 'false';
	}

	public function getTopicNhaTro() {
		$mant = $this->input->post('mant');
		$result['topic'] = $this->Member_model->getTopicNhaTro($mant);
		if($result['topic'] != false) {
			$result['nguoio'] = $this->Member_model->getNguoiTroNhaTro($result['topic'][0]->MANT);
			if($result['nguoio'] != false) echo json_encode($result);
			else echo 'false';
		}
		else echo 'false';
	}

	public function getChuTro() {
		$mand = $this->input->post('mand');
		$result = $this->Member_model->getChuTro($mand);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function getTopic() {
		$topic = $this->input->post('topic');
	}
}