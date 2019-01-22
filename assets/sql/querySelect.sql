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




-- quan ly hoa don

DELIMITER //
CREATE   PROCEDURE INSERT_HOADON_THEM(IN NEW_MANT INT(11),IN NEW_MAPT INT(11),IN NEW_THANG INT(11), IN NEW_NAM INT(11), NEW_CSDC DOUBLE,NEW_CSDM DOUBLE, NEW_CSNC DOUBLE, NEW_CSNM DOUBLE,IN NEW_SLGX INT(11),IN NEW_SLWF INT(11))
BEGIN
	DECLARE NEW_SODANGO_NEW INT;
    DECLARE NEW_TIENTRO_NEW DOUBLE;
    DECLARE NEW_MAPT_NEW INT;
    DECLARE NEW_GIANUOC DOUBLE;
    DECLARE NEW_GIADIEN DOUBLE;
    DECLARE NEW_GiaGXe DOUBLE;
	DECLARE NEW_GiaWifi DOUBLE;
    DECLARE NEW_GIARAC DOUBLE;
    DECLARE NEW_CACHTINH_NEW VARCHAR(100);
    DECLARE NEW_SOTIEN_NEW DOUBLE;
    DECLARE NEW_MAHD INT;
    SELECT SUM(SLNDO),tientro.GIA,tientro.CACHTINH INTO NEW_SODANGO_NEW,NEW_TIENTRO_NEW,NEW_CACHTINH_NEW FROM phongtro join tientro on tientro.MATT = phongtro.MATT WHERE phongtro.MAPT = NEW_MAPT;
    -- SELECT tientro.MAPT,GIA,CACHTINH INTO NEW_MAPT_NEW,NEW_TIENTRO_NEW,NEW_CACHTINH_NEW FROM tientro JOIN (SELECT MAPT,MAX(NGAYTAO) as "ngaytao_NEW" FROM tientro WHERE NGAYTAO GROUP BY MAPT) AS A ON ngaytao_NEW = tientro.NGAYTAO AND tientro.MAPT = NEW_MAPT;
	SELECT GIANUOC,GIADIEN,GiaGXe,GiaWifi,GiaRac into NEW_GIANUOC,NEW_GIADIEN,NEW_GiaGXe,NEW_GiaWifi,NEW_GIARAC FROM `chiphi` WHERE MANT =NEW_MANT AND Selected ="yes" and TRANGTHAI ="NEW"; 
    IF(NEW_CACHTINH_NEW ='daunguoi')
    THEN
		BEGIN
			SET NEW_SOTIEN_NEW = (NEW_TIENTRO_NEW * NEW_SODANGO_NEW) + ((NEW_CSDM - NEW_CSDC)*NEW_GIADIEN) +((NEW_CSNM-NEW_CSNC)*NEW_GIANUOC) +(NEW_SLGX*NEW_GiaGXe) +(NEW_GiaWifi*NEW_SLWF)+NEW_GIARAC;
			
        END;
    ELSE
		BEGIN
			SET NEW_SOTIEN_NEW = NEW_TIENTRO_NEW  + ((NEW_CSDM - NEW_CSDC)*NEW_GIADIEN) +((NEW_CSNM-NEW_CSNC)*NEW_GIANUOC) +(NEW_SLGX*NEW_GiaGXe) +(NEW_GiaWifi*NEW_SLWF)+NEW_GIARAC;
			
        END;
	END IF;
    SELECT MAX(MAHD) +1 INTO NEW_MAHD FROM HOADON;
    IF(NEW_MAHD is null)
		THEN
			BEGIN 
    -- them vao bang hoa don
				INSERT INTO HOADON VALUES(1,NOW(),'Chuathantoan','','');
				INSERT INTO cthd VALUES(1,NEW_MANT,NEW_MAPT,NEW_THANG,NEW_NAM,NEW_CSDC,NEW_CSDM,NEW_CSNC,NEW_CSNM,NEW_SLGX,NEW_SLWF,NEW_SOTIEN_NEW);
			END;
	ELSE
		
		BEGIN
				INSERT INTO HOADON VALUES(NEW_MAHD,NOW(),'','Chuathantoan','');
				INSERT INTO cthd VALUES(NEW_MAHD,NEW_MANT,NEW_MAPT,NEW_THANG,NEW_NAM,NEW_CSDC,NEW_CSDM,NEW_CSNC,NEW_CSNM,NEW_SLGX,NEW_SLWF,NEW_SOTIEN_NEW);
        END;
	END IF;
