<?php
class quanlynhatro extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
       
    }
   //Lấy danh sách người dùng
    public function getChiphi(){

        $MAND = $this->session->userdata("MAND");
        $query =$this->db->query("select * FROM nguoidung JOIN nhatro ON nguoidung.MAND = nhatro.MAND JOIN chiphi ON chiphi.MANT = nhatro.MANT where nguoidung.MAND=".$MAND.';');

        $data = array();
        foreach (@$query->result() as $row) {
            $data[] =$row;

        }
        if(count($data))
        {

            return $data;
        }
        return false;
    }
    function getPhongtro(){
        $MAND = $this->session->userdata("MAND");
        $query =$this->db->query("select phongtro.* from phongtro join nhatro on nhatro.MANT = phongtro.MANT join nguoidung on nguoidung.MAND = nhatro.MAND where nguoidung.MAND=".$MAND.';');
        $data = array();
        foreach (@$query->result() as $row) {
            $data[] =$row;

        }
        if(count($data))
        {
            return $data;
        }
        return false;
    }

      function editChiphi($MAND,$MANT,$GIANUOC,$GIADIEN,$Ga)
        {
            $MAND = $this->session->userdata("MAND");
            $data = array('TenLoaiPhong' => $type, 'GiaPhong' => $price);

            $this->db->where('TenLoaiPhong', $type);
            $this->db->update('loaiphong', $data); 
        }

   function getImage($mant)
    {
        $query = $this->db->query('select HINHANH from test where MANT='.$mant.';');
        return $query->result();
    }
    
    function uploadImage($location, $mant)
    {
        $data = array('HINHANH' => $location);

        $this->db->where('MANT', $mant);
        $this->db->update('test', $data); 
    }


}