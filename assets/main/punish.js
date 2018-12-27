(function($) {
	'use strict';


	// ------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------
	// Add don vi
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
						$("#add-ten-donvi").val('');
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

	// Show table don vi
	function showDonVi() {
		$.ajax({
			type: 'ajax',
			url: 'punish/showDonVi',
			async: false,
			dataType: 'json',
			success: function(data) {
				if(data != 'false') {
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
	                		content += '<td><button class="btn btn-sm btn-outline-primary edit-donvi" data="'+donvi.MADV+'">Sửa</button></td>';
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
				}
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


	// Show data donvi
	$(document).on('click', '.edit-donvi', function() {
		var id = $(this).attr('data');
		console.log('data: ', id);
		$('#edit-donvi').modal();
		$.ajax({
			type: 'post',
			url: 'punish/getDonVi',
			async: false,
			data: {
				id: id
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log('data edit: ', data);
				if(data != 'false') {
					$(".update-donvi").attr('data', data['MADV']);
					$("#edit-ten-donvi").val(data['TENDV']);
					$("#edit-kieu-donvi").val(data['KIEU']);
				}
			},
			error: function() {
				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
			}
		});
	});

	// Update don vi
	$(document).on('click', '.update-donvi', function() {
		var id = $(this).attr('data');
		var tendv, kieu;
		tendv = $("#edit-ten-donvi").val();
		kieu = $("#edit-kieu-donvi").val();
		console.log('ten', tendv);
		console.log('kieu', kieu);		
		$.ajax({
			type: 'post',
			url: 'punish/updateDonVi',
			data: {
				id: id,
				tendv: tendv,
				kieu: kieu
			},
			success: function(data) {
				if(data != 'false') {
					swal('Thành công!', 'Cập nhật thông tin đơn vị thành công!', 'success');
					showDonVi();
				}
			},
			error: function() {
				swal('Lỗi!', 'Xảy ra lỗi khi cập nhật, vui lòng kiểm tra lại!', 'error');
			}
		});
	});

	// ------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------

	// Get donvi
	function getDsDonVi() {
		var donvi;
		$.ajax({
			type: 'get',
			url: 'punish/getDSDonVi',
			async: false,
			dataType: 'json',
			success: function(data) {
				donvi = data;
			},
			error: function() {
				console.log('Error: Get Donvi!');
			}
		});
		return donvi;
	}

	// Open modal add muc phat
	$(document).on('click', '#open-modal-add-muc-phat', function() {
		var donvi = getDsDonVi();

		if(donvi.length > 0) {
			var content = '';		
			_.forEach(donvi, function(dv, key) {
				content += '<option value="'+dv.MADV+'">'+dv.TENDV+'</option>';
			});
			$("#add-donvi-mucphat").html(content);
		}
	});

	$("#add-mucphat-mucphat").val('1');
	$(document).on('keyup', "#add-mucphat-mucphat", function() {
		var md = $("#add-mucphat-mucphat").val();
		if(md > 1000) $("#add-mucphat-mucphat").val('1000');
		if(md < 1) $("#add-mucphat-mucphat").val('1');
		if(md.length == 0) $("#add-mucphat-mucphat").val('1');
	});

	// Add new muc phat
	$(document).on('click', '#add-mucphat', function() {
		var donvi, mucphat;
		donvi = $("#add-donvi-mucphat").val();
		mucphat = $("#add-mucphat-mucphat").val();
		console.log('data : ', _.concat([donvi, mucphat]));
		if($("#add-ten-mucphat").val() == '') {
			$("#add-ten-mucphat").parent().addClass('has-danger');
			$("#add-ten-mucphat").addClass('form-control-danger');
		}
		else {
			$("#add-ten-mucphat").parent().removeClass('has-danger');
      		$("#add-ten-mucphat").removeClass('form-control-danger');
      		var ten = $("#add-ten-mucphat").val();
      		$.ajax({
      			type: 'post',
      			url: 'punish/addMucPhat',
      			data: {
      				ten: ten,
      				mucdo: mucphat,
      				donvi: donvi
      			},
      			success: function(data) {
      				if(data != 'false') {
      					swal('Thành công!', 'Thêm mức phạt thành công!', 'success');
      					showMucPhat();
      					$("#add-ten-mucphat").val('');
      					$("#add-mucphat-mucphat").val('1');
      				}
      				else {
      					swal('Thành công!', 'Thêm mức phạt thành công!', 'success');
      				}
      			},
      			error: function() {
      				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'success');
      			}
      		});
		}
	});

	// Show danh sach muc phat
	function showMucPhat() {
		$.ajax({
			type: 'ajax',
			url: 'punish/showMucPhat',
			dataType: 'json',
			async: false,
			success: function(data) {
				var mucphat, donvi;
				mucphat = data.mucphat;
				donvi = data.donvi;
				console.log('data showMucPhat: ', _.concat(mucphat, donvi));
				var content = '';
				content += '<thead>';
				content += '<tr>';
				content += '<td>STT</td>';
				content += '<td>Tên</td>';
				content += '<td>Mức phạt</td>';
				content += '<td>Đơn vị</td>';
				content += '<td>Thao tác</td>';
				content += '</tr>';
				content += '</thead>';
				content += '<tbody>';
				if(mucphat.length > 0 || mucphat != 'false') {
					_.forEach(mucphat, function(mp, key) {
						content += '<tr>';
						content += '<td>'+(key+1)+'</td>';
						content += '<td>'+mp.TENMD+'</td>';
						content += '<td>'+mp.MUCDO+'</td>';
						content += '<td>'+_.find(donvi, {'MADV': mp.DONVI}).TENDV+'</td>';
						content += '<td><button class="btn btn-sm btn-outline-primary edit-mucphat" data="'+mp.MAMD+'">Sửa</button></td>';
						content += '</tr>';
					});
				}
				else {
					content += '<tr>Danh sách rỗng!</tr>';
				}
				content += '</tbody>';
				$("#danh-sach-muc-phat").html(content);
			},
			error: function() {
				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
			}
		});
	}

	// Show data muc phat to modal edit
	$(document).on('click', '.edit-mucphat', function() {
		$("#edit-ten-mucphat").parent().removeClass('has-danger');
		$("#edit-ten-mucphat").removeClass('form-control-danger');
		var id = $(this).attr('data');
		$('#modal-edit-mucphat').modal();
		$.ajax({
			type: 'post',
			url: 'punish/getMucPhat',
			async: false,
			data: {
				id: id
			},
			success: function(data) {
				if(data != 'false') {
					data = JSON.parse(data);
					var donvi = data.donvi;
					var mucphat = data.mucphat;
					console.log('data: ', data);

					// Set don vi
					if(donvi.length > 0) {
						var content = '';
						console.log('donvi: ', donvi);
						_.forEach(donvi, function(dv, key) {
							content += '<option value="'+dv.MADV+'">'+dv.TENDV+'</option>';
						});
						$("#edit-donvi-mucphat").html(content);
					}

					// Set thong tin muc phat
					$("#edit-ten-mucphat").val(data.mucphat.TENMD);
					$("#edit-donvi-mucphat").val(data.mucphat.DONVI);
					$("#edit-mucphat-mucphat").val(data.mucphat.MUCDO);
					$("#update-mucphat").attr('data', data.mucphat.MAMD);
				}
			},
			error: function() {
				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'error');
			}
		});
	});


	// Update Muc phat
	$(document).on('click', '#update-mucphat', function() {
		var id = $(this).attr('data');
		console.log('id: ', id);
		var ten, donvi, mucphat;
		ten = $("#edit-ten-mucphat").val();
		donvi = $("#edit-donvi-mucphat").val();

		// Set input max and min value for edit form
		$(document).on('keyup', "#edit-mucphat-mucphat", function() {
			var md = $("#edit-mucphat-mucphat").val();
			if(md > 1000) $("#edit-mucphat-mucphat").val('1000');
			if(md < 1) $("#edit-mucphat-mucphat").val('1');
			if(md.length == 0) $("#edit-mucphat-mucphat").val('1');
		});
		mucphat = $("#edit-mucphat-mucphat").val();

		if(ten != '') {
			$("#edit-ten-mucphat").parent().removeClass('has-danger');
      		$("#edit-ten-mucphat").removeClass('form-control-danger');

      		$.ajax({
      			type: 'post',
      			url: 'punish/updateMucPhat',
      			async: false,
      			data: {
      				id: id,
      				ten: ten,
      				donvi: donvi,
      				mucphat: mucphat
      			},
      			success: function(data) {
      				if(data != 'false') {
      					swal('Thành công!', 'Cập nhật thông tin mức phạt thành công!', 'success');
      					showMucPhat();
      				}
      				else {
      					swal('Thành công!', 'Cập nhật thông tin mức phạt thành công!', 'success');
      				}
      			},
      			error: function() {
      				swal('Lỗi!', 'Xảy ra lỗi, vui lòng kiểm tra lại!', 'success');
      			}
      		});
		}
		else {
			$("#edit-ten-mucphat").parent().addClass('has-danger');
			$("#edit-ten-mucphat").addClass('form-control-danger');
		}
	});

})(jQuery);