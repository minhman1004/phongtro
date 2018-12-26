<body>
  <div class="container-scroller">
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="nav-top flex-grow-1">
              <div class="container d-flex flex-row h-100 align-items-center">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="/phongtro/"><img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="/phongtro/"><img src="<?php echo base_url(); ?>assets/images/logo-mini.svg" alt="logo"/></a>
                </div>
                <!-- Menu -->
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end flex-grow-1">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline mx-0"></i>
                                <span class="count"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <a class="dropdown-item">
                                    <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                                    </p>
                                    <span class="badge badge-pill badge-warning float-right">View all</span>
                                </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                    <i class="mdi mdi-information mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">Application Error</h6>
                                    <p class="font-weight-light small-text">
                                    Just now
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">Settings</h6>
                                    <p class="font-weight-light small-text">
                                    Private message
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-account-box mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">New user registration</h6>
                                    <p class="font-weight-light small-text">
                                    2 days ago
                                    </p>
                                </div>
                            </a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email-outline mx-0"></i>
                                <span class="count"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                <div class="dropdown-item">
                                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                                </p>
                                <span class="badge badge-info badge-pill float-right">View all</span>
                                </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?php echo base_url(); ?>assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                                        <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                                    </h6>
                                    <p class="font-weight-light small-text">
                                    The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?php echo base_url(); ?>assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                                    </h6>
                                    <p class="font-weight-light small-text">
                                    New product launch
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                              <div class="preview-thumbnail">
                                  <img src="<?php echo base_url(); ?>assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                              </div>
                              <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                                  <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                                </h6>
                                <p class="font-weight-light small-text">
                                  Upcoming board meeting
                                </p>
                              </div>
                            </a>
                          </div>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?php echo base_url(); ?>assets/images/faces/face5.jpg" alt="profile"/>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                              <i class="mdi mdi-settings text-primary"></i>
                              Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
                              <i class="mdi mdi-logout text-primary"></i>
                              Logout
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url('matkhau'); ?>">
                              <i class="mdi mdi-logout text-primary"></i>
                              Đổi mật khẩu
                            </a>
                          </div>
                        </li>
                        <li class="nav-item nav-settings d-none d-lg-block">
                          <a class="nav-link" href="#">
                            <i class="mdi mdi-apps"></i>
                          </a>
                        </li>
                    </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </div>
            </div>
          </nav>
          <!-- End Top Main Menu -->
          <!-- Start Search Form -->