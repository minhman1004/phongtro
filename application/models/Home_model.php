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
    	$query = $this->db->query("select baiviet.TIEUDE,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10
order by baiviet.TGDANG DESC");
    	$data = array();
    	foreach(@$query->result() as $row) {
            $row->slug = $row->MABV.'-'.$row->TIEUDE;
            $row->slug = postSlug($row->slug);
    		$data[] = $row;
    	}
    	if(count($data)) {
    		return $data;
    	}
    	return false;
    }
    // neu gia =all, dien tich all, qh all, ttp !all
    public function getBaiViet_ttp($ttp) {
        $query = $this->db->query("select baiviet.TIEUDE,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp."
order by baiviet.TGDANG DESC");
        $data = array();
        foreach(@$query->result() as $row) {
            $row->slug = $row->MABV.'-'.$row->TIEUDE;
            $row->slug = postSlug($row->slug);
            $data[] = $row;
        }
        if(count($data)) {
            return $data;
        }
        return false;
    }
    public function getBaiViet_ttp_qh($ttp,$qh) {
        $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh."
order by baiviet.TGDANG DESC");
        $data = array();
        foreach(@$query->result() as $row) {
            $row->slug = $row->MABV.'-'.$row->TIEUDE;
            $row->slug = postSlug($row->slug);
            $data[] = $row;
        }
        if(count($data)) {
            return $data;
        }
        return false;
    }

    public function getBaiViet_ttphohon20($ttp,$qh,$dientich) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.DIENTICH < ".$dientich."
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
        public function getBaiViet_ttphohon230($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.dientich BETWEEN 20 AND 30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

  public function getBaiViet_ttphohon30($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.dientich > 30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

        public function getBaiViet_ttphohon20_() {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10  and ctbv.DIENTICH < 20
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
        public function getBaiViet_ttphohon230_() {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and  ctbv.dientich BETWEEN 20 AND 30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

  public function getBaiViet_ttphohon30_() {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.dientich > 30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }


  public function getBaiViet_gianhohon_1trieu($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia < 1000000
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

  public function getBaiViet_gianhohon_1trieu_2trieu($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and (ctbv.gia >= 1000000 and ctbv.gia <=2000000)   order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
    public function getBaiViet_gianhohon_2trieu($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia > 2000000   
                order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

public function getBaiViet_gianhohon_1trieu_() {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.gia < 1000000
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

  public function getBaiViet_gianhohon_1trieu_2trieu_() {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet'  and (ctbv.gia >= 1000000 and ctbv.gia <=2000000)   order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
    public function getBaiViet_gianhohon_2trieu_() {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.gia > 2000000   
                order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }


    public function getBaiViet_gia_1_dientich_20($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia < 1000000 and ctbv.dientich < 20
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

    public function getBaiViet_gia_1_dientich_230($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia < 1000000 and ctbv.dientich BETWEEN 20 AND 30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

        public function getBaiViet_gia_1_dientich_350($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia < 1000000 and ctbv.dientich >30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
        
         public function getBaiViet_gia_12_dientich_20($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia  BETWEEN 1000000 AND 2000000 and ctbv.dientich <20
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
    public function getBaiViet_gia_12_dientich_230($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia  BETWEEN 1000000 AND 2000000 and ctbv.dientich BETWEEN 20 AND 30
    order by baiviet.TGDANG DESC;");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

        public function getBaiViet_gia_12_dientich_350($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia  BETWEEN 1000000 AND 2000000 and ctbv.dientich >30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

         public function getBaiViet_gia_2_dientich_20($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia > 2000000 and ctbv.dientich <20
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }
    public function getBaiViet_gia_2_dientich_230($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia > 2000000 and ctbv.dientich BETWEEN 20 AND 30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }

        public function getBaiViet_gia_2_dientich_350($ttp,$qh) {
            $query = $this->db->query("select baiviet.TIEUDE,ctbv.dientich,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp." and ctbv.MAQH = ".$qh." and ctbv.gia  > 2000000 and ctbv.dientich >30
    order by baiviet.TGDANG DESC");
            $data = array();
            foreach(@$query->result() as $row) {
                $row->slug = $row->MABV.'-'.$row->TIEUDE;
                $row->slug = postSlug($row->slug);
                $data[] = $row;
            }
            if(count($data)) {
                return $data;
            }
            return false;
        }






























//     public function getBaiViet_ttp($mattp) {
//         $query = $this->db->query("select baiviet.TIEUDE,ctbv.GIA,baiviet.TGDANG,ctbv.DCTD, ctbv.MOTATHEM,ctbv.HINHANH,baiviet.MABV from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10
// order by baiviet.TGDANG DESC");
//         $data = array();
//         foreach(@$query->result() as $row) {
//             $row->slug = $row->MABV.'-'.$row->TIEUDE;
//             $row->slug = postSlug($row->slug);
//             $data[] = $row;
//         }
//         if(count($data)) {
//             return $data;
//         }
//         return false;
//     }


    public function getBaiViet1($ttp) {
        $query = $this->db->query("select * from baiviet join ctbv on baiviet.MABV = ctbv.MABV and baiviet.TRANGTHAI ='daduyet' and baiviet.TGDANG <= now() - 10 and ctbv.MATTP = ".$ttp.";");
        $data = array();
        foreach(@$query->result() as $row) {
            $row->slug = $row->MABV.'-'.$row->TIEUDE;
            $row->slug = postSlug($row->slug);
            $data[] = $row;
        }
        if(count($data)) {
            return $data;
        }
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
}

function postSlug($tenbv) {
    $tenbv = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $tenbv);
    $tenbv = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $tenbv);
    $tenbv = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $tenbv);
    $tenbv = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $tenbv);
    $tenbv = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $tenbv);
    $tenbv = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $tenbv);
    $tenbv = preg_replace("/(đ)/", "d", $tenbv);
    $tenbv = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $tenbv);
    $tenbv = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $tenbv);
    $tenbv = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $tenbv);
    $tenbv = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $tenbv);
    $tenbv = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $tenbv);
    $tenbv = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $tenbv);
    $tenbv = preg_replace("/(Đ)/", "D", $tenbv);
    $tenbv = preg_replace("/\s+/u", " ", $tenbv);
    $tenbv = str_replace(" ", "-", $tenbv);
    $tenbv = strtolower($tenbv);
    return $tenbv;
}