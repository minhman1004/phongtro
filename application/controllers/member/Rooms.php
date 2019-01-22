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

	public function getMotChiPhi() {
		$id = $this->input->post('id');
		$data['chiphi'] = $this->Room_model->getTTChiPhi($id);
		echo json_encode($data);
	}

	public function getPosition() {
		$data['id'] = $this->input->post('id');
		$result = $this->Room_model->getPosition($data['id']);
		if($result != false) echo json_encode($result);
		else echo 'false';
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

		if(intval($cp['dien']) != 0 || intval($cp['nuoc']) != 0 || intval($cp['wifi']) != 0 || intval($cp['rac']) != 0 || intval($cp['giuxe']) != 0 || intval($cp['xedap']) != 0 || intval($cp['xemay']) != 0 || intval($cp['oto']) != 0) {
			if((strcmp($cp['dien'], $cp['dienc']) == 0) && (strcmp($cp['nuoc'], $cp['nuocc']) == 0) && (strcmp($cp['wifi'], $cp['wific']) == 0) && (strcmp($cp['rac'], $cp['racc']) == 0) && (strcmp($cp['giuxe'], $cp['giuxec']) == 0) && (strcmp($cp['xedap'], $cp['xedapc']) == 0) && (strcmp($cp['xemay'], $cp['xemayc']) == 0) && (strcmp($cp['oto'], $cp['otoc']) == 0)) {

				$cp['trangthai'] = 'new';
				$cp['selected'] = 'yes';
				$update = $this->Room_model->updateSelectedTrangThaiChiPhi($cp);
				$updateOther = $this->Room_model->updateOtherChiPhi($cp);
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

		if(intval($cp['dien']) != 0 || intval($cp['nuoc']) != 0 || intval($cp['wifi']) != 0 || intval($cp['rac']) != 0 || intval($cp['giuxe']) != 0 || intval($cp['xedap']) != 0 || intval($cp['xemay']) != 0 || intval($cp['oto']) != 0) {
			if((strcmp($cp['dien'], $cp['dienc']) == 0) && (strcmp($cp['nuoc'], $cp['nuocc']) == 0) && (strcmp($cp['wifi'], $cp['wific']) == 0) && (strcmp($cp['rac'], $cp['racc']) == 0) && (strcmp($cp['giuxe'], $cp['giuxec']) == 0) && (strcmp($cp['xedap'], $cp['xedapc']) == 0) && (strcmp($cp['xemay'], $cp['xemayc']) == 0) && (strcmp($cp['oto'], $cp['otoc']) == 0)) {

				$cp['trangthai'] = 'new';
				$cp['selected'] = 'yes';
				$update = $this->Room_model->updateSelectedTrangThaiChiPhi($cp);
				$updateOther = $this->Room_model->updateOtherChiPhi($cp);
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
		}

		$result = $this->Room_model->updateNhaTro($data);
		if($result == true && $update == true) echo 'true';
		else echo 'false';
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
		if($cp['nhatro'] != false) {
			$cp['ten'] = $this->input->post('tencp');
			$cp['dien'] = intval($this->input->post('dien'));
			$cp['nuoc'] = intval($this->input->post('nuoc'));
			$cp['wifi'] = intval($this->input->post('wifi'));
			$cp['rac'] = intval($this->input->post('rac'));
			$cp['giuxe'] = intval($this->input->post('giuxe'));
			$cp['xedap'] = intval($this->input->post('xedap'));
			$cp['xemay'] = intval($this->input->post('xemay'));
			$cp['oto'] = intval($this->input->post('oto'));
			$cp['selected'] = 'yes';
			$cp['trangthai'] = 'new';
			if($cp['dien'] != 0 || $cp['nuoc'] != 0 || $cp['wifi'] != 0 || $cp['rac'] != 0 || $cp['giuxe'] != 0 || $cp['xedap'] != 0 || $cp['xemay'] != 0 || $cp['oto'] != 0) {
				$addcp = $this->Room_model->addChiPhi($cp);
			}
		}
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
			$cp['dien'] = intval($this->input->post('dien'));
			$cp['nuoc'] = intval($this->input->post('nuoc'));
			$cp['wifi'] = intval($this->input->post('wifi'));
			$cp['rac'] = intval($this->input->post('rac'));
			$cp['giuxe'] = intval($this->input->post('giuxe'));
			$cp['xedap'] = intval($this->input->post('xedap'));
			$cp['xemay'] = intval($this->input->post('xemay'));
			$cp['oto'] = intval($this->input->post('oto'));
			$cp['selected'] = 'yes';
			$cp['trangthai'] = 'new';
			if($cp['dien'] != 0 || $cp['nuoc'] != 0 || $cp['wifi'] != 0 || $cp['rac'] != 0 || $cp['giuxe'] != 0 || $cp['xedap'] != 0 || $cp['xemay'] != 0 || $cp['oto'] != 0) {
				$addcp = $this->Room_model->addChiPhi($cp);
			}
		}
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addChiPhi() {
		$data['nhatro'] = $this->input->post('nhatro');
		$data['ten'] = $this->input->post('ten');
		$data['dien'] = intval($this->input->post('dien'));
		$data['nuoc'] = intval($this->input->post('nuoc'));
		$data['wifi'] = intval($this->input->post('wifi'));
		$data['rac'] = intval($this->input->post('rac'));
		$data['giuxe'] = intval($this->input->post('giuxe'));
		$data['xedap'] = intval($this->input->post('xedap'));
		$data['xemay'] = intval($this->input->post('xemay'));
		$data['oto'] = intval($this->input->post('oto'));
		$data['trangthai'] = $this->input->post('trangthai');
		$data['selected'] = $this->input->post('selected');
		$result = false;
		if($data['dien'] != 0 || $data['nuoc'] != 0 || $data['wifi'] != 0 || $data['rac'] != 0 || $data['giuxe'] != 0 || $data['xedap'] != 0 || $data['xemay'] != 0 || $data['oto'] != 0) {
			$result = $this->Room_model->addChiPhi($data);
		}
		if($result == true) echo 'true';
		else echo 'false';
	}

	public function addPhongTro() {
		// Thong tin phong tro
		$pt['ten'] = $this->input->post('ten');
		$pt['nhatro'] = $this->input->post('nhatro');
		$pt['dientich'] = $this->input->post('dientich');
		$pt['sltd'] = $this->input->post('sltd');
		$pt['slndo'] = $this->input->post('slndo');
		$pt['tientro'] = $this->input->post('tientro');
		$pt['ghichu'] = $this->input->post('mota');

		// Thong tin tien tro
		$tt['mapt'] = $this->Room_model->addPhongTro($pt);
		$tt['cachtinh'] = $this->input->post('cachtinh');
		$tt['gia'] = $this->input->post('tientro');
		$tt['ngaytao'] = date('Y-m-d h:m:s');

		// Add tientro, update ma tientro into phongtro
		if($tt['mapt'] != false) {
			$upt['id'] = $tt['mapt'];
			$upt['matt'] = $this->Room_model->addTienTro($tt);
			if($upt['matt'] != false) {
				$update_pt = $this->Room_model->updateTienTroPhongTro($upt);
			}
		}

		// Thong tin nguoi o
		$nt['nguoitro'] = $this->input->post('dsTro');
		$result = 0;
		if(isset($nt['nguoitro'])) {
			for($i = 0; $i< count($nt['nguoitro']); $i++) {
				$addtvt = $this->addThanhVienTro($nt['nguoitro'][$i], $tt['mapt']);
				if($addtvt != false) {
					$addttt = $this->addThongTinTro($addtvt, $tt['mapt']);
					if($addttt == true) $result ++;
				}
			}
			if($result == count($nt['nguoitro'])) echo 'true';
			else echo 'false';
		}
		else {
			if($update_pt == true) echo 'true';
			else echo 'false';
		}
	}

	public function getMotPhongTro() {
		$id = $this->input->post('id');
		$data = $this->Room_model->getMotPhongTro($id);
		if($data != false) echo json_encode($data);
		else echo 'false';
	}

	public function updatePhongTro() {
		$data['id'] = $this->input->post('id');
		$data['ten'] = $this->input->post('ten');
		$data['tientro'] = $this->input->post('tientro');
		$data['cachtinh'] = $this->input->post('cachtinh');
		$data['cachtinhcu'] = $this->input->post('cachtinhcu');
		$data['giacu'] = $this->input->post('giacu');
		$data['dientich'] = $this->input->post('dientich');
		$data['ghichu'] = $this->input->post('mota');
		$data['sltd'] = $this->input->post('sltd');

		if(strcmp($data['giacu'], $data['tientro']) != 0 || strcmp($data['cachtinh'], $data['cachtinhcu']) != 0) {
			$tt['mapt'] = $data['id'];
			$tt['gia'] = $data['tientro'];
			$tt['cachtinh'] = $data['cachtinh'];
			$tt['ngaytao'] = date('Y-m-d h:m:s');
			$data['matt'] = $this->Room_model->addTienTro($tt);
		}

		if(isset($data['matt'])) {
			$result = $this->Room_model->updatePhongTroWithTienTro($data);
		}
		else {
			$result = $this->Room_model->updatePhongTro($data);
		}

		if($result == true) echo 'true';
		else echo 'false';
	}
}