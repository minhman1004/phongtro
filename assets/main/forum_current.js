(function($) {
'use strict';
	$(document).ready(function() {
		var nhatro, phongtro, tientro, chiphi, chutro, thongtintro, ngayht, ngayDaO;
		var nguoio = JSON.parse(localStorage.getItem('fr_nguoio'));
		var rs = getPhongTroNhaTro(nguoio.MAPT, nguoio.MANO);
		var ngayo;
		phongtro = rs.phongtro[0];
		nhatro = rs.nhatro[0];
		chutro = rs.chutro[0];
		thongtintro = rs.thongtintro[0];
		tientro = getTienTro(phongtro.MAPT, phongtro.MATT)[0];
		chiphi = getChiPhi(nhatro.MANT)[0];
		ngayo = new Date(thongtintro.NGAYO);
		ngayht = new Date();

		localStorage.setItem('fr_mano', nguoio.MANO);
		localStorage.setItem('fr_mant', nhatro.MANT);
		$.cookie('nguoio', JSON.stringify(nguoio));
		$.cookie('phongtro', JSON.stringify(phongtro));
		console.log('nguoio: ', nguoio);

		$("#current-tennhatro").text('Nhà trọ: '+nhatro.TENNT);
		$("#current-chutro").text('Chủ trọ: '+chutro.HOTEN);
		$("#current-tenphong").text('Phòng: '+phongtro.Ten);
		$("#current-ngayo").text('Ngày vào ở: '+ngayo.toLocaleDateString());
		$("#current-ngaydao").text('Ngày đã ở: '+_.round((ngayht.getTime() - ngayo.getTime())/100000000));

		// Bang gia
		var banggia = '';
		banggia = '<tr><td class="pl-0">Tiền trọ</td><td class="pr-0 text-right"><div class="badge badge-outline-success badge-pill">'+tientro.GIA+'</div></td></tr>';
		if(chiphi.GIADIEN != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giá điện</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.GIADIEN+'</div></td></tr>';
		}
		if(chiphi.GIANUOC != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giá nước</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.GIANUOC+'</div></td></tr>';
		}
		if(chiphi.GiaWifi != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giá Wifi</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.GiaWifi+'</div></td></tr>';
		}
		if(chiphi.GiaRac != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giá rác</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.GiaRac+'</div></td></tr>';
		}
		if(chiphi.GiaGXe != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giữ xe</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.GiaGXe+'</div></td></tr>';
		}
		if(chiphi.XEDAP != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giữ xe đạp</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.XEDAP+'</div></td></tr>';
		}
		if(chiphi.XEMAY != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giữ xe máy</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.XEMAY+'</div></td></tr>';
		}
		if(chiphi.OTO != '0') {
			banggia += '<tr>';
			banggia += '<td class="pl-0">Giữ Oto</td>';
			banggia += '<td class="pr-0 text-right">';
			banggia += '<div class="badge badge-outline-success badge-pill">'+chiphi.OTO+'</div></td></tr>';
		}
		$("#current-banggia").html(banggia);

		showTopic(nhatro.MANT, nguoio);

	});

	function getPhongTroNhaTro(mapt, mano) {
		var rs;
		$.ajax({
			type: 'post',
			url: 'current/getPhongTroNhaTro',
			async: false,
			data: {
				id: mapt,
				mano: mano
			},
			success: function(data) {
				if(data != 'false') {
					data = JSON.parse(data);
					console.log('phong-nha: ', data);
					rs = data;
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return rs;
	}

	function getTienTro(mapt, matt) {
		var rs;
		$.ajax({
			type: 'post',
			url: 'current/getTienTro',
			async: false,
			data: {
				mapt: mapt,
				matt: matt
			},
			success: function(data) {
				if(data != 'false') {
					data = JSON.parse(data);
					console.log('tientro', data);
					rs = data;
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return rs;
	}

	function getChiPhi(mant) {
		var rs;
		$.ajax({
			type: 'post',
			url: 'current/getChiPhi',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != 'false') {
					data = JSON.parse(data);
					console.log('chiphi', data);
					rs = data;
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return rs;
	}

	$(document).on('click', '#post-topic', function() {
		var nguoio = JSON.parse($.cookie('nguoio'));
		console.log('nguoio:', nguoio);
		var content, allow, mano, mant;
		mano = localStorage.getItem('fr_mano');
		mant = localStorage.getItem('fr_mant');
		content = $("#current-content").val();
		allow = $("input[name=binhluan]:checked").val();
		checkEmpty("#current-content");
		if(content != '') {
		console.log('posst: ', _.concat([mano, mant, content, allow]));
			$.ajax({
				type: 'post',
				url: 'current/postTopic',
				data: {
					mano: mano,
					mant: mant,
					content: content,
					allow: allow,
					ngaytao: Date.now()
				},
				success: function(data) {
					if(data != 'false') {
						swal('Thành công!', 'Đăng topic thành công!', 'success');
						showTopic(mant, nguoio);
					}
				},
				error: function(e) {
					console.log(e);
				}
			});
		}
	});

  	function checkEmpty(string) {
		if($(string).val() == '') {
			$(string).parent().addClass('has-danger');
			$(string).addClass('form-control-danger');
		}
		else {
			$(string).parent().removeClass('has-danger');
			$(string).removeClass('form-control-danger');
		}
	}

	function showTopic(mant, nguoio) {
		$.ajax({
			type: 'post',
			async: false,
			url: 'current/getTopic',
			data: {
				mant: mant
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log('nguoio: ', nguoio);
				console.log(data);
				var content = '';
				_.forEach(data, function(tp, key) {
					content += '<div style="margin-bottom: 2%">';
					content += '<div class="d-flex align-items-start profile-feed-item">';
					content += '<div>';
					content += '<h6 style="font-weight: bold">'+nguoio.TEN+'</h6>';
					content += '<p class="post-content">'+tp.NOIDUNG+'</p>';
					content += '<p class="small text-muted mt-2 mb-0">';
					content += '<button type="button" data="'+tp.TOPIC+'" class="btn btn-outline-secondary btn-rounded btn-icon thich-topic">';
					content += '<i class="mdi mdi-thumb-up-outline text-danger"></i> '+0+'</button>';
					content += '<button type="button" data="'+tp.TOPIC+'" class="btn btn-outline-secondary btn-rounded btn-icon kthich-topic">';
					content += '<i class="mdi mdi-thumb-down-outline text-danger"></i> '+0+'</button>';
					content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon xem-binhluan">';
					content += '<i class="mdi mdi-comment-outline text-danger"></i> '+0+'</button></p></div></div>';
				});
				$("#danh-sach-topic").html(content);
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	$(document).on('click', '.xem-binhluan', function() {
		var data = $(this).attr('data').split('-');
		var mano, mapt, topic, nguoio_op, nguoidung_op;
		mano = JSON.parse($.cookie('nguoio')).MANO;
		mapt = JSON.parse($.cookie('phongtro')).MAPT;
		topic = data[0];
		nguoio_op = data[1];
		nguoidung_op = data[2];
		console.log('topic: ', _.concat([topic, mano, mapt, nguoio_op, nguoidung_op]));
		$("#binhluan").modal();

	});

	$(document).on('click', '.thich-topic', function() {
		var topic = $(this).attr('data');
		var mano, mapt;
		mano = JSON.parse($.cookie('nguoio')).MANO;
		mapt = JSON.parse($.cookie('phongtro')).MAPT;
		console.log('topic: ', _.concat([topic, mano, mapt]));
	});

	$(document).on('click', '.kthich-topic', function() {
		var topic = $(this).attr('data');
		var mano, mapt;
		mano = JSON.parse($.cookie('nguoio')).MANO;
		mapt = JSON.parse($.cookie('phongtro')).MAPT;
		console.log('topic: ', _.concat([topic, mano, mapt]));
	});

})(jQuery);