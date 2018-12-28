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
}