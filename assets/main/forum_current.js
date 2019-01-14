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
		$.cookie('chutro', JSON.stringify(chutro));
		$.cookie('nhatro', JSON.stringify(nhatro));

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

		showTopic(nhatro.MANT, nguoio, nhatro, chutro);

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
						$("#current-content").val('');
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

	function showTopic(mant, nguoio_dangnhap, nhatro, chutro) {
		$.ajax({
			type: 'post',
			async: false,
			url: 'current/getTopic',
			data: {
				mant: mant,
				mano: nguoio_dangnhap.MANO
			},
			success: function(data) {
				if(data != 'false' && data != '') {
					data = JSON.parse(data);
					var topic = data.topic, nguoio = data.nguoio, op;
					console.log('show topic: ', data);
					var content = '';
					_.forEach(topic, function(tp, key) {
						content += '<div style="margin-bottom: 2%">';
						content += '<div class="d-flex align-items-start profile-feed-item">';
						if(tp.react == false) {
							content += '<div id="topic-'+tp.TOPIC+'" data="false">';
						}
						else {
							content += '<div id="topic-'+tp.TOPIC+'" data="'+tp.react[0].MAR+'">';
						}
						if(tp.MAND != null) {
							content += '<h6 style="font-weight: bold">'+chutro.HOTEN+'</h6>';
						}
						else if(tp.MANO != null) {
							content += '<h6 style="font-weight: bold">'+_.find(nguoio, {'MANO':tp.MANO}).TEN+'</h6>';
						}
						content += '<p class="post-content">'+tp.NOIDUNG+'</p>';
						content += '<p class="small text-muted mt-2 mb-0">';
						if(tp.thich == 'yes') {
							content += '<button type="button" data="'+tp.TOPIC+'-'+tp.thich+'" class="btn btn-outline-secondary btn-rounded btn-icon thich-topic click-thich">';
						}
						else {
						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.thich+'" class="btn btn-outline-secondary btn-rounded btn-icon thich-topic">';
						}
						content += '<i class="mdi mdi-thumb-up-outline text-primary"></i> '+tp.countthich+'</button>';
						
						if(tp.kthich == 'yes') {
							content += '<button type="button" data="'+tp.TOPIC+'-'+tp.kthich+'" class="btn btn-outline-secondary btn-rounded btn-icon kthich-topic click-thich">';
						}
						else {
							content += '<button type="button" data="'+tp.TOPIC+'-'+tp.kthich+'" class="btn btn-outline-secondary btn-rounded btn-icon kthich-topic">';
						}
						content += '<i class="mdi mdi-thumb-down-outline text-danger"></i> '+tp.countkthich+'</button>';
						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon xem-binhluan">';
						content += '<i class="mdi mdi-comment-outline text-dark"></i> '+tp.countbl+'</button></p></div></div>';
					});
					$("#danh-sach-topic").html(content);
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	$(document).on('click', '.xem-binhluan', function() {
		var data = $(this).attr('data').split('-');
		var mano, mapt, matopic, nguoio_op, nguoidung_op, rs, chutro, mant, op;

		chutro = JSON.parse($.cookie('chutro'));
		mano = JSON.parse($.cookie('nguoio')).MANO;
		mapt = JSON.parse($.cookie('phongtro')).MAPT;
		matopic = data[0];
		nguoio_op = data[1];
		nguoidung_op = data[2];
		mant = localStorage.getItem('fr_mant');
		
		console.log('topic: ', _.concat([matopic, mano, mapt, nguoio_op, nguoidung_op, chutro, mant]));
		$("#binhluan").modal();
		$("#noidung-binhluan").val('');
		
		// Data: Topic, binhluan, thanhvientro
		rs = getTopic(matopic, mant);
		$("#post-binhluan").attr('data', matopic+'-'+rs.topic[0].MANO+'-'+rs.topic[0].MAND);
		console.log('topiiic',rs);

		// Xet chu bai viet
		if(nguoio_op != 'null') {
			op = _.find(rs.thanhvientro, {'MANO':nguoio_op});
			console.log('op',op);
			$("#modal-ten-nguoidang").html(op.TEN +' <i class="mdi mdi-check-circle mr-1 text-primary"></i>');
		}
		else {
			if(nguoidung_op != 'null') {
				op = chutro;
				console.log('op',op);
				$("#modal-ten-nguoidang").val(op.HOTEN);
			}
		}

		$("#modal-post-content").text(rs.topic[0].NOIDUNG);
		$("#modal-thich").html(rs.topic[0].countthich+ ' <i class="mdi mdi-thumb-up-outline text-primary"></i>');
		$("#modal-kthich").html(rs.topic[0].countkthich+ ' <i class="mdi mdi-thumb-down-outline text-danger"></i>');
		
		if(rs.topic[0].CPBINHLUAN == 'no') {
			$("#noidung-binhluan").attr('hidden', true);
			$("#post-binhluan").attr('hidden', true);
		}

		// Danh sach binh luan
		var content = '';
		if(rs.binhluan != false) {
			rs.binhluan = rs.binhluan.reverse();
			_.forEach(rs.binhluan, function(bl, key) {
				if(bl.TRANGTHAI == 'show' && bl.TOPIC == rs.topic[0].TOPIC) {
					content += '<div>';
					if(bl.MAND != null) {
						if(bl.MAND == nguoidung_op) {
							content += '<h6 style="font-weight: bold">'+op.HOTEN+' <i class="mdi mdi-check-circle mr-1 text-primary"></i></h6>';
						}
						else {
							content += '<h6 style="font-weight: bold">'+op.HOTEN+'</h6>';
						}
					}
					else if(bl.MANO != null) {
						if(bl.MANO == nguoio_op) {
							content += '<h6 style="font-weight: bold">'+_.find(rs.thanhvientro, {'MANO': bl.MANO}).TEN+' <i class="mdi mdi-check-circle mr-1 text-primary"></i></h6>';
						}
						else {
							content += '<h6 style="font-weight: bold">'+_.find(rs.thanhvientro, {'MANO': bl.MANO}).TEN+'</h6>';
						}
						
					}
					content += '<p id="modal-post-content">'+bl.NOIDUNG+'</p>';
					content += '</div>';
					content += '<hr>';
				}
			});

			$("#danh-sach-binh-luan").html(content);
		}
		else {
			$("#danh-sach-binh-luan").html('');
		}
	});

	$(document).on('click', '.thich-topic', function() {
		var mano, mapt;
		var topic = $(this).attr('data').split('-')[0];
		var thich = $(this).attr('data').split('-')[1];
		var like = parseInt($(this).text());

		mano = JSON.parse($.cookie('nguoio')).MANO;
		mapt = JSON.parse($.cookie('phongtro')).MAPT;

		// 
		var kthich = $("#topic-"+topic+' > p > button.kthich-topic').attr('data').split('-')[1];
		var dislike = parseInt($("#topic-"+topic+' > p > button.kthich-topic').text());

		// React
		var mar = $("#topic-"+topic).attr('data');
		console.log('react: ', mar);

		console.log('kthich: ', kthich);

		var button = $(this);
		button.prop('disabled', true);

		// Neu da like
		if(thich == 'yes') {
			thich = 'no';
			like -= 1;
			$(this).html('<i class="mdi mdi-thumb-up-outline text-primary"></i> '+like);
			$(this).attr('data', topic+'-'+thich);
			$(this).removeClass('click-thich');
		}
		else {
			if(thich == 'no') {

				if(kthich == 'yes') {
					kthich = 'no';
					dislike -= 1;
					$("#topic-"+topic+' > p > button.kthich-topic').removeClass('click-thich');
					$("#topic-"+topic+' > p > button.kthich-topic').attr('data', topic+'-'+kthich);
					$("#topic-"+topic+' > p > button.kthich-topic').html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
				}
				thich = 'yes';
				like += 1;
				$(this).html('<i class="mdi mdi-thumb-up-outline text-primary"></i> '+like);
				$(this).attr('data', topic+'-'+thich);
				$(this).addClass('click-thich');

				// Add
				// $.ajax({
				// 	type: 'post',
				// 	url: 'current/addThich',
				// 	data: {
				// 		mano: mano,
				// 		topic: topic,
				// 		date: Date.now(),
				// 		thich: 'yes',
				// 	},
				// 	success: function(data) {
				// 		if(data != 'false' && data != '') {
				// 			console.log('da thich');
				// 		}
				// 	},
				// 	error: function(e) {
				// 		console.log(e);
				// 	}
				// });
			}
		}

		setTimeout(function() {
			button.prop('disabled', false);
		}, 1000);
	});

	$(document).on('click', '.kthich-topic', function() {
		var mano, mapt;
		mano = JSON.parse($.cookie('nguoio')).MANO;
		mapt = JSON.parse($.cookie('phongtro')).MAPT;
		var topic = $(this).attr('data').split('-')[0];
		var kthich = $(this).attr('data').split('-')[1];
		var dislike = parseInt($(this).text());
		var thich = $("#topic-"+topic+' > p > button.thich-topic').attr('data').split('-')[1];
		var like = parseInt($("#topic-"+topic+' > p > button.thich-topic').text());
		console.log('thich: ', thich);
		var mar = $("#topic-"+topic).attr('data');
		console.log('react: ', mar);

		var button = $(this);
		button.prop('disabled', true);

		if(kthich == 'yes') {
			kthich = 'no';
			dislike -= 1;

			$(this).removeClass('click-thich');
			$(this).html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
			$(this).attr('data', topic+'-'+kthich);
		}
		else {
			if(kthich == 'no') {
				kthich = 'yes';
				dislike += 1;

				if(thich == 'yes') {
					like -= 1;
					thich = 'no';
					$("#topic-"+topic+' > p > button.thich-topic').removeClass('click-thich');
					$("#topic-"+topic+' > p > button.thich-topic').attr('data', topic+'-'+thich);
					$("#topic-"+topic+' > p > button.thich-topic').html('<i class="mdi mdi-thumb-up-outline text-primary"></i> '+like);
				}

				$(this).addClass('click-thich');
				$(this).html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
				$(this).attr('data', topic+'-'+kthich);
			}
		}


		// Enabled
		setTimeout(function() {
			button.prop('disabled', false);
		}, 1000);
	});

	function getTopic(topic, mant) {
		var rs;
		$.ajax({
			type: 'post',
			url: 'current/getOneTopic',
			async: false,
			data: {
				topic: topic,
				mant: mant
			},
			success: function(data) {
				data = JSON.parse(data);
				rs = data;
			},
			error: function(e) {
				console.log(e);
			}
		});
		return rs;
	}

	$(document).on('click', "#post-binhluan", function() {
		var noidungbl, nguoio, mapt, matp, data, chutopic, nhatro, chutro, mant;

		nhatro = JSON.parse($.cookie('nhatro'));
		chutro = JSON.parse($.cookie('chutro'));
		mant = nhatro.MANT;
		nguoio = JSON.parse($.cookie('nguoio'));
		noidungbl = $("#noidung-binhluan").val();
		mapt = JSON.parse($.cookie('phongtro')).MAPT;
		data = $(this).attr('data').split('-');
		matp = data[0];
		chutopic = data[1];

		var content = '';
		if(nguoio.MANO == chutopic) {
			content += '<div><h6 style="font-weight: bold">'+nguoio.TEN+' <i class="mdi mdi-check-circle mr-1 text-primary"></i></h6>';
		}
		else {
			content += '<div><h6 style="font-weight: bold">'+nguoio.TEN+'</h6>';
		}
		content += '<p id="modal-post-content" class="d-flex align-items-center">'+noidungbl+'</p>';
		content += '</div>';
		content += '<hr>';
		$("#danh-sach-binh-luan").append(content);
		$("#noidung-binhluan").val('');

		// Save
		$.ajax({
			type: 'post',
			url: 'current/addBinhLuan',
			data: {
				noidung: noidungbl,
				mano: nguoio.MANO,
				mapt: mapt,
				matp: matp,
				ngaytao: Date.now(),
				trangthai: 'show'
			},
			success: function(data) {
				if(data != 'false') {
					swal('Gửi bình luận thành công!', '', 'success');
					showTopic(mant, nguoio, nhatro, chutro);
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	});

})(jQuery);