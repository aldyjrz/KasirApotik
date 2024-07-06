                <?php
                $cek = $this->session->userdata('level');

                if ($cek == "admin") {
                ?>

                    <div class="row">
                        <div class="col-md-12">

                            Apt. Ilham <small>Invoice</small>

                        </div>
                    </div>
                <?php } ?>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php

                                    echo "<a id='add-obat'  data-toggle='modal' data-target='#modal-add' class='btn btn-primary btn-sm' href='#'><i class='fa fa-plus'>  </i>Add Invoice</a>";
                                    ?>
                                </div>

                                <div class="panel-body">
                                    <!--//    <a class="btn btn-info">Download Excel</a>-->

                                    <?php echo form_open('Invoice'); ?>
                                    <div class="form-row">
                                        <div class="input-group col-md-3 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Dari</span>
                                            </div>
                                            <input autocomplete='off' type="text" required id="dari" name="dari" value="<?php if (isset($_POST['dari'])) {
                                                                                                                            echo $_POST['dari'];
                                                                                                                        } ?>" class="form-control" placeholder="Tanggal awal">
                                        </div>
                                        <div class="input-group col-md-3 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Sampai</span>
                                            </div>
                                            <input autocomplete='off' id="sampai" required type="text" value="<?php if (isset($_POST['sampai'])) {
                                                                                                                    echo $_POST['sampai'];
                                                                                                                } ?>" name="sampai" class="form-control" placeholder="Tanggal akhir">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="input-group col-md-6 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">PBF</span>
                                            </div>

                                            <input type="text" id="pbf-search" value="<?php if (isset($_POST['pbf'])) {
                                                                                            echo $_POST['pbf'];
                                                                                        } ?>" name="pbf" class="form-control pbf-search" placeholder="Kimia Farma ">

                                            <div id="pbfList-add"></div>
                                        </div>
                                        <div class="input-group col-md-3 mb-3">

                                            <input type="submit" class=" btn btn-primary" value="Submit">
                                        </div>
                                    </div>
                                    </form>

                                    <span id='Notifikasi' style='display: none;'></span>
                                    <hr>
                                    <div class="table-responsive">
                                        <div class="modal fade" id="modal-add" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Invoice</h4>
                                                        <button type="button" class="close ml-auto float-right" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">

                                                            <label>Tanggal Pesanan</label>
                                                            <input required autocomplete="off" required class="form-control" name="tgl_pesanan" id="tgl_pesanan" placeholder="Tgl Pesanan">
                                                        </div>