END //
DELIMITER ;


-- CHI SO CU CHI SO MOI

SELECT CSDM,CSNM,CTHD.MANT,CTHD.MAPT
FROM cthd JOIN
(SELECT MAX(THANG) AS 'MAX_THANG',MAX(NAM) AS 'MAX_NAM',MANT,MAPT  FROM CTHD WHERE CTHD.MANT = 1 AND CTHD.MAPT = 2) AS A ON A.MANT = cthd.MANT AND A.MAPT = CTHD.MAPT AND NAM = A.MAX_NAM  AND THANG = A.MAX_THANG


-- 
-- quan ly hoa don new

DELIMITER //
CREATE   PROCEDURE INSERT_HOADON_FIX(IN NEW_MANT INT(11),IN NEW_MAPT INT(11),IN NEW_THANG INT(11), IN NEW_NAM INT(11), NEW_CSDC DOUBLE,NEW_CSDM DOUBLE, NEW_CSNC DOUBLE, NEW_CSNM DOUBLE,IN NEW_SLGX INT(11), IN NEW_XD INT(11), IN NEW_XM INT(11), IN NEW_OT INT(11),IN NEW_SLWF INT(11))
BEGIN
	DECLARE NEW_SODANGO_NEW INT;
    DECLARE NEW_TIENTRO_NEW DOUBLE;
    DECLARE NEW_MAPT_NEW INT;
    DECLARE NEW_GIANUOC DOUBLE;
    DECLARE NEW_GIADIEN DOUBLE;
    DECLARE NEW_GiaGXe DOUBLE;
    DECLARE NEW_XEDAP DOUBLE;
    DECLARE NEW_XEMAY DOUBLE;
    DECLARE NEW_OTO DOUBLE;
	DECLARE NEW_GiaWifi DOUBLE;
    DECLARE NEW_GIARAC DOUBLE;
    DECLARE NEW_CACHTINH_NEW VARCHAR(100);
    DECLARE NEW_SOTIEN_NEW DOUBLE;
    DECLARE NEW_MAHD INT;
    SELECT SUM(SLNDO),tientro.GIA,tientro.CACHTINH INTO NEW_SODANGO_NEW,NEW_TIENTRO_NEW,NEW_CACHTINH_NEW FROM phongtro join tientro on tientro.MATT = phongtro.MATT WHERE phongtro.MAPT = NEW_MAPT;
    -- SELECT tientro.MAPT,GIA,CACHTINH INTO NEW_MAPT_NEW,NEW_TIENTRO_NEW,NEW_CACHTINH_NEW FROM tientro JOIN (SELECT MAPT,MAX(NGAYTAO) as "ngaytao_NEW" FROM tientro WHERE NGAYTAO GROUP BY MAPT) AS A ON ngaytao_NEW = tientro.NGAYTAO AND tientro.MAPT = NEW_MAPT;
	SELECT GIANUOC,GIADIEN,GiaGXe, XEDAP, XEMAY, OTO,GiaWifi,GiaRac into NEW_GIANUOC,NEW_GIADIEN,NEW_GiaGXe,NEW_XEDAP,NEW_XEMAY,NEW_OTO,NEW_GiaWifi,NEW_GIARAC FROM `chiphi` WHERE MANT =NEW_MANT AND Selected ="yes" and TRANGTHAI ="new"; 
    IF(NEW_CACHTINH_NEW ='daunguoi')
    THEN
		BEGIN
			SET NEW_SOTIEN_NEW = (NEW_TIENTRO_NEW * NEW_SODANGO_NEW) + ((NEW_CSDM - NEW_CSDC)*NEW_GIADIEN) +((NEW_CSNM-NEW_CSNC)*NEW_GIANUOC) +(NEW_SLGX*NEW_GiaGXe) +(NEW_XD*NEW_XEDAP) +(NEW_XM*NEW_XEMAY) +(NEW_OT*NEW_OTO) +(NEW_GiaWifi*NEW_SLWF)+NEW_GIARAC;
			
        END;
    ELSE
		BEGIN
			SET NEW_SOTIEN_NEW = NEW_TIENTRO_NEW  + ((NEW_CSDM - NEW_CSDC)*NEW_GIADIEN) +((NEW_CSNM-NEW_CSNC)*NEW_GIANUOC) +(NEW_SLGX*NEW_GiaGXe) +(NEW_XD*NEW_XEDAP) +(NEW_XM*NEW_XEMAY) +(NEW_OT*NEW_OTO) +(NEW_GiaWifi*NEW_SLWF)+NEW_GIARAC;
			
        END;
	END IF;
    SELECT MAX(MAHD) +1 INTO NEW_MAHD FROM HOADON;
    IF(NEW_MAHD is null)
		THEN
			BEGIN 
    -- them vao bang hoa don
				INSERT INTO HOADON VALUES(1,NOW(),'','chuathantoan','');
				INSERT INTO cthd VALUES(1,NEW_MANT,NEW_MAPT,NEW_THANG,NEW_NAM,NEW_CSDC,NEW_CSDM,NEW_CSNC,NEW_CSNM,NEW_SLGX,NEW_XD,NEW_XM,NEW_OT,NEW_SLWF,NEW_SOTIEN_NEW);
			END;
	ELSE
		
		BEGIN
				INSERT INTO HOADON VALUES(NEW_MAHD,NOW(),'','chuathantoan','');
				INSERT INTO cthd VALUES(NEW_MAHD,NEW_MANT,NEW_MAPT,NEW_THANG,NEW_NAM,NEW_CSDC,NEW_CSDM,NEW_CSNC,NEW_CSNM,NEW_SLGX,NEW_XD,NEW_XM,NEW_OT,NEW_SLWF,NEW_SOTIEN_NEW);
        END;
	END IF;
