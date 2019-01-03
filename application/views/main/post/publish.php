<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
      <form action="<?php echo base_url()?>post/publish/index" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- Left side -->
          <div class="col-9">
            <!-- Thông tin cơ bản -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Thông tin cơ bản</h4>
                <div class="form-group">
                  <label for="exampleInputUsername1">Tiêu đề tin</label>
                  <input type="text" class="form-control" name="tieude" id="tieu-de-tin-dang-tin" placeholder="Tiêu đề tin" required>
                </div>

                <!-- Chuyên mục / Số điện thoại -->
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Chuyên mục tin</label>
                    <select class="form-control" id="chuyen-muc-tin-dang-tin">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
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
                      <input type="number" name="giachothue" class="form-control" id="gia-cho-thue-dang-tin" placeholder="Số điện thoại" required>
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
                <h4 class="card-title" id="title-find">Địa chỉ</h4>
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
                <h4 class="card-title" id="title-find">Bản Đồ</h4>               
                <div id="map" style="width: 100%; height: 300px"></div>
              </div>
            </div>

            <!-- Thông tin nhà trọ -->
            <div class="card">
              <div class="card-body">
                <?php if($nhatro == false) { ?>
                  <!-- Thêm nhà trọ mới nếu chưa có -->
                  <h4 class="card-title" id="title-find">Nhà trọ</h4>
                  <label for="">Bạn chưa có nhà trọ nào trong danh sách</label>
                  <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalLabel">Thông tin nhà trọ</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="exampleInputUsername1">Tên nhà trọ</label>
                              <input type="text" class="form-control" id="ten-nha-tro-modal" placeholder="Tên nhà trọ" required="required">
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect2">Tỉnh/Thành phố</label>
                                  <select class="form-control" id="tinh-thanh-pho-modal">
                                    <?php foreach(@$tinhtp as $tinhtp_publish) { ?>
                                      <option value=<?=$tinhtp_publish->MATTP?>><?=$tinhtp_publish->TEN?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect2">Quận/Huyện</label>
                                  <select required class="form-control" id="quan-huyen-modal">
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
                                  <select class="form-control" id="phuong-xa-modal">
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
                                  <select class="form-control" id="duong-modal">
                                    <option value="non">Chọn Đường</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputUsername1">Địa chỉ chính xác</label>
                              <input type="text" class="form-control" id="dia-chi-chinh-xac-modal" placeholder="Địa chỉ chính xác" required="required">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" id="them-nha-tro-moi-modal">Thêm mới</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button style="display: block" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@mdo">Thêm nhà trọ mới</button>
                <?php } else { ?>
                <!-- Chọn địa chỉ -->
                  <div class="form-group">
                    <label for="">Chọn nhà trọ</label>
                    <select required class="form-control" id="nha-tro-dang-tin">
                      <option value="" required>Chọn nhà trọ</option>
                      <?php foreach(@$nhatro as $nhatro_publish) { ?>
                        <option value=<?=$nhatro_publish->MANT?>><?=$nhatro_publish->TENNT?> - <?=$nhatro_publish->DCTD?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Địa chỉ nhà trọ</label>
                    <input type="text" class="form-control" id="dia-chi-nha-tro" placeholder="Địa chỉ nhà trọ" required="required" disabled>
                  </div>
                <?php } ?>
                <!-- Bản đồ -->
                <!-- <div class="map-container">
                  <div id="map-with-marker_nha_tro" class="google-map"></div>
                </div> -->
              </div>
            </div>

            <!-- Mô tả chi tiết -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Mô tả chi tiết</h4>
                <!-- Chọn địa chỉ -->
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="mo-ta-chi-tiet-dang-tin">Mô tả chi tiết</label>
                    <textarea class="form-control" name="mota" id="mo-ta-chi-tiet-dang-tin" rows="10"></textarea>
                  </div>
                </form>
              </div>
            </div>

            <!-- Hình ảnh -->

            <div class="card">
                            <label for="hinhanh"><strong>Hình ảnh</strong></label>
                            <!-- HTML code for form element and preview image element -->
                            <div id="wrapper">
                                  <input type="file" id="userFiles" name="userFiles[]" onchange="preview_image();" multiple/>
                    <div id="lightgallery" class="row lightGallery">
                                 <div id="image_preview">
                                    <?  if(!empty($images))
                                            foreach ($images as $ima) {
                                                ?>
                                                <a href='<?php echo base_url($ima); ?>' class="image-tile">
                                                <img src='<?php echo base_url($ima); ?>' class='subimage'>
                                                </a>
                                                <?
                                            }
                                        ?>
                                 </div>
                    </div>
                        </div> 
                  </div>
    
                      <!-- /field -->
            <!-- <div class="card">
              <div class="card-body">
                <h4 class="card-title d-flex">Hình ảnh</h4>
                <div class="dropify-wrapper">
                  <div class="dropify-message">
                    <span class="file-icon"></span>
                    <p>Kéo thả hình ảnh hoặc click vào đây</p>
                    <p class="dropify-error">Có lỗi xảy ra, vui lòng thử lại.</p>
                  </div>
                  <div class="dropify-loader"></div>
                  <div class="dropify-errors-container">
                    <ul></ul>
                  </div>
                  <input type="file" class="dropify">
                  <button type="button" class="dropify-clear">Xóa</button>
                  <div class="dropify-preview">
                    <span class="dropify-render"></span>
                    <div class="dropify-infos">
                      <div class="dropify-infos-inner">
                        <p class="dropify-filename">
                          <span class="file-icon"></span> 
                          <span class="dropify-filename-inner"></span></p>
                          <p class="dropify-infos-message">Kéo thả hoặc click vào để thay thế</p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div> -->

            <!-- Hình thức đăng tin -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-find">Hình thức đăng tin</h4>
                <hr>
                <!-- Bảng giá đăng tin -->
                <h5 class="card-title" id="title-find">Bảng giá</h5>
                <!-- Hình thức đăng tin -->
                <h5 class="card-title" id="title-find">Hình thức</h5>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Loại tin</label>
                      <select class="form-control" id="loai-tin-dang-tin">
                        <option disabled="disabled" selected="selected">Chọn loại tin</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Gói thời gian</label>
                      <select class="form-control" id="goi-thoi-gian-dang-tin">
                        <option disabled="disabled" selected="selected">Chọn gói thời gian</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Số tháng</label>
                      <select class="form-control" id="so-thang-dang-tin">
                        <option disabled="disabled" selected="selected">Chọn số tháng</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Thông tin thanh toán -->
                <h5 class="card-title" id="title-find">Thông tin thanh toán</h5>
              </div>
            </div>

            <!-- Publish Button -->
            <div class="row" style="margin-left: 0">
              <button type="submit" id="publish" name="dangtin" class="btn btn-primary mr-2">Đăng tin</button>
            </div>
            <div class="login-actions">
                    
                        <button id="luu" class="button btn btn-success btn-large">Lưu</button>
                    
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
      </form>
    </div>
  </div>
</div>
<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


      var currentLocation;
      var marker;
      var myLatLng = {lat: -34.397, lng: 150.644};

      function initAutocomplete() {
       
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 15,
          mapTypeId: 'roadmap'
        });
        marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    //draggable: true //make it draggable
                });
        // Create the search box and link it to the UI element.
        var input = document.getElementById('dia-chi-chinh-xac-dang-tin');
        $("dia-chi-chinh-xac-dang-tin").change(function(){
            input = document.getElementById('dia-chi-chinh-xac-dang-tin');
            var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });
          });
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          //Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          
          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.location,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            //Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              animation: google.maps.Animation.DROP,
              title: place.name,
              position: place.geometry.location
            }));
            

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);

        });
        function clearLocations() {
            info_Window = new google.maps.InfoWindow();
            info_Window.close();
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers.length = 0;
        }
        
        //Listen for any clicks on the map.
        google.maps.event.addListener(map, 'click', function(event) { 

            clearLocations();
            //Get the location that the user clicked.
            var clickedLocation = event.latLng;
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            // console.log( latitude + ', ' + longitude );
            //If the marker hasn't been added.
            if(marker == undefined){
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    //draggable: true //make it draggable
                });
               
            } else{
                //Marker has already been added, so just change its location.
                marker.setPosition(clickedLocation);
            }
            map.setCenter(clickedLocation);
            //Get the marker's location.
            markerLocation();
        });

        function markerLocation(){
            //Get location.
            currentLocation = marker.getPosition();
            var lt, ln;
            lt = currentLocation.lat();
            ln = currentLocation.lng();
            console.log(lt + ' - ' + ln);
           
            $.ajax({
                type: "POST",
                //url: "<?php echo site_url('caidat/update_toado'); ?>",
                data: {vd: currentLocation.lat(), kd: currentLocation.lng()},
                //dataType: 'json',
                success:function(data){
                    //$('#quanhuyen').html(data);
                    //$('#city').html('<option value="0">Select City</option>');
                    //$('#state').append('<option value="' + id + '">' + name + '</option>');
                    //console.log('Ok: dt');
                    //alert('ok');
                }
                
            });
        };
      }

    </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&libraries=places&callback=initAutocomplete"  async defer>   
 </script>
 <style type="text/css">
    input{
        width: 100%;
    }
    .wrap{width: 100%;margin-bottom: 20px;}
    .gallery{ width:100%; float:left; margin-top:30px;}
    .gallery ul{ margin:0; padding:0; list-style-type:none;}
    .gallery ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
    .gallery img{ width:250px;}
    .none{ display:none;}
    .upload_div{ margin-bottom:50px;}
    .uploading{ margin-top:15px;}
    .form_box{width:500px; margin:0 auto; margin-top:10px; margin-bottom: 40px; text-align: left;}
    .fileinput{margin-left: 10px;}
    .image_preview{width: 100%;background-position: center center;background-repeat: no-repeat;overflow: hidden;}
    .subimage{width: 100px; height: 100px; padding-left: 10px;}
</style>
<script type="text/javascript">
  var tinhtp = <?php echo json_encode($tinhtp) ?>;
  var quanhuyen = <?php echo json_encode($quanhuyen) ?>;
  var phuongxa  = <?php echo json_encode($phuongxa) ?>;
  var diachitt = <?php echo json_encode($diachitt) ?>;
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
  function preview_image() 
  {
   var total_file=document.getElementById("userFiles").files.length;
   $('#lightgallery').empty();
   for(var i=0;i<total_file;i++)
   {
      $('#lightgallery').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' class='subimage'>");
   }
  }
</script>