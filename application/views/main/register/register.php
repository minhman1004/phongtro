<body>
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
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Tài khoản">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Số điện thoại">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu">
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
                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="./">Đăng ký</a>
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
</body>
</html>
