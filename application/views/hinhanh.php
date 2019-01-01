<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Bread Crumb -->
     
      	 <div class="card">
                            <label for="hinhanh"><strong>Hình ảnh</strong></label>
                            <!-- HTML code for form element and preview image element -->
                            <div id="wrapper">
                                  <input type="file" id="userFiles" name="userFiles[]" onchange="preview_image();" multiple/>
                                  <!-- <input type="submit" name='submit_image' value="Upload Image"/> -->
                                 <div id="image_preview">
                                    <?  if(!empty($images))
                                            foreach ($images as $ima) {
                                                ?>
                                                <img src='<?php echo base_url($ima); ?>' class='subimage'>
                                                <?
                                            }
                                        ?>
                                 </div>
                                </div>
                        </div>
                        <div class="login-actions">
                    
                       <button id="luu" class="button btn btn-success btn-large">Lưu</button>
                    
             </div> 
      
  </div>
</div>
</div>
<!-- set image  -->


<script type="text/javascript">
        $(document).ready(function(){
            $('#luu').on('click', function(){
              //  var curLoc = currentLocation;
                //console.log();
                //alert(curLoc.lat() + ', ' + curLoc.lng());
                $.ajax({
                    type: "POST",
                    url: 'hinhanh/hinhanh',
                    success: function(data) {
                    	console.log('data: ',data);
                    },
                    error: function(e) {

                    }

                   
                });
            });
        });
</script>

   
    <!-- jQuery read image data and show preview code -->
    <script type="text/javascript">
    $(document).ready(function(){
        //Image file input change event
        $("#image").change(function(){
            readImageData(this);//Call image read and render function
        });
    });

    function readImageData(imgData){
        if (imgData.files && imgData.files[0]) {
            var readerObj = new FileReader();
            
            readerObj.onload = function (element) {
                $('#preview_img').attr('src', element.target.result);
            }
            
            readerObj.readAsDataURL(imgData.files[0]);
        }
    }
    </script>

<<script>
	
	function preview_image() 
	{
	 var total_file=document.getElementById("userFiles").files.length;
	 $('#image_preview').empty();
	 for(var i=0;i<total_file;i++)
	 {
	    $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' class='subimage'>");
	 }
	}
</script>