<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Apt. Ilham <br><small>Data Pesanan : <?= $aa[0]->kode_pesanan ?></small>
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a id='add-obat' data-toggle='modal' data-target='#modal-add' class='btn btn-primary btn-sm' href='#'><i
                        class='fa fa-plus'> </i> Tambah Data</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="modal fade" id="modal-add" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Obat</h4>
                                    <button type="button" class="close ml-auto float-right"
                                        data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="tertuju" id="tertuju"
                                            value="<?= $aa[0]->pic_tertuju ?>">
                                        <input type="hidden" class="form-control" name="kode_pesanan" id="kode_pesanan"
                                            value="<?= $aa[0]->kode_pesanan ?>">
                                        <label>Nama Barang</label>
                                        <input class="form-control nama_barang" id="nama_barang" name="nama_barang">
                                        <div class="cari_barang" id='hasil_pencarian'></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input required class="form-control" name="jumlah" id="jumlah" placeholder="2">
                                    </div>

                                    <div class="modal-footer">
                                        <button id="add-pesanan" class="btn btn-success ">Tambah</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Pesanan</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>

                                <th>Tertuju</th>
                                <th>Jumlah Pesanan</th>

                                <th>Created Date</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Modal -->

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
                            <?php $no = 1;
                            foreach ($aa as $r) {

                            ?>
                            <tr class="gradeU">
                                <td><?php echo $no ?></td>

                                <td style='width:16%;'><a class='btn btn-info'
                                        href='<?= base_url() ?>master/Pesanan/detail_transaksi/?term=<?= $r->kode_pesanan ?>'
                                        id='LihatDetailTransaksi'><i class='fa fa-file fa-fw'></i>
                                        <?php echo $r->kode_pesanan ?></a></td>
                                <td><?php echo $r->nama_barang ?></td>
                                <td><?php echo $r->harga ?></td>

                                <td><?php echo $r->pic_tertuju ?></td>
                                <td><?php echo $r->jumlah ?></td>


                                <td><?php echo $r->created_date ?></td>

                                <td class="d-flex">
                                    <?php echo "<a target='blank_' class='btn btn-info btn-sm' onclick='showDataObat($r->id_pesanan)' data-target='#myModal' href='#modal-body' data-toggle='modal' ><i class='fa fa-edit'></i></a> |
                                                    <a class='btn btn-danger btn-sm' href='" . base_url() . "master/Pesanan/delete_one/?id=$r->id_pesanan&kode=$r->kode_pesanan' onClick=\"return confirm('Anda yakin akan menghapus data dari tabel ini?')\"><i class='fa fa-trash'></i></a>"; ?>
                                </td>
                            </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class='fa fa-times-circle'></i></button>
                <h4 class="modal-title" id="ModalHeader"></h4>
            </div>
            <div class="modal-body" id="ModalContent"></div>
            <div class="modal-footer" id="ModalFooter"></div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $(document).on('keyup', '#nama_barang', function(e) {
        if ($(this).val() !== '') {

            AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());

        }
    });
    $(document).on('click', '#daftar-autocomplete li', function() {

        var NamaMenu = $(this).find('span#barangnya').html();


        $('#nama_barang').val(NamaMenu);
        $('#daftar-autocomplete').hide();


    });

    function AutoCompleteGue(Lebar, KataKunci, Indexnya) {
        $('div#hasil_pencarian').hide();
        var Lebar = Lebar + 25;

        var Registered = '';
        $('#TabelTransaksi tbody tr').each(function() {
            if (Indexnya !== $(this).index()) {
                if ($(this).find('td:nth-child(2) input').val() !== '') {
                    Registered += $(this).find('td:nth-child(2) input').val() + ',';
                }
            }
        });

        if (Registered !== '') {
            Registered = Registered.replace(/,\s*$/, "");
        }

        $.ajax({
            url: "<?php echo site_url('master/Pesanan/ajax_kode'); ?>",
            type: "POST",
            cache: false,
            data: 'keyword=' + KataKunci,
            dataType: 'json',
            success: function(json) {
                if (json.status == 1) {
                    $('#hasil_pencarian').css({
                        'width': Lebar + 'px'
                    });
                    $('#hasil_pencarian').show('fast');
                    $('#hasil_pencarian').html(json.datanya);
                }
                if (json.status == 0) {
                    $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3)').html('');
                    $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val(
                        '');
                    $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) span').html(
                        '');
                    $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').val(
                        '');
                    $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val(0);
                    $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html(
                        '');
                }
            }
        });

    }
    $(document).on('click', '#add-pesanan', function() {
        console.log("clicked")
        var nama_barang = $("#nama_barang").val();
        var jumlah = $("#jumlah").val();
        var tertuju = $("#tertuju").val();
        var kode_pesanan = $("#kode_pesanan").val();

        console.log(name);
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>master/Pesanan/post_ajax",
            data: {
                nama_barang: nama_barang,
                jumlah: jumlah,
                tertuju: tertuju,
                kode_pesanan: kode_pesanan

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
                    window.location.reload();

                } else {
                    alert(json.success);
                }


            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });


    $(document).on('click', '#updatePesanan', function() {
        var id = $('#id_pesanan').val();
        var nama = $('#nama_barang').val();
        var kode = $('#kode_pesanan').val();
        var jumlah = $('#jumlah').val();

        console.log('hal' + id + nama);
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>master/Pesanan/edit",
            data: {
                id_pesanan: id,
                nama_barang: nama,
                jumlah: jumlah,
                kode_pesanan: kode
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
                    window.location.reload();
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
                        body: 'Update data gagal. \n' + response
                            .responseText
                    })
                });
                console.log(response.responseText);
            }
        });
    });
    $(document).on('click', '#HapusPesanan', function(e) {
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

function showDataObat(id) {

    $.ajax({
        type: "POST",
        url: "<?= base_url() ?>master/Pesanan/detail",
        data: "id=" + id,
        dataType: "html",
        success: function(response) {
            console.log(id);
            $('#detail_body').html(response);
            $('#myModal').modal("show"); // menampilkan dialog modal nya
            console.log(response);

        }
    });
}
</script>



<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var dataTable = $('#my-grid').DataTable({});


    $(document).on('click', '#LihatDetailTransaksi', function(e) {
        console.log("clicked");
        e.preventDefault();
        var CaptionHeader = 'Transaksi Nomor Nota ' + $(this).text();
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-lg');
        $('#ModalHeader').html(CaptionHeader);
        $('#ModalContent').load($(this).attr('href'));
        $('#ModalFooter').html(
            "<button type='button' class='btn btn-primary' data-dismiss='modal'>Tutup</button>");
        $('#ModalGue').modal('show');
    });
});
</script>

<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class='fa fa-times-circle'></i></button>
                <h4 class="modal-title" id="ModalHeader"></h4>
            </div>
            <div class="modal-body" id="ModalContent"></div>
            <div class="modal-footer" id="ModalFooter"></div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var Tombol =
        "<button type='button' class='btn btn-primary' id='Cetaks'><i class='fa fa-print'></i> Cetak</button>";
    Tombol += "<button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>";
    $('#ModalFooter').html(Tombol);

    $('button#Cetaks').click(function() {
        var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
        FormData += "&tanggal=" + encodeURI($('#tanggal').val());
        FormData += "&id_kasir=" + $('#id_kasir').val();
        FormData += "&" + $('.tabel-transaksi tbody input').serialize();
        FormData += "&cash=" + $('#UangCash').val();
        FormData += "&catatan=" + encodeURI($('#catatan').val());
        FormData += "&grand_total=" + $('#TotalBayarHidden').val();

        window.open("<?php echo site_url('transaksi/kasir/transaksi_cetak/?'); ?>" + FormData,
            '_blank');
    });
});
</script>