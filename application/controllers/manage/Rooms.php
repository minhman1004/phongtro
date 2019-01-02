<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
	public function index() {
		$data['tinhtp'] = $this->Home_model->getTinhTp();
		$data['quanhuyen'] = $this->Home_model->getQuanHuyen();
		$data['phuongxa'] = $this->Home_model->getPhuongXa();
		$data['duong'] = $this->Room_model->getDuong();
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['nhatro'] = $this->Room_model->getNhaTro();
		$metadata = array('title'=>'Quản trị: Nhà trọ');
		$this->load->helper('url');
		$this->load->view('primary/metaadmin', $metadata);
		$this->load->view('primary/adminHeader');
		$this->load->view('primary/adminMenu');
		$this->load->view('admin/rooms', $data);
		$this->load->view('primary/adminFooter');
	}

	public function getDiaChi() {
		$data['tinhtp'] = $this->Home_model->getTinhTp();
		$data['quanhuyen'] = $this->Home_model->getQuanHuyen();
		$data['phuongxa'] = $this->Home_model->getPhuongXa();
		$data['duong'] = $this->Room_model->getDuong();
		$data['chutro'] = $this->Room_model->getChuTro();
		echo json_encode($data);
	}

	public function addNhaTroDuong() {
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['duong'] = $this->input->post('duong');
		$data['diachi'] = $this->input->post('diachi');
		$data['camera'] = $this->input->post('camera');
		$data['parking'] = $this->input->post('parking');
		$data['guard'] = $this->input->post('guard');
		$data['vido'] = $this->input->post('vido');
		$data['kinhdo'] = $this->input->post('kinhdo');

		$result = $this->Room_model->addNhaTroDuong($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addNhaTro() {
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['diachi'] = $this->input->post('diachi');
		$data['camera'] = $this->input->post('camera');
		$data['parking'] = $this->input->post('parking');
		$data['guard'] = $this->input->post('guard');
		$data['vido'] = $this->input->post('vido');
		$data['kinhdo'] = $this->input->post('kinhdo');

		$cp['nhatro'] = $this->Room_model->addNhaTro($data);
		if($cp['nhatro'] != false) {
			$cp['ten'] = $this->input->post('tencp');
			$cp['dien'] = $this->input->post('dien');
			$cp['nuoc'] = $this->input->post('nuoc');
			$cp['wifi'] = $this->input->post('wifi');
			$cp['rac'] = $this->input->post('rac');
			$cp['giuxe'] = $this->input->post('giuxe');
			$cp['xedap'] = $this->input->post('xedap');
			$cp['xemay'] = $this->input->post('xemay');
			$cp['oto'] = $this->input->post('oto');
			$cp['selected'] = 'yes';
			$cp['trangthai'] = 'new';
			$addcp = $this->Room_model->addChiPhi($cp);
		}

		if($result != false && $addcp == true) echo 'true';
		else echo 'false';
	}

	public function showNhaTro() {
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['nhatro'] = $this->Room_model->getNhaTro();
		echo json_encode($data);
	}

	public function getNhaTroVaDiaChi() {
		$id = $this->input->post('id');
		$data['nhatro'] = $this->Room_model->getMotNhaTro($id);
		$data['tinhtp'] = $this->Home_model->getTinhTp();
		$data['quanhuyen'] = $this->Home_model->getQuanHuyen();
		$data['phuongxa'] = $this->Home_model->getPhuongXa();
		$data['duong'] = $this->Room_model->getDuong();
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['chiphi'] = $this->Room_model->getChiPhi($id);
		echo json_encode($data);
	}

	public function getChiPhi() {
		$id = $this->input->post('id');
		$data['chiphi'] = $this->Room_model->getTTChiPhi($id);
		echo json_encode($data);
	}

	public function updateNhaTroDuong() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['duong'] = $this->input->post('duong');
		$data['diachi'] = $this->input->post('diachi');
		$data['camera'] = $this->input->post('camera');
		$data['parking'] = $this->input->post('parking');
		$data['guard'] = $this->input->post('guard');
		$data['vido'] = $this->input->post('vido');
		$data['kinhdo'] = $this->input->post('kinhdo');
		
		$cp['nhatro'] = $data['id'];
		$cp['ten'] = $this->input->post('tencp');
		$cp['id'] = $this->input->post('chiphi');

		$cp['dien'] = $this->input->post('dien');
		$cp['nuoc'] = $this->input->post('nuoc');
		$cp['wifi'] = $this->input->post('wifi');
		$cp['rac'] = $this->input->post('rac');
		$cp['giuxe'] = $this->input->post('giuxe');
		$cp['xedap'] = $this->input->post('xedap');
		$cp['xemay'] = $this->input->post('xemay');
		$cp['oto'] = $this->input->post('oto');
		
		$cp['dienc'] = $this->input->post('dienc');
		$cp['nuocc'] = $this->input->post('nuocc');
		$cp['wific'] = $this->input->post('wific');
		$cp['racc'] = $this->input->post('racc');
		$cp['giuxec'] = $this->input->post('giuxec');
		$cp['xedapc'] = $this->input->post('xedapc');
		$cp['xemayc'] = $this->input->post('xemayc');
		$cp['otoc'] = $this->input->post('otoc');

		$update = true;

		if((strcmp($cp['dien'], $cp['dienc']) == 0) && (strcmp($cp['nuoc'], $cp['nuocc']) == 0) && (strcmp($cp['wifi'], $cp['wific']) == 0) && (strcmp($cp['rac'], $cp['racc']) == 0) && (strcmp($cp['giuxe'], $cp['giuxec']) == 0) && (strcmp($cp['xedap'], $cp['xedapc']) == 0) && (strcmp($cp['xemay'], $cp['xemayc']) == 0) && (strcmp($cp['oto'], $cp['otoc']) == 0)) {

			$cp['trangthai'] = 'new';
			$cp['selected'] = 'yes';
			$update = $this->Room_model->updateSelectedTrangThaiChiPhi($cp);
		}
		else {
			// Update trang thai chiphi cu
			$cp['trangthai'] = 'old';
			$cp['selected'] = 'no';
			$update = $this->Room_model->updateSelectedTrangThaiChiPhi($cp);

			// Create chiphi moi va selected yes
			$cp['trangthai'] = 'new';
			$cp['selected'] = 'yes';
			$update = $this->Room_model->addChiPhi($cp);
		}

		$result = $this->Room_model->updateNhaTro($data);
		if($result == true && $update == true) echo 'true';
		else echo 'false';
	}

	public function updateNhaTro() {
		// Thong tin nha tro
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['chutro'] = $this->input->post('chutro');
		$data['tinhtp'] = $this->input->post('tinhtp');
		$data['quanhuyen'] = $this->input->post('quanhuyen');
		$data['phuongxa'] = $this->input->post('phuongxa');
		$data['diachi'] = $this->input->post('diachi');
		$data['camera'] = $this->input->post('camera');
		$data['parking'] = $this->input->post('parking');
		$data['guard'] = $this->input->post('guard');
		$data['vido'] = $this->input->post('vido');
		$data['kinhdo'] = $this->input->post('kinhdo');
		$data['duong'] = null;
		
		// Thong tin chi phi
		$cp['nhatro'] = $data['id'];
		$cp['ten'] = $this->input->post('tencp');
		$cp['id'] = $this->input->post('chiphi');

		$cp['dien'] = $this->input->post('dien');
		$cp['nuoc'] = $this->input->post('nuoc');
		$cp['wifi'] = $this->input->post('wifi');
		$cp['rac'] = $this->input->post('rac');
		$cp['giuxe'] = $this->input->post('giuxe');
		$cp['xedap'] = $this->input->post('xedap');
		$cp['xemay'] = $this->input->post('xemay');
		$cp['oto'] = $this->input->post('oto');
		
		$cp['dienc'] = $this->input->post('dienc');
		$cp['nuocc'] = $this->input->post('nuocc');
		$cp['wific'] = $this->input->post('wific');
		$cp['racc'] = $this->input->post('racc');
		$cp['giuxec'] = $this->input->post('giuxec');
		$cp['xedapc'] = $this->input->post('xedapc');
		$cp['xemayc'] = $this->input->post('xemayc');
		$cp['otoc'] = $this->input->post('otoc');

		$update = true;

		if((strcmp($cp['dien'], $cp['dienc']) == 0) && (strcmp($cp['nuoc'], $cp['nuocc']) == 0) && (strcmp($cp['wifi'], $cp['wific']) == 0) && (strcmp($cp['rac'], $cp['racc']) == 0) && (strcmp($cp['giuxe'], $cp['giuxec']) == 0) && (strcmp($cp['xedap'], $cp['xedapc']) == 0) && (strcmp($cp['xemay'], $cp['xemayc']) == 0) && (strcmp($cp['oto'], $cp['otoc']) == 0)) {

			$cp['trangthai'] = 'new';
			$cp['selected'] = 'yes';
			$update = $this->Room_model->updateSelectedTrangThaiChiPhi($cp);
		}
		else {
			// Update trang thai chiphi cu
			$cp['trangthai'] = 'old';
			$cp['selected'] = 'no';
			$update = $this->Room_model->updateSelectedTrangThaiChiPhi($cp);

			// Create chiphi moi va selected yes
			$cp['trangthai'] = 'new';
			$cp['selected'] = 'yes';
			$update = $this->Room_model->addChiPhi($cp);
		}

		$result = $this->Room_model->updateNhaTro($data);
		if($result == true && $update == true) echo 'true';
		else echo 'false';
	}

	public function getNhaTroChuTro() {
		$data['chutro'] = $this->Room_model->getChuTro();
		$data['nhatro'] = $this->Room_model->getNhaTro();
		echo json_encode($data);
	}

	public function addChiPhi() {
		$data['nhatro'] = $this->input->post('nhatro');
		$data['ten'] = $this->input->post('ten');
		$data['dien'] = $this->input->post('dien');
		$data['nuoc'] = $this->input->post('nuoc');
		$data['wifi'] = $this->input->post('wifi');
		$data['rac'] = $this->input->post('rac');
		$data['giuxe'] = $this->input->post('giuxe');
		$data['xedap'] = $this->input->post('xedap');
		$data['xemay'] = $this->input->post('xemay');
		$data['oto'] = $this->input->post('oto');
		$data['trangthai'] = $this->input->post('trangthai');
		$data['selected'] = $this->input->post('selected');

		$result = $this->Room_model->addChiPhi($data);
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function getPosition() {
		$data['id'] = $this->input->post('id');
		$result = $this->Room_model->getPosition($data['id']);
		if($result != false) echo json_encode($result);
		else echo 'false';
	}
}