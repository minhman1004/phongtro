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
                                if($user_all->CHUCVU == 21 || $user_all->CHUCVU == 22 || $user_all->CHUCVU == 23) { $countAll += 1; ?>
                                  <tr>
                                    <td><?=$countAll?></td>
                                    <td><?=$user_all->HOTEN?></td>
                                    <td><?=$user_all->Email?></td>
                                    <td><?=$user_all->SDT?></td>
                                    <td><?php if($user_all->CHUCVU != null) { foreach($chucvu as $chucvu_s) {if($chucvu_s->MAVT == $user_all->CHUCVU) { 
                                        echo $chucvu_s->TENVT; }}} else echo 'Chưa có'; ?>
                                      </td>
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
                                                      <input type="text" maxlength="30" class="form-control form-control-sm" placeholder="Họ tên" id=<?='"hoten-all-'.$user_all->MAND.'"'?> aria-label="Họ tên" value=<?='"'.$user_all->HOTEN.'"'?>>
                                                    </div>
                                                  </div>
                                                  <div class="col-4">
                                                    <div class="form-group">
                                                      <label>Email</label>
                                                      <input type="text" id=<?='"email-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" placeholder="Email" aria-label="Email" value=<?='"'.$user_all->Email.'"'?>>
                                                    </div>
                                                  </div>
                                                  <div class="col-4">
                                                    <div class="form-group">
                                                      <label>Số điện thoại</label>
                                                      <input id=<?='"sdt-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'mask': '9999999999'" value=<?='"'.$user_all->SDT.'"'?>>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-2">
                                                    <div class="form-group">
                                                      <label for="chucvu">Giới tính</label>
                                                      <select class="form-control" id=<?='"gioitinh-all-'.$user_all->MAND.'"'?>>
                                                        <option value='Nam' <?php if($user_all->GioiTinh == 'Nam') echo "selected"; ?> >Nam</option>
                                                        <option value='Nữ' <?php if($user_all->GioiTinh == 'Nữ') echo "selected"; ?> >Nữ</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-2">
                                                    <div class="form-group">
                                                      <label>Số CMND</label>
                                                      <input id=<?='"cmnd-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'cmnd'" value=<?=$user_all->CMND?>>
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="form-group">
                                                      <label for="chucvu">Chức vụ</label>
                                                      <select class="form-control" id=<?='"chucvu-all-'.$user_all->MAND.'"'?>>
                                                        <?php if($chucvu != false) { ?>
                                                          <?php foreach($chucvu as $chucvu_all) { ?>
                                                            <?php if($user_all->CHUCVU != null && $user_all->CHUCVU == $chucvu_all->MAVT) { ?>
                                                              <option value="<?=$chucvu_all->MAVT?>" selected><?=$chucvu_all->TENVT?></option>
                                                            <?php } else { ?>
                                                              <option value="<?=$chucvu_all->MAVT?>"><?=$chucvu_all->TENVT?></option>
                                                            <?php } ?>
                                                          <?php } ?>
                                                        <?php } ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="form-group">
                                                      <label>Ngày sinh</label>
                                                      <input id=<?='"ngaysinh-all-'.$user_all->MAND.'"'?> class="form-control form-control-sm" data-inputmask="'alias': 'date'" value=<?=date_format(new Datetime($user_all->NgaySinh), 'd/m/Y')?>>
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
<script src="<?php echo base_url(); ?>assets/main/user.js"></script>
<script src="<?php echo base_url(); ?>assets/main/mask.js"></script>
<script src="<?php echo base_url(); ?>assets/js/alerts.js"></script>