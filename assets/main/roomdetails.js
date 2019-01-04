(function($) {
	'use strict';

	$(document).ready(function() {
		var nguoio;
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
		console.log('danh sach: ',dsNguoi);
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
		var ten, dientich, sltd, tientro, mota, nhatro;
		var cmnd, sdt, hoten, gioitinh, diachi;
		var cmnd_s, sdt_s, hoten_s, diachi_s;
		var dsNguoi = [];
		nhatro = $(this).attr('data');
		ten = $('.ten-phongtro').val();
		dientich = $(".dientich-phongtro").val();
		sltd = $(".nguoio-phongtro").val();
		tientro = $(".tientro-phongtro").val();

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
					nguoi = {
						cmnd: cmnd,
						sdt: sdt,
						hoten: hoten,
						diachi: diachi,
						gioitinh: gioitinh
					};
					dsNguoi.push(nguoi);
				}
			}
			console.log('nhatro: ', nhatro);
			if(dsNguoi.length > 0) {
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
						tientro: tientro,
						dsTro: dsNguoi
					},
					success: function(data) {
						console.log('data: ', JSON.parse(data));
						// swal('Thành công!', 'Thêm phòng trọ mới thành công!', 'success');
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
					data: {
						ten: ten,
						nhatro: nhatro,
						dientich: dientich,
						sltd: sltd,
						slndo: 0,
						tientro: tientro,
						dsTro: []
					},
					success: function(data) {
						console.log('data: ', JSON.parse(data));
						// swal('Thành công!', 'Thêm phòng trọ mới thành công!', 'success');
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
		}
	});

})(jQuery);