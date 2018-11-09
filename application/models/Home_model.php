<?php
class Home_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Lấy danh sách Loại tin
    public function getLoaiTin() {
    }

    // Lấy danh sách Tỉnh / Thành phố
    public function getTinhTp() {
    	$query = $this->db->get("tinhtp");
    	$data = array();

    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }

    // Lấy danh sách Quận, Huyện
    public function getQuanHuyen() {
    	$query = $this->db->get("quanhuyen");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }

    // Lấy danh sách phường xã
    public function getPhuongXa() {
    	$query = $this->db->get("phuongxa");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }

    // Lấy danh sách Loại bất động sản
    public function getLoaiBDS() {
    }

    // Lấy danh sách Bảng giá tìm kiếm
    public function getBangGiaTimKiem() {

    }

    // Lấy danh sách bài viết
    public function getBaiViet() {
    	$query = $this->db->get("baiviet");
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