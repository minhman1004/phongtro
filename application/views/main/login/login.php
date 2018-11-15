  <body>
    <script type="text/javascript">
      $(function() {
        $("#dangnhap").click( function()
         {

           
         }
        );
      });
    </script>
    <form action="<?php echo base_url(); ?>login" method="post"> 
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
                  <?php
                        if(@$error) {
                        ?>
                        <div class="alert"><button type="button" class="close" data-dismiss="alert">×</button>Username hoặc password bị sai</div>
                        <?php } ?>
                  <h6 class="font-weight-light">Đăng nhập để tiếp tục.</h6>
                  <form class="pt-3">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" id="taikhoan" name = "taikhoan" placeholder="Tài khoản">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="matkhau" name ="matkhau" placeholder="Mật khẩu">
                    </div>
                    <div class="mt-3">
                      <button class="button btn btn-success btn-large" id="dangnhap">Đăng nhập</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input">
                          Giữ tôi đăng nhập
                        </label>
                      </div>
                      <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                    </div>
                    <div class="mb-2">
                      <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="mdi mdi-facebook mr-2"></i>Đăng nhập bằng Facebook
                      </button>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                      Nếu chưa có tài khoản hãy <a href="register" class="text-primary">Đăng ký</a>
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
</html>