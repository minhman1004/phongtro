<body>
  <div class="container-scroller">
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="nav-top flex-grow-1">
              <div class="container d-flex flex-row h-100 align-items-center">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="/phongtro/">Nhà Trọ Việt</a>
                    <a class="navbar-brand brand-logo-mini" href="/phongtro/"><img src="<?php echo base_url(); ?>assets/images/logo-mini.svg" alt="logo"/></a>
                </div>
                <!-- Menu -->
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end flex-grow-1">
                <?php if(isset($mand) && $mand != null) { ?>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"><?=$hoten?>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            <?php if($chucvu == 'admin') { ?>
                              <a class="dropdown-item" href="<?php echo base_url('manage/dashboard'); ?>">
                                <i class="mdi mdi-apps text-primary"></i>
                                Trang quản trị
                              </a>
                            <?php } ?>
                            <a class="dropdown-item" href="<?php echo base_url('member/info'); ?>">
                              <i class="mdi mdi-account text-primary"></i>
                              Trang cá nhân
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
                              <i class="mdi mdi-logout text-primary"></i>
                              Đăng xuất
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url('matkhau'); ?>">
                              <i class="mdi mdi-key-variant text-primary"></i>
                              Đổi mật khẩu
                            </a>
                          </div>
                        </li>
                    </ul>
                  <?php }?>
                </div>
              </div>
            </div>
          </nav>
          <!-- End Top Main Menu -->
          <!-- Start Search Form -->