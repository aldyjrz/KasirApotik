                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MAILINGROOM <small>Tambah Data User</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/users/post'); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama_lengkap" placeholder="nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Level</code></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="level" value="admin"><label class="form-check-label">Admin</label>
                                                    <br><input class="form-check-input" type="radio" name="level" value="user" checked><label class="form-check-label">User</label>
                                                    
                                                </div> 
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('master/users','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->