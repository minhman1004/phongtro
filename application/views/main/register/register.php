<form action="<?php echo base_url(); ?>register" method="post"> 
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="logo">
                </div>
                <h6 class="font-weight-light">Vui lòng nhập đầy đủ và chính xác thông tin</h6>
                <h6></h6>
                  <?php if(!empty($success_message)) { ?> 
                  <div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
                  <?php } ?>
                  <?php if(!empty($error_message)) { ?> 
                  <div style="color: red" class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
                  <?php } ?>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="taikhoan" required autocomplete="off" name ="taikhoan" placeholder="Tài khoản">
                  </div>
                  <div class="form-group">
                    <input  type="email"  pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control form-control-sm" id="Email" required autocomplete="off" name ="Email"  placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input  class="form-control form-control-sm" id="SDT" autocomplete="off" required name ="SDT" placeholder="Số điện thoại" pattern="/^[0-9]{10}+$/"data-inputmask="'mask': '9999999999'" >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm"  autocomplete="off" required id="matkhau" name = "matkhau" placeholder="Mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm" autocomplete="off" required id="nhaplaimatkhau" name = "nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                  </div>
                  <div class="form-group">
                    <select name ="gioitinh" class="form-control form-control-sm">
                      <option value="Nam">Nam</option>
                      <option value="Nu">Nữ</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="date" class="form-control form-control-sm" required id="ngaysinh" name = "ngaysinh" placeholder="Ngày sinh">
                  </div>
                    <div class="form-group">
                    <select name ="chucvu" class="form-control form-control-sm">
                      <option value="1">Chủ nhà trọ</option>
                      <option value="2">Đăng tin miễn phí</option>
                      <option value="24">Người ở phòng trọ, nhà cho thuê</option>
                    </select>
                 </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input value="1" type="checkbox" class="form-check-input" name ="checkbox">
                        Tôi đồng ý với các điều khoản
                      </label>
                    </div>
                  </div>
                  <div class="mt-3">
                      <button style ="width: 120px" class="button btn btn-success btn-large" id="dangki">Đăng kí</button>
                      <button style ="margin-left:50px; width: 120px" type ="reset" class="button btn btn-success btn-large" id="dangki">Đặt lại </button>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                    Nếu đã có tài khoản, đăng nhập tại đây <a href="login" class="text-primary">Đăng nhập</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>
