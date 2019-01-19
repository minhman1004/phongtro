(function($) {
	'use strict';

	$(document).ready(function() {
		var nhatro = getAllNhaTro(mand);
		var chutro = getChuTro(mand);
		showSelectNhaTro(nhatro);

		$.cookie('nhatro', JSON.stringify(nhatro));
		$.cookie('chutro', JSON.stringify(chutro));

		console.log('nhatro: ', nhatro);
		console.log('chutro: ', chutro);

		// Show data nhatro
		var mant = $("#select-nhatro").val();
		var nhatroSelected = _.find(nhatro, {'MANT':mant});
		if(mant == 'all') {
            $("#forum-sophong").prop('hidden', true);
            $("#card-banggia").prop('hidden', true);
            $("#card-dang-topic").prop('hidden', true);
            $("#forum-songuoidango").prop('hidden', true);
			$("#forum-diachi").text('Số lượng nhà trọ: '+nhatro.length);
			getAllTopic(mand, chutro);
        }
        else {
        	getThongTinChung(mant);
            $("#forum-sophong").prop('hidden', false);
            $("#card-banggia").prop('hidden', false);
            $("#card-dang-topic").prop('hidden', false);
            $("#forum-songuoidango").prop('hidden', false);
			console.log(nhatroSelected);
			$("#forum-diachi").text('Địa chỉ: '+nhatroSelected.DCTD);
			getTopicNhaTro(mant, chutro);
        }

    	$(document).on('change', "#select-nhatro", function() {
			var nhatro = getAllNhaTro(mand);
			// Show data nhatro
			var mant = $("#select-nhatro").val();
			var nhatroSelected = _.find(nhatro, {'MANT':mant});
			if(mant == 'all') {
				$("#forum-diachi").text('Số lượng nhà trọ: '+nhatro.length);
	            $("#forum-sophong").prop('hidden', true);
	            $("#card-dang-topic").prop('hidden', true);
	            $("#forum-songuoidango").prop('hidden', true);
	            $("#card-banggia").prop('hidden', true);
	            getAllTopic(mand, chutro);
	        }
	        else {
	        	getThongTinChung(mant);
	            $("#forum-sophong").prop('hidden', false);
	            $("#card-dang-topic").prop('hidden', false);
	            $("#card-banggia").prop('hidden', false);
	            $("#forum-songuoidango").prop('hidden', false);
				console.log(nhatroSelected);
				$("#forum-diachi").text('Địa chỉ: '+nhatroSelected.DCTD);
				getTopicNhaTro(mant, chutro);
	        }
		});

    	// Click xem binh luan
		$(document).on('click', '.xem-binhluan', function() {
			// open modal
			$("#binhluan").modal();
			var data = $(this).attr('data').split('-'); 
			// data : ma.topic - ma.nguoio - ma.nguoidung

			var mano, matopic, mand;
			var nguoio, topicBl, topic, nhatroSelected, binhluan, op;

			// get topic, ma nguoio, ma nguoidung
			matopic = data[0];
			mano = data[1];
			mand = data[2];

			topicBl = getTopic(matopic, mand);
			binhluan = topicBl.binhluan;
			topic = topicBl.topic[0];

			nhatroSelected = _.find(nhatro, {'MANT':topic.MANT});
			nguoio = JSON.parse($.cookie('nguoio'));

			// console.log('-----------------------------------------------------');
			// console.log('nhatroSelected: ', nhatroSelected);
			// console.log('matopic: ', matopic);
			// console.log('chutro: ', chutro);
			// console.log('nguoio: ', nguoio);
			// console.log('topicBl: ', topicBl);
			// console.log('binhluan: ', binhluan);
			// console.log('topic: ', topic);
			// console.log('-----------------------------------------------------');
			
			// input nhap comment / cap nhat comment
			$("#noidung-binhluan").val('');
			$("#update-binhluan-button").prop('hidden', true);
			$("#cancel-binhluan-button").prop('hidden', true);
			$("#post-binhluan").prop('hidden', false);
			// Ten chu bai viet
			if(topic.MANO != null && topic.MAND == null) {
				op = _.find(nguoio, {'MANO':topic.MANO});
				$("#modal-ten-nguoidang").html(op.TEN +' <i class="mdi mdi-check-circle mr-1 text-primary"></i>');
			}
			else {
				if(topic.MAND != null) {
					op = chutro;
					$("#modal-ten-nguoidang").html(op.HOTEN +' <i class="mdi mdi-check-circle mr-1 text-primary"></i>');
				}
			}

			// Thich - Kthich
			$("#modal-post-content").text(topic.NOIDUNG);
			$("#modal-thich").html('<i class="mdi mdi-thumb-up-outline text-primary"></i> '+topic.countthich);
			$("#modal-kthich").html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+ topic.countkthich);

			// Add class thich vao nut
			if(topic.thich == 'yes') {
				$("#modal-thich").addClass('click-thich');
			}
			else {
				$("#modal-thich").removeClass('click-thich');
			}

			if(topic.kthich == 'yes') {
				$("#modal-kthich").addClass('click-thich');
			}
			else {
				$("#modal-kthich").removeClass('click-thich');
			}

			$("#modal-thich").attr('data', matopic+'-'+topic.thich);
			$("#modal-kthich").attr('data', matopic+'-'+topic.kthich);
			
			$("#post-binhluan").attr('data', matopic+'-'+topic.MANO+'-'+topic.MAND);

			// Danh sach binh luan
			var content = '';
			if(binhluan != false) {
				// binhluan = binhluan.reverse();
				_.forEach(binhluan, function(bl, key) {
					if(bl.TRANGTHAI == 'show' && bl.TOPIC == topic.TOPIC) {
						content += '<div id="binhluan-'+bl.MABL+'">';
						console.log('bl:' , bl);
						if(bl.MAND != null) {
							if(bl.MAND == topic.MAND) {
								content += '<h6 style="font-weight: bold;">'+chutro.HOTEN+'  <sup style="color:#ff0000;">[Chủ trọ]</sup><i class="mdi mdi-check-circle mr-1 text-primary"></i>';
								content += '<i data="'+bl.MABL+'" class="mdi mdi-delete-outline mr-1 text-danger delete-icon delete-comment"></i>';
								content += '<i data="'+bl.MABL+'" class="mdi mdi-dots-horizontal-circle mr-1 text-dark delete-icon edit-comment"></i>';
								content += '</h6>';
							}
							else {
								content += '<h6 style="font-weight: bold;">'+chutro.HOTEN+' <sup style="color:#ff0000;">[Chủ trọ]</sup>';
								content += '<i data="'+bl.MABL+'" class="mdi mdi-delete-outline mr-1 text-danger delete-icon delete-comment"></i>';
								content += '<i data="'+bl.MABL+'" class="mdi mdi-dots-horizontal-circle mr-1 text-dark delete-icon edit-comment"></i>';
								content += '</h6>';
							}
						}
						else if(bl.MANO != null) {
							if(bl.MANO == topic.MANO) {
								content += '<h6 style="font-weight: bold">'+_.find(nguoio, {'MANO': bl.MANO}).TEN+' <i class="mdi mdi-check-circle mr-1 text-primary"></i>';
								content += '<i data="'+bl.MABL+'" class="mdi mdi-delete-outline mr-1 text-danger delete-icon delete-comment"></i>';
								content += '</h6>';
							}
							else {
								content += '<h6 style="font-weight: bold">'+_.find(nguoio, {'MANO': bl.MANO}).TEN;
								content += ' <i data="'+bl.MABL+'" class="mdi mdi-delete-outline mr-1 text-danger delete-icon delete-comment"></i>';
								content +=' </h6>';
							}
							
						}
						content += '<p class="noidung-binhluan">'+bl.NOIDUNG+'</p>';
						content += '</div>';
						content += '<hr id="hr-'+bl.MABL+'">';
					}
				});

				$("#danh-sach-binh-luan").html(content);
			}
			else {
				$("#danh-sach-binh-luan").html('');
			}
		});
		
		$(document).on('click', '.thich-topic', function() {
			var mapt;
			var topic = $(this).attr('data').split('-')[0];
			var thich = $(this).attr('data').split('-')[1];
			var like = parseInt($(this).text());

			// 
			var kthich = $("#topic-"+topic+' > p > button.kthich-topic').attr('data').split('-')[1];
			var dislike = parseInt($("#topic-"+topic+' > p > button.kthich-topic').text());

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
				$.ajax({
						type: 'post',
						url: 'forum/addThich',
						data: {
							mand: mand,
							topic: topic,
							date: Date.now(),
							thich: 'no',
							kthich: 'no'
						},
						success: function(data) {
							if(data != 'false' && data != '') {
								console.log('bo thich');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
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

					// Add or update react
					$.ajax({
						type: 'post',
						url: 'forum/addThich',
						data: {
							mand: mand,
							topic: topic,
							date: Date.now(),
							thich: 'yes',
							kthich: 'no'
						},
						success: function(data) {
							if(data != 'false' && data != '') {
								console.log('da thich');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}

			setTimeout(function() {
				button.prop('disabled', false);
			}, 1000);
		});

		$(document).on('click', '.kthich-topic', function() {
			var topic = $(this).attr('data').split('-')[0];
			var kthich = $(this).attr('data').split('-')[1];
			var dislike = parseInt($(this).text());
			var thich = $("#topic-"+topic+' > p > button.thich-topic').attr('data').split('-')[1];
			var like = parseInt($("#topic-"+topic+' > p > button.thich-topic').text());
			var mar = $("#topic-"+topic).attr('data');

			var button = $(this);
			button.prop('disabled', true);

			if(kthich == 'yes') {
				kthich = 'no';
				dislike -= 1;

				$(this).removeClass('click-thich');
				$(this).html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
				$(this).attr('data', topic+'-'+kthich);
				$.ajax({
					type: 'post',
					url: 'forum/addThich',
					data: {
						mand: mand,
						topic: topic,
						date: Date.now(),
						thich: 'no',
						kthich: kthich
					},
					success: function(data) {
						if(data != 'false' && data != '') {
							console.log('bo kthich');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
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

					$.ajax({
						type: 'post',
						url: 'forum/addThich',
						data: {
							mand: mand,
							topic: topic,
							date: Date.now(),
							thich: thich,
							kthich: kthich
						},
						success: function(data) {
							if(data != 'false' && data != '') {
								console.log('da kthich');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}


			// Enabled
			setTimeout(function() {
				button.prop('disabled', false);
			}, 1000);
		});

		// Thich va khong thich trong modal
		$(document).on('click', '#modal-thich', function() {
			var topic = $(this).attr('data').split('-')[0];
			var thich = $(this).attr('data').split('-')[1];
			var like = parseInt($(this).text());

			// 
			var kthich = $("#modal-kthich").attr('data').split('-')[1];
			var dislike = parseInt($("#modal-kthich").text());

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
				$.ajax({
					type: 'post',
					url: 'forum/addThich',
					data: {
						mand: mand,
						topic: topic,
						date: Date.now(),
						thich: 'no',
						kthich: 'no'
					},
					success: function(data) {
						if(data != 'false' && data != '') {
							console.log('bo thich');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
			else {
				if(thich == 'no') {

					if(kthich == 'yes') {
						kthich = 'no';
						dislike -= 1;
						$("#modal-kthich").removeClass('click-thich');
						$("#modal-kthich").attr('data', topic+'-'+kthich);
						$("#modal-kthich").html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
					}
					thich = 'yes';
					like += 1;
					$(this).html('<i class="mdi mdi-thumb-up-outline text-primary"></i> '+like);
					$(this).attr('data', topic+'-'+thich);
					$(this).addClass('click-thich');

					// Add or update react
					$.ajax({
						type: 'post',
						url: 'forum/addThich',
						data: {
							mand: mand,
							topic: topic,
							date: Date.now(),
							thich: 'yes',
							kthich: 'no'
						},
						success: function(data) {
							if(data != 'false' && data != '') {
								console.log('da thich');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}

			setTimeout(function() {
				button.prop('disabled', false);
			}, 1000);
		});

		$(document).on('click', '#modal-kthich', function() {
			var topic = $(this).attr('data').split('-')[0];
			var kthich = $(this).attr('data').split('-')[1];
			var dislike = parseInt($(this).text());
			var thich = $("#modal-thich").attr('data').split('-')[1];
			var like = parseInt($("#modal-thich").text());
			var mar = $("#topic-"+topic).attr('data');

			console.log('dislike: ', dislike);
			console.log('kthich: ', kthich);
			var button = $('#modal-kthich');
			button.prop('disabled', true);

			if(kthich == 'yes') {
				kthich = 'no';
				dislike -= 1;

				console.log('dislike: ', dislike);
				console.log('kthich: ', kthich);
				$('#modal-kthich').removeClass('click-thich');
				$('#modal-kthich').html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
				$('#modal-kthich').attr('data', topic+'-'+kthich);
				$.ajax({
					type: 'post',
					url: 'forum/addThich',
					data: {
						mand: mand,
						topic: topic,
						date: Date.now(),
						thich: 'no',
						kthich: kthich
					},
					success: function(data) {
						if(data != 'false' && data != '') {
							console.log('bo kthich');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
			else {
				if(kthich == 'no') {
					kthich = 'yes';
					dislike += 1;

					if(thich == 'yes') {
						like -= 1;
						thich = 'no';
						$("#modal-thich").removeClass('click-thich');
						$("#modal-thich").attr('data', topic+'-'+thich);
						$("#modal-thich").html('<i class="mdi mdi-thumb-up-outline text-primary"></i> '+like);
					}

					$(this).addClass('click-thich');
					$(this).html('<i class="mdi mdi-thumb-down-outline text-danger"></i> '+dislike);
					$(this).attr('data', topic+'-'+kthich);

					$.ajax({
						type: 'post',
						url: 'forum/addThich',
						data: {
							mand: mand,
							topic: topic,
							date: Date.now(),
							thich: thich,
							kthich: kthich
						},
						success: function(data) {
							if(data != 'false' && data != '') {
								console.log('da kthich');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}


			// Enabled
			setTimeout(function() {
				button.prop('disabled', false);
			}, 1000);
		});

		$(document).on('click', "#post-binhluan", function() {
			var noidung, nguoidung, thich, kthich, matp, data, mano;

			noidung = $("#noidung-binhluan").val();
			data = $(this).attr('data').split('-');
			matp = data[0];
			nguoidung = data[2];
			mano = data[1];

			// Save
			$.ajax({
				type: 'post',
				url: 'forum/addBinhLuan',
				data: {
					noidung: noidung,
					mand: chutro.MAND,
					matp: matp,
					ngaytao: Date.now(),
					trangthai: 'show'
				},
				success: function(data) {
					if(data != 'false') {
						swal('Gửi bình luận thành công!', '', 'success');
						var content = '';
						if(nguoidung == chutro.MAND) {
							content += '<div><h6 style="font-weight: bold">'+chutro.HOTEN+'  <sup style="color:#ff0000;">[Chủ trọ]</sup><i class="mdi mdi-check-circle mr-1 text-primary"></i>';
							content += ' <i data="'+data+'" class="mdi mdi-delete-outline mr-1 text-danger delete-icon delete-comment"></i>';
							content += '<i data="'+data+'" class="mdi mdi-dots-horizontal-circle mr-1 text-dark delete-icon edit-comment"></i></h6>';
						}
						else {
							content += '<div><h6 style="font-weight: bold">'+chutro.HOTEN+' <sup style="color:#ff0000;">[Chủ trọ]</sup>';
							content += ' <i data="'+data+'" class="mdi mdi-delete-outline mr-1 text-danger delete-icon delete-comment"></i>';
							content += '<i data="'+data+'" class="mdi mdi-dots-horizontal-circle mr-1 text-dark delete-icon edit-comment"></i></h6>';
						}
						content += '<p id="modal-post-content" class="d-flex align-items-center">'+noidung+'</p>';
						content += '</div>';
						content += '<hr id="hr-"'+data+'>';
						$("#danh-sach-binh-luan").append(content);
						$("#noidung-binhluan").val('');
						
						if($("#select-nhatro").val() == 'all') getAllTopic(mand, chutro);
						else getTopicNhaTro($("#select-nhatro").val(), chutro);
					}
				},
				error: function(e) {
					console.log(e);
				}
			});
		});

		$(document).on('click', '#post-topic', function() {
			var content, allow;
			content = $("#current-content").val();
			allow = $("input[name=binhluan]:checked").val();
			checkEmpty("#current-content");
			if(content != '') {
				$.ajax({
					type: 'post',
					url: 'forum/postTopic',
					data: {
						mand: mand,
						mant: $("#select-nhatro").val(),
						content: content,
						allow: allow,
						ngaytao: Date.now()
					},
					success: function(data) {
						if(data != 'false') {
							swal('Thành công!', 'Đăng topic thành công!', 'success');
							if($("#select-nhatro").val() == 'all') getAllTopic(mand, chutro);
							else getTopicNhaTro($("#select-nhatro").val(), chutro);
							$("#current-content").val('');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
		});

		$(document).on('click', '.edit-topic', function() {
			$("#modal-edit-topic").modal();
			var data = $(this).attr('data').split('-');
			var topic = data[0];
			$("#update-topic").attr('data', topic);
			$.ajax({
				type: 'post',
				url: 'forum/getEditTopic',
				data: {
					topic: topic
				},
				success: function(data) {
					data = JSON.parse(data)[0];
					$('input[name=update-binhluan][value="'+data.CPBINHLUAN+'"').prop('checked', true);
					$("#update-current-content").val(data.NOIDUNG);
					console.log('data topic: ', data);
				},
				error: function(e) {
					console.log(e);
				}
			});
		});

		$(document).on('click', '#update-topic', function() {
			var topic, content, allow;
			topic = $(this).attr('data');
			content = $("#update-current-content").val();
			allow = $("input[name=update-binhluan]:checked").val();
			$.ajax({
				type: 'post',
				url: 'forum/updateTopic',
				data: {
					topic: topic,
					content: content,
					allow: allow
				},
				success: function(data) {
					swal('Thành công!', 'Cập nhật topic thành công!', 'success');
					if($("#select-nhatro").val() == 'all') getAllTopic(mand, chutro);
					else getTopicNhaTro($("#select-nhatro").val(), chutro);
				},
				error: function(e) {
					console.log(e);
				}
			});
		});

		$(document).on('click', '.delete-comment', function() {
			var mabl = $(this).attr('data');

			swal({
			  title: "Bạn muốn xóa bình luận?",
			  text: "Bình luận sẽ được xóa khỏi topic này ngay lập tức!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
			  		type: 'post',
			  		url: 'forum/deleteBinhLuan',
			  		data: {
			  			mabl: mabl
			  		},
			  		success: function(data) {
						if($("#select-nhatro").val() == 'all') getAllTopic(mand, chutro);
						else getTopicNhaTro($("#select-nhatro").val(), chutro);
						$("#binhluan-"+mabl).prop('hidden', true);
						$("#hr-"+mabl).prop('hidden', true);
					    swal("Xóa bình luận thành công!", {
					      icon: "success",
					    });
			  		}
			  	});
			  } else {
			    swal("Bình luận chưa được xóa!");
			  }
			});
		});

		$(document).on('click', '.edit-comment', function() {
			console.log('edit', $(this).attr('data'));
			var bl = $(this).attr('data');
			$("#update-binhluan-button").attr('data', bl);
			$.ajax({
				type: 'post',
				url: 'forum/getBinhLuan',
				data: {
					mabl: bl
				},
				success: function(data) {
					data = JSON.parse(data)[0];
					console.log('binhluan ',data);
					$("#noidung-binhluan").val(data.NOIDUNG);
				},
				error: function(e) {
					console.log(e);
				}
			});
			$("#update-binhluan-button").prop('hidden', false);
			$("#cancel-binhluan-button").prop('hidden', false);
			$("#post-binhluan").prop('hidden', true);
		});

		$(document).on('click', '#cancel-binhluan-button', function() {
			$("#noidung-binhluan").val('');
			$("#update-binhluan-button").prop('hidden', true);
			$("#cancel-binhluan-button").prop('hidden', true);
			$("#post-binhluan").prop('hidden', false);
		});

		$(document).on('click', '#update-binhluan-button', function() {
			var mabl = $(this).attr('data');
			var noidung = $("#noidung-binhluan").val();
			$.ajax({
				type: 'post',
				url: 'forum/updateBinhLuan',
				data: {
					mabl: mabl,
					noidung: noidung
				},
				success: function(data) {
					swal('Thành công!', 'Cập nhật thành công!', 'success');
					$('#binhluan-'+mabl+' > p.noidung-binhluan').text(noidung);
					$("#noidung-binhluan").val('');
					$("#update-binhluan-button").prop('hidden', true);
					$("#cancel-binhluan-button").prop('hidden', true);
					$("#post-binhluan").prop('hidden', false);
				},
				error: function(e) {
					console.log(e);
				}
			});
		});

		$(document).on('click', '.delete-topic', function() {
			var topic = $(this).attr('data')[0];
			swal({
			  title: "Bạn muốn xóa topic này?",
			  text: "Topic này sẽ bị xóa ngay lập tức nếu bạn đồng ý!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
			  		type: 'post',
			  		url: 'forum/deleteTopic',
			  		data: {
			  			topic: topic
			  		},
			  		success: function(data) {
						if($("#select-nhatro").val() == 'all') getAllTopic(mand, chutro);
						else getTopicNhaTro($("#select-nhatro").val(), chutro);
					    swal("Xóa topic thành công!", {
					      icon: "success",
					    });
			  		}
			  	});
			  } else {
			    swal("Bình luận chưa được xóa!");
			  }
			});
		});
	});


	function getTopic(topic) {
		var rs;
		$.ajax({
			type: 'post',
			url: 'forum/getTopic',
			async: false,
			dataType: 'json',
			data: {
				topic: topic,
				mand: mand
			},
			success: function(data) {
				rs = data;
			},
			error: function(e) {
				console.log(e);
			}
		});
		return rs;
	}

	function getChuTro(mand) {
		var chutro;
		$.ajax({
			type: 'post',
			url: 'forum/getChuTro',
			async: false,
			dataType: 'json',
			data: {
				mand: mand
			},
			success: function(data) {
				console.log('chutro: ', data);
				chutro = data[0];
			},
			error: function(e) {
				console.log(e);
			}
		});
		return chutro;
	}

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

	function showSelectNhaTro(dsnhatro) {
		var content = '';
		if(dsnhatro.length > 0) {
			content += '<option value="all">Xem tất cả</option>';
			_.forEach(dsnhatro, function(nhatro, key) {
				content += '<option value="'+nhatro.MANT+'">'+(key+1)+' - '+nhatro.TENNT+'</option>';
			});
		}
		else {
			content += '<option value="null">Không có nhà trọ nào, vui lòng tạo nhà trọ mới</option>';
		}
		$("#select-nhatro").html(content);
	}

	if($("#select-nhatro").length) {
		$("#select-nhatro").select2();
	}

	function getThongTinChung(mant) {
		// var thongtinchung;
		$.ajax({
			type:'post',
			url: 'forum/getThongTinChung',
			dataType: 'json',
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					console.log('getThongTinChung: ', data);
					$("#forum-sophong").text('Số phòng: '+ data.sophong);
					$("#forum-songuoidango").text('Số nguời trọ: '+ data.songuoio);
					var content = '', banggia = data.banggia[0];
					
					content += '<tbody>';
					if(banggia.GIADIEN != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giá điện (kg)</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.GIADIEN+'</div></td></tr>';
					}
					if(banggia.GIANUOC != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giá nước (m<sup>3</sup>)</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.GIANUOC+'</div></td></tr>';
					}
					if(banggia.GiaWifi != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giá Wifi</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.GiaWifi+'</div></td></tr>';
					}
					if(banggia.GiaRac != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giá rác</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.GiaRac+'</div></td></tr>';
					}
					if(banggia.GiaGXe != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giữ xe</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.GiaGXe+'</div></td></tr>';
					}
					if(banggia.XEDAP != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giữ xe đạp</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.XEDAP+'</div></td></tr>';
					}
					if(banggia.XEMAY != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giữ xe máy</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.XEMAY+'</div></td></tr>';
					}
					if(banggia.OTO != '0') {
						content += '<tr>';
						content += '<td class="pl-0">Giữ Oto</td>';
						content += '<td class="pr-0 text-right">';
						content += '<div class="badge badge-outline-success badge-pill">'+banggia.OTO+'</div></td></tr>';
					}
					content += '</tbody>';

					$("#forum-banggia").html(content);
				}
				else {
					$("#forum-sophong").text('Số phòng: 0');
					$("#forum-songuoidango").text('Số nguời trọ: 0');

					$("#forum-banggia").html('');
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		// return thongtinchung;
	}

	function getAllTopic(mand, chutro) {
		$.ajax({
			type: 'post',
			url: 'forum/getAllTopic',
			dataType: 'json',
			data: {
				mand: mand
			},
			success: function(data) {
				var nguoio = data.nguoio;
				var topic = data.topic;
				$.cookie('nguoio', JSON.stringify(nguoio));
				var content = '';
				_.forEach(topic, function(tp, key) {
					console.log('tp.MANO: ', tp.MANO);
					content += '<div style="margin-bottom: 2%">';
					content += '<div class="d-flex align-items-start profile-feed-item">';

					// Xem co tha react vao topic nay hay chua
					if(tp.react == false) {
						content += '<div id="topic-'+tp.TOPIC+'" data="false">';
					}
					else {
						// Neu da co thi lay ma react gan vao
						content += '<div id="topic-'+tp.TOPIC+'" data="'+tp.react[0].MAR+'">';
					}
					
					// Xet topic nay co phai cua nguoi o tro dang len hay khong
					if(tp.MANO != null) {
						content += '<h6 style="font-weight: bold">'+_.find(nguoio, {'MANO':tp.MANO}).TEN+' <sup style="color: cadetblue">['+tp.TENNT+']</sup></h6>';
					}
					else {
						// Day la topic cua chu nha tro dang
						content += '<h6 style="font-weight: bold">'+chutro.HOTEN+' <sup style="color:#ff0000">[Chủ trọ]</sup></h6>';
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
					content += '<i class="mdi mdi-comment-outline text-dark"></i> '+tp.countbl+'</button>';
					content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon delete-topic">';
					content += '<i class="mdi mdi-delete text-danger"></i></button>';
					content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon edit-topic">';
					content += '<i class="mdi mdi-dots-horizontal text-danger"></i></button>';
					content += '</p></div></div>';
				});

				$("#danh-sach-topic").html(content);
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getTopicNhaTro(mant, chutro) {
		$.ajax({
			type: 'post',
			url: 'forum/getTopicNhaTro',
			dataType: 'json',
			data: {
				mant: mant
			},
			success: function(data) {
				var content = '';
				if(data != false) {
					console.log(data);
					var topic = data.topic;
					var nguoio = data.nguoio;
					$.cookie('nguoio', JSON.stringify(nguoio));
					_.forEach(topic, function(tp, key) {
						content += '<div style="margin-bottom: 2%">';
						content += '<div class="d-flex align-items-start profile-feed-item">';

						// Xem co tha react vao topic nay hay chua
						if(tp.react == false) {
							content += '<div id="topic-'+tp.TOPIC+'" data="false">';
						}
						else {
							// Neu da co thi lay ma react gan vao
							content += '<div id="topic-'+tp.TOPIC+'" data="'+tp.react[0].MAR+'">';
						}
						
						// Xet topic nay co phai cua nguoi o tro dang len hay khong
						if(tp.MANO != null) {
							content += '<h6 style="font-weight: bold">'+_.find(nguoio, {'MANO':tp.MANO}).TEN+'</h6>';
						}
						else {
							// Day la topic cua chu nha tro dang
							content += '<h6 style="font-weight: bold">'+chutro.HOTEN+' <sup style="color:#ff0000">[Chủ trọ]</sup></h6>';
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
						content += '<i class="mdi mdi-comment-outline text-dark"></i> '+tp.countbl+'</button>';
						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-danger btn-rounded btn-icon delete-topic">';
						content += '<i class="mdi mdi-delete text-danger"></i></button>';
						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon edit-topic">';
						content += '<i class="mdi mdi-dots-horizontal text-danger"></i></button>';
						content += '</p></div></div>';
					});
					$("#danh-sach-topic").html(content);
				}
				else {
					content += 'Chưa có topic nào!';
					$("#danh-sach-topic").html(content);
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

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

	// $(document).on('click', '.edit-topic', function() {
	// 	$("#modal-edit-topic").modal();
	// 	var data = $(this).attr('data').split('-');
	// 	var topic = data[0];
	// 	$("#update-topic").attr('data', topic);
	// 	$.ajax({
	// 		type: 'post',
	// 		url: 'current/getEditTopic',
	// 		data: {
	// 			topic: topic
	// 		},
	// 		success: function(data) {
	// 			data = JSON.parse(data)[0];
	// 			$('input[name=update-binhluan][value="'+data.CPBINHLUAN+'"').prop('checked', true);
	// 			$("#update-current-content").val(data.NOIDUNG);
	// 			console.log('data topic: ', data);
	// 		},
	// 		error: function(e) {
	// 			console.log(e);
	// 		}
	// 	});
	// });

	// $(document).on('click', '#update-topic', function() {
	// 	var nguoio = JSON.parse($.cookie('nguoio'));
	// 	var nhatro = JSON.parse($.cookie('nhatro'));
	// 	var chutro = JSON.parse($.cookie('chutro'));

	// 	console.log('showTopic: ', _.concat([nguoio, nhatro, chutro]));

	// 	var topic, content, allow;
	// 	topic = $(this).attr('data');
	// 	content = $("#update-current-content").val();
	// 	allow = $("input[name=update-binhluan]:checked").val();
	// 	$.ajax({
	// 		type: 'post',
	// 		url: 'current/updateTopic',
	// 		data: {
	// 			topic: topic,
	// 			content: content,
	// 			allow: allow
	// 		},
	// 		success: function(data) {
	// 			swal('Thành công!', 'Cập nhật topic thành công!', 'success');
	// 			showTopic(nhatro.MANT, nguoio, nhatro, chutro);
	// 		},
	// 		error: function(e) {
	// 			console.log(e);
	// 		}
	// 	});
	// });

	// $(document).on('click', '.delete-comment', function() {
	// 	console.log('delete', $(this).attr('data'));
	// 	var mabl = $(this).attr('data');
	// 	var nguoio = JSON.parse($.cookie('nguoio'));
	// 	var nhatro = JSON.parse($.cookie('nhatro'));
	// 	var chutro = JSON.parse($.cookie('chutro'));

	// 	swal({
	// 	  title: "Bạn muốn xóa bình luận?",
	// 	  text: "Bình luận sẽ được xóa khỏi topic này ngay lập tức!",
	// 	  icon: "warning",
	// 	  buttons: true,
	// 	  dangerMode: true,
	// 	})
	// 	.then((willDelete) => {
	// 	  if (willDelete) {
	// 	  	$.ajax({
	// 	  		type: 'post',
	// 	  		url: 'current/deleteBinhLuan',
	// 	  		data: {
	// 	  			mabl: mabl
	// 	  		},
	// 	  		success: function(data) {
	// 				showTopic(nhatro.MANT, nguoio, nhatro, chutro);
	// 				$("#binhluan-"+mabl).prop('hidden', true);
	// 				$("#hr-"+mabl).prop('hidden', true);
	// 			    swal("Xóa bình luận thành công!", {
	// 			      icon: "success",
	// 			    });
	// 	  		}
	// 	  	});
	// 	  } else {
	// 	    swal("Bình luận chưa được xóa!");
	// 	  }
	// 	});
	// });

	// $(document).on('click', '.edit-comment', function() {
	// 	console.log('edit', $(this).attr('data'));
	// 	var bl = $(this).attr('data');
	// 	$("#update-binhluan-button").attr('data', bl);
	// 	$.ajax({
	// 		type: 'post',
	// 		url: 'current/getBinhLuan',
	// 		data: {
	// 			mabl: bl
	// 		},
	// 		success: function(data) {
	// 			data = JSON.parse(data)[0];
	// 			console.log('binhluan ',data);
	// 			$("#noidung-binhluan").val(data.NOIDUNG);
	// 		},
	// 		error: function(e) {
	// 			console.log(e);
	// 		}
	// 	});
	// 	$("#update-binhluan-button").prop('hidden', false);
	// 	$("#cancel-binhluan-button").prop('hidden', false);
	// 	$("#post-binhluan").prop('hidden', true);
	// });

	// $(document).on('click', '#cancel-binhluan-button', function() {
	// 	$("#noidung-binhluan").val('');
	// 	$("#update-binhluan-button").prop('hidden', true);
	// 	$("#cancel-binhluan-button").prop('hidden', true);
	// 	$("#post-binhluan").prop('hidden', false);
	// });

	// $(document).on('click', '#update-binhluan-button', function() {
	// 	var mabl = $(this).attr('data');
	// 	var noidung = $("#noidung-binhluan").val();
	// 	$.ajax({
	// 		type: 'post',
	// 		url: 'current/updateBinhLuan',
	// 		data: {
	// 			mabl: mabl,
	// 			noidung: noidung
	// 		},
	// 		success: function(data) {
	// 			swal('Thành công!', 'Cập nhật thành công!', 'success');
	// 			$('#binhluan-'+mabl+' > p.noidung-binhluan').text(noidung);
	// 			$("#noidung-binhluan").val('');
	// 			$("#update-binhluan-button").prop('hidden', true);
	// 			$("#cancel-binhluan-button").prop('hidden', true);
	// 			$("#post-binhluan").prop('hidden', false);
	// 		},
	// 		error: function(e) {
	// 			console.log(e);
	// 		}
	// 	});
	// });

	// function getTopic(topic, mant) {
	// 	var rs;
	// 	$.ajax({
	// 		type: 'post',
	// 		url: 'current/getOneTopic',
	// 		async: false,
	// 		data: {
	// 			topic: topic,
	// 			mant: mant
	// 		},
	// 		success: function(data) {
	// 			data = JSON.parse(data);
	// 			rs = data;
	// 		},
	// 		error: function(e) {
	// 			console.log(e);
	// 		}
	// 	});
	// 	return rs;
	// }

	// $(document).on('click', '#post-topic', function() {
	// 	var nguoio = JSON.parse($.cookie('nguoio'));
	// 	var nhatro = JSON.parse($.cookie('nhatro'));
	// 	var chutro = JSON.parse($.cookie('chutro'));
	// 	console.log('nguoio:', nguoio);
	// 	var content, allow, mano, mant;
	// 	mano = localStorage.getItem('fr_mano');
	// 	mant = localStorage.getItem('fr_mant');
	// 	content = $("#current-content").val();
	// 	allow = $("input[name=binhluan]:checked").val();
	// 	checkEmpty("#current-content");
	// 	if(content != '') {
	// 	console.log('posst: ', _.concat([mano, mant, content, allow]));
	// 		$.ajax({
	// 			type: 'post',
	// 			url: 'current/postTopic',
	// 			data: {
	// 				mano: mano,
	// 				mant: mant,
	// 				content: content,
	// 				allow: allow,
	// 				ngaytao: Date.now()
	// 			},
	// 			success: function(data) {
	// 				if(data != 'false') {
	// 					swal('Thành công!', 'Đăng topic thành công!', 'success');
	// 					showTopic(mant, nguoio, nhatro, chutro);
	// 					$("#current-content").val('');
	// 				}
	// 			},
	// 			error: function(e) {
	// 				console.log(e);
	// 			}
	// 		});
	// 	}
	// });

 //  	function checkEmpty(string) {
	// 	if($(string).val() == '') {
	// 		$(string).parent().addClass('has-danger');
	// 		$(string).addClass('form-control-danger');
	// 	}
	// 	else {
	// 		$(string).parent().removeClass('has-danger');
	// 		$(string).removeClass('form-control-danger');
	// 	}
	// }

	// function showTopic(mant, nguoio_dangnhap, nhatro, chutro) {
	// 	$.ajax({
	// 		type: 'post',
	// 		async: false,
	// 		url: 'current/getTopic',
	// 		data: {
	// 			mant: mant,
	// 			mano: nguoio_dangnhap.MANO
	// 		},
	// 		success: function(data) {
	// 			if(data != 'false' && data != '') {
	// 				data = JSON.parse(data);
	// 				var topic = data.topic, nguoio = data.nguoio, op;
	// 				console.log('show topic: ', data);
	// 				var content = '';
	// 				_.forEach(topic, function(tp, key) {
	// 					content += '<div style="margin-bottom: 2%">';
	// 					content += '<div class="d-flex align-items-start profile-feed-item">';
	// 					if(tp.react == false) {
	// 						content += '<div id="topic-'+tp.TOPIC+'" data="false">';
	// 					}
	// 					else {
	// 						content += '<div id="topic-'+tp.TOPIC+'" data="'+tp.react[0].MAR+'">';
	// 					}
	// 					if(tp.MAND != null) {
	// 						content += '<h6 style="font-weight: bold">'+chutro.HOTEN+'</h6>';
	// 					}
	// 					else if(tp.MANO != null) {
	// 						content += '<h6 style="font-weight: bold">'+_.find(nguoio, {'MANO':tp.MANO}).TEN+'</h6>';
	// 					}
	// 					content += '<p class="post-content">'+tp.NOIDUNG+'</p>';
	// 					content += '<p class="small text-muted mt-2 mb-0">';
	// 					if(tp.thich == 'yes') {
	// 						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.thich+'" class="btn btn-outline-secondary btn-rounded btn-icon thich-topic click-thich">';
	// 					}
	// 					else {
	// 					content += '<button type="button" data="'+tp.TOPIC+'-'+tp.thich+'" class="btn btn-outline-secondary btn-rounded btn-icon thich-topic">';
	// 					}
	// 					content += '<i class="mdi mdi-thumb-up-outline text-primary"></i> '+tp.countthich+'</button>';
						
	// 					if(tp.kthich == 'yes') {
	// 						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.kthich+'" class="btn btn-outline-secondary btn-rounded btn-icon kthich-topic click-thich">';
	// 					}
	// 					else {
	// 						content += '<button type="button" data="'+tp.TOPIC+'-'+tp.kthich+'" class="btn btn-outline-secondary btn-rounded btn-icon kthich-topic">';
	// 					}
	// 					content += '<i class="mdi mdi-thumb-down-outline text-danger"></i> '+tp.countkthich+'</button>';
	// 					content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon xem-binhluan">';
	// 					content += '<i class="mdi mdi-comment-outline text-dark"></i> '+tp.countbl+'</button>';
	// 					content += '<button type="button" data="'+tp.TOPIC+'-'+tp.MANO+'-'+tp.MAND+'" class="btn btn-outline-secondary btn-rounded btn-icon edit-topic">';
	// 					content += '<i class="mdi mdi-dots-horizontal text-dark"></i></button></p></div></div>';
	// 				});
	// 				$("#danh-sach-topic").html(content);
	// 			}
	// 		},
	// 		error: function(e) {
	// 			console.log(e);
	// 		}
	// 	});
	// }


})(jQuery);