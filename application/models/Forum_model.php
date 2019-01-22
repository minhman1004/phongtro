<?php
class Forum_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getNguoiTro($cmnd, $sdt) {
    	$query = $this->db->get_where('thanhvientro', array('SDT'=>$sdt, 'CMND'=>$cmnd));
    	$data = $query->result();
    	if(isset($data)) {
    		if(count($data)) return $data;
    		return false;
    	}
    }

    public function getNguoiCMND($cmnd) {
    	$query = $this->db->get_where('thanhvientro', array('CMND'=>$cmnd));
    	$data = $query->result();
    	if(isset($data)) {
    		if(count($data)) return $data;
    		return false;
    	}
    }

    public function getNhaTro($mant) {
    	$query = $this->db->get_where('nhatro', array('MANT'=>$mant));
    	$data = $query->result();
    	if(isset($data)) {
    		if(count($data)) return $data;
    		return false;
    	}
    }

    public function getPhongTro($mapt) {
    	$query = $this->db->get_where('phongtro', array('MAPT'=>$mapt));
    	$data = $query->result();
    	if(isset($data)) {
    		if(count($data)) return $data;
    		return false;
    	}
    }

    public function getTienTro($mapt, $matt) {
    	$query = $this->db->get_where('tientro', array('MAPT'=>$mapt, 'MATT'=>$matt));
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getChiPhi($mant) {
    	$query = $this->db->get_where('chiphi', array('MANT'=>$mant, 'Selected'=>'yes', 'TRANGTHAI'=>'new'));
    	$data = $query->result();
    	if(isset($data)) {
    		if(count($data)) return $data;
    		return false;
    	}
    }

    public function getChuTro($mand) {
        $query = $this->db->get_where('nguoidung', array('MAND'=>$mand));
        $data = $query->result();
        if(isset($data)) {
            if(count($data)) return $data;
            return false;
        }
    }

    public function getThongTinTro($mapt, $mano) {
        $query = $this->db->get_where('thongtintro', array('MAPT'=>$mapt, 'MANO'=>$mano));
        $data = $query->result();
        if(isset($data)) {
            if(count($data)) return $data;
            return false;
        }
    }

    public function addTopic($tp) {
        $query = $this->db->get('topic');
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row->TOPIC;
        }
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }

        $topic = array('TOPIC'=>$id, 'MANT'=>$tp['mant'], 'CPBINHLUAN'=>$tp['cpbinhluan'], 'MANO'=>$tp['mano'], 'MAND'=>$tp['mand'], 'NOIDUNG'=>$tp['noidung'], 'NGAYTAO'=>$tp['ngaytao'], 'TRANGTHAI'=>$tp['trangthai']);
        $this->db->insert('topic', $topic);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function getTopic($mant, $mano) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->order_by('NGAYTAO', 'desc');
        $this->db->where('MANT',$mant);
        $data = array();
        $query = $this->db->get();
        foreach(@$query->result() as $row) {
            $row->countbl = strval($this->countBinhLuan($row->TOPIC));
            $row->countthich = strval($this->countThich($row->TOPIC));
            $row->countkthich = strval($this->countKThich($row->TOPIC));
            $row->thich = $this->checkThich($mano, $row->TOPIC);
            $row->kthich = $this->checkKThich($mano, $row->TOPIC);
            $row->react = $this->getReact($mano);
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getTVTCuaNhaTro($mant) {
        $this->db->select('*');
        $this->db->from('thanhvientro');
        $this->db->join('phongtro', 'phongtro.MAPT = thanhvientro.MAPT');
        $this->db->where('phongtro.MANT', $mant);
        $rs = $this->db->get();
        $data = array();
        foreach(@$rs->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function checkThich($mano, $topic) {
        $query = $this->db->get_where('react', array('MANO'=>$mano, 'TOPIC'=>$topic));
        if(isset($query)) {
            $data = $query->result();
            if(count($data)) {
                if($data[0]->THICH == 'yes') return 'yes';
                return 'no';
            }
            return 'no';
        }
        return 'no';
    }

    public function checkKThich($mano, $topic) {
        $query = $this->db->get_where('react', array('MANO'=>$mano, 'TOPIC'=>$topic));
        if(isset($query)) {
            $data = $query->result();
            if(count($data)) {
                if($data[0]->KTHICH == 'yes') return 'yes';
                return 'no';
            }
            return 'no';
        }
        return 'no';
    }

    public function getReact($mano) {
        $query = $this->db->get_where('react', array('MANO'=>$mano));
        if(isset($query)) {
            $data = $query->result();
            if(count($data)) {
                return $data;
            }
            return false;
        }
        return false;
    }

    public function getBinhLuan($matp) {
        $this->db->select('*');
        $this->db->from('binhluan');
        $this->db->order_by('binhluan.NGAYBL', 'desc');
        $this->db->where('binhluan.TOPIC', $matp);
        $rs = $this->db->get();
        $data = array();
        foreach(@$rs->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function countBinhLuan($tp) {
        $this->db->select('*');
        $this->db->from('binhluan');
        $this->db->join('topic', 'topic.TOPIC = binhluan.TOPIC');
        $this->db->where(array('binhluan.TOPIC'=>$tp, 'binhluan.TRANGTHAI'=>'show'));
        return $this->db->count_all_results();
    }

    public function countThich($tp) {
        $this->db->select('*');
        $this->db->from('react');
        $this->db->join('topic', 'topic.TOPIC = react.TOPIC');
        $this->db->where(array('react.TOPIC'=>$tp, 'react.THICH'=>'yes'));
        return $this->db->count_all_results();
    }

    public function countKThich($tp) {
        $this->db->select('*');
        $this->db->from('react');
        $this->db->join('topic', 'topic.TOPIC = react.TOPIC');
        $this->db->where(array('react.TOPIC'=>$tp, 'react.THICH'=>'no'));
        return $this->db->count_all_results();
    }

    public function getOneTopic($tp) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('TOPIC', $tp);
        $rs = $this->db->get();
        $data = $rs->result();
        $data[0]->countthich = strval($this->countThich($tp));
        $data[0]->countkthich = strval($this->countKThich($tp));
        if(isset($data)) return $data;
        return false;
    }

    public function addBinhLuan($bl) {
        $query = $this->db->get('binhluan');
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row->MABL;
        }
        $id = 1;
        if(isset($data)) {
            if(count($data)) {
                $id = max($data) + 1;
            }
        }

        $binhluan = array('MABL'=>$id, 'MANO'=>$bl['mano'], 'MAND'=>$bl['mand'], 'TOPIC'=>$bl['topic'], 'NOIDUNG'=>$bl['noidung'], 'NGAYBL'=>$bl['ngaytao'], 'TRANGTHAI'=>$bl['trangthai']);
        $this->db->insert('binhluan', $binhluan);
        if($this->db->affected_rows() > 0) return $id;
        return false;
    }

    public function addThich($t) {
        $data = array('MANO'=>$t['mano'], 'MAND'=>$t['mand'], 'TOPIC'=>$t['topic'],'THICH'=>$t['thich'], 'KTHICH'=>$t['kthich'], 'NGAY'=>$t['date']);
        $query = 'call INSERT_REACT_FORUM(?, ?, ?, ?, ?, ?)';
        $this->db->query($query, $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function getEditTopic($topic) {
        $query = $this->db->get_where('topic', array('TOPIC'=>$topic));
        if(isset($query)) return $query->result();
        return false;
    }

    public function updateTopic($tp) {
        $data = array('CPBINHLUAN'=>$tp['cpbinhluan'], 'NOIDUNG'=>$tp['noidung']);
        $this->db->where('TOPIC', $tp['topic']);
        $this->db->update('topic', $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function getMotBinhLuan($mabl) {
        $query = $this->db->get_where('binhluan', array('MABL'=>$mabl));
        if(isset($query)) return $query->result();
        return false;
    }

    public function updateBinhLuan($mabl, $noidung) {
        $data = array('NOIDUNG'=>$noidung);
        $this->db->where('MABL', $mabl);
        $this->db->update('binhluan', $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function deleteBinhLuan($mabl) {
        $data = array('TRANGTHAI'=>'hide');
        $this->db->where('MABL',$mabl);
        $this->db->update('binhluan', $data);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function getPhongTro2($mano) {
        $this->db->select('*');
        $this->db->from('thongtintro');
        $this->db->where('MANO', $mano);
        $rs = $this->db->get();
        $data = array();
        foreach(@$rs->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getHoaDon($mapt, $thang, $nam) {
        $this->db->select('*');
        $this->db->from('hoadon');
        $this->db->join('cthd', 'cthd.MAHD = hoadon.MAHD');
        $this->db->where(array('cthd.MAPT'=>$mapt,'cthd.THANG >='=>$thang, 'cthd.NAM >='=>$nam));
        $rs = $this->db->get();
        $data = array();
        foreach(@$rs->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }
}