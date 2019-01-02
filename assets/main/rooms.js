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
		$("#danh-sach-chi-phi").attr('hidden', true);

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
		
		$('input[name=camera][value="yes"]').prop('checked', true);
		$('input[name=parking][value="yes"]').prop('checked', true);
		$('input[name=guard][value="yes"]').prop('checked', true);

	  	$.ajax({
	  		type: 'get',
	  		url: 'rooms/getDiaChi',
	  		dataType: 'json',
	  		async: false,
	  		success: function(data) {
	  			// console.log('data : ', data);
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
	  				// console.log('quan huyen: ', qh);
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
		  				// console.log('quan huyen: ', qh);
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
		  				// console.log('quan huyen: ', qh);
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
	  			// console.log('error');
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
		var ten, chutro, kinhdo, vido, tinhtp, quanhuyen, phuongxa, duong, diachi, camera, parking, guard;
		var cten, cdiachi;
		var dien, nuoc, wifi, rac, giuxe, xedap, xemay, oto, tencp;

		var bando = $("#map-nhatro").attr('data');
		vido = bando.split(',')[0];
		kinhdo = bando.split(',')[1];

		cten = ".add-ten-nhatro";
		cdiachi = ".add-diachi-chinhxac";

		ten = $(".add-ten-nhatro").val();
		chutro = $('.add-chu-chungcu-nhatro').val();
		tinhtp = $('.add-tinh-thanhpho').val();
		quanhuyen = $('.add-quan-huyen').val();
		phuongxa = $('.add-phuong-xa').val();
		diachi = $('.add-diachi-chinhxac').val();
		camera = $("input[name=camera]:checked").val();
		parking = $("input[name=parking]:checked").val();
		guard = $("input[name=guard]:checked").val();

		dien = $("#gia-dien").val();
		nuoc = $("#gia-nuoc").val();
		wifi = $("#gia-wifi").val();
		rac = $("#gia-rac").val();
		giuxe = $("#gia-giu-xe").val();
		xedap = $("#gia-giu-xe-dap").val();
		xemay = $("#gia-giu-xe-may").val();
		oto = $("#gia-giu-xe-oto").val();
		tencp = 'Bảng chi phí: ' + ten;


		if($('.add-duong').val() != 'null') {
			duong = $(".add-duong").val();
			checkEmpty(cten);
			checkEmpty(cdiachi);

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
						diachi: diachi,
						camera: camera,
						parking: parking,
						guard: guard,
						dien: dien,
						nuoc: nuoc,
						wifi: wifi,
						rac: rac,
						giuxe: giuxe,
						xedap: xedap,
						xemay: xemay,
						oto: oto,
						tencp: tencp,
						kinhdo: kinhdo,
						vido: vido
					},
					success: function(data) {
						if(data != 'false') {
							swal('Thành công!', 'Thêm nhà trọ mới thành công!', 'success');
							$(".add-ten-nhatro").val('');
							showNhaTro();
						}
					},
					error: function(e) {
						console.log(e);
						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					}
				});
			}
		}
		else {
			checkEmpty(cten);
			checkEmpty(cdiachi);
			// // console.log('data: ', _.concat([ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));
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
						diachi: diachi,
						camera: camera,
						parking: parking,
						guard: guard,
						dien: dien,
						nuoc: nuoc,
						wifi: wifi,
						rac: rac,
						tencp: tencp,
						giuxe: giuxe,
						xedap: xedap,
						xemay: xemay,
						oto: oto,
						kinhdo: kinhdo,
						vido: vido
					},
					success: function(data) {
						if(data != 'false') {
							swal('Thành công!', 'Thêm nhà trọ mới thành công!', 'success');
							$(".add-ten-nhatro").val('');
							showNhaTro();
						}
					},
					error: function(e) {
						console.log(e);
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
				// console.log(data);

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
		var chutro, tinhtp, quanhuyen, phuongxa, duong, id, nhatro, chiphi;
		id = $(this).attr('data');
		$('.update-nha-tro').attr('data', id);

		// Gia
		$("#gia-dien").val('0');
		$("#gia-nuoc").val('0');
		$("#gia-wifi").val('0');
		$("#gia-rac").val('0');
		$("#gia-giu-xe").val('0');
		$("#gia-giu-xe-dap").val('0');
		$("#gia-giu-xe-oto").val('0');
		$("#gia-giu-xe-may").val('0');
		$("#danh-sach-chi-phi").attr('hidden', false);

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

		$("#bang-chi-phi").attr('disabled', false);

	  	$.ajax({
	  		type: 'post',
	  		url: 'rooms/getNhaTroVaDiaChi',
	  		async: false,
	  		data: {
	  			id: id
	  		},
	  		async: false,
	  		success: function(data) {
	  			data = JSON.parse(data);
	  			// console.log('data : ', data);
	  			nhatro = data.nhatro[0];
	  			chutro = data.chutro;
	  			tinhtp = data.tinhtp;
	  			quanhuyen = _.sortBy(data.quanhuyen, 'TEN');
	  			phuongxa = _.sortBy(data.phuongxa, 'TEN');
	  			duong = data.duong;
	  			chiphi = data.chiphi;
	  			// console.log('chiphi: ', chiphi);

	  			var content = '';

	  			// Chi phi
	  			if(chiphi.length > 0) {
	  				content += '<option disabled selected value="null">Chọn bảng giá</option>';
	  				_.forEach(chiphi, function(cp, key) {
	  					if(cp.Selected == 'yes') {
	  						content += '<option selected value="'+cp.MACP+'">'+cp.TENCP+'</option>';
	  					}
	  					else {
	  						content += '<option value="'+cp.MACP+'">'+cp.TENCP+'</option>';
	  					}
	  				});
	  				$("#bang-chi-phi").html(content);
	  				var chiphi_s = _.find(chiphi, {'Selected':'yes'});
	  				if(chiphi_s) {
		  				$("#gia-dien").val(chiphi_s.GIADIEN);
		  				$("#gia-nuoc").val(chiphi_s.GIANUOC);
		  				$("#gia-wifi").val(chiphi_s.GiaWifi);
		  				$("#gia-rac").val(chiphi_s.GiaRac);
		  				$("#gia-giu-xe").val(chiphi_s.GiaGXe);
		  				$("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
		  				$("#gia-giu-xe-may").val(chiphi_s.XEMAY);
		  				$('#gia-giu-xe-oto').val(chiphi_s.OTO);

						$("#gia-dien-hide").val(chiphi_s.GIADIEN);
						$("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
						$("#gia-wifi-hide").val(chiphi_s.GiaWifi);
						$("#gia-rac-hide").val(chiphi_s.GiaRac);
						$("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
						$("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
						$("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
						$('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
	  				}
	  				else {
	  					chiphi_s = _.find(chiphi, {'MACP':$("#bang-chi-phi").val()});
	  					if(chiphi_s) {
		  					$("#gia-dien").val(chiphi_s.GIADIEN);
			  				$("#gia-nuoc").val(chiphi_s.GIANUOC);
			  				$("#gia-wifi").val(chiphi_s.GiaWifi);
			  				$("#gia-rac").val(chiphi_s.GiaRac);
			  				$("#gia-giu-xe").val(chiphi_s.GiaGXe);
			  				$("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
			  				$("#gia-giu-xe-may").val(chiphi_s.XEMAY);
			  				$('#gia-giu-xe-oto').val(chiphi_s.OTO);

							$("#gia-dien-hide").val(chiphi_s.GIADIEN);
							$("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
							$("#gia-wifi-hide").val(chiphi_s.GiaWifi);
							$("#gia-rac-hide").val(chiphi_s.GiaRac);
							$("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
							$("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
							$("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
							$('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
	  					}
	  					else {
	  						$("#gia-dien").val('0');
			  				$("#gia-nuoc").val('0');
			  				$("#gia-wifi").val('0');
			  				$("#gia-rac").val('0');
			  				$("#gia-giu-xe").val('0');
			  				$("#gia-giu-xe-dap").val('0');
			  				$("#gia-giu-xe-may").val('0');
			  				$('#gia-giu-xe-oto').val('0');
	  					}
	  				}
	  				content  = '';
	  				// On change Chiphi
	  				console.log('hello');
					$(document).off("change").on('change', '#bang-chi-phi', function() {
						console.log('change');
						var cp = $(this).val();
						$.ajax({
							type: 'post',
							url: 'rooms/getChiPhi',
							async: false,
							data: {
								id: cp
							},
							success: function(rs) {
								rs = JSON.parse(rs).chiphi[0];
								// console.log(rs);

								$("#gia-dien").val(rs.GIADIEN);
								$("#gia-nuoc").val(rs.GIANUOC);
								$("#gia-wifi").val(rs.GiaWifi);
								$("#gia-rac").val(rs.GiaRac);
								$("#gia-giu-xe").val(rs.GiaGXe);
								$("#gia-giu-xe-dap").val(rs.XEDAP);
								$("#gia-giu-xe-may").val(rs.XEMAY);
								$('#gia-giu-xe-oto').val(rs.OTO);

								$("#gia-dien-hide").val(rs.GIADIEN);
								$("#gia-nuoc-hide").val(rs.GIANUOC);
								$("#gia-wifi-hide").val(rs.GiaWifi);
								$("#gia-rac-hide").val(rs.GiaRac);
								$("#gia-giu-xe-hide").val(rs.GiaGXe);
								$("#gia-giu-xe-dap-hide").val(rs.XEDAP);
								$("#gia-giu-xe-may-hide").val(rs.XEMAY);
								$('#gia-giu-xe-oto-hide').val(rs.OTO);
								console.log('DIEN: ', $("#gia-dien-hide").val());

							},
							error: function(e) {
								console.log(e);
							}
						});
					});
	  			}
	  			else {
	  				$("#danh-sach-chi-phi").attr('hidden', true);
	  			}

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
	  			// console.log('nhatro: ', nhatro);
	  			$(".add-ten-nhatro").val(nhatro.TENNT);
	  			$('.add-chu-chungcu-nhatro').val(nhatro.MAND);
	  			$('.add-tinh-thanhpho').val(nhatro.MATTP);
	  			$('input[name=camera][value="'+nhatro.Camera+'"]').prop('checked', true);
	  			$('input[name=parking][value="'+nhatro.Parking+'"]').prop('checked', true);
	  			$('input[name=guard][value="'+nhatro.Guard+'"]').prop('checked', true);
	  			
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
	  				// console.log('quan huyen: ', qh);
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
	  				console.log('!=null', nhatro.MAD);
	  			}
	  			else {
	  				$('.add-duong').val('null');
	  				console.log('null: ', nhatro.MAD);
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
		  				// console.log('quan huyen: ', qh);
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
		  				// console.log('quan huyen: ', qh);
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
	  			// console.log('error');
	  		}
	  	});
	});

	// Update nha tro
	$(document).on('click', '#update-nha-tro', function() {
		var ten, chutro, kinhdo, vido, tinhtp, quanhuyen, phuongxa, duong, diachi, id, camera, parking, guard;
		var cten, cdiachi;
		var chiphi, dien, nuoc, wifi, rac, giuxe, xedap, xemay, oto;
		var dienc, nuocc, wific, racc, giuxec, xedapc, xemayc, otoc, tencp;

		var bando = $("#map-nhatro").attr('data');
		vido = bando.split(',')[0];
		kinhdo = bando.split(',')[1];

		cten = ".add-ten-nhatro";
		cdiachi = ".add-diachi-chinhxac";

		id = $(this).attr('data');
		ten = $(".add-ten-nhatro").val();
		chutro = $('.add-chu-chungcu-nhatro').val();
		tinhtp = $('.add-tinh-thanhpho').val();
		quanhuyen = $('.add-quan-huyen').val();
		phuongxa = $('.add-phuong-xa').val();
		diachi = $('.add-diachi-chinhxac').val();
		camera = $("input[name=camera]:checked").val();
		parking = $("input[name=parking]:checked").val();
		guard = $("input[name=guard]:checked").val();
		
		chiphi = $("#bang-chi-phi").val();
		dien = $("#gia-dien").val();
		nuoc = $("#gia-nuoc").val();
		wifi = $("#gia-wifi").val();
		rac = $("#gia-rac").val();
		giuxe = $("#gia-giu-xe").val();
		xedap = $("#gia-giu-xe-dap").val();
		xemay = $("#gia-giu-xe-may").val();
		oto = $("#gia-giu-xe-oto").val();
		tencp = 'Bảng chi phí: ' + ten;

		dienc = $("#gia-dien-hide").val();
		nuocc = $("#gia-nuoc-hide").val();
		wific = $("#gia-wifi-hide").val();
		racc = $("#gia-rac-hide").val();
		giuxec = $("#gia-giu-xe-hide").val();
		xedapc = $("#gia-giu-xe-dap-hide").val();
		xemayc = $("#gia-giu-xe-may-hide").val();
		otoc = $("#gia-giu-xe-oto-hide").val();

		console.log('data: ', tencp);


		if($('.add-duong').val() != 'null') {
			duong = $(".add-duong").val();
			checkEmpty(cten);
			checkEmpty(cdiachi);

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
						diachi: diachi,
						camera: camera,
						parking: parking,
						guard: guard,
						chiphi: chiphi,
						dien: dien,
						dienc: dienc,
						nuoc: nuoc,
						nuocc: nuocc,
						wifi: wifi,
						wific: wific,
						rac: rac,
						racc: racc,
						giuxe: giuxe,
						giuxec: giuxec,
						xedap: xedap,
						xedapc: xedapc,
						xemay: xemay,
						xemayc: xemayc,
						oto: oto,
						otoc: otoc,
						tencp: tencp,
						vido: vido,
						kinhdo: kinhdo
					},
					success: function(data) {
						console.log('data: ', data);
						swal('Thành công!', 'Cập nhật thông tin nhà trọ thành công!', 'success');
		                $('#cancel-nha-tro').click();
		                $(".modal-backdrop").modal('hide');
		                $('body').removeClass('modal-open');
		                $('.modal-backdrop').remove();
						// $("#gia-dien-hide").val($("#gia-dien").val());
						// $("#gia-nuoc-hide").val($("#gia-nuoc").val());
						// $("#gia-wifi-hide").val($("#gia-wifi").val());
						// $("#gia-rac-hide").val($("#gia-rac").val());
						// $("#gia-giu-xe-hide").val($("#gia-giu-xe").val());
						// $("#gia-giu-xe-dap-hide").val($("#gia-giu-xe-dap").val());
						// $("#gia-giu-xe-may-hide").val($("#gia-giu-xe-may").val());
						// $("#gia-giu-xe-oto-hide").val($("#gia-giu-xe-oto").val());
						showNhaTro();
					},
					error: function(e) {
						console.log(e);
						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					}
				});
			}
		}
		else {
			checkEmpty(cten);
			checkEmpty(cdiachi);
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
						diachi: diachi,
						camera: camera,
						parking: parking,
						guard: guard,
						chiphi: chiphi,
						dien: dien,
						dienc: dienc,
						nuoc: nuoc,
						nuocc: nuocc,
						wifi: wifi,
						wific: wific,
						rac: rac,
						racc: racc,
						giuxe: giuxe,
						giuxec: giuxec,
						xedap: xedap,
						xedapc: xedapc,
						xemay: xemay,
						xemayc: xemayc,
						oto: oto,
						otoc: otoc,
						tencp: tencp,
						kinhdo: kinhdo,
						vido: vido
					},
					success: function(data) {
						console.log('data: ', data);
						swal('Thành công!', 'Cập nhật thông tin nhà trọ thành công!', 'success');
		                $('#cancel-nha-tro').click();
		                $(".modal-backdrop").modal('hide');
		                $('body').removeClass('modal-open');
		                $('.modal-backdrop').remove();
						// $("#gia-dien-hide").val($("#gia-dien").val());
						// $("#gia-nuoc-hide").val($("#gia-nuoc").val());
						// $("#gia-wifi-hide").val($("#gia-wifi").val());
						// $("#gia-rac-hide").val($("#gia-rac").val());
						// $("#gia-giu-xe-hide").val($("#gia-giu-xe").val());
						// $("#gia-giu-xe-dap-hide").val($("#gia-giu-xe-dap").val());
						// $("#gia-giu-xe-may-hide").val($("#gia-giu-xe-may").val());
						// $("#gia-giu-xe-oto-hide").val($("#gia-giu-xe-oto").val());
						showNhaTro();
					},
					error: function(e) {
						console.log(e);
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
				// console.log('data: ', data);
				var nhatro, chutro, content = '';
				nhatro = data.nhatro;
				chutro = data.chutro;
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
				// console.log('error');
			}
		});
	});

})(jQuery);