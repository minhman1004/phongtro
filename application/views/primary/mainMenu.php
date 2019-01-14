<!-- Main Menu -->
  <nav class="bottom-navbar">
      <div class="container">
        <ul class="nav page-navigation">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>post/publish">
              <span class="menu-title">Đăng tin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>forum/find">
              <span class="menu-title">Xem thông tin trọ</span>
            </a>
          </li>
          <?php if(!isset($mand) || $mand == null) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>login" class="nav-link">
                <span class="menu-title">Đăng nhập</span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
</div>