<?php
class Detail_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
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

    // Lấy thông tin bài viết
    public function getBaiViet($id, $name) {
        $query = $this->db->query("select * from baiviet join ctbv on baiviet.MABV = ctbv.MABV join nguoidung on nguoidung.MAND = ctbv.MAND and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10  and baiviet.MABV = ".$id.";");
        if(postSlug($query->result()[0]->TIEUDE) == $name)
            return $query->result();
        return false;
    }

    public function get_baiviet_($id, $name)
    {
         $query = $this->db->query("select baiviet.MABV,MANT,MAND,KINHDO,VIDO,gia,HINHANH,sdt,dientich from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10");
         if(postSlug($query->result()[0]->TIEUDE) == $name)
            return $query->result();
        return false;
    }
}