<div class="main-panel">
  <div class="content-wrapper">
    <!-- Thống kê chung -->
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách chung cư / Nhà trọ</h4>
            <div class="d-flex table-responsive">
              <button class="btn btn-sm btn-primary" id="open-modal-add-nhatro" data-toggle="modal" data-target="#modal-add-nha-tro" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm</button>
              <!-- Search -->
              <div class="form-group col-md-6">
                <select id="search-chungcu-nhatro" class="form-control form-control-md" style="width:100%"></select>
              </div>
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-primary" id="open-modal-search-nhatro" style="height: 43px;"><i class="mdi mdi-open-in-app"></i> Xem</button>
                <!-- Open modal add chiphi -->
                <button class="btn btn-sm btn-outline-primary" id="open-modal-add-chiphi" style="height: 43px;"><i class="mdi mdi-plus-circle-outline"></i> Thêm bảng chi phí</button>
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
              <div class="modal fade" id="modal-add-nha-tro" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
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
                        <div class="form-group col-md-6">
                          <label>Chủ sở hữu</label>
                          <select id="add-chu-chungcu-nhatro" disabled class="form-control form-control-sm add-chu-chungcu-nhatro" style="width:100%">
                          </select>
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
            </div>
            <div class="table-responsive mt-2">
              <table class="table mt-3 border-top" id="danh-sach-nha-tro">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Chủ sở hữu</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($nhatro)) {
                    $count = 1;
                    foreach($nhatro as $nhatro_s) { ?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$nhatro_s->TENNT?></td>
                        <td>
                          <?php foreach($chutro as $chutro_f) {
                            if($chutro_f->MAND == $nhatro_s->MAND) {
                              echo $chutro_f->HOTEN;
                            }
                          }?>
                        </td>
                        <td title="<?=$nhatro_s->DCTD?>"><?=substr($nhatro_s->DCTD, 0, 50)?></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary edit-nhatro" data="<?=$nhatro_s->MANT?>">Xem</button>
                          <button class="btn btn-sm btn-outline-primary xemphong-nhatro" onclick="window.open('rooms/detail/<?=$nhatro_s->MANT?>', '_blank')" data="<?=$nhatro_s->MANT?>">DS Phòng</button>
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
  <script src="<?php echo base_url(); ?>assets/main/rooms.js"></script>
  <script src="<?php echo base_url(); ?>assets/main/rooms2.js"></script>

  <!-- Goooooooooogle map -->
  <script>
    var marker;
    function initMap() {
      // New map
      var map, position = {};
      position = {
        lat: 14.058324,
        lng: 108.277199
      }
      // New geocoder
      var geocoder = new google.maps.Geocoder();
      map = new google.maps.Map(document.getElementById('map-nhatro'), {
        center: position,
        zoom: 15
      });

      // Ajax: Khi click Xem nhà trọ khi này lấy được data tại button Xem là ID nhà trọ. Từ đó
      // Lấy được thông tin nhà trọ gồm kinh độ, vĩ độ. Sau đó xét để tạo bản đồ
      $(document).on('click', ".edit-nhatro", function() {
        id = $(this).attr('data');
        $.ajax({
          type: 'post',
          url: 'rooms/getPosition',
          data: {
            id: id
          },
          success: function(data) {
            data = JSON.parse(data);
            var lat = parseFloat(data.VIDO), lng = parseFloat(data.KINHDO);
            if(marker) {
              marker.setMap(null);
            }
            
            // Nếu kinhdo và vido trong nhà trọ khác null
            if(data.KINHDO != null && data.VIDO != null) {
              position = {
                lat: lat,
                lng: lng
              };
              map.setCenter(position);
              marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: position
              });
              google.maps.event.addListener(marker, 'position_changed', function() {
                $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
              });
              $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
            }
            // Nếu kinhdo và vido null
            else {
              // Lấy địa chỉ tại ô địa chỉ chính xác
              var address = $("#add-diachi-chinhxac").val();
              geocoder.geocode({'address': address}, function(results, status) {
                if(status === 'OK') {
                  // Chuyển trung tâm map về result[0].geometry.location
                  map.setCenter(results[0].geometry.location);
                  // Sau khi chuyển trung tâm, thêm marker tại result[0].geometry.location
                  marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: results[0].geometry.location
                  });
                  google.maps.event.addListener(marker, 'position_changed', function() {
                    $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
                  });
                  $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
                }
                else {
                  console.log(status);
                }
              });
            }
          },
          error: function(e) {
            console.log(e);
          }
        });
      });

      $(document).on('change paste keyup click', '#add-diachi-chinhxac', function() {
        var address = $("#add-diachi-chinhxac").val();
        geocoder.geocode({'address': address}, function(results, status) {
          if(status === 'OK') {
            if(marker) {
              marker.setMap(null);
            }
            // Chuyển trung tâm map về result[0].geometry.location
            map.setCenter(results[0].geometry.location);
            // Sau khi chuyển trung tâm, thêm marker tại result[0].geometry.location
            marker = new google.maps.Marker({
              map: map,
              draggable: true,
              animation: google.maps.Animation.DROP,
              position: results[0].geometry.location
            });
            google.maps.event.addListener(marker, 'position_changed', function() {
              $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
            });
            $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
          }
          else {
            console.log(status);
          }
        });
      });


      // Open modal for search nha tro
      $(document).on('click', '#open-modal-search-nhatro', function() {
        $("#modal-add-nha-tro").modal();
        $('#add-nha-tro').hide();
        $('#update-nha-tro').show();
        var chutro, tinhtp, quanhuyen, phuongxa, duong, id, nhatro, chiphi;
        id = $('#search-chungcu-nhatro').val();
        $('.update-nha-tro').attr('data', id);

        $("#danh-sach-chi-phi").attr('hidden', false);
        $("#gia-dien").val('0');
        $("#gia-nuoc").val('0');
        $("#gia-wifi").val('0');
        $("#gia-rac").val('0');
        $("#gia-giu-xe").val('0');
        $("#gia-giu-xe-dap").val('0');
        $("#gia-giu-xe-oto").val('0');
        $("#gia-giu-xe-may").val('0');

          $.ajax({
            type: 'post',
            url: 'rooms/getNhaTroVaDiaChi',
            data: {
              id: id
            },
            async: false,
            success: function(data) {
              data = JSON.parse(data);
              // console.log('data : ', data);
              nhatro = data.nhatro[0];
              chutro = data.chutro;
              tinhtp = data.tinhtp;
              quanhuyen = _.sortBy(data.quanhuyen, 'TEN');
              phuongxa = _.sortBy(data.phuongxa, 'TEN');
              duong = data.duong;
              chiphi = data.chiphi;
              // console.log('chiphi: ', chiphi);

              var content = '';

              // Chi phi
              if(chiphi.length > 0) {
                content += '<option selected disabled value="null">Chọn bảng giá</option>';
                _.forEach(chiphi, function(cp, key) {
                  if(cp.Selected == 'yes') {
                    content += '<option selected value="'+cp.MACP+'">'+cp.TENCP+'</option>';
                  }
                  else {
                    content += '<option value="'+cp.MACP+'">'+cp.TENCP+'</option>';
                  }
                });
                $("#bang-chi-phi").html(content);
                var chiphi_s = _.find(chiphi, {'Selected':'yes'});
                if(chiphi_s) {
                  $("#gia-dien").val(chiphi_s.GIADIEN);
                  $("#gia-nuoc").val(chiphi_s.GIANUOC);
                  $("#gia-wifi").val(chiphi_s.GiaWifi);
                  $("#gia-rac").val(chiphi_s.GiaRac);
                  $("#gia-giu-xe").val(chiphi_s.GiaGXe);
                  $("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
                  $("#gia-giu-xe-may").val(chiphi_s.XEMAY);
                  $('#gia-giu-xe-oto').val(chiphi_s.OTO);

                $("#gia-dien-hide").val(chiphi_s.GIADIEN);
                $("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
                $("#gia-wifi-hide").val(chiphi_s.GiaWifi);
                $("#gia-rac-hide").val(chiphi_s.GiaRac);
                $("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
                $("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
                $("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
                $('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
                }
                else {
                  chiphi_s = _.find(chiphi, {'MACP':$("#bang-chi-phi").val()});
                  if(chiphi_s) {
                    $("#gia-dien").val(chiphi_s.GIADIEN);
                    $("#gia-nuoc").val(chiphi_s.GIANUOC);
                    $("#gia-wifi").val(chiphi_s.GiaWifi);
                    $("#gia-rac").val(chiphi_s.GiaRac);
                    $("#gia-giu-xe").val(chiphi_s.GiaGXe);
                    $("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
                    $("#gia-giu-xe-may").val(chiphi_s.XEMAY);
                    $('#gia-giu-xe-oto').val(chiphi_s.OTO);

                  $("#gia-dien-hide").val(chiphi_s.GIADIEN);
                  $("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
                  $("#gia-wifi-hide").val(chiphi_s.GiaWifi);
                  $("#gia-rac-hide").val(chiphi_s.GiaRac);
                  $("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
                  $("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
                  $("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
                  $('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
                  }
                  else {
                    $("#gia-dien").val('0');
                    $("#gia-nuoc").val('0');
                    $("#gia-wifi").val('0');
                    $("#gia-rac").val('0');
                    $("#gia-giu-xe").val('0');
                    $("#gia-giu-xe-dap").val('0');
                    $("#gia-giu-xe-may").val('0');
                    $('#gia-giu-xe-oto').val('0');
                  }
                }
                content  = '';
                $(document).off("change").on('change', '#bang-chi-phi', function() {
                console.log('change');
                var cp = $(this).val();
                $.ajax({
                  type: 'post',
                  url: 'rooms/getChiPhi',
                  async: false,
                  data: {
                    id: cp
                  },
                  success: function(rs) {
                    rs = JSON.parse(rs).chiphi[0];
                    // console.log(rs);

                    $("#gia-dien").val(rs.GIADIEN);
                    $("#gia-nuoc").val(rs.GIANUOC);
                    $("#gia-wifi").val(rs.GiaWifi);
                    $("#gia-rac").val(rs.GiaRac);
                    $("#gia-giu-xe").val(rs.GiaGXe);
                    $("#gia-giu-xe-dap").val(rs.XEDAP);
                    $("#gia-giu-xe-may").val(rs.XEMAY);
                    $('#gia-giu-xe-oto').val(rs.OTO);

                    $("#gia-dien-hide").val(rs.GIADIEN);
                    $("#gia-nuoc-hide").val(rs.GIANUOC);
                    $("#gia-wifi-hide").val(rs.GiaWifi);
                    $("#gia-rac-hide").val(rs.GiaRac);
                    $("#gia-giu-xe-hide").val(rs.GiaGXe);
                    $("#gia-giu-xe-dap-hide").val(rs.XEDAP);
                    $("#gia-giu-xe-may-hide").val(rs.XEMAY);
                    $('#gia-giu-xe-oto-hide').val(rs.OTO);

                    console.log('DIEN: ', $("#gia-dien-hide").val());
                  },
                  error: function(e) {
                    console.log(e);
                  }
                });
              });
              }
              else {
                $("#danh-sach-chi-phi").attr('hidden', true);
              }

              // Danh sach chu tro
              if(chutro.length > 0) {
                _.forEach(chutro, function(ct, key) {
                  content += '<option value="'+ct.MAND+'">'+ct.HOTEN +' - '+ct.Email+'</option>';
                });
                $("#add-chu-chungcu-nhatro").html(content);
                content = '';
              }
              else {
                content += '<option value="null">Danh sách rỗng</option>';
                $(".add-chu-chungcu-nhatro").html(content);
                content = '';
              }


              // Danh sach tinh tp, quan huyen, phuong xa, duong xa
              if(tinhtp.length > 0) {
                _.forEach(tinhtp, function(tp, key) {
                  content += '<option value="'+tp.MATTP+'">'+tp.TEN+'</option>';
                });
                $(".add-tinh-thanhpho").html(content);
                content = '';
              }
              // Display data
              // console.log('nhatro: ', nhatro);
              $(".add-ten-nhatro").val(nhatro.TENNT);
              $('.add-chu-chungcu-nhatro').val(nhatro.MAND);
              $('.add-tinh-thanhpho').val(nhatro.MATTP);
              $('input[name=camera][value="'+nhatro.Camera+'"]').prop('checked', true);
              $('input[name=parking][value="'+nhatro.Parking+'"]').prop('checked', true);
              $('input[name=guard][value="'+nhatro.Guard+'"]').prop('checked', true);
              
              if(quanhuyen.length > 0) {
                var tp = $('.add-tinh-thanhpho').val();
                _.forEach(quanhuyen, function(qh, key) {
                  if(qh.MATTP == tp) {
                    content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
                  }
                });
                $(".add-quan-huyen").html(content);
                content = '';
              }

              $('.add-quan-huyen').val(nhatro.MAQH);
              
              if(phuongxa.length > 0) {
                var qh = $(".add-quan-huyen").val();
                // console.log('quan huyen: ', qh);
                _.forEach(phuongxa, function(px, key) {
                  if(px.MAQH == qh) {
                    content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>'; 
                  }
                });
                $(".add-phuong-xa").html(content);
                content = '';
              }

              $('.add-phuong-xa').val(nhatro.MAPX);
              
              if(duong.length > 0) {
                content += '<option value="null">Chọn đường</option>';
                var px = $('.add-phuong-xa').val();
                _.forEach(duong, function(d, key) {
                  if(d.MAPX == px) {
                    content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
                  }
                });
                $('.add-duong').html(content);
                content = '';
              }
              if(nhatro.MAD != null) {
                $('.add-duong').val(nhatro.MAD);
              }
              else {
                $('.add-duong').val('null');
              }

              diachichinhxac();
              $('.add-diachi-chinhxac').val(nhatro.DCTD);

              // Select change
              $(document).on('change', '.add-tinh-thanhpho', function() {
                if(quanhuyen.length > 0) {
                  var tp = $('.add-tinh-thanhpho').val();
                  _.forEach(quanhuyen, function(qh, key) {
                    if(qh.MATTP == tp) {
                      content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
                    }
                  });
                  $(".add-quan-huyen").html(content);
                  content = '';
                }
                if(phuongxa.length > 0) {
                  var qh = $(".add-quan-huyen").val();
                  // console.log('quan huyen: ', qh);
                  _.forEach(phuongxa, function(px, key) {
                    if(px.MAQH == qh) {
                      content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>'; 
                    }
                  });
                  $(".add-phuong-xa").html(content);
                  content = '';
                }
                if(duong.length > 0) {
                  content += '<option value="null">Chọn đường</option>';
                  var px = $('.add-phuong-xa').val();
                  _.forEach(duong, function(d, key) {
                    if(d.MAPX == px) {
                      content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
                    }
                  });
                  $('.add-duong').html(content);
                  content = '';
                }
                diachichinhxac();
              });

              $(document).on('change', '.add-quan-huyen', function() {
                if(phuongxa.length > 0) {
                  var qh = $(".add-quan-huyen").val();
                  // console.log('quan huyen: ', qh);
                  _.forEach(phuongxa, function(px, key) {
                    if(px.MAQH == qh) {
                      content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>'; 
                    }
                  });
                  $(".add-phuong-xa").html(content);
                  content = '';
                }
                if(duong.length > 0) {
                  content += '<option value="null">Chọn đường</option>';
                  var px = $('.add-phuong-xa').val();
                  _.forEach(duong, function(d, key) {
                    if(d.MAPX == px) {
                      content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
                    }
                  });
                  $('.add-duong').html(content);
                  content = '';
                }
                diachichinhxac();
              });

              $(document).on('change', '.add-phuong-xa', function() {
                if(duong.length > 0) {
                  content += '<option value="null">Chọn đường</option>';
                  var px = $('.add-phuong-xa').val();
                  _.forEach(duong, function(d, key) {
                    if(d.MAPX == px) {
                      content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
                    }
                  });
                  $('.add-duong').html(content);
                  content = '';
                }
                diachichinhxac();
              });

              $(document).on('change', '.add-duong', function() {
                diachichinhxac();
              });

              // Google map
              $.ajax({
                type: 'post',
                url: 'rooms/getPosition',
                data: {
                  id: id
                },
                success: function(data) {
                  data = JSON.parse(data);
                  var lat = parseFloat(data.VIDO), lng = parseFloat(data.KINHDO);
                  if(marker) {
                    marker.setMap(null);
                  }
                  
                  // Nếu kinhdo và vido trong nhà trọ khác null
                  if(data.KINHDO != null && data.VIDO != null) {
                    position = {
                      lat: lat,
                      lng: lng
                    };
                    map.setCenter(position);
                    marker = new google.maps.Marker({
                      map: map,
                      draggable: true,
                      animation: google.maps.Animation.DROP,
                      position: position
                    });
                    google.maps.event.addListener(marker, 'position_changed', function() {
                      $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
                    });
                    $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
                  }
                  // Nếu kinhdo và vido null
                  else {
                    // Lấy địa chỉ tại ô địa chỉ chính xác
                    var address = $("#add-diachi-chinhxac").val();
                    geocoder.geocode({'address': address}, function(results, status) {
                      if(status === 'OK') {
                        // Chuyển trung tâm map về result[0].geometry.location
                        map.setCenter(results[0].geometry.location);
                        // Sau khi chuyển trung tâm, thêm marker tại result[0].geometry.location
                        marker = new google.maps.Marker({
                          map: map,
                          draggable: true,
                          animation: google.maps.Animation.DROP,
                          position: results[0].geometry.location
                        });
                        google.maps.event.addListener(marker, 'position_changed', function() {
                          $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
                        });
                        $("#map-nhatro").attr('data', marker.getPosition().lat() + ','+ marker.getPosition().lng());
                      }
                      else {
                        console.log(status);
                      }
                    });
                  }
                },
                error: function(e) {
                  console.log(e);
                }
              });
            },
            error: function() {
              // console.log('error');
            }
          });
      });
    }

    function diachichinhxac() {
      var diachi, tinhtp, quanhuyen, phuongxa, duong;
      tinhtp = $('.add-tinh-thanhpho').children('option').filter(":selected").text();
      quanhuyen = $('.add-quan-huyen').children('option').filter(":selected").text();
      phuongxa = $('.add-phuong-xa').children('option').filter(":selected").text();
      if($('.add-duong').val() != 'null') {
        duong = $('.add-duong').children('option').filter(":selected").text();
        diachi = duong + ', ' + phuongxa + ', ' + quanhuyen + ', ' + tinhtp;
      }
      else {
        diachi = phuongxa + ', ' + quanhuyen + ', ' + tinhtp;
      }
      $('.add-diachi-chinhxac').val(diachi);
    }

  </script>

  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&callback=initMap">
  </script>