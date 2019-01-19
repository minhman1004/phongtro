<div class="main-panel">
  <div class="content-wrapper">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách các thanh toán / hóa đơn</h4>
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