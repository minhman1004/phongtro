<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	public function index() {
		$data['mand'] = $this->session->userdata("MAND");
		$data['chucvu'] = $this->session->userdata('ChucVu');
		$data['hoten'] = $this->session->userdata('HoTen');
		$data['quyen'] = $this->session->userdata('Quyen');
		
		if($data['mand'] != null $data['mand'] != 2) {
			$metadata = array('title' => 'Forum');
			$this->load->helper('url');
			$this->load->view('main/member/metamember',$metadata);
			$this->load->view('main/member/headermember');
			$this->load->view('main/member/menumember');
			$this->load->view('main/member/forum', $data);
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
			echo json_encode($result);
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
		$mand = $this->input->post('mand');
		$data['topic'] = $this->Member_model->getTopic($topic, $mand);
		if($data['topic'] != false) {
			$data['binhluan'] = $this->Member_model->getBinhLuan($topic);
			echo json_encode($data);
		}
		else echo 'false';
	}

	public function addBinhLuan() {
		$data['mano'] = null;
		$data['topic'] = $this->input->post('matp');
		$data['noidung'] = $this->input->post('noidung');
		$data['mand'] = $this->input->post('mand');;
		$data['ngaytao'] = $this->input->post('ngaytao');
		$data['trangthai'] = $this->input->post('trangthai');

		$rs = $this->Forum_model->addBinhLuan($data);
		if($rs != false) echo $rs;
		else echo 'false';
	}

	public function addThich() {
		$data['mano'] = null;
		$data['topic'] = $this->input->post('topic');
		$data['mand'] = $this->input->post('mand');;
		$data['date'] = $this->input->post('date');
		$data['kthich'] = $this->input->post('kthich');
		$data['thich'] = $this->input->post('thich');

		$rs = $this->Forum_model->addThich($data);
		if($rs != false) echo 'true';
		else echo 'false';
	}

	public function postTopic() {
		$data['mand'] = $this->input->post('mand');
		$data['mant'] = $this->input->post('mant');
		$data['noidung'] = $this->input->post('content');
		$data['cpbinhluan'] = $this->input->post('allow');
		$data['ngaytao'] = $this->input->post('ngaytao');
		$data['trangthai'] = 'show';
		$data['mano'] = null;

		$result = $this->Forum_model->addTopic($data);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function getEditTopic() {
		$topic = $this->input->post('topic');
		$result = $this->Forum_model->getEditTopic($topic);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function updateTopic() {
		$data['topic'] = $this->input->post('topic');
		$data['noidung'] = $this->input->post('content');
		$data['cpbinhluan'] = $this->input->post('allow');

		$result = $this->Forum_model->updateTopic($data);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function getBinhLuan() {
		$mabl = $this->input->post('mabl');
		$result = $this->Forum_model->getMotBinhLuan($mabl);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}

	public function updateBinhLuan() {
		$mabl = $this->input->post('mabl');
		$noidung = $this->input->post('noidung');

		$result = $this->Forum_model->updateBinhLuan($mabl, $noidung);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function deleteBinhLuan() {
		$mabl = $this->input->post('mabl');
		$result = $this->Forum_model->deleteBinhLuan($mabl);
		if($result != false) echo 'true';
		else echo 'false';
	}

	public function deleteTopic() {
		$topic = $this->input->post('topic');
		$result = $this->Member_model->deleteTopic($topic);
		if($result != false) echo 'true';
		else echo false;
	}
}