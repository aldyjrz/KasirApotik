                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            APT ILHAM > <small>Data Pesanan</small>
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo anchor('master/Pesanan_pre/add', 'Tambah Data', array('class' => 'btn btn-info btn')) ?>
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
                                            foreach ($record->result() as $r) { ?>
                                                <tr class="gradeU">
                                                    <td><?php echo $no ?></td>

                                                    <td style='width:16%;'><a class='btn btn-info' href='<?=base_url()?>master/Pesanan_pre/detail_transaksi/?term=<?=$r->kode_pesanan ?>' id='LihatDetailTransaksi'><i class='fa fa-file fa-fw'></i> <?php echo $r->kode_pesanan ?></a></td>
                                                  
                                                    <td><?php echo $r->pic_tertuju ?></td>
                                                    <td><?php echo $r->jml ?></td>
                                                    <td><?php echo $r->pemesan ?></td>
                                                    <td><?php echo $r->created_date ?></td>
                                                    <td class="center">
                                                        <?php echo "<a target='blank_' class='btn btn-info btn-sm' href='../print/cetak/sp_pre?term=$r->kode_pesanan'><i class='fa fa-print'></i></a> |
                                                    <a class='btn btn-danger btn-sm' href='Pesanan_pre/delete/?kode=$r->kode_pesanan' onClick=\"return confirm('Anda yakin akan menghapus data dari tabel ini?')\"><i class='fa fa-trash'></i></a>"; ?>
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

 
});
</script>