END //
DELIMITER ;



-- -------------------------------------
-- -------------------------------------
DELIMITER //
CREATE   PROCEDURE INSERT_HOADON_FIX(IN NEW_MANT INT(11),IN NEW_MAPT INT(11),IN NEW_THANG INT(11),
 IN NEW_NAM INT(11), NEW_CSDC DOUBLE,NEW_CSDM DOUBLE, NEW_CSNC DOUBLE, NEW_CSNM DOUBLE,IN NEW_SLGX INT(11), 
 IN NEW_XD INT(11), IN NEW_XM INT(11), IN NEW_OT INT(11),IN NEW_SLWF INT(11))
BEGIN
  DECLARE NEW_SODANGO_NEW INT;
    DECLARE NEW_TIENTRO_NEW DOUBLE;
    DECLARE NEW_MAPT_NEW INT;
    DECLARE NEW_GIANUOC DOUBLE;
    DECLARE NEW_GIADIEN DOUBLE;
    DECLARE NEW_GiaGXe DOUBLE;
    DECLARE NEW_XEDAP DOUBLE;
    DECLARE NEW_XEMAY DOUBLE;
    DECLARE NEW_OTO DOUBLE;
  DECLARE NEW_GiaWifi DOUBLE;
    DECLARE NEW_GIARAC DOUBLE;
    DECLARE NEW_CACHTINH_NEW VARCHAR(100);
    DECLARE NEW_SOTIEN_NEW DOUBLE;
    DECLARE NEW_MAHD INT;
    SELECT SUM(SLNDO),tientro.GIA,tientro.CACHTINH INTO NEW_SODANGO_NEW,NEW_TIENTRO_NEW,NEW_CACHTINH_NEW FROM phongtro join tientro on tientro.MATT = phongtro.MATT WHERE phongtro.MAPT = NEW_MAPT;
    -- SELECT tientro.MAPT,GIA,CACHTINH INTO NEW_MAPT_NEW,NEW_TIENTRO_NEW,NEW_CACHTINH_NEW FROM tientro JOIN (SELECT MAPT,MAX(NGAYTAO) as "ngaytao_NEW" FROM tientro WHERE NGAYTAO GROUP BY MAPT) AS A ON ngaytao_NEW = tientro.NGAYTAO AND tientro.MAPT = NEW_MAPT;
  SELECT GIANUOC,GIADIEN,GiaGXe, XEDAP, XEMAY, OTO,GiaWifi,GiaRac into NEW_GIANUOC,NEW_GIADIEN,NEW_GiaGXe,NEW_XEDAP,NEW_XEMAY,NEW_OTO,NEW_GiaWifi,NEW_GIARAC FROM chiphi WHERE MANT =NEW_MANT AND Selected ="yes" and TRANGTHAI ="new"; 
    IF(NEW_CACHTINH_NEW ='daunguoi')
    THEN
    BEGIN
      SET NEW_SOTIEN_NEW = (NEW_TIENTRO_NEW * NEW_SODANGO_NEW) + ((NEW_CSDM - NEW_CSDC)*NEW_GIADIEN) +((NEW_CSNM-NEW_CSNC)*NEW_GIANUOC) +(NEW_SLGX*NEW_GiaGXe) +(NEW_XD*NEW_XEDAP) +(NEW_XM*NEW_XEMAY) +(NEW_OT*NEW_OTO) +(NEW_GiaWifi*NEW_SLWF)+NEW_GIARAC;
      
        END;
    ELSE
    BEGIN
    
      SET NEW_SOTIEN_NEW = NEW_TIENTRO_NEW  + ((NEW_CSDM - NEW_CSDC)*NEW_GIADIEN) +((NEW_CSNM-NEW_CSNC)*NEW_GIANUOC) +(NEW_SLGX*NEW_GiaGXe) +(NEW_XD*NEW_XEDAP) +(NEW_XM*NEW_XEMAY) +(NEW_OT*NEW_OTO) +(NEW_GiaWifi*NEW_SLWF)+NEW_GIARAC;
      
        END;
  END IF;
    SELECT MAX(MAHD) +1 INTO NEW_MAHD FROM HOADON;
    IF(NEW_MAHD is null)
    THEN
      BEGIN 
    -- them vao bang hoa don
        INSERT INTO HOADON VALUES(1,NOW(),'','chuathanhtoan','');
        INSERT INTO cthd VALUES(1,NEW_MANT,NEW_MAPT,NEW_THANG,NEW_NAM,NEW_CSDC,NEW_CSDM,NEW_CSNC,NEW_CSNM,NEW_SLGX,NEW_XD,NEW_XM,NEW_OT,NEW_SLWF,NEW_SOTIEN_NEW);
      END;
  ELSE
    
    BEGIN
        INSERT INTO HOADON VALUES(NEW_MAHD,NOW(),'','chuathanhtoan','');
        INSERT INTO cthd VALUES(NEW_MAHD,NEW_MANT,NEW_MAPT,NEW_THANG,NEW_NAM,NEW_CSDC,NEW_CSDM,NEW_CSNC,NEW_CSNM,NEW_SLGX,NEW_XD,NEW_XM,NEW_OT,NEW_SLWF,NEW_SOTIEN_NEW);
        END;
  END IF;
END //
DELIMITER ;