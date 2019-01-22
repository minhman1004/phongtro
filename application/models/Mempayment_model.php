<?php
class Mempayment_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getCTHD($mant, $mapt) {
    	$query = $this->db->query("select CSDM,CSNM,CTHD.MANT,CTHD.MAPT FROM cthd JOIN (SELECT MAX(THANG) AS 'MAX_THANG',MAX(NAM) AS 'MAX_NAM',MANT,MAPT  FROM CTHD WHERE CTHD.MANT = ".$mant." AND CTHD.MAPT = ".$mapt.") AS A ON A.MANT = cthd.MANT AND A.MAPT = CTHD.MAPT AND NAM = A.MAX_NAM  AND THANG = A.MAX_THANG");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function getAllChiPhi($mant) {
    	$this->db->select('*');
    	$this->db->from('chiphi');
    	$this->db->where(array('MANT'=>$mant, 'Selected'=>'yes', 'TRANGTHAI'=>'new'));
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function createThanhToan($hd) {
    	$data = array('MANT'=>$hd['mant'], 'MAPT'=>$hd['mapt'], 'THANG'=>$hd['thang'], 'NAM'=>$hd['nam'], 'DSDC'=>$hd['diencu'], 'CSDM'=>$hd['dienmoi'], 'CSNC'=>$hd['nuoccu'], 'CSNM'=>$hd['nuocmoi'], 'SLGX'=>$hd['gxe'], 'XD'=>$hd['xedap'], 'XM'=>$hd['xemay'], 'OT'=>$hd['oto'], 'SLWF'=>$hd['wifi']);
    	$query = 'call INSERT_HOADON_FIX(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    	$this->db->query($query, $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }

    public function getAllHoaDon($mant) {
    	$this->db->select('*');
    	$this->db->from('hoadon');
    	$this->db->join('cthd', 'cthd.MAHD = hoadon.MAHD');
    	$this->db->where('cthd.MANT', $mant);
    	$data = array();
    	$query = $this->db->get();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function completeHoaDon($hd) {
    	$data = array('TrangThai'=>$hd['trangthai'], 'NgayTra'=>$hd['ngaytra']);
    	$this->db->where('MAHD', $hd['mahd']);
    	$this->db->update('hoadon', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }
}