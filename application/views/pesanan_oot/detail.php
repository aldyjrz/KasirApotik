                             <div class="form-group">
                                 <label>Nama Barang</label>
                                 <input type="hidden" name="id_pesanan" id="id_pesanan"
                                     value="<?= $record[0]->id_pesanan ?>">
                                 <input type="hidden" name="kode_pesanan" id="kode_pesanan"
                                     value="<?= $record[0]->kode_pesanan ?>">
                                 <input class="form-control" id="nama_barang" name="nama_barang"
                                     value="<?php echo $record[0]->nama_barang ?>">
                                 <div id='hasil_pencarian'></div>

                             </div>
                             <div class="form-group">
                                 <label>Jumlah Barang</label>

                                 <input class="form-control" id="jumlah" name="jumlah"
                                     value="<?php echo $record[0]->jumlah ?>">
                             </div>

                             <button id="updatePesanan" name="submit" class="btn btn-primary btn-sm">Update</button>
                             <script>
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
                $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val('');
                $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) span').html('');
                $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').val('');
                $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val(0);
                $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html('');
            }
        }
    });

}
                             </script>