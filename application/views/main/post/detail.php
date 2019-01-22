<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
        <div class="row">
          <!-- Left side -->
          <div class="col-9">
            <!-- Hình ảnh, Tên bài đăng, giá tiền, địa chỉ -->
            <div style="border: 1px solid #ddd;overflow-wrap: break-word;
    word-wrap: break-word;word-break: break-word; margin-bottom: 10px;" class="card">
              <div style="border-bottom: 1px solid #eee;" class="card-body">

                
                <h4 style="font-size: 26px;color: red; padding-bottom: 12px" class="card-title" id="detail-ten-bai-viet"><?php echo $chitiet[0]->TIEUDE?>
                  <?php if(isset($mand) || isset($chucvu)) { 
                    if($mand == $chitiet[0]->MAND || $chucvu == 'admin') { ?>
                      <a href="<?php echo base_url(); ?><?="post/update?name=".$slug?>" style="font-size: 12px;"> [Chỉnh sửa]</a>
                    <?php } ?>
                  <?php } ?>
                </h4>
             
              <!-- <div style="float: left; width: 50%; background: #f9f9f9;"> -->
                <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;">Địa chỉ : </p>
                <p style="font-size: 16px;padding-left: 15px;background: #fff;margin-left: 80px;min-height: 37px;
    "><?=$chitiet[0]->DCTD?></p>
                

                <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;">Giá:</p>
                 <p style="font-size: 16px;padding-left: 15px;background: #fff;margin-left: 80px;min-height: 37px;
                   "><?=number_format($chitiet[0]->GIA)?> VND</p>
                
                 <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;">Ngày đăng:</p>
                 <p style="font-size: 16px;padding-left: 15px;background: #fff;margin-left: 80px;min-height: 37px;
                   "><?=date_format(new Datetime($chitiet[0]->TGDANG), 'd/m/Y')?> VND</p>

                  <!-- <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;">Diên tích:</p> --> <!-- <p style="font-size: 16px;padding-left: 15px;background: #fff;margin-left: 80px;min-height: 37px;
                   "><?=date_format(new Datetime($chitiet[0]->dientich), 'd/m/Y')?></p>
              -->
                <div class="row" id="lightgallery">
                  <a href='<?php echo base_url(); ?>img/<?=$chitiet[0]->HINHANH?>'>
                  <img style= "padding-left: 15px; width: 780px;height: 480px" src='<?php echo base_url(); ?>img/<?=$chitiet[0]->HINHANH?>' class='subimage'>
                    </a>
                </div>
              </div>
            </div>
            <!-- Thông tin chung -->
            <!-- <div class="card">
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
 -->
            <!-- Mô tả chi tiết -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Nội dung chi tiết</h4>
                <div class="media">
                  <div >
                    <p style = "text-overflow:ellipsis;"><?=$chitiet[0]->MOTATHEM?></p>
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
               <div  class="card-body"> 
                <h4 class="card-title" id="title-find">Thông tin thêm về nhà trọ</h4>            
                <?php if($tt == false) { ?>
                  <h4 class="card-title" id="search-danh-sach-bai-viet">Không có kết quả nào</h4>
                <?php } else 
                { ?>
                <div id="danh-sach-bai-viet">
                 <?php foreach($tt as $tt_ketqua) { ?>
                      <div class="row">
                 <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;padding-left: 50px">Tên phòng:</p>
                 <p style="font-size: 16px;padding-left: 15px;background: #fff;
                   "><?=($tt_ketqua->Ten)?></p>
                  <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;padding-left: 50px">Số lượng đang ở:</p>
                 <p style="font-size: 16px;padding-left: 15px;background: #fff;min-height: 37px;
                   "><?=($tt_ketqua->SLNDO)?></p>
                  <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;padding-left: 50px">Giá:</p>
                 <p style="font-size: 16px;padding-left: 15px;background: #fff;min-height: 37px;
                   "><?=number_format($tt_ketqua->GIA)?> VND</p>
                
                 <p style="width: auto;padding-top: 3px; float: left;font-size: 16px; font-weight: 700;padding-left: 50px">Diện Tích:</p>
                 <p style="font-size: 16px;padding-left: 15px;background: #fff;min-height: 37px;
                   "><?=($tt_ketqua->DienTich)?> M2</p>

                        </div>
                  <?php } ?>
                </div>
              <?php } ?>
            
              <!-- End post -->
            </div>
            </div>
          </div>

            <!-- <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Việc làm thêm cho sinh viên</h4>
                <div class="map-container">
                  <div id="map-baiviet_vieclam" class="google-map"></div>
                </div>
              </div>
            </div> -->
          

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
    var vieclam = <?php echo json_encode($vieclam)?>;
    var slug = <?php echo json_encode($slug)?>;
    console.log("baiviet: ", baiviet);
    console.log("vieclam: ", vieclam);
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
        var infowindow = new google.maps.InfoWindow();

       var  toado = [];
       for (i = 0; i < vieclam.length; i++) { 
                  var position = {
                    mabv : vieclam[i].MABV,
                    mant: vieclam[i].MANT,
                    kinhdo: vieclam[i].KINHDO,
                    vido: vieclam[i].VIDO,
                    hinhanh: vieclam[i].HINHANH,
                    link1  : vieclam[i].LINK,
                    MOTA: vieclam[i].MOTA
                  };
                  toado.push(position);
              };
     for (i = 0; i < toado.length; i++) { 
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(toado[i].vido, toado[i].kinhdo),
                map: map, 
                icon:"<?php echo base_url(); ?>img/thuan.png"
              });

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    var contentString = "<div style ='width: 240px;height: auto;'id='lightgaller'><a href="+toado[i].link1+"><img style = 'border: 1px solid #ddd;border-radius: 4px;padding: 5px; width: 220px;height: 150px;margin-right: 5px;' src='<?php echo base_url(); ?>img/"+toado[i].hinhanh+"'><p></p><p style='color:#000000;font-size: 14px;'><i class='mdi mdi-message-processing menu-icon text-success mdi-18px'></i> "+toado[i].MOTA+"</p>";
                  infowindow.setContent(contentString);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }

    }
