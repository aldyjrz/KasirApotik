
<?php
 
 $tit = "Laporan_Invoice";
     header("Content-type: application/vnd-excel");
  	header("Content-Disposition: attachment; filename=\"AI-".$tit.".xls\"");
 


 
?>
<table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                              <th>No.</th>
                                                    <th>Tanggal Pesanan</th>
                                                    <th>No Faktur</th>

                                                    <th>PBF</th>
                                                    <th>Nominal</th>

                                                    <th>Jatuh Tempo</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php  
								$no = 1;
								$harga = 0;
								foreach($record as $a){ 
								      $originalDate = $a->tgl_jatuhtempo;
                                                $newDate = date("d-m-Y", strtotime($originalDate));
                                                   
                                                    $pesan = $d->tgl_pesanan;
                                                $tgl_pesanan = date("d-m-Y", strtotime($pesan));
								?>
							 
								<tr>
									<td><?=$no++?></td>
									
									<td>   <?php echo $tgl_pesanan ?> </td>
 									<td><?=$a->no_faktur?></td>
 									 <td><?=$a->nama_pbf?></td>

									<td><?=$a->nominal?></td> 
								 	 <td><?=$newDate?></td> 

								</tr>
								<?php  }  ?>
                        </tbody>
                    </table>
<br>
<br> 