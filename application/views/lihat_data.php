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
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                 Daftar Harga Obat
                                </div>

                                <div class="panel-body">


                                    <span id='Notifikasi' style='display: none;'></span>
                                    <hr>
                                    <div>
                                      
                                        <table class="table table-striped table-bordered table-hover" id="my-grid">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Nama Obat</th>
                                                   
                                                    <th>Harga Jual</th>

                                                    <th>Satuan</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
 
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- /. PANEL  -->
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
                                
                                "columnDefs": [        { "orderable": true, "targets": [0,1,2] }
],
                                "sPaginationType": "simple_numbers",
                                "iDisplayLength": 10,
                                "aLengthMenu": [
                                    [10, 20, 50, 100, 150],
                                    [10, 20, 50, 100, 150]
                                ],
                                "ajax": {
                                    url: "<?php echo site_url('Harga/obat_json'); ?>",
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
                                var pbf = $("#pbf_update").val();
                                var satuana = $('#satuanList_update').val();
                                console.log('hal' + id + nama);
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>master/Obat/edit",
                                    data: {
                                        id: id,
                                        nama_obat: nama,
                                        harga: harga,
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