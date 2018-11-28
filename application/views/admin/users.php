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
                                  <th class="sortStyle">STT<i class="mdi mdi-chevron-down"></i></th>
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
                                      <td><?=$user_all->TenDN?></td>
                                      <td><?=$user_all->Email?></td>
                                      <td><?=$user_all->SDT?></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td><?=$user_all->CHUCVU?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-all'?>">Xem</button>
                                          <button class="btn btn-sm btn-outline-dark">Sửa</button>
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
                                                  <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-success">Submit</button>
                                                  <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
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
                                  <th class="sortStyle">STT<i class="mdi mdi-chevron-down"></i></th>
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
                                      <td><?=$user_all->TenDN?></td>
                                      <td><?=$user_all->Email?></td>
                                      <td><?=$user_all->SDT?></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td><?=$user_all->CHUCVU?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-normal'?>">Xem</button>
                                          <button class="btn btn-sm btn-outline-dark">Sửa</button>
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
                                                  <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-success">Submit</button>
                                                  <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
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
                                  <th class="sortStyle">STT<i class="mdi mdi-chevron-down"></i></th>
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
                                      <td><?=$user_all->TenDN?></td>
                                      <td><?=$user_all->Email?></td>
                                      <td><?=$user_all->SDT?></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td><?=$user_all->CHUCVU?></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="hello btn btn-sm btn-outline-info" data-toggle="modal" data-target="<?='#'.$user_all->MAND.'-admin'?>">Xem</button>
                                          <button class="btn btn-sm btn-outline-dark">Sửa</button>
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
                                                  <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-success">Submit</button>
                                                  <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
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