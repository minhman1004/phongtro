<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Loại tin</label>
            <select class="form-control" id="search-loai-tin">
              <option value="all" selected>Tất cả</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tỉnh / TP</label>
            <select class="form-control" id="search-tinh-thanh-pho">
              <option value="all" selected>Tất cả</option>
              <?php foreach($tinhtp as $tinhtp_select) { ?>
                <option value=<?=$tinhtp_select->MATTP?>><?=$tinhtp_select->TEN?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Quận, huyện</label>
            <select class="form-control" id="search-quan-huyen">
              <option value="all" selected>Tất cả</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Phường, xã</label>
            <select class="form-control" id="search-phuong-xa">
              <option value="all" selected>Tất cả</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Mức giá</label>
            <select class="form-control" id="search-gia-thue">
              <option value="all" selected>Tất cả</option>
            </select>
          </div>
        </div>
        <div class="col-md-1" style="padding:0px !important">
          <div class="form-group">
          <button type="button" style="margin-top: 22px;" class="btn btn-primary">Tìm</button>
          </div>
        </div>
      </div>
      <?php if(isset($tentinh)) { ?>
        <div class="row">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Khu vực: <?=$tentinh->TEN?></li>
              <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            </ol>
          </nav>
        </div>
      <?php } ?>
      <div class="row">
        <!-- Left side -->
        <div class="col-9">
          <div class="card">
            <div class="card-body">
              <?php if(!@$baiviet) { ?>
                <h4 class="card-title" id="search-danh-sach-bai-viet">Không có kết quả nào</h4>
              <?php } else { ?>
                <h4 class="card-title" id="search-danh-sach-bai-viet">Kết quả tìm kiếm</h4>
                <!-- Result list here -->
                <div id="danh-sach-bai-viet">
                  <?php foreach($baiviet as $ketqua_baiviet) { ?>
                    <a href="<?php echo base_url(); ?><?='post/detail?name='.$ketqua_baiviet->slug?>">
                      <div class="row">
                        <div class="col-md-4">
                          <img class="thumnail" src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" alt="">
                          <p>Giá: <?=$ketqua_baiviet->Gia?></p>
                        </div>
                        <div class="col-md-8">
                          <h4><?=$ketqua_baiviet->TIEUDE?></h4>
                          <p>Địa chỉ: <?=$ketqua_baiviet->DCTD?></p>
                          <p>Tình trạng: <?=$ketqua_baiviet->GhiChu?></p>
                          <p>Mô tả: <?=$ketqua_baiviet->MOTATHEM?></p>
                          <p>Ngày đăng: <?php echo date_format(new Datetime($ketqua_baiviet->TGDANG), 'd/m/Y'); ?></p>
                        </div>
                      </div>
                    </a>
                    <hr>
                  <?php } ?>
                </div>
              <?php } ?>
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
                <h4 class="card-title" id="title-reuslt">Các khu vực khác</h4>
                <ul class="right-side-list">
                  <!-- List here -->
                  <!-- --------------------------------------------------- -->
                  <?php foreach($tinhtp as $tinhtp_right_side) { ?>
                    <li>
                      <a href=<?="/phongtro/".$page."/location/".$tinhtp_right_side->MATTP?>>
                        <span class="menu-title"><?=$tinhtp_right_side->TEN?></span>
                        <!-- Lệnh lấy nội dung phải được viết liền <?=$tinhtp->TEN?> -->
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

<!-- Gán biến PHP cho hàm javascript -->
<script type="text/javascript">
  var tinhtp = <?php echo json_encode($tinhtp) ?>;
  var quanhuyen = <?php echo json_encode($quanhuyen) ?>;
  var phuongxa = <?php echo json_encode($phuongxa) ?>;
  var baiviet = <?php echo json_encode($baiviet) ?>;
  console.log("baiviet: ", baiviet);
</script>
<!-- Khai báo javascript cho từng trang riêng -->
<script src="<?php echo base_url(); ?>assets/main/home.js"></script>