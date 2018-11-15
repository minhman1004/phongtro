<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
        <div class="row">
          <!-- Left side -->
          <div class="col-9">
            <!-- Hình ảnh, Tên bài đăng, giá tiền, địa chỉ -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="detail-ten-bai-viet"><?php echo $chitiet[0]->TIEUDE?>
                  <a href="<?php echo base_url(); ?><?="post/update?name=".$slug?>" style="font-size: 12px;"> [Chỉnh sửa]</a>
                </h4>
                <p class="card-description">Địa chỉ: <?=$chitiet[0]->DCTD?></p>
                <p class="card-description">Giá: <?=$chitiet[0]->Gia?></p>
                <div class="row" id="detail-post">
                  <img class="thumnail" src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" alt="">
                </div>
              </div>
            </div>
            <!-- Thông tin chung -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Thông tin chính</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5" style="text-align: right;">
                        <p>Giá</p>
                        <p>Diện tích</p>
                        <p>Ngày đăng</p>
                        <p>Camera</p>
                      </div>
                      <div class="col-md-7">
                        <p><?=$chitiet[0]->Gia?></p>
                        <p><?=$chitiet[0]->DienTich?> m2</p>
                        <p><?=date_format(new Datetime($chitiet[0]->TGDANG), 'd/m/Y')?></p>
                        <p>Có</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5" style="text-align: right;">
                        <p>Số người tối đa</p>
                        <p>Đang ở</p>
                        <p>Bảo vệ</p>
                        <p>Yêu cầu giới tính</p>
                      </div>
                      <div class="col-md-7">
                        <p><?=$chitiet[0]->SLTD?> người</p>
                        <p><?=$chitiet[0]->SLNDO?> người</p>
                        <p>Có</p>
                        <p>Tất cả</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Mô tả chi tiết -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Nội dung chi tiết</h4>

                <!-- Tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Chi tiết</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Đánh giá</a>
                  </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                    <div class="media">
                      <div class="media-body">
                        <p><?=$chitiet[0]->MOTATHEM?></p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="media">
                      <div class="media-body">                      
                        <ul class="right-side-list">
                          <!-- Danh sách các đánh giá -->
                        </ul>
                        <textarea style="margin-bottom: 2%" class="form-control" id="exampleTextarea1" rows="4" placeholder="Nội dung"></textarea>
                        <input style="margin-bottom: 2%" type="text" class="form-control" id="exampleInputUsername1" placeholder="Tên">
                        <button type="button" class="btn btn-outline-primary btn-fw">Gửi</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Bản đồ -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Tiện ích xung quanh</h4>
                <!-- <div class="map-container">
                  <div id="map-with-marker" class="google-map"></div>
                </div> -->
              </div>
            </div>

            <!-- Tin liên quan -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Kết quả tương tự</h4>
                <div class="row" id="related-post">
                  <!-- Nội dung tại đây -->
                </div>
              </div>
            </div>
          </div>

          <!-- Right Side -->
          <div class="col-3">
            <!-- Thông tin người đăng -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row flex-wrap">
                    <img src="../../../../images/faces/face11.jpg" class="img-lg rounded" alt="profile image">
                    <div class="ml-3">
                      <h6><?=$chitiet[0]->Ten?></h6>
                      <p class="text-muted"><?=$chitiet[0]->CHUCVU?></p>
                      <p class="mt-2 text-success font-weight-bold">Trạng thái</p>
                      <p class="text-muted"><?=$chitiet[0]->SDT?></p>
                      <button type="button" class="btn btn-primary btn-sm">Nhắn tin</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Khu vực tìm kiếm khác -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="title-reuslt">Các khu vực khác</h4>
                  <ul class="right-side-list">
                    <!-- List here -->
                    <!-- --------------------------------------------------- -->
                    <?php foreach($tinhtp as $tinhtp_right_side) { ?>
                      <li>
                        <a href=<?="/phongtro/home/location/".$tinhtp_right_side->MATTP?>>
                        <span class="menu-title"><?=$tinhtp_right_side->TEN?></span>
                      </a>
                      </li>
                    <?php } ?>
                    <!-- End -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baiviet = <?php echo json_encode($chitiet)?>;
  var slug = <?php echo json_encode($slug)?>;
  console.log("baiviet: ", baiviet);
  console.log("baiviet: ", slug);
</script>
<!-- End Body Content -->
<!-- Start Footer -->