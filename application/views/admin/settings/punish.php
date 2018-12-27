<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách các lỗi vi phạm</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-loi"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
              <div class="modal fade" id="modal-add-loi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm vi phạm</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Tên</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" id="add-ten-loi">
                      </div>
                      <div class="form-group">
                        <label>Mô tả</label>
                        <textarea  maxlength="100" class="form-control form-control-sm" id="add-mota-loi"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="add-loi">Thêm</button>
                      <button type="button" class="btn btn-light" id="cancel-loi" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <!-- Edit loi vi pham -->
              <div class="modal fade" id="modal-edit-loi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thông tin lỗi vi phạm</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Tên</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" id="edit-ten-loi">
                      </div>
                      <div class="form-group">
                        <label>Mô tả</label>
                        <textarea  maxlength="100" class="form-control form-control-sm" id="edit-mota-loi"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="update-loi">Cập nhật</button>
                      <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table mt-3 border-top" id="danh-sach-loi-vi-pham">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên lỗi</td>
                    <td>Mô tả</td>
                    <td>Thao tác</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if($loi != false) { ?>
                    <?php foreach($loi as $loi_s) { $count = 1; ?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$loi_s->TEN?></td>
                        <td><?=$loi_s->MOTA?></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary edit-loi" data="<?=$loi_s->MALOI?>">Sửa</button>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      Danh sách rỗng!
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row  grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Mức phạt</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" id="open-modal-add-muc-phat" data-toggle="modal" data-target="#modal-add-mucphat"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
              <div class="modal fade" id="modal-add-mucphat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm mức phạt</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Tên mức phạt</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" id="add-ten-mucphat">
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                          <label>Đơn vị</label>
                          <select id="add-donvi-mucphat" class="form-control form-control-sm">
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label>Mức phạt</label>
                          <input type="number" min="1" max="1000" class="form-control form-control-sm" id="add-mucphat-mucphat">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="add-mucphat">Thêm</button>
                      <button type="button" class="btn btn-light" id="cancel-mucphat" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <!-- Edit muc phat -->
              <div class="modal fade" id="modal-edit-mucphat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm mức phạt</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Tên mức phạt</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" id="edit-ten-mucphat">
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                          <label>Đơn vị</label>
                          <select id="edit-donvi-mucphat" class="form-control form-control-sm">
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label>Mức phạt</label>
                          <input type="number" min="1" max="1000" class="form-control form-control-sm" id="edit-mucphat-mucphat">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="update-mucphat">Cập nhật</button>
                      <button type="button" class="btn btn-light" id="cancel-mucphat" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table mt-3 border-top" id="danh-sach-muc-phat">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Mức phạt</td>
                    <td>Đơn vị</td>
                    <td>Thao tác</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if($mucphat != false) { $count = 1; ?>
                    <?php foreach($mucphat as $mucphat_s) { ?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$mucphat_s->TENMD?></td>
                        <td><?=$mucphat_s->MUCDO?></td>
                        <td>
                          <?php foreach($donvi as $donvi_f) {
                            if($mucphat_s->DONVI == $donvi_f->MADV) {
                              echo $donvi_f->TENDV;
                            }
                          } ?>
                        </td>
                        <td><button class="btn btn-sm btn-outline-primary edit-mucphat" data="<?=$mucphat_s->MAMD?>">Sửa</button></td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      Danh sách rỗng!
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Đơn vị</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-donvi"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
              <!-- Modal for add new -->
              <div class="modal fade" id="modal-add-donvi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm loại đơn vị</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Tên đơn vị</label>
                        <input type="text" maxlength="30" class="form-control form-control-sm" id="add-ten-donvi">
                      </div>
                      <div class="form-group">
                        <label>Kiểu đơn vị</label>
                        <select class="form-control" id="add-kieu-donvi">
                          <option id="gio">Giờ</option>
                          <option id="ngay">Ngày</option>
                          <option id="thang">Tháng</option>
                          <option id="nam">Năm</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="add-donvi">Thêm</button>
                      <button type="button" class="btn btn-light" id="cancel-add-donvi" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <!-- Modal For Edit -->
              <div class="modal fade" id="edit-donvi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm loại đơn vị</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Tên đơn vị</label>
                        <input type="text" maxlength="30" class="form-control form-control-sm" id="edit-ten-donvi">
                      </div>
                      <div class="form-group">
                        <label>Kiểu đơn vị</label>
                        <select class="form-control" id="edit-kieu-donvi">
                          <option id="gio">Giờ</option>
                          <option id="ngay">Ngày</option>
                          <option id="thang">Tháng</option>
                          <option id="nam">Năm</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success update-donvi">Cập nhật</button>
                      <button type="button" class="btn btn-light cancel-donvi" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table mt-3 border-top" id="danh-sach-donvi">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên đơn vị</td>
                    <td>Kiểu đơn vị</td>
                    <td>Thao tác</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if($donvi != false) { $count = 1; ?>
                    <?php foreach($donvi as $donvi_s) { ?>
                      <tr>
                        <td><?=$count++;?></td>
                        <td><?=$donvi_s->TENDV?></td>
                        <td><?=$donvi_s->KIEU?></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary edit-donvi" data="<?=$donvi_s->MADV?>">Sửa</button>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      Danh sách rỗng!
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
  <script src="<?php echo base_url(); ?>assets/main/punish.js"></script>