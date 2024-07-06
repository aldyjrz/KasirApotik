                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Apt. Ilham <small>Data Pasar Besar Farmasi</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('master/Pbf/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama PBF</th>
                                               <th>Alamat PBF</th>
                                               <th>Telp</th>
                                               <th>Jatuh Tempo</th>

                                                <th>Created Date</th>
                                                <th>Created By</th>

                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_pbf ?></td>
                                                <td><?php echo $r->alamat ?></td>

                                                <td><?php echo $r->telp ?></td>
                                                <td><?php echo $r->jatuh_tempo ?> Hari</td>

                                                <td><?php echo $r->created_date ?></td>
                                                <td><?php echo $r->created_by ?></td>
 
                                                <td class="center">
                                                    <?php echo "<a class='btn btn-info' href='pbf/edit/$r->id_pbf'><i class='fa fa-edit'></i></a> |
                                                    <a class='btn btn-danger' href='pbf/delete/$r->id_pbf' onClick=\"return confirm('Anda yakin akan menghapus data dari tabel ini?')\"><i class='fa fa-trash'></i></a>";?>
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


