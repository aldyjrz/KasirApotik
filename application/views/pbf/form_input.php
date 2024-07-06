                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header"> Tambah Data PBF</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/Pbf/post'); ?>
                                <div class="form-group">
                                    <label>Nama PBF</label>
                                    <input  style="text-transform:uppercase" required class="form-control" name="nama_pbf" placeholder="Nama pbf...">
                                </div>
                              <div class="form-group">
                                    <label>Alamat PBF</label>
                                    <input  style="text-transform:uppercase" required class="form-control" name="alamat" placeholder="Alamat Lengkap Perusahaan">
                                </div>
                              <div class="form-group">
                                    <label>Telp PBF</label>
                                    <input  style="text-transform:uppercase" required class="form-control" name="telp" placeholder="No Telfon">
                                </div>
                                  <div class="form-group">
                                    <label>Jatuh Tempo</label>
                                     <select required name="jatuh_tempo" id="jatuh_tempo" class="form-control">
                                                                <option value="">Silahkan Pilih</option>
                                                                <option value="14">14 Hari</option>
                                                                <option value="21">21 Hari</option>
                                                                <option value="30">30 Hari</option>
                                                            </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('master/Pbf','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->