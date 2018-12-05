(function($) {
'use strict';
  
  // Ajax update user
  $(document).on('click', '.update-item', function() {
    var id = $(this).attr('data');
    var hoten = $("#hoten-all-"+id).val();
    var email = $("#email-all-"+id).val();
    var gioitinh = $("#gioitinh-all-"+id).val();
    var chucvu = $("#chucvu-all-"+id).val();
    // SDT Validate
    if($("#sdt-all-"+id).inputmask('isComplete')) {
      var sdt = $("#sdt-all-"+id).val();
      $("#sdt-all-"+id).parent().removeClass('has-danger');
      $("#sdt-all-"+id).removeClass('form-control-danger');
    }
    else {
      $("#sdt-all-"+id).parent().addClass('has-danger');
      $("#sdt-all-"+id).addClass('form-control-danger');
    }

    // CMND Validate
    if($("#cmnd-all-"+id).inputmask('isComplete')) {
      var cmnd = $("#cmnd-all-"+id).val();
      $("#cmnd-all-"+id).parent().removeClass('has-danger');
      $("#cmnd-all-"+id).removeClass('form-control-danger');
    }
    else {
      $("#cmnd-all-"+id).parent().addClass('has-danger');
      $("#cmnd-all-"+id).addClass('form-control-danger');
    }

    // Ngay sinh Validate
    if($("#ngaysinh-all-"+id).inputmask('isComplete')) {
      var ngaysinh = $("#ngaysinh-all-"+id).val().replace(/[/]/gi,'-').split('-').reverse().join('-');
      $("#ngaysinh-all-"+id).parent().removeClass('has-danger');
      $("#ngaysinh-all-"+id).removeClass('form-control-danger');
    }
    else {
      $("#ngaysinh-all-"+id).parent().addClass('has-danger');
      $("#ngaysinh-all-"+id).addClass('form-control-danger');
    }

    // Ajax update user
    if($("#sdt-all-"+id).inputmask('isComplete') && $("#cmnd-all-"+id).inputmask('isComplete') && $("#ngaysinh-all-"+id).inputmask('isComplete')) {
      $.ajax({
        type: 'post',
        url: 'users/updateUser',
        data: {
          id: id,
          hoten: hoten,
          email: email,
          sdt: sdt,
          cmnd: cmnd,
          ngaysinh: ngaysinh,
          chucvu: chucvu,
          gioitinh: gioitinh
        },
        success: function(data) {
          if(data == 'true') {
            swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
            $("#all-"+id).click();
            $(".modal-backdrop").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            showUser();
          }
          else {
            // Thường lỗi do dữ liệu không đổi mà vẫn cập nhật, lỗi bên SQL
            swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
            $("#all-"+id).click();
            $(".modal-backdrop").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          }
        },
        error: function() {
          swal('Lỗi!', 'Có lỗi xảy ra, vui lòng kiểm tra lại!', 'error');
        }
      });
    }
  });

  function showUser() {
    $.ajax({
      type: 'ajax',
      url: 'users/showUser',
      async: false,
      dataType: 'json',
      success: function(data) {
        if(data) {
          var chucvu = data.chucvu;
          var users = data.users;
          // console.log("chucvu: ", chucvu);
          // console.log("users: ", users);

          var content = '';
          content += '<thead>';
          content += '<tr>';
          content += '<th>STT</th>';
          content += '<th class="sortStyle">Tên<i class="mdi mdi-chevron-down"></i></th>';
          content += '<th class="sortStyle">Email<i class="mdi mdi-chevron-down"></i></th>';
          content += '<th class="sortStyle">SĐT<i class="mdi mdi-chevron-down"></i></th>';
          content += '<th class="sortStyle">Chức vụ<i class="mdi mdi-chevron-down"></i></th>';
          content += '<th class="sortStyle">Thao tác<i class="mdi mdi-chevron-down"></i></th>';
          content += '</tr>';
          content += '</thead>';

          if(users.length == 0) {
            content += '<tbody>';
            content += '<tr>';
            content += '<td>Không có tài khoản nào trong danh sách</td>';
            content += '</tr>';
            content += '</tbody>';
          }
          else {
            content += '<tbody>';
            _.forEach(users, function(user, key) {
              content += '<tr>';
              content += '<td>'+(key+1)+'</td>';
              content += '<td>'+user.HOTEN+'</td>';
              content += '<td>'+user.Email+'</td>';
              content += '<td>'+user.SDT+'</td>';
              var tenchucvu = user.CHUCVU != null ? _.find(chucvu, {'MAVT':user.CHUCVU}).TENVT : 'Chưa có';
              content += '<td>'+tenchucvu+'</td>';
              content += '<td>';
              content += '<div class="btn-group">';
              content += '<button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#'+user.MAND+'-all">Xem</button>';
              content += '<button class="btn btn-sm btn-outline-danger">Cấm</button>';
              content += '<div class="modal fade" id="'+user.MAND+'-all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
              content += '<div class="modal-dialog modal-lg" role="document">';
              content += '<div class="modal-content">';
              content += '<div class="modal-header">';
              content += '<h5 class="modal-title" id="exampleModalLabel">Thông tin</h5>';
              content += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
              content += '<span aria-hidden="true">&times;</span>';
              content += '</button>';
              content += '</div>';
              content += '<div class="modal-body">';
              content += '<div class="row">';
              content += '<div class="col-4">';
              content += '<div class="form-group">';
              content += '<label>Họ Tên</label>';
              content += '<input type="text" maxlength="30" class="form-control form-control-sm" placeholder="Họ tên" id="hoten-all-'+user.MAND+'" aria-label="Họ tên" value="'+user.HOTEN+'">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-4">';
              content += '<div class="form-group">';
              content += '<label>Email</label>';
              content += '<input type="text" id="email-all-'+user.MAND+'" class="form-control form-control-sm" placeholder="Email" aria-label="Email" value="'+user.Email+'">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-4">';
              content += '<div class="form-group">';
              content += '<label>Số điện thoại</label>';
              content += '<input id="sdt-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'mask\': \'9999999999\'" value="'+user.SDT+'">';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '<div class="row">';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label for="chucvu">Giới tính</label>';
              content += '<select class="form-control" id="gioitinh-all-'+user.MAND+'">';
              if(user.GioiTinh == 'Nam') {
                content += '<option value="Nam" selected>Nam</option>';
                content += '<option value="Nữ">Nữ</option>';
              }
              else {
                content += '<option value="Nam">Nam</option>';
                content += '<option value="Nữ" selected>Nữ</option>';
              }
              content += '</select>';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label>Số CMND</label>';
              content += '<input id="cmnd-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'alias\': \'cmnd\'" value="'+user.CMND+'">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-3">';
              content += '<div class="form-group">';
              content += '<label for="chucvu">Chức vụ</label>';
              content += '<select class="form-control" id="chucvu-all-'+user.MAND+'">';
              _.forEach(chucvu, function(cv, key) {
                if(user.CHUCVU != null) {
                  if(cv.MAVT == user.CHUCVU) {
                    content += '<option value="'+cv.MAVT+'" selected>'+cv.TENVT+'</option>';
                  }
                  else {
                    content += '<option value="'+cv.MAVT+'">'+cv.TENVT+'</option>';
                  }
                }
                else {
                  content += '<option value="'+cv.MAVT+'">'+cv.TENVT+'</option>';
                }
              });
              content += '</select>';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-3">';
              content += '<div class="form-group">';
              content += '<label>Ngày sinh</label>';
              var ngaysinh = user.NgaySinh.split('-').reverse().join('/');
              console.log("ngaysinh: ", ngaysinh);
              content += '<input id="ngaysinh-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'alias\': \'date\'" value="'+ngaysinh+'">';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '<div class="modal-footer">';
              content += '<button type="button" class="btn btn-sm btn-success update-item" data="'+user.MAND+'">Cập nhật</button>';
              content += '<button type="button" class="btn btn-sm btn-light" id="'+user.MAND+'" data-dismiss="modal">Hủy</button>';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '</td>';
              content += '</tr>';
            });
            content += '</tbody>';
          }
            $("#all-users-table").html(content);
            $("#all-users-table").tablesort();
        }
      },
      error: function() {
        swal('Error', 'Errorrrrrrrrrr', 'warning');
        var content = '';
        content += '<thead>';
        content += '<tr>';
        content += '<th>STT</th>';
        content += '<th class="sortStyle">Tên<i class="mdi mdi-chevron-down"></i></th>';
        content += '<th class="sortStyle">Email<i class="mdi mdi-chevron-down"></i></th>';
        content += '<th class="sortStyle">SĐT<i class="mdi mdi-chevron-down"></i></th>';
        content += '<th class="sortStyle">Chức vụ<i class="mdi mdi-chevron-down"></i></th>';
        content += '<th class="sortStyle">Thao tác<i class="mdi mdi-chevron-down"></i></th>';
        content += '</tr>';
        content += '</thead>';
        content += '<tbody>';
        content += '<tr>';
        content += '<td>Không có tài khoản nào trong danh sách</td>';
        content += '</tr>';
        content += '</tbody>';
        $("#all-users-table").html(content);
      }
    });
  }

})(jQuery);