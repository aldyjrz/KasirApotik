                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APT <small>Edit Data PBF</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/Pbf/edit'); ?>
                                <input type="hidden" name="id_pbf" value="<?php echo $record['id_pbf']?>">
                                <div class="form-group">
                                    <label>Nama Pedagang Besar Farmasi</label>
                                    <input  style="text-transform:uppercase" class="form-control" name="nama_pbf" value="<?php echo $record['nama_pbf']?>">
                                </div>
                                 <div class="form-group">
                                    <label>Alamat</label>
                                    <input  style="text-transform:uppercase" class="form-control" name="alamat" value="<?php echo $record['alamat']?>">
                                </div>
                                 <div class="form-group">
                                    <label>Telp</label>
                                    <input  style="text-transform:uppercase" class="form-control" name="telp" value="<?php echo $record['telp']?>">
                                </div>
                                   <div class="form-group">
                                    <label>Jatuh Tempo</label>
                                     <select required name="jatuh_tempo" id="jatuh_tempo" class="form-control">
                                                                <option value="">Silahkan Pilih</option>
                                                                
                                                                <option <?php if($record['jatuh_tempo'] == 14) {echo "selected";} ?> value="14">14 Hari</option>
                                                                <option <?php if($record['jatuh_tempo'] == 21) {echo "selected";} ?> value="21">21 Hari</option>
                                                                <option  <?php if($record['jatuh_tempo'] == 30) {echo "selected";} ?> value="30">30 Hari</option>
                                     </select>
                                </div>
                                 
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/Pbf','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->