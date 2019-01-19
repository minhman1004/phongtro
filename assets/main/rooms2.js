(function($) {
  'use strict';

  if($('#search-phongtro').length) {
  	$("#search-phongtro").select2();
  }

  // if($('#bang-chi-phi').length) {
  // 	$("#bang-chi-phi").select2();
  // }
  if($('#add-nhatro-chiphi').length) {
  	$("#add-nhatro-chiphi").select2();
  }

  

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
	  				$("#search-phongtro").html(content);
	  			}
	  			else {
	  				content += '<option value="null">Danh sách rỗng</option>';
	  				$("#search-phongtro").html(content);
	  			}
			},
			error: function() {
				console.log('error');
			}
		});
	});

	$(document).on('click', '#open-modal-add-chiphi', function() {
		$("#modal-add-chiphi").modal();
		// Gia
		$("#add-gia-dien").val('0');
		$("#add-gia-nuoc").val('0');
		$("#add-gia-wifi").val('0');
		$("#add-gia-rac").val('0');
		$("#add-gia-giu-xe").val('0');
		$("#add-gia-giu-xe-dap").val('0');
		$("#add-gia-giu-xe-oto").val('0');
		$("#add-gia-giu-xe-may").val('0');

		// Typing gia
		// Gia dien
		$(document).on('keyup', '#add-gia-dien', function() {
			if($("#add-gia-dien").val() < 0) $("#add-gia-dien").val('0');
			if($("#add-gia-dien").val().length == 0) $("#add-gia-dien").val('0');
		});

		// Nuoc
		$(document).on('keyup', '#add-gia-nuoc', function(){
			if($("#add-gia-nuoc").val().length == 0) $("#add-gia-nuoc").val('0');
			if($("#add-gia-nuoc").val() < 0) $("#add-gia-nuoc").val('0');
		});

		// Wifi
		$(document).on('keyup', '#add-gia-wifi', function(){
			if($("#add-gia-wifi").val().length == 0) $("#add-gia-wifi").val('0');
			if($("#add-gia-wifi").val() < 0) $("#add-gia-wifi").val('0');	
		});

		// Rac
		$(document).on('keyup', '#add-gia-rac', function(){
			if($("#add-gia-rac").val().length == 0) $("#add-gia-rac").val('0');
			if($("#add-gia-rac").val() < 0) $("#add-gia-rac").val('0');	
		});

		// Giu xe
		$(document).on('keyup', '#add-gia-giu-xe', function(){
			if($("#add-gia-giu-xe").val().length == 0) $("#add-gia-giu-xe").val('0');
			if($("#add-gia-giu-xe").val() < 0) $("#add-gia-giu-xe").val('0');	
		});

		// Xe dap
		$(document).on('keyup', '#add-gia-giu-xe-dap', function(){
			if($("#add-gia-giu-xe-dap").val().length == 0) $("#add-gia-giu-xe-dap").val('0');
			if($("#add-gia-giu-xe-dap").val() < 0) $("#add-gia-giu-xe-dap").val('0');	
		});

		// Xe may
		$(document).on('keyup', '#add-gia-giu-xe-may', function(){
			if($("#add-gia-giu-xe-may").val().length == 0) $("#add-gia-giu-xe-may").val('0');
			if($("#add-gia-giu-xe-may").val() < 0) $("#add-gia-giu-xe-may").val('0');	
		});

		// Oto
		$(document).on('keyup', '#add-gia-giu-xe-oto', function(){
			if($("#add-gia-giu-xe-oto").val().length == 0) $("#add-gia-giu-xe-oto").val('0');
			if($("#add-gia-giu-xe-oto").val() < 0) $("#add-gia-giu-xe-oto").val('0');	
		});

		$.ajax({
			type: 'get',
			url: 'rooms/showNhaTro',
			dataType: 'json',
			async: false,
			success: function(data) {
				var nhatro, chutro, content = '';
				nhatro = data.nhatro;
				chutro = data.chutro;
				if(nhatro.length > 0) {
					_.forEach(nhatro, function(nt, key) {
						content += '<option value="'+nt.MANT+'">'+nt.TENNT + ' - '+ _.find(chutro, {'MAND':nt.MAND}).HOTEN + ' - ' + _.find(chutro, {'MAND':nt.MAND}).Email +'</option>';
					});
				}
				$("#add-nhatro-chiphi").html(content);
			},
			error: function() {
				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
			}
		});
	});

	$(document).on('click', '.add-chiphi-nhatro', function() {
		var nhatro, ten, dien, nuoc, wifi, rac, giuxe, xedap, xemay, oto, tenc;
		nhatro = $("#add-nhatro-chiphi").val();
		ten = $("#add-ten-chiphi").val();
		dien = $("#add-gia-dien").val();
		nuoc = $("#add-gia-nuoc").val();
		wifi = $('#add-gia-wifi').val();
		rac = $("#add-gia-rac").val();
		giuxe = $("#add-gia-giu-xe").val();
		xedap = $("#add-gia-giu-xe-dap").val();
		xemay = $("#add-gia-giu-xe-may").val();
		oto = $("#add-gia-giu-xe-oto").val();
		tenc = '#add-ten-chiphi';
		checkEmpty(tenc);

		if(ten != '') {
			console.log('Dataaa: ', _.concat([nhatro, ten,dien,nuoc,wifi,rac,giuxe,xedap,xemay,oto]));
			$.ajax({
				type: 'post',
				url: 'rooms/addChiPhi',
				data: {
					nhatro: nhatro,
					ten: ten,
					dien: dien,
					nuoc: nuoc,
					wifi: wifi,
					rac: rac,
					giuxe: giuxe,
					xedap: xedap,
					xemay: xemay,
					oto: oto,
					trangthai: 'new',
					selected: 'no'
				},
				success: function(data) {
					console.log('DATAAA: ', data);
					if(data == 'true') {
						swal('Thành công!', 'Thêm bảng chi phí mới thành công!', 'success');
						$("#add-ten-chiphi").val('');
						$("#add-gia-dien").val('0');
						$("#add-gia-nuoc").val('0');
						$("#add-gia-wifi").val('0');
						$("#add-gia-rac").val('0');
						$("#add-gia-giu-xe").val('0');
						$("#add-gia-giu-xe-dap").val('0');
						$("#add-gia-giu-xe-oto").val('0');
						$("#add-gia-giu-xe-may").val('0');
					}
					else {
						swal('Lỗi!', 'Nhập giá trị lớn hơn 0 để tạo bảng chi phí!', 'warning');
					}
				},
				error: function(e) {
					swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
					console.log('Error: ', e);
				}
			});
		}
	});

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

})(jQuery);