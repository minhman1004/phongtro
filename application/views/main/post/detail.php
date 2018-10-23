<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
      <div class="row">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <!-- Left side -->
        <div class="col-9">
          <!-- Hình ảnh, Tên bài đăng, giá tiền, địa chỉ -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="title-find">Kết quả tìm kiếm</h4>
              <p class="card-description">Địa chỉ</p>
              <p class="card-description">Giá</p>
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
                    <div class="col-md-5">
                      <p>Giá</p>
                      <p>Diện tích sử dụng</p>
                      <p>Diện tích đất</p>
                      <p>Ngày đăng</p>
                      <p>Mã BĐS</p>
                    </div>
                    <div class="col-md-7">
                      <p>10 Triệu</p>
                      <p>28m2</p>
                      <p>28m2</p>
                      <p>13/10/2018</p>
                      <p>abcsd</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p>Phòng ngủ</p>
                      <p>Nhà tắm</p>
                      <p>Pháp lý</p>
                      <p>Hướng</p>
                    </div>
                    <div class="col-md-7">
                      <p>Giá</p>
                      <p>Diện tích sử dụng</p>
                      <p>Diện tích đất</p>
                      <p>Ngày đăng</p>
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
                      <h4 class="mt-0">Why choose us?</h4>
                      <p>
                          Far curiosity incommode now led smallness allowance. Favour bed assure son things yet. She consisted 
                          consulted elsewhere happiness disposing household any old the. Widow downs you new shade drift hopes 
                          small. So otherwise commanded sweetness we improving. Instantly by daughters resembled unwilling principle 
                          so middleton.
                      </p>
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
                <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                  <h4>Contact us </h4>
                  <p>
                    Feel free to contact us if you have any questions!
                  </p>
                  <p>
                    <i class="mdi mdi-phone text-info"></i>
                    +123456789
                  </p>
                  <p>
                    <i class="mdi mdi-email-outline text-success"></i>
                    contactus@example.com
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Bản đồ -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="title-find">Tiện ích xung quanh</h4>
              <div class="map-container">
                <div id="map-with-marker" class="google-map"></div>
              </div>
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
                    <h6>Tên</h6>
                    <p class="text-muted">Loại thành viên</p>
                    <p class="mt-2 text-success font-weight-bold">Trạng thái</p>
                    <p class="text-muted">Điện thoại</p>
                    <button type="button" class="btn btn-primary btn-sm">Nhắn tin</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Thông tin tìm kiếm -->
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-reuslt">Loại bất động sản</h4>
                <ul class="right-side-list">
                  <!-- List here -->
                  <!-- --------------------------------------------------- -->
                  <!-- Start -->
                  <li>
                    <a href="index.html">
                      <span class="menu-title">Nhà</span>
                    </a>
                  </li>
                  <!-- End -->
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-reuslt">Các khu vực khác</h4>
                <ul class="right-side-list">
                  <!-- List here -->
                  <!-- --------------------------------------------------- -->
                  <!-- Start -->
                  <li>
                    <a href="index.html">
                      <span class="menu-title">Tp Hồ Chí Minh</span>
                    </a>
                  </li>
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

<!-- End Body Content -->
<!-- Start Footer -->