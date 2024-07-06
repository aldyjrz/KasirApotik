                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-header"> Tambah Data Obat 
                        </h4>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
						<?php echo validation_errors(); ?>

                            <div class="panel-body">
							
                                <?php echo form_open('master/Obat/post'); ?>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input required class="form-control" name="nama_obat" placeholder="Nama Obat...">
                                </div>
                                <div class="form-group">
                                    <label>Harga Obat</label>
                                    <input required class="form-control" name="harga" placeholder="Harga ex; 50000">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select required name="kategori"  class="select form-control">
                                <option  >Silahkan Pilih</option>
                                       
                                          <option value='luar'>Luar = 30%</option> 
                                          <option value='dalam'>Dalam = 35%</option> 

                                        
                                    </select>                                       </div>
                                    <div class="form-group">
                                    <label>Satuan</label>
                                    <input required class="form-control" id ="satuanList" name="satuan" >
                                 

                                </div>   
                                <div id="satuanList-add"></div>
                                <div class="form-group">
                                    <label>PBF  </label>
                                    <select required name="pbf" class="form-control">
                                <option >Silahkan Pilih</option>
                                        <?php foreach ($pbf as $p) {
                                            echo "<option value='$p->nama_pbf'>$p->nama_pbf</option>";
                                        } ?>
                                    </select>        </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('master/Obat','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->