</script>

<!-- <script type="text/javascript">
    var baiviet = <?php echo json_encode($chitiet)?>;
    var vieclam = <?php echo json_encode($vieclam)?>;
    var slug = <?php echo json_encode($slug)?>;
    console.log("baiviet: ", baiviet);
    console.log("vieclam: ", vieclam);
    console.log("baiviet: ", slug);
    function thuan() {

    var map, toado = [];
       for (i = 0; i < vieclam.length; i++) { 
                  var position = {
                    mabv : vieclam[i].MABV,
                    mant: vieclam[i].MANT,
                    kinhdo: vieclam[i].KINHDO,
                    vido: vieclam[i].VIDO,
                    hinhanh: vieclam[i].HINHANH,
                    link  : vieclam[i].LINK,
                    MOTA: vieclam[i].MOTA
                  };
                  toado.push(position);
              };
    var geocoder = new google.maps.Geocoder();

    var map = new google.maps.Map(document.getElementById('map-thuan'), {
      zoom: 12,
      center: new google.maps.LatLng(10.8546085, 106.7181448),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < toado.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(toado[i].vido, toado[i].kinhdo),
        map: map, 
       //icon:"img/thuan.png"
      });

    //   google.maps.event.addListener(marker, 'click', (function(marker, i) {
    //     return function() {
    //         var contentString = "<div style ='width: 240px;height: 215px;'id='lightgaller'><a href=<?php echo base_url()?>post/detail?name="+toado[i].slug+"><img style = 'border: 1px solid #ddd;border-radius: 4px;padding: 5px; width: 220px;height: 150px;margin-right: 5px;' src='<?php echo base_url(); ?>img/"+toado[i].hinhanh+"'><p></p><p style='color:#000000;font-size: 14px;'><i class='mdi mdi-cellphone-android menu-icon text-success mdi-18px'></i> "+toado[i].SDT+"</p><p  style='color:#000000;font-size: 14px;'><i class='mdi mdi-cash menu-icon text-success mdi-18px '></i> "+toado[i].gia+" Nghìn/tháng</p></div>";
    //       infowindow.setContent(contentString);
    //       infowindow.open(map, marker);
    //     }
    //   })(marker, i));
    // }
  }
  }
  
</script> -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&callback=thuan">
</script> -->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&callback=initMap">
</script>