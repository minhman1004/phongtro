<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
        <div class="row">
          <!-- Left side -->
          <div class="col-9">
            <!-- Hình ảnh, Tên bài đăng, giá tiền, địa chỉ -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="detail-ten-bai-viet"><?php echo $chitiet[0]->TIEUDE?>
                  <?php if(isset($mand) || isset($chucvu)) { 
                    if($mand == $chitiet[0]->MAND || $chucvu == 'admin') { ?>
                      <a href="<?php echo base_url(); ?><?="post/update?name=".$slug?>" style="font-size: 12px;"> [Chỉnh sửa]</a>
                    <?php } ?>
                  <?php } ?>
                </h4>
                <p class="card-description">Địa chỉ: <?=$chitiet[0]->DCTD?></p>
                <p class="card-description">Giá: <?=number_format($chitiet[0]->GIA)?> VND</p>
                <p class="card-description">Ngày đăng: <?=date_format(new Datetime($chitiet[0]->TGDANG), 'd/m/Y')?></p>
                <p>Hình ảnh bài đăng</p>
                <div class="row" id="lightgallery">
                  <a href='<?php echo base_url(); ?>img/<?=$chitiet[0]->HINHANH?>'>
                  <img style= "padding-left: 15px; width: 740px;height: 480px" src='<?php echo base_url(); ?>img/<?=$chitiet[0]->HINHANH?>' class='subimage'>
                </div>
              </div>
            </div>
            <!-- Thông tin chung -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Thông tin chính</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5" style="text-align: right;">
                        <p>Giá</p>
                        <p>Diện tích</p>
                        <p>Số người tối đa</p>
                      </div>
                      <div class="col-md-7">
                        <p><?=number_format($chitiet[0]->GIA)?> VND</p>
                        <p><?=$chitiet[0]->DienTich?> m<sup>2</sup></p>
                        <p><?=$chitiet[0]->SLTD?> người</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5" style="text-align: right;">
                        <p>Camera</p>
                        <p>Bảo vệ</p>
                        <p>Chỗ giữ xe</p>
                      </div>
                      <div class="col-md-7">
                        <p><?php if($chitiet[0]->Camera == 'yes') echo 'Có'; else echo 'Không'; ?></p>
                        <p><?php if($chitiet[0]->Guard == 'yes') echo 'Có'; else echo 'Không'; ?></p>
                        <p><?php if($chitiet[0]->Parking == 'yes') echo 'Có'; else echo 'Không'; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Mô tả chi tiết -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Nội dung chi tiết</h4>
                <div class="media">
                  <div >
                    <p><?=$chitiet[0]->MOTATHEM?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Bản đồ -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Vị trí trên bản đồ</h4>
                <div class="map-container">
                  <div id="map-baiviet" class="google-map"></div>
                </div>
              </div>
            </div>
          </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Việc làm thêm cho sinh viên</h4>
                <div class="map-container">
                  <div id="map-baiviet_vieclam" class="google-map"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Side -->
          <div class="col-3">
            <!-- Thông tin người đăng -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row flex-wrap">
                    <div class="form-group">
                      
                      <h6><i class='mdi mdi-human-greeting menu-icon text-success mdi-18px'></i><?=$chitiet[0]->HOTEN?></h6>
                      <p class="text-muted"><i class='mdi mdi-cellphone-android menu-icon text-success mdi-18px'></i> <?=$chitiet[0]->SDT?></p>
                      <p class="text-muted"><i class='mdi mdi-email-check-outline
 menu-icon text-success mdi-18px  '></i> <?=$chitiet[0]->Email?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Khu vực tìm kiếm khác -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="title-reuslt">Các khu vực khác</h4>
                  <ul class="right-side-list">
                    <!-- List here -->
                    <!-- --------------------------------------------------- -->
                    <?php foreach($tinhtp as $tinhtp_right_side) { ?>
                      <li>
                        <a href=<?="/phongtro/home/location/".$tinhtp_right_side->MATTP?>>
                        <span class="menu-title"><?=$tinhtp_right_side->TEN?></span>
                      </a>
                      </li>
                    <?php } ?>
                    <!-- End -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    var baiviet = <?php echo json_encode($chitiet)?>;
    var slug = <?php echo json_encode($slug)?>;
    console.log("baiviet: ", baiviet);
    console.log("baiviet: ", slug);
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
      map = new google.maps.Map(document.getElementById('map-baiviet'), {
        center: position,
        zoom: 15
      });

      marker = new google.maps.Marker({
        map: map,
        position: position
      });

      // Delete marker
      if(marker) {
        marker.setMap(null);
      }

      if(baiviet[0].KINHDO != null && baiviet[0].VIDO != null) {
        map.setCenter({lat: parseFloat(baiviet[0].VIDO), lng: parseFloat(baiviet[0].KINHDO)});
        marker = new google.maps.Marker({
          map: map,
          position: {lat: parseFloat(baiviet[0].VIDO), lng: parseFloat(baiviet[0].KINHDO)}
        });
      }
      else {
        geocoder.geocode({'address': baiviet[0].DCTD}, function(results, status) {
          if(status === 'OK') {
            // Chuyển trung tâm map về result[0].geometry.location
            map.setCenter(results[0].geometry.location);
            // Sau khi chuyển trung tâm, thêm marker tại result[0].geometry.location
            marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
          }
          else {
            console.log(status);
          }
        });
      }
    }
  </script>

<script >
  





  
</script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&callback=initMap">
  </script>