<?php
class Publish_model extends CI_Model {
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

    // Lay danh sach diachitt
    public function getDiaChiTT() {
    	$query = $this->db->get("diachitt");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

// Lấy danh sách Tỉnh / Thành phố theo nha tro
    public function getTinhTp1($mant) 
    {

        $query = $this->db->query("select tinhtp.* from tinhtp join nhatro on nhatro.MATTP = tinhtp.MATTP where nhatro.MANT = ".$mant.";");
         return $query->result();
    }

    // Lấy danh sách Quận, Huyện
    public function getQuanHuyen1($mant) {
        $query = $this->db->query("select quanhuyen.* from quanhuyen join nhatro on nhatro.MAQH = quanhuyen.MAQH where nhatro.MANT = ".$mant.";");
        return $query->result();
    }

    // Lấy danh sách phường xã
    public function getPhuongXa1($mant) {
        $query = $this->db->query("select phuongxa.* from phuongxa join nhatro on nhatro.MAPX = phuongxa.MAPX  where nhatro.MANT = ".$mant.";");
         return $query->result();
    }

    // Lay danh sach diachitt
    public function getDiaChiTT1($mant) {
        $query = $this->db->query("select diachitt.* from diachitt join nhatro on nhatro.MAD = diachitt.MAD where nhatro.MANT = ".$mant.";");
        return $query->result();
    }
    public function getMotNhaTro($mant) {
        $query = $this->db->query("select nhatro.MATTP from nhatro join tinhtp on nhatro.MATTP = tinhtp.MATTP where nhatro.MANT = ".$mant.";");
        return $query->result();
    }  
     public function getMotQuanHuyen($mattp)
      {
        $query = $this->db->query("select quanhuyen.* from quanhuyen join tinhtp on tinhtp.MATTP = quanhuyen.MATTP and tinhtp.MATTP = ".$mattp[0]->MATTP.";");
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    } 
     public function getMotPhuongXa($mattp) {
        $query = $this->db->query("select phuongxa.* from phuongxa join tinhtp on tinhtp.MATTP = phuongxa.MATTP and tinhtp.MATTP and tinhtp.MATTP = ".$mattp[0]->MATTP.";");
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    } 
    public function getMotDuong($mattp) {
        $query = $this->db->query("select diachitt.* from diachitt join tinhtp on tinhtp.MATTP = diachitt.MATTP  and tinhtp.MATTP = ".$mattp[0]->MATTP.";");
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getnhatro1($id) {
        $query = $this->db->query("select * from nhatro where nhatro.MANT = ".$id.";");
         return $query->result();
    }
    //select quanhuyen.* from quanhuyen join tinhtp on tinhtp.MATTP = quanhuyen.MATTP and tinhtp.MATTP = 2

     

   // select quanhuyen.*,phuongxa.*,diachitt.* from nhatro join tinhtp on tinhtp.MATTP = nhatro.MATTP join quanhuyen on tinhtp.MATTP =quanhuyen.MATTP join phuongxa on phuongxa.MAQH = quanhuyen.MAQH and phuongxa.MATTP = tinhtp.MATTP JOIN diachitt on diachitt.MATTP = tinhtp.MATTP and diachitt.MAQH = quanhuyen.MAQH and diachitt.MAPX = phuongxa.MAPX and nhatro.MAND = 3
    // Lấy danh sách Bảng giá tìm kiếm
    
    public function getBangGiaTimKiem() {

    }

    // Lấy danh sách bài viết
    public function getBaiViet($id, $name) {
    	$query = $this->db->query("select * from baiviet join ctbv on baiviet.MABV = ctbv.MABV
                                    join nguoidung on nguoidung.MAND = ctbv.MAND
                                    join nhatro on nhatro.MANT = ctbv.MANT
                                    join phongtro on phongtro.MAPT = ctbv.MAPT
                                    join diachitt on diachitt.MAD = nhatro.DCTT
                                    where baiviet.MABV = ".$id.";");
        if(postSlug($query->result()[0]->TIEUDE) == $name)
            return $query->result();
        return false;
    }

    // Lấy thông tin 1 tỉnh/tp cụ thể
    public function getTinhTpOnly($ma_tinhtp) {
        $query = $this->db->get_where("tinhtp", array("MATTP" => $ma_tinhtp));
        if(count($query->result()))
            return $query->result();
        return false;
    }

    // Cap nhat bai viet
    public function updateBaiViet($baiviet) {
    }

    // Lấy danh sách nhà trọ
    public function getNhaTro($id) {
    	$query = $this->db->get_where("nhatro", array("MAND"=>$id));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    // Get nguoidung
    public function getNguoiDung($id) {
        $query = $this->db->get_where('nguoidung', array('MAND'=>$id));
        if(count($query->result())) return $query->result();
        return false;
    }
}