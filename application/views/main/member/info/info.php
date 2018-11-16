<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">  
          <form action="<?php ?>login" method="post"> 
          <div class="card-body">
                  <h3 class="card-title">Chức năng quản lý nhà trọ</h3>
                  <p class="card-description"></p>
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="false">Chi phí</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Phòng trọ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-2" role="tab" aria-controls="profile-1" aria-selected="false">Thành viên</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-3" role="tab" aria-controls="profile-1" aria-selected="false">Forum</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-4" role="tab" aria-controls="profile-1" aria-selected="false">Thông tin cá nhân</a>
                    </li>
                                   
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                      <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="../../../../images/samples/300x300/13.jpg" alt="sample image"> -->
                        <div class="media-body">
                            <div class="row grid-margin">
                                <div class="col-12">
                                  <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="d-flex table-responsive">
                                    <div class="btn-group mr-2">
                                      <button style="width:80px; height: 50px" class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i>Add</button>
                                    </div>
                                  </div>
                                    <div class="table-responsive mt-2">
                                    <table class="table mt-3 border-top">
                                      <thead>
                                      <tr>
                                        <th>STT</th>
                                        <th>Dien</th>
                                        <th>Nuoc</th>
                                        <th>Xe</th>
                                        <th>Rac</th>
                                        <th>Wifi</th>
                                        <th>Chuc nang</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $count = 0; foreach(@$chiphi as $chiphi_info) { $count += 1; ?>
                                        <tr>
                                        <td><?=$count?></td>
                                        <td><?=$chiphi_info->GIADIEN?></td>
                                        <td><?=$chiphi_info->GIANUOC?></td>
                                        <td><?=$chiphi_info->GiaGXe?></td>
                                        <td><?=$chiphi_info->GiaRac?></td>
                                        <td><?=$chiphi_info->GiaWifi?></td>
                                        <td>
                                          <div style="width: 110px" class="text-center">
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-3">Sửa</button>
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-3">Xóa</button>
                                       
                                          </div>
                                          <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel-3">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>Bạn có muốn sửa thông tin này không</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success">Submit</button>
                                              <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
                                    <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                    <p class="mb-3 mb-sm-0"></p>
                                    <nav>
                                      <ul class="pagination pagination-primary mb-0">
                                      <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                      <li class="page-item active"><a class="page-link">1</a></li>
                                      <li class="page-item"><a class="page-link">2</a></li>
                                      <li class="page-item"><a class="page-link">3</a></li>
                                      <li class="page-item"><a class="page-link">4</a></li>
                                      <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                      </ul>
                                    </nav>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                              
                          
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="../../../../images/samples/300x300/13.jpg" alt="sample image"> -->
                        <div class="media-body">
                            <div class="row grid-margin">
                                <div class="col-12">
                                  <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="d-flex table-responsive">
                                    <div class="btn-group mr-2">
                                      <button style="width:80px; height: 50px" class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i>Add</button>
                                    </div>
                                  </div>
                                    <div class="table-responsive mt-2">
                                    <table class="table mt-3 border-top">
                                      <thead>
                                      <tr>
                                        <th>STT</th>
                                        <th>Tên phòng</th>
                                        <th>Giá tiền</th>
                                        <th>Diện tích</th>
                                        <th>Số lượng người đang ở </th>
                                        <th>Tình trạng</th>
                                        <th>Ghi chú</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php if(sizeof($phongtro) != 0) { 
                                        $count = 0; foreach(@$phongtro as $phongtro_info) { $count += 1; ?>
                                        <tr>
                                        <td><?=$count?></td>
                                        <td><?=$phongtro_info->Ten?></td>
                                        <td><?=$phongtro_info->Gia?></td>
                                        <td><?=$phongtro_info->DienTich?></td>
                                        <td><?=$phongtro_info->SLTD?></td>
                                        <td><?=$phongtro_info->Tinhtrang?></td>
                                         <td><?=$phongtro_info->GhiChu?></td>
                                        <td>
                                          <div style="width: 110px" class="text-center">
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-3">Sửa</button>
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-3">Xóa</button>
                                       
                                          </div>
                                          <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel-3">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>Bạn có muốn sửa thông tin này không</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success">Submit</button>
                                              <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
                                    <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                    <p class="mb-3 mb-sm-0"></p>
                                    <nav>
                                      <ul class="pagination pagination-primary mb-0">
                                      <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                      <li class="page-item active"><a class="page-link">1</a></li>
                                      <li class="page-item"><a class="page-link">2</a></li>
                                      <li class="page-item"><a class="page-link">3</a></li>
                                      <li class="page-item"><a class="page-link">4</a></li>
                                      <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                      </ul>
                                    </nav>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                              
                          
                        </div>
                      </div>
                    </div>
                    </div>
                         <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="../../../../images/faces/face12.jpg" alt="sample image"> -->
                        <div class="media-body">
                          <!-- <h4 class="mt-0">John Doe</h4> -->
                          <p>
                              
                          </p>
                        </div>
                      </div>
                    </div>
                         <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="../../../../images/faces/face12.jpg" alt="sample image"> -->
                        <div class="media-body">
                          <!-- <h4 class="mt-0">John Doe</h4> -->
                          <p>
                              
                          </p>
                        </div>
                      </div>
                    </div>
                         <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="../../../../images/faces/face12.jpg" alt="sample image"> -->
                        <div class="media-body">
                          <!-- <h4 class="mt-0">John Doe</h4> -->
                          <p>
                              
                          </p>
                        </div>
                      </div>
                    </div>
                         <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="../../../../images/faces/face12.jpg" alt="sample image"> -->
                        <div class="media-body">
                          <!-- <h4 class="mt-0">John Doe</h4> -->
                          <p>
                              
                          </p>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
        </form>
        </div>
      </div>
    </div>

 