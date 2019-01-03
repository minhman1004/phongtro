<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hinhanh extends CI_Controller {
    function  __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if(!empty($_FILES['userFiles']['name']))
        {
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++)
            {
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'img/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|PNG';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $pathArr[$i]=$uploadPath.$fileData['file_name'];
                } 
                else{
                    echo $this->upload->display_errors();
                }
            }
            $imageArr = $this->restaurant_m->getImage(2);
            if(!empty($imageArr[0]->HinhAnh))
            {
                $images = explode(",", $imageArr[0]->HinhAnh);
                foreach ($images as $ima) {
                    unlink($ima);
                }
            }
            $path = implode(",", $pathArr);
            //Insert file information into the database
            $insert = $this->restaurant_m->uploadImage($path, 2);
        }

        
        $imageArr = $this->restaurant_m->getImage(2);
        if(!empty($imageArr[0]->HinhAnh)){
            $images = explode(",", $imageArr[0]->HinhAnh);
            //echo $imageArr[0];
        }
        else
        {
            $images ='';
        }


        //$cp = $this->sport_facility_m ->get_phi();
        
        $viewdata = array('images' => $images);
        $metadata = array('title' => 'hinhanh');
        $this->load->helper('url');
        $this->load->view('primary/hinhanh', $metadata);
        $this->load->view('hinhanh',$viewdata);



    }
    
    

}


