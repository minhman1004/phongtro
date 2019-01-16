(function($) {
	'use strict';
	$(document).ready(function() {
		console.log('mand: ', mand);
		var nhatro = getAllNhaTro(mand);
		console.log('ds nhatro: ', nhatro);
	});

	function getAllNhaTro(mand) {
		var dsnhatro;
		$.ajax({
			type: 'post',
			url: 'forum/getAllNhaTro',
			async: false,
			dataType: 'json',
			data: {
				mand: mand
			},
			success: function(data) {
				dsnhatro = data;
			},
			error: function(e) {
				console.log(e);
			}
		});
		return dsnhatro;
	}

	if($("#select-nhatro").length) {
		$("#select-nhatro").select2();
	}

})(jQuery);