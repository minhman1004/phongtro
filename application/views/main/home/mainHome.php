<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div style="padding-left: 1px" class="col-md-2">
          <div  class="form-group">
            <label>Tỉnh / TP</label>
            <select class="form-control" id="search-tinh-thanh-pho">
              <option value="all" selected>Tất cả</option>
              <?php foreach($tinhtp as $tinhtp_select) { ?>
                <option value=<?=$tinhtp_select->MATTP?>><?=$tinhtp_select->TEN?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Quận, huyện</label>
            <select class="form-control" id="search-quan-huyen">
              <option value="all" selected>Tất cả</option>
            </select>
          </div>
        </div>
      <!--   <div class="col-md-2">
          <div class="form-group">
            <label>Phường, xã</label>
            <select class="form-control" id="search-phuong-xa">
              <option value="all" selected>Tất cả</option>
            </select>
          </div>
        </div> -->
        <div class="col-md-2">
          <div class="form-group">
            <label>Mức giá</label>
            <select class="form-control" id="search-gia-thue">
              <option value="all" selected>Tất cả</option>
              <option value="1" >Dưới 1 triệu</option>
              <option value="12" >1 triệu - 2 triệu</option>
              <option value="2" >Trên 2 triệu</option>
            </select>
          </div>
        </div>
        <div style="width: 141px; padding-right: 10px" class="col-md-2">
          <div class="form-group">
            <label>Diện tích</label>
            <select class="form-control" id="search-dien-tich">
                   <option value="all" selected>Tất cả</option>
                   <option value="20" >Dưới 20 m2</option>
                   <option value="230" >20 m2 - 30 m2</option>
                   <option value="350" >30 m2 - 50 m2</option>          

            </select>
          </div>
        </div>

        <div class="col-md-1" style="padding-left: 10px">
          <div class="form-group">
          <button id ="search-thongtin" type="button" style="margin-top: 22px;" class="btn btn-primary">Tìm</button>
          </div>
        </div>
        <div class="col-md-1" style="padding-left: 10px">
          <div class="form-group">
          <a  href="timkiem" class="text-primary">
          <button id ="search-gg_maps" type="button" style="margin-top: 22px;" class="btn btn-primary">Tìm google maps</button>
          </a>
          </div>
        </div>
        <!-- <div class="col-md-2">
          <div class="form-group">
            <label>Sắp xếp theo</label>
            <select class="form-control" id="search-sort">
             <option value="all" selected>Ngày đăng mới</option>
             <option value="tiengiam" >Giá tiền giảm dần</option>
             <option value="tientang" >Giá tiền tăng dần</option>
             <option value="dtgiam" >Diện tích tăng dần</option>
             <option value="dttang" >Diện tích giảm dần</option>           

            </select>
          </div>
        </div> -->
      <?php if(isset($tentinh)) { ?>
        <div class="row">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Khu vực: <?=$tentinh->TEN?></li>
              <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            </ol>
          </nav>
        </div>
      <?php } ?>
      <div class="row">
        <!-- Left side -->
        <div style="width: 790.500px;height: auto" class="col-9">
          <div class="card">
            <div  class="card-body">
             
                <?php if($baiviet == false) { ?>
                  <h4 class="card-title" id="search-danh-sach-bai-viet">Không có kết quả nào</h4>
                <?php } else 
                { ?>
              
                <!-- <h4 class="card-title" id="search-danh-sach-bai-viet">Kết quả tìm kiếm</h4> -->
                <!-- Result list here -->
                <div id="danh-sach-bai-viet">
                  <?php foreach($baiviet as $ketqua_baiviet) { ?>
                    <a href="<?php echo base_url(); ?><?='post/detail?name='.$ketqua_baiviet->slug?>" class="post">
                      <div class="row">
                        <div class="col-md-4">
                          <img style=" border-radius: 8px;height: 170px;padding-bottom: 5px" class="thumnail" src="<?php echo base_url(); ?>img/<?=$ketqua_baiviet->HINHANH?>" alt="">
                          <p style="font-size: 15px">Giá: <?=number_format($ketqua_baiviet->GIA)?> VND</p>
                        </div>
                        <div style="padding-left: 28px; padding-top:10px " class="col-md-8">
                          <h4 style="color: hsl(89, 63%, 51%); font-size:20px;"><?=$ketqua_baiviet->TIEUDE?></h4>
                          <p><?=$ketqua_baiviet->DCTD?></p>
                          <p><?=$ketqua_baiviet->MOTATHEM?></p>
                          <p>Ngày đăng: <?php echo date_format(new Datetime($ketqua_baiviet->TGDANG), 'd/m/Y'); ?></p>
                        </div>
                      </div>
                    </a>
                    <hr>
                  <?php } ?>
                </div>
              <?php } ?>
            
              <!-- End post -->
            </div>
          </div>
        </div>
        <div style="width:  252.656px" class="col-3">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" id="title-reuslt">Các khu vực khác</h4>
                <ul class="right-side-list">
                  <!-- List here -->
                  <!-- --------------------------------------------------- -->
                  <?php foreach($tinhtp as $tinhtp_right_side) { ?>
                    <li>
                      <a href=<?="/phongtro/".$page."/location/".$tinhtp_right_side->MATTP?>>
                        <span class="menu-title"><?=$tinhtp_right_side->TEN?></span>
                        <!-- Lệnh lấy nội dung phải được viết liền <?=$tinhtp->TEN?> -->
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
</div>

<!-- Gán biến PHP cho hàm javascript -->
<script type="text/javascript">
  var tinhtp = <?php echo json_encode($tinhtp) ?>;
  var quanhuyen = <?php echo json_encode($quanhuyen) ?>;
  var phuongxa = <?php echo json_encode($phuongxa) ?>;
  var baiviet = <?php echo json_encode($baiviet) ?>;
  console.log("baiviet: ", baiviet);
</script>
<!-- Khai báo javascript cho từng trang riêng -->
<script src="<?php echo base_url(); ?>assets/main/home.js"></script>

<!-- <script>
     $(document).on('change', '#search-sort', function() {
      //var mattp = $(this).val();
          $.ajax({
            type: 'post',
            url: 'Home/search',
            // data: {
            //     id: mattp
            //   },
            success: function(data) {
              data = JSON.parse(data);
              console.log('quan huyen: ', data);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);
              $("#search-tinh-thanh-pho").val(data.baiviet[0].MATTP);





              

            },
            error: function(e) {
                console.log(e);
              }
            });
        });

</script>
 -->


<script >
    $(document).on('click', '#search-thongtin', function() {
      //$("#danh-sach-bai-viet").html('');
      var mattp = $("#search-tinh-thanh-pho").val();
      var mqh = $("#search-quan-huyen").val();
      var giathue = $("#search-gia-thue").val();
      var dientich = $("#search-dien-tich").val();
      //var mattp = $(this).val();
      window.location.replace('<?php echo base_url(); ?>home/search?mattp='+mattp+'&maqh='+mqh+'&giathue='+giathue+'&dientich='+dientich);
          // $.ajax({
          //   type: 'post',
          //   url: 'Home/search',
          //   data: {
          //       ttp: mattp,
          //       qh : mqh,
          //       gia :giathue,
          //       dientich :dientich
          //     },
          //   success: function(data) {
          //      // data = JSON.parse(data);
          //    console.log('thuan: ', data);
          //    window.location.replace('http://www.google.com');
           
          //     },
          //   error: function(e) {
          //       console.log(e);
          //     }
          //   });
        });

</script>