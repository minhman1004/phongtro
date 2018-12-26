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
              <div class="modal fade" id="edit-loi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
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
                      <button type="button" class="btn btn-success" id="add-loi-button">Thêm</button>
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
                    <?php foreach($loi as $loi_s) { $count = 0; ?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$loi_s->TEN?></td>
                        <td><?=$loi_s->MOTA?></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary" data="<?=$loi_s->MALOI?>">Sửa</button>
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
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-mucphat"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
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
                      <div class="form-group">
                        <label>Mức phạt</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" id="add-mucphat-mucphat">
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
              <table class="table mt-3 border-top" id="danh-sach-muc-phat">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Mức phạt</td>
                    <td>Thao tác</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if($mucphat != false) { ?>
                    <?php foreach($mucphat as $mucphat_s) { ?>
                      <tr>
                        <td>Hello</td>
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
                      <button type="button" class="btn btn-success">Cập nhật</button>
                      <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
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
                  <?php if($mucphat != false) { ?>
                    <?php foreach($mucphat as $mucphat_s) { $count = 0; ?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$mucphat_s->TENMD?></td>
                        <td><?=$mucphat_s->MUCDO?></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary" data="<?=$mucphat_s->MALOI?>">Sửa</button>
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