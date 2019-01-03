<form action="<?php echo base_url(); ?>hinhanh/index" method="post" enctype="multipart/form-data">
       <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">light Gallery</h4>
                  <p class="card-text">
                    Click on any image to open in lightbox gallery
                  </p>
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
    


                        <div class="login-actions">                    
                              <button id="luu" name = 'fileSubmit' class="button btn btn-success btn-large">Lưu</button>
                    
                       </div> 
        
      
          </div>
</div>
</div>
</div>
</div>
</form>


</div>
</form>


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