<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" id="title-user">Danh sách tài khoản</h4>
            <div class="d-flex table-responsive">
              <!-- Lọc danh sách -->
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-inverse-dark" style="background-color:#282f3a; color:#ffffff" id="filter-all">Tất cả</button>
                <button class="btn btn-sm btn-inverse-dark" id="filter-normal">Cơ bản</button>
                <button class="btn btn-sm btn-inverse-dark" id="filter-admin">Quản trị viên</button>
                <button class="btn btn-sm btn-inverse-dark" id="filter-banned">Bị phạt</button>
              </div>
              <!-- Thêm người dùng mới -->
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-new-user">
                <i class="mdi mdi-plus-circle-outline"></i> Thêm mới
              </button>              <!-- Modal add user -->
              <div class="modal fade" id="add-new-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản mới</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label>Họ Tên</label>
                            <input type="text" maxlength="50" class="form-control form-control-sm" placeholder="Họ tên" id="add-hoten" aria-label="Họ tên" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label>Email</label>
                            <input id="add-email" class="form-control form-control-sm" data-inputmask="'alias':'email'">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label>Số điện thoại</label>
                            <input id="add-sdt" class="form-control form-control-sm" data-inputmask="'mask': '9999999999'">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2">
                          <div class="form-group">
                            <label for="chucvu">Giới tính</label>
                            <select class="form-control" id="add-gioitinh">
                              <option value='nam'>Nam</option>
                              <option value='nu'>Nữ</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-group">
                            <label>Số CMND</label>
                            <input id="add-cmnd" class="form-control form-control-sm" data-inputmask="'alias': 'cmnd'">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label for="chucvu">Chức vụ</label>
                            <select class="form-control" id="add-chucvu">
                              <?php if($chucvu != false) { ?>
                                <?php foreach($chucvu as $chucvu_all) { ?>
                                    <option value="<?=$chucvu_all->MAVT?>"><?=$chucvu_all->TENVT?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Ngày sinh</label>
                            <input id="add-ngaysinh" class="form-control form-control-sm" data-inputmask="'alias': 'date'">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3">
                          <div class="form-group">
                            <label>Tài khoản</label>
                            <input id="add-tendn" class="form-control form-control-sm" maxlength="20" placeholder="Tài khoản">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Mật khẩu</label>
                            <input placeholder="Mật khẩu" type="password" id="add-matkhau" class="form-control form-control-sm" maxlength="25">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input placeholder="Nhập lại mật khẩu" type="password" id="add-matkhau-re" class="form-control form-control-sm" maxlength="25">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="add-user-button">Thêm</button>
                      <button type="button" class="btn btn-light" id="add-user-cancel-button" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="table-sorter-wrapper col-lg-12 table-responsive">
                <table id="all-users-table" class="table">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th class="sortStyle">Tên<i class="mdi mdi-chevron-down"></i></th>
                      <th class="sortStyle">Email<i class="mdi mdi-chevron-down"></i></th>
                      <th class="sortStyle">SĐT<i class="mdi mdi-chevron-down"></i></th>
                      <th class="sortStyle">Chức vụ<i class="mdi mdi-chevron-down"></i></th>
                      <th class="sortStyle">Thao tác<i class="mdi mdi-chevron-down"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $countAll = 0; foreach(@$users as $user_all) { $countAll += 1; ?>
                      <tr class="<?=$user_all->CHUCVU?>" id="<?=$user_all->MAND?>">
                        <td class="<?=$user_all->MAND?>"><?=$countAll?></td>
                        <td><?=$user_all->HOTEN?></td>
                        <td><?=$user_all->Email?></td>
                        <td><?=$user_all->SDT?></td>
                        <td><?php if($user_all->CHUCVU != null) { foreach($chucvu as $chucvu_s) {if($chucvu_s->MAVT == $user_all->CHUCVU) { 
                            echo $chucvu_s->TENVT; }}} else echo 'Chưa có'; ?>
                          </td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-sm btn-outline-info xem-taikhoan" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-all'?>" id="<?=$user_all->MAND?>">Xem</button>
                            <button class="btn btn-sm btn-outline-danger">Cấm</button>
                            <div class="modal fade" id="<?=$user_all->MAND.'-all'?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thông tin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="form-group">
                                          <label>Họ Tên</label>
                                          <input type="text" maxlength="30" class="form-control form-control-sm" placeholder="Họ tên" id=<?='"hoten-all-'.$user_all->MAND.'"'?> aria-label="Họ tên">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input type="text" id=<?='"email-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" placeholder="Email" aria-label="Email">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="form-group">
                                          <label>Số điện thoại</label>
                                          <input id=<?='"sdt-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'mask': '9999999999'">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-2">
                                        <div class="form-group">
                                          <label for="chucvu">Giới tính</label>
                                          <select class="form-control" id=<?='"gioitinh-all-'.$user_all->MAND.'"'?>>
                                            <option value='nam'>Nam</option>
                                            <option value='nu'>Nữ</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-2">
                                        <div class="form-group">
                                          <label>Số CMND</label>
                                          <input id=<?='"cmnd-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'cmnd'">
                                        </div>
                                      </div>
                                      <div class="col-3">
                                        <div class="form-group">
                                          <label for="chucvu">Chức vụ</label>
                                          <select class="form-control" id=<?='"chucvu-all-'.$user_all->MAND.'"'?>>
                                            <?php if($chucvu != false) { ?>
                                              <?php foreach($chucvu as $chucvu_all) { ?>
                                                <option value="<?=$chucvu_all->MAVT?>"><?=$chucvu_all->TENVT?></option>
                                              <?php } ?>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-3">
                                        <div class="form-group">
                                          <label>Ngày sinh</label>
                                          <input id=<?='"ngaysinh-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'date'">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-2">
                                        <div class="form-group">
                                          <label>Tài khoản</label>
                                          <input id="tendn-all-<?=$user_all->MAND?>" class="form-control form-control-sm" placeholder="Tài khoản" disabled>
                                        </div>
                                      </div>
                                      <div class="col-2">
                                        <div class="form-group">
                                          <label>Mật khẩu</label>
                                          <input placeholder="Mật khẩu" type="password" id="matkhau-all-<?=$user_all->MAND?>" class="form-control form-control-sm" maxlength="25">
                                        </div>
                                      </div>
                                      <div class="col-2">
                                        <div class="form-group">
                                          <label>Nhập lại mật khẩu</label>
                                          <input placeholder="Nhập lại mật khẩu" type="password" id="matkhau-all-retype-<?=$user_all->MAND?>" class="form-control form-control-sm" maxlength="25">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-success update-item" data="<?=$user_all->MAND?>">Cập nhật</button>
                                    <button type="button" class="btn btn-sm btn-light" id="all-<?=$user_all->MAND?>" data-dismiss="modal">Hủy</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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
  </div>
  <script src="<?php echo base_url(); ?>assets/main/user.js"></script>
  <script src="<?php echo base_url(); ?>assets/main/mask.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/alerts.js"></script>