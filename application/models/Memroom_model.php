<?php
class Memroom_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getNguoiTro($mapt) {
    	$this->db->select('*');
    	$this->db->from('thanhvientro');
    	$this->db->join('thongtintro', 'thongtintro.MANO = thanhvientro.MANO');
    	$this->db->where(array('thongtintro.MAPT'=>$mapt, 'thongtintro.TRANGTHAI'=>'dango'));
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getDsNhaTro($mand) {
    	$this->db->select('*');
    	$this->db->from('nhatro');
    	$this->db->where('MAND', $mand);
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getDsPhongTro($mant) {
    	$this->db->select('*');
    	$this->db->from('phongtro');
    	$this->db->where('MANT', $mant);
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getTienTro() {
    	$this->db->select('*');
    	$this->db->from('tientro');
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getPhongTro($mapt) {
    	$this->db->select('*');
    	$this->db->from('phongtro');
    	$this->db->where('MAPT', $mapt);
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getTinhtp() {
    	$query = $this->db->get('tinhtp');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getQuanhuyen() {
    	$query = $this->db->get('quanhuyen');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getPhuongxa() {
    	$query = $this->db->get('phuongxa');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getDuong() {
    	$query = $this->db->get('diachitt');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getNhaTro($mant) {
    	$query = $this->db->get_where('nhatro', array('MANT'=>$mant));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getChiPhi($mant) {
    	$query = $this->db->get_where('chiphi', array('MANT'=>$mant, 'TRANGTHAI'=>'new'));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }
}