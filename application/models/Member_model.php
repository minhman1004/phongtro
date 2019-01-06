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

    public function getBaiVietYesNhaTro($mand) {

    }
}