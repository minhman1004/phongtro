(function($) {
	'use strict';

	$(document).ready(function() {
		console.log(mand);
		var nhatro, phongtro = [], nguoio = [], tientro, mant, mapt;
		var khuvuc, tinhtp, quanhuyen, phuongxa, duong;
		nhatro = getDsNhaTro(mand);
		tientro = getTienTro();
		khuvuc = getKhuVuc();
		tinhtp = khuvuc.tinhtp;
		quanhuyen = khuvuc.quanhuyen;
		phuongxa = khuvuc.phuongxa;
		duong = khuvuc.duong;

		// Bang gia
		// Gia
		$("#gia-dien").val('0');
		$("#gia-nuoc").val('0');
		$("#gia-wifi").val('0');
		$("#gia-rac").val('0');
		$("#gia-giu-xe").val('0');
		$("#gia-giu-xe-dap").val('0');
		$("#gia-giu-xe-oto").val('0');
		$("#gia-giu-xe-may").val('0');

		// Khu vuc
		showTinhTp(tinhtp);
		

		// Hien thi danh sach select nhatro, phongtro
		if(nhatro.length > 0) {
			$("#thongtin-nguoitro").prop('hidden', false);
			$("#thongtin-nhatro").prop('hidden', false);
			console.log(nhatro);
			showSelectNhaTro(nhatro);
			mant = $("#select-nhatro").val();
			showPhongTro(mant, tientro);
			phongtro = getDsPhongTro(mant);
			if(phongtro.length > 0) {
				showSelectPhongTro(phongtro);
				mapt = $("#select-phongtro").val();
				showNguoiTro(mapt);
			}
		}
		else {
			$("#thongtin-nguoitro").prop('hidden', true);
			$("#thongtin-nhatro").prop('hidden', true);
		}

		// Su kien thay doi trong select
		$(document).on('change', '#select-nhatro', function() {
			mant = $("#select-nhatro").val();
			showPhongTro(mant, tientro);
			phongtro = getDsPhongTro(mant);
			if(phongtro.length > 0) {
				$("#thongtin-nguoitro").prop('hidden', false);
				showSelectPhongTro(phongtro);
				mapt = $("#select-phongtro").val();
				showNguoiTro(mapt);
			}
			else {
				$("#thongtin-nguoitro").prop('hidden', true);
			}
		});

		$(document).on('change', '#select-phongtro', function() {
			mapt = $("#select-phongtro").val();
			showNguoiTro(mapt);
		});

		// Open modal
		$(document).on('click', '#open-modal-add-nhatro', function() {
			$("#modal-thongtin-nhatro").modal();
		});

		$(document).on('click', '#open-modal-thongtin-nhatro', function() {
			var mant_xem, nhatro_info, chiphi_tro;
			$("#modal-thongtin-nhatro").modal();
			mant_xem = $("#select-nhatro").val();
			nhatro_info = getNhaTro(mant_xem);
			chiphi_tro = getChiChi(mant_xem);
			console.log(nhatro_info);
			console.log(mant_xem);
			console.log(chiphi_tro);

			// show du lieu
			$('#add-nha-tro').hide();
			$('#update-nha-tro').show();
			var chutro, tinhtp, quanhuyen, phuongxa, duong, id, nhatro, chiphi;
			id = $(this).attr('data');
			$('.update-nha-tro').attr('data', mant_xem);

			$("#danh-sach-chi-phi").attr('hidden', false);

			$("#bang-chi-phi").attr('disabled', false);

		  	// $.ajax({
		  	// 	type: 'post',
		  	// 	url: 'rooms/getNhaTroVaDiaChi',
		  	// 	async: false,
		  	// 	data: {
		  	// 		id: id
		  	// 	},
		  	// 	async: false,
		  	// 	success: function(data) {
		  	// 		data = JSON.parse(data);
		  	// 		// console.log('data : ', data);
		  	// 		nhatro = data.nhatro[0];
		  	// 		chutro = data.chutro;
		  	// 		tinhtp = data.tinhtp;
		  	// 		quanhuyen = _.sortBy(data.quanhuyen, 'TEN');
		  	// 		phuongxa = _.sortBy(data.phuongxa, 'TEN');
		  	// 		duong = data.duong;
		  	// 		chiphi = data.chiphi;
		  	// 		// console.log('chiphi: ', chiphi);

		  	// 		var content = '';

		  	// 		// Chi phi
		  	// 		if(chiphi.length > 0) {
		  	// 			content += '<option disabled selected value="null">Chọn bảng giá</option>';
		  	// 			_.forEach(chiphi, function(cp, key) {
		  	// 				if(cp.Selected == 'yes') {
		  	// 					content += '<option selected value="'+cp.MACP+'">'+cp.TENCP+'</option>';
		  	// 				}
		  	// 				else {
		  	// 					content += '<option value="'+cp.MACP+'">'+cp.TENCP+'</option>';
		  	// 				}
		  	// 			});
		  	// 			$("#bang-chi-phi").html(content);
		  	// 			var chiphi_s = _.find(chiphi, {'Selected':'yes'});
		  	// 			if(chiphi_s) {
			  // 				$("#gia-dien").val(chiphi_s.GIADIEN);
			  // 				$("#gia-nuoc").val(chiphi_s.GIANUOC);
			  // 				$("#gia-wifi").val(chiphi_s.GiaWifi);
			  // 				$("#gia-rac").val(chiphi_s.GiaRac);
			  // 				$("#gia-giu-xe").val(chiphi_s.GiaGXe);
			  // 				$("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
			  // 				$("#gia-giu-xe-may").val(chiphi_s.XEMAY);
			  // 				$('#gia-giu-xe-oto').val(chiphi_s.OTO);

					// 		$("#gia-dien-hide").val(chiphi_s.GIADIEN);
					// 		$("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
					// 		$("#gia-wifi-hide").val(chiphi_s.GiaWifi);
					// 		$("#gia-rac-hide").val(chiphi_s.GiaRac);
					// 		$("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
					// 		$("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
					// 		$("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
					// 		$('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
		  	// 			}
		  	// 			else {
		  	// 				chiphi_s = _.find(chiphi, {'MACP':$("#bang-chi-phi").val()});
		  	// 				if(chiphi_s) {
			  // 					$("#gia-dien").val(chiphi_s.GIADIEN);
				 //  				$("#gia-nuoc").val(chiphi_s.GIANUOC);
				 //  				$("#gia-wifi").val(chiphi_s.GiaWifi);
				 //  				$("#gia-rac").val(chiphi_s.GiaRac);
				 //  				$("#gia-giu-xe").val(chiphi_s.GiaGXe);
				 //  				$("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
				 //  				$("#gia-giu-xe-may").val(chiphi_s.XEMAY);
				 //  				$('#gia-giu-xe-oto').val(chiphi_s.OTO);

					// 			$("#gia-dien-hide").val(chiphi_s.GIADIEN);
					// 			$("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
					// 			$("#gia-wifi-hide").val(chiphi_s.GiaWifi);
					// 			$("#gia-rac-hide").val(chiphi_s.GiaRac);
					// 			$("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
					// 			$("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
					// 			$("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
					// 			$('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
		  	// 				}
		  	// 				else {
		  	// 					$("#gia-dien").val('0');
				 //  				$("#gia-nuoc").val('0');
				 //  				$("#gia-wifi").val('0');
				 //  				$("#gia-rac").val('0');
				 //  				$("#gia-giu-xe").val('0');
				 //  				$("#gia-giu-xe-dap").val('0');
				 //  				$("#gia-giu-xe-may").val('0');
				 //  				$('#gia-giu-xe-oto').val('0');
		  	// 				}
		  	// 			}
		  	// 			content  = '';
		  	// 			// On change Chiphi
		  	// 			console.log('hello');
					// 	$(document).off("change").on('change', '#bang-chi-phi', function() {
					// 		console.log('change');
					// 		var cp = $(this).val();
					// 		$.ajax({
					// 			type: 'post',
					// 			url: 'rooms/getChiPhi',
					// 			async: false,
					// 			data: {
					// 				id: cp
					// 			},
					// 			success: function(rs) {
					// 				rs = JSON.parse(rs).chiphi[0];
					// 				// console.log(rs);

					// 				$("#gia-dien").val(rs.GIADIEN);
					// 				$("#gia-nuoc").val(rs.GIANUOC);
					// 				$("#gia-wifi").val(rs.GiaWifi);
					// 				$("#gia-rac").val(rs.GiaRac);
					// 				$("#gia-giu-xe").val(rs.GiaGXe);
					// 				$("#gia-giu-xe-dap").val(rs.XEDAP);
					// 				$("#gia-giu-xe-may").val(rs.XEMAY);
					// 				$('#gia-giu-xe-oto').val(rs.OTO);

					// 				$("#gia-dien-hide").val(rs.GIADIEN);
					// 				$("#gia-nuoc-hide").val(rs.GIANUOC);
					// 				$("#gia-wifi-hide").val(rs.GiaWifi);
					// 				$("#gia-rac-hide").val(rs.GiaRac);
					// 				$("#gia-giu-xe-hide").val(rs.GiaGXe);
					// 				$("#gia-giu-xe-dap-hide").val(rs.XEDAP);
					// 				$("#gia-giu-xe-may-hide").val(rs.XEMAY);
					// 				$('#gia-giu-xe-oto-hide').val(rs.OTO);
					// 				console.log('DIEN: ', $("#gia-dien-hide").val());

					// 			},
					// 			error: function(e) {
					// 				console.log(e);
					// 			}
					// 		});
					// 	});
		  	// 		}
		  	// 		else {
		  	// 			$("#danh-sach-chi-phi").attr('hidden', true);
		  	// 		}

		  	// 		// Danh sach chu tro
		  	// 		if(chutro.length > 0) {
			  // 			_.forEach(chutro, function(ct, key) {
			  // 				content += '<option value="'+ct.MAND+'">'+ct.HOTEN +' - '+ct.Email+'</option>';
		  	// 			});
		  	// 			$("#add-chu-chungcu-nhatro").html(content);
		  	// 			content = '';
		  	// 		}
		  	// 		else {
		  	// 			content += '<option value="null">Danh sách rỗng</option>';
		  	// 			$(".add-chu-chungcu-nhatro").html(content);
		  	// 			content = '';
		  	// 		}


		  	// 		// Danh sach tinh tp, quan huyen, phuong xa, duong xa
		  	// 		if(tinhtp.length > 0) {
		  	// 			_.forEach(tinhtp, function(tp, key) {
		  	// 				content += '<option value="'+tp.MATTP+'">'+tp.TEN+'</option>';
		  	// 			});
		  	// 			$(".add-tinh-thanhpho").html(content);
		  	// 			content = '';
		  	// 		}
		  	// 		// Display data
		  	// 		// console.log('nhatro: ', nhatro);
		  	// 		$(".add-ten-nhatro").val(nhatro.TENNT);
		  	// 		$('.add-chu-chungcu-nhatro').val(nhatro.MAND);
		  	// 		$('.add-tinh-thanhpho').val(nhatro.MATTP);
		  	// 		$('input[name=camera][value="'+nhatro.Camera+'"]').prop('checked', true);
		  	// 		$('input[name=parking][value="'+nhatro.Parking+'"]').prop('checked', true);
		  	// 		$('input[name=guard][value="'+nhatro.Guard+'"]').prop('checked', true);
		  			
		  	// 		if(quanhuyen.length > 0) {
		  	// 			var tp = $('.add-tinh-thanhpho').val();
		  	// 			_.forEach(quanhuyen, function(qh, key) {
		  	// 				if(qh.MATTP == tp) {
		  	// 					content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
		  	// 				}
		  	// 			});
		  	// 			$(".add-quan-huyen").html(content);
		  	// 			content = '';
		  	// 		}

		  	// 		$('.add-quan-huyen').val(nhatro.MAQH);
		  			
		  	// 		if(phuongxa.length > 0) {
		  	// 			var qh = $(".add-quan-huyen").val();
		  	// 			// console.log('quan huyen: ', qh);
		  	// 			_.forEach(phuongxa, function(px, key) {
		  	// 				if(px.MAQH == qh) {
		  	// 					content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';	
		  	// 				}
		  	// 			});
		  	// 			$(".add-phuong-xa").html(content);
		  	// 			content = '';
		  	// 		}

		  	// 		$('.add-phuong-xa').val(nhatro.MAPX);
		  			
		  	// 		if(duong.length > 0) {
		  	// 			content += '<option value="null">Chọn đường</option>';
		  	// 			var px = $('.add-phuong-xa').val();
		  	// 			_.forEach(duong, function(d, key) {
		  	// 				if(d.MAPX == px) {
		  	// 					content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
		  	// 				}
		  	// 			});
		  	// 			$('.add-duong').html(content);
		  	// 			content = '';
		  	// 		}
		  	// 		if(nhatro.MAD != null) {
		  	// 			$('.add-duong').val(nhatro.MAD);
		  	// 			console.log('!=null', nhatro.MAD);
		  	// 		}
		  	// 		else {
		  	// 			$('.add-duong').val('null');
		  	// 			console.log('null: ', nhatro.MAD);
		  	// 		}

		  	// 		diachichinhxac();
		  	// 		$('.add-diachi-chinhxac').val(nhatro.DCTD);

		  	// 		// Select change
		  	// 		$(document).on('change', '.add-tinh-thanhpho', function() {
		  	// 			if(quanhuyen.length > 0) {
			  // 				var tp = $('.add-tinh-thanhpho').val();
			  // 				_.forEach(quanhuyen, function(qh, key) {
			  // 					if(qh.MATTP == tp) {
			  // 						content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
			  // 					}
			  // 				});
			  // 				$(".add-quan-huyen").html(content);
			  // 				content = '';
			  // 			}
			  // 			if(phuongxa.length > 0) {
			  // 				var qh = $(".add-quan-huyen").val();
			  // 				// console.log('quan huyen: ', qh);
			  // 				_.forEach(phuongxa, function(px, key) {
			  // 					if(px.MAQH == qh) {
			  // 						content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';	
			  // 					}
			  // 				});
			  // 				$(".add-phuong-xa").html(content);
			  // 				content = '';
			  // 			}
			  // 			if(duong.length > 0) {
			  // 				content += '<option value="null">Chọn đường</option>';
			  // 				var px = $('.add-phuong-xa').val();
			  // 				_.forEach(duong, function(d, key) {
			  // 					if(d.MAPX == px) {
			  // 						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
			  // 					}
			  // 				});
			  // 				$('.add-duong').html(content);
			  // 				content = '';
			  // 			}
			  // 			diachichinhxac();
		  	// 		});

		  	// 		$(document).on('change', '.add-quan-huyen', function() {
		  	// 			if(phuongxa.length > 0) {
			  // 				var qh = $(".add-quan-huyen").val();
			  // 				// console.log('quan huyen: ', qh);
			  // 				_.forEach(phuongxa, function(px, key) {
			  // 					if(px.MAQH == qh) {
			  // 						content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';	
			  // 					}
			  // 				});
			  // 				$(".add-phuong-xa").html(content);
			  // 				content = '';
			  // 			}
			  // 			if(duong.length > 0) {
			  // 				content += '<option value="null">Chọn đường</option>';
			  // 				var px = $('.add-phuong-xa').val();
			  // 				_.forEach(duong, function(d, key) {
			  // 					if(d.MAPX == px) {
			  // 						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
			  // 					}
			  // 				});
			  // 				$('.add-duong').html(content);
			  // 				content = '';
			  // 			}
			  // 			diachichinhxac();
		  	// 		});

		  	// 		$(document).on('change', '.add-phuong-xa', function() {
		  	// 			if(duong.length > 0) {
			  // 				content += '<option value="null">Chọn đường</option>';
			  // 				var px = $('.add-phuong-xa').val();
			  // 				_.forEach(duong, function(d, key) {
			  // 					if(d.MAPX == px) {
			  // 						content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
			  // 					}
			  // 				});
			  // 				$('.add-duong').html(content);
			  // 				content = '';
			  // 			}
			  // 			diachichinhxac();
		  	// 		});

		  	// 		$(document).on('change', '.add-duong', function() {
			  // 			diachichinhxac();
		  	// 		});
		  	// 	},
		  	// 	error: function() {
		  	// 		// console.log('error');
		  	// 	}
		  	// });
		});
		
		$(document).on('click', '#open-modal-add-chiphi', function() {
			$("#modal-add-chiphi").modal();
		});
		
		$(document).on('click', '#open-modal-add-phongtro', function() {
			$("#modal-add-phongtro").modal();
		});

		$(document).on('click', '.edit-phongtro', function() {
			$("#modal-xem-phongtro").modal();
		});

		// Cap nhat / Them nguoi o
		$(document).on('click', '.save-nguoio', function() {
			var ten, cmnd, sdt, diachi, gioitinh, id;
			id = $(this).attr('data').split('-');
			var mapt = $("#select-phongtro").val();
			// If update
			if(id[0] != 'null') {
				console.log('update nguoi tro');
				ten = $("#dsnguoio-ten-"+id[0]).val();
				cmnd = $("#dsnguoio-cmnd-"+id[0]).val();
				sdt = $("#dsnguoio-sdt-"+id[0]).val();
				gioitinh = $("#dsnguoio-gioitinh-"+id[0]).val();
				diachi = $("#dsnguoio-diachi-"+id[0]).val();
				if(ten != '') {
					if($("#dsnguoio-cmnd-"+id[0]).inputmask('isComplete') && $("#dsnguoio-sdt-"+id[0]).inputmask('isComplete')) {
						console.log('okay');
						$.ajax({
							type: 'post',
							url: 'rooms/updateNguoiTro',
							data: {
								id: id[0],
								ten: ten,
								cmnd: cmnd,
								sdt: sdt,
								gioitinh: gioitinh,
								diachi: diachi
							},
							success: function(data) {
								swal('Thành công!', 'Cập nhật thông tin người ở thành công!', 'success');
								mapt = $("#select-phongtro").val();
								showNguoiTro(mapt);
							},
							error: function(e) {
								console.log(e);
							}
						});
					}
					else {
						swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
					}
				}
				else {
					swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
				}
			}
			// If create new nguoitro
			else {
				console.log('add nguoi tro');
				ten = $("#add-nguoitro-ten-"+id[1]).val();
				cmnd = $("#add-nguoitro-cmnd-"+id[1]).val();
				sdt = $("#add-nguoitro-sdt-"+id[1]).val();
				gioitinh = $("#add-nguoitro-gioitinh-"+id[1]).val();
				diachi = $("#add-nguoitro-diachi-"+id[1]).val();
				console.log('isComplete ', $("#add-nguoitro-cmnd-"+id[1]).inputmask('isComplete'));
				if(ten != '') {
					if($("#add-nguoitro-cmnd-"+id[1]).inputmask('isComplete') && $("#add-nguoitro-sdt-"+id[1]).inputmask('isComplete')) {
						$.ajax({
							type: 'post',
							url: 'rooms/addNguoiTro',
							data: {
								mapt: mapt,
								ten: ten,
								cmnd: cmnd,
								sdt: sdt,
								gioitinh: gioitinh,
								diachi: diachi
							},
							success: function(data) {
								if(data != 'false') {
									swal('Thành công!', 'Thêm người trọ mới thành công!', 'success');
									mapt = $("#select-phongtro").val();
									showNguoiTro(mapt);
								}
								else {
									swal('Lỗi!', 'Có lỗi xảy ra, vui lòng kiểm tra lại!', 'error');
								}
							},
							error: function(e) {
								console.log(e);
							}
						});
					}
					else {
						swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
					}
				}
				else {
					swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
				}
			}
		});

		// Chuyen tro
		$(document).on('click', '.cancel-nguoio', function() {
			var id = $(this).attr('data');
			var mapt = $("#select-phongtro").val();
			swal({
			  title: "Chuyển người này ?",
			  text: "Xác nhận rằng người này không còn ở nhà trọ của bạn!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  	if (willDelete) {
				  	$.ajax({
						type: 'post',
						url: 'rooms/updateChuyenTro',
						data: {
							mapt: mapt,
							id: id
						},
						success: function(data) {
							if(data != false) {
								swal('Thành công!', 'Thao tác thành công!', 'success');
								showNguoiTro(mapt);
								loadPhongTro();
							}
							else {
								swal('Lỗi!', 'Xảy ra lỗi, vi lòng kiểm tra lại!', 'error');
								showNguoiTro(mapt);
								loadPhongTro();
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				} else {
				swal("Bình luận chưa được xóa!");
				}
			});
		});

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
	});

	// FUNCTION -------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	
	function showTinhTp(dstinhtp) {
		var content = '';
		_.forEach(dstinhtp, function(tp, key) {
			content += '<option value="'+tp.MATTP+'">'+tp.TEN+'</option>';
		});

		$("#add-tinh-thanhpho").html(content);
	}

	function showQuanhuyen(dsquanhuyen, mattp) {
		var content = '';
		var quanhuyen = _.filter(dsquanhuyen, {'MATTP':mattp});
		_.forEach(quanhuyen, function(qh, key) {
			content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
		});

		$("#add-quan-huyen").html(content);
	}

	function showPhuongxa(dsphuongxa, maqh) {
		var content = '';
		var phuongxa = _.filter(dsphuongxa, {'MAQH':maqh});
		_.forEach(phuongxa, function(px, key) {
			content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';
		});

		$("#add-phuong-xa").html(content);
	}

	function showDuong(dsduong, mapx) {
		var content = '';
		var duong = _.filter(dsduong, {'MAPX':px});
		content += '<option value="null">Chọn đường<option>';
		_.forEach(duong, function(d, key) {
			content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
		});

		$("#add-duong").html(content);
	}

	function getNhaTro(mant) {
		var nhatro;
		$.ajax({
			type: 'post',
			url: 'rooms/getNhaTro',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					nhatro = data;
				}
				else {
					nhatro = {};
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nhatro;
	}

	function getChiChi(mant) {
		var chiphi;
		$.ajax({
			type: 'post',
			url: 'rooms/getChiPhi',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					chiphi = data;
				}
				else {
					chiphi = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return chiphi;
	}

	function getDsNhaTro(mand) {
		var nhatro;
		$.ajax({
			type: 'post',
			url: 'rooms/getDsNhaTro',
			dataType: 'json',
			async: false,
			data: {
				mand: mand
			},
			success: function(data) {
				if(data != false) {
					nhatro = data;
				}
				else {
					nhatro = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nhatro;
	}

	function getDsPhongTro(mant) {
		var phongtro;
		$.ajax({
			type: 'post',
			url: 'rooms/getDsPhongTro',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					phongtro = data;
				}
				else {
					phongtro = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return phongtro;
	}

	function getNguoiTro(mapt) {
		var nguoio;
		$.ajax({
			type: 'post',
			url: 'rooms/getNguoiTro',
			dataType: 'json',
			async: false,
			data: {
				mapt: mapt
			},
			success: function(data) {
				console.log(data);
				if(data != false) {
					nguoio = data;
				}
				else {
					nguoio = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nguoio;
	}

	function getPhongTro(mapt) {
		var phongtro;
		$.ajax({
			type: 'post',
			url: 'rooms/getPhongTro',
			dataType: 'json',
			async: false,
			data: {
				mapt: mapt
			},
			success: function(data) {
				if(data != false) {
					phongtro = data;
				}
				else {
					phongtro = {};
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return phongtro;
	}

	function getTienTro() {
		var tientro;
		$.ajax({
			type: 'get',
			url: 'rooms/getTienTro',
			dataType: 'json',
			async: false,
			success: function(data) {
				if(data != false) {
					tientro = data;
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return tientro;
	}

	function showSelectNhaTro(dsnhatro) {
		var content = '';
		_.forEach(dsnhatro, function(nhatro, key) {
			content += '<option value="'+nhatro.MANT+'">'+(key+1)+' - '+nhatro.TENNT+'</option>';
		});
		$("#select-nhatro").html(content);
		if($("#select-nhatro").length) {
			$("#select-nhatro").select2();
		}
	}

	function showSelectPhongTro(dsphongtro) {
		var content = '';
		_.forEach(dsphongtro, function(pt, key) {
			content += '<option value="'+pt.MAPT+'">'+(key+1)+' - '+pt.Ten+'</option>';
		});
		$("#select-phongtro").html(content);
		if($("#select-phongtro").length) {
			$("#select-phongtro").select2();
		}
	}

	function showPhongTro(mant, tientro) {
		var phongtro = getDsPhongTro(mant);
		var content = '', tt;

		_.forEach(phongtro, function(pt, key) {
			tt = _.find(tientro, {'MATT':pt.MATT});
			content += '<tr>';
			content += '<td>'+(key+1)+'</td>';
			content += '<td>'+pt.Ten+'</td>';
			if(!_.isUndefined(tt)) {
				content += '<td>'+toMoney(tt.GIA)+'</td>';
				if(tt.CACHTINH == 'daunguoi') content += '<td>Đầu người</td>';
				if(tt.CACHTINH == 'codinh') content += '<td>Cố định</td>';
			}
			else {
				content += '<td>0</td>';
				content += '<td>Chưa rõ</td>';
			}
			content += '<td>'+pt.SLNDO+'</td>';
			if(!_.isUndefined(tt)) {
			content += '<td><button class="btn btn-sm btn-outline-primary edit-phongtro" data="'+pt.MAPT+'-'+tt.MATT+'">Xem</button></td>';
			}
			else {
			content += '<td><button class="btn btn-sm btn-outline-primary edit-phongtro" data="'+pt.MAPT+'-null">Xem</button></td>';
			}

			content += '</tr>';
		});

		$("#danh-sach-phongtro").html(content);
	}

	function showNguoiTro(mapt) {
		var content = '', nguoitro, phongtro;
		phongtro = getPhongTro(mapt)[0];
		nguoitro = getNguoiTro(mapt);
		console.log(nguoitro);
		if(!_.isUndefined(nguoitro)) {
			if(nguoitro.length == phongtro.SLTD) {
				_.forEach(nguoitro, function(nguoi, key) {
					content += '<tr>';
					content += '<td><input type="text" value="'+nguoi.TEN+'" maxlength="30" class="form-control form-control-sm" id="dsnguoio-ten-'+nguoi.MANO+'"></td>';
					content += '<td><input value="'+nguoi.CMND+'" class="form-control form-control-sm dsnguoio-cmnd" id="dsnguoio-cmnd-'+nguoi.MANO+'"></td>';
					content += '<td><input value="'+nguoi.SDT+'" class="form-control form-control-sm dsnguoio-sdt" id="dsnguoio-sdt-'+nguoi.MANO+'"></td>';
					content += '<td><input type="text" value="'+nguoi.DIACHI+'" maxlength="100" class="form-control form-control-sm" id="dsnguoio-diachi-'+nguoi.MANO+'"></td>';
					content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+nguoi.MANO+'">';
					if(nguoi.GIOITINH == 'nam') {
						content += '<option selected value="nam">Nam</option>';
						content += '<option value="nu">Nữ</option>';
					}
					if(nguoi.GIOITINH == 'nu') {
						content += '<option value="nam">Nam</option>';
						content += '<option selected value="nu">Nữ</option>';
					}
					content += '</select></td>';
					content += '<td>';
					content += '<div class="btn-group">';
					content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
					content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển</button></td>';
					content += '</div>';
					content += '</tr>';
				});
			}
			else {
				if(nguoitro.length == 0) {
					for(var i = 0; i < phongtro.SLTD; i++) {
						content += '<tr>';
						content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
						content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
						content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
						content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
						content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+i+'">';
						content += '<option selected value="nam">Nam</option>';
						content += '<option value="nu">Nữ</option>';								
						content += '</select></td>';
						content += '<td>';
						content += '<div class="btn-group">';
						content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
						content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển</button></td>';
						content += '</tr>';
					}
				}
				else {
					if(nguoitro.length > 0 && phongtro.SLTD > nguoitro.length) {
						_.forEach(nguoitro, function(nguoi, key) {
							content += '<tr>';
							content += '<td><input type="text" value="'+nguoi.TEN+'" maxlength="30" class="form-control form-control-sm" id="dsnguoio-ten-'+nguoi.MANO+'"></td>';
							content += '<td><input value="'+nguoi.CMND+'" class="form-control form-control-sm dsnguoio-cmnd" id="dsnguoio-cmnd-'+nguoi.MANO+'"></td>';
							content += '<td><input value="'+nguoi.SDT+'" class="form-control form-control-sm dsnguoio-sdt" id="dsnguoio-sdt-'+nguoi.MANO+'"></td>';
							content += '<td><input type="text" value="'+nguoi.DIACHI+'" maxlength="100" class="form-control form-control-sm" id="dsnguoio-diachi-'+nguoi.MANO+'"></td>';
							content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+nguoi.MANO+'">';
							if(nguoi.GIOITINH == 'nam') {
								content += '<option selected value="nam">Nam</option>';
								content += '<option value="nu">Nữ</option>';
							}
							if(nguoi.GIOITINH == 'nu') {
								content += '<option value="nam">Nam</option>';
								content += '<option selected value="nu">Nữ</option>';
							}
							content += '</select></td>';
							content += '<td>';
							content += '<div class="btn-group">';
							content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
							content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển</button></td>';
							content += '</div>';
							content += '</tr>';
						});
						for(var i = nguoitro.length; i < phongtro.SLTD; i++) {
							content += '<tr>';
							content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
							content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
							content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
							content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
							content += '<td><select class="form-control" id="add-nguoitro-gioitinh-'+i+'">';
							content += '<option selected value="nam">Nam</option>';
							content += '<option value="nu">Nữ</option>';								
							content += '</select></td>';
							content += '<td>';
							content += '<div class="btn-group">';
							content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
							content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển</button></td>';
							content += '</tr>';
						}
					}
				}
			}
		}
		$("#danhsach-nguoitro").html(content);
		$(".dsnguoio-cmnd").inputmask('999999999');
		$(".dsnguoio-sdt").inputmask('9999999999');
	}

	function toMoney(string) {
		return (string/1000).toFixed(3).split('.').join(',');
	}

	function getKhuVuc() {
		var khuvuc;
		$.ajax({
			type: 'get',
			url: 'rooms/getKhuVuc',
			dataType: 'json',
			async: false,
			success: function(data) {
				khuvuc = data;
			},
			error: function(e) {
				console.log(e);
			}
		});
		return khuvuc;
	}

})(jQuery);