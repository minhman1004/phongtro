(function($) {
	'use strict';

	$(document).ready(function() {
		console.log('MAND_login: ', mand);
		var nhatro, phongtro, tientro, hoadon;
		nhatro = getAllNhaTro(mand);
		tientro = getAllTienTro();
		if(nhatro.length > 0) {
			showSelectNhaTro(nhatro);
			console.log('mant', $("#select-nhatro").val());
			phongtro = getAllPhongTro($("#select-nhatro").val());
			showPhongTro(phongtro, tientro);
			hoadon = getAllHoaDon($("#select-nhatro-thanhtoan").val());
			console.log('hoadon: ', hoadon);
			showAllHoaDon(hoadon, phongtro);
		}

		// Bang chi phi
		$("#dien-cu").val('0');
		$("#dien-moi").val('0');
		$("#nuoc-cu").val('0');
		$("#nuoc-moi").val('0');
		$("#so-wifi").val('0');
		$("#so-gxe").val('0');
		$("#so-xdap").val('0');
		$("#so-xmay").val('0');
		$("#so-oto").val('0');

		// Dien
		$(document).on('change', '#dien-cu', function() {
			if($("#dien-cu").val() < 0 || $("#dien-cu").val() == '') $("#dien-cu").val('0');
			if($("#dien-cu").val() > 1000000) $("#dien-cu").val('1000000');
		});
		$(document).on('change', '#dien-moi', function() {
			if($("#dien-moi").val() < 0 || $("#dien-moi").val() == '') $("#dien-moi").val('0');
			if($("#dien-moi").val() > 1000000) $("#dien-moi").val('1000000');
		});

		// Nuoc
		$(document).on('change', '#nuoc-cu', function() {
			if($("#nuoc-cu").val() < 0 || $("#nuoc-cu").val() == '') $("#nuoc-cu").val('0');
			if($("#nuoc-cu").val() > 1000000) $("#nuoc-cu").val('1000000');
		});
		$(document).on('change', '#nuoc-moi', function() {
			if($("#nuoc-moi").val() < 0 || $("#nuoc-moi").val() == '') $("#nuoc-moi").val('0');
			if($("#nuoc-moi").val() > 1000000) $("#nuoc-moi").val('1000000');
		});

		// Wifi
		$(document).on('change', '#so-wifi', function() {
			if($("#so-wifi").val() < 0 || $("#so-wifi").val() == '') $("#so-wifi").val('0');
			if($("#so-wifi").val() > 100 ) $("#so-wifi").val('100');
		});		
		
		// gxe
		$(document).on('change', '#so-gxe', function() {
			if($("#so-gxe").val() < 0 || $("#so-gxe").val() == '') $("#so-gxe").val('0');
			if($("#so-gxe").val() > 100 ) $("#so-gxe").val('100');
		});	

		// xe dap
		$(document).on('change', '#so-xdap', function() {
			if($("#so-xdap").val() < 0 || $("#so-xdap").val() == '') $("#so-xdap").val('0');
			if($("#so-xdap").val() > 100 ) $("#so-xdap").val('100');
		});

		// xe may
		$(document).on('change', '#so-xmay', function() {
			if($("#so-xmay").val() < 0 || $("#so-xmay").val() == '') $("#so-xmay").val('0');
			if($("#so-xmay").val() > 100 ) $("#so-xmay").val('100');
		});

		// Oto
		$(document).on('change', '#so-oto', function() {
			if($("#so-oto").val() < 0 || $("#so-oto").val() == '') $("#so-oto").val('0');
			if($("#so-oto").val() > 100 ) $("#so-oto").val('100');
		});

		// Open modal tao thanh toan
		$(document).on('click', '.tao-thanhtoan', function() {			
			var chiphi_nhatro = getAllChiPhi($("#select-nhatro").val());
			if(chiphi_nhatro.length > 0) {
				$("#modal-tao-thanhtoan").modal();
				var mapt = $(this).attr('data')[0];
				var matt = $(this).attr('data')[1];
				$(".tao-thanhtoan-submit").attr('data', mapt);
				var pt_tao_thanhtoan = _.find(phongtro, {'MAPT':mapt});
				var tientro_tao_thanhtoan = _.find(tientro, {'MATT':pt_tao_thanhtoan.MATT});
				var cachtinh;
				// Get chi tiet hoa don
				// var cthd = getCTHD($("#select-nhatro").val(), mapt);
				showThangYearNow();
				showNamThanhToan();

				if(tientro_tao_thanhtoan.CACHTINH == 'codinh') cachtinh = 'Cố định';
				else if(tientro_tao_thanhtoan.CACHTINH == 'daunguoi') cachtinh = 'Đầu người';
				else cachtinh = 'Chưa rõ';

				// show data
				$("#ten-phongtro").text('Tạo hóa đơn thanh toán cho: '+pt_tao_thanhtoan.Ten);
				$("#so-nguoio").val(pt_tao_thanhtoan.SLNDO);
				$("#cachtinh").val(cachtinh);
				$("#tientro").val(tientro_tao_thanhtoan.GIA);
				$("#chiphi-dien").val(chiphi_nhatro[0].GIADIEN);
				$("#chiphi-nuoc").val(chiphi_nhatro[0].GIANUOC);
				$("#chiphi-wifi").val(chiphi_nhatro[0].GiaWifi);
				$("#chiphi-rac").val(chiphi_nhatro[0].GiaRac);
				$("#chiphi-gxe").val(chiphi_nhatro[0].GiaGXe);
				$("#chiphi-xdap").val(chiphi_nhatro[0].XEDAP);
				$("#chiphi-xmay").val(chiphi_nhatro[0].XEMAY);
				$("#chiphi-oto").val(chiphi_nhatro[0].OTO);
			}
			else {
				swal('Lỗi!', 'Nhà trọ bạn chọn chưa sử dụng bảng chi phí nào, vui lòng vào "Quản lý nhà trọ" cập nhật!','warning');
			}
		});

		$(document).on('change', '#nam', function() {
			var yearNow = (new Date()).getFullYear();
			var yearSelect = $("#nam").val();
			if(yearSelect < yearNow) {
				showThangOtherYear();
			}
			else if(yearSelect == yearNow) {
				showThangYearNow();
			}
		});

		$(document).on('click', '.tao-thanhtoan-submit', function() {
			var mapt = $(this).attr('data');
			var mant = $("#select-nhatro").val();
			var nam, thang, diencu, nuoccu, dienmoi, nuocmoi, wifi, gxe, xedap, xemay, oto;

			thang = $("#thang").val();
			nam = $("#nam").val();

			diencu = $("#dien-cu").val();
			dienmoi = $("#dien-moi").val();
			nuoccu = $("#nuoc-cu").val();
			nuocmoi = $("#nuoc-moi").val();
			wifi = $("#so-wifi").val();
			gxe = $("#so-gxe").val();
			xedap = $("#so-xdap").val();
			xemay = $("#so-xmay").val();
			oto = $("#so-oto").val();

			dangerForm('#dien-cu', '#dien-moi');
			dangerForm('#nuoc-cu', '#nuoc-moi');
			if(parseInt(diencu) >= parseInt(dienmoi)) {
				swal('Lỗi!', 'Số cũ phải nhỏ hơn số mới!', 'warning');
			}

			if(parseInt(nuoccu) >= parseInt(nuocmoi)) {
				swal('Lỗi!', 'Số cũ phải nhỏ hơn số mới!', 'warning');
			}

			console.log('DATA: ', _.concat([mant, mapt, thang, nam, diencu, dienmoi, nuoccu, nuocmoi, wifi, gxe, xedap, xemay, oto]));

			if(parseInt(nuoccu) < parseInt(nuocmoi) && parseInt(diencu) < parseInt(dienmoi)) {
				$.ajax({
					type: 'post',
					url: 'payments/createThanhToan',
					async: false,
					data: {
						mant: mant,
						mapt: mapt,
						nam: nam,
						thang: thang,
						diencu: diencu,
						dienmoi: dienmoi,
						nuoccu: nuoccu,
						nuocmoi: nuocmoi,
						gxe: gxe,
						xedap: xedap,
						xemay: xemay,
						oto: oto,
						wifi: wifi
					},
					success: function(data) {
						console.log(data);
						if(data != false) {
							swal('Thành công!', 'Tạo thông tin thanh toán mới thành công!', 'success');
						}
						else {
							swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
		});

		$(document).on('change', '#select-nhatro', function() {
			phongtro = getAllPhongTro($("#select-nhatro").val());
			showPhongTro(phongtro, tientro);
		});

		$(document).on('click', '.xacnhan-thanhtoan', function() {
			var mahd = $(this).attr('data');
			swal("Xác nhận thanh toán cho hóa đơn này?", {
			  buttons: {
			    cancel: "Hủy!",
			    paid: {
			      text: "Thanh toán!",
			      value: "paid",
			    }
			  },
			})
			.then((value) => {
			  switch (value) {
			 
			    case "paid":
			    	$.ajax({
			    		type: 'post',
			    		url: 'payments/completeHoaDon',
			    		async: false,
			    		data: {
			    			mahd: mahd,
			    			trangthai: 'dathanhtoan'
			    		},
			    		success: function(data) {
			    			console.log('completeHoaDon',data);
			    			if(data != false) {
			    				hoadon = getAllHoaDon($("#select-nhatro-thanhtoan").val());
			    				showAllHoaDon(hoadon, phongtro);
								swal("Thành công!", "Hoàn tất thanh toán!", "success");
			    			}
			    			else {
			    				swal("Lỗi!", "Có lỗi xảy ra, vui lòng kiểm tra lại!", "warning");
			    			}
			    		},
			    		error: function(e) {
			    			console.log(e);
			    		}
			    	});
			      	break;
			 
			    default:
			      	swal("Hóa đơn chưa được thanh toán!");
			  }
			});
		});

		$(document).on('change', '#select-nhatro-thanhtoan', function() {
			var phongtro_thanhtoan = getAllPhongTro($("#select-nhatro-thanhtoan").val());
			console.log('phongtro_thanhtoan: ', phongtro_thanhtoan);
			hoadon = getAllHoaDon($("#select-nhatro-thanhtoan").val());
			showAllHoaDon(hoadon, phongtro_thanhtoan);
		});
	});

	// --------------------------------------------------------------------------
	// --------------------------------------------------------------------------
	// --------------------------------------------------------------------------
	// --------------------------------------------------------------------------
	// --------------------------------------------------------------------------
	// --------------------------------------------------------------------------

	function getAllHoaDon(mant) {
		var hoadon;
		$.ajax({
			type: 'post',
			url: 'payments/getAllHoaDon',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					hoadon = data;
				}
				else hoadon = [];
			},
			error: function(e) {
				console.log(e);
			}
		});
		return hoadon;
	}

	function showAllHoaDon(dshoadon, phongtro) {
		var content = '', ngaylap, trangthai;
		var pt;
		if(dshoadon.length > 0) {
			_.forEach(dshoadon, function(hd, key) {
				var pt = _.find(phongtro, {'MAPT': hd.MAPT});
				ngaylap = hd.NgayLap.split('-').reverse().join('/');
				if(hd.TrangThai == 'chuathanhtoan') trangthai = '<label class="badge badge-warning">Chưa thanh toán</label>';
				if(hd.TrangThai == 'dathanhtoan') trangthai = '<label class="badge badge-success">Đã thanh toán</label>';
				if(hd.TrangThai == 'dahuy') trangthai = '<label class="badge badge-danger">Đã hủy</label>';
				content += '<tr>';
				content += '<td>'+(key+1)+'</td>';
				content += '<td>'+pt.Ten+'</td>';
				content += '<td>'+hd.SOTIEN+'</td>';
				content += '<td>'+ngaylap+'</td>';
				content += '<td>'+trangthai+'</td>';
				if(hd.TrangThai == 'dathanhtoan') {
					content += '<td><button disabled class="btn btn-sm btn-outline-primary xacnhan-thanhtoan" data="'+hd.MAHD+'">Thanh toán</button></td>';
				}
				else content += '<td><button class="btn btn-sm btn-outline-primary xacnhan-thanhtoan" data="'+hd.MAHD+'">Thanh toán</button></td>';
				content += '</tr>';
			});
		}
		$("#danhsach-hoadon").html(content);
	}

	function dangerForm(cu, moi) {
		if(parseInt($(cu).val()) >= parseInt($(moi).val())) {
			$(cu).parent().addClass('has-danger');
			$(cu).addClass('form-control-danger');

			$(moi).parent().addClass('has-danger');
			$(moi).addClass('form-control-danger');
		}
		else {
			$(cu).parent().removeClass('has-danger');
			$(cu).removeClass('form-control-danger');


			$(moi).parent().removeClass('has-danger');
			$(moi).removeClass('form-control-danger');
		}
	}

	function getAllChiPhi(mant) {
		var chichi;
		$.ajax({
			type: 'post',
			url: 'payments/getAllChiPhi',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					chichi = data;
					console.log(data);
				}
				else chichi = [];
			},
			error: function(e) {
				console.log(e);
			}
		});
		return chichi;
	}

	function showNamThanhToan() {
		var content = '';
		var min = 2000, max = (new Date()).getFullYear();
		for(var i = max; i >= min; i--) {
			content += '<option value="'+i+'">'+i+'</option>';
		}
		$("#nam").html(content);
	}

	function showThangYearNow() {
		var content = '';
		var min = 1, max = (new Date()).getMonth()+1;
		for(var i = max; i >= min; i--) {
			content += '<option value="'+i+'">Tháng '+i+'</option>';
		}
		$("#thang").html(content);
	}

	function showThangOtherYear() {
		var content = '';
		var min = 1, max = 12;
		for(var i = max; i >= min; i--) {
			content += '<option value="'+i+'">Tháng '+i+'</option>';
		}
		$("#thang").html(content);
	}

	function getCTHD(mant, mapt) {
		var cthd;
		$.ajax({
			type: 'post',
			url: 'payments/getCTHD',
			dataType: 'json',
			async: false,
			data: {
				mant: mant,
				mapt: mapt
			},
			success: function(data) {
				if(data != false) {
					cthd = data;
					console.log(data);
				}
				else cthd = [];
			},
			error: function(e) {
				console.log(e);
			}
		});
		return cthd;
	}

	function getAllNhaTro(mand) {
		var nhatro;
		$.ajax({
			type: 'post',
			url: 'payments/getAllNhaTro',
			dataType: 'json',
			async: false,
			data: {
				mand: mand
			},
			success: function(data) {
				if(data != false) {
					nhatro = data;
					console.log(data);
				}
				else nhatro = [];
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nhatro;
	}

	function getAllPhongTro(mant) {
		var phongtro;
		$.ajax({
			type: 'post',
			url: 'payments/getAllPhongTro',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					phongtro = data;
				}
				else phongtro = [];
				console.log(data);
			},
			error: function(e) {
				console.log(e);
			}
		});
		return phongtro;
	}

	function showSelectNhaTro(dsnhatro) {
		var content = '';
		_.forEach(dsnhatro, function(nt, key) {
			content += '<option value="'+nt.MANT+'">'+(key+1)+' - '+nt.TENNT+'</option>';
		});

		$("#select-nhatro").html(content);
		$("#select-nhatro-thanhtoan").html(content);
		if($("#select-nhatro").length) {
			$("#select-nhatro").select2();
		}
		if($("#select-nhatro-thanhtoan").length) $("#select-nhatro-thanhtoan").select2();
	}

	function getAllTienTro() {
		var tientro;
		$.ajax({
			type: 'post',
			url: 'payments/getAllTienTro',
			dataType: 'json',
			async: false,
			success: function(data) {
				if(data != false) {
					tientro = data;
				}
				else tientro = [];
				console.log(data);
			},
			error: function(e) {
				console.log(e);
			}
		});
		return tientro;
	}

	function showPhongTro(dsphongtro, tientro) {
		var content = '';
		var tt;
		if(dsphongtro.length > 0) {
			_.forEach(dsphongtro, function(pt, key) {
				if(pt.SLNDO > 0) {
					tt = _.find(tientro, {'MATT':pt.MATT});
					content += '<tr>';
					content += '<td>'+(key+1)+'</td>';
					content += '<td>'+pt.Ten+'</td>';
					content += '<td>'+pt.SLNDO+'</td>';
					content += '<td>'+tt.GIA+'</td>';
					if(tt.CACHTINH == 'daunguoi') {
						content += '<td>Đầu người</td>';
					}
					else {
						content += '<td>Cố định</td>';
					}
					content += '<td><button class="btn btn-sm btn-outline-primary tao-thanhtoan" data="'+pt.MAPT+'-'+tt.MATT+'">Tạo thanh toán</button></td>';
					content += '</tr>';
				}
			});
		}
		else {
			content += '<tr>Không có phòng trọ nào</tr>';
		}
		$("#danhsach-phongtro").html(content);
	}

})(jQuery);