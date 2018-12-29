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
    	$id = max($data) + 1;
    	
    	// Insert new nhatro
    	$nhatro = array('MANT' => $id, 'TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'MAD' => $nt['duong'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard']);
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
    	$id = max($data) + 1;
    	
    	// Insert new nhatro
    	$nhatro = array('MANT' => $id, 'TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard']);
    	$this->db->insert('nhatro', $nhatro);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Get thong tin mot nha tro
    public function getMotNhaTro($id) {
    	$query = $this->db->get_where('nhatro', array('MANT'=>$id));
    	return $query->result();
    }

    // Update nha tro with MAD
    public function updateNhaTroDuong($nt) {
    	$data = array('TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'MAD' => $nt['duong'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard']);
    	$this->db->where('MANT', $nt['id']);
    	$this->db->update('nhatro', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Update nha tro without MAD
    public function updateNhaTro($nt) {
    	$data = array('TENNT' => $nt['ten'], 'MAND' => $nt['chutro'], 'DCTD' => $nt['diachi'], 'MATTP' => $nt['tinhtp'], 'MAQH' => $nt['quanhuyen'], 'MAPX' => $nt['phuongxa'], 'Camera'=>$nt['camera'], 'Parking'=>$nt['parking'], 'Guard'=>$nt['guard']);
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
    	$data = array('TENCP' => $chiphi['ten'], 'MANT' => $chiphi['nhatro'], 'GIANUOC' => $chiphi['nuoc'], 'GIADIEN' => $chiphi['dien'], 'GiaGXe' => $chiphi['giuxe'], 'GiaWifi' => $chiphi['wifi'], 'GiaRac' => $chiphi['rac'], 'XEDAP' => $chiphi['xedap'], 'XEMAY' => $chiphi['xemay'], 'OTO' => $chiphi['oto'], 'Selected' => 'no', 'TRANGTHAI' => $chiphi['trangthai']);
    	$this->db->insert('chiphi', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    // Update chi phi
    public function updateChiPhi($chiphi) {
    	$data = array('MANT'=>$chiphi['nhatro'], 'GIANUOC'=>$chiphi['nuoc'], 'GIADIEN'=>$chiphi['dien'], 'GiaGXe'=>$chiphi['giuxe'], 'GiaWifi'=>$chiphi['wifi'], 'GiaRac'=>$chiphi['giarac'], 'Selected' => $chiphi['selected'], 'TRANGTHAI' => $chiphi['trangthai']);
    	$this->db->where('MACP', $chiphi['id']);
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
}