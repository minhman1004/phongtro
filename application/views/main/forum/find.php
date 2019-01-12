<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <div class="row" style="margin-bottom: 1%">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                  <div>
                    <h3>Tìm kiếm</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label>Số CMND</label>
                <input type="text" id="login-cmnd" data-inputmask="'mask':'999999999'" class="form-control form-control-lg" placeholder="Số CMND">
              </div>
              <div class="form-group col-6">
                <label>Số điện thoại</label>
                <input type="text" id="login-sdt" class="form-control form-control-lg" placeholder="Số điện thoại" data-inputmask="'mask':'9999999999'">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <button type="button" id="login-button" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-account-search-outline menu-icon"></i> Xác nhận</button>
              </div>
            </div>
            <div class="row" style="margin-top: 1%">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between" style="color:#ff0000">
                  <div>
                    <h4>Lưu ý:</h4>
                    <h5>* Sử dụng CMND và Số điện thoại từng cung cấp cho chủ nhà trọ, phòng trọ để tìm kiếm và xem thông tin của phòng trọ.</h5>
                    <h5>* Vui lòng sử dụng số điện thoại theo định dạng mới gồm 10 số.</h5>
                    <h5>* Nếu tìm kiếm không có kết quả có thể do chủ nhà trọ không sử dụng dịch vụ của chúng tôi.</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4" id="ketquatimkiem">
        <div class="card">
          <div class="card-body">
            <div class="row" style="margin-bottom: 1%">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                  <div>
                    <h3>Kết quả tìm kiếm</h3>
                    <hr>
                    <h5 id="find-name"></h5>
                    <h5 id="find-cmnd"></h5>
                    <h5 id="find-gioitinh"></h5>
                    <div class="template-demo d-flex justify-content-between flex-nowrap">
                      <button type="button" class="btn btn-outline-dark btn-fw" id="delete-result">
                        <i class="mdi mdi-delete menu-icon"></i> Xóa kết quả</button>
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
  <script src="<?php echo base_url(); ?>assets/main/forum_find.js"></script>