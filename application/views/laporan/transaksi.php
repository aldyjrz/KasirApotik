<div class="row">
    <div class="col-md-12">

        Apt. Ilham <small>Data Obat</small>

    </div>
</div>
<!-- /. ROW  -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Laporan Mutasi Pesanan
            </div>
            <div class="panel-body">

                <?php echo form_open('master/Pesanan/report'); ?>
				<div class="form-row">
                <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Dari</span>
                    </div>
                    <input  autocomplete="off" type="text" required id="darix" name="dari" value="<?php if(isset($_POST['dari'])){ echo $_POST['dari']; }?>" class="form-control" placeholder="Tanggal awal"  >
                </div>
				<div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Sampai</span>
                    </div>
                    <input autocomplete="off"  id="sampaix" required type="text"  value="<?php if(isset($_POST['sampai'])){ echo $_POST['sampai']; }?>" name="sampai" class="form-control" placeholder="Tanggal akhir" >
                </div>
				<div class="input-group col-md-3 mb-3">
                    
                    <input type="submit" class=" btn btn-primary" value="Submit"  >
                </div>
				</div>
                </form>
            </div>
        </div>

    </div>
    <!-- /. PANEL  -->
</div>
</div>
<!-- /. ROW  -->





<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Mutasi Pesanan 
            </div>

            <div class="panel-body">


                <span id='Notifikasi' style='display: none;'></span>
               <?php if(!empty($record)){
?>
                <a href="<?=base_url()?>master/report/?dari=<?=$_POST['dari']?>&sampai=<?=$_POST['sampai']?>" class="btn btn-primary "><i class="fa fa-file"></i> Cetak Laporan Excel</a>
               <?php } ?>
                <hr>
                <div class="table-responsive">
                   
                    <table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Pesanan</th>
                                <th>PBF</th>
                                <th>Estimasi Tagihan</th>

                                 <th>Tanggal</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php 
                            if(!empty($record)){
								$no = 1;
								$harga = 0;
								foreach($record as $a){?>
								<?php	
                                $h = $a->harga*$a->jumlah  ;
                                $harga = $harga + $h;
                                ?>
									
								<tr>
									<td><?=$no++?></td>
									<td><?=$a->kode_pesanan?></td>
									<td><?=$a->pic_tertuju?></td>
									<td><?=rupiah($a->est)?></td>
									<td><?=$a->tanggal_pesan?></td> 
									<td><a  class='btn btn-success' href="<?=base_url()?>master/report/one/?no=<?=$a->kode_pesanan?>"><i class='fa fa-print'></i></a></td>
								</tr>
								<?php }}  ?>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class='fa fa-times-circle'></i></button>
                <h4 class="modal-title" id="ModalHeader"></h4>
            </div>
            <div class="modal-body" id="ModalContent"></div>
            <div class="modal-footer" id="ModalFooter"></div>
        </div>
    </div>
</div>
 <script src="<?php echo base_url() ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script>
      $("#darix").datetimepicker({
            format: 'Y-m-d',
            autoclose: true ,
          pickDate: false,
          timepicker: false




        });
        $("#sampaix").datetimepicker({
            format: 'Y-m-d',
            autoclose: true,
              pickDate: false,
              timepicker: false





        });
</script>
 