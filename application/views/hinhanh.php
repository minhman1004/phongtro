<form action="<?php echo base_url(); ?>hinhanh/index" method="post" enctype="multipart/form-data">

<div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <p class="card-text">
                    <input type="file" id="userFiles" name="userFiles[]" onchange="lightgallery();" multiple/>             
                  </p>
                  <div id="lightgallery" >
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
                  <div class="login-actions">                    
                              <button id="luu" name = 'fileSubmit' class="button btn btn-success btn-large">Lưu</button>
                    
                       </div> 
        
                </div>
              </div>
            </div>
          </div>
          
    </div>
   
</form>


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
<style type="text/css">
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
  height: 150px;
  margin-right:  5px;
}
</style>
