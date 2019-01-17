<?php
class Member_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getNguoiDung($id) {
    	$query = $this->db->get_where('nguoidung', array('MAND'=>$id));
    	if($query->result()) return $query->result();
    	return false;
    }

    public function updateNguoiDung($nd) {
    	$data = array('HOTEN'=>$nd['ten'], 'Email'=>$nd['email'], 'SDT'=>$nd['sdt'], 'NgaySinh'=>$nd['ngaysinh'], 'GioiTinh'=>$nd['gioitinh']);
    	$this->db->where('MAND', $nd['id']);
    	$this->db->update('nguoidung', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    public function updatePass($pass) {
    	$data = array('MatKhau'=>$pass['pass']);
    	$this->db->where('MAND', $pass['id']);
    	$this->db->update('nguoidung', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    public function getBaiViet($mand) {
        $this->db->select('*');
        $this->db->from('baiviet');
        $this->db->join('ctbv', 'ctbv.MABV = baiviet.MABV');
        $this->db->where(array('ctbv.MAND'=>$mand, 'baiviet.TRANGTHAI !='=>'dangcho'));
        $result = $this->db->get();
        $data = array();
        foreach(@$result->result() as $row) {
            if($row->MANT == null)
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getBaiVietNoNhaTro($mand) {
        $this->db->select('*');
        $this->db->from('baiviet');
        $this->db->join('ctbv', 'ctbv.MABV = baiviet.MABV');
        $this->db->where(array('ctbv.MAND'=>$mand, 'baiviet.TRANGTHAI !='=>'dangcho'));
        $result = $this->db->get();
    }

    public function getAllTopic($mand) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->join('nhatro', 'nhatro.MANT = topic.MANT');
        $this->db->where('nhatro.MAND', $mand);
        $query = $this->db->get();
        $data = array();
        foreach(@$query->result() as $row) {
            $row->countbl = $this->countBinhLuan($row->TOPIC);
            $row->countthich = $this->countThich($row->TOPIC);
            $row->countkthich = $this->countKThich($row->TOPIC);
            $row->thich = $this->checkThich($row->MAND, $row->TOPIC);
            $row->kthich = $this->checkKThich($row->MAND, $row->TOPIC);
            $row->react = $this->getReact($row->MAND);
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getAllNhaTro($mand) {
        $this->db->select('*');
        $this->db->from('nhatro');
        $this->db->where('MAND', $mand);
        $query = $this->db->get();
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function countPhongTro($mant) {
        $this->db->select('*');
        $this->db->from('phongtro');
        $this->db->where('MANT', $mant);
        return $this->db->count_all_results();
    }

    public function countNguoiO($mant) {
        $this->db->select('*');
        $this->db->from('thanhvientro');
        $this->db->join('phongtro', 'phongtro.MAPT = thanhvientro.MAPT');
        $this->db->where('phongtro.MANT', $mant);
        return $this->db->count_all_results();
    }

    public function getBangGia($mant) {
        $this->db->select("*");
        $this->db->from('chiphi');
        $this->db->where(array('MANT'=>$mant, 'Selected'=>'yes'));
        $query = $this->db->get();
        if(isset($query)) return $query->result();
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

    public function checkThich($mand, $topic) {
        $query = $this->db->get_where('react', array('MAND'=>$mand, 'TOPIC'=>$topic));
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

    public function checkKThich($mand, $topic) {
        $query = $this->db->get_where('react', array('MAND'=>$mand, 'TOPIC'=>$topic));
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

    public function getReact($mand) {
        $query = $this->db->get_where('react', array('MAND'=>$mand));
        if(isset($query)) {
            $data = $query->result();
            if(count($data)) {
                return $data;
            }
            return false;
        }
    }

    public function getNguoiTro($mand) {
        $this->db->select('thanhvientro.MANO, thanhvientro.MAPT, thanhvientro.TEN');
        $this->db->from('thanhvientro');
        $this->db->join('phongtro', 'phongtro.MAPT = thanhvientro.MAPT');
        $this->db->join('nhatro', 'nhatro.MANT = phongtro.MANT');
        $this->db->where('nhatro.MAND', $mand);
        $query = $this->db->get();
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getTopicNhaTro($mant) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('MANT', $mant);
        $query = $this->db->get();
        $data = array();
        foreach(@$query->result() as $row) {
            $row->countbl = $this->countBinhLuan($row->TOPIC);
            $row->countthich = $this->countThich($row->TOPIC);
            $row->countkthich = $this->countKThich($row->TOPIC);
            $row->thich = $this->checkThich($row->MAND, $row->TOPIC);
            $row->kthich = $this->checkKThich($row->MAND, $row->TOPIC);
            $row->react = $this->getReact($row->MAND);
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getNguoiTroNhaTro($mant) {
        $this->db->select('thanhvientro.MANO, thanhvientro.MAPT, thanhvientro.TEN');
        $this->db->from('thanhvientro');
        $this->db->join('phongtro', 'phongtro.MAPT = thanhvientro.MAPT');
        $this->db->where('phongtro.MANT', $mant);
        $query = $this->db->get();
        $data = array();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }

    public function getChuTro($mand) {
        $query = $this->db->get_where('nguoidung', array('MAND'=>$mand));
        if(isset($query)) {
            $data = $query->result();
            if(count($data)) {
                return $data;
            }
            return false;
        }
        return false;
    }
}