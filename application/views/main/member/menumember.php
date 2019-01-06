<nav class="sidebar sidebar-offcanvas"  id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>member/info">
        <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
        <span class="menu-title">Thông tin chung</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>member/posts">
        <i class="mdi mdi-book menu-icon"></i>
        <span class="menu-title">Bài viết miễn phí</span>
      </a>
    </li>
    <?php if(isset($mand) && $mand == 2) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>member/freepost">
          <i class="mdi mdi-book menu-icon"></i>
          <span class="menu-title">Bài viết của nhà trọ</span>
        </a>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>member/rooms">
        <i class="mdi mdi-home-circle menu-icon"></i>
        <span class="menu-title">Nhà trọ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>member/rentors">
        <i class="mdi mdi-home-circle menu-icon"></i>
        <span class="menu-title">Danh sách người trọ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#caidat" aria-expanded="false" aria-controls="e-commerce">
        <i class="mdi mdi-checkbox-multiple-marked-outline menu-icon"></i>
        <span class="menu-title">Thanh toán</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="caidat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>member/bills">Hóa đơn</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>member/price">Bảng chi phí</a></li>
        </ul>
      </div>
    </li>
    <?php if(!isset($mand) && $mand != null) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>manage/dashboard">
          <i class="mdi mdi-arrow-right menu-icon"></i>
          <span class="menu-title">Đến trang quản trị</span>
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