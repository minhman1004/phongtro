<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-8">
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
        <div class="modal fade" id="binhluan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ten-nguoio">Cập nhật thông tin cá nhân</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="form-group col-8">
                    <label>Họ tên</label>
                    <input type="text" maxLength="30" class="form-control form-control-sm" id="edit-hoten">
                  </div>
                  <div class="form-group col-4">
                    <label>Giới tính</label>
                    <select class="form-control" id="edit-gioitinh">
                      <option value="nam">Nam</option>
                      <option value="nu">Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" maxlength="30" data-inputmask="'alias': 'email'" class="form-control form-control-sm" id="edit-email">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Số điện thoại</label>
                    <input type="text" data-inputmask="'mask': '9999999999'" class="form-control form-control-sm" id="edit-sdt">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>Ngày sinh</label>
                    <input type="text" data-inputmask="'alias': 'date'" class="form-control form-control-sm" id="edit-ngaysinh">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success save-info">Lưu</button>
                <button type="button" class="btn btn-light cancel-info" data-dismiss="modal">Hủy</button>
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
                  <td class="pl-0">Primary label</td>
                  <td class="pr-0 text-right">
                    <div class="badge badge-outline-success badge-pill">Primary</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/main/forum_current.js"></script>