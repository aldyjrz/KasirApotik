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
                                    <input class="form-control" name="nama_pbf" value="<?php echo $record['nama_pbf']?>">
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