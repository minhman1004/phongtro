<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                  <div>
                    <h3 id="show-hoten"><?=$nguoidung[0]->HOTEN?></h3>
                    <div class="d-flex align-items-center">
                      <h5 class="mb-0 mr-2 text-muted" id="show-email"><?=$nguoidung[0]->Email?></h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-sm btn-outline-primary edit-info" data="<?=$nguoidung[0]->MAND?>">Edit</button>
                    <button class="btn btn-sm btn-outline-primary edit-password" data="<?=$nguoidung[0]->MAND?>">Update password</button>
                  </div>
                  <!-- Edit infomation -->
                  <div class="modal fade" id="edit-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Cập nhật thông tin cá nhân</h5>
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
                  <!-- Modal Ends -->
                  <!-- Modal change password -->
                  <div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Đổi mật khẩu</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-6">
                              <label>Nhập mật khẩu mới</label>
                              <input type="password" maxLength="30" class="form-control form-control-sm" id="edit-pass">
                            </div>
                            <div class="form-group col-6">
                              <label>Nhập lại mật khẩu</label>
                              <input type="password" maxLength="30" class="form-control form-control-sm" id="edit-repass">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success save-pass">Lưu</button>
                          <button type="button" class="btn btn-light cancel-pass" data-dismiss="modal">Hủy</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-4 py-2 border-top border-bottom">
                  <ul class="nav profile-navbar">
                    <li class="nav-item">
                      <a class="nav-link">
                        <i class="mdi mdi-security-account-outline"></i> <?=$nguoidung[0]->CMND?>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="show-gioitinh">
                        <i class="mdi mdi-gender-male-female"></i> <?php if($nguoidung[0]->GioiTinh == 'nam') echo 'Nam'; else echo 'Nữ';?>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="show-sdt">
                        <i class="mdi mdi-cellphone-iphone"></i> <?=$nguoidung[0]->SDT?>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="show-ngaysinh">
                        <i class="mdi mdi-timetable"></i> <?=date_format(new Datetime($nguoidung[0]->NgaySinh), 'd-m-Y')?>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/main/meminfo.js"></script>