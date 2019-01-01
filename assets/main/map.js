(function($) {
  'use strict';

      $(document).on('change', '#tinh-thanh-pho-dang-tin', function() {
        $('#dia-chi-chinh-xac-dang-tin').focus();
      });

      $(document).on('change', '#quan-huyen-dang-tin', function() {
        $('#dia-chi-chinh-xac-dang-tin').focus();
      });

      $(document).on('change', '#phuong-xa-dang-tin', function() {
        $('#dia-chi-chinh-xac-dang-tin').focus();
      });

      $(document).on('change', '#duong-dang-tin', function() {
        $('#dia-chi-chinh-xac-dang-tin').focus();
      });

})(jQuery);