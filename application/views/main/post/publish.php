<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
      <div class="row">
        <!-- Left side -->
        <div class="col-9">
          <!-- Thông tin cơ bản -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="title-find">Thông tin cơ bản</h4>
              <div class="form-group">
                <label for="exampleInputUsername1">Tiêu đề tin</label>
                <input type="text" class="form-control" id="tieu-de-tin-dang-tin" placeholder="Tiêu đề tin" required="required">
              </div>

              <!-- Chuyên mục / Số điện thoại -->
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                  <label for="exampleFormControlSelect2">Chuyên mục tin</label>
                  <select class="form-control" id="chuyen-muc-tin-dang-tin">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="email" class="form-control" id="so-dien-thoai-dang-tin" placeholder="Số điện thoại">
                  </div>
                </div>
              </div>

              <!-- Giá cho thuê / Đơn vị -->
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá cho thuê</label>
                    <input type="number" class="form-control" id="gia-cho-thue-dang-tin" placeholder="Số điện thoại">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                  <label for="exampleFormControlSelect2">Đơn vị</label>
                  <select class="form-control" id="don-vi-dang-tin">
                    <option selected="selected">Triệu/Tháng</option>
                    <option>Nghìn/Tháng</option>
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
                    <select class="form-control" id="tinh-thanh-pho-dang-tin">
                      <?php foreach(@$tinhtp as $tinhtp_publish) { ?>
                        <option value=<?=$tinhtp_publish->MATTP?>><?=$tinhtp_publish->TEN?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Quận/Huyện</label>
                    <select required class="form-control" id="quan-huyen-dang-tin">
                      <?php foreach(@$quanhuyen as $quanhuyen_publish) {
                        if($quanhuyen_publish->MATTP == $tinhtp[0]->MATTP) { ?>
                          <option value=<?=$quanhuyen_publish->MAQH?>><?=$quanhuyen_publish->TEN?></option>
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
                    <select class="form-control" id="phuong-xa-dang-tin">
                      <?php foreach(@$phuongxa as $phuongxa_publish) {
                        if($phuongxa_publish->MAQH == $quanhuyen[0]->MAQH) { ?>
                          <option value=<?=$phuongxa_publish->MAPX?>><?=$phuongxa_publish->TEN?></option>
                        <?php } ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Đường</label>
                    <select class="form-control" id="duong-dang-tin">
                      <option value="non">Chọn Đường</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Địa chỉ chính xác</label>
                <input type="text" class="form-control" id="dia-chi-chinh-xac-dang-tin" placeholder="Địa chỉ chính xác" required="required">
              </div>
              <!-- Bản đồ -->
              <!-- <div class="map-container">
                <div id="map-with-marker" class="google-map"></div>
              </div> -->
            </div>
          </div>

          <!-- Thông tin nhà trọ -->
          <div class="card">
            <div class="card-body">
              <?php if($nhatro == false) { ?>
                <!-- Thêm nhà trọ mới nếu chưa có -->
                <h4 class="card-title" id="title-find">Nhà trọ</h4>
                <label for="">Bạn chưa có nhà trọ nào trong danh sách</label>
                <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Thông tin nhà trọ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="exampleInputUsername1">Tên nhà trọ</label>
                            <input type="text" class="form-control" id="ten-nha-tro-modal" placeholder="Tên nhà trọ" required="required">
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleFormControlSelect2">Tỉnh/Thành phố</label>
                                <select class="form-control" id="tinh-thanh-pho-modal">
                                  <?php foreach(@$tinhtp as $tinhtp_publish) { ?>
                                    <option value=<?=$tinhtp_publish->MATTP?>><?=$tinhtp_publish->TEN?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleFormControlSelect2">Quận/Huyện</label>
                                <select required class="form-control" id="quan-huyen-modal">
                                  <?php foreach(@$quanhuyen as $quanhuyen_publish) {
                                    if($quanhuyen_publish->MATTP == $tinhtp[0]->MATTP) { ?>
                                      <option value=<?=$quanhuyen_publish->MAQH?>><?=$quanhuyen_publish->TEN?></option>
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
                                <select class="form-control" id="phuong-xa-modal">
                                  <?php foreach(@$phuongxa as $phuongxa_publish) {
                                    if($phuongxa_publish->MAQH == $quanhuyen[0]->MAQH) { ?>
                                      <option value=<?=$phuongxa_publish->MAPX?>><?=$phuongxa_publish->TEN?></option>
                                    <?php } ?>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleFormControlSelect2">Đường</label>
                                <select class="form-control" id="duong-modal">
                                  <option value="non">Chọn Đường</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputUsername1">Địa chỉ chính xác</label>
                            <input type="text" class="form-control" id="dia-chi-chinh-xac-modal" placeholder="Địa chỉ chính xác" required="required">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="them-nha-tro-moi-modal">Thêm mới</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                      </div>
                    </div>
                  </div>
                </div>
                <button style="display: block" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@mdo">Thêm nhà trọ mới</button>
              <?php } else { ?>
              <!-- Chọn địa chỉ -->
                <div class="form-group">
                  <label for="">Chọn nhà trọ</label>
                  <select required class="form-control" id="nha-tro-dang-tin">
                    <option value="" required>Chọn nhà trọ</option>
                    <?php foreach(@$nhatro as $nhatro_publish) { ?>
                      <option value=<?=$nhatro_publish->MANT?>><?=$nhatro_publish->TENNT?> - <?=$nhatro_publish->DCTD?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Địa chỉ nhà trọ</label>
                  <input type="text" class="form-control" id="dia-chi-nha-tro" placeholder="Địa chỉ nhà trọ" required="required" disabled>
                </div>
              <?php } ?>
              <!-- Bản đồ -->
              <!-- <div class="map-container">
                <div id="map-with-marker_nha_tro" class="google-map"></div>
              </div> -->
            </div>
          </div>

          <!-- Mô tả chi tiết -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="title-find">Mô tả chi tiết</h4>
              <!-- Chọn địa chỉ -->
              <form class="forms-sample">
                <div class="form-group">
                  <label for="mo-ta-chi-tiet-dang-tin">Mô tả chi tiết</label>
                  <textarea class="form-control" id="mo-ta-chi-tiet-dang-tin" rows="10"></textarea>
                </div>
              </form>
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
                    <select class="form-control" id="loai-tin-dang-tin">
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
            <button type="submit" class="btn btn-primary mr-2">Đăng tin</button>
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
    </div>
  </div>
</div>
<script type="text/javascript">
  var tinhtp = <?php echo json_encode($tinhtp) ?>;
  var quanhuyen = <?php echo json_encode($quanhuyen) ?>;
  var phuongxa  = <?php echo json_encode($phuongxa) ?>;
  var diachitt = <?php echo json_encode($diachitt) ?>;
</script>
<script src="<?php echo base_url(); ?>assets/main/publish.js"></script>