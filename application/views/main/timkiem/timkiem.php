<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
       <form action="<?php echo base_url()?>timkiem/lietkeqh" method="post" enctype="multipart/form-data"> 
          <div class="form-group">
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
            <div class="form-group">
              <label for="exampleInputUsername1">Địa chỉ chính xác</label>
              <input type="text" class="form-control" id="dia-chi-chinh-xac-modal" placeholder="Địa chỉ chính xác" required="required">
            </div>
            <div class="map-container">
                  <div id="map-nhatro" class="google-map"></div>
                </div>
            </div>
          </form>
    </div>
  </div>
</div>



<script>
  function initMap() {
         var map, position = {};
              position = {
                lat: 14.058324,
                lng: 108.277199
              }
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
  var contentString = "<div style ='width: 160px;height: 150px;'id='lightgaller'>"+                                    
  "<a href='http://localhost/phongtro/img/phong-tro.jpg' class='image-tile'>'"+
  "<img style = 'border: 1px solid #ddd;border-radius: 4px;padding: 5px; width: 150px;height: 100px;margin-right:  5px;' src='http://localhost/phongtro/img/phong-tro.jpg'>"+"<p style='color:#000000;'>Nhà trọ suối tiên</p>"+"<p  style='color:#000000;'>1.5 Triệu/tháng</p>" 
   "</div>";
  var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

            var marker = new google.maps.Marker({
              position: position,
              map: map,
              title: 'Test'
            });
            marker.addListener('click', function() {
              infowindow.open(map, marker);
            });
}
</script>
<script>
  $(document).on('change', '#tinh-thanh-pho-modal', function() {
      var idmttp = $(this).val();
      console.log('MATTP: ', $(this).val());
      $.ajax({
      type: 'post',
      url: 'timkiem/lietkeqh',
      data: {
        id: idmttp
      },
      success: function(data) 
      {
        data = JSON.parse(data);
        console.log('data: ', data)
        $("#quan-huyen-modal").html(content);
      // Phuong Xa
        var content = '';
            if(data.tinhqh.length > 0) {
              _.forEach(data.tinhqh, function(quanhuyen, key) {
                content += "<option value=" + quanhuyen.MAQH + ">" + quanhuyen.TEN + "</option>";
              });
            }
            else {
              content += '<option value="non">Chọn Quận, Huyện</option>';
            }
            $("#quan-huyen-modal").html(content);
            },
       // $("#quan-huyen-modal").val(data.tinhqh[0].MAQH);
      error: function(e) {
      console.log(e)
     }
    });
  });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaRUCOc4ddsl42iMKR588WkgYhpDuTSk&libraries=places&callback=initMap"  async defer>   
</script>