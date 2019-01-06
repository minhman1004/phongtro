<?php

class Restaurant_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    


    function getImage($mant)
    {
        $query = $this->db->query('select HinhAnh from test where MaNT='.$mant);
        return $query->result();
    }

    function uploadImage($location, $mant)
    {
        $data = array('HinhAnh' => $location);
        $this->db->where('MaNT', $mant);
        $this->db->update('test', $data); 
    }

   
}