<div class="form-group"> 
                                                            <label>PBF</label><br>
                                                          
                                                            <select required name="pbf" id="pbf" class="form-control select2">
                                                                <option value="">Silahkan Pilih</option>
                                                                <?php foreach ($pbf as $p) {
                                                                    echo "<option value='$p->id_pbf'>$p->nama_pbf</option>";
                                                                } ?>
                                                            </select>
                                                             
                                                        </div>
                                                         <div class="form-group">
                                                            <label>No SP</label><br>
                                                          
                                                            <select   name="sp" id="sp" class="form-control select2">
                                                                <option value="">Silahkan Pilih</option>
                                                                <?php foreach ($sp as $a) {
                                                                    echo "<option value='$a->kode_pesanan'>$a->kode_pesanan - $a->pic_tertuju</option>";
                                                                } ?>
                                                            </select>
                                                             
                                                        </div>
                                                        <div class="form-group">

                                                            <label>Nomor Faktur</label>
                                                            <input required autocomplete="off" required class="form-control" name="no_faktur" id="no_faktur" placeholder="No. Faktur/Invoice">
                                                        </div>
   
                                                      
                                                        <div class="form-group">
                                                            <label>Nominal</label>
                                                            <input required autocomplete="off" class="form-control" name="nominal" id="harga2" placeholder="Nominal">
                                                        </div>

                                                      
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <input required autocomplete="off" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="add-toi" class="btn btn-success ">Tambah</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="my-grid">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal Pesanan</th>
                                                    <th>No Faktur</th>
                                                    <th>Kode Pesanan</th>

                                                    <th>PBF</th>
                                                    <th>Nominal</th>

                                                    <th>Jatuh Tempo</th>
                                                    <th>Keterangan</th>

                                                    <?php if ($cek == "admin") { ?>
                                                        <th>Aksi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $no = 1;
                                                foreach ($record as $d) {
                                                    $id = $d->id_invoice;
                                                    $originalDate = $d->tgl_pesanan; 
                                                    $interval = $d->jatuh_tempo;
                                                   // echo $interval;
                                                    $newDate = date('Y-m-d', strtotime($originalDate. ' + '.$interval.' days'));
                
                                                   // $newDate = date("d-m-Y", strtotime($originalDate));
        
                                                    $pesan = $d->tgl_pesanan;
                                                    $tgl_pesanan = date("d-m-Y", strtotime($pesan));
                                                ?>

                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $tgl_pesanan ?></td>
                                                        <td><?= $d->no_faktur ?></td>
                                                                                                                <td><?= $d->kode_pesanan ?></td>

                                                        <td><?= $d->nama_pbf ?></td>
                                                        <td><?= $d->nominal ?></td>
                                                        <td><?= $newDate ?></td>
                                                          <td><?= $d->keterangan ?></td>

                                                        <td><a class='btn btn-success  edit btn-sm' onclick='showDataObat(<?= $id ?>)' data-target='#myModal' href='#modal-body' data-toggle='modal'><i class='fa fa-edit'></i></a> | <a class='btn btn-danger btn-sm' href='<?= site_url('/Invoice/delete/' .  $id) ?>' id='HapusTransaksi'><i class='fa fa-trash'></i></a></td>
                                                    </tr>
                                                <? } ?>
                                                <div class='modal fade' id='myModal' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        <!-- Modal content-->
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                                <h4 class='modal-title'>Update Data Invoice</h4>
                                                            </div>
                                                            <div class='modal-body' id="detail_body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- /. PANEL  -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
                                    <h4 class="modal-title" id="ModalHeader"></h4>
                                </div>
                                <div class="modal-body" id="ModalContent"></div>
                                <div class="modal-footer" id="ModalFooter"></div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function showDataObat(id) {
                            console.log(id);
                            $.ajax({
                                type: "POST",
                                url: "Invoice/detail/",
                                data: "id=" + id,
                                dataType: "html",
                                success: function(response) {
                                    $('#detail_body').html(response);
                                    $('#myModal').modal("show"); // menampilkan dialog modal nya
                                    console.log(response);

                                }
                            });
                        }
                        
                        $(document).ready(function() {
                            

                            $("#pbf-search").autocomplete({
                                source: '<?= base_url('master/Pbf/cari') ?>',
                                minLength: 4,

                                appendTo: "#pbfList-add",
                                select: function(event, ui) {
                                    $('.pbf-search').val(ui.item.label);
                                    console.log(ui.item.label);

                                    return false;
                                },

                            });
 
                            $('#myModal').on('shown.bs.modal', function(e) {
                               

                                $(".tgl_pesanan").datetimepicker({
                                    format: 'Y-m-d',
                                    autoclose: true,
                                    autoClose: true,

                                    pickDate: false,
                                    timepicker: false
                                });
                            });
                            $("#tgl_pesanan").datetimepicker({
                                format: 'Y-m-d',
                                autoclose: true,
                                autoClose: true,

                                pickDate: false,
                                timepicker: false
                            });
                            $('#sp').select2();
                            
                             $("#pbf").select2();

                       
                        $("#pbf").on("change", function() {
  
                                var date=$('#tgl_pesanan').val();
                                var pbf = $('#pbf').text();
                                var data = $("#pbf option:selected").text();

                                console.log(date+ " - "+data)
                              $.ajax({
                                    url : "<?php echo base_url('/Invoice/get_nosp');?>",
                                    method : "POST",
                                    data : {date: date, pbf: data},
                                    async : true,
                                    dataType : 'json',
                                    success: function(data){ 
                                            var html = '';
                                            var i;
                                            if(data.length > 0){
                                            for(i=0; i<data.length; i++){
                                                html += '<option value='+data[i].kode_pesanan+'>'+data[i].kode_pesanan+'  '+data[i].pic_tertuju+'</option>';
                                            }
                                            }else{
                                                html += '<option>-DATA NOT FOUND-</option>';
                                            }
                                            $('#sp').html(html);
                 
                                    }
                                });

                            });
                            
                            
                            $("#tgl_pesanan").on("change", function() {
                                $('.xdsoft_datetimepicker').hide();
                                console.log("kemem");
                                var date=$(this).val();
                              $.ajax({
                                    url : "<?php echo base_url('/Invoice/get_pbf');?>",
                                    method : "POST",
                                    data : {date: date},
                                    async : true,
                                    dataType : 'json',
                                    success: function(data){ 
                                            var html = '';
                                            var i;
                                            if(data.length > 0){
                                            for(i=0; i<data.length; i++){
                                                html += '<option value='+data[i].id_pbf+'>'+data[i].pic_tertuju+'</option>';
                                            }
                                            }else{
                                                html += '<option>-DATA NOT FOUND-</option>';
                                            }
                                            $('#pbf').html(html);
                 
                                    }
                                });

                            });

                            var table = $('#my-grid').DataTable({
                                "dom": 'Blfrtip',

                                "stateSave": false,
                                "bAutoWidth": true,
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                                "oLanguage": {
                                    "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
                                    "sLengthMenu": "_MENU_ &nbsp;&nbsp;Data Per Halaman  ",
                                    "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                                    "sInfoFiltered": "(difilter dari _MAX_ total data)",
                                    "sZeroRecords": "Pencarian tidak ditemukan",
                                    "sEmptyTable": "Data kosong",
                                    "sLoadingRecords": "Harap Tunggu...",
                                    "oPaginate": {
                                        "sPrevious": "Prev",
                                        "sNext": "Next"
                                    }
                                },

                                "aaSorting": [
                                    [0, "desc"]
                                ],
                                "columnDefs": [{
                                    "targets": 'no-sort',
                                    "orderable": true,
                                }],
                                "sPaginationType": "simple_numbers",
                                "iDisplayLength": 10,
                                "aLengthMenu": [
                                    [10, 20, 50, 100, 150],
                                    [10, 20, 50, 100, 150]
                                ]
                            }).buttons().container().appendTo('#my-grid_wrapper .col-md-6:eq(0)');

                            $(document).on('click', '#add-toi', function() {
                                console.log("clicked")
                                var tgl_pesanan = $("#tgl_pesanan").val();
                                var pbf = $("#pbf").val();
                                var nominal = $("#harga2").val();
                                var keterangan = $("#keterangan").val();
                                var sp = $("#sp").val();

                                var no_faktur = $("#no_faktur").val();
                                 if (sp.length == 0 || tgl_pesanan.length == 0 || pbf.length == 0 || nominal.length == 0 || no_faktur.length == 0 ) {
                                    $(document).Toasts('create', {
                                        class: 'bg-warning',
                                        title: 'Form input harus ter-isi semua ',
                                        autohide: true,
                                        delay: 800,
                                        postition: 'topCenter',
                                        subtitle: 'Close',
                                        body: 'Error Form Input \n' + name
                                    });
                                    return;
                                }
                                console.log(nominal);
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>Api/post_ajax",
                                    data: {
                                        tgl_pesanan: tgl_pesanan,
                                        nominal: nominal,
                                        no_faktur: no_faktur,
                                        keterangan: keterangan,
                                        sp: sp,
                                         pbf: pbf

                                    },
                                    success: function(response) {

                                        var json = $.parseJSON(response);
                                        console.log(json.success);
                                        if (json.success) {
                                            
                                        $(document).Toasts('create', {
                                            class: 'bg-success',
                                            title: 'Tambah data Sukses ',
                                            autohide: true,
                                            delay: 800,
                                            postition: 'topCenter',
                                            subtitle: 'Close',
                                            body: 'Berhasil Tambah \n' + name
                                        });
                                            $('#modal-add').modal("hide"); // menampilkan dialog modal nya
                                            table.ajax.reload();
                                            location.reload();

                                        } else {
                                            $('#modal-add').modal("hide");
                                        }


                                    },
                                    error: function(response) {
                                        $(document).Toasts('create', {
                                            class: 'bg-danger',
                                            title: 'responseText',
                                            autohide: true,
                                            delay: 800,
                                            postition: 'topCenter',
                                            subtitle: 'Close',
                                            body: 'Gagal tambah Invoice \n' + name
                                        });
                                        console.log(response.responseText);
                                                                                    $('#modal-add').modal("hide"); // menampilkan dialog modal nya

                                    }
                                });
                            });


                            $(document).on('click', '#updateObat', function() {
                                var id = $('#id_update').val();
                                var nama = $('#nama_obat_update').val();
                                var harga = $('#harga_update').val();
                                var kategori = $("#kategori_update").val();
                                var pbf = $("#pbf_update").val();
                                  var sp = $("#sp_update").val();

                                var satuana = $('#satuanList_update').val();
                                console.log('hal' + id + nama);
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>Invoice/edit",
                                    data: {
                                        id: id,
                                        nama_obat: nama,
                                        harga: harga,
                                        sp: sp,
                                        satuan: satuana,
                                        kategori: kategori,
                                        pbf: pbf
                                    },
                                    success: function(response) {
                                        var json = $.parseJSON(response);
                                        console.log(json.success);
                                        if (json.success == true) {
                                            $(document).Toasts('create', {
                                                class: 'bg-success',
                                                title: 'Update Sukses ',
                                                autohide: true,
                                                delay: 800,
                                                postition: 'topCenter',
                                                subtitle: 'Close',
                                                body: 'Update data berhasil. \n' + nama
                                            })
                                            $('#myModal').modal("hide"); // menampilkan dialog modal nya
                                            location.reload();
                                        } else {
                                            alert(json.success);
                                        }


                                    },
                                    error: function(response) {
                                        $('.toastsDefaultWarning').click(function() {
                                            $(document).Toasts('create', {
                                                class: 'bg-danger',
                                                title: 'Update Gagal  ' + response.responseText,
                                                autohide: true,
                                                delay: 800,
                                                postition: 'topCenter',
                                                subtitle: 'Close',
                                                body: 'Update data gagal. \n' + response.responseText
                                            })
                                        });
                                        console.log(response.responseText);
                                    }
                                });
                            });
                            $(document).on('click', '#HapusTransaksi', function(e) {
                                e.preventDefault();

                                var Link = $(this).attr('href');
                                var Check = "<br /><hr style='margin:10px 0px 8px 0px;' /><div class='checkbox'><label> </div>";
                                $('.modal-dialog').removeClass('modal-lg');
                                $('.modal-dialog').addClass('modal-sm');
                                $('#ModalHeader').html('Konfirmasi');
                                $('#ModalContent').html('Apakah anda yakin ingin menghapus invoice  <b>' + $(this).parent()
                                    .parent().find('td:nth-child(3)').text() + '</b> ?' + Check);
                                $('#ModalFooter').html(
                                    "<button type='button' class='btn btn-primary' id='YesDelete' data-url='" + Link +
                                    "' autofocus>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>"
                                );
                                $('#ModalGue').modal('show');
                            });

                            $(document).on('click', '#YesDelete', function(e) {
                                e.preventDefault();
                                $('#ModalGue').modal('hide');



                                $.ajax({
                                    url: $(this).data('url'),
                                    type: "POST",
                                    cache: false,
                                    dataType: 'json',
                                    success: function(data) {
                                        location.reload();
                                        $(document).Toasts('create', {
                                            class: 'bg-success',
                                            title: 'Delete data Sukses ',
                                            autohide: true,
                                            delay: 800,
                                            postition: 'topCenter',
                                            subtitle: 'Close',
                                            body: 'Berhasil Hapus \n'
                                        })

                                    }
                                });
                            });
                        });
                    </script>