                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            APT ILHAM > <small>Data Pesanan</small>
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                                    <span id='Notifikasi'  >
                                        <?php
                                         if($this->session->flashdata('msg') != null){
                                             echo $this->session->flashdata('msg');
                                         }
                                         
                                         ?>
                                    
                                    </span>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo anchor('master/Pesanan/add', 'Tambah Data', array('class' => 'btn btn-info btn')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table width="100%: class="table table-striped table-bordered table-hover" id="my-grid">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Surat Pesanan</th>
                                                 <th>Nama PBF</th>
                                                <th>Jumlah Obat</th>
                                                <th>Pemesan</th>
                                                <th>Created Date</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Modal -->

                                            <?php $no = 1;
                                            foreach ($sp as $r) { ?>
                                                <tr class="gradeU">
                                                    <td><?php echo $no ?></td>

                                                    <td style='width:16%;'><a class='btn btn-info' href='<?=base_url()?>master/Pesanan/detail_transaksi/?term=<?=$r->kode_pesanan ?>' id='LihatDetailTransaksi'><i class='fa fa-file fa-fw'></i> <?php echo $r->kode_pesanan ?></a></td>
                                                  
                                                    <td><?php echo $r->pic_tertuju ?></td>
                                                    <td><?php echo $r->jml ?></td>
                                                    <td><?php echo $r->pemesan ?></td>
                                                    <td><?php echo $r->created_date ?></td>
                                                    <td class="center">
                                                       <a id='konfirmasiPesanan' target='blank_' class='btn btn-info btn-sm' href='<?=base_url()?>/Belanja/konfirmasi/?term=<?=$r->kode_pesanan ?>' >Konfirmasi</a> 
                                                    </td>
                                                </tr>
                                                
                                                
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->



                <script type="text/javascript" language="javascript">
                    $(document).ready(function() {
                                var dataTable = $('#my-grid').DataTable({});


                                $(document).on('click', '#LihatDetailTransaksi', function(e) {
                                    console.log("clicked");
                                    e.preventDefault();
                                    var CaptionHeader = 'Transaksi Nomor Nota ' + $(this).text();
                                    $('.modal-dialog').removeClass('modal-sm');
                                    $('.modal-dialog').addClass('modal-lg');
                                    $('#ModalHeader').html(CaptionHeader);
                                    $('#ModalContent').load($(this).attr('href'));
                                    $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal'>Tutup</button>");
                                    $('#ModalGue').modal('show');
                                });
                                  $(document).on('click', '#konfirmasiPesanan', function(e) {
                                    console.log("clicked");
                                    e.preventDefault();
                                    var CaptionHeader = 'Transaksi Nomor Nota ' + $(this).text();
                                    $('.modal-dialog').removeClass('modal-sm');
                                    $('.modal-dialog').addClass('modal-lg');
                                    $('#ModalHeader').html(CaptionHeader);
                                    $('#ModalContent').load($(this).attr('href'));
                                    $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal'>Tutup</button>");
                                    $('#ModalGue').modal('show');
                                });
                            });
             </script>
             
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
$(document).ready(function(){
	var Tombol = "<button type='button' class='btn btn-primary' id='Cetaks'><i class='fa fa-print'></i> Cetak</button>";
	Tombol += "<button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>";
	$('#ModalFooter').html(Tombol);

	$('button#Cetaks').click(function(){
		var FormData = "nomor_nota="+encodeURI($('#nomor_nota').val());
		FormData += "&tanggal="+encodeURI($('#tanggal').val());
		FormData += "&id_kasir="+$('#id_kasir').val();
 		FormData += "&" + $('.tabel-transaksi tbody input').serialize();
		FormData += "&cash="+$('#UangCash').val();
		FormData += "&catatan="+encodeURI($('#catatan').val());
		FormData += "&grand_total="+$('#TotalBayarHidden').val();

		window.open("<?php echo site_url('transaksi/kasir/transaksi_cetak/?'); ?>" + FormData,'_blank');
	});
	
                           
                            });
});
</script>