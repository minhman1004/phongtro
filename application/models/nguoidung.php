<?php
class nguoidung extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

   //Lấy danh sách người dùng
    public function getNguoidung(){
        $query =$this->db->get("nguoidung");
        $data = array();
        foreach (@$query->result() as $row) {
            $data[] =$row;

        }
        if(count($da))
        {
            return $data;
        }
        return false;
    }
    // Tăng mã người dùng khi thêm 1 người dùng mới bắt đầu từ 1
    function setseed()
    {
        $this->db->query('ALTER TABLE nguoidung AUTO_INCREMENT 1');
    }

    // Thêm người dùng mới

    function addNguoiDung($tendn, $matkhau, $email, $SDT, $Gioitinh, $CMND, $chucvu)
    {
        $data = array('TenDN' => $tendn, 'MatKhau' => $matkhau, 'Email' => $email, 'SDT' => $SDT, 'Gioitinh' => $Gioitinh, 'CMND' => $CMND, 'ChucVu' => $chucvu);
        $this->db->insert('nguoidung', $data);
        return $this->db->affected_rows();
    }

    //
    function deleteEmployee($employee_id)
    {
        $this->db->delete('nguoidung', array('employee_id' => $employee_id));
        return $this->db->affected_rows();
    }

    function checkLogin($taikhoan,$matkhau)
    {
        //$newpass = md5($matkhau);
        $query = $this->db->get_where('nguoidung',array('TenDN' => $taikhoan, 'MatKhau'=>$matkhau));
        return $query->result();
        
    }
    function checkUser($taikhoan)
    {
        $query  = $this->db->get_where('nguoidung',array('TenDN' =>$taikhoan));
        return $query->result();
    }
      function CheckMatKhau($MAND,$matkhau)
    {
        // check mat khau cua nguoi dung
        $query  = $this->db->get_where('nguoidung',array('MAND'=>$MAND, 'MatKhau' =>$matkhau));
        return $query->result();
    }

    
}