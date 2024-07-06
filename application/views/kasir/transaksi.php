  	<div class="panel panel-default" style="widht:100%">
 		<div class="panel-body">

 			<div class='row'>
 				<div class='col-md-12'>
 					<div class="panel panel-primary">
 						<div class="panel-heading"><i class='fa fa-file-text-o fa-fw'></i> Informasi Nota</div>
 						<div class="panel-body">

 							<div class="form-horizontal">
 								<div class="form-group">
 									<label class="col-sm-5 control-label">No. Nota</label>
 									<div class="col-sm-8">

 										<input type='text' name='nomor_nota' class='form-control input-sm' id='nomor_nota' value="<?php echo $no_transaksi ?>" readonly>
 									</div>
 								</div>
 								<div class="form-group">
 									<label class="col-sm-4 control-label">Tanggal</label>
 									<div class="col-sm-8">
 										<input type='text' name='tgl' class='form-control input-sm' id='tgl' value="<?php echo date('Y-m-d H:i:s') ?>" readonly>
 									</div>
 								</div>
 								<div class="form-group">
 									<label class="col-sm-4 control-label">Kasir</label>
 									<div class="col-sm-8">
 										<input type='text' name='kasir' class='form-control input-sm' id='kasir' value="<?php echo $this->session->userdata('username'); ?>" readonly>
 									</div>
 								</div>
 							</div>

 						</div>
 					</div>

 				</div>

 				<div class='col-md-12'>
 					<h5 class='judul-transaksi'>
 						<i class='fa fa-shopping-cart fa-fw'></i> Penjualan <i class='fa fa-angle-right fa-fw'></i> Transaksi
 						<a href="<?php echo site_url('transaksi/kasir'); ?>" class='pull-right'><i class='fa fa-refresh fa-fw'></i> Refresh Halaman</a>
 					</h5>
 					<table class='table table-bordered w-100' id='TabelTransaksi'  >
 						<thead>
 							<tr>
 								<th style='width:12px;'>#</th>
 								<th style='width:180px;'>Kode Menu</th>
 								<th style='width:180px;'>Nama Menu</th>
 								<th style='width:80px;'>Harga</th>
 								<th style='width:50px;'>Qty</th>
 								<th style='width:100px;'>Sub Total</th>
 								<th style='width:20px;'></th>
 							</tr>
 						</thead>
 						<tbody></tbody>
 					</table>

 					<div class='alert alert-info TotalBayar'>
 						<button id='BarisBaru' class='btn btn-default '><i class='fa fa-plus fa-fw'></i> Baris Baru (F7)</button>
 						<span class="float-right">Total : <span id='TotalBayar'>Rp. 0</span></span>
 						<input type="hidden" id='TotalBayarHidden'>
 					</div>

 					<div class='row'>
 						<div class='col-sm-7'>
 							<textarea name='catatan' id='catatan' class='form-control' rows='2' placeholder="Catatan Transaksi (Jika Ada)" style='resize: vertical; width:83%;'></textarea>

 							<br />
 							<p><i class='fa fa-keyboard-o fa-fw'></i> <b>Shortcut Keyboard : </b></p>
 							<div class='row'>
 								<div class='col-sm-6'>F7 = Tambah baris baru</div>
 								<div class='col-sm-6'>F9 = Cetak Struk</div>
 								<div class='col-sm-6'>F8 = Fokus ke field bayar</div>
 								<div class='col-sm-6'>F10 = Simpan Transaksi</div>
 							</div>
 						</div>
 						<div class='col-sm-5'>
 							<div class="form-horizontal">
 								<div class="form-group">
 									<label class="col-sm-6 control-label">Bayar (F8)</label>
 									<div class="col-sm-12">
 										<input type='text' name='cash' id='UangCash' class='form-control' onkeypress='return check_int(event)'>
 									</div>
 								</div>
 								<div class="form-group">
 									<label class="col-sm-6 control-label">Kembali</label>
 									<div class="col-sm-12">
 										<input type='text' id='UangKembali' class='form-control' disabled>
 									</div>
 								</div>
 								<div class='row'>
 									<div class='col-sm-6' style='padding-right: 0px;'>
 										<button type='button' class='btn btn-warning btn-block' id='CetakStruk'>
 											<i class='fa fa-print'></i> Cetak (F9)
 										</button>
 									</div>
 									<div class='col-sm-6'>
 										<button type='button' class='btn btn-primary btn-block' id='Simpann'>
 											<i class='fa fa-floppy-o'></i> Simpan (F10)
 										</button>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>

 					<br />
 				</div>
 			</div>

 		</div>
 	</div>
 </div>
 <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
 <div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
 				<h4 class="modal-title" id="ModalHeader"></h4>
 			</div>
 			<div class="modal-body" id="ModalContent"></div>
 			<div class="modal-footer" id="ModalFooter"></div>
 		</div>
 	</div>
 </div>

 <script>
 	$('#ModalGue').on('hide.bs.modal', function() {
 		setTimeout(function() {
 			$('#ModalHeader, #ModalContent, #ModalFooter').html('');
 		}, 500);
 	});
 </script>
 </body>

 </html>
 
 <!-- Bootstrap -->
 <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>


 <script type="text/javascript">
 	$(document).ready(function() {



 		for (B = 1; B <= 1; B++) {
 			BarisBaru();
 		}

 		$('#id_pelanggan').change(function() {
 			if ($(this).val() !== '') {
 				$.ajax({
 					url: "<?php echo site_url('penjualan/ajax-pelanggan'); ?>",
 					type: "POST",
 					cache: false,
 					data: "id_pelanggan=" + $(this).val(),
 					dataType: 'json',
 					success: function(json) {
 						$('#telp_pelanggan').html(json.telp);
 						$('#alamat_pelanggan').html(json.alamat);
 						$('#info_tambahan_pelanggan').html(json.info_tambahan);
 					}
 				});
 			} else {
 				$('#telp_pelanggan').html('<small><i>Tidak ada</i></small>');
 				$('#alamat_pelanggan').html('<small><i>Tidak ada</i></small>');
 				$('#info_tambahan_pelanggan').html('<small><i>Tidak ada</i></small>');
 			}
 		});

 		$('#BarisBaru').click(function() {
 			BarisBaru();
 		});

 		$("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();
 	});

 	function BarisBaru() {
 		var Nomor = $('#TabelTransaksi tbody tr').length + 1;
 		var Baris = "<tr>";
 		Baris += "<td>" + Nomor + "</td>";
 		Baris += "<td>";
 		Baris += "<input type='text' class='form-control' name='kode_menu[]' id='pencarian_kode' placeholder='Ketik Kode / Nama Menu'>";
 		Baris += "<div id='hasil_pencarian'></div>";
 		Baris += "</td>";
 		Baris += "<td></td>";
 		Baris += "<td>";
 		Baris += "<input type='hidden' name='harga_satuan[]'>";
 		Baris += "<span></span>";
 		Baris += "</td>";
 		Baris += "<td><input type='text' class='form-control' id='jumlah_beli' name='jumlah_beli[]' onkeypress='return check_int(event)' disabled></td>";
 		Baris += "<td>";
 		Baris += "<input type='hidden' name='sub_total[]'>";
 		Baris += "<span></span>";
 		Baris += "</td>";
 		Baris += "<td><button class='btn btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button></td>";
 		Baris += "</tr>";

 		$('#TabelTransaksi tbody').append(Baris);

 		$('#TabelTransaksi tbody tr').each(function() {
 			$(this).find('td:nth-child(2) input').focus();
 		});

 		HitungTotalBayar();
 	}

 	$(document).on('click', '#HapusBaris', function(e) {
 		e.preventDefault();
 		$(this).parent().parent().remove();

 		var Nomor = 1;
 		$('#TabelTransaksi tbody tr').each(function() {
 			$(this).find('td:nth-child(1)').html(Nomor);
 			Nomor++;
 		});

 		HitungTotalBayar();
 	});

 	function AutoCompleteGue(Lebar, KataKunci, Indexnya) {
 		$('div#hasil_pencarian').hide();
 		var Lebar = Lebar + 25;

 		var Registered = '';
 		$('#TabelTransaksi tbody tr').each(function() {
 			if (Indexnya !== $(this).index()) {
 				if ($(this).find('td:nth-child(2) input').val() !== '') {
 					Registered += $(this).find('td:nth-child(2) input').val() + ',';
 				}
 			}
 		});

 		if (Registered !== '') {
 			Registered = Registered.replace(/,\s*$/, "");
 		}

 		$.ajax({
 			url: "<?php echo site_url('transaksi/kasir/ajax_kode'); ?>",
 			type: "POST",
 			cache: false,
 			data: 'keyword=' + KataKunci,
 			dataType: 'json',
 			success: function(json) {
 				if (json.status == 1) {
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').css({
 						'width': Lebar + 'px'
 					});
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').html(json.datanya);
 				}
 				if (json.status == 0) {
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3)').html('');
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val('');
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) span').html('');
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').prop('disabled', true).val('');
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val(0);
 					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html('');
 				}
 			}
 		});

 		HitungTotalBayar();
 	}

 	$(document).on('keyup', '#pencarian_kode', function(e) {
 		if ($(this).val() !== '') {
 			var charCode = e.which || e.keyCode;
 			if (charCode == 40) {
 				if ($('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0) {
 					var Selanjutnya = $('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').next();
 					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

 					Selanjutnya.addClass('autocomplete_active');
 				} else {
 					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
 				}
 			} else if (charCode == 38) {
 				if ($('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0) {
 					var Sebelumnya = $('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').prev();
 					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

 					Sebelumnya.addClass('autocomplete_active');
 				} else {
 					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
 				}
 			} else if (charCode == 13) {
 				var Field = $('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)');
 				var Kodenya = Field.find('div#hasil_pencarian li.autocomplete_active span#kodenya').html();
 				var Barangnya = Field.find('div#hasil_pencarian li.autocomplete_active span#barangnya').html();
 				var Harganya = Field.find('div#hasil_pencarian li.autocomplete_active span#harganya').html();

 				Field.find('div#hasil_pencarian').hide();
 				Field.find('input').val(Kodenya);

 				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(3)').html(Barangnya);
 				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(4) input').val(Harganya);
 				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(4) span').html(Harganya);

 				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(5) input').removeAttr('disabled').val(1);
 				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(6) input').val(Harganya);
 				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(6) span').html(Harganya);

 				var IndexIni = $(this).parent().parent().index() + 1;
 				var TotalIndex = $('#TabelTransaksi tbody tr').length;
 				if (IndexIni == TotalIndex) {
 					BarisBaru();

 				} else {
 					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(5) input').focus();
 				}
 			} else {
 				AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());
 			}
 		} else {
 			$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
 		}

 		HitungTotalBayar();
 	});

 	$(document).on('click', '#daftar-autocomplete li', function() {
 		$(this).parent().parent().parent().find('input').val($(this).find('span#kodenya').html());

 		var Indexnya = $(this).parent().parent().parent().parent().index();
 		var NamaMenu = $(this).find('span#barangnya').html();
 		var Harganya = $(this).find('span#harganya').html();

 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3)').html(NamaMenu);
 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val(Harganya);
 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) span').html(to_rupiah(Harganya));

 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').removeAttr('disabled').val(1);
 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val(Harganya);
 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html(to_rupiah(Harganya));

 		var IndexIni = Indexnya + 1;
 		var TotalIndex = $('#TabelTransaksi tbody tr').length;
 		if (IndexIni == TotalIndex) {
 			BarisBaru();
 		} else {
 			$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').focus();
 		}

 		HitungTotalBayar();
 	});

 	$(document).on('keyup', '#jumlah_beli', function() {
 		var Indexnya = $(this).parent().parent().index();
 		var Harga = $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val();
 		var JumlahBeli = $(this).val();
 		var KodeMenu = $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2) input').val();

 		var SubTotal = parseInt(Harga) * parseInt(JumlahBeli);
 		if (SubTotal > 0) {
 			var SubTotalVal = SubTotal;
 			SubTotal = to_rupiah(SubTotal);
 		} else {
 			SubTotal = '';
 			var SubTotalVal = 0;
 		}

 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val(SubTotalVal);
 		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html(SubTotal);
 		HitungTotalBayar();

 	});

 	$(document).on('keydown', '#jumlah_beli', function(e) {
 		var charCode = e.which || e.keyCode;
 		if (charCode == 9) {
 			var Indexnya = $(this).parent().parent().index() + 1;
 			var TotalIndex = $('#TabelTransaksi tbody tr').length;
 			if (Indexnya == TotalIndex) {
 				BarisBaru();
 				return false;
 			}
 		}

 		HitungTotalBayar();
 	});

 	$(document).on('keyup', '#UangCash', function() {
 		HitungTotalKembalian();
 	});

 	function HitungTotalBayar() {
 		var Total = 0;
 		$('#TabelTransaksi tbody tr').each(function() {
 			if ($(this).find('td:nth-child(6) input').val() > 0) {
 				var SubTotal = $(this).find('td:nth-child(6) input').val();
 				Total = parseInt(Total) + parseInt(SubTotal);
 			}
 		});

 		$('#TotalBayar').html(to_rupiah(Total));
 		$('#TotalBayarHidden').val(Total);

 		$('#UangCash').val('');
 		$('#UangKembali').val('');
 	}

 	function HitungTotalKembalian() {
 		var Cash = $('#UangCash').val();
 		var TotalBayar = $('#TotalBayarHidden').val();

 		if (parseInt(Cash) >= parseInt(TotalBayar)) {
 			var Selisih = parseInt(Cash) - parseInt(TotalBayar);
 			$('#UangKembali').val(to_rupiah(Selisih));
 		} else {
 			$('#UangKembali').val('');
 		}
 	}

 	function to_rupiah(angka) {
 		var rev = parseInt(angka, 10).toString().split('').reverse().join('');
 		var rev2 = '';
 		for (var i = 0; i < rev.length; i++) {
 			rev2 += rev[i];
 			if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
 				rev2 += '.';
 			}
 		}
 		return 'Rp. ' + rev2.split('').reverse().join('');
 	}

 	function check_int(evt) {
 		var charCode = (evt.which) ? evt.which : event.keyCode;
 		return (charCode >= 48 && charCode <= 57 || charCode == 8);
 	}

 	$(document).on('keydown', 'body', function(e) {
 		var charCode = (e.which) ? e.which : event.keyCode;

 		if (charCode == 118) //F7
 		{
 			BarisBaru();
 			return false;
 		}

 		if (charCode == 119) //F8
 		{
 			$('#UangCash').focus();
 			return false;
 		}

 		if (charCode == 120) //F9
 		{
 			CetakStruk();
 
 			return false;
 		}

 		if (charCode == 121) //F10
 		{
 			$('.modal-dialog').removeClass('modal-lg');
 			$('.modal-dialog').addClass('modal-sm');
 			$('#ModalHeader').html('Konfirmasi');
 			$('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
 			$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
 			$('#ModalGue').modal('show');

 			setTimeout(function() {
 				$('button#SimpanTransaksi').focus();
 			}, 500);

 			return false;
 		}
 	});

 	$(document).on('click', '#Simpann', function() {
 		$('.modal-dialog').removeClass('modal-lg');
 		$('.modal-dialog').addClass('modal-sm');
 		$('#ModalHeader').html('Konfirmasi');
 		$('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
 		$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
 		$('#ModalGue').modal('show');

 		setTimeout(function() {
 			$('button#SimpanTransaksi').focus();
 		}, 500);
 	});

 	$(document).on('click', 'button#SimpanTransaksi', function() {
 		SimpanTransaksi();
 	});

 	$(document).on('click', 'button#CetakStruk', function() {
 		CetakStruk();

 	});

 	function SimpanTransaksi() {
 		var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
 		FormData += "&tanggal=" + encodeURI($('#tgl').val());
 		FormData += "&id_kasir=" + $('#kasir').val();
 		FormData += "&" + $('#TabelTransaksi tbody input').serialize();
 		FormData += "&cash=" + $('#UangCash').val();
 		FormData += "&catatan=" + encodeURI($('#catatan').val());
 		FormData += "&grand_total=" + $('#TotalBayarHidden').val();

 		$.ajax({
 			url: "<?php echo site_url('transaksi/kasir/post'); ?>",
 			type: "POST",
 			cache: false,
 			data: FormData,
 			dataType: 'json',
 			success: function(data) {
 				if (data.status == 1) {
 					alert(data.pesan);
 					window.location.href = "<?php echo site_url('transaksi/kasir'); ?>";
 				} else {
 					$('.modal-dialog').removeClass('modal-lg');
 					$('.modal-dialog').addClass('modal-sm');
 					$('#ModalHeader').html('Oops !');
 					$('#ModalContent').html(data.pesan);
 					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
 					$('#ModalGue').modal('show');
 				}
 			}
 		});
 	}

 	$(document).on('click', '#TambahPelanggan', function(e) {
 		e.preventDefault();

 		$('.modal-dialog').removeClass('modal-sm');
 		$('.modal-dialog').removeClass('modal-lg');
 		$('#ModalHeader').html('Tambah Pelanggan');
 		$('#ModalContent').load($(this).attr('href'));
 		$('#ModalGue').modal('show');
 	});

 	function CetakStruk() {
 		if ($('#TotalBayarHidden').val() > 0) {
 			if ($('#UangCash').val() !== '') {
				console.log($('#UangCash').val());
				console.log($('#TotalBayarHidden').val());
 				if ($('#UangKembali').val() >= 0) {
 					$('.modal-dialog').removeClass('modal-lg');
 					$('.modal-dialog').addClass('modal-sm');
 					$('#ModalHeader').html('Oops !');
 					$('#ModalContent').html('Uang Bayar Kurang\n Total Bayar : '+$('#TotalBayarHidden').val());
 					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
 					$('#ModalGue').modal('show');
 				} else {
					SimpanTransaksi();
 					var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
 					FormData += "&tanggal=" + encodeURI($('#tgl').val());
 					FormData += "&id_kasir=" + $('#kasir').val();
 					FormData += "&" + $('#TabelTransaksi tbody input').serialize();
 					FormData += "&cash=" + $('#UangCash').val();
 					FormData += "&catatan=" + encodeURI($('#catatan').val());
 					FormData += "&grand_total=" + $('#TotalBayarHidden').val();

 					window.open("<?php echo site_url('transaksi/kasir/transaksi_cetak/?'); ?>" + FormData, '_blank');
 				}
 			} else {
 				$('.modal-dialog').removeClass('modal-lg');
 				$('.modal-dialog').addClass('modal-sm');
 				$('#ModalHeader').html('Oops !');
 				$('#ModalContent').html('Harap masukan Total Bayar');
 				$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
 				$('#ModalGue').modal('show');
 			}
 		} else {
 			$('.modal-dialog').removeClass('modal-lg');
 			$('.modal-dialog').addClass('modal-sm');
 			$('#ModalHeader').html('Oops !');
 			$('#ModalContent').html('Harap pilih barang terlebih dahulu');
 			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
 			$('#ModalGue').modal('show');

 		}
 	}
 </script>