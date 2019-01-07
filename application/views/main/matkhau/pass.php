   <form action="<?php echo base_url(); ?>matkhau" method="post"> 
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
                 <?php if(!empty($success_message)) { ?> 
                  <div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
                  <?php } ?>
                  <?php if(!empty($error_message)) { ?> 
                  <div style="color: red" class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
                  <?php } ?>
                  <p style="text-align: center; font-size:16px;font-family: Helvetica, Arial; margin-bottom: 25px"  class="font-weight-light" required>Thay đổi mật khẩu</p>
                  <form class="pt-3">
                    <div class="form-group">
                    <input type="password" class="form-control form-control-sm" autocomplete="off" required id="matkhaucu" name = "matkhaucu" placeholder="Mật khẩu cũ">
                  </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-sm"  autocomplete="off" required id="matkhau" name = "matkhau" placeholder="Mật khẩu mới" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-sm" autocomplete="off" required id="nhaplaimatkhau" name = "nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                  </div>                   
                  <div class="mt-3">
                      <button class="button btn btn-success btn-large" id="dangnhap">Lưu</button>
                      <button style="margin-left: 165px;" class="button btn btn-success btn-large" id="dangnhap"> <a  href="member/info" class="text-primary">Hủy</a>
                      </button>
                  </div>
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


