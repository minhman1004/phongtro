<div class="main-panel">
  <div class="content-wrapper">
    <!-- Thống kê chung -->
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách chung cư / Nhà trọ</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" id="open-modal-add-nhatro" data-toggle="modal" data-target="#modal-add-nha-tro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
              <!-- Search -->
              <div class="form-group col-md-6">
                <select id="search-chungcu-nhatro" class="form-control form-control-md" style="width:100%"></select>
              </div>
              <button class="btn btn-sm btn-outline-primary" id="open-modal-search-nhatro" style="height: 43px;"><i class="mdi mdi-open-in-app"></i> Xem</button>

              <!-- Modal de them, cap nhat nha tro -->
              <div class="modal fade" id="modal-add-nha-tro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thông tin chung cư / nhà trọ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Tên</label>
                          <input type="text" maxlength="100" class="form-control form-control-sm add-ten-nhatro" id="add-ten-nhatro" placeholder="Nhập tên chung cư, nhà trọ ...">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Chủ sở hữu</label>
                          <select id="add-chu-chungcu-nhatro" class="form-control form-control-sm add-chu-chungcu-nhatro" style="width:100%">
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label>Tỉnh / Thành phố</label>
                          <select id="add-tinh-thanhpho" class="form-control form-control-sm add-tinh-thanhpho">
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Quận / Huyện</label>
                          <select id="add-quan-huyen" class="form-control form-control-sm add-quan-huyen"></select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Phường / Xã</label>
                          <select id="add-phuong-xa" class="form-control form-control-sm add-phuong-xa"></select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Đường</label>
                          <select id="add-duong" class="form-control form-control-sm add-duong">
                            <option value="null">Chọn đường</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label>Địa chỉ chính xác: gồm số nhà và thông tin khác</label>
                          <input type="text" maxlength="300" class="form-control form-control-sm add-diachi-chinhxac" id="add-diachi-chinhxac">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-lg-6 grid-margin">
                          <div class="map-container">
                            <div id="map-with-marker" class="google-map"></div>
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success add-nha-tro" id="add-nha-tro">Thêm</button>
                      <button type="button" class="btn btn-success update-nha-tro" id="update-nha-tro">Cập nhật</button>
                      <button type="button" class="btn btn-light" id="cancel-nha-tro" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal hien thi danh sach phong nha tro -->
              <div class="modal fade" id="modal-danhsach-phong" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thông tin chung cư / nhà trọ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Tên</label>
                          <input type="text" maxlength="100" class="form-control form-control-sm add-ten-nhatro" id="add-ten-nhatro" placeholder="Nhập tên chung cư, nhà trọ ...">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Chủ sở hữu</label>
                          <select id="add-chu-chungcu-nhatro" class="form-control form-control-sm add-chu-chungcu-nhatro" style="width:100%">
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label>Tỉnh / Thành phố</label>
                          <select id="add-tinh-thanhpho" class="form-control form-control-sm add-tinh-thanhpho">
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Quận / Huyện</label>
                          <select id="add-quan-huyen" class="form-control form-control-sm add-quan-huyen"></select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Phường / Xã</label>
                          <select id="add-phuong-xa" class="form-control form-control-sm add-phuong-xa"></select>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Đường</label>
                          <select id="add-duong" class="form-control form-control-sm add-duong">
                            <option value="null">Chọn đường</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label>Địa chỉ chính xác: gồm số nhà và thông tin khác</label>
                          <input type="text" maxlength="300" class="form-control form-control-sm add-diachi-chinhxac" id="add-diachi-chinhxac">
                        </div>
                      </div>                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success add-nha-tro" id="add-nha-tro">Thêm</button>
                      <button type="button" class="btn btn-success update-nha-tro" id="update-nha-tro">Cập nhật</button>
                      <button type="button" class="btn btn-light" id="cancel-nha-tro" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table mt-3 border-top" id="danh-sach-nha-tro">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Chủ sở hữu</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($nhatro)) {
                    $count = 1;
                    foreach($nhatro as $nhatro_s) { ?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$nhatro_s->TENNT?></td>
                        <td>
                          <?php foreach($chutro as $chutro_f) {
                            if($chutro_f->MAND == $nhatro_s->MAND) {
                              echo $chutro_f->HOTEN;
                            }
                          }?>
                        </td>
                        <td title="<?=$nhatro_s->DCTD?>"><?=substr($nhatro_s->DCTD, 0, 50)?></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary edit-nhatro" data="<?=$nhatro_s->MANT?>">Xem</button>
                          <button class="btn btn-sm btn-outline-primary xemphong-nhatro" data="<?=$nhatro_s->MANT?>">DS Phòng</button>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/main/rooms.js"></script>
  <script src="<?php echo base_url(); ?>assets/main/rooms2.js"></script>