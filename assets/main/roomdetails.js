(function($) {
	'use strict';

	$(document).ready(function() {
		var nguoio;
		// $("input[name=cachtinh-phongtro][value='codinh']").prop('checked', true);
		$(".nguoio-phongtro").val('1');
		$(".dientich-phongtro").val('1');
		$(".tientro-phongtro").val('1');
		nguoio = parseInt($(".nguoio-phongtro").val(), 10);
		showInput(nguoio);

		$(document).on('change keyup',".nguoio-phongtro" , function() {
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 10) $(this).val('10');
			if($(this).val() == '') $(this).val('1');

			nguoio = parseInt($(this).val(), 10);
			var dsNguoi = saveData(nguoio);
			showInput(nguoio);
			recover(dsNguoi);
		});

		$(".dientich-phongtro").on('change keyup', function() {
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 1000000000) $(this).val('1000000000');
			if($(this).val() == '') $(this).val('1');
		});

		$(".tientro-phongtro").on('change keyup', function() {
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 1000000000) $(this).val('1000000000');
			if($(this).val() == '') $(this).val('1');
		});


	});

	function saveData(num) {
		var dsNguoi = [];
		for(var i = 0; i < num; i++) {
			var nguoi = {
				cmnd: '',
				sdt: '',
				hoten: '',
				gioitinh: 'nam',
				diachi: ''
			};
			if($($('.nguoio-cmnd')[i]).val() != '') {
				nguoi.cmnd = $($('.nguoio-cmnd')[i]).val();
				if(_.isUndefined(nguoi.cmnd)) nguoi.cmnd = '';
			}
			if($($('.nguoio-sdt')[i]).val() != '') {
				nguoi.sdt = $($('.nguoio-sdt')[i]).val();
				if(_.isUndefined(nguoi.sdt)) nguoi.sdt = '';
			}
			if($($('.nguoio-hoten')[i]).val() != '') {
				nguoi.hoten = $($('.nguoio-ten')[i]).val();
				if(_.isUndefined(nguoi.hoten)) nguoi.hoten = '';
			}
			if($($('.nguoio-gioitinh')[i]).val() != '') {
				nguoi.gioitinh = $($('.nguoio-gioitinh')[i]).val();
				if(_.isUndefined(nguoi.gioitinh)) nguoi.gioitinh = 'nam';
			}
			if($($('.nguoio-diachi')[i]).val() != '') {
				nguoi.diachi = $($('.nguoio-diachi')[i]).val();
				if(_.isUndefined(nguoi.diachi)) nguoi.diachi = '';
			}
			dsNguoi.push(nguoi);
		}
		return dsNguoi;
	}

	function recover(dsNguoi) {
		_.forEach(dsNguoi, function(nguoi, key) {
			$($(".nguoio-cmnd")[key]).val(nguoi.cmnd);
			$($(".nguoio-sdt")[key]).val(nguoi.sdt);
			$($('.nguoio-ten')[key]).val(nguoi.hoten);
			$($(".nguoio-diachi")[key]).val(nguoi.diachi);
			$($(".nguoio-gioitinh")[key]).val(nguoi.gioitinh);
		});
	}

	function showInput(num) {
		var content = '';
		for(var i = 0; i < num; i++) {
      		content += '<label>Người thứ: '+(i+1)+'</label>';
			content += '<div class="row">';
			content += '<div class="form-group col-md-3">';
			content += '<input class="form-control form-control-sm nguoio-cmnd" id="nguoio-cmnd-'+(i+1)+'" placeholder="CMND *">';
			content += '</div>';
			content += '<div class="form-group col-md-3">';
			content += '<input class="form-control form-control-sm nguoio-sdt"  id="nguoio-sdt-'+(i+1)+'" placeholder="Số điện thoại *">';
			content += '</div>';
			content += '<div class="form-group  col-md-4">';
			content += '<input type="text" maxlength="30" class="form-control form-control-sm nguoio-ten" placeholder="Họ và tên *">';
			content += '</div>';
			content += '<div class="form-group col-md-2">';
			content += '<select class="form-control nguoio-gioitinh">';
			content += '<option value="nam">Nam</option>';
			content += '<option value="nu">Nữ</option>';
			content += '</select>';
			content += '</div>';
			content += '<div class="form-group col-md-12">';
			content += '<input type="text" maxlength="100" class="form-control form-control-sm nguoio-diachi" placeholder="Địa chỉ">';
			content += '</div>';
			if(i != num - 1) {
				content += '</div><hr>';
			}
			if(i == num - 1) {
			content += '<div class="form-group col-md-12">';
          	content += '<label style="color:#ff0000; margin-top:1%;">* Chú ý</label><br>';
          	content += '<label style="color:#ff0000; margin-top:1%;">- Thông tin người ở để trống nếu chưa có.</label><br>';
          	content += '<label style="color:#ff0000; margin-top:1%;">- Nếu có người ở, vui lòng nhập đủ số CMND, Số điện thoại và Họ tên.</label>';
			content += '</div>';
			}
		}
		$("#danhsach-nguoio").html(content);
		content = '';
		$(".nguoio-cmnd").inputmask('999999999');
		$(".nguoio-sdt").inputmask('9999999999');
	}

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

	$(document).on('click', '.add-phongtro', function() {
		var ten, dientich, sltd, tientro, mota, nhatro, cachtinh;
		var cmnd, sdt, hoten, gioitinh, diachi;
		var cmnd_s, sdt_s, hoten_s, diachi_s;
		var dsNguoi = [];
		var complete = 0;

		nhatro = $(this).attr('data');
		ten = $('.ten-phongtro').val();
		dientich = $(".dientich-phongtro").val();
		sltd = $(".nguoio-phongtro").val();
		tientro = $(".tientro-phongtro").val();
		mota = $(".mota-phongtro").val();
		cachtinh = $("input[name=cachtinh-phongtro]").val();

		cmnd_s = '.nguoio-cmnd';
		sdt_s = '.nguoio-sdt';
		hoten_s = '.nguoio-ten';
		diachi_s = '.nguoio-diachi';

		checkEmpty('.ten-phongtro');

		if(ten != '') {
			for(var i = 0; i < parseInt(sltd,10); i++) {
				var nguoi = {};
				// Element value
				cmnd = $($(".nguoio-cmnd")[i]).val();
				sdt = $($(".nguoio-sdt")[i]).val();
				hoten = $($('.nguoio-ten')[i]).val();
				diachi = $($(".nguoio-diachi")[i]).val();
				gioitinh = $($(".nguoio-gioitinh")[i]).val();
				if(cmnd != '' && sdt != '' && hoten != '') {
					if($($(".nguoio-cmnd")[i]).inputmask('isComplete') && $($(".nguoio-sdt")[i]).inputmask('isComplete')) {
						nguoi = {
							cmnd: cmnd,
							sdt: sdt,
							hoten: hoten,
							diachi: diachi,
							gioitinh: gioitinh
						};
						dsNguoi.push(nguoi);
					}
					else {
						swal('Lỗi!', 'Vui lòng nhập đẩy đủ thông tin CMND và Số điện thoại!', 'warning');
						complete ++;
					}
				}
			}
			console.log('nhatro: ', nhatro);
			if(dsNguoi.length > 0 && complete == 0) {
				$.ajax({
					type: 'post',
					url: '../addPhongTro',
					async: false,
					data: {
						ten: ten,
						nhatro: nhatro,
						dientich: dientich,
						sltd: sltd,
						slndo: dsNguoi.length,
						tientro: tientro,
						mota: mota,
						cachtinh: cachtinh,
						dsTro: dsNguoi
					},
					success: function(data) {
						console.log('data ds co nguoio',data);
						if(data == 'true') {
							swal('Thành công!', 'Thêm phòng trọ mới thành công!', 'success');
							loadPhongTro();
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
				$.ajax({
					type: 'post',
					url: '../addPhongTro',
					async: false,
					data: {
						ten: ten,
						nhatro: nhatro,
						dientich: dientich,
						sltd: sltd,
						slndo: 0,
						mota: mota,
						cachtinh: cachtinh,
						tientro: tientro,
						dsTro: []
					},
					success: function(data) {
						console.log('data ds khong nguoi o',data);
						if(data == 'true') {
							swal('Thành công!', 'Thêm phòng trọ mới thành công!', 'success');
							loadPhongTro();
			                $('.cancel-add').click();
			                $(".modal-backdrop").modal('hide');
			                $('body').removeClass('modal-open');
			                $('.modal-backdrop').remove();
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
		}
	});

	$(document).on('click', '.xem-phongtro', function() {
		$("#modal-xem-phongtro").modal();
		var id = $(this).attr('data');
		$("#update-phongtro").attr('data', id);
		$("#xem-ten-phongtro").parent().removeClass('has-danger');
		$("#xem-ten-phongtro").removeClass('form-control-danger');
		$.ajax({
			type: 'post',
			url: '../getMotPhongTro',
			data: {
				id: id
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log('data: ', data);
				if(data != 'false') {
					$("#xem-ten-phongtro").val(data.Ten)
					$("#xem-nguoio-phongtro").val(data.SLTD);
					$("#xem-tientro-phongtro").val(data.GIA);
					$("#xem-mota-phongtro").val(data.GhiChu);
					$("#xem-dientich-phongtro").val(data.DienTich);
					$("#xem-nguoidango-phongtro").val(data.SLNDO);
					$("input[name=xem-cachtinh-phongtro][value='"+data.CACHTINH+"']").prop('checked', true);
					$("#xem-tientro-giacu-phongtro").val(data.GIA);
					$("#xem-cachtinh-cu-phongtro").val(data.CACHTINH);
				}
				else {
					console.log('Something wrong!');
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	});

	$(document).on('change keyup', '#xem-nguoio-phongtro', function() {
		var dango, toida;
		dango = $("#xem-nguoidango-phongtro").val();
		toida = $(this).val();
		if(toida < dango) {
			swal('Lỗi!', 'Không thể giảm người ở tối đa nhỏ hơn số người đang ở!', 'warning');
			$(this).val(dango);
		}
	});

	$(document).on('click', '#update-phongtro', function() {
		loadPhongTro();
		var ten, dientich, sltd, tientro, mota, cachtinh, giacu, cachtinhcu, dango;
		var id = $(this).attr('data');
		checkEmpty('#xem-ten-phongtro');
		ten = $("#xem-ten-phongtro").val()
		sltd = $("#xem-nguoio-phongtro").val();
		dango = $("#xem-nguoidango-phongtro").val();
		tientro = $("#xem-tientro-phongtro").val();
		mota = $("#xem-mota-phongtro").val();
		dientich = $("#xem-dientich-phongtro").val();
		cachtinh = $("input[name=xem-cachtinh-phongtro]:checked").val();
		giacu = $("#xem-tientro-giacu-phongtro").val();
		cachtinhcu = $("#xem-cachtinh-cu-phongtro").val();
		console.log("data update: ", _.concat(ten, sltd, tientro, mota, dientich, cachtinh, giacu, cachtinhcu));
		if(sltd >= dango) {
			$.ajax({
				type: 'post',
				url: '../updatePhongTro',
				data: {
					id: id,
					ten: ten,
					sltd: sltd,
					tientro: tientro,
					mota: mota,
					dientich: dientich,
					cachtinh: cachtinh,
					giacu: giacu,
					cachtinhcu: cachtinhcu
				},
				success: function(data) {
					if(data != 'false') {
						swal('Thành công!', 'Cập nhật thông tin phòng trọ thành công!', 'success');
						loadPhongTro();
		                $('.cancel-update').click();
		                $(".modal-backdrop").modal('hide');
		                $('body').removeClass('modal-open');
		                $('.modal-backdrop').remove();
					}
					else {
						swal('Thành công!', 'Cập nhật thông tin phòng trọ thành công!', 'success');
					}
				},
				error: function(e) {
					console.log(e);
				}
			});
		}
		else {
			swal('Lỗi!', 'Không thể giảm người ở tối đa nhỏ hơn số người đang ở!', 'warning');
			$("#xem-nguoio-phongtro").val(sltd);
		}	
	});

	$(document).on('click', '.xem-nguoio', function() {
		$("#modal-xem-nguoio").modal();
		var id = $(this).attr('data');
		$.cookie('mapt', id);
		$.ajax({
			type: 'post',
			url: '../getNguoiTro',
			data: {
				id: id
			},
			success: function(data) {
				if(data != 'false') {
					data = JSON.parse(data);
					console.log('DATA: ',data);
					var content = '';
					var ten = [], cmnd = [], sdt = [], diachi = [], gioitinh = [];
					content += '<thread>';
					content += '<th>Tên *</th>';
					content += '<th>CMND *</th>';
					content += '<th>SDT *</th>';
					content += '<th>Địa chỉ</th>';
					content += '<th>Giới tính</th>';
					content += '<th>Thao tác</th>';
					content += '</thread>';
					content += '<tbody>';
					if(data.dsnguoitro.length == data.sltd) {
						_.forEach(data.dsnguoitro, function(nguoi, key) {
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
							content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
							content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển đi</button></td>';
							content += '</tr>';
						});
					}
					else {
						if(data.dsnguoitro.length == 0) {
							for(var i = 0; i < data.sltd; i++) {
								content += '<tr>';
								content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
								content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
								content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
								content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
								content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+i+'">';
								content += '<option selected value="nam">Nam</option>';
								content += '<option value="nu">Nữ</option>';								
								content += '</select></td>';
								content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
								content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển đi</button></td>';
								content += '</tr>';
							}
						}
						else {
							if(data.dsnguoitro.length > 0 && data.sltd > data.dsnguoitro.length) {
								_.forEach(data.dsnguoitro, function(nguoi, key) {
									console.log('key: ',key);
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
									content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
									content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển đi</button></td>';
									content += '</tr>';
								});
								for(var i = data.dsnguoitro.length; i < data.sltd; i++) {
									content += '<tr>';
									content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
									content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
									content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
									content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
									content += '<td><select class="form-control" id="add-nguoitro-gioitinh-'+i+'">';
									content += '<option selected value="nam">Nam</option>';
									content += '<option value="nu">Nữ</option>';								
									content += '</select></td>';
									content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
									content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển đi</button></td>';
									content += '</tr>';
								}
							}
						}
					}

					content += '</tbody>';
					$("#danhsach-nguoio-edit").html(content);
					$(".dsnguoio-cmnd").inputmask('999999999');
					$(".dsnguoio-sdt").inputmask('9999999999');
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	});

	$(document).on('click', '.save-nguoio', function() {
		// console.log('MANO: ', $(this).attr('data'));
		var ten, cmnd, sdt, diachi, gioitinh, id;
		id = $(this).attr('data').split('-');
		var mapt = $.cookie('mapt');
		console.log('document.cookie: ', mapt);
		console.log('id: ', id);
		// If update
		if(id.length == 1) {
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
						url: '../updateNguoiTro',
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
							showNguoiTro(mapt);
							loadPhongTro();
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
						url: '../addNguoiTro',
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
								showNguoiTro(mapt);
								loadPhongTro();
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

	function loadPhongTro() {
		var id = $(".add-phongtro").attr('data');
		$.ajax({
			type: 'post',
			url: '../showPhongTro',
			dataType: 'json',
			data: {
				id: id
			},
			async: false,
			success: function(data) {
				console.log('show phong tro: ', data);
				var content = '';
				content += '<thread>';
				content += '<th>STT</th>';
				content += '<th>Tên phòng</th>';
				content += '<th>Đang ở</th>';
				content += '<th>Được ở</th>';
				content += '<th>Tiền trọ (VND)</th>';
				content += '<th>Cách tính</th>';
				content += '<th>Thao tác</th>';
				content += '</thread>';
				content += '<tbody>';
				if(data.length > 0) {
					_.forEach(data, function(phongtro, key) {
						content += '<tr>';
						content += '<td>'+(key+1)+'</td>';
						content += '<td>'+phongtro.Ten+'</td>';
						content += '<td>'+phongtro.SLNDO+'</td>';
						content += '<td>'+phongtro.SLTD+'</td>';
						content += '<td>'+toMoney(phongtro.GIA)+'</td>';
						if(phongtro.CACHTINH == 'daunguoi') {
							content += '<td>Theo đầu người</td>';
						}
						else content += '<td>Giá cố định</td>';
						content += '<td>';
						content += '<button class="btn btn-sm btn-outline-primary xem-phongtro" id="xem-phongtro" data="'+phongtro.MAPT+'">Xem</button>';
						content += '<button class="btn btn-sm btn-outline-primary xem-nguoio" id="xem-nguoio" data="'+phongtro.MAPT+'">Người ở</button>';
						content += '</td>';
						content += '</tr>';
					});
				}
				else {

				}
				content += '</tbody>';
				$("#danhsach-phongtro").html(content);
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function toMoney(string) {
		return (string/1000).toFixed(3).split('.').join(',');
	}

	function showNguoiTro(id) {
		$.ajax({
			type: 'post',
			url: '../getNguoiTro',
			data: {
				id: id
			},
			success: function(data) {
				if(data != 'false') {
					data = JSON.parse(data);
					console.log('DATA: ',data);
					var content = '';
					var ten = [], cmnd = [], sdt = [], diachi = [], gioitinh = [];
					content += '<thread>';
					content += '<th>Tên *</th>';
					content += '<th>CMND *</th>';
					content += '<th>SDT *</th>';
					content += '<th>Địa chỉ</th>';
					content += '<th>Giới tính</th>';
					content += '<th>Thao tác</th>';
					content += '</thread>';
					content += '<tbody>';
					if(data.dsnguoitro.length == data.sltd) {
						_.forEach(data.dsnguoitro, function(nguoi, key) {
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
							content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
							content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển đi</button></td>';
							content += '</tr>';
						});
					}
					else {
						if(data.dsnguoitro.length == 0) {
							for(var i = 0; i < data.sltd; i++) {
								content += '<tr>';
								content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
								content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
								content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
								content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
								content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+i+'">';
								content += '<option selected value="nam">Nam</option>';
								content += '<option value="nu">Nữ</option>';								
								content += '</select></td>';
								content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
								content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển đi</button></td>';
								content += '</tr>';
							}
						}
						else {
							if(data.dsnguoitro.length > 0 && data.sltd > data.dsnguoitro.length) {
								_.forEach(data.dsnguoitro, function(nguoi, key) {
									console.log('key: ',key);
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
									content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
									content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển đi</button></td>';
									content += '</tr>';
								});
								for(var i = data.dsnguoitro.length; i < data.sltd; i++) {
									content += '<tr>';
									content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
									content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
									content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
									content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
									content += '<td><select class="form-control" id="add-nguoitro-gioitinh-'+i+'">';
									content += '<option selected value="nam">Nam</option>';
									content += '<option value="nu">Nữ</option>';								
									content += '</select></td>';
									content += '<td><button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
									content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển đi</button></td>';
									content += '</tr>';
								}
							}
						}
					}

					content += '</tbody>';
					$("#danhsach-nguoio-edit").html(content);
					$(".dsnguoio-cmnd").inputmask('999999999');
					$(".dsnguoio-sdt").inputmask('9999999999');
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	$(document).off('change').on('click', '.cancel-nguoio', function() {
		var id = $(this).attr('data');
		$.cookie('mano', id);
		swal({
	        title: 'Vui lòng xác nhận!',
	        text: "Xác nhận rằng người này không còn tiếp tục ở tại đây!",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3f51b5',
	        cancelButtonColor: '#ff4081',
	        confirmButtonText: 'Great ',
	        buttons: {
	          confirm: {
	            text: "Đồng ý",
	            value: true,
	            visible: true,
	            className: "btn btn-danger xacnhan-chuyentro",
	            closeModal: true,
	          },
	          cancel: {
	            text: "Hủy bỏ",
	            value: null,
	            visible: true,
	            className: "btn btn-primary",
	            closeModal: true
	          }
	        }
      	});
	});

  	$(document).on('click', '.xacnhan-chuyentro', function() {
		var mapt = $.cookie('mapt');
		var mano = $.cookie('mano');
		$.ajax({
			type: 'post',
			url: '../updateChuyenTro',
			data: {
				mapt: mapt,
				id: mano
			},
			success: function(data) {
				if(data != 'false') {
					swal('Thành công!', 'Cập nhật thành viên thành công!', 'success');
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
  	});

})(jQuery);