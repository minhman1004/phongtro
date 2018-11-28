<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="all-users-tab" data-toggle="tab" href="#post-table" role="tab" aria-controls="home-1" aria-selected="true">Tất cả</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="showed-tab" data-toggle="tab" href="#post-table" role="tab" aria-controls="profile-1" aria-selected="false">Được hiển thị</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="waiting-tab" data-toggle="tab" href="#post-table" role="tab" aria-controls="contact-1" aria-selected="false">Chờ duyệt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="expired-tab" data-toggle="tab" href="#post-table" role="tab" aria-controls="contact-1" aria-selected="false">Hết hạn</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="deleted-tab" data-toggle="tab" href="#post-table" role="tab" aria-controls="contact-1" aria-selected="false">Đã xóa</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade  show active" id="post-table" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex table-responsive">
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
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <!-- <td><?=$user_all->GioiTinh?></td> -->
                                      <!-- <td><?=$user_all->CMND?></td> -->
                                      <td></td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-sm btn-outline-info">Xem</button>
                                          <button class="btn btn-sm btn-outline-dark">Sửa</button>
                                          <button class="btn btn-sm btn-outline-danger">Cấm</button>
                                        </div>
                                      </td>
                                    </tr>
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
    