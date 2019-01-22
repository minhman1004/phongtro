<nav class="sidebar sidebar-offcanvas"  id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>forum/find">
        <i class="mdi mdi-account-search-outline menu-icon"></i>
        <span class="menu-title">Tìm kiếm</span>
      </a>
    </li>
    <li class="nav-item" id="nhatro-dango">
      <a class="nav-link" href="<?php echo base_url()?>forum/current">
        <i class="mdi mdi-home-circle menu-icon"></i>
        <span class="menu-title">Nhà trọ</span>
      </a>
    </li>
    <li class="nav-item" id="thongtin-thanhtoan">
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
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>">
        <i class="mdi mdi-arrow-left menu-icon"></i>
        <span class="menu-title">Thoát</span>
      </a>
    </li>
  </ul>
</nav>
<script>
  $(document).ready(function() {
    var nguoio = JSON.parse(localStorage.getItem('fr_nguoio'));
    console.log('menu: ', nguoio);
    if(_.isUndefined(nguoio) || nguoio == null) {
      $("#nhatro-dango").attr('hidden', true);
      $("#nhatro-tungo").attr('hidden', true);
      $("#thongtin-thanhtoan").attr('hidden', true);
    }
    else {
      $("#nhatro-dango").attr('hidden', false);
      $("#nhatro-tungo").attr('hidden', false);
      $("#thongtin-thanhtoan").attr('hidden', false);
    }
  });
</script>
<style>
  .null-nguoio {
    pointer-events: none;
    cursor: not-allowed;
  }
  .nguoio {
    pointer-events: auto;
  }
</style>