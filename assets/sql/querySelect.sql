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


-- Them binh luan tang dan

DELIMITER // 
CREATE  TRIGGER BEFORE_REACT_FORUM BEFORE INSERT ON REACT
FOR EACH ROW
BEGIN
    DECLARE NEW_MAR  int DEFAULT 0;
    DECLARE OLD_MAR int;
    DECLARE OLD_MAR_1 int;
    DECLARE done INT DEFAULT 0;
    DECLARE NEW_MAR_1  int DEFAULT 0;
    
    SELECT COUNT(*) FROM REACT INTO NEW_MAR_1;
    IF(NEW_MAR_1 = 0)
			THEN
				SET NEW_MAR = 1;
	ELSE
			BEGIN
						-- Dung  con tro luu mabv theo thu tu tang dan
						DECLARE c CURSOR
						FOR
							SELECT MAR FROM REACT ORDER BY MAR;
						-- Mo con tro
						DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
						OPEN c;
						FETCH c into OLD_MAR;
						SET OLD_MAR_1 = OLD_MAR;
						IF (OLD_MAR != 1)
								  THEN
									SET NEW_MAR = 1;
						ELSE
							BEGIN
								MABV_LOOP: LOOP
										FETCH c INTO OLD_MAR;
										-- Xet nếu MABV tăng theo thứ tự 1,2,3 thì chạy tiếp. Nếu không gán NEW_MAR = OLD +1;
										IF (OLD_MAR_1 != OLD_MAR -1)  	
											THEN
												BEGIN
												  IF done = 1 
													 THEN
														SET NEW_MAR = OLD_MAR_1 + 1;
														LEAVE MABV_LOOP;
													END IF;
												END;
										
										ELSE
											SET OLD_MAR_1 = OLD_MAR_1 + 1;
										END IF;
								END LOOP MABV_LOOP; 
							END;
					   END IF;   
			END;
	END IF;
    IF(NEW_MAR = 0)
        THEN 
			SET NEW.MAR = OLD_MAR +1;
	END IF;
	IF(NEW_MAR != 0)
		THEN
		SET NEW.MAR = NEW_MAR;
    END IF;

END //
DELIMITER ;

INSERT INTO REACT VALUES(134,2,2,1,'yes',null,null);


DROP Procedure IF EXISTS INSERT_REACT_FORUM

-- bam
DELIMITER //
CREATE  PROCEDURE INSERT_REACT_FORUM(IN NEW_MANO INT(11),IN NEW_MAND INT(11),IN NEW_TOPIC INT(11),in NEW_THICH TEXT,IN NEW_KHONGTHICH TEXT,in new_date varchar(30))
BEGIN
	
	-- DECLARE 
    DECLARE OLD_MANO INT;
    DECLARE TEMP_COUNT INT;
    DECLARE OLD_MAND INT;
    DECLARE OLD_TOPIC INT;
    SELECT COUNT(*) INTO TEMP_COUNT FROM REACT WHERE  (MANO = NEW_MANO AND TOPIC = NEW_TOPIC) OR (MAND = NEW_MAND AND TOPIC = NEW_TOPIC);
    IF(TEMP_COUNT = 0)
        THEN
			BEGIN 
				INSERT INTO REACT VALUES(45,NEW_MANO,NEW_MAND,NEW_TOPIC,NEW_THICH,NEW_KHONGTHICH,new_date);
			END;
	ELSE
		BEGIN
			UPDATE REACT
            SET THICH = NEW_THICH, KTHICH = NEW_KHONGTHICH, NGAY =new_date
            WHERE (MANO = NEW_MANO AND TOPIC = NEW_TOPIC) OR (MAND = NEW_MAND AND TOPIC = NEW_TOPIC);
            
		END;
	END IF;  
	

END //
DELIMITER ;
