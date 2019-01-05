<div class="main-panel">
  <div class="content-wrapper">
    <?php if($nhatro_t != null || $nhatro_s != null) { ?>
      <div class="row grid-margin">
          <div class="col-12">
            <?php
              if($nhatro_t != null) { ?>
                <button class="btn btn-sm btn-outline-warning btn-rounded previous-button" onclick="window.location.replace('../detail/<?=$nhatro_t->MANT?>')"><i class="mdi mdi-arrow-left"></i> <?=$nhatro_t->TENNT?></button>
            <?php } ?>
            <?php
              if($nhatro_s != null) { ?>
                <button class="btn btn-sm ml-auto btn-outline-warning btn-rounded next-button" onclick="window.location.replace('../detail/<?=$nhatro_s->MANT?>')"><?=$nhatro_s->TENNT?> <i class="mdi mdi-arrow-right"></i></button>
            <?php } ?>
          </div>
      </div>
    <?php } ?>
    <div class="row grid-margin">
      <!-- Danh sach phong tro -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$nhatro[0]->TENNT?></h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" id="open-modal-add-phongtro" data-toggle="modal" data-target="#modal-add-phongtro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm
              </button>
              <!-- Modal xem, sua thong tin -->
              <div class="modal fade" id="modal-add-phongtro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm phòng trọ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label>Tên phòng</label>
                          <input type="text" maxlength="100" class="form-control form-control-sm ten-phongtro" id="ten-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Diện tích (m<sup>2</sup>)</label>
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm dientich-phongtro" id="dientich-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Số người ở tối đa (10)</label>
                          <input type="number" min="1" max="10" class="form-control form-control-sm nguoio-phongtro" id="nguoio-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Tiền trọ (nghìn đồng)</label>
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm tientro-phongtro" id="tientro-phongtro">
                        </div>
                        <div class="form-group">
                          <label>Tính theo</label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="cachtinh-phongtro" id="cachtinh-daunguoi" value="daunguoi" checked>Đầu người
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="cachtinh-phongtro" id="cachtinh-codinh" value="codinh">Cố định
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label>Mô tả</label>
                          <textarea maxlength="500" class="form-control mota-phongtro" id="mota-phongtro" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-8" id="danhsach-nguoio">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success add-phongtro" data="<?=$nhatro[0]->MANT?>">Thêm</button>
                      <button type="button" class="btn btn-light cancel-add" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex table-responsive">
              <!-- Modal thong tin phong tro -->
              <div class="modal fade" id="modal-xem-phongtro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thông tin phòng trọ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label>Tên phòng</label>
                          <input type="text" maxlength="100" class="form-control form-control-sm ten-phongtro" id="xem-ten-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Diện tích (m<sup>2</sup>)</label>
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm dientich-phongtro" id="xem-dientich-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Số người ở tối đa (10)</label>
                          <input type="number" min="1" max="10" class="form-control form-control-sm nguoio-phongtro" id="xem-nguoio-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Số người đang ở</label>
                          <input type="number" disabled min="1" max="10" class="form-control form-control-sm nguoidango-phongtro" id="xem-nguoidango-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Tiền trọ (nghìn đồng)</label>
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm tientro-phongtro" id="xem-tientro-phongtro">
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm tientro-giacu-phongtro" id="xem-tientro-giacu-phongtro" hidden>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label>Mô tả</label>
                          <textarea maxlength="500" class="form-control mota-phongtro" id="xem-mota-phongtro" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Tiền trọ tính theo</label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="xem-cachtinh-phongtro" id="xem-cachtinh-daunguoi" value="daunguoi" checked>Đầu người
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="xem-cachtinh-phongtro" id="xem-cachtinh-codinh" value="codinh">Cố định
                            </label>
                          </div>
                          <input type="text" class="form-control form-control-sm cachtinh-cu-phongtro" id="xem-cachtinh-cu-phongtro" hidden>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success update-phongtro" id="update-phongtro">Cập nhật</button>
                      <button type="button" class="btn btn-light cancel-update" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal thong tin nguoi o -->
              <div class="modal fade" id="modal-xem-nguoio" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Danh sách người ở</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <table class="table mt-3 border-top" id="danhsach-nguoio-edit">
                          
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light cancel-update" data-dismiss="modal">Đóng</button>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table mt-3 border-top" id="danhsach-phongtro">
                <thread>
                  <th>STT</th>
                  <th>Tên phòng</th>
                  <th>Đang ở</th>
                  <th>Được ở</th>
                  <th>Tiền trọ (VND)</th>
                  <th>Cách tính</th>
                  <th>Thao tác</th>
                </thread>
                <tbody>
                  <?php if($phongtro != null) {
                    if(count($phongtro)) {                      
                      $count = 1;
                      foreach(@$phongtro as $phongtro_s) { ?>
                        <tr>
                          <td><?=$count++?></td>
                          <td><?=$phongtro_s->Ten?></td>
                          <td><?=$phongtro_s->SLNDO?></td>
                          <td><?=$phongtro_s->SLTD?></td>
                          <td>
                            <?=number_format($phongtro_s->GIA)?>
                          </td>
                          <td><?php if($phongtro_s->CACHTINH == 'daunguoi') echo 'Theo đầu người'; else echo 'Giá cố định';?></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary xem-phongtro" id="xem-phongtro" data="<?=$phongtro_s->MAPT?>">Xem</button>
                            <button class="btn btn-sm btn-outline-primary xem-nguoio" id="xem-nguoio" data="<?=$phongtro_s->MAPT?>">Người ở</button>
                          </td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td>Danh sách rỗng.</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url(); ?>assets/main/roomdetails.js"></script>
    