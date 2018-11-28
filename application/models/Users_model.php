<?php
class Users_model extends CI_Model {
    // Get user
    public function getAllUser() {
    	$query = $this->db->get("nguoidung");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    // Get data user
    public function getUser($id) {
    	$query = $this->db->get_where('nguoidung', array('MAND'=>$id));
    	if(count($query->result())) return $query->result();
    	return false;
    }
}