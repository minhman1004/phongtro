(function($) {
  'use strict'

  // Sap xep danh sach
  phuongxa = _.orderBy(phuongxa, ['TEN'], ['ASC']);
  quanhuyen = _.orderBy(quanhuyen, ['TEN'], ['ASC']);
  diachitt = _.orderBy(diachitt, ['TEN'], ['ASC']);

  // Ham phan loai quan huyen theo Tinh/TP
  function plQuanHuyen(ma_tinhtp ,quanhuyen) {
  	return _.filter(quanhuyen, {'MATTP':ma_tinhtp});
  }

  // Ham phan loai phuong xa theo Quan Huyen
  function plPhuongXa(ma_quanhuyen, phuongxa) {
  	return _.filter(phuongxa, {'MAQH':ma_quanhuyen});
  }

  // Ham pham loai duong pho
  function plDuongPho(ma_phuongxa, diachitt) {
  	return _.filter(diachitt, {'MAPX':ma_phuongxa});
  }

  // Ham hien thi danh sach Quan huyen
  function showQuanHuyen(dsQuanHuyen) {
  	var content = '';
  	if(dsQuanHuyen.length > 0) {
	  	_.forEach(dsQuanHuyen, function(quanhuyen, key) {
	  		content += "<option value=" + quanhuyen.MAQH + '>'+ quanhuyen.TEN + '</option><br>';
	  	});
  	}
  	else {
  		content += '<option value="non">Chọn Quận / Huyện</option>';
  	}
  	$("#quan-huyen-dang-tin").html(content);
  }

  // Ham hien thi danh sach phuong xa theo Quan huyen
  function showPhuongXa(dsPhuongXa) {
  	var content = '';
  	if(dsPhuongXa.length > 0) {
  		_.forEach(dsPhuongXa, function(phuongxa, key) {
  			content += "<option value=" + phuongxa.MAPX + ">" + phuongxa.TEN + "</option>";
  		});
  	}
  	else {
  		content += '<option value="non">Chọn Phường, Xã</option>';
  	}
  	$("#phuong-xa-dang-tin").html(content);
  }

  // Ham hien thi danh sach duong pho
  function showDuongPho(dsDuongPho) {
  	var content = '';
  	if(dsDuongPho.length > 0) {
  		content += '<option value="non">Chọn Đường</option>';
  		_.forEach(dsDuongPho, function(duongpho) {
  			content += '<option value=' + duongpho.MAD + '>' + duongpho.TEN + '</option>';
  		});
  	}
  	else {
  		content += '<option value="non">Chọn Đường</option>';
  	}
  	$("#duong-dang-tin").html(content);
  }
  
  // Ham hien thi dia chi tuyet doi
  function showDiaChiTD() {
  	var ma_tinhtp = $("#tinh-thanh-pho-dang-tin").val();
  	var ma_quanhuyen = $("#quan-huyen-dang-tin").val();
  	var ma_phuongxa = $("#phuong-xa-dang-tin").val();
  	var ma_duongpho = $("#duong-dang-tin").val();
  	var text = '';
  	var diachi = {};

  	// lệnh bên dưới là dạng câu điều kiện if
  	// Nếu ma_tinhtp != null && ma_tinhtp != 'non' Thì _.find() ... Nếu không (:) thì ''
  	diachi.tinhtp = ma_tinhtp != null && ma_tinhtp != 'non' ? _.find(tinhtp, {'MATTP':ma_tinhtp}).TEN : '';
  	diachi.quanhuyen = ma_quanhuyen != null && ma_quanhuyen != 'non' ? _.find(quanhuyen, {'MAQH':ma_quanhuyen}).TEN + ', ' : '';
  	diachi.phuongxa = ma_phuongxa != null && ma_phuongxa != 'non' ? _.find(phuongxa, {'MAPX':ma_phuongxa}).TEN + ', ' : '';
  	diachi.duongpho = ma_duongpho != null && ma_duongpho != 'non' ? _.find(diachitt, {'MAD':ma_duongpho}).TEN + ', ' : '';
  	text = diachi.duongpho + diachi.phuongxa + diachi.quanhuyen + diachi.tinhtp;
  	// console.log("text: ", text);
  	$("#dia-chi-chinh-xac-dang-tin").val(text);
  }


  // Hien thi danh sach Quan Huyen, Phuong Xa, Duong pho theo Tinh/TP
  $("#tinh-thanh-pho-dang-tin").change(function() {
  	var ma_tinhtp = $("#tinh-thanh-pho-dang-tin").val();
  	if(!_.isUndefined(ma_tinhtp)) {
  		// Hien thi quan huyen
  		var dsQuanHuyen = plQuanHuyen(ma_tinhtp, quanhuyen);
  		showQuanHuyen(dsQuanHuyen);
  		// Hien thi phuong xa
  		var ma_quanhuyen = $("#quan-huyen-dang-tin").val();
  		var dsPhuongXa = plPhuongXa(ma_quanhuyen, phuongxa);
  		showPhuongXa(dsPhuongXa);
  		// Hien thi duong pho
  		var ma_phuongxa = $("#phuong-xa-dang-tin").val();
  		var dsDuongPho = plDuongPho(ma_phuongxa, diachitt);
  		showDuongPho(dsDuongPho);

  		// Hien thi dia chi tuyet doi
  		showDiaChiTD();
  	}
  });

  // Hien thi danh sach phuong xa, duong pho theo quan huyen
  $("#quan-huyen-dang-tin").change(function() {
  	var ma_quanhuyen = $("#quan-huyen-dang-tin").val();
  	if(!_.isUndefined(ma_quanhuyen)) {
  		// Hien thi danh sach phuong xa
  		var dsPhuongXa = plPhuongXa(ma_quanhuyen, phuongxa);
  		showPhuongXa(dsPhuongXa);

  		// Hien thi danh sach duong pho
  		var ma_phuongxa = $("#phuong-xa-dang-tin").val();
  		var dsDuongPho = plDuongPho(ma_phuongxa, diachitt);
  		showDuongPho(dsDuongPho);

  		// Hien thi dia chi tuyet doi
  		showDiaChiTD();
  	}
  });

  // Hien thi danh sach duong pho theo phuong xa
  $("#phuong-xa-dang-tin").change(function() {
  	var ma_phuongxa = $("#phuong-xa-dang-tin").val();
  	if(!_.isUndefined(ma_phuongxa)) {
  		var dsDuongPho = plDuongPho(ma_phuongxa, diachitt);
  		showDuongPho(dsDuongPho);

  		// Hien thi dia chi tuyet doi
  		showDiaChiTD();
  	}
  });

  // Chon duong
  $("#duong-dang-tin").change(function() {
	// Hien thi dia chi tuyet doi
	showDiaChiTD();
  });

  showDiaChiTD();

})(jQuery);