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
		$data = array('TENMD'=>$md['tenmd'], 'MUCDO'=>$md['mucdo'], 'DONVI'=>$md['donvi']);
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
}