<?php
class Update_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }


    // lay tat ca thong tin cua chi phi
    public function getAllChiphi() {
    	$query = $this->db->get("chiphi");
    	$data = array();
    	foreach(@$query->result() as $row) {
    		$data[] = $row;
    	}
    	if(count($data)) return $data;
    	return false;
    }
    // them 1 chi phi moi
    function addChiphi($MANT, $GiaNuoc, $GiaDien, $GiaGXe, $GiaWifi, $GiaRac)
    {
        $data = array('MANT' => $MANT, 'GiaNuoc' => $GiaNuoc, 'GiaDien' => $GiaDien, 'GiaGXe' => $GiaGXe, 'GiaWifi' => $GiaWifi, 'GiaRac' => $GiaRac);
        $this->db->insert('chiphi', $data);
        return $this->db->affected_rows();
    }
   function editChiphi($MANT, $GiaNuoc, $GiaDien, $GiaGXe, $GiaWifi, $GiaRac)
        {
            //$MAND = $this->session->userdata("MAND");
            $data = array('GiaNuoc' => $GiaNuoc, 'GiaDien' => $GiaDien, 'GiaGXe' => $GiaGXe, 'GiaWifi' => $GiaWifi, 'GiaRac' => $GiaRac);

             $this->db->where('MAND', $user['id']);
    		 $this->db->update('nguoidung', $data);
    		if($this->db->affected_rows() > 0) return $this->db->affected_rows();
    	return false; 
        }


