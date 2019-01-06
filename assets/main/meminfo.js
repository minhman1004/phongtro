(function($) {
  'use strict';

  	// Open modal edit
  	$(document).on('click', '.edit-info', function() {
	  	var id = $(this).attr('data');
	  	$("#edit-info").modal();
	  	$(".save-info").attr('data', id);
	  	$.ajax({
	  		type: 'post',
	  		url: 'info/getNguoiDung',
	  		data: {
	  			id: id
	  		},
	  		success: function(data) {
	  			data = JSON.parse(data)[0];
	  			console.log(data);
	  			if(data != 'false') {
				  	$("#edit-hoten").val(data.HOTEN);
				  	$("#edit-email").val(data.Email);
				  	$("#edit-sdt").val(data.SDT);
				  	$("#edit-gioitinh").val(data.GioiTinh);
				  	$("#edit-ngaysinh").val(data.NgaySinh.split('-').reverse().join('-'));
	  			}
	  		},
	  		error: function(e) {
	  			console.log(e);
	  		}
	  	});
	  	console.log(id);
  	});

  	// Save info
  	$(document).on('click', '.save-info', function() {
  		var id = $(this).attr('data');
  		var ten, sdt, email, ngaysinh, gioitinh;
  		ten = $("#edit-hoten").val();
	  	email = $("#edit-email").val();
	  	sdt = $("#edit-sdt").val();
	  	gioitinh = $("#edit-gioitinh").val();
	  	ngaysinh = $("#edit-ngaysinh").val().split('/').reverse().join('-');
	  	console.log('data save: ', _.concat(ten, email, sdt, gioitinh, ngaysinh, id));
	  	checkEmpty('#edit-hoten');
	  	checkComplete('#edit-ngaysinh');
	  	checkComplete('#edit-email');
	  	checkComplete('#edit-sdt');
	  	if(ten != '') {
	  		if($('#edit-ngaysinh').inputmask('isComplete') && $('#edit-email').inputmask('isComplete') && $('#edit-sdt').inputmask('isComplete')) {
	  			$.ajax({
	  				type: 'post',
	  				url: 'info/updateNguoiDung',
	  				data: {
	  					id: id,
	  					ten: ten,
	  					email: email,
	  					sdt: sdt,
	  					gioitinh: gioitinh,
	  					ngaysinh: ngaysinh
	  				},
	  				success: function(data) {
  						swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
  						$('.cancel-info').click();
		                $(".modal-backdrop").modal('hide');
		                $('body').removeClass('modal-open');
		                $('.modal-backdrop').remove();
		                reload(id);
	  				},
	  				error: function(e) {
	  					console.log(e);
	  				}
	  			});
	  		}
	  	}
  	});

  	// Reload info
  	function reload(id) {
  		$.ajax({
  			type: 'post',
  			url: 'info/reload',
  			data: {
  				id: id
  			},
  			success: function(data) {
  				data = JSON.parse(data)[0];
  				var gioitinh = '', ngaysinh = '', sdt = '', gt;
  				if(data.GioiTinh == 'nam') gt = 'Nam'; else gt = 'Nữ';
  				gioitinh = '<i class="mdi mdi-gender-male-female"></i> '+gt;
  				sdt = '<i class="mdi mdi-cellphone-iphone"></i> '+data.SDT;
  				ngaysinh = '<i class="mdi mdi-timetable"></i> '+data.NgaySinh.split('-').reverse().join('/');
				
				$("#show-gioitinh").html(gioitinh);
				$("#show-sdt").html(sdt);
				$("#show-ngaysinh").html(ngaysinh);
  				$("#show-hoten").text(data.HOTEN);
  				$("#show-email").text(data.Email);
  			},
  			error: function(e) {
  				console.log(e);
  			}
  		});
  	}


  	// Open modal edit password
	$(document).on('click', '.edit-password', function() {
  		var id = $(this).attr('data');
	  	$("#edit-password").modal();
	  	$(".save-pass").attr('data', id);
	  	$("#edit-pass").val('');
	  	$("#edit-repass").val('');
  	});

  	// Save new password
  	$(document).on('click', '.save-pass', function() {
  		var id = $(this).attr('data');
  		var pass, repass;
  		pass = $("#edit-pass").val();
  		repass = $("#edit-repass").val();
  		checkEmpty('#edit-pass');
  		checkEmpty('#edit-repass');
  		if(pass != '' && repass != '') {
	  		if(pass != repass) {
	  			swal('Lỗi!', 'Mật khẩu không trùng nhau, vui lòng nhập lại!', 'warning');
	  		}
	  		else {
	  			console.log('pass: ', _.concat(pass, repass, id));
	  			$.ajax({
	  				type: 'post',
	  				url: 'info/updatePass',
	  				data: {
	  					id: id,
	  					pass: pass
	  				},
	  				success: function(data) {
	  					if(data != 'false') {
	  						console.log('data: ', data);
		  					swal('Thành công!', 'Đổi mật khẩu thành công!', 'success');
		  					$('.cancel-pass').click();
			                $(".modal-backdrop").modal('hide');
			                $('body').removeClass('modal-open');
			                $('.modal-backdrop').remove();
	  					}
	  					else {
	  						swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'success');
	  					}
	  				},
	  				error: function(e) {
	  					console.log(e);
	  				}
	  			});
	  		}
  		}
  	});

  	function checkEmpty(string) {
		if($(string).val() == '') {
			$(string).parent().addClass('has-danger');
			$(string).addClass('form-control-danger');
		}
		else {
			$(string).parent().removeClass('has-danger');
			$(string).removeClass('form-control-danger');
		}
	}

	function checkComplete(string) {
		if($(string).inputmask('isComplete')) {
			$(string).parent().removeClass('has-danger');
			$(string).removeClass('form-control-danger');
		}
		else {
			$(string).parent().addClass('has-danger');
			$(string).addClass('form-control-danger');
		}
	}

})(jQuery);