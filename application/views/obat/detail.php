                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="hidden" name="id" id="id_update" value="<?php echo $record[0]->id?>">

                                    <input  style="text-transform:uppercase" class="form-control" id="nama_obat_update" name="nama_obat" value="<?php echo $record[0]->nama_obat?>">
                                </div>
                                    <div class="form-group">
                                                            <label>Zat Prekursor?</label>
                                                            <input required class="form-control" name="pre" value="<?php echo $record[0]->zat_prekursor?>" id="pre_update" placeholder="Zat Aktif/Prekursor">
                                                        </div>
                                <div class="form-group">
                                    <label>Harga Obat</label>
                                    <input class="form-control" name="harga"  id="harga_update"  value="<?php echo $record[0]->harga?>">
                                    </div>  
                           </div>
                                <div class="form-group">
                                    <label>Diskon Harga</label>
                                    <input class="form-control" name="diskon"  id="diskon_update"  value="<?php echo $record[0]->diskon?>">
                                    </div>  
 
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select  id="kategori_update"  required name="kategori"  class="select form-control">
                                <option >Silahkan Pilih</option>
                                       <?php
									   if($record[0]->kategori == "luar"){
										   $s = "selected";
									   }else{
										   $s = "";
									   }
									   
									   if($record[0]->kategori == "dalam"){
										   $g = "selected";
									   }else{
										   $g = "";
									   }
									   ?>
                                          <option value='luar' <?=$s?>>Luar = 30%</option> 
                                          <option value='dalam' <?=$g?>>Dalam = 35%</option> 

                                        
                                    </select>                                           </div>   
                                    <div class="form-group">
                                    <label>PBF  </label>
                                    <select required  id="pbf_update"  name="pbf" class="form-control">
                                <option >Silahkan Pilih</option>
                                        <?php foreach ($pbf as $p) {
											
										if($record[0]->produksi == $p->nama_pbf){
												$s = "selected";
										}else{
											$s = "";
										}
                                            echo "<option $s value='$p->nama_pbf'>$p->nama_pbf</option>";
                                        } ?>
                                    </select>        </div>
                                
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input class="form-control" id ="satuanList_update" name="satuan" value="<?php echo $record[0]->satuan?>">
                                 

                                </div>   
                                <div id="satuanList-add"></div>
                                   <div class="form-group">
                                                            <label>Bentuk Sediaan</label>
                                                            <input required class="form-control" name="bentuk" value="<?php echo $record[0]->bentuk?>" id="bentuk_update" placeholder="Table/Sirup">
                                                        </div>
                                <button id="updateObat"  name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/Obat','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
 <script> 
 

</script>