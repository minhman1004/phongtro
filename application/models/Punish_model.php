<?php
class Punish_model extends CI_Model {
	public function getLoiViPham() {
		$query = $this->db->get('loivipham');
		$data = array();
		foreach(@$query->result() as $row) {
			$data[] = $row;
		}
		if(count($data)) return $data;
		return false;
	}

	public function getMucPhat() {
		$query = $this->db->get('mucdo');
		$data = array();
		foreach(@$query->result() as $row) {
			$data[] = $row;
		}
		if(count($data)) return $data;
		return false;
	}

	public function getDonVi() {
		$query = $this->db->get('donvi');
		$data = array();
		foreach(@$query->result() as $row) {
			$data[] = $row;
		}
		if(count($data)) return $data;
		return false;
	}

	public function addDonVi($dv) {
		$data = array('TENDV' => $dv['tendv'], 'KIEU'=>$dv['kieu']);
		$this->db->insert('donvi', $data);
		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	public function addMucPhat($mp) {
		$data = array('TENMD'=>$mp['tenmd'], 'MUCDO'=>$mp['mucdo'], 'DONVI'=>$mp['donvi']);
		$this->db->insert('mucdo', $data);
		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	public function addLoi($loi) {
		$data = array('TEN'=>$loi['ten'], 'MOTA'=>$loi['mota']);
		$this->db->insert('loivipham', $data);
		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	public function getMotDonVi($id) {
		$query = $this->db->get_where('donvi', array('MADV'=>$id));
		if(count($query->result()) > 0) return $query->result()[0];
		return false;
	}

	public function getMotMucPhat($id) {
		$query = $this->db->get_where('mucdo', array('MAMD'=>$id));
		if(count($query->result()) > 0) return $query->result()[0];
		return false;
	}

	public function getMotLoi($id) {
		$query = $this->db->get_where('loivipham', array('MALOI'=>$id));
		if(count($query->result()) > 0) return $query->result()[0];
		return false;
	}

	public function updateDonVi($donvi) {
		$data = array('TENDV'=>$donvi['tendv'], 'KIEU'=>$donvi['kieu']);
		$this->db->where('MADV', $donvi['id']);
		$this->db->update('donvi', $data);
		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	public function updateMucPhat($mp) {
		$data = array('TENMD'=>$mp['ten'], 'MUCDO'=>$mp['mucdo'], 'DONVI'=>$mp['donvi']);
		$this->db->where('MAMD', $mp['id']);
		$this->db->update('mucdo', $data);
		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	public function updateLoi($loi) {
		$data = array('TEN'=>$loi['ten'], 'MOTA'=>$loi['mota']);
		$this->db->where('MALOI', $loi['id']);
		$this->db->update('loivipham', $data);
		if($this->db->affected_rows() > 0) return true;
		return false;
	}
}