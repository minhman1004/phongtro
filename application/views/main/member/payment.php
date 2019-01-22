<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tạo hóa đơn thanh toán / Thông tin thanh toán</h4>
            <div class="d-flex table-responsive">
              <div class="form-group col-md-4">
              <select class="form-control" id="select-nhatro"></select>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <!-- Modal xem chi tiet thanh toan -->
              <div class="modal fade" id="modal-tao-thanhtoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ten-phongtro"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-2">
                          <label>Tháng</label>
                          <select id="thang" class="form-control">
                          </select>
                        </div>
                        <div class="form-group col-2">
                          <label>Năm</label>
                          <select id="nam" class="form-control">
                          </select>
                        </div>
                        <div class="form-group col-2">
                          <label>Số người đang ở</label>
                          <input type="text" id="so-nguoio" disabled class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-2">
                          <label>Cách tính</label>
                          <input type="text" id="cachtinh" disabled class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-2">
                          <label>Tiền trọ (VNĐ)</label>
                          <input type="text" id="tientro" disabled class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-3">
                          <label>Số điện cũ (ký)</label>
                          <input type="number" id="dien-cu" min="0" max="1000000" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-3">
                          <label>Số điện mới (ký)</label>
                          <input type='number' id="dien-moi" min="0" max="1000000" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-3">
                          <label>Số nước cũ (m<sup>3</sup>)</label>
                          <input type="number" id="nuoc-cu" min="0" max="1000000" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-3">
                          <label>Số nước mới (m<sup>3</sup>)</label>
                          <input type="number" id="nuoc-moi" min="0" max="1000000" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-3">
                          <label>Số người dùng Wifi</label>
                          <input type="number" id="so-wifi" min="0" max="100" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-3">
                          <label>Số lượng giữ xe (chung)</label>
                          <input type="number" id="so-gxe" min="0" max="100" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-2">
                          <label>Số lượng xe đạp</label>
                          <input type='number' id="so-xdap" min="0" max="100"  class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-2">
                          <label>Số lượng xe máy</label>
                          <input type="number" id="so-xmay" min="0" max="100" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-2">
                          <label>Số lượng Oto</label>
                          <input type="number" id="so-oto" min="0" max="100" class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-6" style="color:#ff0000;">
                          <p>LƯU Ý:</p>
                          <br>
                          <p>- "Số lượng giữ xe chung" nghĩa là một giá chung cho tất cả loại xe</p>
                          <p>- Cho bằng 0 nếu không phân loại giá theo từng loại xe.</p>
                          <p>- Giá wifi tính theo đầu người.</p>
                          <p>- Giá rác tính theo phòng.</p>
                        </div>
                        <div class="form-group col-6">
                          <label style="font-weight: bold;">Bảng giá tiêu dùng / dịch vụ</label>
                          <div class="row">
                            <div class="form-group col-3">
                              <label>Điện</label>
                              <input type="number" disabled id="chiphi-dien" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-3">
                              <label>Nước</label>
                              <input type="number" disabled id="chiphi-nuoc" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-3">
                              <label>Wifi</label>
                              <input type="number" disabled id="chiphi-wifi" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-3">
                              <label>Rác</label>
                              <input type="number" disabled id="chiphi-rac" class="form-control form-control-sm">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-3">
                              <label>Giữ xe (chung)</label>
                              <input type="number" disabled id="chiphi-gxe" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-3">
                              <label>Xe đạp</label>
                              <input type="number" disabled id="chiphi-xdap" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-3">
                              <label>Xe máy</label>
                              <input type="number" disabled id="chiphi-xmay" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-3">
                              <label>Oto</label>
                              <input type="number" disabled id="chiphi-oto" class="form-control form-control-sm">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary tao-thanhtoan-submit">Tạo</button>
                      <button type="button" class="btn btn-light tao-thanhtoan-cancel" data-dismiss="modal">Hủy</button>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table mt-3 border-top table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Phòng</th>
                    <th>Số người đang ở</th>
                    <th>Tiền trọ (VNĐ)</th>
                    <th>Cách tính</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody id="danhsach-phongtro">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách các thanh toán / hóa đơn</h4>
            <div class="d-flex table-responsive">
              <div class="form-group col-md-3">
                <select class="form-control" id="select-thang">
                  <option>Chọn nhà trọ</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <select class="form-control" id="select-thang">
                  <option>Chọn phòng trọ</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <select class="form-control" id="select-thang">
                  <option>Chọn Năm</option>
                </select>
              </div>              
              <div class="form-group col-md-2">
                <select class="form-control" id="select-thang">
                  <option>Chọn tháng</option>
                </select>
              </div>
              <div class="form-group col-md-1">
                <button class="btn btn-sm btn-primary" id="open-modal-add-nhatro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Xem</button>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <!-- Modal xem chi tiet thanh toan -->
              <div class="modal fade" id="modal-chitiet-thanhtoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
              <table class="table mt-3 border-top table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Phòng</th>
                    <th>Ngày</th>
                    <th>Đã trả</th>
                    <th>Phải trả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/main/mempayment.js"></script>
  <script>
    var mand = <?php echo json_encode($mand); ?>;
  </script>