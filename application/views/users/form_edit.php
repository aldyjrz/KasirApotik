                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        MAILINGROOM <small>Edit Data Users</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/users/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['id']?>">

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username"  value="<?php echo $record['username']?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password"><font size="1" color="red"><i>* Password Kosongkan jika tidak diubah</i></font>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama_lengkap" value="<?php echo $record['nama_lengkap']?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value="<?php echo $record['email']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Level</code></label>
                                            <div class="form-check">
                                             <?php
                                                if($record['level']=="admin"){
                                                    ?>
                                                    <input class="form-check-input" type="radio" name="level" value="admin" checked><label class="form-check-label">Admin</label>
                                                    <br><input class="form-check-input" type="radio" name="level" value="user"><label class="form-check-label">User</label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                    <input class="form-check-input" type="radio" name="level" value="admin"><label class="form-check-label">Admin</label>
                                                    <br><input class="form-check-input" type="radio" name="level" value="user" checked><label class="form-check-label">User</label>
                                                <?php
                                                }  
                                                ?>
                                                </div> 
                                                </div>
                                                <div class="form-group">
                                    <label for="exampleSelectBorder">Blokir</code></label>
                                            <div class="form-check">
                                             <?php
                                                if($record['blokir']=="Y"){
                                                    ?>
                                                    <input class="form-check-input" type="radio" name="blokir" value="Y" checked><label class="form-check-label">Ya</label>
                                                    <br><input class="form-check-input" type="radio" name="blokir" value="N"><label class="form-check-label">Tidak</label>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                    <input class="form-check-input" type="radio" name="blokir" value="Y"><label class="form-check-label">Ya</label>
                                                    <br><input class="form-check-input" type="radio" name="blokir" value="N" checked><label class="form-check-label">Tidak</label>
                                                <?php
                                                }  
                                                ?>
                                                </div> 
                                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/users','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->