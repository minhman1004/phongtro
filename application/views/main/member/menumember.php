<nav class="sidebar sidebar-offcanvas"  id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>member/info">
        <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
        <span class="menu-title">Thông tin chung</span>
      </a>
    </li>
    <?php if($quyen != 2) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>member/forum">
          <i class="mdi mdi-forum-outline menu-icon"></i>
          <span class="menu-title">Forum</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>member/rooms">
          <i class="mdi mdi-home-account menu-icon"></i>
          <span class="menu-title">Quản lý nhà trọ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>member/payments">
          <i class="mdi mdi-progress-check menu-icon"></i>
          <span class="menu-title">Quản lý thanh toán</span>
        </a>
      </li>
    <?php } ?>
    <?php if($quyen != 2 && $quyen != 1) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>manage/dashboard">
          <i class="mdi mdi-arrow-right menu-icon"></i>
          <span class="menu-title">Trang quản trị</span>
        </a>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>">
        <i class="mdi mdi-arrow-left menu-icon"></i>
        <span class="menu-title">Quay lại trang chủ</span>
      </a>
    </li>
  </ul>
</nav>