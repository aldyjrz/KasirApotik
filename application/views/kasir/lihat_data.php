 

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Grand Total</th>

                                                <th>Bayar</th>
                                                <th>Keterangan</th> 
                                                <th>Kasir</th>
                                               
                                                <th>Aksi</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) {
                                            
                                            ?>
                                            
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><a   id="LihatDetailTransaksi" 
       data-href="gg "   class="btn btn-primary"  ><?php echo $r->nomor_nota ?></a></td>
                                                <td><?php echo $r->tanggal ?></td>

                                                <td><?php echo rupiah($r->grand_total) ?></td>
                                                <td><?php echo rupiah($r->bayar) ?></td>

                                                <td><?php echo $r->keterangan_lain ?></td>
                                                <td><?php echo $r->username ?></td>
                                                <td><a href=""><i class="fa fa-print"></i></a> | <a href=""><i class="fa fa-trash-o"></i></a></td>
                                               
 
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
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
                <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo base_url() ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
 

  <script>

      
$(document).on('click', '#LihatDetailTransaksi', function(e){
		e.preventDefault();
        console.log("initialze ");

		var CaptionHeader = 'Transaksi Nomor Nota ' + $(this).text();
		$('.modal-dialog').removeClass('modal-sm');
		$('.modal-dialog').addClass('modal-lg');
		$('#ModalHeader').html(CaptionHeader);
		$('#ModalContent').load($("#LihatDetailTransaksi").attr('data-href'));
		$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal'>Tutup</button>");
		$('#ModalGue').modal('show');
	});
  </script>
 		
		
		<script>
		$('#ModalGue').on('hide.bs.modal', function () {
		   setTimeout(function(){ 
		   		$('#ModalHeader, #ModalContent, #ModalFooter').html('');
		   }, 500);
		});
		</script>