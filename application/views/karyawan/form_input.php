                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MAILINGROOM <small>Tambah Data Karyawan</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/karyawan/post'); ?>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input class="form-control" name="nik" placeholder="nik karyawan">
                                </div>
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input class="form-control" name="nama_karyawan" placeholder="nama karyawan">
                                </div>
                                <div class="form-group">
                                    <label>Email Karyawan</label>
                                    <input class="form-control" name="email_karyawan" placeholder="email karyawan">
                                </div>
                                <div class="form-group">
                                    <label>Departemen</label>
                                    <select name="kd_departemen" class="form-control">
                                        <?php foreach ($departemen as $k) {
                                            echo "<option value='$k->kd_departemen'>$k->nama_departemen</option>";
                                        } ?>
                                    </select>
                                </div>

                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('master/karyawan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->