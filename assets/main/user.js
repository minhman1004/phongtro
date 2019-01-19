(function($) {
'use strict';

  // Ajax update user
  $(document).on('click', '.update-item', function(e) {
    var id = $(this).attr('data');
    var email = $("#modal-email").val();
    var gioitinh = $("#modal-gioitinh").val();
    var chucvu = $("#modal-chucvu").val();
    var stt = $("td."+id).text();

    // Hoten
    if($("#modal-hoten").val()) {
      var hoten = $("#modal-hoten").val();
      $("#modal-hoten").parent().removeClass('has-danger');
      $("#modal-hoten").removeClass('form-control-danger');
    }
    else {
      $("#modal-hoten").parent().addClass('has-danger');
      $("#modal-hoten").addClass('form-control-danger');
    }
    // SDT Validate
    if($("#modal-sdt").inputmask('isComplete')) {
      var sdt = $("#modal-sdt").val();
      $("#modal-sdt").parent().removeClass('has-danger');
      $("#modal-sdt").removeClass('form-control-danger');
    }
    else {
      $("#modal-sdt").parent().addClass('has-danger');
      $("#modal-sdt").addClass('form-control-danger');
    }

    // CMND Validate
    if($("#modal-cmnd").inputmask('isComplete')) {
      var cmnd = $("#modal-cmnd").val();
      $("#modal-cmnd").parent().removeClass('has-danger');
      $("#modal-cmnd").removeClass('form-control-danger');
    }
    else {
      $("#modal-cmnd").parent().addClass('has-danger');
      $("#modal-cmnd").addClass('form-control-danger');
    }

    // Ngay sinh Validate
    if($("#modal-ngaysinh").inputmask('isComplete')) {
      var ngaysinh = $("#modal-ngaysinh").val().replace(/[/]/gi,'-').split('-').reverse().join('-');
      $("#modal-ngaysinh").parent().removeClass('has-danger');
      $("#modal-ngaysinh").removeClass('form-control-danger');
    }
    else {
      $("#modal-ngaysinh").parent().addClass('has-danger');
      $("#modal-ngaysinh").addClass('form-control-danger');
    }

    // Mat khau
    var matkhau = $("#modal-matkhau").val();
    var rematkhau = $("#modal-matkhau-retype").val();
    console.log('data update: ', _.concat([id, hoten, email, sdt, cmnd, ngaysinh, chucvu, gioitinh, matkhau]));
    // Ajax update user
    if($("#modal-sdt").inputmask('isComplete') && $("#modal-cmnd").inputmask('isComplete') && $("#modal-ngaysinh").inputmask('isComplete') && $("#modal-hoten").inputmask('isComplete')) {
      if(matkhau != '' || rematkhau != '') {
        if(matkhau == rematkhau) {
          $("#modal-matkhau").parent().removeClass('has-danger');
          $("#modal-matkhau").removeClass('form-control-danger');
          $("#modal-matkhau-retype").parent().removeClass('has-danger');
          $("#modal-matkhau-retype").removeClass('form-control-danger');
          
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
                $("#modal-cancel-edit").click();
                $(".modal-backdrop").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                loadRow(id, stt);
              }
              else {
                // Thường lỗi do dữ liệu không đổi mà vẫn cập nhật, lỗi bên SQL
                swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
                $("#modal-cancel-edit").click();
                $(".modal-backdrop").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
              }
            },
            error: function(e) {
              console.log(e);
            }
          });
        }
        // matkhau == rematkhau
        else {
          $("#modal-matkhau").parent().addClass('has-danger');
          $("#modal-matkhau").addClass('form-control-danger');
          $("#modal-matkhau-retype").parent().addClass('has-danger');
          $("#modal-matkhau-retype").addClass('form-control-danger');
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
            console.log('dataaaaa: ', data);
            if(data == 'true') {
              e.preventDefault();
              swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
              loadRow(id, stt);
              $("#modal-cancel-edit").click();
              $(".modal-backdrop").hide();
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
            }
            else {
              // Thường lỗi do dữ liệu không đổi mà vẫn cập nhật, lỗi bên SQL
              swal('Thành công!', 'Cập nhật thông tin tài khoản thành công!', 'success');
              $("#modal-cancel-edit").click();
              $(".modal-backdrop").hide();
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
            }
          },
          error: function(e) {
            console.log(e);
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
                  console.log('data: them user', data);
                }
              },
              error: function(e) {
                console.log(e);
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
      error: function(e) {
        console.log(e);
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
      error: function(e) {
       console.log(e);
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
              $("#modal-email").inputmask();
              $("#modal-sdt").inputmask();
              $("#modal-cmnd").inputmask();
              $("#modal-ngaysinh").inputmask();
            });
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  }

  $(document).on('keyup', '#search-name', function() {
    $(this).attr('maxLength', '30');
    var name = $(this).val();
    console.log('name: ', name);
  });


  $(document).on('click', '.xem-taikhoan', function() {
    var id = $(this).attr('id');
    $("#modal-edit-taikhoan").modal();
    $(".update-item").attr('data', id);
    console.log('ID: ', id);
    $.ajax({
      type: 'post',
      url: 'users/user',
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if(data != false) {
          console.log('data: ', data);
          var user = data.user;
          var chucvu = data.chucvu;
          $('#modal-hoten').val(user['HOTEN']);
          $('#modal-email').val(user['Email']);
          $('#modal-sdt').val(user['SDT']);
          $('#modal-gioitinh').val(user['GioiTinh']);
          $('#modal-cmnd').val(user['CMND']);
          $('#modal-ngaysinh').val(user['NgaySinh'].split('-').reverse().join('/'));
          $('#modal-tendn').val(user['TenDN']);

          $("#modal-matkhau").val('');
          $("#modal-matkhau-retype").val('');

          // Show chuc vu
          var content = '';
          _.forEach(chucvu, function(cv, key) {
            if(cv.MAVT == user.CHUCVU) {
              content += '<option value="'+cv.MAVT+'" selected>'+cv.TENVT+'</option>';
            }
            else {
              content += '<option value="'+cv.MAVT+'">'+cv.TENVT+'</option>';
            }
          });
          $('#modal-chucvu').html(content);
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  $(document).on('change', '#modal-chucvu', function() {
    console.log($(this).val());
  });

})(jQuery);