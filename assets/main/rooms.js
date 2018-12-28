(function($) {
  'use strict';

  if($("#add-chu-chungcu-nhatro").length) {
  	$("#add-chu-chungcu-nhatro").select2();
  }

  $(document).on('click', '#open-modal-add-nhatro', function() {
  	var chutro, tinhtp, quanhuyen, phuongxa, duong;
  	$.ajax({
  		type: 'get',
  		url: 'rooms/getDiaChi',
  		dataType: 'json',
  		async: false,
  		success: function(data) {
  			console.log('data : ', data);
  			chutro = data.chutro;
  			tinhtp = data.tinhtp;
  			quanhuyen = _.sortBy(data.quanhuyen, 'TEN');
  			phuongxa = _.sortBy(data.phuongxa, 'TEN');
  			duong = data.duong;

  			var content = '';

  			// Danh sach chu tro
  			if(chutro.length > 0) {
	  			_.forEach(chutro, function(ct, key) {
	  				content += '<option value="'+ct.MAND+'">'+ct.HOTEN +' - '+ct.Email+'</option>';
  				});
  				$("#add-chu-chungcu-nhatro").html(content);
  				content = '';
  			}
  			else {
  				content += '<option value="null">Danh sách rỗng</option>';
  				$(".add-chu-chungcu-nhatro").html(content);
  				content = '';
  			}


  			// Danh sach tinh tp, quan huyen, phuong xa, duong xa
  			if(tinhtp.length > 0) {
  				_.forEach(tinhtp, function(tp, key) {
  					content += '<option value="'+tp.MATTP+'">'+tp.TEN+'</option>';
  				});
  				$(".add-tinh-thanhpho").html(content);
  				content = '';
  			}
  			if(quanhuyen.length > 0) {
  				var tp = $('.add-tinh-thanhpho').val();
  				_.forEach(quanhuyen, function(qh, key) {
  					if(qh.MATTP == tp) {
  						content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
  					}
  				});
  				$(".add-quan-huyen").html(content);
  				content = '';
  			}
  			if(phuongxa.length > 0) {
  				var qh = $(".add-quan-huyen").val();
  				console.log('quan huyen: ', qh);
  				_.forEach(phuongxa, function(px, key) {
  					if(px.MAQH == qh) {
  						content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';	
  					}
  				});
  				$(".add-phuong-xa").html(content);
  				content = '';
  			}
  			if(duong.length > 0) {
  				content += '<option value="null">Chọn đường</option>';
  				var px = $('.add-phuong-xa').val();
  				_.forEach(duong, function(d, key) {
  					if(d.MAPX == px) {
  						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
  					}
  				});
  				$('.add-duong').html(content);
  				content = '';
  			}

  			diachichinhxac();

  			$(document).on('change', '.add-tinh-thanhpho', function() {
  				if(quanhuyen.length > 0) {
	  				var tp = $('.add-tinh-thanhpho').val();
	  				_.forEach(quanhuyen, function(qh, key) {
	  					if(qh.MATTP == tp) {
	  						content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
	  					}
	  				});
	  				$(".add-quan-huyen").html(content);
	  				content = '';
	  			}
	  			if(phuongxa.length > 0) {
	  				var qh = $(".add-quan-huyen").val();
	  				console.log('quan huyen: ', qh);
	  				_.forEach(phuongxa, function(px, key) {
	  					if(px.MAQH == qh) {
	  						content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';	
	  					}
	  				});
	  				$(".add-phuong-xa").html(content);
	  				content = '';
	  			}
	  			if(duong.length > 0) {
	  				content += '<option value="null">Chọn đường</option>';
	  				var px = $('.add-phuong-xa').val();
	  				_.forEach(duong, function(d, key) {
	  					if(d.MAPX == px) {
	  						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
	  					}
	  				});
	  				$('.add-duong').html(content);
	  				content = '';
	  			}
	  			diachichinhxac();
  			});

  			$(document).on('change', '.add-quan-huyen', function() {
  				if(phuongxa.length > 0) {
	  				var qh = $(".add-quan-huyen").val();
	  				console.log('quan huyen: ', qh);
	  				_.forEach(phuongxa, function(px, key) {
	  					if(px.MAQH == qh) {
	  						content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';	
	  					}
	  				});
	  				$(".add-phuong-xa").html(content);
	  				content = '';
	  			}
	  			if(duong.length > 0) {
	  				content += '<option value="null">Chọn đường</option>';
	  				var px = $('.add-phuong-xa').val();
	  				_.forEach(duong, function(d, key) {
	  					if(d.MAPX == px) {
	  						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
	  					}
	  				});
	  				$('.add-duong').html(content);
	  				content = '';
	  			}
	  			diachichinhxac();
  			});

  			$(document).on('change', '.add-phuong-xa', function() {
  				if(duong.length > 0) {
	  				content += '<option value="null">Chọn đường</option>';
	  				var px = $('.add-phuong-xa').val();
	  				_.forEach(duong, function(d, key) {
	  					if(d.MAPX == px) {
	  						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
	  					}
	  				});
	  				$('.add-duong').html(content);
	  				content = '';
	  			}
	  			diachichinhxac();
  			});

  			$(document).on('change', '.add-duong', function() {
	  			diachichinhxac();
  			});
  		},
  		error: function() {
  			console.log('error');
  		}
  	});
  });

	function diachichinhxac() {
		var diachi, tinhtp, quanhuyen, phuongxa, duong;
		tinhtp = $('.add-tinh-thanhpho').children('option').filter(":selected").text();
		quanhuyen = $('.add-quan-huyen').children('option').filter(":selected").text();
		phuongxa = $('.add-phuong-xa').children('option').filter(":selected").text();
		if($('.add-duong').val() != 'null') {
			duong = $('.add-duong').children('option').filter(":selected").text();
			diachi = duong + ', ' + phuongxa + ', ' + quanhuyen + ', ' + tinhtp;
		}
		else {
			diachi = phuongxa + ', ' + quanhuyen + ', ' + tinhtp;
		}
		$('.add-diachi-chinhxac').val(diachi);
	}

	// Add nha tro
	$(document).on('click', '#add-nha-tro', function() {
		var ten, chutro;
	});

})(jQuery);