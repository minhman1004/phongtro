<?php
class Update_model extends CI_Model {
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

    // Lấy danh sách Bảng giá tìm kiếm
    public function getBangGiaTimKiem() {

    }

    // Lấy danh sách bài viết
    public function getBaiViet($id, $name) {
    	$query = $this->db->query("select * from baiviet join ctbv on baiviet.MABV = ctbv.MABV
                                    join nguoidung on nguoidung.MAND = ctbv.MAND
                                    join nhatro on nhatro.MANT = ctbv.MANT
                                    where baiviet.MABV = ".$id.";");
        if(postSlug($query->result()[0]->TIEUDE) == $name)
            return $query->result();
        return false;
    }

    // Lấy danh sách bài viết theo tỉnh/tp
    public function getBVKhuVuc($ma_tinhtp) {
        $query = $this->db->query('select * from baiviet join ctbv on baiviet.MABV = ctbv.MABV
                                    join nguoidung on nguoidung.MAND = ctbv.MAND
                                    join nhatro on nhatro.MANT = ctbv.MANT
                                    where nhatro.MATTP = '.$ma_tinhtp.';');
        $data = array();
        foreach(@$query->result() as $row) {
            $row->slug = $row->MABV.'-'.$row->TIEUDE;
            $row->slug = postSlug($row->slug);
            $data[] = $row;
        }
        if(count($data)) 
            return $data;
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
        $data = array('TIEUDE'=>$baiviet['tieude']);
        $this->db->where('MABV', $baiviet['mabv']);
        $this->db->update('baiviet', $data);
    }

    // Cao nhat Chi tiet bai viet
    public function updateCTBV($ctbv) {
        $data = array('MOTATHEM'=>$ctbv['mota']);
        $this->db->where('MABV', $ctbv['mabv']);
        $this->db->update('ctbv', $data);
    }

    // Cap nhat nha tro
    public function updateNhaTro($nhatro) {
        $data = array('DCTD'=>$nhatro['dctd']);
        $this->db->where('MANT', $nhatro['mant']);
        $this->db->update('nhatro', $data);
    }

    // Cap nhat phong tro
    public function updatePhongTro($phongtro) {
        $data = array('Gia'=>$phongtro['gia']);
        $this->db->where('MAPT', $phongtro['mapt']);
        $this->db->update('phongtro', $data);
    }
}
