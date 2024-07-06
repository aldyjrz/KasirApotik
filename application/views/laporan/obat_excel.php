
<?php
 $dari = $_GET['dari'];
 $sampai =$_GET['sampai'];
 $tit = "Laporan_Pembelian_Obat-$dari-sd-$sampai";
    header("Content-type: application/vnd-excel");
 	header("Content-Disposition: attachment; filename=\"AI-".$tit.".xls\"");
 


 
?>
<table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                 <th>Total Jumlah Obat</th>
                                  <th>Total Harga</th>
                                <th>Satuan</th> 

                                <th>PBF</th> 
                                <th>Order Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php  
								$no = 1;
								$harga = 0;
								foreach($record as $a){ 
								?>
							 
								<tr>
									<td><?=$no++?></td>
									
									<td>   <?php echo $a->nama_barang ?> </td>
 									<td><?=$a->total_jumlah?></td>
 									 <td><?=$a->est_harga?></td>
									<td><?=$a->satuan?></td> 

									<td><?=$a->pbf?></td> 
								 	 <td><?=$a->created_date?></td> 

								</tr>
								<?php  }  ?>
                        </tbody>
                    </table>
<br>
<br> 