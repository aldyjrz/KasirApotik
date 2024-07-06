                <?php
                $cek = $this->session->userdata('level');

                if ($cek == "admin") {
                ?>

                    <div class="row">
                        <div class="col-md-12">

                            Apt. Ilham <small>Data Obat</small>

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
                                    $cek = $this->session->userdata('level');

                                    if ($cek == "admin") {
                                        echo "<a id='add-obat'  data-toggle='modal' data-target='#modal-add' class='btn btn-primary btn-sm' href='#'><i class='fa fa-plus'>  </i> Tambah Data</a>";
                                    } ?>
                                </div>

                                <div class="panel-body">


                                    <span id='Notifikasi' style='display: none;'></span>
                                    <hr>
                                    <div class="table-responsive">
                                        <div class="modal fade" id="modal-add" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Data Obat</h4>
                                                        <button type="button" class="close ml-auto float-right" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">

                                                            <label>Nama Obat</label>
                                                            <input   style="text-transform:uppercase" class="form-control" name="nama_obat" id="nama_obat" placeholder="Nama Obat...">
                                                        </div>
                                                          <div class="form-group">
                                                            <label>Zat Prekursor?</label>
                                                            <input  class="form-control" name="pre" id="pre" placeholder="Zat Aktif/Prekursor">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga Obat</label>
                                                            <input  class="form-control" name="harga" id="harga2" placeholder="Harga ex; 50000">
                                                        </div>
                                                          <div class="form-group">
                                                            <label>Diskon</label>
                                                            <input  class="form-control" name="diskon" id="diskon" placeholder="diskon ex; 25">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select  name="kategori" id="kategori" class="select form-control">
                                                                <option>Silahkan Pilih</option>

                                                                <option value='luar'>Luar = 30%</option>
                                                                <option value='dalam'>Dalam = 35%</option>


                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Satuan</label>
                                                            <input  class="form-control" id="satuanList" name="satuan">

                                                        <div id="satuanList-add"></div>

                                                        </div>
                                                          <div class="form-group">
                                                            <label>Bentuk Sediaan</label>
                                                            <input  class="form-control" name="bentuk" id="bentuk" placeholder="Table/Sirup">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>PBF </label><br>
                                                            <select  style="width:100%" name="pbf" id="pbf" class="form-control">
                                                                <option class="form-control">Silahkan Pilih</option>
                                                                <?php foreach ($pbf as $p) {
                                                                    echo "<option value='$p->nama_pbf'>$p->nama_pbf</option>";
                                                                } ?>
                                                            </select>
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
                                                    <!--<th class="hidden">No.</th>-->
                                                    <th>Nama Obat</th>
                                                    <th>Harga</th>
                                                    <th>Diskon</th>
                                                    <th>PBF</th>

                                                    <th>Harga Jual</th>

                                                    <th>Satuan</th>
                                                    <th>Last Edited</th>
                                                    <?php
                                                    $cek = $this->session->userdata('level');

                                                    if ($cek == "admin") { ?>
                                                        <th>Aksi</th> <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <div class='modal fade' id='myModal' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        <!-- Modal content-->
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                                <h4 class='modal-title'>Update Data Obat</h4>
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
                                url: "obat/detail/",
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

                            var table = $('#my-grid').DataTable({
                                "serverSide": true,
                                "stateSave": false,
                                "bAutoWidth": true,
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
                                    "data" : 1,
                                    "targets": 'no-sort',
                                    "orderable": true,
                                }],
                                 "columns": [ 
                                    { "data": 1 },
                                    { "data": 2 },
                                    { "data": 3 },
                                    { "data": 4 },
                                    { "data": 5 },
                                    { "data": 6 },
                                    { "data": 7 },
                                    { "data": 8 },
                                    
                                  ],
                                "sPaginationType": "simple_numbers",
                                "iDisplayLength": 10,
                                "aLengthMenu": [
                                    [10, 20, 50, 100, 150],
                                    [10, 20, 50, 100, 150]
                                ],
                                "ajax": {
                                    url: "<?php echo site_url('master/Obat/obat_json'); ?>",
                                    type: "post",
                                    error: function() {
                                        $(".my-grid-error").html("");
                                        $("#my-grid").append(
                                            '<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
                                        );
                                        $("#my-grid_processing").css("display", "none");
                                    }
                                }
                            });

                            $(document).on('click', '#add-toi', function() {
                                console.log("clicked")
                                var name = $("#nama_obat").val();
                                var harga = $("#harga2").val();
                                var pre = $("#pre").val();
                                var bentuk = $("#bentuk").val();
                                var diskon = $("#diskon").val();

                                var satuan = $("#satuanList").val();
                                var kategori = $("#kategori").val();
                                var pbf = $("#pbf").val();
                                console.log(name);
                                
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>master/Obat/post_ajax",
                                    data: {
                                        nama_obat: name,
                                        harga: harga,
                                        diskon: diskon,
                                        bentuk: bentuk,
                                        satuan: satuan,
                                        kategori: kategori,
                                        pbf: pbf

                                    },
                                    success: function(response) {

                                        $(document).Toasts('create', {
                                            class: 'bg-success',
                                            title: 'Tambah data Sukses ',
                                            autohide: true,
                                            delay: 800,
                                            postition: 'topCenter',
                                            subtitle: 'Close',
                                            body: 'Berhasil Tambah \n' + name
                                        });
                                        var json = $.parseJSON(response);
                                        console.log(json.success);
                                        if (json.success) {
                                            $('#modal-add').modal("hide"); // menampilkan dialog modal nya
                                            table.ajax.reload();
                                        } else {
                                            alert(json.success);
                                        }


                                    },
                                    error: function(response) {
                                        console.log(response.responseText);
                                    }
                                });
                            });


                            $(document).on('click', '#updateObat', function() {
                                var id = $('#id_update').val();
                                var nama = $('#nama_obat_update').val();
                                var harga = $('#harga_update').val();
                                var kategori = $("#kategori_update").val();
                               var pre = $("#pre_update").val();
                               var bentuk = $("#bentuk_update").val();
                                var diskon =  $("#diskon_update").val();
                                var pbf = $("#pbf_update").val();
                                var satuana = $('#satuanList_update').val();
                                console.log('pre' + pre);
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>master/Obat/edit",
                                    data: {
                                        id: id,
                                        nama_obat: nama,
                                        harga: harga,
                                        diskon : diskon,
                                        bentuk: bentuk,
                                        pre: pre,
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
                                            table.ajax.reload();
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
                                $('#ModalContent').html('Apakah anda yakin ingin menghapus obat  <b>' + $(this).parent()
                                    .parent().find('td:nth-child(2)').text() + '</b> ?' + Check);
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
                                        $('#my-grid').DataTable().ajax.reload();
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