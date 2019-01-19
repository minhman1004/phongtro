(function($) {
	'use strict';

	$(document).ready(function() {
		console.log(mand);
		var nhatro, phongtro = [], nguoio = [], tientro, mant, mapt;
		var khuvuc, tinhtp, quanhuyen, phuongxa, duong;
		nhatro = getDsNhaTro(mand);
		tientro = getTienTro();
		khuvuc = getKhuVuc();
		tinhtp = khuvuc.tinhtp;
		quanhuyen = khuvuc.quanhuyen;
		phuongxa = khuvuc.phuongxa;
		duong = khuvuc.duong;

		// Bang gia
		// Gia
		$("#gia-dien").val('0');
		$("#gia-nuoc").val('0');
		$("#gia-wifi").val('0');
		$("#gia-rac").val('0');
		$("#gia-giu-xe").val('0');
		$("#gia-giu-xe-dap").val('0');
		$("#gia-giu-xe-oto").val('0');
		$("#gia-giu-xe-may").val('0');

		// Add chi phi
		$("#add-gia-dien").val('0');
		$("#add-gia-nuoc").val('0');
		$("#add-gia-wifi").val('0');
		$("#add-gia-rac").val('0');
		$("#add-gia-giu-xe").val('0');
		$("#add-gia-giu-xe-dap").val('0');
		$("#add-gia-giu-xe-oto").val('0');
		$("#add-gia-giu-xe-may").val('0');

		// // Khu vuc
		showTinhTp(tinhtp);
		// Show quan huyen
		var mattp = $("#add-tinh-thanhpho").val();
		showQuanhuyen(quanhuyen, mattp);
		// show phuong xa
		var maqh = $("#add-quan-huyen").val();
		showPhuongxa(phuongxa, maqh);
		// show duong
		var mad = $("#add-phuong-xa").val();
		showDuong(duong, mad);
		diachichinhxac();

		// Change khu vuc
		$(document).on('change', "#add-tinh-thanhpho", function() {
			mattp = $("#add-tinh-thanhpho").val();
			showQuanhuyen(quanhuyen, mattp);
			maqh = $("#add-quan-huyen").val();
			showPhuongxa(phuongxa, maqh);
			mad = $("#add-phuong-xa").val();
			showDuong(duong, mad);
			diachichinhxac();
		});

		$(document).on('change', '#add-quan-huyen', function() {
			maqh = $("#add-quan-huyen").val();
			showPhuongxa(phuongxa, maqh);
			mad = $("#add-phuong-xa").val();
			showDuong(duong, mad);
			diachichinhxac();
		});

		$(document).on('change', '#add-phuong-xa', function() {
			mad = $("#add-phuong-xa").val();
			showDuong(duong, mad);
			diachichinhxac();
		});

		$(document).on('change', '#add-duong', function() {
			diachichinhxac();
		});

		// Hien thi danh sach select nhatro, phongtro
		if(nhatro.length > 0) {
			$("#thongtin-nguoitro").prop('hidden', false);
			$("#thongtin-nhatro").prop('hidden', false);
			console.log(nhatro);
			showSelectNhaTro(nhatro);
			mant = $("#select-nhatro").val();
			showPhongTro(mant, tientro);
			phongtro = getDsPhongTro(mant);
			if(phongtro.length > 0) {
				showSelectPhongTro(phongtro);
				mapt = $("#select-phongtro").val();
				showNguoiTro(mapt);
			}
		}
		else {
			$("#thongtin-nguoitro").prop('hidden', true);
			$("#thongtin-nhatro").prop('hidden', true);
		}

		// Su kien thay doi trong select
		$(document).on('change', '#select-nhatro', function() {
			mant = $("#select-nhatro").val();
			showPhongTro(mant, tientro);
			phongtro = getDsPhongTro(mant);
			if(phongtro.length > 0) {
				$("#thongtin-nguoitro").prop('hidden', false);
				showSelectPhongTro(phongtro);
				mapt = $("#select-phongtro").val();
				showNguoiTro(mapt);
			}
			else {
				$("#thongtin-nguoitro").prop('hidden', true);
			}
		});

		$(document).on('change', '#select-phongtro', function() {
			mapt = $("#select-phongtro").val();
			showNguoiTro(mapt);
		});

		// Open modal
		$(document).on('click', '#open-modal-add-nhatro', function() {
			$("#modal-thongtin-nhatro").modal();

			$('#add-nha-tro').show();
			$('#update-nha-tro').hide();
			$('.add-ten-nhatro').val('');
			$('.add-diachi-chinhxac').val('');

			// Khu vuc
			showTinhTp(tinhtp);
			// Show quan huyen
			var mattp = $("#add-tinh-thanhpho").val();
			showQuanhuyen(quanhuyen, mattp);
			// show phuong xa
			var maqh = $("#add-quan-huyen").val();
			showPhuongxa(phuongxa, maqh);
			// show duong
			var mad = $("#add-phuong-xa").val();
			showDuong(duong, mad);
			diachichinhxac();
			// Gia
			resetBangGia();
			$("#danh-sach-chi-phi").attr('hidden', true);
		});

		$(document).on('click', '#open-modal-thongtin-nhatro', function() {
			var mant_xem, nhatro_info, chiphi_tro;
			$("#modal-thongtin-nhatro").modal();
			mant_xem = $("#select-nhatro").val();
			nhatro_info = getNhaTro(mant_xem);
			chiphi_tro = getChiPhi(mant_xem);
			console.log(nhatro_info);
			console.log(mant_xem);
			console.log(chiphi_tro);

			// show du lieu
			$('#add-nha-tro').hide();
			$('#update-nha-tro').show();
			$('.update-nha-tro').attr('data', mant_xem);
			$("#danh-sach-chi-phi").attr('hidden', false);
			$("#bang-chi-phi").attr('disabled', false);

  			var content = '';

  			// Chi phi
  			if(chiphi_tro.length > 0) {
  				content += '<option disabled selected value="null">Chọn bảng giá</option>';
  				_.forEach(chiphi_tro, function(cp, key) {
  					if(cp.Selected == 'yes') {
  						content += '<option selected value="'+cp.MACP+'">'+cp.TENCP+'</option>';
  					}
  					else {
  						content += '<option value="'+cp.MACP+'">'+cp.TENCP+'</option>';
  					}
  				});
  				$("#bang-chi-phi").html(content);
  				var chiphi_s = _.find(chiphi_tro, {'Selected':'yes'});
  				if(chiphi_s) {
	  				$("#gia-dien").val(chiphi_s.GIADIEN);
	  				$("#gia-nuoc").val(chiphi_s.GIANUOC);
	  				$("#gia-wifi").val(chiphi_s.GiaWifi);
	  				$("#gia-rac").val(chiphi_s.GiaRac);
	  				$("#gia-giu-xe").val(chiphi_s.GiaGXe);
	  				$("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
	  				$("#gia-giu-xe-may").val(chiphi_s.XEMAY);
	  				$('#gia-giu-xe-oto').val(chiphi_s.OTO);

					$("#gia-dien-hide").val(chiphi_s.GIADIEN);
					$("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
					$("#gia-wifi-hide").val(chiphi_s.GiaWifi);
					$("#gia-rac-hide").val(chiphi_s.GiaRac);
					$("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
					$("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
					$("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
					$('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
  				}
  				else {
  					chiphi_s = _.find(chiphi_tro, {'MACP':$("#bang-chi-phi").val()});
  					if(chiphi_s) {
	  					$("#gia-dien").val(chiphi_s.GIADIEN);
		  				$("#gia-nuoc").val(chiphi_s.GIANUOC);
		  				$("#gia-wifi").val(chiphi_s.GiaWifi);
		  				$("#gia-rac").val(chiphi_s.GiaRac);
		  				$("#gia-giu-xe").val(chiphi_s.GiaGXe);
		  				$("#gia-giu-xe-dap").val(chiphi_s.XEDAP);
		  				$("#gia-giu-xe-may").val(chiphi_s.XEMAY);
		  				$('#gia-giu-xe-oto').val(chiphi_s.OTO);

						$("#gia-dien-hide").val(chiphi_s.GIADIEN);
						$("#gia-nuoc-hide").val(chiphi_s.GIANUOC);
						$("#gia-wifi-hide").val(chiphi_s.GiaWifi);
						$("#gia-rac-hide").val(chiphi_s.GiaRac);
						$("#gia-giu-xe-hide").val(chiphi_s.GiaGXe);
						$("#gia-giu-xe-dap-hide").val(chiphi_s.XEDAP);
						$("#gia-giu-xe-may-hide").val(chiphi_s.XEMAY);
						$('#gia-giu-xe-oto-hide').val(chiphi_s.OTO);
  					}
  					else {
						resetBangGia();
  					}
  				}
  				content  = '';
  			}
  			else {
  				$("#danh-sach-chi-phi").attr('hidden', true);
  				$("#bang-chi-phi").val('null');
  				resetBangGia();
  			}

  			// Display data
  			$(".add-ten-nhatro").val(nhatro_info[0].TENNT);
  			$('.add-chu-chungcu-nhatro').val(nhatro_info[0].MAND);
  			$('input[name=camera][value="'+nhatro_info[0].Camera+'"]').prop('checked', true);
  			$('input[name=parking][value="'+nhatro_info.Parking+'"]').prop('checked', true);
  			$('input[name=guard][value="'+nhatro_info.Guard+'"]').prop('checked', true);

	  		// Khu vuc
	  		showTinhTp(tinhtp);
  			$('.add-tinh-thanhpho').val(nhatro_info[0].MATTP);

			var mattp = $("#add-tinh-thanhpho").val();
			showQuanhuyen(quanhuyen, mattp);
  			$('.add-quan-huyen').val(nhatro_info[0].MAQH);

			// show phuong xa
			var maqh = $("#add-quan-huyen").val();
			showPhuongxa(phuongxa, maqh);
  			$('.add-phuong-xa').val(nhatro_info[0].MAPX);

			// show duong
			var mad = $("#add-phuong-xa").val();
			showDuong(duong, mad);
  			if(nhatro_info[0].MAD != null) $('.add-duong').val(nhatro_info[0].MATTP);
  			else $('.add-duong').val('null');

  			// DCTD
  			$("#add-diachi-chinhxac").val(nhatro_info[0].DCTD);
		});

		$(document).on('click', '#update-nha-tro', function() {
			var ten, chutro, kinhdo, vido, tp_update, qh_update, px_update, d_update, diachi, id, camera, parking, guard;
			var cten, cdiachi;
			var chiphi, dien, nuoc, wifi, rac, giuxe, xedap, xemay, oto;
			var dienc, nuocc, wific, racc, giuxec, xedapc, xemayc, otoc, tencp;

			var bando = $("#map-nhatro").attr('data');
			vido = bando.split(',')[0];
			kinhdo = bando.split(',')[1];

			cten = ".add-ten-nhatro";
			cdiachi = ".add-diachi-chinhxac";

			id = $("#select-nhatro").val(); // id nha tro
			ten = $(".add-ten-nhatro").val();
			chutro = mand;
			tp_update = $('.add-tinh-thanhpho').val();
			qh_update = $('.add-quan-huyen').val();
			px_update = $('.add-phuong-xa').val();
			diachi = $('.add-diachi-chinhxac').val();
			camera = $("input[name=camera]:checked").val();
			parking = $("input[name=parking]:checked").val();
			guard = $("input[name=guard]:checked").val();
			
			chiphi = $("#bang-chi-phi").val();
			dien = $("#gia-dien").val();
			nuoc = $("#gia-nuoc").val();
			wifi = $("#gia-wifi").val();
			rac = $("#gia-rac").val();
			giuxe = $("#gia-giu-xe").val();
			xedap = $("#gia-giu-xe-dap").val();
			xemay = $("#gia-giu-xe-may").val();
			oto = $("#gia-giu-xe-oto").val();
			tencp = 'Bảng chi phí: ' + ten;

			dienc = $("#gia-dien-hide").val();
			nuocc = $("#gia-nuoc-hide").val();
			wific = $("#gia-wifi-hide").val();
			racc = $("#gia-rac-hide").val();
			giuxec = $("#gia-giu-xe-hide").val();
			xedapc = $("#gia-giu-xe-dap-hide").val();
			xemayc = $("#gia-giu-xe-may-hide").val();
			otoc = $("#gia-giu-xe-oto-hide").val();

			if($('.add-duong').val() != 'null') {
				d_update = $(".add-duong").val();
				checkEmpty(cten);
				checkEmpty(cdiachi);

				if(ten != '' && diachi != '') {
					$.ajax({
						type: 'post',
						url: 'rooms/updateNhaTroDuong',
						async: false,
						data: {
							id: id,
							ten: ten,
							chutro: chutro,
							tinhtp: tp_update,
							quanhuyen: qh_update,
							phuongxa: px_update,
							duong: d_update,
							diachi: diachi,
							camera: camera,
							parking: parking,
							guard: guard,
							chiphi: chiphi,
							dien: dien,
							dienc: dienc,
							nuoc: nuoc,
							nuocc: nuocc,
							wifi: wifi,
							wific: wific,
							rac: rac,
							racc: racc,
							giuxe: giuxe,
							giuxec: giuxec,
							xedap: xedap,
							xedapc: xedapc,
							xemay: xemay,
							xemayc: xemayc,
							oto: oto,
							otoc: otoc,
							tencp: tencp,
							vido: vido,
							kinhdo: kinhdo
						},
						success: function(data) {
							console.log('data: ', data);
							swal('Thành công!', 'Cập nhật thông tin nhà trọ thành công!', 'success');
			                $('#cancel-nha-tro').click();
			                $(".modal-backdrop").modal('hide');
			                $('body').removeClass('modal-open');
			                $('.modal-backdrop').remove();
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}
			else {
				checkEmpty(cten);
				checkEmpty(cdiachi);
				if(ten != '' && diachi != '') {
					$.ajax({
						type: 'post',
						url: 'rooms/updateNhaTro',
						async: false,
						data: {
							id: id,
							ten: ten,
							chutro: chutro,
							tinhtp: tp_update,
							quanhuyen: qh_update,
							phuongxa: px_update,
							diachi: diachi,
							camera: camera,
							parking: parking,
							guard: guard,
							chiphi: chiphi,
							dien: dien,
							dienc: dienc,
							nuoc: nuoc,
							nuocc: nuocc,
							wifi: wifi,
							wific: wific,
							rac: rac,
							racc: racc,
							giuxe: giuxe,
							giuxec: giuxec,
							xedap: xedap,
							xedapc: xedapc,
							xemay: xemay,
							xemayc: xemayc,
							oto: oto,
							otoc: otoc,
							tencp: tencp,
							kinhdo: kinhdo,
							vido: vido
						},
						success: function(data) {
							console.log('data: ', data);
							swal('Thành công!', 'Cập nhật thông tin nhà trọ thành công!', 'success');
			                $('#cancel-nha-tro').click();
			                $(".modal-backdrop").modal('hide');
			                $('body').removeClass('modal-open');
			                $('.modal-backdrop').remove();
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}
		});

		// Add nha tro
		$(document).on('click', '#add-nha-tro', function() {
			var ten, chutro, kinhdo, vido, tp_update, qh_update, px_update, d_update, diachi, camera, parking, guard;
			var cten, cdiachi;
			var dien, nuoc, wifi, rac, giuxe, xedap, xemay, oto, tencp;

			var bando = $("#map-nhatro").attr('data');
			vido = bando.split(',')[0];
			kinhdo = bando.split(',')[1];

			cten = ".add-ten-nhatro";
			cdiachi = ".add-diachi-chinhxac";

			ten = $(".add-ten-nhatro").val();
			chutro = mand;
			tp_update = $('.add-tinh-thanhpho').val();
			qh_update = $('.add-quan-huyen').val();
			px_update = $('.add-phuong-xa').val();
			diachi = $('.add-diachi-chinhxac').val();
			camera = $("input[name=camera]:checked").val();
			parking = $("input[name=parking]:checked").val();
			guard = $("input[name=guard]:checked").val();

			dien = $("#gia-dien").val();
			nuoc = $("#gia-nuoc").val();
			wifi = $("#gia-wifi").val();
			rac = $("#gia-rac").val();
			giuxe = $("#gia-giu-xe").val();
			xedap = $("#gia-giu-xe-dap").val();
			xemay = $("#gia-giu-xe-may").val();
			oto = $("#gia-giu-xe-oto").val();
			tencp = 'Bảng chi phí: ' + ten;


			if($('.add-duong').val() != 'null') {
				d_update = $(".add-duong").val();
				checkEmpty(cten);
				checkEmpty(cdiachi);

				if(ten != '' && diachi != '') {
					$.ajax({
						type: 'post',
						url: 'rooms/addNhaTroDuong',
						data: {
							ten: ten,
							chutro: chutro,
							tinhtp: tp_update,
							quanhuyen: qh_update,
							phuongxa: px_update,
							duong: d_update,
							diachi: diachi,
							camera: camera,
							parking: parking,
							guard: guard,
							dien: dien,
							nuoc: nuoc,
							wifi: wifi,
							rac: rac,
							giuxe: giuxe,
							xedap: xedap,
							xemay: xemay,
							oto: oto,
							tencp: tencp,
							kinhdo: kinhdo,
							vido: vido
						},
						success: function(data) {
							if(data != 'false') {
								swal('Thành công!', 'Thêm nhà trọ mới thành công!', 'success');
								$(".add-ten-nhatro").val('');
								showSelectNhaTro();
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}
			else {
				checkEmpty(cten);
				checkEmpty(cdiachi);
				// // console.log('data: ', _.concat([ten, chutro, tinhtp, quanhuyen, phuongxa, diachi]));
				if(ten != '' && diachi != '') {
					$.ajax({
						type: 'post',
						url: 'rooms/addNhaTro',
						data: {
							ten: ten,
							chutro: chutro,
							tinhtp: tp_update,
							quanhuyen: qh_update,
							phuongxa: px_update,
							diachi: diachi,
							camera: camera,
							parking: parking,
							guard: guard,
							dien: dien,
							nuoc: nuoc,
							wifi: wifi,
							rac: rac,
							tencp: tencp,
							giuxe: giuxe,
							xedap: xedap,
							xemay: xemay,
							oto: oto,
							kinhdo: kinhdo,
							vido: vido
						},
						success: function(data) {
							if(data != 'false') {
								swal('Thành công!', 'Thêm nhà trọ mới thành công!', 'success');
								$(".add-ten-nhatro").val('');
								showSelectNhaTro();
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}
		});

		// Change chiphi
		$(document).on('change', '#bang-chi-phi', function() {
			var id = $("#bang-chi-phi").val();
			var rs = getMotChiPhi(id);
			console.log(rs);

			$("#gia-dien").val(rs.GIADIEN);
			$("#gia-nuoc").val(rs.GIANUOC);
			$("#gia-wifi").val(rs.GiaWifi);
			$("#gia-rac").val(rs.GiaRac);
			$("#gia-giu-xe").val(rs.GiaGXe);
			$("#gia-giu-xe-dap").val(rs.XEDAP);
			$("#gia-giu-xe-may").val(rs.XEMAY);
			$('#gia-giu-xe-oto').val(rs.OTO);

			$("#gia-dien-hide").val(rs.GIADIEN);
			$("#gia-nuoc-hide").val(rs.GIANUOC);
			$("#gia-wifi-hide").val(rs.GiaWifi);
			$("#gia-rac-hide").val(rs.GiaRac);
			$("#gia-giu-xe-hide").val(rs.GiaGXe);
			$("#gia-giu-xe-dap-hide").val(rs.XEDAP);
			$("#gia-giu-xe-may-hide").val(rs.XEMAY);
			$('#gia-giu-xe-oto-hide').val(rs.OTO);
		});
		
		// Open modal add chi phi
		$(document).on('click', '#open-modal-add-chiphi', function() {
			$("#modal-add-chiphi").modal();
			resetAddBangGia();
			showSelectNhaTroBangGia(nhatro);
		});

		// Add chi phi
		$(document).on('click', '.add-chiphi-nhatro', function() {
			var nhatro, ten, dien, nuoc, wifi, rac, giuxe, xedap, xemay, oto, tenc;
			nhatro = $("#add-nhatro-chiphi").val();
			ten = $("#add-ten-chiphi").val();
			dien = $("#add-gia-dien").val();
			nuoc = $("#add-gia-nuoc").val();
			wifi = $('#add-gia-wifi').val();
			rac = $("#add-gia-rac").val();
			giuxe = $("#add-gia-giu-xe").val();
			xedap = $("#add-gia-giu-xe-dap").val();
			xemay = $("#add-gia-giu-xe-may").val();
			oto = $("#add-gia-giu-xe-oto").val();
			tenc = '#add-ten-chiphi';
			checkEmpty(tenc);

			if(ten != '') {
				console.log('Dataaa: ', _.concat([nhatro, ten,dien,nuoc,wifi,rac,giuxe,xedap,xemay,oto]));
				$.ajax({
					type: 'post',
					url: 'rooms/addChiPhi',
					data: {
						nhatro: nhatro,
						ten: ten,
						dien: dien,
						nuoc: nuoc,
						wifi: wifi,
						rac: rac,
						giuxe: giuxe,
						xedap: xedap,
						xemay: xemay,
						oto: oto,
						trangthai: 'new',
						selected: 'no'
					},
					success: function(data) {
						console.log('DATAAA: ', data);
						if(data == 'true') {
							swal('Thành công!', 'Thêm bảng chi phí mới thành công!', 'success');
							resetAddBangGia();
						}
						else {
							swal('Lỗi!', 'Nhập giá trị lớn hơn 0 để tạo bảng chi phí!', 'warning');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
		});
		
		$(document).on('click', '#open-modal-add-phongtro', function() {
			$("#modal-add-phongtro").modal();
			$(".nguoio-phongtro").val('1');
			$(".dientich-phongtro").val('1');
			$(".tientro-phongtro").val('1');
			showInput(parseInt($(".nguoio-phongtro").val(), 10));
		});

		// add phong tro
		$(document).on('click', '.add-phongtro', function() {
			var ten, dientich, sltd, tt_add, mota, mant, cachtinh;
			var cmnd, sdt, hoten, gioitinh, diachi;
			var cmnd_s, sdt_s, hoten_s, diachi_s;
			var dsNguoi = [];
			var complete = 0;

			mant = $("#select-nhatro").val();
			console.log('mant: ', mant);
			ten = $('#ten-phongtro').val();
			dientich = $("#dientich-phongtro").val();
			sltd = $("#nguoio-phongtro").val();
			tt_add = $("#tientro-phongtro").val();
			mota = $("#mota-phongtro").val();
			cachtinh = $("input[name=cachtinh-phongtro]").val();

			cmnd_s = '.nguoio-cmnd';
			sdt_s = '.nguoio-sdt';
			hoten_s = '.nguoio-ten';
			diachi_s = '.nguoio-diachi';

			checkEmpty('.ten-phongtro');

			if(ten != '') {
				for(var i = 0; i < parseInt(sltd,10); i++) {
					var nguoi = {};
					// Element value
					cmnd = $($(".nguoio-cmnd")[i]).val();
					sdt = $($(".nguoio-sdt")[i]).val();
					hoten = $($('.nguoio-ten')[i]).val();
					diachi = $($(".nguoio-diachi")[i]).val();
					gioitinh = $($(".nguoio-gioitinh")[i]).val();
					if(cmnd != '' && sdt != '' && hoten != '') {
						if($($(".nguoio-cmnd")[i]).inputmask('isComplete') && $($(".nguoio-sdt")[i]).inputmask('isComplete')) {
							nguoi = {
								cmnd: cmnd,
								sdt: sdt,
								hoten: hoten,
								diachi: diachi,
								gioitinh: gioitinh
							};
							dsNguoi.push(nguoi);
						}
						else {
							swal('Lỗi!', 'Vui lòng nhập đẩy đủ thông tin CMND và Số điện thoại!', 'warning');
							complete ++;
						}
					}
				}
				if(dsNguoi.length > 0 && complete == 0) {
					$.ajax({
						type: 'post',
						url: 'rooms/addPhongTro',
						async: false,
						data: {
							ten: ten,
							nhatro: mant,
							dientich: dientich,
							sltd: sltd,
							slndo: dsNguoi.length,
							tientro: tt_add,
							mota: mota,
							cachtinh: cachtinh,
							dsTro: dsNguoi
						},
						success: function(data) {
							console.log('data ds co nguoio',data);
							if(data == 'true') {
								swal('Thành công!', 'Thêm phòng trọ mới thành công!', 'success');
								phongtro = getDsPhongTro(mant);
								showPhongTro(mant, tientro);
								showSelectPhongTro(phongtro);
							}
							else {
								swal('Lỗi!', 'Có lỗi xảy ra, vui lòng kiểm tra lại!', 'error');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
				else {
					$.ajax({
						type: 'post',
						url: 'rooms/addPhongTro',
						async: false,
						data: {
							ten: ten,
							nhatro: mant,
							dientich: dientich,
							sltd: sltd,
							slndo: 0,
							mota: mota,
							cachtinh: cachtinh,
							tientro: tt_add,
							dsTro: []
						},
						success: function(data) {
							console.log('data ds khong nguoi o',data);
							if(data == 'true') {
								swal('Thành công!', 'Thêm phòng trọ mới thành công!', 'success');
								phongtro = getDsPhongTro(mant);
								showPhongTro(mant, tientro);
								showSelectPhongTro(phongtro);
				                $('.cancel-add').click();
				                $(".modal-backdrop").modal('hide');
				                $('body').removeClass('modal-open');
				                $('.modal-backdrop').remove();
							}
							else {
								swal('Lỗi!', 'Có lỗi xảy ra, vui lòng kiểm tra lại!', 'error');
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				}
			}
		});

		$(document).on('click', '.edit-phongtro', function() {
			$("#modal-xem-phongtro").modal();
			var id = $(this).attr('data')[0];
			$("#update-phongtro").attr('data', id);
			$("#xem-ten-phongtro").parent().removeClass('has-danger');
			$("#xem-ten-phongtro").removeClass('form-control-danger');
			$.ajax({
				type: 'post',
				url: 'rooms/getMotPhongTro',
				data: {
					id: id
				},
				success: function(data) {
					data = JSON.parse(data);
					console.log('data: ', data);
					if(data != 'false') {
						$("#xem-ten-phongtro").val(data.Ten)
						$("#xem-nguoio-phongtro").val(data.SLTD);
						$("#xem-tientro-phongtro").val(data.GIA);
						$("#xem-mota-phongtro").val(data.GhiChu);
						$("#xem-dientich-phongtro").val(data.DienTich);
						$("#xem-nguoidango-phongtro").val(data.SLNDO);
						$("input[name=xem-cachtinh-phongtro][value='"+data.CACHTINH+"']").prop('checked', true);
						$("#xem-tientro-giacu-phongtro").val(data.GIA);
						$("#xem-cachtinh-cu-phongtro").val(data.CACHTINH);
					}
					else {
						console.log('Something wrong!');
					}
				},
				error: function(e) {
					console.log(e);
				}
			});
		});

		// Update phong tro
		$(document).on('click', '#update-phongtro', function() {
			var ten, dientich, sltd, tt_update, mota, cachtinh, giacu, cachtinhcu, dango;
			var id = $(this).attr('data');
			checkEmpty('#xem-ten-phongtro');
			ten = $("#xem-ten-phongtro").val()
			sltd = $("#xem-nguoio-phongtro").val();
			dango = $("#xem-nguoidango-phongtro").val();
			tt_update = $("#xem-tientro-phongtro").val();
			mota = $("#xem-mota-phongtro").val();
			dientich = $("#xem-dientich-phongtro").val();
			cachtinh = $("input[name=xem-cachtinh-phongtro]:checked").val();
			giacu = $("#xem-tientro-giacu-phongtro").val();
			cachtinhcu = $("#xem-cachtinh-cu-phongtro").val();
			console.log("data update: ", _.concat(ten, sltd, tt_update, mota, dientich, cachtinh, giacu, cachtinhcu));
			if(sltd >= dango) {
				$.ajax({
					type: 'post',
					url: 'rooms/updatePhongTro',
					data: {
						id: id,
						ten: ten,
						sltd: sltd,
						tientro: tt_update,
						mota: mota,
						dientich: dientich,
						cachtinh: cachtinh,
						giacu: giacu,
						cachtinhcu: cachtinhcu
					},
					success: function(data) {
						if(data != 'false') {
							swal('Thành công!', 'Cập nhật thông tin phòng trọ thành công!', 'success');
							showPhongTro($("#select-nhatro").val(), tientro);
			                $('.cancel-update').click();
			                $(".modal-backdrop").modal('hide');
			                $('body').removeClass('modal-open');
			                $('.modal-backdrop').remove();
						}
						else {
							swal('Thành công!', 'Cập nhật thông tin phòng trọ thành công!', 'success');
						}
					},
					error: function(e) {
						console.log(e);
					}
				});
			}
			else {
				swal('Lỗi!', 'Không thể giảm người ở tối đa nhỏ hơn số người đang ở!', 'warning');
				$("#xem-nguoio-phongtro").val(sltd);
			}	
		});

		// Cap nhat / Them nguoi o
		$(document).on('click', '.save-nguoio', function() {
			var ten, cmnd, sdt, diachi, gioitinh, id;
			id = $(this).attr('data').split('-');
			var mapt = $("#select-phongtro").val();
			// If update
			if(id[0] != 'null') {
				console.log('update nguoi tro');
				ten = $("#dsnguoio-ten-"+id[0]).val();
				cmnd = $("#dsnguoio-cmnd-"+id[0]).val();
				sdt = $("#dsnguoio-sdt-"+id[0]).val();
				gioitinh = $("#dsnguoio-gioitinh-"+id[0]).val();
				diachi = $("#dsnguoio-diachi-"+id[0]).val();
				if(ten != '') {
					if($("#dsnguoio-cmnd-"+id[0]).inputmask('isComplete') && $("#dsnguoio-sdt-"+id[0]).inputmask('isComplete')) {
						console.log('okay');
						$.ajax({
							type: 'post',
							url: 'rooms/updateNguoiTro',
							data: {
								id: id[0],
								ten: ten,
								cmnd: cmnd,
								sdt: sdt,
								gioitinh: gioitinh,
								diachi: diachi
							},
							success: function(data) {
								swal('Thành công!', 'Cập nhật thông tin người ở thành công!', 'success');
								mapt = $("#select-phongtro").val();
								showNguoiTro(mapt);
							},
							error: function(e) {
								console.log(e);
							}
						});
					}
					else {
						swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
					}
				}
				else {
					swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
				}
			}
			// If create new nguoitro
			else {
				console.log('add nguoi tro');
				ten = $("#add-nguoitro-ten-"+id[1]).val();
				cmnd = $("#add-nguoitro-cmnd-"+id[1]).val();
				sdt = $("#add-nguoitro-sdt-"+id[1]).val();
				gioitinh = $("#dsnguoio-gioitinh-"+id[1]).val();
				diachi = $("#add-nguoitro-diachi-"+id[1]).val();
				console.log('isComplete ', $("#add-nguoitro-cmnd-"+id[1]).inputmask('isComplete'));
				if(ten != '') {
					if($("#add-nguoitro-cmnd-"+id[1]).inputmask('isComplete') && $("#add-nguoitro-sdt-"+id[1]).inputmask('isComplete')) {
						$.ajax({
							type: 'post',
							url: 'rooms/addNguoiTro',
							data: {
								mapt: mapt,
								ten: ten,
								cmnd: cmnd,
								sdt: sdt,
								gioitinh: gioitinh,
								diachi: diachi
							},
							success: function(data) {
								if(data != 'false') {
									swal('Thành công!', 'Thêm người trọ mới thành công!', 'success');
									mapt = $("#select-phongtro").val();
									showNguoiTro(mapt);
								}
								else {
									swal('Lỗi!', 'Có lỗi xảy ra, vui lòng kiểm tra lại!', 'error');
								}
							},
							error: function(e) {
								console.log(e);
							}
						});
					}
					else {
						swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
					}
				}
				else {
					swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin!', 'warning');
				}
			}
		});

		// Chuyen tro
		$(document).on('click', '.cancel-nguoio', function() {
			var id = $(this).attr('data');
			var mapt = $("#select-phongtro").val();
			swal({
			  title: "Chuyển người này ?",
			  text: "Xác nhận rằng người này không còn ở nhà trọ của bạn!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  	if (willDelete) {
				  	$.ajax({
						type: 'post',
						url: 'rooms/updateChuyenTro',
						data: {
							mapt: mapt,
							id: id
						},
						success: function(data) {
							if(data != false) {
								swal('Thành công!', 'Thao tác thành công!', 'success');
								showNguoiTro(mapt);
								loadPhongTro();
							}
							else {
								swal('Lỗi!', 'Xảy ra lỗi, vi lòng kiểm tra lại!', 'error');
								showNguoiTro(mapt);
								loadPhongTro();
							}
						},
						error: function(e) {
							console.log(e);
						}
					});
				} else {
				swal("Bình luận chưa được xóa!");
				}
			});
		});

		// Typing gia
		// Gia dien
		$(document).on('keyup', '#gia-dien', function() {
			if($("#gia-dien").val() < 0) $("#gia-dien").val('0');
			if($("#gia-dien").val().length == 0) $("#gia-dien").val('0');
		});

		// Nuoc
		$(document).on('keyup', '#gia-nuoc', function(){
			if($("#gia-nuoc").val().length == 0) $("#gia-nuoc").val('0');
			if($("#gia-nuoc").val() < 0) $("#gia-nuoc").val('0');
		});

		// Wifi
		$(document).on('keyup', '#gia-wifi', function(){
			if($("#gia-wifi").val().length == 0) $("#gia-wifi").val('0');
			if($("#gia-wifi").val() < 0) $("#gia-wifi").val('0');	
		});

		// Rac
		$(document).on('keyup', '#gia-rac', function(){
			if($("#gia-rac").val().length == 0) $("#gia-rac").val('0');
			if($("#gia-rac").val() < 0) $("#gia-rac").val('0');	
		});

		// Giu xe
		$(document).on('keyup', '#gia-giu-xe', function(){
			if($("#gia-giu-xe").val().length == 0) $("#gia-giu-xe").val('0');
			if($("#gia-giu-xe").val() < 0) $("#gia-giu-xe").val('0');	
		});

		// Xe dap
		$(document).on('keyup', '#gia-giu-xe-dap', function(){
			if($("#gia-giu-xe-dap").val().length == 0) $("#gia-giu-xe-dap").val('0');
			if($("#gia-giu-xe-dap").val() < 0) $("#gia-giu-xe-dap").val('0');	
		});

		// Xe may
		$(document).on('keyup', '#gia-giu-xe-may', function(){
			if($("#gia-giu-xe-may").val().length == 0) $("#gia-giu-xe-may").val('0');
			if($("#gia-giu-xe-may").val() < 0) $("#gia-giu-xe-may").val('0');	
		});

		// Oto
		$(document).on('keyup', '#gia-giu-xe-oto', function(){
			if($("#gia-giu-xe-oto").val().length == 0) $("#gia-giu-xe-oto").val('0');
			if($("#gia-giu-xe-oto").val() < 0) $("#gia-giu-xe-oto").val('0');	
		});

		// Typing gia
		// Gia dien
		$(document).on('keyup', '#add-gia-dien', function() {
			if($("#add-gia-dien").val() < 0) $("#add-gia-dien").val('0');
			if($("#add-gia-dien").val().length == 0) $("#add-gia-dien").val('0');
		});

		// Nuoc
		$(document).on('keyup', '#add-gia-nuoc', function(){
			if($("#add-gia-nuoc").val().length == 0) $("#add-gia-nuoc").val('0');
			if($("#add-gia-nuoc").val() < 0) $("#add-gia-nuoc").val('0');
		});

		// Wifi
		$(document).on('keyup', '#add-gia-wifi', function(){
			if($("#add-gia-wifi").val().length == 0) $("#add-gia-wifi").val('0');
			if($("#add-gia-wifi").val() < 0) $("#add-gia-wifi").val('0');	
		});

		// Rac
		$(document).on('keyup', '#add-gia-rac', function(){
			if($("#add-gia-rac").val().length == 0) $("#add-gia-rac").val('0');
			if($("#add-gia-rac").val() < 0) $("#add-gia-rac").val('0');	
		});

		// Giu xe
		$(document).on('keyup', '#add-gia-giu-xe', function(){
			if($("#add-gia-giu-xe").val().length == 0) $("#add-gia-giu-xe").val('0');
			if($("#add-gia-giu-xe").val() < 0) $("#add-gia-giu-xe").val('0');	
		});

		// Xe dap
		$(document).on('keyup', '#add-gia-giu-xe-dap', function(){
			if($("#add-gia-giu-xe-dap").val().length == 0) $("#add-gia-giu-xe-dap").val('0');
			if($("#add-gia-giu-xe-dap").val() < 0) $("#add-gia-giu-xe-dap").val('0');	
		});

		// Xe may
		$(document).on('keyup', '#add-gia-giu-xe-may', function(){
			if($("#add-gia-giu-xe-may").val().length == 0) $("#add-gia-giu-xe-may").val('0');
			if($("#add-gia-giu-xe-may").val() < 0) $("#add-gia-giu-xe-may").val('0');	
		});

		// Oto
		$(document).on('keyup', '#add-gia-giu-xe-oto', function(){
			if($("#add-gia-giu-xe-oto").val().length == 0) $("#add-gia-giu-xe-oto").val('0');
			if($("#add-gia-giu-xe-oto").val() < 0) $("#add-gia-giu-xe-oto").val('0');	
		});

		var slnguoio;
		$("input[name=cachtinh-phongtro][value=daunguoi]").prop('checked', true);
		$(".nguoio-phongtro").val('1');
		$(".dientich-phongtro").val('1');
		$(".tientro-phongtro").val('1');
		slnguoio = parseInt($(".nguoio-phongtro").val(), 10);
		showInput(slnguoio);

		$(document).on('change keyup',".nguoio-phongtro" , function() {
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 10) $(this).val('10');
			if($(this).val() == '') $(this).val('1');

			slnguoio = parseInt($(this).val(), 10);
			var dsNguoi = saveData(slnguoio);
			showInput(slnguoio);
			recover(dsNguoi);
		});

		$(".dientich-phongtro").on('change keyup', function() {
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 1000000000) $(this).val('1000000000');
			if($(this).val() == '') $(this).val('1');
		});

		$(".tientro-phongtro").on('change keyup', function() {
			if($(this).val() < 1) $(this).val('1');
			if($(this).val() > 1000000000) $(this).val('1000000000');
			if($(this).val() == '') $(this).val('1');
		});

	});

	// FUNCTION -------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------
	
		function saveData(num) {
		var dsNguoi = [];
		for(var i = 0; i < num; i++) {
			var nguoi = {
				cmnd: '',
				sdt: '',
				hoten: '',
				gioitinh: 'nam',
				diachi: ''
			};
			if($($('.nguoio-cmnd')[i]).val() != '') {
				nguoi.cmnd = $($('.nguoio-cmnd')[i]).val();
				if(_.isUndefined(nguoi.cmnd)) nguoi.cmnd = '';
			}
			if($($('.nguoio-sdt')[i]).val() != '') {
				nguoi.sdt = $($('.nguoio-sdt')[i]).val();
				if(_.isUndefined(nguoi.sdt)) nguoi.sdt = '';
			}
			if($($('.nguoio-hoten')[i]).val() != '') {
				nguoi.hoten = $($('.nguoio-ten')[i]).val();
				if(_.isUndefined(nguoi.hoten)) nguoi.hoten = '';
			}
			if($($('.nguoio-gioitinh')[i]).val() != '') {
				nguoi.gioitinh = $($('.nguoio-gioitinh')[i]).val();
				if(_.isUndefined(nguoi.gioitinh)) nguoi.gioitinh = 'nam';
			}
			if($($('.nguoio-diachi')[i]).val() != '') {
				nguoi.diachi = $($('.nguoio-diachi')[i]).val();
				if(_.isUndefined(nguoi.diachi)) nguoi.diachi = '';
			}
			dsNguoi.push(nguoi);
		}
		return dsNguoi;
	}

	function recover(dsNguoi) {
		_.forEach(dsNguoi, function(nguoi, key) {
			$($(".nguoio-cmnd")[key]).val(nguoi.cmnd);
			$($(".nguoio-sdt")[key]).val(nguoi.sdt);
			$($('.nguoio-ten')[key]).val(nguoi.hoten);
			$($(".nguoio-diachi")[key]).val(nguoi.diachi);
			$($(".nguoio-gioitinh")[key]).val(nguoi.gioitinh);
		});
	}

	function showInput(num) {
		var content = '';
		for(var i = 0; i < num; i++) {
      		content += '<label>Người thứ: '+(i+1)+'</label>';
			content += '<div class="row">';
			content += '<div class="form-group col-md-3">';
			content += '<input class="form-control form-control-sm nguoio-cmnd" id="nguoio-cmnd-'+(i+1)+'" placeholder="CMND *">';
			content += '</div>';
			content += '<div class="form-group col-md-3">';
			content += '<input class="form-control form-control-sm nguoio-sdt"  id="nguoio-sdt-'+(i+1)+'" placeholder="Số điện thoại *">';
			content += '</div>';
			content += '<div class="form-group  col-md-4">';
			content += '<input type="text" maxlength="30" class="form-control form-control-sm nguoio-ten" placeholder="Họ và tên *">';
			content += '</div>';
			content += '<div class="form-group col-md-2">';
			content += '<select class="form-control nguoio-gioitinh">';
			content += '<option value="nam">Nam</option>';
			content += '<option value="nu">Nữ</option>';
			content += '</select>';
			content += '</div>';
			content += '<div class="form-group col-md-12">';
			content += '<input type="text" maxlength="100" class="form-control form-control-sm nguoio-diachi" placeholder="Địa chỉ">';
			content += '</div>';
			if(i != num - 1) {
				content += '</div><hr>';
			}
			if(i == num - 1) {
			content += '<div class="form-group col-md-12">';
          	content += '<label style="color:#ff0000; margin-top:1%;">* Chú ý</label><br>';
          	content += '<label style="color:#ff0000; margin-top:1%;">- Thông tin người ở để trống nếu chưa có.</label><br>';
          	content += '<label style="color:#ff0000; margin-top:1%;">- Nếu có người ở, vui lòng nhập đủ số CMND, Số điện thoại và Họ tên.</label>';
			content += '</div>';
			}
		}
		$("#danhsach-nguoio").html(content);
		content = '';
		$(".nguoio-cmnd").inputmask('999999999');
		$(".nguoio-sdt").inputmask('9999999999');
	}

	// Check empty
	function checkEmpty(string) {
		if($(string).val() == '') {
			$(string).parent().addClass('has-danger');
			$(string).addClass('form-control-danger');
			swal('Lỗi!', 'Vui lòng nhập đầy đủ thông tin và thử lại!', 'warning');
		}
		else {
			$(string).parent().removeClass('has-danger');
			$(string).removeClass('form-control-danger');
		}
	}

	function resetAddBangGia() {
		$("#add-gia-dien").val('0');
		$("#add-gia-nuoc").val('0');
		$("#add-gia-wifi").val('0');
		$("#add-gia-rac").val('0');
		$("#add-gia-giu-xe").val('0');
		$("#add-gia-giu-xe-dap").val('0');
		$("#add-gia-giu-xe-oto").val('0');
		$("#add-gia-giu-xe-may").val('0');
	}

	function resetBangGia() {
		$("#gia-dien").val('0');
		$("#gia-nuoc").val('0');
		$("#gia-wifi").val('0');
		$("#gia-rac").val('0');
		$("#gia-giu-xe").val('0');
		$("#gia-giu-xe-dap").val('0');
		$("#gia-giu-xe-may").val('0');
		$('#gia-giu-xe-oto').val('0');

		$("#gia-dien-hide").val('0');
		$("#gia-nuoc-hide").val('0');
		$("#gia-wifi-hide").val('0');
		$("#gia-rac-hide").val('0');
		$("#gia-giu-xe-hide").val('0');
		$("#gia-giu-xe-dap-hide").val('0');
		$("#gia-giu-xe-may-hide").val('0');
		$('#gia-giu-xe-oto-hide').val('0');
	}

	function diachichinhxac() {
		var diachi, tinhtp, quanhuyen, phuongxa, duong;
		tinhtp = $('.add-tinh-thanhpho').children('option').filter(":selected").text();
		quanhuyen = $('.add-quan-huyen').children('option').filter(":selected").text();
		phuongxa = $('.add-phuong-xa').children('option').filter(":selected").text();
		if($('.add-duong').val() != 'null') {
			duong = $('.add-duong').children('option').filter(":selected").text();
			diachi = duong + ', ' + phuongxa + ', ' + quanhuyen + ', ' + tinhtp;
		}
		else {
			diachi = phuongxa + ', ' + quanhuyen + ', ' + tinhtp;
		}
		$('.add-diachi-chinhxac').val(diachi);
	}

	function showTinhTp(dstinhtp) {
		var content = '';
		_.forEach(dstinhtp, function(tp, key) {
			content += '<option value="'+tp.MATTP+'">'+tp.TEN+'</option>';
		});

		$("#add-tinh-thanhpho").html(content);
	}

	function showQuanhuyen(dsquanhuyen, mattp) {
		var content = '';
		var quanhuyen = _.filter(dsquanhuyen, {'MATTP':mattp});
		_.forEach(quanhuyen, function(qh, key) {
			content += '<option value="'+qh.MAQH+'">'+qh.TEN+'</option>';
		});

		$("#add-quan-huyen").html(content);
	}

	function showPhuongxa(dsphuongxa, maqh) {
		var content = '';
		var phuongxa = _.filter(dsphuongxa, {'MAQH':maqh});
		_.forEach(phuongxa, function(px, key) {
			content += '<option value="'+px.MAPX+'">'+px.TEN+'</option>';
		});

		$("#add-phuong-xa").html(content);
	}

	function showDuong(dsduong, mapx) {
		var content = '';
		var duong = _.filter(dsduong, {'MAPX':mapx});
		content += '<option value="null">Chọn đường</option>';
		_.forEach(duong, function(d, key) {
			content += '<option value="'+d.MAD+'">'+d.TEN+'</option>';
		});

		$("#add-duong").html(content);
	}

	function getNhaTro(mant) {
		var nhatro;
		$.ajax({
			type: 'post',
			url: 'rooms/getNhaTro',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					nhatro = data;
				}
				else {
					nhatro = {};
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nhatro;
	}

	function getChiPhi(mant) {
		var chiphi;
		$.ajax({
			type: 'post',
			url: 'rooms/getChiPhi',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					chiphi = data;
				}
				else {
					chiphi = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return chiphi;
	}

	function getMotChiPhi(macp) {
		var chiphi;
		$.ajax({
			type: 'post',
			url: 'rooms/getMotChiPhi',
			dataType: 'json',
			async: false,
			data: {
				id: macp
			},
			success: function(data) {
				if(data != false) {
					chiphi = data.chiphi[0];
					console.log('chiphi',data);
				}
				else {
					chiphi = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return chiphi;
	}

	function getDsNhaTro(mand) {
		var nhatro;
		$.ajax({
			type: 'post',
			url: 'rooms/getDsNhaTro',
			dataType: 'json',
			async: false,
			data: {
				mand: mand
			},
			success: function(data) {
				if(data != false) {
					nhatro = data;
				}
				else {
					nhatro = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nhatro;
	}

	function getDsPhongTro(mant) {
		var phongtro;
		$.ajax({
			type: 'post',
			url: 'rooms/getDsPhongTro',
			dataType: 'json',
			async: false,
			data: {
				mant: mant
			},
			success: function(data) {
				if(data != false) {
					phongtro = data;
				}
				else {
					phongtro = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return phongtro;
	}

	function getNguoiTro(mapt) {
		var nguoio;
		$.ajax({
			type: 'post',
			url: 'rooms/getNguoiTro',
			dataType: 'json',
			async: false,
			data: {
				mapt: mapt
			},
			success: function(data) {
				console.log(data);
				if(data != false) {
					nguoio = data;
				}
				else {
					nguoio = [];
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return nguoio;
	}

	function getPhongTro(mapt) {
		var phongtro;
		$.ajax({
			type: 'post',
			url: 'rooms/getPhongTro',
			dataType: 'json',
			async: false,
			data: {
				mapt: mapt
			},
			success: function(data) {
				if(data != false) {
					phongtro = data;
				}
				else {
					phongtro = {};
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return phongtro;
	}

	function getTienTro() {
		var tientro;
		$.ajax({
			type: 'get',
			url: 'rooms/getTienTro',
			dataType: 'json',
			async: false,
			success: function(data) {
				if(data != false) {
					tientro = data;
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
		return tientro;
	}

	function showSelectNhaTro(dsnhatro) {
		var content = '';
		_.forEach(dsnhatro, function(nhatro, key) {
			content += '<option value="'+nhatro.MANT+'">'+(key+1)+' - '+nhatro.TENNT+'</option>';
		});
		$("#select-nhatro").html(content);
		if($("#select-nhatro").length) {
			$("#select-nhatro").select2();
		}
	}

	function showSelectNhaTroBangGia(dsnhatro) {
		var content = '';
		_.forEach(dsnhatro, function(nhatro, key) {
			content += '<option value="'+nhatro.MANT+'">'+(key+1)+' - '+nhatro.TENNT+'</option>';
		});
		$("#add-nhatro-chiphi").html(content);
		if($("#add-nhatro-chiphi").length) {
			$("#add-nhatro-chiphi").select2();
		}
	}

	function showSelectPhongTro(dsphongtro) {
		var content = '';
		_.forEach(dsphongtro, function(pt, key) {
			content += '<option value="'+pt.MAPT+'">'+(key+1)+' - '+pt.Ten+'</option>';
		});
		$("#select-phongtro").html(content);
		if($("#select-phongtro").length) {
			$("#select-phongtro").select2();
		}
	}

	function showPhongTro(mant, tientro) {
		var phongtro = getDsPhongTro(mant);
		var content = '', tt;

		_.forEach(phongtro, function(pt, key) {
			tt = _.find(tientro, {'MATT':pt.MATT});
			content += '<tr>';
			content += '<td>'+(key+1)+'</td>';
			content += '<td>'+pt.Ten+'</td>';
			if(!_.isUndefined(tt)) {
				content += '<td>'+toMoney(tt.GIA)+'</td>';
				if(tt.CACHTINH == 'daunguoi') content += '<td>Đầu người</td>';
				if(tt.CACHTINH == 'codinh') content += '<td>Cố định</td>';
			}
			else {
				content += '<td>0</td>';
				content += '<td>Chưa rõ</td>';
			}
			content += '<td>'+pt.SLNDO+'</td>';
			if(!_.isUndefined(tt)) {
			content += '<td><button class="btn btn-sm btn-outline-primary edit-phongtro" data="'+pt.MAPT+'-'+tt.MATT+'">Xem</button></td>';
			}
			else {
			content += '<td><button class="btn btn-sm btn-outline-primary edit-phongtro" data="'+pt.MAPT+'-null">Xem</button></td>';
			}

			content += '</tr>';
		});

		$("#danh-sach-phongtro").html(content);
	}

	function showNguoiTro(mapt) {
		var content = '', nguoitro, phongtro;
		phongtro = getPhongTro(mapt)[0];
		nguoitro = getNguoiTro(mapt);
		console.log(nguoitro);
		if(!_.isUndefined(nguoitro)) {
			if(nguoitro.length == phongtro.SLTD) {
				_.forEach(nguoitro, function(nguoi, key) {
					content += '<tr>';
					content += '<td><input type="text" value="'+nguoi.TEN+'" maxlength="30" class="form-control form-control-sm" id="dsnguoio-ten-'+nguoi.MANO+'"></td>';
					content += '<td><input value="'+nguoi.CMND+'" class="form-control form-control-sm dsnguoio-cmnd" id="dsnguoio-cmnd-'+nguoi.MANO+'"></td>';
					content += '<td><input value="'+nguoi.SDT+'" class="form-control form-control-sm dsnguoio-sdt" id="dsnguoio-sdt-'+nguoi.MANO+'"></td>';
					content += '<td><input type="text" value="'+nguoi.DIACHI+'" maxlength="100" class="form-control form-control-sm" id="dsnguoio-diachi-'+nguoi.MANO+'"></td>';
					content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+nguoi.MANO+'">';
					if(nguoi.GIOITINH == 'nam') {
						content += '<option selected value="nam">Nam</option>';
						content += '<option value="nu">Nữ</option>';
					}
					if(nguoi.GIOITINH == 'nu') {
						content += '<option value="nam">Nam</option>';
						content += '<option selected value="nu">Nữ</option>';
					}
					content += '</select></td>';
					content += '<td>';
					content += '<div class="btn-group">';
					content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
					content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển</button></td>';
					content += '</div>';
					content += '</tr>';
				});
			}
			else {
				if(nguoitro.length == 0) {
					for(var i = 0; i < phongtro.SLTD; i++) {
						content += '<tr>';
						content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
						content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
						content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
						content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
						content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+i+'">';
						content += '<option selected value="nam">Nam</option>';
						content += '<option value="nu">Nữ</option>';								
						content += '</select></td>';
						content += '<td>';
						content += '<div class="btn-group">';
						content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
						content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển</button></td>';
						content += '</tr>';
					}
				}
				else {
					if(nguoitro.length > 0 && phongtro.SLTD > nguoitro.length) {
						_.forEach(nguoitro, function(nguoi, key) {
							content += '<tr>';
							content += '<td><input type="text" value="'+nguoi.TEN+'" maxlength="30" class="form-control form-control-sm" id="dsnguoio-ten-'+nguoi.MANO+'"></td>';
							content += '<td><input value="'+nguoi.CMND+'" class="form-control form-control-sm dsnguoio-cmnd" id="dsnguoio-cmnd-'+nguoi.MANO+'"></td>';
							content += '<td><input value="'+nguoi.SDT+'" class="form-control form-control-sm dsnguoio-sdt" id="dsnguoio-sdt-'+nguoi.MANO+'"></td>';
							content += '<td><input type="text" value="'+nguoi.DIACHI+'" maxlength="100" class="form-control form-control-sm" id="dsnguoio-diachi-'+nguoi.MANO+'"></td>';
							content += '<td><select class="form-control" id="dsnguoio-gioitinh-'+nguoi.MANO+'">';
							if(nguoi.GIOITINH == 'nam') {
								content += '<option selected value="nam">Nam</option>';
								content += '<option value="nu">Nữ</option>';
							}
							if(nguoi.GIOITINH == 'nu') {
								content += '<option value="nam">Nam</option>';
								content += '<option selected value="nu">Nữ</option>';
							}
							content += '</select></td>';
							content += '<td>';
							content += '<div class="btn-group">';
							content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="'+nguoi.MANO+'">Lưu</button>';
							content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" data="'+nguoi.MANO+'">Chuyển</button></td>';
							content += '</div>';
							content += '</tr>';
						});
						for(var i = nguoitro.length; i < phongtro.SLTD; i++) {
							content += '<tr>';
							content += '<td><input type="text" maxlength="30" class="form-control form-control-sm" id="add-nguoitro-ten-'+i+'"></td>';
							content += '<td><input class="form-control form-control-sm dsnguoio-cmnd" id="add-nguoitro-cmnd-'+i+'"></td>';
							content += '<td><input class="form-control form-control-sm dsnguoio-sdt" id="add-nguoitro-sdt-'+i+'"></td>';
							content += '<td><input type="text" maxlength="100" class="form-control form-control-sm" id="add-nguoitro-diachi-'+i+'"></td>';
							content += '<td><select class="form-control" id="add-nguoitro-gioitinh-'+i+'">';
							content += '<option selected value="nam">Nam</option>';
							content += '<option value="nu">Nữ</option>';								
							content += '</select></td>';
							content += '<td>';
							content += '<div class="btn-group">';
							content += '<button class="btn btn-sm btn-outline-primary save-nguoio" data="null-'+i+'">Lưu</button>';
							content += '<button class="btn btn-sm btn-outline-warning cancel-nguoio" disabled>Chuyển</button></td>';
							content += '</tr>';
						}
					}
				}
			}
		}
		$("#danhsach-nguoitro").html(content);
		$(".dsnguoio-cmnd").inputmask('999999999');
		$(".dsnguoio-sdt").inputmask('9999999999');
	}

	function toMoney(string) {
		return (string/1000).toFixed(3).split('.').join(',');
	}

	function getKhuVuc() {
		var khuvuc;
		$.ajax({
			type: 'get',
			url: 'rooms/getKhuVuc',
			dataType: 'json',
			async: false,
			success: function(data) {
				khuvuc = data;
			},
			error: function(e) {
				console.log(e);
			}
		});
		return khuvuc;
	}

})(jQuery);