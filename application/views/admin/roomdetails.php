<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-12">
        <button class="btn btn-sm btn-outline-warning btn-rounded"><i class="mdi mdi-arrow-left"></i> Nhà trọ trước
        </button>
        <button class="btn btn-sm ml-auto btn-outline-warning btn-rounded">Nhà trọ sau <i class="mdi mdi-arrow-right"></i></button>
      </div>
    </div>
    <div class="row grid-margin">
      <!-- Danh sach phong tro -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$nhatro[0]->TENNT?></h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" id="open-modal-add-phongtro" data-toggle="modal" data-target="#modal-add-phongtro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm
              </button>
              <!-- Modal xem, sua thong tin -->
              <div class="modal fade" id="modal-add-phongtro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-2">Thêm phòng trọ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Tên phòng</label>
                          <input type="text" maxlength="100" class="form-control form-control-sm ten-phongtro" id="ten-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Diện tích (m<sup>2</sup>)</label>
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm dientich-phongtro" id="dientich-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Số người ở tối đa (10)</label>
                          <input type="number" min="1" max="10" class="form-control form-control-sm nguoio-phongtro" id="nguoio-phongtro">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Tiền trọ (nghìn đồng)</label>
                          <input type="number" min="1" max="1000000000" class="form-control form-control-sm tientro-phongtro" id="tientro-phongtro">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label>Mô tả</label>
                          <textarea maxlength="500" class="form-control mota-phongtro" id="mota-phongtro" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-8" id="danhsach-nguoio">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success add-phongtro" data="<?=$nhatro[0]->MANT?>">Thêm</button>
                      <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
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

  <script src="<?php echo base_url(); ?>assets/main/roomdetails.js"></script>
    