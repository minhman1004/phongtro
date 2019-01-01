<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hinhanh extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Call Publish_model

	}
	public function index()
	{

		if(!empty($_FILES['userFiles']['name'])){
			// return JavaScript(alert("Hello this is an alert"));
   //          $filesCount = count($_FILES['userFiles']['name']);
   //          for($i = 0; $i < $filesCount; $i++){
   //              $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
   //              $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
   //              $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
   //              $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
   //              $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

   //              $uploadPath = 'img/';
   //              $config['upload_path'] = $uploadPath;
   //              $config['allowed_types'] = 'gif|jpg|png';
                
   //              $this->load->library('upload', $config);
   //              $this->upload->initialize($config);
   //              if($this->upload->do_upload('userFile')){
   //                  $fileData = $this->upload->data();
   //                  $pathArr[$i]=$uploadPath.$fileData['file_name'];
   //              } else{
   //              	echo $this->upload->display_errors();
   //              }
   //          }
   //          $imageArr = $this->quanlynhatro->getImage(1);
			// if(!empty($imageArr[0]->HINHANH)){
			// 	$images = explode(",", $imageArr[0]->HINHANH);
			// 	foreach ($images as $ima) {
			// 		unlink($ima);
			// 	}
			// }
   //          $path = implode(",", $pathArr);
   //          echo json_encode($path);
   //          //Insert file information into the database
   //          $insert = $this->quanlynhatro->uploadImage($path,1);
			echo "<script>
					alert('DUNG');
					</script>";
        }
        else 
        {
        	echo "<script>
					alert('sai');
					</script>";
        }

		
		$imageArr = $this->quanlynhatro->getImage(1);
		echo json_encode($imageArr);
		if(!empty($imageArr[0]->HINHANH)){
			$images = explode(",", $imageArr[0]->HINHANH);
			//echo $imageArr[0];
		}
		else 
		{
			$images ='thuan';
		}
		//$cp = $this->sport_facility_m ->get_phi();
		//$tinh = $this->restaurant_m->getTinh();
		//$nhatro = $this->restaurant_m->getNhatro(UID);
		//$viewdata = array('tinh' =>$tinh, 'nhatro' =>$nhatro[0], 'images' => $images);


		$viewdata = array('images' => $images);
		$metadata = array('title' => 'Hinhanh');
		$this->load->helper('url');
		$this->load->view('primary/meta', $metadata);
		$this->load->view('primary/mainHeader');
		$this->load->view('primary/mainMenu');
		$this->load->view('hinhanh',$viewdata);
		$this->load->view('primary/mainFooter');



	}

	public function hinhanh() {
		if(!empty($_FILES['userFiles']['name'])){
			echo 'dung';
        }
        else 
        {
        	echo 'sai';
        }


	}
	
}