(function($) {
  'use strict';
  quanhuyen = _.orderBy(quanhuyen, ['TEN'], ['DESC']);
  phuongxa = _.orderBy(phuongxa, ['TEN'], ['DESC']);
  // console.log("tinhtp: ", tinhtp);
  // console.log("quanhuyen: ", quanhuyen);
  // console.log("phuongxa: ", phuongxa);

  // ---------------------------------------------------------------------------------------------
  // Phân loại quận huyện theo Tỉnh / TP
  $("#search-tinh-thanh-pho").change(function() {
  	var ma_tinhtp = $("#search-tinh-thanh-pho").val();
  	if(!_.isUndefined(ma_tinhtp) || ma_tinhtp != 'all') {
  		var dsQuanHuyen = plQuanHuyen(ma_tinhtp);
  		showQuanHuyen(dsQuanHuyen);
  	}
  	if(ma_tinhtp == 'all') {
		$("#search-quan-huyen").html("<option selected>Tất cả</option>");
  		$("#search-phuong-xa").html("<option selected>Tất cả</option>");
  	}
  });

  // Hàm phân loại quận huyện theo Tỉnh/Tp
  function plQuanHuyen(tinhtp) {
  	// _.filter(array, {'thuoctinh':giatri}) Trả về một mảng được lọc theo 'thuoctinh' có giá trị là 'giatri'
  	return _.filter(quanhuyen, {'MATTP':tinhtp});
  }

  // Hien thi quan huyen ra Select
  function showQuanHuyen(dsQuanHuyen) {
	$("#search-quan-huyen").html("<option selected>Tất cả</option>");
	$("#search-phuong-xa").html("<option selected>Tất cả</option>");
  	if(dsQuanHuyen.length > 0) {
  		var content;
  		content += "<option selected>Tất cả</option>";
  		_.forEach(dsQuanHuyen, function(quanhuyen) {
  			content += "<option value=" + quanhuyen.MAQH + ">" + quanhuyen.TEN + "</option>";
  		});
  		$("#search-quan-huyen").html(content);
  	}
  }

  // ---------------------------------------------------------------------------------------------
  // Phân loại phường xã theo Quận, huyện
  $("#search-quan-huyen").change(function() {
  	var ma_quanhuyen = $("#search-quan-huyen").val();
  	if(!_.isUndefined(ma_quanhuyen) || ma_quanhuyen != 'all') {
  		var dsPhuongXa = plPhuongXa(ma_quanhuyen);
  		showPhuongXa(dsPhuongXa);
  	}
  	if(ma_quanhuyen == 'all') {
  		$("#search-phuong-xa").html("<option selected>Tất cả</option>");
  	}
  });

  function plPhuongXa(maquanhuyen) {
  	return _.filter(phuongxa, {'MAQH':maquanhuyen});
  }

  function showPhuongXa(dsPhuongXa) {
  	$("#search-phuong-xa").html("<option selected>Tất cả</option>");
  	var content;
  	content += "<option selected>Tất cả</option>";
	_.forEach(dsPhuongXa, function(phuongxa) {
		content += "<option value=" + phuongxa.MAPX + ">" + phuongxa.TEN + "</option>";
	});
	$("#search-phuong-xa").html(content);
  }

  // ---------------------------------------------------------------------------------------------
  // Hien thi danh sach bai viet
  function showBaiViet(dsBaiViet) {
  	if(dsBaiViet.length > 0) {
	  	console.log("dsBaiViet: ", dsBaiViet);
	  	var content = '';
	  	_.forEach(dsBaiViet, function(baiviet, key) {
	  		content += '<div class="row">\n';
	        	content += '<div class="col-md-4">\n';
	      			content += '<img class="thumnail" src="" alt="">\n';
	      			content += '<p>Giá: ' + baiviet.Gia + ' VND</p>\n';
	        	content += '</div>\n';
	        	content += '<div class="col-md-8">\n';
      				content += '<h4>' + baiviet.TIEUDE + '</h4>\n';
	      			content += '<p>' + baiviet.DCTD + '</p>\n';
	      			content += '<p>' + baiviet.GhiChu + '</p>\n';
	      			content += '<p>' + baiviet.MOTATHEM + '</p>\n';
	      			content += '<p>' + baiviet.TGDANG + '</p>\n';
	        	content += '</div>\n';
	      	content += '</div>\n';
	      	if(dsBaiViet.length - 1 != key) {
	      		content += '<hr>\n';
	      	}
	  	});
  		$("#danh-sach-bai-viet").html(content);
  		console.log("content: ", content);
  	}
  }

  // showBaiViet(baiviet);

})(jQuery);