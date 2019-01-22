<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
      <!-- <form action="<?php echo base_url()?>post/publish/index" method="post" enctype="multipart/form-data"> -->
        <div class="card">
              <div class="card-body">
                
                <!-- Chọn địa chỉ -->
                  <div class="form-group">
                    <label for="">Chọn nhà trọ</label>
                    <select class="form-control" id="nha-tro-dang-tin">
                      <option value="" >Chọn nhà trọ</option>
                      <?php foreach(@$nhatro as $nhatro_publish) { ?>
                        <option value=<?=$nhatro_publish->MANT?>><?=$nhatro_publish->TENNT?> - <?=$nhatro_publish->DCTD?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Địa chỉ nhà trọ</label>
                    
                  </div>
     
                <!-- Bản đồ -->
                <!-- <div class="map-container">
                  <div id="map-with-marker_nha_tro" class="google-map"></div>
                </div> -->
              </div>
            </div>
        <div class="row">
          <!-- Left side -->
          <div class="col-9">
            <!-- Thông tin cơ bản -->
            <div class="card">
              <div class="card-body">
                <h5  id="title-find">Thông tin cơ bản</h5>
                <div class="form-group">
                  <label for="exampleInputUsername1">Tiêu đề tin</label>
                  <input type="text" class="form-control" name="tieude" id="tieu-de-tin-dang-tin" placeholder="Tiêu đề tin" required>
                </div>

                <!-- Chuyên mục / Số điện thoại -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Diện tích</label>
                   <input type="text" class="form-control" name="gia" id="dientich" placeholder="m²" required>
                  </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Số điện thoại</label>
                      <input type="email" disabled class="form-control" id="so-dien-thoai-dang-tin" placeholder="Số điện thoại" value=<?='"'.$nguoidung->SDT.'"'?>>
                    </div>
                  </div>
                </div>

                <!-- Giá cho thuê / Đơn vị -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Giá cho thuê</label>
                      <input type="number" name="giachothue" class="form-control" id="gia-cho-thue-dang-tin" placeholder="Nhập giá nhà trọ" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Đơn vị</label>
                    <select class="form-control" id="don-vi-dang-tin">
                      <option selected="selected">Triệu/Tháng</option>
                      <option>Nghìn/Tháng</option>
                    </select>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Địa chỉ -->
            <div class="card">
              <div class="card-body">
                <h5 id="title-find">Địa chỉ</h4>
                <!-- Chọn địa chỉ -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Tỉnh/Thành phố</label>
                      <select class="form-control" name="tinhtp" id="tinh-thanh-pho-dang-tin">
                        <?php foreach(@$tinhtp as $tinhtp_publish) { ?>
                          <option value=<?=$tinhtp_publish->MATTP?>><?=$tinhtp_publish->TEN?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Quận/Huyện</label>
                      <select required class="form-control" name="quanhuyen" id="quan-huyen-dang-tin">
                        <?php foreach(@$quanhuyen as $quanhuyen_publish) {
                          if($quanhuyen_publish->MATTP == $tinhtp[0]->MATTP) { ?>
                            <option value=<?=$quanhuyen_publish->MAQH?>><?=$quanhuyen_publish->TEN?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Phường, Xã</label>
                      <select class="form-control" name="phuongxa" id="phuong-xa-dang-tin">
                        <?php foreach(@$phuongxa as $phuongxa_publish) {
                          if($phuongxa_publish->MAQH == $quanhuyen[0]->MAQH) { ?>
                            <option value=<?=$phuongxa_publish->MAPX?>><?=$phuongxa_publish->TEN?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Đường</label>
                      <select class="form-control" name="duong" id="duong-dang-tin">
                        <option value="non">Chọn Đường</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Địa chỉ chính xác</label>
                  <input type="text" class="form-control" name="dctd" id="dia-chi-chinh-xac-dang-tin" placeholder="Địa chỉ chính xác" required="required">
                </div>
                <!-- Bản đồ -->
                <!-- <div class="map-container">
                  <div id="map-with-marker" class="google-map"></div>
                </div> -->
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h4  id="title-find">Bản Đồ</h4>  
                <p>
                  <p style="margin-bottom: 10px; padding: 10px; border-radius: 5px;background-color: #dff0d8;">Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon <img style="width: 35px; height: 35px;border-style:none;" src="http://localhost/phongtro/img/local.png"> tới đúng vị trí của tin rao.</p></p>

                <div class="map-container">
                  <div id="map-nhatro" class="google-map"></div>
                </div>
              </div>
            </div>

            <!-- Thông tin nhà trọ -->
            

            <!-- Mô tả chi tiết -->
            <div class="card">
              <div class="card-body">
                <h5  id="title-find">Mô tả chi tiết</h5>
                <!-- Chọn địa chỉ -->
                <!-- <form class="forms-sample"> -->
                  <div class="form-group">
                    <label for="mo-ta-chi-tiet-dang-tin">Mô tả chi tiết</label>
                    <textarea class="form-control" name="mota" id="mo-ta-chi-tiet-dang-tin" rows="10"></textarea>
                  </div>
                <!-- </form> -->
              </div>
            </div>

            <!-- Hình ảnh -->

            <div class="card">
             <div class="card-body">
              <h4 class="card-title" id="title-find">
                   <h5  id="title-find">Hình Ảnh</h5>
                    <p></p>
                    <input type="file" id="userFiles" name="userFiles[]" onchange="lightgallery();" multiple/>             
              </h4>
              <div id="lightgallery">
                    <?php  if(!empty($images))
                                            foreach ($images as $ima) {
                                                ?>
                                                <a href='<?php echo base_url($ima); ?>' class="image-tile">
                                                <img src='<?php echo base_url($ima); ?>' class='subimage'>
                                                </a>
                                                <?php
                                            }
                                        ?>
                    
                  </div>
                  </div>
              </div>
            <div class="row" style="margin-left: 0">
              <select required class="form-control" id="chon">
                      <option value="" required>test</option>                      
                        <option value=1></option>
                
                    </select>
            </div>
            <!-- Publish Button -->
            <div class="row" style="margin-left: 0">
              <button type="" id="publish" name="dangtin" class="btn btn-primary mr-2">Đăng tin</button>
            </div>
            <div class="row" style="margin-left: 0">
              <button type="" id="test" name="dangtin1" class="btn btn-primary mr-2">Đăng tin test</button>
            </div>

             
          </div>


          <!-- Right Side -->
          <div class="col-3">
            <!-- Hướng dẫn đăng tin -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="title-reuslt">Hướng dẫn đăng tin</h4>
                  <ul class="right-side-list">
                    <!-- List here -->
                    <!-- --------------------------------------------------- -->
                    <!-- Start -->
                    <li>
                      <span>Thông tin có dấu (*) là bắt buộc.</span>
                    </li>
                    <li>
                      <span>Nội dung phải viết bằng tiếng Việt có dấu</span>
                    </li>
                    <li>
                      <span>Tiêu đề tin không dài quá 100 kí tự</span>
                    </li>
                    <!-- End -->
                  </ul>
                </div>
              </div>
            </div>

            <!-- Thông tin thanh toán -->
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="title-reuslt">Thông tin thanh toán</h4>
                  <!-- Thông tin thanh toán -->
                </div>
              </div>
            </div>
          </div>
        </div>
    
      <!-- </form> -->
    </div>
  </div>
</div>
<script>
  $(document).on('click', '#chon', function() {
      var id = 123;
      console.log('MANT: ', $(this).val());
      $.ajax({
      type: 'post',
      url: 'publish/showketqua',
      data: {
        id: id
      },
      success: function(data) {
        data = JSON.parse(data);
        console.log('data: ', data);
       },
      error: function(e) {
      console.log(e);
  }
});
});
</script>
<script>
var tinhtp = <?php echo json_encode($tinhtp) ?>;
var quanhuyen = <?php echo json_encode($quanhuyen) ?>;
var phuongxa  = <?php echo json_encode($phuongxa) ?>;
var diachitt = <?php echo json_encode($diachitt) ?>;
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
  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: position
  });
  $(document).on('change', '#nha-tro-dang-tin', function() {
    var id = $(this).val();
    console.log('MANT: ', $(this).val());
    $.ajax({
    type: 'post',
    url: 'publish/hienthint',
    data: {
      id: id
    },
    success: function(data) {
      data = JSON.parse(data);
      console.log('data: ', data);
      $("#tinh-thanh-pho-dang-tin").val(data.tinhtp[0].MATTP);
      //  Quan Huyen
      var content = '';
      if(data.motquanhuyen1.length > 0) {
        _.forEach(data.motquanhuyen1, function(quanhuyen, key) {
          content += "<option value=" + quanhuyen.MAQH + '>'+ quanhuyen.TEN + '</option><br>';
        });
      }
      else {
        content += '<option value="non">Chọn Quận / Huyện</option>';
      }
      $("#quan-huyen-dang-tin").html(content);
      // Phuong Xa
      content = '';
      if(data.maphuongxa1.length > 0) {
        _.forEach(data.maphuongxa1, function(phuongxa, key) {
          content += "<option value=" + phuongxa.MAPX + ">" + phuongxa.TEN + "</option>";
        });
      }
      else {
        content += '<option value="non">Chọn Phường, Xã</option>';
      }
      $("#phuong-xa-dang-tin").html(content);

      // Duong
      content = '';
      if(data.motduong1.length  > 0) {
        content += '<option value="non">Chọn Đường</option>';
        _.forEach(data.motduong1, function(duongpho) {
          content += '<option value=' + duongpho.MAD + '>' + duongpho.TEN + '</option>';
        });
      }
      else {
      content += '<option value="non">Chọn Đường</option>';
      }
      $("#duong-dang-tin").html(content);

      // Truyen tham so sau khi chon nha tro
      $("#quan-huyen-dang-tin").val(data.quanhuyen[0].MAQH);
      $("#phuong-xa-dang-tin").val(data.phuongxa[0].MAPX);
      if(data.diachitt.length > 0) 
      {
      $("#duong-dang-tin").val(data.diachitt[0].MAD);

      }
      if(data.getnhatro1.length > 0) 
      {
        $("#dia-chi-chinh-xac-dang-tin").val(data.getnhatro1[0].DCTD);
      }

      // Google Map
      if(marker) {
        marker.setMap(null);
      }
    
      // Nếu kinhdo và vido trong nhà trọ khác null
      if(data.position_gg.KINHDO != null && data.position_gg.VIDO != null) {
        position = {
          lat: parseFloat(data.position_gg.VIDO),
          lng: parseFloat(data.position_gg.KINHDO)
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
        $(document).on('change paste keyup click', '#dia-chi-chinh-xac-dang-tin', function() {
        var address = $("#dia-chi-chinh-xac-dang-tin").val();
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
    },
    error: function(e) {
      console.log(e);
    }

  });
});
}
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&libraries=places&callback=initMap"  async defer>   
 </script>
 

<script src="<?php echo base_url(); ?>assets/main/publish.js"></script>
<script src="<?php echo base_url(); ?>assets/main/map.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#luu').on('click', function(){
              var link;
              link = 'jsdhgajdhbahsd';
              //  var curLoc = currentLocation;
                //console.log();
                //alert(curLoc.lat() + ', ' + curLoc.lng());
                $.ajax({
                    type: "POST",
                    url: 'publish/index',
                  //  data: {vd: curLoc.lat(), kd: curLoc.lng()},
                    //dataType: 'json',
                    success:function(data){
                      console.log(data);
                        //$('#quanhuyen').html(data);
                        //$('#city').html('<option value="0">Select City</option>');
                        //$('#state').append('<option value="' + id + '">' + name + '</option>');
                        //console.log('Ok: dt');
                        //alert('ok');
                    },error: function(e) {
                      console.log(e);
                    }
                });
            });
        });
    </script>



<script>  
  function lightgallery() 
  {
   var total_file=document.getElementById("userFiles").files.length;
   $('#lightgallery').empty(); // loai hinh anh dau tien
   for(var i=0;i<total_file;i++)
   {

      $('#lightgallery').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' class='subimage'>");
   }
   //$('#lightgallery').lightGallery();
  }
</script>
<script >

    $(document).on('click', '#test', function() {
      var mant = $('#nha-tro-dang-tin').val();
      var tieude = $('#tieu-de-tin-dang-tin').val();
      var dientich = $('#dientich').val();
      var sdt = $('#so-dien-thoai-dang-tin').val();
      var gia = $('#gia-cho-thue-dang-tin').val();
      var donvi = $('#don-vi-dang-tin').val();
      var ttp =  $('#tinh-thanh-pho-dang-tin').val();
      var px =  $('phuong-xa-dang-tin').val();
      var qh =  $('quan-huyen-dang-tin').val();
      var dccx =  $('dia-chi-chinh-xac-dang-tin').val();
      var mota =  $('mo-ta-chi-tiet-dang-tin').val();
      var hinhanh =  $_FILES['userFiles']['name']');
          $.ajax({
            type: 'post',
            url: 'Publish/dangtin',
            data: {
                mant: mant,
                tieude: tieude,
                dientich: dientich,
                sdt :sdt,
                gia : gia,
                donvi : donvi,
                ttp :ttp,
                px : px,
                qh : qh,
                dccx : dccx,
                mota : mota,
                hinhanh :hinhanh
               },
            success: function(data) {
              data = JSON.parse(data);
              console.log('data: ', data);
              },
            error: function(e) {
                console.log(e);
              }
            });
        });
</script>




<style type="text/css">
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
  height: 150px;
  margin-right:  5px;
}
h5
{
  background-color:Lavender;
  height:45px;
  text-transform:uppercase;
  padding-top: 15px;
  padding-left: 5px;
  font-size: 16px;
  color: #000000;

}
</style>