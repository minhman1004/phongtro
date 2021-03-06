<?php
class Room_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Get Duong
    public function getDuong() {
    	$query = $this->db->get('diachitt');
    	$data = array();

    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }

    // Get nha tro
    public function getNhaTro() {
    	$query = $this->db->get('nhatro');
    	$data = array();

    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }

    // Get chu tro
    public function getChuTro() {
		$query = $this->db->get_where('nguoidung', array('CHUCVU'=>1));
    	$data = array();

    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }

    // Add Nha Tro
    public function addNhaTroDuong($nt) {
    	// Get max id for nhatro
    	$query = $this->db->get('nhatro');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row->MANT;
    	}
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }
    	
    	// Insert new nhatro
    	$nhatro = array('MANT' => $id, 'TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'MAD' => $nt['duong'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard'], 'KINHDO'=>$nt['kinhdo'], 'VIDO'=>$nt['vido']);
    	$this->db->insert('nhatro', $nhatro);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Add nha tro without MAD
    public function addNhaTro($nt) {
    	// Get max id for nhatro
    	$query = $this->db->get('nhatro');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row->MANT;
    	}
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }
    	
    	// Insert new nhatro
    	$nhatro = array('MANT' => $id, 'TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard'], 'KINHDO'=>$nt['kinhdo'], 'VIDO'=>$nt['vido']);
    	$this->db->insert('nhatro', $nhatro);
    	if($this->db->affected_rows() > 0) return $id;
    	return false;
    }

    // Get thong tin mot nha tro
    public function getMotNhaTro($id) {
    	$query = $this->db->get_where('nhatro', array('MANT'=>$id));
    	return $query->result();
    }

    // Update nha tro with MAD
    public function updateNhaTroDuong($nt) {
    	$data = array('TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'MAD' => $nt['duong'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard'], 'KINHDO'=>$nt['kinhdo'], 'VIDO'=>$nt['vido']);
    	$this->db->where('MANT', $nt['id']);
    	$this->db->update('nhatro', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Update nha tro without MAD
    public function updateNhaTro($nt) {
    	$data = array('TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'MAD' => $nt['duong'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard'], 'KINHDO'=>$nt['kinhdo'], 'VIDO'=>$nt['vido']);
    	$this->db->where('MANT', $nt['id']);
    	$this->db->update('nhatro', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Get bang chi phi cho nha tro
    public function getChiPhi($nhatro_id) {
    	$query = $this->db->get_where('chiphi', array('MANT'=>$nhatro_id, 'TRANGTHAI'=>'new'));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    // Get bang chi phi cho nha tro
    public function getTTChiPhi($id) {
    	$query = $this->db->get_where('chiphi', array('MACP'=>$id, 'TRANGTHAI'=>'new'));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    // Add new chi phi
    public function addChiPhi($chiphi) {
    	$data = array('TENCP' => $chiphi['ten'], 'MANT' => $chiphi['nhatro'], 'GIANUOC' => $chiphi['nuoc'], 'GIADIEN' => $chiphi['dien'], 'GiaGXe' => $chiphi['giuxe'], 'GiaWifi' => $chiphi['wifi'], 'GiaRac' => $chiphi['rac'], 'XEDAP' => $chiphi['xedap'], 'XEMAY' => $chiphi['xemay'], 'OTO' => $chiphi['oto'], 'Selected' => $chiphi['selected'], 'TRANGTHAI' => $chiphi['trangthai']);
    	$this->db->insert('chiphi', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Update chi phi
    public function updateChiPhi($chiphi) {
    	$data = array('TENCP' => $chiphi['ten'], 'MANT'=>$chiphi['nhatro'], 'GIANUOC'=>$chiphi['nuoc'], 'GIADIEN'=>$chiphi['dien'], 'GiaGXe'=>$chiphi['giuxe'], 'GiaWifi'=>$chiphi['wifi'], 'GiaRac'=>$chiphi['giarac'], 'Selected' => $chiphi['selected'], 'TRANGTHAI' => $chiphi['trangthai']);
    	$this->db->where('MACP', $chiphi['id']);
    	$this->db->update('chiphi', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Update selected
    public function updateSelectedTrangThaiChiPhi($chiphi) {
    	$data = array('MANT'=>$chiphi['nhatro'], 'Selected'=>$chiphi['selected'], 'TRANGTHAI'=>$chiphi['trangthai']);
    	$this->db->where('MACP', $chiphi['id']);
    	$this->db->update('chiphi', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    public function updateOtherChiPhi($chiphi) {
        $data = array('Selected'=>'no');
        $this->db->where(array('MACP !='=>$chiphi['id'], 'MANT'=>$chiphi['nhatro'], 'TRANGTHAI'=>'new'));
        $this->db->update('chiphi', $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    // Get nhatro chiphi
    public function getAllChiPhi() {
    	$query = $this->db->get('chiphi');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    // Get Position
    public function getPosition($id) {
    	$this->db->select('KINHDO, VIDO');
    	$query = $this->db->get_where('nhatro', array('MANT'=>$id));
    	return $query->result()[0];
    }

    // Get danh sach phong tro
    public function getPhongTro($id) {
    	// $id nha tro
        $this->db->select('*');
        $this->db->from('phongtro');
        $this->db->join('tientro', 'tientro.MATT = phongtro.MATT');
        $this->db->where('MANT', $id);
    	$query = $this->db->get();
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function updatePhongTro($pt) {
    	$data = array('TEN'=>$pt['ten'], 'DienTich'=>$pt['dientich'], 'SLTD'=>$pt['sltd'], 'GhiChu'=>$pt['ghichu']);
    	$this->db->where('MAPT', $pt['id']);
    	$this->db->update('phongtro', $data);
    	if($this->db->affected_rows() > 0) return $data['id'];
    	return false;
    }

    public function updatePhongTroWithTienTro($pt) {
        $data = array('TEN'=>$pt['ten'], 'MATT'=>$pt['matt'], 'DienTich'=>$pt['dientich'], 'SLTD'=>$pt['sltd'], 'GhiChu'=>$pt['ghichu']);
        $this->db->where('MAPT', $pt['id']);
        $this->db->update('phongtro', $data);
        if($this->db->affected_rows() > 0) return $data['id'];
        return false;
    }


    public function addPhongTro($pt) {    	// Get max id for nhatro
    	$query = $this->db->get('phongtro');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row->MAPT;
    	}
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }
    	$data = array('MAPT'=>$id, 'MANT'=>$pt['nhatro'], 'TEN'=>$pt['ten'], 'DienTich'=>$pt['dientich'], 'SLTD'=>$pt['sltd'], 'SLNDO'=>$pt['slndo'], 'GhiChu'=>$pt['ghichu']);
    	$this->db->insert('phongtro', $data);
    	if($this->db->affected_rows() > 0) return $id;
    	return false;
    }

    public function getTienTro($pt) {
    	$query = $this->db->get_where('tientro', array('MAPT'=>$pt));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function addTienTro($tt) {
    	$query = $this->db->get('tientro');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row->MATT;
    	}
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }
    	$data = array('MATT'=>$id, 'MAPT'=>$tt['mapt'], 'GIA'=>$tt['gia'], 'NGAYTAO'=>$tt['ngaytao'], 'CACHTINH'=>$tt['cachtinh']);
    	$this->db->insert('tientro', $data);
    	if($this->db->affected_rows() > 0) return $id;
    	return false;
    }

    public function updateTienTroPhongTro($pt) {
    	$data = array('MATT'=>$pt['matt']);
    	$this->db->where('MAPT', $pt['id']);
    	$this->db->update('phongtro', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    public function addThanhVienTro($nt, $mapt) {
    	$query = $this->db->get('thanhvientro');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row->MANO;
    	}
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }
    	$data = array('MANO'=>$id, 'MAPT'=>$mapt, 'TEN'=>$nt['hoten'], 'SDT'=>$nt['sdt'], 'CMND'=>$nt['cmnd'], 'DIACHI'=>$nt['diachi'], 'GIOITINH'=>$nt['gioitinh']);
    	$this->db->insert('thanhvientro', $data);
    	if($this->db->affected_rows() > 0) return $id;
    	return false;
    }

    public function addThongTinTro($ttt) {
    	$data = array('MANO'=>$ttt['mano'], 'MAPT'=>$ttt['mapt'], 'TRANGTHAI'=>$ttt['trangthai'], 'NGAYO'=>$ttt['ngayo']);
    	$this->db->insert('thongtintro', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    public function getMotPhongTro($id) {
        $this->db->select('*');
        $this->db->from('phongtro');
        $this->db->join('tientro', 'tientro.MATT = phongtro.MATT');
        $this->db->where('phongtro.MAPT', $id);
        $data = $this->db->get();
        return $data->result()[0];
    }

    public function getNguoiTro($id) {
        $this->db->select('*');
        $this->db->from('thanhvientro');
        $this->db->join('thongtintro', 'thanhvientro.MANO = thongtintro.MANO');
        $this->db->join('phongtro', 'phongtro.MAPT = thanhvientro.MAPT');
        $this->db->where(array('thanhvientro.MAPT'=>$id, 'thongtintro.TRANGTHAI'=>'dango'));

        $result = $this->db->get();
        if(count($result->result())) return $result->result();
        return false;
    }

    public function updateNguoiTro($nt) {
        $data = array('TEN'=>$nt['ten'], 'CMND'=>$nt['cmnd'], 'SDT'=>$nt['sdt'], 'GIOITINH'=>$nt['gioitinh'], 'DIACHI'=>$nt['diachi']);
        $this->db->where('MANO', $nt['id']);
        $this->db->update('thanhvientro', $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function updateSoNguoiDangO($pt) {
        $data = array('SLNDO'=>$pt['sldo']);
        $this->db->where('MAPT',$pt['id']);
        $this->db->update('phongtro', $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function updateChuyenTro($mapt, $id) {
        $this->db->where(array('MANO'=>$id, 'MAPT'=>$mapt));
        $this->db->update('thongtintro', array('TRANGTHAI'=>'dachuyen', 'NGAYTRA'=>date('Y-m-d h:m:s')));
        if($this->db->affected_rows() > 0) return true;
        return false;
    }
}