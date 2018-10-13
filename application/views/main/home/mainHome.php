<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-3">
        <input type="text" class="form-control" id="search-tukhoa-duong-quan-duan" maxlength="100" placeholder="Từ khóa, Đường, Quận, Dự án"></div>
        <div class="col-md-2">
          <select class="form-control" id="search-loai-bds">
            <option selected>Loại bất động sản</option>
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" id="search-tinh-thanh-pho">
            <option selected>Tỉnh/Thành phố</option>
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" id="search-quan-huyen">
            <option selected>Quận huyện</option>
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" id="search-gia-thue">
            <option selected>Giá</option>
          </select>
        </div>
        <div class="col-md-1" style="padding:0px !important">
          <button type="button" class="btn btn-primary">Tìm</button>
        </div>
      </div>
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
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="title-find">Kết quả tìm kiếm</h4>
              <!-- Result list here -->
              <div class="row">
                <div class="col-md-4">
                  <img class="thumnail" src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" alt="">
                  <p>Giá: </p>
                </div>
                <div class="col-md-8">
                  <h4>Tiêu đề</h4>
                  <p>Địa chỉ</p>
                  <p>Thông tin phòng</p>
                  <p>Mô tả</p>
                  <p>Ngày đăng</p>
                </div>
              </div>
              <hr>
              <!-- End post -->
            </div>
          </div>
          <!-- Phân trang -->
          <nav>
            <ul class="pagination rounded">
              <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
            </ul>
          </nav>
        </div>
        <div class="col-3">
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