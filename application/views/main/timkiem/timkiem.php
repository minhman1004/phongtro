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
      <!--       <div class="form-group">
              <label for="exampleInputUsername1">Địa chỉ chính xác</label>
              <input type="text" class="form-control" id="dia-chi-chinh-xac-modal" placeholder="Địa chỉ chính xác" required="required">
            </div> -->
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
    $(document).on('change', '#quan-huyen-modal', function() {
      var maqh = $(this).val();
          $.ajax({
            type: 'post',
            url: 'timkiem/get_quanhuyenchange_ttp',
            data: {
                id: maqh
              },
            success: function(data) {
              data = JSON.parse(data);
              console.log('quan huyen: ', data);
              var map, toado = [];
              _.forEach(data.danhsach, function(vitri, key) {
                  var position = {
                    mabv : vitri.MABV,
                    mant: vitri.MANT,
                    kinhdo: vitri.KINHDO,
                    vido: vitri.VIDO,
                    hinhanh: vitri.HINHANH,
                    gia : vitri.gia,
                    SDT: vitri.sdt,
                    dientich :vitri.dientich,
                    slug :vitri.slug
                  };
                  toado.push(position);
              });

            
            var map = new google.maps.Map(document.getElementById('map-nhatro'), {
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

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    var contentString = "<div style ='width: 240px;height: 215px;'id='lightgaller'><a href=<?php echo base_url()?>post/detail?name="+toado[i].slug+"><img style = 'border: 1px solid #ddd;border-radius: 4px;padding: 5px; width: 220px;height: 150px;margin-right: 5px;' src='<?php echo base_url(); ?>img/"+toado[i].hinhanh+"'><p></p><p style='color:#000000;font-size: 14px;'><i class='mdi mdi-cellphone-android menu-icon text-success mdi-18px'></i> "+toado[i].SDT+"</p><p  style='color:#000000;font-size: 14px;'><i class='mdi mdi-cash menu-icon text-success mdi-18px '></i> "+toado[i].gia+" Nghìn/tháng</p></div>";
                  infowindow.setContent(contentString);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }
            },

            error: function(e) {
                console.log(e);
              }
            });
            });


    // $(document).on('change', '#quan-huyen-modal', function() {
    //   var maqh = $("#quan-huyen-modal").val();
    // });

    $.ajax({
    type: 'get',
    url: 'timkiem/get_allnhatro',
    dataType: 'json',
    success: function(data) {
      console.log('danh sach: ', data);
      var map, toado = [];
      _.forEach(data.danhsach, function(vitri, key) {
          var position = {
            mabv : vitri.MABV,
            mant: vitri.MANT,
            kinhdo: vitri.KINHDO,
            vido: vitri.VIDO,
            hinhanh: vitri.HINHANH,
            gia : vitri.gia,
            SDT: vitri.sdt,
            dientich :vitri.dientich,
            slug :vitri.slug
          };
          toado.push(position);
      });

    
    var map = new google.maps.Map(document.getElementById('map-nhatro'), {
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

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            var contentString = "<div style ='width: 240px;height: 215px;'id='lightgaller'><a href=<?php echo base_url()?>post/detail?name="+toado[i].slug+"><img style = 'border: 1px solid #ddd;border-radius: 4px;padding: 5px; width: 220px;height: 150px;margin-right: 5px;' src='<?php echo base_url(); ?>img/"+toado[i].hinhanh+"'><p></p><p style='color:#000000;font-size: 14px;'><i class='mdi mdi-cellphone-android menu-icon text-success mdi-18px'></i> "+toado[i].SDT+"</p><p  style='color:#000000;font-size: 14px;'><i class='mdi mdi-cash menu-icon text-success mdi-18px '></i> "+toado[i].gia+" Nghìn/tháng</p></div>";
          infowindow.setContent(contentString);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    },

    error: function(e) {
        console.log(e);
      }
    });
    };

  
</script>
<!-- <script >
  $("#tinh-thanh-pho-dang-tin").val(data.tinhtp[0].MATTP);
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
      },
      error: function(e) {
      console.log(e)
    }
  });
      //  Quan Huyen
      // var content = '';
      // if(data.motquanhuyen1.length > 0) {
      //   _.forEach(data.motquanhuyen1, function(quanhuyen, key) {
      //     content += "<option value=" + quanhuyen.MAQH + '>'+ quanhuyen.TEN + '</option><br>';
      //   });
      // }
      // else {
      //   content += '<option value="non">Chọn Quận / Huyện</option>';
      // }
      // $("#quan-huyen-dang-tin").html(content);


</script> -->

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