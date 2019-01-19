(function($) {
	'use strict';

	$(document).ready(function() {
		var nhatro = [], phongtro = [], nguoio = [];
	});

	function getNguoiTro(mapt) {
		$.ajax({
			type: 'post',
			url: 'rentors/getNguoiTro',
			dataType: 'json',
			data: {
				mapt: mapt
			},
			success: function(data) {

			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getDsNhaTro(mand) {
		$.ajax({
			type: 'post',
			url: 'rentors/getDsNhaTro',
			dataType: 'json',
			data: {
				mand: mand
			},
			success: function(data) {

			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getDsPhongTro(mant) {
		$.ajax({
			type: 'post',
			url: 'rentors/getDsPhongTro',
			dataType: 'json',
			data: {
				mant: mant
			},
			success: function(data) {

			},
			error: function(e) {
				console.log(e);
			}
		});
	}
})(jQuery);