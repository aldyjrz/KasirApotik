                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-header">
                        APT <small>Edit Data OBAT</small>
                        </h4>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/Obat/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['id']?>">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input class="form-control" name="nama_obat" value="<?php echo $record['nama_obat']?>">
                                </div>
                                <div class="form-group">
                                    <label>Harga Obat</label>
                                    <input class="form-control" name="harga" value="<?php echo $record['harga']?>">
                                    </div>  
 
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select required name="kategori"  class="select form-control">
                                <option >Silahkan Pilih</option>
                                       <?php
									   if($record['kategori'] == "luar"){
										   $s = "selected";
									   }else{
										   $s = "";
									   }
									   
									   if($record['kategori'] == "dalam"){
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
                                    <select required name="pbf" class="form-control">
                                <option >Silahkan Pilih</option>
                                        <?php foreach ($pbf as $p) {
											
										if($record['produksi'] == $p->nama_pbf){
												$s = "selected";
										}else{
											$s = "";
										}
                                            echo "<option $s value='$p->nama_pbf'>$p->nama_pbf</option>";
                                        } ?>
                                    </select>        </div>
                                
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input class="form-control" id ="satuanList" name="satuan" value="<?php echo $record['satuan']?>">
                                 

                                </div>   
                                <div id="satuanList-add"></div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/Obat','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->