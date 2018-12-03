<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="all-users-tab" data-toggle="tab" href="#all-users" role="tab" aria-controls="home-1" aria-selected="true">Tất cả</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="normal-users-tab" data-toggle="tab" href="#normal-users" role="tab" aria-controls="profile-1" aria-selected="false">Người dùng cơ bản</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="manager-users-tab" data-toggle="tab" href="#manager-users" role="tab" aria-controls="contact-1" aria-selected="false">Quản trị viên</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="all-users" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex table-responsive">
                          <!-- Lọc danh sách -->
                          <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-info">Tất cả</button>
                            <button class="btn btn-sm btn-dark">Chờ duyệt</button>
                            <button class="btn btn-sm btn-danger">Bị cấm</button>
                          </div>
                          <!-- Thêm người dùng mới -->
                          <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Thêm mới</button>
                          </div>
                          <!-- AutoComplete -->
                          <div class="btn-group ml-auto mr-2 border-0 d-none d-md-block">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                          </div>
                        </div>
                        <div class="row">
                          <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            <table id="all-users-table" class="table table-striped">
                              <thead>
                                <tr>
                                  <th>STT</th>
                                  <th class="sortStyle">Tên<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">Email<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">SĐT<i class="mdi mdi-chevron-down"></i></th>
                                  <!-- <th class="sortStyle">Giới tính<i class="mdi mdi-chevron-down"></i></th> -->
                                  <!-- <th class="sortStyle">CMND<i class="mdi mdi-chevron-down"></i></th> -->
                                  <th class="sortStyle">Chức vụ<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">Thao tác<i class="mdi mdi-chevron-down"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $countAll = 0; foreach(@$users as $user_all) { 
                                  if($user_all->CHUCVU != 'Ở trọ') { $countAll += 1; ?>
                                    <tr>
                                      <td><?=$countAll?></td>
                                      <td><?=$user_all->HOTEN?></td>
                                      <td><?=$user_all->Email?></td>
                                      <td><?=$user_all->SDT?></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td><?=$user_all->CHUCVU?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-all'?>">Xem</button>
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
                                                        <input type="text" class="form-control form-control-sm" placeholder="Họ tên" id=<?='"hoten-'.$user_all->MAND.'"'?> aria-label="Họ tên" value=<?='"'.$user_all->HOTEN.'"'?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" id=<?='"email-'.$user_all->MAND.'"'?> class="form-control form-control-sm" placeholder="Email" aria-label="Email" value=<?='"'.$user_all->Email.'"'?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input id=<?='"sdt-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'phone'" value=<?='"'.$user_all->SDT.'"'?>>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-2">
                                                      <div class="form-group">
                                                        <label for="chucvu">Giới tính</label>
                                                        <select class="form-control" id=<?='"gioitinh-'.$user_all->MAND.'"'?>>
                                                          <option value='Nam' <?php if($user_all->GioiTinh == 'Nam') echo "selected"; ?> >Nam</option>
                                                          <option value='Nữ' <?php if($user_all->GioiTinh == 'Nữ') echo "selected"; ?> >Nữ</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-2">
                                                      <div class="form-group">
                                                        <label>Số CMND</label>
                                                        <input id=<?='"cmnd-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'cmnd'" value=<?=$user_all->CMND?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-3">
                                                      <div class="form-group">
                                                        <label for="chucvu">Chức vụ</label>
                                                        <select class="form-control" id=<?='"chucvu-'.$user_all->MAND.'"'?>>
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
                                                        <input id=<?='"ngaysinh-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'date'" value=<?=date_format(new Datetime($user_all->NgaySinh), 'd/m/Y')?>>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-success">Cập nhật</button>
                                                  <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Hủy</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
              </div>
              <div class="tab-pane fade" id="normal-users" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex table-responsive">
                          <!-- Lọc danh sách -->
                          <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-info">Tất cả</button>
                            <button class="btn btn-sm btn-dark">Chờ duyệt</button>
                            <button class="btn btn-sm btn-danger">Bị cấm</button>
                          </div>
                          <!-- Thêm người dùng mới -->
                          <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Thêm mới</button>
                          </div>
                          <!-- AutoComplete -->
                          <div class="btn-group ml-auto mr-2 border-0 d-none d-md-block">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                          </div>
                        </div>
                        <div class="row">
                          <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            <table id="normal-users-table" class="table table-striped">
                              <thead>
                                <tr>
                                  <th>STT</th>
                                  <th class="sortStyle">Tên<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">Email<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">SĐT<i class="mdi mdi-chevron-down"></i></th>
                                  <!-- <th class="sortStyle">Giới tính<i class="mdi mdi-chevron-down"></i></th> -->
                                  <!-- <th class="sortStyle">CMND<i class="mdi mdi-chevron-down"></i></th> -->
                                  <th class="sortStyle">Chức vụ<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">Thao tác<i class="mdi mdi-chevron-down"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $countAll = 0; foreach(@$users as $user_all) { 
                                  if($user_all->CHUCVU != 'Ở trọ' && ($user_all->CHUCVU == 'đăng bài miễn phí' || $user_all->CHUCVU == 'Chủ trọ')) { $countAll += 1; ?>
                                    <tr>
                                      <td><?=$countAll?></td>
                                      <td><?=$user_all->HOTEN?></td>
                                      <td><?=$user_all->Email?></td>
                                      <td><?=$user_all->SDT?></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td><?=$user_all->CHUCVU?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-normal'?>">Xem</button>
                                          <button class="btn btn-sm btn-outline-danger">Cấm</button>
                                          <div class="modal fade" id="<?=$user_all->MAND.'-normal'?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <input type="text" class="form-control form-control-sm" placeholder="Họ tên" aria-label="Họ tên" value=<?='"'.$user_all->HOTEN.'"'?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" value=<?='"'.$user_all->Email.'"'?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input class="form-control form-control-sm" data-inputmask="'alias': 'phone'" value=<?='"'.$user_all->SDT.'"'?>>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-2">
                                                      <div class="form-group">
                                                        <label for="chucvu">Giới tính</label>
                                                        <select class="form-control" id="gioitinh">
                                                          <option value='Nam' <?php if($user_all->GioiTinh == 'Nam') echo "selected"; ?> >Nam</option>
                                                          <option value='Nữ' <?php if($user_all->GioiTinh == 'Nữ') echo "selected"; ?> >Nữ</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-2">
                                                      <div class="form-group">
                                                        <label>Số CMND</label>
                                                        <input class="form-control form-control-sm" data-inputmask="'alias': 'cmnd'" value=<?=$user_all->CMND?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-3">
                                                      <div class="form-group">
                                                        <label for="chucvu">Chức vụ</label>
                                                        <select class="form-control" id="chucvu">
                                                          <option disabled>Chức vụ</option>
                                                        </select>
                                                      </div>
                                                    </div><div class="col-3">
                                                      <div class="form-group">
                                                        <label>Ngày sinh</label>
                                                        <input class="form-control form-control-sm" data-inputmask="'alias': 'date'" value=<?=date_format(new Datetime($user_all->NgaySinh), 'd/m/Y')?>>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-success">Cập nhật</button>
                                                  <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Hủy</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
              </div>
              <div class="tab-pane fade" id="manager-users" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex table-responsive">
                          <!-- Lọc danh sách -->
                          <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-info">Tất cả</button>
                            <button class="btn btn-sm btn-dark">Chờ duyệt</button>
                            <button class="btn btn-sm btn-danger">Bị cấm</button>
                          </div>
                          <!-- Thêm người dùng mới -->
                          <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Thêm mới</button>
                          </div>
                          <!-- AutoComplete -->
                          <div class="btn-group ml-auto mr-2 border-0 d-none d-md-block">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                          </div>
                        </div>
                        <div class="row">
                          <div class="table-sorter-wrapper col-lg-12 table-responsive">
                            <table id="manager-users-table" class="table table-striped">
                              <thead>
                                <tr>
                                  <th>STT</th>
                                  <th class="sortStyle">Tên<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">Email<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">SĐT<i class="mdi mdi-chevron-down"></i></th>
                                  <!-- <th class="sortStyle">Giới tính<i class="mdi mdi-chevron-down"></i></th> -->
                                  <!-- <th class="sortStyle">CMND<i class="mdi mdi-chevron-down"></i></th> -->
                                  <th class="sortStyle">Chức vụ<i class="mdi mdi-chevron-down"></i></th>
                                  <th class="sortStyle">Thao tác<i class="mdi mdi-chevron-down"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $countAll = 0; foreach(@$users as $user_all) { 
                                  if($user_all->CHUCVU != 'Ở trọ' && $user_all->CHUCVU == 'Admin') { $countAll += 1; ?>
                                    <tr>
                                      <td><?=$countAll?></td>
                                      <td><?=$user_all->HOTEN?></td>
                                      <td><?=$user_all->Email?></td>
                                      <td><?=$user_all->SDT?></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td><?=$user_all->CHUCVU?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-admin'?>">Xem</button>
                                          <button class="btn btn-sm btn-outline-danger">Cấm</button>
                                          <div class="modal fade" id="<?=$user_all->MAND.'-admin'?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <input type="text" class="form-control form-control-sm" placeholder="Họ tên" aria-label="Họ tên" value=<?='"'.$user_all->HOTEN.'"'?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" value=<?='"'.$user_all->Email.'"'?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-4">
                                                      <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input class="form-control form-control-sm" data-inputmask="'alias': 'phone'" value=<?='"'.$user_all->SDT.'"'?>>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-2">
                                                      <div class="form-group">
                                                        <label for="chucvu">Giới tính</label>
                                                        <select class="form-control" id="gioitinh">
                                                          <option value='Nam' <?php if($user_all->GioiTinh == 'Nam') echo "selected"; ?> >Nam</option>
                                                          <option value='Nữ' <?php if($user_all->GioiTinh == 'Nữ') echo "selected"; ?> >Nữ</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-2">
                                                      <div class="form-group">
                                                        <label>Số CMND</label>
                                                        <input class="form-control form-control-sm" data-inputmask="'alias': 'cmnd'" value=<?=$user_all->CMND?>>
                                                      </div>
                                                    </div>
                                                    <div class="col-3">
                                                      <div class="form-group">
                                                        <label for="chucvu">Chức vụ</label>
                                                        <select class="form-control" id="chucvu">
                                                          <option disabled>Chức vụ</option>
                                                        </select>
                                                      </div>
                                                    </div><div class="col-3">
                                                      <div class="form-group">
                                                        <label>Ngày sinh</label>
                                                        <input class="form-control form-control-sm" data-inputmask="'alias': 'date'" value=<?=date_format(new Datetime($user_all->NgaySinh), 'd/m/Y')?>>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-success">Cập nhật</button>
                                                  <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Hủy</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <script src="<?php echo base_url(); ?>assets/main/users.js"></script>
  <script src="<?php echo base_url(); ?>assets/main/mask.js"></script>