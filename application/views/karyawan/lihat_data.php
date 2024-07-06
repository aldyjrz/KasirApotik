                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           MAILINGROOM <small>Data Karyawan</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('master/karyawan/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIK</th>
                                                <th>Nama Karyawan</th>
                                                <th>Email Karyawan</th>
                                                <th>Nama Departemen</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nik ?></td>
                                                <td><?php echo $r->nama_karyawan ?></td>
                                                <td><?php echo $r->email_karyawan ?></td>
                                                <td><?php echo $r->nama_departemen ?></td>
                                                <?php 
                                                if($r->status==1){
                                                    echo "<td>Aktif</td>";
                                                 }
                                                 else{
                                                    echo "<td><font color='red'>Tidak Aktif</font></td>";
                                                 } ?>
                                                 </td>
                                                <td class="center">
                                                    <?php echo "<a href='karyawan/edit/$r->nik'><i class='fa fa-edit'></i></a> |
                                                    <a href='karyawan/delete/$r->nik' onClick=\"return confirm('Anda yakin akan menghapus data dari tabel ini?')\"><i class='fa fa-trash-o'></i></a>";?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->


