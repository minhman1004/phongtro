<nav class="sidebar sidebar-offcanvas"  id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/dashboard">
        <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
        <span class="menu-title">Thống kê</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/users">
        <i class="mdi mdi-account-box-outline menu-icon"></i>
        <span class="menu-title">Người dùng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/posts">
        <i class="mdi mdi-book menu-icon"></i>
        <span class="menu-title">Bài viết</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/rooms">
        <i class="mdi mdi-home-circle menu-icon"></i>
        <span class="menu-title">Nhà trọ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/payments">
        <i class="mdi mdi-checkbox-multiple-marked-outline menu-icon"></i>
        <span class="menu-title">Thanh toán</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#dulieuchung" aria-expanded="false" aria-controls="e-commerce">
        <i class="mdi mdi-database-search menu-icon"></i>
        <span class="menu-title">Dữ liệu chung</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="dulieuchung">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/general/location">Khu vực</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/general/price">Bảng giá</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/general/extension">Tiện ích khu vực</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/general/posttype">Loại tin</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#caidat" aria-expanded="false" aria-controls="e-commerce">
        <i class="mdi mdi-settings-outline menu-icon"></i>
        <span class="menu-title">Cài đặt</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="caidat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/settings/decent">Phân quyền</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/settings/account">Loại tài khoản</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/settings/service">Dịch vụ</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>manage/settings/punish">Quy định lỗi</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/gallery">
        <i class="mdi mdi-image-filter menu-icon"></i>
        <span class="menu-title">Thư viện</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>manage/others">
        <i class="mdi mdi-menu menu-icon"></i>
        <span class="menu-title">Danh mục khác</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>">
        <i class="mdi mdi-arrow-left menu-icon"></i>
        <span class="menu-title">Quay lại trang chủ</span>
      </a>
    </li>
  </ul>
</nav>