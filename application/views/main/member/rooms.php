<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin" id="thongtin-nhatro">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách chung cư / Nhà trọ</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" id="open-modal-add-nhatro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm nhà trọ</button>
              <!-- Search -->
              <div class="form-group col-md-4">
              <select class="form-control" id="select-nhatro"></select>
              </div>
              <div class="btn-group">
                <button class="btn btn-sm btn-outline-primary" id="open-modal-thongtin-nhatro" style="height: 43px;"><i class="mdi mdi-open-in-app"></i> Xem nhà trọ</button>
                <button class="btn btn-sm btn-outline-primary" id="open-modal-add-chiphi" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm bảng chi phí</button>
                <button class="btn btn-sm btn-outline-primary" id="open-modal-add-phongtro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm phòng trọ</button>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table mt-3 border-top">
                <thread>
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Tiền trọ (VND)</th>
                    <th>Cách tính</th>
                    <th>Số người đang ở</th>
                    <th>Thao tác</th>
                  </tr>
                </thread>
                <tbody id="danh-sach-phongtro">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Modal -->
    <div>
      <!-- Modal xem chi tiet thanh toan -->
      <div class="modal fade" id="modal-chitiet-nguoio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

      <!-- Modal add bang gia -->
      <div class="modal fade" id="modal-add-chiphi" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel-2">Thêm bảng chi phí nhà trọ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Chọn chung cư, nhà trọ</label>
                  <select id="add-nhatro-chiphi" class="form-control form-control-sm add-nhatro-chiphi" style="width:100%">
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Tên bảng</label>
                  <input type="text" maxlength="100" class="form-control form-control-sm add-ten-chiphi" id="add-ten-chiphi">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Giá điện</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-dien">
                </div>
                <div class="form-group col-md-4">
                  <label>Giá nước</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-nuoc">
                </div>
                <div class="form-group col-md-4">
                  <label>Giá wifi</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-wifi">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Giá rác</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-rac">
                </div>
                <div class="form-group col-md-4">
                  <label>Giá giữ xe</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-giu-xe">
                </div>
                <div class="form-group col-md-4">
                  <label>Giá giữ xe đạp</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-giu-xe-dap">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Giá giữ xe máy</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-giu-xe-may">
                </div>
                <div class="form-group col-md-4">
                  <label>Giá giữ xe Ô tô</label>
                  <input type="number" min="0" class="form-control form-control-sm" id="add-gia-giu-xe-oto">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12" style="color:#ff0000;">
                  <label>* Chú ý:</label><br>
                  <label> - Đơn vị tính là Nghìn đồng (VND).</label><br>
                  <label> - Giá giữ xe: nếu không tính giá theo từng loại xe.</label><br>
                  <label> - Cho bằng 0 nếu không sử dụng.</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success add-chiphi-nhatro">Thêm</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End modal -->

      <!-- Modal de them, cap nhat nha tro -->
      <div class="modal fade" id="modal-thongtin-nhatro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel-2">Thông tin chung cư / nhà trọ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Tên</label>
                  <input type="text" maxlength="100" class="form-control form-control-sm add-ten-nhatro" id="add-ten-nhatro" placeholder="Nhập tên chung cư, nhà trọ ...">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label>Tỉnh / Thành phố</label>
                  <select id="add-tinh-thanhpho" class="form-control form-control-sm add-tinh-thanhpho">
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Quận / Huyện</label>
                  <select id="add-quan-huyen" class="form-control form-control-sm add-quan-huyen"></select>
                </div>
                <div class="form-group col-md-3">
                  <label>Phường / Xã</label>
                  <select id="add-phuong-xa" class="form-control form-control-sm add-phuong-xa"></select>
                </div>
                <div class="form-group col-md-3">
                  <label>Đường</label>
                  <select id="add-duong" class="form-control form-control-sm add-duong">
                    <option value="null">Chọn đường</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Địa chỉ chính xác: gồm số nhà và thông tin khác</label>
                  <input type="text" maxlength="300" class="form-control form-control-sm add-diachi-chinhxac" id="add-diachi-chinhxac">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 grid-margin">
                  <div class="row">
                    <!-- Camera -->
                    <div class="form-group col-md-4">
                      <label>Camera</label>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="camera" id="camera-yes" value="yes" checked>
                          Có
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="camera" id="camera-no" value="no">
                          Không
                        </label>
                      </div>
                    </div>
                    <!-- Guard -->
                    <div class="form-group col-md-4">
                      <label>Bảo vệ hoặc Chủ nhà</label>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="guard" id="guard-yes" value="yes" checked>
                          Có
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="guard" id="guard-no" value="no">
                          Không
                        </label>
                      </div>
                    </div>
                    <!-- Parking -->
                    <div class="form-group col-md-4">
                      <label>Nơi để xe</label>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="parking" id="parking-yes" value="yes" checked>
                          Có
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="parking" id="parking-no" value="no">
                          Không
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- Bảng chi phí -->
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label>Bảng chi phí: điện, nước, wifi, giữ xe, rác.</label>
                    </div>
                  </div>
                  <div class="row" id="danh-sach-chi-phi">
                    <div class="form-group col-md-8">
                      <label>Chọn bảng chi phí (*): </label>
                      <select id="bang-chi-phi" class="form-control form-control-sm" style="width:100%">
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Giá điện</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-dien">
                      <input type="number" disabled min="0" class="form-control form-control-sm" id="gia-dien-hide" hidden>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Giá nước</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-nuoc">
                      <input type="number" min="0" disabled class="form-control form-control-sm" id="gia-nuoc-hide" hidden>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Giá wifi</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-wifi">
                      <input type="number" min="0" disabled class="form-control form-control-sm" id="gia-wifi-hide" hidden>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Giá rác</label>
                      <input type="number" min="0" max="1000000" class="form-control form-control-sm" id="gia-rac">
                      <input type="number" min="0" disabled max="1000000" class="form-control form-control-sm" id="gia-rac-hide" hidden>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Giá giữ xe</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-giu-xe">
                      <input type="number" min="0" disabled class="form-control form-control-sm" id="gia-giu-xe-hide" hidden>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Giá giữ xe đạp</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-giu-xe-dap">
                      <input type="number" min="0" disabled class="form-control form-control-sm" id="gia-giu-xe-dap-hide" hidden>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Giá giữ xe máy</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-giu-xe-may">
                      <input type="number" min="0" disabled class="form-control form-control-sm" id="gia-giu-xe-may-hide" hidden>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Giá giữ xe Ô tô</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="gia-giu-xe-oto">
                      <input type="number" min="0" disabled class="form-control form-control-sm" id="gia-giu-xe-oto-hide" hidden>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12" style="color:#ff0000;">
                      <label>* Chú ý:</label><br>
                      <label> - Đơn vị tính là Nghìn đồng (VND).</label><br>
                      <label> - Giá giữ xe: nếu không tính giá theo từng loại xe.</label><br>
                      <label> - Cho bằng 0 nếu không sử dụng.</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin">
                  <label style="color:#ff0000; font-weight: bold">Hãy chọn vị trí trên bản đồ để có vị trí chính xác nhất.</label><br>
                  <div class="map-container">
                    <div id="map-nhatro" class="google-map"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success add-nha-tro" id="add-nha-tro">Thêm</button>
              <button type="button" class="btn btn-success update-nha-tro" id="update-nha-tro">Cập nhật</button>
              <button type="button" class="btn btn-light" id="cancel-nha-tro" data-dismiss="modal">Hủy</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End modal -->

      <!-- Modal add phong tro -->
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
                <div class="form-group col-md-4">
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
                <div class="form-group">
                  <label>Tính theo</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="cachtinh-phongtro" id="cachtinh-daunguoi" value="daunguoi" checked>Đầu người
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="cachtinh-phongtro" id="cachtinh-codinh" value="codinh">Cố định
                    </label>
                  </div>
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
              <button type="button" class="btn btn-success add-phongtro">Thêm</button>
              <button type="button" class="btn btn-light cancel-add" data-dismiss="modal">Hủy</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End modal -->

      <!-- Modal thong tin tro -->
      <div class="modal fade" id="modal-xem-phongtro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
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
                <div class="form-group col-md-4">
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
                <div class="form-group">
                  <label>Tính theo</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="cachtinh-phongtro" id="cachtinh-daunguoi" value="daunguoi" checked>Đầu người
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="cachtinh-phongtro" id="cachtinh-codinh" value="codinh">Cố định
                    </label>
                  </div>
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
              <button type="button" class="btn btn-success add-phongtro">Thêm</button>
              <button type="button" class="btn btn-light cancel-add" data-dismiss="modal">Hủy</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End modal -->
    </div>
    <!-- Ket thuc danh sach modal -->
    <div class="row grid-margin" id="thongtin-nguoitro">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách người trọ</h4>
            <select class="form-control col-md-6" id="select-phongtro">
            </select>
            <div class="table-responsive" style="overflow-x: auto;">
              <!-- Danh sach nguoi o tro -->
              <table class="table mt-3 border-top">
                <tbody>
                  <th>Tên *</th>
                  <th>CMND *</th>
                  <th>SDT *</th>
                  <th>Địa chỉ</th>
                  <th>Giới tính</th>
                  <th>Thao tác</th>
                </tbody>
                <tbody id="danhsach-nguoitro">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/main/memroom.js"></script>
  <script>
    var mand = <?php echo json_encode($mand); ?>;
  </script>