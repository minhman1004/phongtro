<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
      <form method="post">
        <div class="row">
          <!-- Left side -->
          <div class="col-9">
            <!-- Thông tin cơ bản -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Thông tin cơ bản</h4>
                <div class="form-group">
                  <label for="exampleInputUsername1">Tiêu đề tin</label>
                  <input type="text" name="tieude" class="form-control" id="tieu-de-tin-dang-tin" placeholder="Tiêu đề tin" required="required" value=<?='"'.$baiviet->TIEUDE.'"'?>>
                </div>

                <!-- Chuyên mục / Số điện thoại -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Chuyên mục tin</label>
                    <select class="form-control" name="chuyenmuc" id="chuyen-muc-tin-dang-tin">
                      <option>1</option>
                    </select>
                  </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Số điện thoại</label>
                      <input type="text" value=<?='"'.$baiviet->SDT.'"'?> class="form-control" id="so-dien-thoai-dang-tin" name="sdt">
                    </div>
                  </div>
                </div>

                <!-- Giá cho thuê / Đơn vị -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Giá cho thuê</label>
                      <input type="number" value=<?='"'.$baiviet->Gia.'"'?> class="form-control" id="gia-cho-thue-dang-tin" placeholder="Giá cho thuê" name="gia">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Đơn vị</label>
                    <select class="form-control" id="don-vi-dang-tin" name="donvi">
                      <option selected="selected" value="trieuthang">Triệu / Tháng</option>
                      <option value="nghinthang">Nghìn / Tháng</option>
                    </select>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Địa chỉ -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Địa chỉ</h4>
                <!-- Chọn địa chỉ -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Tỉnh/Thành phố</label>
                      <select class="form-control" id="tinh-thanh-pho-dang-tin" name="tinhtp">
                        <?php foreach(@$tinhtp as $tinhtp_update) {
                          if($tinhtp_update->MATTP == $baiviet->MATTP) { ?>
                            <option selected value=<?=$tinhtp_update->MATTP?>><?=$tinhtp_update->TEN?></option>
                          <?php } else { ?>
                            <option value=<?=$tinhtp_update->MATTP?>><?=$tinhtp_update->TEN?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Quận/Huyện</label>
                      <select class="form-control" id="quan-huyen-dang-tin" name="quanhuyen">
                        <?php foreach(@$quanhuyen as $quanhuyen_update) {
                          if($quanhuyen_update->MATTP == $baiviet->MATTP) {
                            if($quanhuyen_update->MAQH == $baiviet->MAQH) { ?>
                              <option selected value=<?=$quanhuyen_update->MAQH?>><?=$quanhuyen_update->TEN?></option>
                            <?php } else { ?>
                              <option value=<?=$quanhuyen_update->MAQH?>><?=$quanhuyen_update->TEN?></option>
                            <?php } ?> 
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Phường, Xã</label>
                      <select class="form-control" id="phuong-xa-dang-tin" name="phuongxa">
                        <?php foreach(@$phuongxa as $phuongxa_update) {
                          if($phuongxa_update->MAQH == $baiviet->MAQH) {
                            if($phuongxa_update->MAPX == $baiviet->MAPX) { ?>
                              <option selected value=<?=$phuongxa_update->MAPX?>><?=$phuongxa_update->TEN?></option>
                            <?php } else { ?>
                              <option value=<?=$phuongxa_update->MAPX?>><?=$phuongxa_update->TEN?></option>
                            <?php } ?>
                          <?php } ?>
                        <?php } ?>
                      </select>
                  </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Đường</label>
                      <select class="form-control" id="duong-dang-tin" name="duong">
                        <option value="non">Chọn Đường</option>
                        <?php foreach(@$diachitt as $duong_update) {
                          if($duong_update->MAPX == $baiviet->MAPX) {
                            if($duong_update->MAD == $baiviet->MAD) { ?>
                              <option selected value=<?=$duong_update->MAD?>><?=$duong_update->TEN?></option>
                            <?php } else { ?>
                              <option value=<?=$duong_update->MAD?>><?=$duong_update->TEN?></option>
                            <?php } ?>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Địa chỉ chính xác</label>
                  <input type="text" name="dctd" value=<?='"'.$baiviet->DCTD.'"'?> class="form-control" id="dia-chi-chinh-xac-dang-tin" placeholder="Địa chỉ chính xác" required="required">
                </div>
                <!-- Bản đồ -->
                <!-- <div class="map-container">
                  <div id="map-with-marker" class="google-map"></div>
                </div> -->
              </div>
            </div>

            <!-- Mô tả chi tiết -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Mô tả chi tiết</h4>
                <!-- Chọn địa chỉ -->
                <div class="form-group">
                  <label for="mo-ta-chi-tiet-dang-tin">Mô tả chi tiết</label>
                  <textarea class="form-control" id="mo-ta-chi-tiet-dang-tin" name="motathem" rows="10"><?=$baiviet->MOTATHEM?></textarea>
                </div>
              </div>
            </div>

            <!-- Hình ảnh -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title d-flex">Hình ảnh</h4>
                <div class="dropify-wrapper">
                  <div class="dropify-message">
                    <span class="file-icon"></span>
                    <p>Kéo thả hình ảnh hoặc click vào đây</p>
                    <p class="dropify-error">Có lỗi xảy ra, vui lòng thử lại.</p>
                  </div>
                  <div class="dropify-loader"></div>
                  <div class="dropify-errors-container">
                    <ul></ul>
                  </div>
                  <input type="file" class="dropify">
                  <button type="button" class="dropify-clear">Xóa</button>
                  <div class="dropify-preview">
                    <span class="dropify-render"></span>
                    <div class="dropify-infos">
                      <div class="dropify-infos-inner">
                        <p class="dropify-filename">
                          <span class="file-icon"></span> 
                          <span class="dropify-filename-inner"></span></p>
                          <p class="dropify-infos-message">Kéo thả hoặc click vào để thay thế</p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <!-- Hình thức đăng tin -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Hình thức đăng tin</h4>
                <hr>
                <!-- Bảng giá đăng tin -->
                <h5 class="card-title" id="title-find">Bảng giá</h5>
                <!-- Hình thức đăng tin -->
                <h5 class="card-title" id="title-find">Hình thức</h5>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Loại tin</label>
                      <select class="form-control" id="loai-tin-dang-tin" >
                        <option disabled="disabled" selected="selected">Chọn loại tin</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Gói thời gian</label>
                      <select class="form-control" id="goi-thoi-gian-dang-tin">
                        <option disabled="disabled" selected="selected">Chọn gói thời gian</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Số tháng</label>
                      <select class="form-control" id="so-thang-dang-tin">
                        <option disabled="disabled" selected="selected">Chọn số tháng</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Thông tin thanh toán -->
                <h5 class="card-title" id="title-find">Thông tin thanh toán</h5>
              </div>
            </div>

            <!-- Publish Button -->
            <div class="row" style="margin-left: 0">
              <button type="submit" name="capnhat" class="btn btn-primary mr-2">Cập nhật</button>
            </div>
          </div>


          <!-- Right Side -->
          <div class="col-3">
            <!-- Hướng dẫn đăng tin -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="title-reuslt">Hướng dẫn đăng tin</h4>
                  <ul class="right-side-list">
                    <!-- List here -->
                    <!-- --------------------------------------------------- -->
                    <!-- Start -->
                    <li>
                      <span>Thông tin có dấu (*) là bắt buộc.</span>
                    </li>
                    <li>
                      <span>Nội dung phải viết bằng tiếng Việt có dấu</span>
                    </li>
                    <li>
                      <span>Tiêu đề tin không dài quá 100 kí tự</span>
                    </li>
                    <!-- End -->
                  </ul>
                </div>
              </div>
            </div>

            <!-- Thông tin thanh toán -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="title-reuslt">Thông tin thanh toán</h4>
                  <!-- Thông tin thanh toán -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baiviet = <?php echo json_encode($baiviet)?>;
  var tinhtp = <?php echo json_encode($tinhtp) ?>;
  var quanhuyen = <?php echo json_encode($quanhuyen) ?>;
  var phuongxa = <?php echo json_encode($phuongxa) ?>;
  var diachitt = <?php echo json_encode($diachitt) ?>;
  console.log("baiviet: ", baiviet);
</script>
<script src="<?php echo base_url(); ?>assets/main/create_update.js"></script>