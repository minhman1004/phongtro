-- Select tất cả người ở trọ trong một nhà trọ
SELECT * FROM 'thanhvientro'
join 'phongtro' on 'thanhvientro.MAPT = phongtro.MAPT' 
join 'nhatro' on 'nhatro.MANT = phongtro.MANT'
where 'nhatro.MANT = 1';

-- Viết theo active record
$this->db->select('*');
$this->db->from('thanhvientro');
$this->db->join('phongtro', 'phongtro.MAPT = thanhvientro.MAPT');
$this->db->join('nhatro', 'nhatro.MANT = phongtro.MANT');
$this->db->where('nhatro.MANT', $mant);
$rs = $this->db->get();

-- Select Bài viết
	-- Theo ngày
	-- Theo tháng
	-- Tất cả

-- Select Nhà trọ
	-- Theo ngày
	-- Theo tháng
	-- Tất cả

-- Select Tài khoản
	-- Theo ngày
	-- Theo tháng
	-- Tất cả

-- Select Phòng trọ
	-- Theo ngày
	-- Theo tháng
	-- Tất cả

-- Nếu viết theo active record được thì càng tốt.