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

        $topic = array('TOPIC'=>$id, 'MANT'=>$tp['mant'], 'CPBINHLUAN'=>$tp['cpbinhluan'], 'MANO'=>$tp['mano'], 'MAND'=>$tp['mand'], 'NOIDUNG'=>$tp['noidung'], 'NGAYTAO'=>$tp['ngaytao'], 'TRANGTHAI'=>$tp['trangthai'], 'THICH'=>$tp['thich'], 'KTHICH'=>$tp['kthich']);
        $this->db->insert('topic', $topic);
        if($this->db->affected_rows() > 0) return true;
        return false;
    }

    public function getTopic($mant) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->order_by('NGAYTAO', 'desc');
        $this->db->where('MANT',$mant);
        $data = array();
        $query = $this->db->get();
        foreach(@$query->result() as $row) {
            $data[] = $row;
        }
        if(count($data)) return $data;
        return false;
    }
}