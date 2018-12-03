(function($) {
  'use strict';
  $(function() {

  	// Users
    if ($('#all-users-table').length) {
      $('#all-users-table').tablesort();
    }
    if ($('#normal-users-table').length) {
      $('#normal-users-table').tablesort();
    }
    if ($('#manager-users-table').length) {
      $('#manager-users-table').tablesort();
    }
    if ($('#chucvu-danh-sach').length) {
      $('#chucvu-danh-sach').tablesort();
    }
    
  });
})(jQuery);