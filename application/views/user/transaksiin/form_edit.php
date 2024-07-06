                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        MAILINGROOM <small>Edit Data Departemen</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi/transaksiin/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['transaksiin_id'];?>">
                                <div class="form-group">
                                    <label>Mail ID</label>
                                    <input class="form-control" name="mail_id" value="<?php echo $record['mail_id'];?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Date Mail</label>
                                    <div class='input-group date' id='datetimepicker9'>
                                        <input type='text' name="date_mail" id="reservationdate" value="<?php echo $record['date_mail'];?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                        <span class="input-group-addon" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                        </span>
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label>Nama PIC</label>
                                    <select name="kd_pic" class="form-control">
                                        <?php foreach ($pic as $p) {
                                            echo "<option value='$p->kd_pic'";
                                            echo $record['kd_pic']==$p->kd_pic?'selected':'';
                                            echo">$p->nama_pic</option>";
                                        } ?>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                <label for="exampleSelectBorder">Logistik</code></label>
                                <select name="kd_logistik" class="form-control">
                                        <?php foreach ($logistik as $log) {
                                           echo "<option value='$log->kd_logistik'";
                                           echo $record['kd_logistik']==$log->kd_logistik?'selected':'';
                                           echo">$log->nama_logistik</option>";
                                       } ?>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Airway Bill</label>
                                    <input type="text" name='airwaybill' class="form-control" id="exampleInputEmail1" value="<?php echo $record['airwaybill'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shipper Name</label>
                                    <input type="text" name='shipperName' class="form-control" id="exampleInputEmail1" value="<?php echo $record['shipperName'];?>">
                                </div>

                                <div class="form-group">
                                <label for="exampleSelectBorder">Nama Kota/City</code></label>
                                <select name="kd_kota" class="form-control">
                                        <?php foreach ($kota as $kt) {
                                            echo "<option value='$kt->kd_kota'";
                                            echo $record['kd_kota']==$kt->kd_kota?'selected':'';
                                            echo">$kt->nama_kota</option>";
                                        } ?>
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                <label for="exampleSelectBorder">Recipient Name</code></label>
                                <select name="nik" class="form-control">
                                <?php foreach ($karyawan as $kar) {
                                             echo "<option value='$kar->nik'";
                                             echo $record['nik']==$kar->nik?'selected':'';
                                             echo">$kar->nama_karyawan</option>";
                                         } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Aditional Info</label>
                                    <input type="text" name='additional_Info' class="form-control" id="exampleInputEmail1" value="<?php echo $record['additional_Info'];?>">
                                </div>

                               
                                <div class="form-group">
                                <label for="exampleSelectBorder">Level Dokumen</code></label>
                                <select name="kd_leveldoc" class="form-control">
                                <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($leveldoc as $ld) {
                                             echo "<option value='$ld->kd_leveldoc'";
                                             echo $record['kd_leveldoc']==$ld->kd_leveldoc?'selected':'';
                                             echo">$ld->nama_leveldoc</option>";
                                         } ?>
                                    </select>
                                
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('master/departemen','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->