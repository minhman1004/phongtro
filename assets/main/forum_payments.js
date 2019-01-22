(function($) {
	'use strict';
	var nguoio = JSON.parse(localStorage.getItem('fr_nguoio'));

	$(document).ready(function() {
		var thongtintro = getThongTinTro(nguoio.MANO)[0];
		var phongtro = getPhongTro(thongtintro.MAPT);
		var hoadon = getHoaDon(phongtro[0].MAPT, thongtintro.NGAYO);
		console.log('hoadon',hoadon);
		showAllHoaDon(hoadon, phongtro[0]);
	});

	function getHoaDon(mapt, ngayo) {
		var hoadon;
		var thang = parseInt(ngayo.split('-')[1]);
		var nam = parseInt(ngayo.split('-')[0]);
		$.ajax({
			type: 'post',
			url: 'payments/getHoaDon',
			async: false,
			dataType: 'json',
			data: {
				mapt: mapt,
				thang: thang,
				nam: nam
			},
			success: function(data) {
				console.log(data);
				if(data != false) {
					hoadon = data;
				}
				else hoadon = [];
			},
			error: function(e) {
				console.log(e);
			}
		});
		return hoadon;
	}

	function showAllHoaDon(dshoadon, pt) {
		var content = '', ngaylap, trangthai;
		if(dshoadon.length > 0) {
			_.forEach(dshoadon, function(hd, key) {
				if(hd.MAPT == pt.MAPT) {
					if(hd.TrangThai == 'chuathanhtoan') trangthai = '<label class="badge badge-warning">Chưa thanh toán</label>';
					if(hd.TrangThai == 'dathanhtoan') trangthai = '<label class="badge badge-success">Đã thanh toán</label>';
					if(hd.TrangThai == 'dahuy') trangthai = '<label class="badge badge-danger">Đã hủy</label>';
					ngaylap = hd.NgayLap.split('-').reverse().join('/');
					content += '<tr>';
					content += '<td>'+(key+1)+'</td>';
					content += '<td>'+pt.Ten+'</td>';
					content += '<td>'+hd.SOTIEN+'</td>';
					content += '<td>'+ngaylap+'</td>';
					content += '<td>'+trangthai+'</td>';
					content += '</tr>';
				}
			});
		}
		$("#danhsach-hoadon").html(content);
	}

	function getPhongTro(mapt) {
		var phongtro;
		$.ajax({
			type: 'post',
			url: 'payments/getPhongTro',
			dataType: 'json',
			async: false,
			data: {
				mapt: mapt
			},
			success: function(data) {
				if(data != false) {
					phongtro = data;
				}
				else phongtro = [];
			}
		});
		return phongtro;
	}

	function getThongTinTro(mano) {
		var ttr;
		$.ajax({
			type: 'post',
			url: 'payments/getThongTinTro',
			dataType: 'json',
			async: false,
			data: {
				mano: mano
			},
			success: function(data) {
				if(data != false) {
					ttr = data;
				}
				else ttr = [];
			}
		});
		return ttr;
	}

})(jQuery);