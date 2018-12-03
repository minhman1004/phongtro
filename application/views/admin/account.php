<div class="main-panel">
  <div class="content-wrapper">
    <!-- Thống kê chung -->
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách: Loại tài khoản</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-chucvu"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
              <div class="modal fade" id="add-chucvu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- <form method="post"> -->
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm loại tài khoản</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Tên</label>
                          <input type="text" id="add-chucvu-ten" class="form-control form-control-sm" placeholder="Tên" required>
                        </div>
                        <div class="form-group">
                          <label>Mô tả</label>
                          <input type="text" id="add-chucvu-mota" class="form-control form-control-sm" placeholder="Mô tả" required>
                        </div>
                        <div class="form-group">
                          <label for="chucvu">Trạng thái</label>
                          <select class="form-control" id="add-chucvu-trang-thai">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-sm btn-primary" id="add-chucvu-button">Thêm</button>
                        <button type="button" class="btn btn-sm btn-light" id="dismiss-button" data-dismiss="modal">Hủy</button>
                      </div>
                    </div>
                  </div>
                <!-- </form> -->
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table mt-3 border-top" id="chucvu-danh-sach">
                <thead>
                  <tr></i>
                    <th class="sortStyle">Tên <i class="mdi mdi-chevron-down"></th>
                    <th class="sortStyle">Mô tả <i class="mdi mdi-chevron-down"></th>
                    <th class="sortStyle">Trạng thái <i class="mdi mdi-chevron-down"></th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($chucvu != false) { ?>
                    <?php foreach($chucvu as $chucvu_s) { ?>
                      <tr>
                        <td><?=$chucvu_s->TENVT?></td>
                        <td><?=$chucvu_s->MOTA?></td>
                        <td><?php if($chucvu_s->TRANGTHAI == 0) echo 'Hiển thị'; else echo 'Ẩn'; ?></td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#ten-modal-<?=$chucvu_s->MAVT?>">Sửa</button>
                          </div>
                          <div class="modal fade" id="ten-modal-<?=$chucvu_s->MAVT?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cập nhật loại tài khoản</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" id="ten-update-<?=$chucvu_s->MAVT?>" value="<?=$chucvu_s->TENVT?>" class="form-control form-control-sm" placeholder="Tên">
                                  </div>
                                  <div class="form-group">
                                    <label>Mô tả</label>
                                    <input type="text" id="mota-update-<?=$chucvu_s->MAVT?>" value="<?=$chucvu_s->MOTA?>" class="form-control form-control-sm" placeholder="Mô tả">
                                  </div>
                                  <div class="form-group">
                                    <label for="chucvu">Trạng thái</label>
                                    <select class="form-control" id="trangthai-update-<?=$chucvu_s->MAVT?>">
                                      <option value="0" <?php if($chucvu_s->TRANGTHAI == 0) echo 'selected'; ?>>Hiển thị</option>
                                      <option value="1" <?php if($chucvu_s->TRANGTHAI == 1) echo 'selected'; ?>>Ẩn</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-sm btn-success update-item" data=<?='"'.$chucvu_s->MAVT.'"'?>>Cập nhật</button>
                                  <button type="button" class="btn btn-sm btn-light dismiss-update" id="<?=$chucvu_s->MAVT?>" data-dismiss="modal">Hủy</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td>
                        Không có chức vụ nào trong danh sách.
                      </td>
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
  <script src="<?php echo base_url(); ?>assets/js/alerts.js"></script>
  <script src="<?php echo base_url(); ?>assets/main/accountSettings.js"></script>