<body>
  <form action="<?php echo base_url(); ?>register/index" method="post"> 
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
                <h6 class="font-weight-light"><?=$error_message?></h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="Tên tài khoản"  name ="username" placeholder="Tài khoản">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-sm" id="Email"  name ="email" placeholder="  Email">
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control form-control-sm" id="Số điện thoại" name ="sdt" placeholder="Số điện thoại">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm" id="Mật khẩu" name = "matkhau" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm" id="Nhập lại mật khẩu" name = "matkhaulai" placeholder="Nhập lại mật khẩu">
                  </div>
                     <div class="form-group">
                    <input type="password" class="form-control form-control-sm" id="Giới tính" name = "gioitinh" placeholder="Giới tính">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
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
</body>

