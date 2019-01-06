(function($) {
'use strict';
  
  $(document).on('click', '.xem-taikhoan', function() {
    var id = $(this).attr('id');
    console.log('ID: ', id);
    $.ajax({
      type: 'post',
      url: 'users/user',
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if(data != 'false') {
          // console.log('data: ', data);
          $('#hoten-all-'+id).val(data['HOTEN']);
          $('#email-all-'+id).val(data['Email']);
          $('#sdt-all-'+id).val(data['SDT']);
          $('#gioitinh-all-'+id).val(data['GioiTinh']);
          $('#cmnd-all-'+id).val(data['CMND']);
          $('#chucvu-all-'+id).val(data['CHUCVU']);
          $('#ngaysinh-all-'+id).val(data['NgaySinh'].split('-').reverse().join('/'));
          $('#tendn-all-'+id).val(data['TenDN']);
        }
      },
      error: function() {
        console.log('error');
      }
    });
  });

  // Ajax update user
  $(document).on('click', '.update-item', function(e) {
    var id = $(this).attr('data');
    var email = $("#email-all-"+id).val();
    var gioitinh = $("#gioitinh-all-"+id).val();
    var chucvu = $("#chucvu-all-"+id).val();
    var stt = $("td."+id).text();

    // Hoten
    if($("#hoten-all-"+id).val()) {
      var hoten = $("#hoten-all-"+id).val();
      $("#hoten-all-"+id).parent().removeClass('has-danger');
      $("#hoten-all-"+id).removeClass('form-control-danger');
    }
    else {
      $("#hoten-all-"+id).parent().addClass('has-danger');
      $("#hoten-all-"+id).addClass('form-control-danger');
    }
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

    // Mat khau
    var matkhau = $("#matkhau-all-"+id).val();
    var rematkhau = $("#matkhau-all-retype-"+id).val();

    // Ajax update user
    if($("#sdt-all-"+id).inputmask('isComplete') && $("#cmnd-all-"+id).inputmask('isComplete') && $("#ngaysinh-all-"+id).inputmask('isComplete') && $("#hoten-all-"+id).inputmask('isComplete')) {
      if(matkhau != '' && rematkhau != '') {
        if(matkhau == rematkhau) {
          $("#matkhau-all-"+id).parent().removeClass('has-danger');
          $("#matkhau-all-"+id).removeClass('form-control-danger');
          $("#matkhau-all-retype-"+id).parent().removeClass('has-danger');
          $("#matkhau-all-retype-"+id).removeClass('form-control-danger');
          
          console.log('with password: ', matkhau);
          $.ajax({
            type: 'post',
            url: 'users/updateUserPass',
            data: {
              id: id,
              hoten: hoten,
              email: email,
              sdt: sdt,
              cmnd: cmnd,
              ngaysinh: ngaysinh,
              chucvu: chucvu,
              gioitinh: gioitinh,
              matkhau: matkhau
            },
            success: function(data) {
              if(data == 'true') {
                e.preventDefault();
                swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
                $("#all-"+id).click();
                $(".modal-backdrop").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                loadRow(id, stt);
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
        // matkhau == rematkhau
        else {
          $("#matkhau-all-"+id).parent().addClass('has-danger');
          $("#matkhau-all-"+id).addClass('form-control-danger');
          $("#matkhau-all-retype-"+id).parent().addClass('has-danger');
          $("#matkhau-all-retype-"+id).addClass('form-control-danger');
          swal('Lỗi mật khẩu!', 'Mật khẩu không trùng nhau, vui lòng nhập lại!', 'warning');
        }
      }
      else {
        console.log('not password: ', matkhau);
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
            console.log('dataaaaa');
            if(data == 'true') {
              e.preventDefault();
              swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
              loadRow(id, stt);
              $("#all-"+id).click();
              $(".modal-backdrop").hide();
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
            }
            else {
              // Thường lỗi do dữ liệu không đổi mà vẫn cập nhật, lỗi bên SQL
              swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
              $("#all-"+id).click();
              $(".modal-backdrop").hide();
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
            }
          },
          error: function() {
            swal('Lỗi!', 'Có lỗi xảy ra, vui lòng kiểm tra lại!', 'error');
          }
        });
      }
    }
  });

  // Add user
  $(document).on('click', '#add-user-button', function() {
    // Get data
    var hoten, email, sdt, gioitinh, cmnd, chucvu, ngaysinh, tendn, matkhau, rematkhau;
    chucvu = $("#add-chucvu").val();
    gioitinh = $("#add-gioitinh").val();
    // Ho ten
    if($("#add-hoten").val()) {
      hoten = $("#add-hoten").val();
      $("#add-hoten").parent().removeClass('has-danger');
      $("#add-hoten").removeClass('form-control-danger');
    }
    else {
      $("#add-hoten").parent().addClass('has-danger');
      $("#add-hoten").addClass('form-control-danger');
    }
    // Email
    if($("#add-email").inputmask('isComplete')) {
      email = $("#add-email").val();
      $("#add-email").parent().removeClass('has-danger');
      $("#add-email").removeClass('form-control-danger');
    }
    else {
      $("#add-email").parent().addClass('has-danger');
      $("#add-email").addClass('form-control-danger');
    }
    // SDT
    if($("#add-sdt").inputmask('isComplete')) {
      sdt = $("#add-sdt").val();
      $("#add-sdt").parent().removeClass('has-danger');
      $("#add-sdt").removeClass('form-control-danger');
    }
    else {
      $("#add-sdt").parent().addClass('has-danger');
      $("#add-sdt").addClass('form-control-danger');
    }
    // CMND
    if($("#add-cmnd").inputmask('isComplete')) {
      cmnd = $("#add-cmnd").val();
      $("#add-cmnd").parent().removeClass('has-danger');
      $("#add-cmnd").removeClass('form-control-danger');
    }
    else {
      $("#add-cmnd").parent().addClass('has-danger');
      $("#add-cmnd").addClass('form-control-danger');
    }
    // Ngay sinh
    if($("#add-ngaysinh").inputmask('isComplete')) {
      ngaysinh = $("#add-ngaysinh").val().split('/').reverse().join('-');
      $("#add-ngaysinh").parent().removeClass('has-danger');
      $("#add-ngaysinh").removeClass('form-control-danger');
    }
    else {
      $("#add-ngaysinh").parent().addClass('has-danger');
      $("#add-ngaysinh").addClass('form-control-danger');
    }
    // Ten dang nhap
    if($("#add-tendn").val()) {
      tendn = $("#add-tendn").val().replace(/\s/g, '');
      $("#add-tendn").parent().removeClass('has-danger');
      $("#add-tendn").removeClass('form-control-danger');
    }
    else {
      $("#add-tendn").parent().addClass('has-danger');
      $("#add-tendn").addClass('form-control-danger');
    }
    // Mat khau
    if($("#add-matkhau").val()) {
      matkhau = $("#add-matkhau").val();
      $("#add-matkhau").parent().removeClass('has-danger');
      $("#add-matkhau").removeClass('form-control-danger');
    }
    else {
      $("#add-matkhau").parent().addClass('has-danger');
      $("#add-matkhau").addClass('form-control-danger');
    }
    // Nhap lai mat khau
    if($("#add-matkhau-re").val()) {
      rematkhau = $("#add-matkhau-re").val();
      $("#add-matkhau-re").parent().removeClass('has-danger');
      $("#add-matkhau-re").removeClass('form-control-danger');
    }
    else {
      $("#add-matkhau-re").parent().addClass('has-danger');
      $("#add-matkhau-re").addClass('form-control-danger');
    }
    var data = _.concat(hoten, email, sdt, gioitinh, cmnd, chucvu, ngaysinh, tendn);
    if(data.length == _.compact(data).length) {
      // https://lodash.com/docs/4.17.11#compact
      if(checkTenDN(tendn) == 'true') {
        $("#add-tendn").parent().removeClass('has-danger');
        $("#add-tendn").removeClass('form-control-danger');
        if((!_.isUndefined(matkhau) && !_.isUndefined(rematkhau))) {
          if(matkhau == rematkhau) {
            $("#add-matkhau").parent().removeClass('has-danger');
            $("#add-matkhau").removeClass('form-control-danger');
            $("#add-matkhau-re").parent().removeClass('has-danger');
            $("#add-matkhau-re").removeClass('form-control-danger');
            $.ajax({
              type: 'post',
              async: false,
              url: 'users/addUser',
              data: {
                hoten: hoten,
                email: email,
                sdt: sdt,
                gioitinh: gioitinh,
                cmnd: cmnd,
                chucvu: chucvu,
                ngaysinh: ngaysinh,
                tendn: tendn,
                matkhau: matkhau
              },
              success: function(data) {
                if(data == 'true') {
                  swal('Thành công!', 'Thêm tài khoản mới thành công!', 'success');
                  $("#add-user-cancel-button").click();
                  showUser();
                }
                else {
                  swal('Lỗi', 'Xảy ra lỗi khi thêm tài khoản mới, vui lòng kiểm tra lại!', 'error');
                }
              },
              error: function() {
                swal('Lỗi', 'Xảy ra lỗi khi thêm tài khoản mới, vui lòng kiểm tra lại2!', 'error');
              }
            });
          }
          // matkhau == rematkhau
          else {
            $("#add-matkhau").parent().addClass('has-danger');
            $("#add-matkhau").addClass('form-control-danger');
            $("#add-matkhau-re").parent().addClass('has-danger');
            $("#add-matkhau-re").addClass('form-control-danger');
            swal('Lỗi mật khẩu!', 'Mật khẩu không trùng nhau, vui lòng nhập lại!', 'warning');
          }
        }
      }
      // checkTenDN
      else {
        $("#add-tendn").parent().addClass('has-danger');
        $("#add-tendn").addClass('form-control-danger');
        swal('Lỗi tài khoản!', 'Tài khoản đã tồn tại, vui lòng chọn tài khoản khác!', 'warning');
      }
      console.log('ookay');
    }
    // data.length
    else {
      console.log('not okay');
    }
  });

  // Filter all
  $(document).on('click', '#filter-all', function() {
    // showUser();
    $("tr.22").show();
    $("tr.21").show();
    $("tr.23").show();
    $("tr.25").show();
    $("tr.24").show();
    $("tr.1").show();
    $("tr.2").show();
    $(this).css({'background-color':'#282f3a', 'color' : '#ffffff'});
    $('#filter-normal').css({'background-color':'', 'color' : ''});
    $('#filter-admin').css({'background-color':'', 'color' : ''});
    $('#filter-banned').css({'background-color':'', 'color' : ''});
  });

  // Filter for normal users
  $(document).on('click', '#filter-normal', function(){
    // showUser();
    // Hide admin
    $("tr.22").hide();
    $("tr.21").hide();
    $("tr.23").hide();

    // Hide rentor
    $("tr.25").hide();
    $("tr.24").hide();
    // Show other
    $("tr.1").show();
    $("tr.2").show();
    $(this).css({'background-color':'#282f3a', 'color' : '#ffffff'});
    $('#filter-admin').css({'background-color':'', 'color' : ''});
    $('#filter-banned').css({'background-color':'', 'color' : ''});
    $('#filter-all').css({'background-color':'', 'color' : ''});
  });

  // Filter Admin user
  $(document).on('click', '#filter-admin', function() {
    // showUser();
    // Show admin
    $("tr.22").show();
    $("tr.21").show();
    $("tr.23").show();

    // Hide others
    $("tr.1").hide();
    $("tr.2").hide();
    $("tr.24").hide();
    $("tr.25").hide();
    $(this).css({'background-color':'#282f3a', 'color' : '#ffffff'});
    $('#filter-normal').css({'background-color':'', 'color' : ''});
    $('#filter-banned').css({'background-color':'', 'color' : ''});
    $('#filter-all').css({'background-color':'', 'color' : ''});
  });

  // Filter banned
  $(document).on('click', '#filter-banned', function() {
    // showUser();
    // Show admin
    $("tr.22").hide();
    $("tr.21").hide();
    $("tr.23").hide();

    // Hide others
    $("tr.1").hide();
    $("tr.2").hide();
    $("tr.24").hide();
    $("tr.25").hide();
    $(this).css({'background-color':'#282f3a', 'color' : '#ffffff'});
    $('#filter-normal').css({'background-color':'', 'color' : ''});
    $('#filter-admin').css({'background-color':'', 'color' : ''});
    $('#filter-all').css({'background-color':'', 'color' : ''});
  });

  // Kiem tra ten dang nhap
  function checkTenDN(tendn) {
    var rs;
    $.ajax({
      type: 'post',
      url: 'users/checkTenDN',
      async: false,
      data: {
        tendn : tendn
      },
      success: function(data) {
        rs = data;
      },
      error: function() {
        return 'error';
      }
    });
    return rs;
  }


  // Load only updated row
  function loadRow(id, stt) {
    $.ajax({
      type: 'post',
      url: 'users/loadRow',
      async: false,
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        console.log('data user: ', data);
        if(data) {
          var chucvu = data.chucvu;
          var user = data.user;

          var content = '';

          content += '<td class="'+user.MAND+'">'+stt+'</td>';
          content += '<td>'+user.HOTEN+'</td>';
          content += '<td>'+user.Email+'</td>';
          content += '<td>'+user.SDT+'</td>';
          var tenchucvu = user.CHUCVU != null ? _.find(chucvu, {'MAVT':user.CHUCVU}).TENVT : 'Chưa có';
          content += '<td>'+tenchucvu+'</td>';
          content += '<td>';
          content += '<div class="btn-group">';
          content += '<button class="btn btn-sm btn-outline-info xem-taikhoan" data-toggle="modal" id="'+user.MAND+'" data-target="#'+user.MAND+'-all">Xem</button>';
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
          content += '<input type="text" maxlength="30" class="form-control form-control-sm" placeholder="Họ tên" id="hoten-all-'+user.MAND+'" aria-label="Họ tên">';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-4">';
          content += '<div class="form-group">';
          content += '<label>Email</label>';
          content += '<input type="text" id="email-all-'+user.MAND+'" class="form-control form-control-sm" placeholder="Email" aria-label="Email">';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-4">';
          content += '<div class="form-group">';
          content += '<label>Số điện thoại</label>';
          content += '<input id="sdt-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'mask\': \'9999999999\'">';
          content += '</div>';
          content += '</div>';
          content += '</div>';
          content += '<div class="row">';
          content += '<div class="col-2">';
          content += '<div class="form-group">';
          content += '<label for="chucvu">Giới tính</label>';
          content += '<select class="form-control" id="gioitinh-all-'+user.MAND+'">';
          content += '<option value="nam">Nam</option>';
          content += '<option value="nu">Nữ</option>';
          content += '</select>';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-2">';
          content += '<div class="form-group">';
          content += '<label>Số CMND</label>';
          content += '<input id="cmnd-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'alias\': \'cmnd\'">';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-3">';
          content += '<div class="form-group">';
          content += '<label for="chucvu">Chức vụ</label>';
          content += '<select class="form-control" id="chucvu-all-'+user.MAND+'">';
          _.forEach(chucvu, function(cv, key) {
            content += '<option value="'+cv.MAVT+'">'+cv.TENVT+'</option>';
          });
          content += '</select>';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-3">';
          content += '<div class="form-group">';
          content += '<label>Ngày sinh</label>';
          content += '<input id="ngaysinh-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'alias\': \'date\'">';
          content += '</div>';
          content += '</div>';
          content += '</div>';
          content += '<div class="row">';
          content += '<div class="col-2">';
          content += '<div class="form-group">';
          content += '<label>Tài khoản</label>';
          content += '<input id="tendn-all-'+user.MAND+'" class="form-control form-control-sm" placeholder="Tài khoản" disabled>';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-2">';
          content += '<div class="form-group">';
          content += '<label>Mật khẩu</label>';
          content += '<input placeholder="Mật khẩu" type="password" id="matkhau-all-'+user.MAND+'" class="form-control form-control-sm" maxlength="25">';
          content += '</div>';
          content += '</div>';
          content += '<div class="col-2">';
          content += '<div class="form-group">';
          content += '<label>Nhập lại mật khẩu</label>';
          content += '<input placeholder="Nhập lại mật khẩu" type="password" id="matkhau-all-retype-'+user.MAND+'" class="form-control form-control-sm" maxlength="25">';
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
          $("tr#"+id).html(content);
          $("tr#"+id).removeClass();
          $("tr#"+id).addClass(user.CHUCVU);
        }
      },
      error: function() {
        console.log('error');
      }
    });
  }

  // Load all users
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
              content += '<tr class="'+user.CHUCVU+'">';
              content += '<td class="'+user.MAND+'">'+(key+1)+'</td>';
              content += '<td>'+user.HOTEN+'</td>';
              content += '<td>'+user.Email+'</td>';
              content += '<td>'+user.SDT+'</td>';
              var tenchucvu = user.CHUCVU != null ? _.find(chucvu, {'MAVT':user.CHUCVU}).TENVT : 'Chưa có';
              content += '<td>'+tenchucvu+'</td>';
              content += '<td>';
              content += '<div class="btn-group">';
              content += '<button class="btn btn-sm btn-outline-info xem-taikhoan" data-toggle="modal" id="'+user.MAND+'" data-target="#'+user.MAND+'-all">Xem</button>';
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
              content += '<input type="text" maxlength="30" class="form-control form-control-sm" placeholder="Họ tên" id="hoten-all-'+user.MAND+'" aria-label="Họ tên">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-4">';
              content += '<div class="form-group">';
              content += '<label>Email</label>';
              content += '<input type="text" id="email-all-'+user.MAND+'" class="form-control form-control-sm" placeholder="Email" aria-label="Email">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-4">';
              content += '<div class="form-group">';
              content += '<label>Số điện thoại</label>';
              content += '<input id="sdt-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'mask\': \'9999999999\'">';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '<div class="row">';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label for="chucvu">Giới tính</label>';
              content += '<select class="form-control" id="gioitinh-all-'+user.MAND+'">';
              content += '<option value="nam">Nam</option>';
              content += '<option value="nu">Nữ</option>';
              content += '</select>';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label>Số CMND</label>';
              content += '<input id="cmnd-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'alias\': \'cmnd\'">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-3">';
              content += '<div class="form-group">';
              content += '<label for="chucvu">Chức vụ</label>';
              content += '<select class="form-control" id="chucvu-all-'+user.MAND+'">';
              _.forEach(chucvu, function(cv, key) {
                content += '<option value="'+cv.MAVT+'">'+cv.TENVT+'</option>'; 
              });
              content += '</select>';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-3">';
              content += '<div class="form-group">';
              content += '<label>Ngày sinh</label>';
              content += '<input id="ngaysinh-all-'+user.MAND+'" class="form-control form-control-sm" data-inputmask="\'alias\': \'date\'">';
              content += '</div>';
              content += '</div>';
              content += '</div>';
              content += '<div class="row">';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label>Tài khoản</label>';
              content += '<input id="tendn-all-'+user.MAND+'" class="form-control form-control-sm" placeholder="Tài khoản" disabled>';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label>Mật khẩu</label>';
              content += '<input placeholder="Mật khẩu" type="password" id="matkhau-all-'+user.MAND+'" class="form-control form-control-sm" maxlength="25">';
              content += '</div>';
              content += '</div>';
              content += '<div class="col-2">';
              content += '<div class="form-group">';
              content += '<label>Nhập lại mật khẩu</label>';
              content += '<input placeholder="Nhập lại mật khẩu" type="password" id="matkhau-all-retype" class="form-control form-control-sm" maxlength="25">';
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
            _.forEach(users, function(user, key) {
              $("#email-all-"+user.MAND).inputmask();
              $("#sdt-all-"+user.MAND).inputmask();
              $("#cmnd-all-"+user.MAND).inputmask();
              $("#ngaysinh-all-"+user.MAND).inputmask();
            });
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

  $(document).on('keyup', '#search-name', function() {
    $(this).attr('maxLength', '30');
    var name = $(this).val();
    console.log('name: ', name);
  });

})(jQuery);