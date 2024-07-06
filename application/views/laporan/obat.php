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

                <?php echo form_open('master/Pesanan/obat'); ?>
				<div class="form-row">
                <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Dari</span>
                    </div>
                    <input autocomplete='off' type="text" required id="dari" name="dari" value="<?php if(isset($_POST['dari'])){ echo $_POST['dari']; }?>" class="form-control" placeholder="Tanggal awal"  >
                </div>
				<div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Sampai</span>
                    </div>
                    <input autocomplete='off' id="sampai" required type="text"  value="<?php if(isset($_POST['sampai'])){ echo $_POST['sampai']; }?>" name="sampai" class="form-control" placeholder="Tanggal akhir" >
                </div>
                      </div>
                      	<div class="form-row">
                    	<div class="input-group col-md-6 mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text" >Nama Obat</span>
                    </div>
              
                    <input   type="text" id="obat-search"  value="<?php if(isset($_POST['obat'])){ echo $_POST['obat']; }?>" name="obat"
                                    class="form-control obat-search" placeholder="Inzana ">
                                
                                     <div id="obatList-add"></div>
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
                <a href="<?=base_url()?>master/report/report_obat/?dari=<?=$_POST['dari']?>&sampai=<?=$_POST['sampai']?>" class="btn btn-primary "><i class="fa fa-file"></i> Cetak Laporan Excel</a>
               <?php } ?>
                <hr>
                <div class="table-responsive">
                   
                    <table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                 <th>Total Jumlah Obat</th>
                                 <th>Harga Jual /satuan</th>

                                  <th>Diskon</th>

                                 <th>Est Total Harga Beli</th>
                                <th>Satuan</th> 

                                <th>PBF</th> 
                                <th>Order Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php 
                            if(!empty($record)){
								$no = 1;
								$harga = 0;
								foreach($record as $a){
								$nama = str_replace(' ', '+', $a->nama_barang);
								 $pbf = str_replace(' ', '+', $a->pbf);

								   $har = $a->harga;
            $dis = $a->diskon;
           
            $kat = $a->kategori;

           if ($kat  == "luar") {
                $harga = $har +  ($har * 0.31);
            } else {
                $harga = $har +  ($har * 0.36);
            }
            
            //cek harga diskon
            //hitung diskon
             if($dis != null){
                 $diskonan = $dis;
                 if($dis < 11){
                     $disc = 0;
                 }else{
                     $disc  = ($dis - 11)/2;
                 }
                $diskon = $harga * $disc / 100;
            }else{
                $diskon = 0;
                $diskonan =0;
                
            }
             $price = bulet(round($harga-$diskon));
								?>
							 
								<tr>
									<td><?=$no++?></td>
									
									<td><a class='btn btn-info' href="<?=base_url()?>master/Pesanan/detail_pesanan/?term=<?= $nama ?>&dari=<?=$_POST['dari']?>&sampai=<?=$_POST['sampai']?>&pbf=<?=$pbf?>" id='LihatDetailTransaksi'><i class='fa fa-file fa-fw'></i> <?php echo $a->nama_barang ?></a></a></td>
 									<td><?=$a->total_jumlah?></td>
 									 <td><?=  rupiah($price) ?></td> 
 									 <td><?= $diskonan ?></td>
 									  <td><?= rupiah($a->est_harga) ?></td>
									<td><?=$a->satuan?></td> 

									<td><?=$a->pbf?></td> 
								 	 <td><?=$a->created_date?></td> 

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
     <script type="text/javascript" language="javascript">
                    $(document).ready(function() {
 

                                $(document).on('click', '#LihatDetailTransaksi', function(e) {
                                    console.log("clicked");
                                    e.preventDefault();
                                    var CaptionHeader = 'Transaksi  ' + $(this).text();
                                    $('.modal-dialog').removeClass('modal-sm');
                                    $('.modal-dialog').addClass('modal-lg');
                                    $('#ModalHeader').html(CaptionHeader);
                                    $('#ModalContent').load($(this).attr('href'));
                                    $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal'>Tutup</button>");
                                    $('#ModalGue').modal('show');
                                });
                            });
             </script>
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
 
<script>
   $(function(){
          jQuery("#obat-search").autocomplete({
            source: '<?=base_url('master/Obat/cari')?>',
                minLength: 4,

            appendTo: "#obatList-add",
            select: function(event, ui) {
                    $('.obat-search').val(ui.item.label);
                console.log(ui.item.label);

                return false;
            },

        });
 
   });
</script>
 