(function($) {
  'use strict';

  if($("#add-chu-chungcu-nhatro").length) {
  	$("#add-chu-chungcu-nhatro").select2();
  }

   if($("#search-chungcu-nhatro").length) {
  	$("#search-chungcu-nhatro").select2();
  }

  $(document).on('click', '#open-modal-add-nhatro', function() {
  	var chutro, tinhtp, quanhuyen, phuongxa, duong;
	$('#add-nha-tro').show();
	$('#update-nha-tro').hide();
	$('.add-ten-nhatro').val('');
	$('.add-diachi-chinhxac').val('');

	// Gia
	$("#gia-dien").val('0');
	$("#gia-nuoc").val('0');
	$("#gia-wifi").val('0');
	$("#gia-rac").val('0');
	$("#gia-giu-xe").val('0');
	$("#gia-giu-xe-dap").val('0');
	$("#gia-giu-xe-oto").val('0');
	$("#gia-giu-xe-may").val('0');

	// Typing gia
	// Gia dien
	$(document).on('keyup', '#gia-dien', function() {
		if($("#gia-dien").val() < 0) $("#gia-dien").val('0');
		if($("#gia-dien").val().length == 0) $("#gia-dien").val('0');
	});

	// Nuoc
	$(document).on('keyup', '#gia-nuoc', function(){
		if($("#gia-nuoc").val().length == 0) $("#gia-nuoc").val('0');
		if($("#gia-nuoc").val() < 0) $("#gia-nuoc").val('0');
	});

	// Wifi
	$(document).on('keyup', '#gia-wifi', function(){
		if($("#gia-wifi").val().length == 0) $("#gia-wifi").val('0');
		if($("#gia-wifi").val() < 0) $("#gia-wifi").val('0');	
	});

	// Rac
	$(document).on('keyup', '#gia-rac', function(){
		if($("#gia-rac").val().length == 0) $("#gia-rac").val('0');
		if($("#gia-rac").val() < 0) $("#gia-rac").val('0');	
	});

	// Giu xe
	$(document).on('keyup', '#gia-giu-xe', function(){
		if($("#gia-giu-xe").val().length == 0) $("#gia-giu-xe").val('0');
		if($("#gia-giu-xe").val() < 0) $("#gia-giu-xe").val('0');	
	});

	// Xe dap
	$(document).on('keyup', '#gia-giu-xe-dap', function(){
		if($("#gia-giu-xe-dap").val().length == 0) $("#gia-giu-xe-dap").val('0');
		if($("#gia-giu-xe-dap").val() < 0) $("#gia-giu-xe-dap").val('0');	
	});

	// Xe may
	$(document).on('keyup', '#gia-giu-xe-may', function(){
		if($("#gia-giu-xe-may").val().length == 0) $("#gia-giu-xe-may").val('0');
		if($("#gia-giu-xe-may").val() < 0) $("#gia-giu-xe-may").val('0');	
	});

	// Oto
	$(document).on('keyup', '#gia-giu-xe-oto', function(){
		if($("#gia-giu-xe-oto").val().length == 0) $("#gia-giu-xe-oto").val('0');
		if($("#gia-giu-xe-oto").val() < 0) $("#gia-giu-xe-oto").val('0');	
	});

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
		var ten, chutro, kinhdo, vido, tinhtp, quanhuyen, phuongxa, duong, diachi;
		var cten, cdiachi;

		cten = ".add-ten-nhatro";
		cdiachi = ".add-diachi-chinhxac";

		ten = $(".add-ten-nhatro").val();
		chutro = $('.add-chu-chungcu-nhatro').val();
		tinhtp = $('.add-tinh-thanhpho').val();
		quanhuyen = $('.add-quan-huyen').val();
		phuongxa = $('.add-phuong-xa').val();
		diachi = $('.add-diachi-chinhxac').val();
		if($('.add-duong').val() != 'null') {
			duong = $(".add-duong").val();
			checkEmpty(cten);
			checkEmpty(cdiachi);
			// console.log('data: ', _.concat([ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));

			if(ten != '' && diachi != '') {
				$.ajax({
					type: 'post',
					url: 'rooms/addNhaTroDuong',
					data: {
						ten: ten,
						chutro: chutro,
						tinhtp: tinhtp,
						quanhuyen: quanhuyen,
						phuongxa: phuongxa,
						duong: duong,
						diachi: diachi
					},
					success: function(data) {
						if(data != 'false') {
							swal('Thành công!', 'Thêm nhà trọ mới thành công!', 'success');
							$(".add-ten-nhatro").val('');
							showNhaTro();
						}
					},
					error: function() {
						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					}
				});
			}
		}
		else {
			checkEmpty(cten);
			checkEmpty(cdiachi);
			// console.log('data: ', _.concat([ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));
			if(ten != '' && diachi != '') {
				$.ajax({
					type: 'post',
					url: 'rooms/addNhaTro',
					data: {
						ten: ten,
						chutro: chutro,
						tinhtp: tinhtp,
						quanhuyen: quanhuyen,
						phuongxa: phuongxa,
						diachi: diachi
					},
					success: function(data) {
						if(data != 'false') {
							swal('Thành công!', 'Thêm nhà trọ mới thành công!', 'success');
							$(".add-ten-nhatro").val('');
							showNhaTro();
						}
					},
					error: function() {
						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					}
				});
			}
		}
	});

	// Check empty
	function checkEmpty(string) {
		if($(string).val() == '') {
			$(string).parent().addClass('has-danger');
			$(string).addClass('form-control-danger');
			swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin và thử lại!', 'warning');
		}
		else {
			$(string).parent().removeClass('has-danger');
			$(string).removeClass('form-control-danger');
		}
	}

	// Show danh sach nha tro
	function showNhaTro() {
		$.ajax({
			type: 'ajax',
			url: 'rooms/showNhaTro',
			async: false,
			dataType: 'json',
			success: function(data) {
				// data = JSON.parse(data);
				console.log(data);

				var content = '';
				content += '<thead>';
				content += '<tr>';
				content += '<th>STT</th>';
				content += '<th>Tên</th>';
				content += '<th>Chủ sở hữu</th>';
				content += '<th>Địa chỉ</th>';
				content += '<th>Thao tác</th>';
				content += '</tr>';
				content += '</thead>';
				content += '<tbody>';

				if(data) {
					_.forEach(data.nhatro, function(nt, key) {
						content += '<tr>';
						content += '<td>'+(key+1)+'</td>';
						content += '<td>'+nt.TENNT+'</td>';
						content += '<td>'+_.find(data.chutro, {'MAND':nt.MAND}).HOTEN +'</td>';
						content += '<td title="'+nt.DCTD+'">'+nt.DCTD.substr(0, 30)+'</td>';
						content += '<td><button class="btn btn-sm btn-outline-primary edit-nhatro" data="'+nt.MANT+'">Xem</button>\n';
						content += '<button class="btn btn-sm btn-outline-primary xemphong-nhatro" data="'+nt.MANT+'">DS Phòng</button></td>';
						content += '</tr>';
					});
				}
				else {
					content += '<tr>Danh sách rỗng!</tr>';
				}

				content += '</tbody>';

				$("#danh-sach-nha-tro").html(content);
			},
			error: function() {
				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
			}
		});
	}

	// Open modal Edit nha tro
	$(document).on('click', '.edit-nhatro', function() {
		$("#modal-add-nha-tro").modal();
		$('#add-nha-tro').hide();
		$('#update-nha-tro').show();
		var chutro, tinhtp, quanhuyen, phuongxa, duong, id, nhatro;
		id = $(this).attr('data');
		$('.update-nha-tro').attr('data', id);
	  	$.ajax({
	  		type: 'post',
	  		url: 'rooms/getNhaTroVaDiaChi',
	  		data: {
	  			id: id
	  		},
	  		async: false,
	  		success: function(data) {
	  			data = JSON.parse(data);
	  			console.log('data : ', data);
	  			nhatro = data.nhatro[0];
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
	  			// Display data
	  			console.log('nhatro: ', nhatro);
	  			$(".add-ten-nhatro").val(nhatro.TENNT);
	  			$('.add-chu-chungcu-nhatro').val(nhatro.MAND);
	  			$('.add-tinh-thanhpho').val(nhatro.MATTP);
	  			
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

	  			$('.add-quan-huyen').val(nhatro.MAQH);
	  			
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

	  			$('.add-phuong-xa').val(nhatro.MAPX);
	  			
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
	  			if(nhatro.MAD != null) {
	  				$('.add-duong').val(nhatro.MAD);
	  			}
	  			else {
	  				$('.add-duong').val('null');
	  			}

	  			diachichinhxac();
	  			$('.add-diachi-chinhxac').val(nhatro.DCTD);

	  			// Select change
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

	// Update nha tro
	$(document).on('click', '#update-nha-tro', function() {
		var ten, chutro, kinhdo, vido, tinhtp, quanhuyen, phuongxa, duong, diachi, id;
		var cten, cdiachi;

		cten = ".add-ten-nhatro";
		cdiachi = ".add-diachi-chinhxac";

		id = $(this).attr('data');
		ten = $(".add-ten-nhatro").val();
		chutro = $('.add-chu-chungcu-nhatro').val();
		tinhtp = $('.add-tinh-thanhpho').val();
		quanhuyen = $('.add-quan-huyen').val();
		phuongxa = $('.add-phuong-xa').val();
		diachi = $('.add-diachi-chinhxac').val();
		if($('.add-duong').val() != 'null') {
			duong = $(".add-duong").val();
			checkEmpty(cten);
			checkEmpty(cdiachi);
			// console.log('data: ', _.concat([id, ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));

			if(ten != '' && diachi != '') {
				$.ajax({
					type: 'post',
					url: 'rooms/updateNhaTroDuong',
					async: false,
					data: {
						id: id,
						ten: ten,
						chutro: chutro,
						tinhtp: tinhtp,
						quanhuyen: quanhuyen,
						phuongxa: phuongxa,
						duong: duong,
						diachi: diachi
					},
					success: function(data) {
						console.log('data: ', data);
						swal('Thành công!', 'Cập nhật thông tin nhà trọ thành công!', 'success');
						showNhaTro();
					},
					error: function() {
						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					}
				});
			}
		}
		else {
			checkEmpty(cten);
			checkEmpty(cdiachi);
			// console.log('data: ', _.concat([id, ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));
			// console.log('data: ', _.concat([ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));
			if(ten != '' && diachi != '') {
				$.ajax({
					type: 'post',
					url: 'rooms/updateNhaTro',
					async: false,
					data: {
						id: id,
						ten: ten,
						chutro: chutro,
						tinhtp: tinhtp,
						quanhuyen: quanhuyen,
						phuongxa: phuongxa,
						diachi: diachi
					},
					success: function(data) {
						console.log('data: ', data);
						swal('Thành công!', 'Cập nhật thông tin nhà trọ thành công!', 'success');
						showNhaTro();
					},
					error: function() {
						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					}
				});
			}
		}
	});

	// Search nha tro
	$(document).ready(function() {
		$.ajax({
			type: 'get',
			url: 'rooms/getNhaTroChuTro',
			dataType: 'json',
			success: function(data) {
				console.log('data: ', data);
				var nhatro, chutro, content = '';
				nhatro = data.nhatro;
				chutro = data.chutro;
				content += '<option selected disabled>Tìm nhà trọ ... </option>';
				if(nhatro.length > 0) {
		  			_.forEach(nhatro, function(nt, key) {
		  				content += '<option value="'+nt.MANT+'">'+nt.TENNT +' - '+ _.find(chutro, {'MAND':nt.MAND}).HOTEN + ' - ' + _.find(chutro, {'MAND':nt.MAND}).Email +'</option>';
	  				});
	  				$("#search-chungcu-nhatro").html(content);
	  			}
	  			else {
	  				content += '<option value="null">Danh sách rỗng</option>';
	  				$(".search-chungcu-nhatro").html(content);
	  			}
			},
			error: function() {
				console.log('error');
			}
		});
	});

	// Open modal for search nha tro
	$(document).on('click', '#open-modal-search-nhatro', function() {
		$("#modal-add-nha-tro").modal();
		$('#add-nha-tro').hide();
		$('#update-nha-tro').show();
		var chutro, tinhtp, quanhuyen, phuongxa, duong, id, nhatro;
		id = $('#search-chungcu-nhatro').val();
		$('.update-nha-tro').attr('data', id);
	  	$.ajax({
	  		type: 'post',
	  		url: 'rooms/getNhaTroVaDiaChi',
	  		data: {
	  			id: id
	  		},
	  		async: false,
	  		success: function(data) {
	  			data = JSON.parse(data);
	  			console.log('data : ', data);
	  			nhatro = data.nhatro[0];
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
	  			// Display data
	  			console.log('nhatro: ', nhatro);
	  			$(".add-ten-nhatro").val(nhatro.TENNT);
	  			$('.add-chu-chungcu-nhatro').val(nhatro.MAND);
	  			$('.add-tinh-thanhpho').val(nhatro.MATTP);
	  			
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

	  			$('.add-quan-huyen').val(nhatro.MAQH);
	  			
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

	  			$('.add-phuong-xa').val(nhatro.MAPX);
	  			
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
	  			if(nhatro.MAD != null) {
	  				$('.add-duong').val(nhatro.MAD);
	  			}
	  			else {
	  				$('.add-duong').val('null');
	  			}

	  			diachichinhxac();
	  			$('.add-diachi-chinhxac').val(nhatro.DCTD);

	  			// Select change
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

})(jQuery);