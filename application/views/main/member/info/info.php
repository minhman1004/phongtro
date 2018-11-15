<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">  
          <form action="<?php ?>login" method="post"> 
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order status</h4>
                  <div class="d-flex table-responsive">
                    <div class="btn-group mr-2">
                      <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Add</button>
                    </div>
                    <div class="btn-group mr-2">
                      <button type="button" class="btn btn-light"><i class="mdi mdi-alert-circle-outline"></i></button>
                      <button type="button" class="btn btn-light"><i class="mdi mdi-delete-empty"></i></button>
                    </div>
                    <div class="btn-group mr-2">
                      <button type="button" class="btn btn-light"><i class="mdi mdi-printer"></i></button>
                    </div>
                    <div class="btn-group ml-auto mr-2 border-0 d-none d-md-block">
                      <input type="text" class="form-control" placeholder="Search Here">
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-light"><i class="mdi mdi-cloud"></i></button>
                      <button type="button" class="btn btn-light"><i class="mdi mdi-dots-vertical"></i></button>
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
                              <div class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-3">Sua</button>
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
                                      <p>Modal body text goes here.</p>
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
                    <p class="mb-3 mb-sm-0">Showing 1 to 20 of 20 entries</p>
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
        </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      var chiphi = <?php echo json_encode($chiphi) ?>;
      console.log("chi phi: ", chiphi);
    </script>