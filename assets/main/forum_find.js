(function($) {
'use strict';
	$(document).on('click', '#login-button', function() {
		var cmnd, sdt;
		cmnd = $("#login-cmnd").val();
		sdt = $("#login-sdt").val();
		checkEmpty('#login-sdt');
		checkEmpty('#login-cmnd');
		if($("#login-cmnd").inputmask('isComplete') && $("#login-sdt").inputmask('isComplete')) {
			$.ajax({
				type: 'post',
				url: 'find/getNguoiTro',
				data: {
					cmnd: cmnd,
					sdt: sdt
				},
				success: function(data) {
					if(data == 'cmndcorrect_sdtincorrect') {
						swal('Lỗi!', 'Thông tin Số điện thoại không chính xác, vui lòng thử lại!', 'warning');
					}
					else {
						if(data == 'cmndnull') {
							swal('Lỗi!', 'Không tìm được người có CMND như trên, vui lòng thử lại!', 'warning');
						}
						else {
							data = JSON.parse(data)[0];
							localStorage.setItem('fr_nguoio', JSON.stringify(data));
							console.log('tìm thấy: ', JSON.parse(localStorage.getItem('fr_nguoio')));
							swal('Thành công!', 'Đăng nhập thành công, chuẩn bị chuyển trang!', 'success');
							var hoten, gioitinh, cmnd, nguoio;
							nguoio = JSON.parse(localStorage.getItem('fr_nguoio'));
							hoten = '<i class="mdi mdi-account-check menu-icon"></i> '+nguoio.TEN;
							if(nguoio.GIOITINH == 'nam') {
								gioitinh = '<i class="mdi mdi-gender-male-female menu-icon"></i> Nam';
							}
							else {
								gioitinh = '<i class="mdi mdi-gender-male-female menu-icon"></i> Nữ';
							}
							cmnd = '<i class="mdi mdi-security menu-icon"></i> '+nguoio.CMND;
							$("#find-name").html(hoten);
							$("#find-cmnd").html(cmnd);
							$("#find-gioitinh").html(gioitinh);

						    if(_.isUndefined(nguoio) || nguoio == null) {
						      $("#nhatro-dango").attr('hidden', true);
						      $("#nhatro-tungo").attr('hidden', true);
						      $("#thongtin-thanhtoan").attr('hidden', true);
						    }
						    else {
						      $("#nhatro-dango").attr('hidden', false);
						      $("#nhatro-tungo").attr('hidden', false);
						      $("#thongtin-thanhtoan").attr('hidden', false);
						  }
						}
					}
				},
				error: function(e) {
					console.log(e);
				}
			});
		}
		else {
			swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'error');
		}
	});

  	function checkEmpty(string) {
		if($(string).val() == '' || !$(string).inputmask('isComplete')) {
			$(string).parent().addClass('has-danger');
			$(string).addClass('form-control-danger');
		}
		else {
			$(string).parent().removeClass('has-danger');
			$(string).removeClass('form-control-danger');
		}
	}

	$(document).ready(function() {
		var nguoio = JSON.parse(localStorage.getItem('fr_nguoio'));
		if(_.isUndefined(nguoio) || nguoio == null) {
			$("#delete-result").attr('disabled', true);

		}
		else {
			$("#delete-result").attr('disabled', false);
			var hoten, gioitinh, cmnd;
			hoten = '<i class="mdi mdi-account-check menu-icon"></i> '+nguoio.TEN;
			if(nguoio.GIOITINH == 'nam') {
				gioitinh = '<i class="mdi mdi-gender-male-female menu-icon"></i> Nam';
			}
			else {
				gioitinh = '<i class="mdi mdi-gender-male-female menu-icon"></i> Nữ';
			}
			cmnd = '<i class="mdi mdi-security menu-icon"></i> '+nguoio.CMND;
			$("#find-name").html(hoten);
			$("#find-cmnd").html(cmnd);
			$("#find-gioitinh").html(gioitinh);
		}
	});

	$(document).on('click', '#delete-result', function() {
		var nguoio = null;
		localStorage.removeItem('fr_nguoio');
		swal('Thành công!', 'Xóa kết quả tìm kiếm thành công!', 'success');
		console.log('nguoio delete', nguoio);
		$("#find-name").html('');
		$("#find-cmnd").html('');
		$("#find-gioitinh").html('');

	    if(_.isUndefined(nguoio) || nguoio == null) {
	      $("#nhatro-dango").attr('hidden', true);
	      $("#nhatro-tungo").attr('hidden', true);
	      $("#thongtin-thanhtoan").attr('hidden', true);
	    }
	    else {
	      $("#nhatro-dango").attr('hidden', false);
	      $("#nhatro-tungo").attr('hidden', false);
	      $("#thongtin-thanhtoan").attr('hidden', false);
	  	}
	});

})(jQuery);