<?php
class Users_model extends CI_Model {
    // Get user
    public function getAllUser() {
    	$query = $this->db->get("nguoidung");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }

    // Get data user
    public function getUser($id) {
    	$query = $this->db->get_where('nguoidung', array('MAND'=>$id));
    	if(count($query->result())) return $query->result()[0];
    	return false;
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

    public function checkName($hoten, $id) {
    	$query = $this->db->get_where('nguoidung', array('MAND'=>$id));
    	if(count($query->result())) {
    		if(strcmp($hoten, $query->result()->HOTEN) != 0) {
    			return true;
    		}
    	}
    	return false;
    }

    public function updateUser($user) {
    	$data = array('HOTEN'=>$user['hoten'], 'Email'=>$user['email'], 'SDT'=>$user['sdt'], 'GioiTinh'=>$user['gioitinh'], 'NgaySinh'=>$user['ngaysinh'], 'CMND'=>$user['cmnd'], 'CHUCVU'=>$user['chucvu']);
    	$this->db->where('MAND', $user['id']);
    	$this->db->update('nguoidung', $data);
    	if($this->db->affected_rows() > 0) return $this->db->affected_rows();
    	return false;
    }

    public function updateUserPass($user) {
    	$data = array('MatKhau'=> $user['matkhau'], 'HOTEN'=>$user['hoten'], 'Email'=>$user['email'], 'SDT'=>$user['sdt'], 'GioiTinh'=>$user['gioitinh'], 'NgaySinh'=>$user['ngaysinh'], 'CMND'=>$user['cmnd'], 'CHUCVU'=>$user['chucvu']);
    	$this->db->where('MAND', $user['id']);
    	$this->db->update('nguoidung', $data);
    	if($this->db->affected_rows() > 0) return $this->db->affected_rows();
    	return false;
    }

    // Kiem tra ten dang nhap
    public function checkTenDN($tendn) {
    	$query = $this->db->get('nguoidung');
    	$count = 0;
    	foreach(@$query->result() as $row) {
    		if(strcmp($row->TenDN, $tendn) == 0) $count++;
    	}
    	if($count > 0) return false;
    	return true;
    }

    // Kiem tra cmnd
    public function checkCmnd($cmnd) {
    	$query = $this->db->get('nguoidung');
    	$count = 0;
    	foreach(@$query->result() as $row) {
    		if(strcmp($row->TenDN, $cmnd) == 0) $count++;
    	}
    	if($count > 0) return false;
    	return true;
    }

    // Them tai khoan
    public function addUser($user) {
    	$query = $this->db->get('nguoidung');
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row->MAND;
    	}
    	$mand = max($data)+1;
    	$data = array('MAND'=>$mand, 'TenDN'=>$user['tendn'], 'MatKhau'=>$user['matkhau'], 'HOTEN'=>$user['hoten'], 'Email'=>$user['email'], 'SDT'=>$user['sdt'], 'GioiTinh'=>$user['gioitinh'], 'NgaySinh'=>$user['ngaysinh'], 'CMND'=>$user['cmnd'], 'CHUCVU'=>$user['chucvu']);
    	$this->db->insert('nguoidung', $data);
    	if($this->db->affected_rows() > 0) return true;
    	return false;
    }
}