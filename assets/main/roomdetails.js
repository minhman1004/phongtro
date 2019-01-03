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
			$(".nguoio-phongtro").val('1');
			$(".dientich-phongtro").val('1');
			$(".tientro-phongtro").val('1');
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 10) $(this).val('10');
			if($(this).val() == '') $(this).val('1');

			nguoio = parseInt($(this).val(), 10);
			showInput(nguoio);
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

	function showInput(num) {
		var content = '';
			for(var i = 0; i < num; i++) {
          		content += '<label>Người thứ: '+(i+1)+'</label>';
				content += '<div class="row">';
				content += '<input class="form-control form-control-sm col-md-3 nguoio-cmnd" id="nguoio-cmnd-'+(i+1)+'" placeholder="CMND">';
				content += '<input class="form-control form-control-sm col-md-3 nguoio-sdt"  id="nguoio-sdt-'+(i+1)+'" placeholder="Số điện thoại">';
				content += '<input type="text" maxlength="30" class="form-control col-md-4 form-control-sm nguoio-ten" placeholder="Họ và tên">';
				content += '<select class="form-control col-md-2 nguoio-gioitinh">';
				content += '<option value="nam">Nam</option>';
				content += '<option value="nu">Nữ</option>';
				content += '</select>';
				content += '<input type="text" maxlength="100" class="form-control col-md-12 form-control-sm nguoio-diachi" placeholder="Địa chỉ">';
				if(i != num - 1) {
					content += '</div><hr>';
				}
				if(i == num - 1) {
              	content += '<label style="color:#ff0000; margin-top:1%;">Thông tin người ở để trống nếu chưa có.</label>';
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
		var nguoio = {};
		nhatro = $(this).attr('data');
		ten = $('.ten-nguoio-phongtro').val();
		dientich = $(".dientich-phongtro").val();
		sltd = $(".nguoio-phongtro").val();
		tientro = $(".tientro-phongtro").val();
		for(var i = 0; i < parseInt(sltd,10); i++) {
			hoten = $(".")
		}
	});

})(jQuery);