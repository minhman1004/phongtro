(function($) {
	'use strict';
	$(document).on('click', '#add-donvi', function() {
		var tendv, kieu;
		tendv = $("#add-ten-donvi").val();
		kieu = $("#add-kieu-donvi").val();

		if(tendv != '') {
			$("#add-ten-donvi").parent().removeClass('has-danger');
      		$("#add-ten-donvi").removeClass('form-control-danger');
			$.ajax({
				type: 'post',
				url: 'punish/adddonvi',
				data: {
					tendv: tendv,
					kieu: kieu
				},
				success: function(data) {
					if(data = 'true') {
						$("#add-donvi").val('');
						swal('Thành công!', 'Thêm đơn vị mới thành công!', 'success');
						showDonVi();
					}
				},
				error: function() {
					swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
				}
			});
			console.log('tendv: ', tendv);
			console.log('kieudv: ', kieu);
		}
		else {
			$("#add-ten-donvi").parent().addClass('has-danger');
      		$("#add-ten-donvi").addClass('form-control-danger');
		}
	});

	function showDonVi() {
		$.ajax({
			type: 'ajax',
			url: 'punish/showdonvi',
			async: false,
			dataType: 'json',
			success: function(data) {
				console.log('data showDonVi: ', data);				
				var content = '';
				content += '<thead>';
              	content += '<tr>';
                content += '<td>STT</td>';
                content += '<td>Tên đơn vị</td>';
                content += '<td>Kiểu đơn vị</td>';
                content += '<td>Thao tác</td>';
              	content += '</tr>';
            	content += '</thead>';
				if(data) {
                	content += '<tbody>';
                	_.forEach(data, function(donvi, key) {
                		content += '<tr>';
                		content += '<td>'+(key+1)+'</td>';
                		content += '<td>'+donvi.TENDV+'</td>';
                		content += '<td>'+donvi.KIEU+'</td>';
                		content += '<td><button class="btn btn-sm btn-outline-primary" data="'+donvi.MADV+'">Sửa</button></td>';
                		content += '</tr>';
                	});
                	content += '</tbody>';
				}
				else {
					content += '<tbody>';
					content += '<tr>Danh sách rỗng!</tr>';
					content += '</tbody>';
				}				
            	$("#danh-sach-donvi").html(content);
			},
			error: function() {
				var content = '';
				content += '<thead>';
              	content += '<tr>';
                content += '<td>STT</td>';
                content += '<td>Tên đơn vị</td>';
                content += '<td>Kiểu đơn vị</td>';
                content += '<td>Thao tác</td>';
              	content += '</tr>';
            	content += '</thead>';
            	content += '<tbody>';
				content += '<tr>Danh sách rỗng!</tr>';
				content += '</tbody>';
            	$("#danh-sach-donvi").html(content);
			}
		});
	}

	// $("#add-donvi-button").on('click', function() {
	// 	$("#modal-add-donvi").modal();
	// });

	$(document).on('click', '.edit-loi', function() {
		var id = $(this).attr('data');
		console.log('data: ', data);
		$('#edit-loi').modal();
		$.ajax({
			type: 'post',
			url: 'punish/getDonVi',
			async: false,
			data: {
				id: id
			},
			success: function(data) {
				if(data != 'false') {
					$("#edit-ten-donvi").val(data.TENDV);
					$("#edit-kieu-donvi").val(data.KIEU);
				}
			},
			error: function() {

			}
		});
	});
})(jQuery);