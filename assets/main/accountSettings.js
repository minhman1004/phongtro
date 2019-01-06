(function($) {
  'use strict';

  	// Add vai tro
  	$("#add-chucvu-button").click(function() {
		var ten = $("#add-chucvu-ten").val();
		var trangthai = $("#add-chucvu-trang-thai").val();
		var mota = $("#add-chucvu-mota").val();
		var phanloai = $("#add-chucvu-phan-loai").val();
		if(ten == '') {
			swal("Lỗi!", "Vui lòng nhập đầy đủ thông tin", "error");
		}
		else {
			$.ajax({
			  type:"post",
			  url:"account/addaccount",
			  data: {
			    ten: ten,
			    mota: mota,
			    trangthai: trangthai
			  },
			  success: function(data) {
			  	console.log('result: ', data);
  				if(data == 'ten') {
  					swal("Lỗi!", "Đã có '" + ten + "' trong danh sách, hãy chọn một tên khác!", "warning");
  				}
  				else {
				  	if(data != false) {
					    swal("Thành công!", "Thêm loại tài khoản thành công!", "success");
					    $("#dismiss-button").click();
					    showChucVu();
				  	}
				  	else {
				    	swal("Lỗi!", "Có lỗi xảy ra, vui lòng kiểm tra lại!", "error");
				  	}
				}
			  },
			  error: function() {
			    swal("Lỗi!", "Có lỗi xảy ra, vui lòng kiểm tra lại 2!", "error");
			  }
			});
		}
	});


  	// Update vai tro
  	$(document).on('click', '.update-item', function() {
  		console.log("clicked");
  		// Lay id, gia tri input, select
  		var id = $(this).attr('data');
  		var ten = $("#ten-update-"+id).val();
  		var trangthai = $("#trangthai-update-"+id).val();
  		var mota = $("#mota-update-"+id).val();
  		var phanloai = $("#phan-loai-update-"+id).val();
  		console.log("id: ", id);
  		console.log("ten: ", ten);
  		console.log("trangthai: ", trangthai);
  		console.log("mota: ", mota);
  		if(ten == '') {
  			swal("Lỗi!", "Vui lòng nhập đầy đủ thông tin", "error");
  		}
  		else {
  			$.ajax({
	  			type: 'post',
	  			url: 'account/updateaccount',
	  			data: {
	  				id: id,
	  				ten: ten,
	  				mota: mota,
	  				trangthai: trangthai,
	  				phanloai, phanloai
	  			},
	  			success: function(data) {
	  				console.log('result: ', data);
  					if(data != false) {
	  					swal("Thành công!", "Cập nhật loại tài khoản thành công!", "success");
					    $("#"+id).click();
					    $(".modal-backdrop").modal('hide');
					    $('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
					    showChucVu();
	  				}
	  				else {
			    		swal("Thành công!", "Cập nhật loại tài khoản thành công!", "success");
					    $("#"+id).click();
					    $(".modal-backdrop").modal('hide');
					    $('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
			  		}
	  			},
	  			error: function() {
	  				swal("Lỗi!", "Có lỗi xảy ra, vui lòng kiểm tra lại 2!", "error");
	  			}
	  		});
  		}
  	});

  	// Hàm lấy dữ liệu Loại tài khoản khi thêm mới hoặc chỉnh sửa xong
	function showChucVu() {
	  	$.ajax({
	  		type: 'ajax',
	  		url: 'account/showChucVu',
	  		async: false,
	  		dataType: 'json',
	  		success: function(data) {
	  			var content = '';
				content += '<thead>';
				content += '<tr>';
		        content += '<th class="sortStyle">Tên <i class="mdi mdi-chevron-down"></th>';
		        content += '<th class="sortStyle">Mô tả <i class="mdi mdi-chevron-down"></th>';
		        content += '<th class="sortStyle">Trạng thái <i class="mdi mdi-chevron-down"></th>';
		        content += '<th>Thao tác</th>';
		        content += '</tr>';
		        content += '</thead>';
	  			if(data.length == 0 || data == false) {
	                content += '<tbody>';
	                content += '<tr><td>Không có chức vụ nào trong danh sách.</td></tr>';
	                content += '</tbody>';
	  			}
	  			else {
	  				content += '<tbody>';
		  			_.forEach(data, function(chucvu, key) {
		  				var trangthai = chucvu.TRANGTHAI == 0 ? 'Hiển thị' : 'Ẩn';
		  				content += '<tr>';
	                    content += '<td>'+chucvu.MAVT+' - '+chucvu.TENVT+'</td>';
	                    content += '<td>'+chucvu.MOTA+'</td>';
	                    content += '<td>'+trangthai+'</td>';
	                    content += '<td>';
	                    content += '<div class="btn-group">';
	                    content += '<button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#ten-modal-'+chucvu.MAVT+'">Sửa</button>';
	                    content += '</div>';
						content += '<div class="modal fade" id="ten-modal-'+chucvu.MAVT+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
						content += '<div class="modal-dialog modal-sm" role="document">';
						content += '<div class="modal-content">';
						content += '<div class="modal-header">';
						content += '<h5 class="modal-title" id="exampleModalLabel">Cập nhật loại tài khoản</h5>';
						content += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
						content += '<span aria-hidden="true">&times;</span>';
						content += '</button>';
						content += '</div>';
						content += '<div class="modal-body">';
						content += '<div class="form-group">';
						content += '<label>Tên</label>';
						content += '<input type="text" id="ten-update-'+chucvu.MAVT+'" value="'+chucvu.TENVT+'" class="form-control form-control-sm" placeholder="Tên">';
						content += '</div>';
						content += '<div class="form-group">';
						content += '<label>Mô tả</label>';
						content += '<input type="text" id="mota-update-'+chucvu.MAVT+'" value="'+chucvu.MOTA+'" class="form-control form-control-sm" placeholder="Mô tả">';
						content += '</div>';
						content += '<div class="form-group">';
						content += '<label for="chucvu">Phân loại</label>';
						content += '<select class="form-control" id="phan-loai-update-'+chucvu.MAVT+'">';
						if(chucvu.PL == 'admin') {
							content += '<option value="admin" selected>Admin</option>';
							content += '<option value="user">User</option>';
						}
						else {
							if(chucvu.PL == 'user') {
								content += '<option value="admin">Admin</option>';
								content += '<option value="user" selected>User</option>';
							}
							else {
								content += '<option value="admin" selected>Admin</option>';
								content += '<option value="user">User</option>';
							}
						}
						content += '</select>';
						content += '<label for="chucvu">Trang thái</label>';
						content += '<select class="form-control" id="trangthai-update-'+chucvu.MAVT+'">';
						if(chucvu.TRANGTHAI == 0) {
							content += '<option value="0" selected>Hiển thị</option>';
							content += '<option value="1">Ẩn</option>';
						}
						else {
							content += '<option value="0">Hiển thị</option>';
							content += '<option value="1" selected>Ẩn</option>';
						}
						content += '</select>';
						content += '</div>';
						content += '</div>';
						content += '<div class="modal-footer">';
						content += '<button type="button" class="btn btn-sm btn-success update-item" data="'+chucvu.MAVT+'">Cập nhật</button>';
						content += '<button type="button" class="btn btn-sm btn-light dismiss-update" id="'+chucvu.MAVT+'" data-dismiss="modal">Hủy</button>';
						content += '</div>';
						content += '</div>';
						content += '</div>';
						content += '</div>';
						content += '</td>';
						content += '</tr>';
		  			});
	  				content += '</tbody>';
	  			}
	  			$("#chucvu-danh-sach").html(content);
      			$('#chucvu-danh-sach').tablesort();
	  		},
	  		error: function() {
	  			var content = '';
				content += '<thead>';
				content += '<tr>';
		        content += '<th>Tên</th>';
		        content += '<th>Mô tả</th>';
		        content += '<th>Trạng thái</th>';
		        content += '<th>Thao tác</th>';
		        content += '</tr>';
		        content += '</thead>';
	            content += '<tbody>';
	            content += '<tr><td>Có lỗi xảy ra.</td></tr>';
	            content += '</tbody>';
	  			$("#chucvu-danh-sach").html(content);
	  		}
	  	});
	}

})(jQuery);