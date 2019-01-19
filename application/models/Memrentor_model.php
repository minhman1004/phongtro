<?php
class Memrentor_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getNguoiTro($mapt) {
    	$this->db->select('*');
    	$this->db->from('thanhvientro');
    	$this->db->where('MAPT', $mapt);
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
}