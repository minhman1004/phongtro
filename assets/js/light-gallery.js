(function($) {
  'use strict';

$(document).ready(function() {
  if ($("#lightgallery").length) {
    console.log('true');

    $("#lightgallery").lightGallery();
  }

  if ($("#lightgallery-without-thumb").length) {
    $("#lightgallery-without-thumb").lightGallery({
      thumbnail: true,
      animateThumb: false,
      showThumbByDefault: false
    });
  }

  if ($("#video-gallery").length) {
    $("#video-gallery").lightGallery();
  }
});
   
})(jQuery);