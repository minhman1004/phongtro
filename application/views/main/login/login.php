   <form action="<?php echo base_url(); ?>login" method="post"> 
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="main-panel">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo">
                    Nhà Trọ Việt
                  </div>
                  <?php
                        if(@$error) { // bien view data @error la sai ten dang nhap
                        ?>
                        <div class="alert"><button type="button" class="close" data-dismiss="alert">×</button>Tên tài khoản hoặc mật khẩu bị sai</div>
                        <?php } ?>
                  <h6 class="font-weight-light">Đăng nhập để tiếp tục.</h6>
                  <form class="pt-3">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" id="taikhoan" required name = "taikhoan" placeholder="Tài khoản">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="matkhau" required name ="matkhau" placeholder="Mật khẩu">
                    </div>
                    <div class="mt-3">
                      <button class="button btn btn-success btn-large" id="dangnhap">Đăng nhập</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                      <a href="matkhau" class="auth-link text-black">Quên mật khẩu?</a>
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