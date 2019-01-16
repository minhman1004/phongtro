<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-8">
        <div class="card grid-margin">
          <div class="card-body">
            <label>Chọn nhà trọ để xem forum</label>
            <select class="form-control" id="select-nhatro">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
          </div>
        </div>
        <div class="card grid-margin">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                  <div>
                    <h4 id="show-hoten">Đăng topic</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" maxlength="500" placeholder="Nhập nhội dung ..." id="current-content" rows="4"></textarea>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Cho phép bình luận</label>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="current-binhluan" name="binhluan" id="binhluan-yes" value="yes" checked>
                      Có
                    <i class="input-helper"></i></label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="binhluan" id="binhluan-no" value="no">
                      Không
                    <i class="input-helper"></i></label>
                  </div>
                </div>
                <div class="form-group col-5" style="margin-top: 1%">
                  <button type="button" id="post-topic" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-account-search-outline menu-icon"></i> Xác nhận</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card grid-margin">
          <div class="card-body" id="danh-sach-topic">
          </div>
        </div>
        <!-- Modal binh luan -->
        <div class="modal fade" id="binhluan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div>
                  <h6 style="font-weight: bold" id="modal-ten-nguoidang"></h6>
                  <p id="modal-post-content"></p>
                  <p class="small text-muted mt-2 mb-0">
                    <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon thich-topic" id="modal-thich"></button>
                    <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon kthich-topic" id="modal-kthich"></button>
                  </p>
                </div>
              </div>
              <div class="modal-body" id="danh-sach-binh-luan">
              </div>
              <div class="modal-footer">
                <textarea class="form-control" id="noidung-binhluan" maxLength="100" placeholder="Nhập nội dung ..." rows="2" style="border: 2px solid #aba3a3;"></textarea>
                <button type="button" class="btn btn-primary" id="update-binhluan-button" hidden>Cập nhật</button>
                <button type="button" class="btn btn-danger" id="cancel-binhluan-button" hidden>Hủy</button>
                <button type="button" class="btn btn-primary" id="post-binhluan">Gửi</button>
                <button type="button" class="btn btn-light cancel-info" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal chinh sua topic -->
        <div class="modal fade" id="modal-edit-topic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div>
                  <h4 class="modal-title">Chỉnh sửa topic</h4>
                </div>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <textarea class="form-control" maxlength="500" placeholder="Nhập nhội dung ..." id="update-current-content" rows="4"></textarea>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cho phép bình luận</label>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="current-binhluan" name="update-binhluan" id="update-binhluan-yes" value="yes" checked>
                          Có
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="update-binhluan" id="update-binhluan-no" value="no">
                          Không
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="form-group col-5" style="margin-top: 1%">
                      <button type="button" id="update-topic" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-account-search-outline menu-icon"></i> Cập nhật</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">                
                <button type="button" class="btn btn-light cancel-info" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <!-- Thong tin chung -->
        <div class="card grid-margin">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                  <div>
                    <h4>Thông tin chung</h4>
                    <hr>
                    <h5 id="current-tennhatro"></h5>
                    <h5 id="current-chutro"></h5>
                    <h5 id="current-tenphong"></h5>
                    <h5 id="current-ngayo"></h5>
                    <h5 id="current-ngaydao"></h5>
                    <h5></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bang gia -->
        <div class="card grid-margin">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <h4>Bảng giá (đơn vị: nghìn đồng)</h4>
                    <hr>          
                </div>
              </div>
            </div>
            <table class="table mb-0" id="current-banggia">
              <tbody>
                <tr>
                  <td class="pl-0">Bảng giá</td>
                  <td class="pr-0 text-right">
                    <div class="badge badge-outline-success badge-pill">0</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/main/memforum.js"></script>
  <script>
    var mand = <?php echo json_encode($mand); ?>;
  </script>