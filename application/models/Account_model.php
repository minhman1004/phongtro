<?php
class Account_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getChucVu() {
    	$query = $this->db->get('vaitro');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    public function addChucVu($chucvu) {
    	$data = array('TENVT'=>$chucvu['ten'], 'MOTA'=>$chucvu['mota'], 'TRANGTHAI'=>$chucvu['trangthai'], 'PL'=>$chucvu['phanloai']);
    	$this->db->insert('vaitro', $data);
        if($this->db->affected_rows() > 0) return $this->db->affected_rows();
        return false;
    }

    public function updateChucVu($chucvu) {
        $data = array('TENVT'=>$chucvu['ten'], 'MOTA'=>$chucvu['mota'], 'TRANGTHAI'=>$chucvu['trangthai'], 'PL'=>$chucvu['phanloai']);
        $this->db->where('MAVT', $chucvu['id']);
        $this->db->update('vaitro', $data);
        if($this->db->affected_rows() > 0) return $this->db->affected_rows();
        return false;
    }

    public function compareTen($ten) {
        $query = $this->db->get('vaitro');
        $count = 0;
        foreach(@$query->result() as $row) {
            if(strcmp($ten, $row->TENVT) == 0) {
                $count ++;
            }
        }
        if($count > 0) return false;
        return true;
    }
}