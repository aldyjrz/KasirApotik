                               <div class="form-group">
                                                            <input type = "hidden" autocomplete="off" value="<?= $record[0]->id_invoice ?>"  name="id_invoice" id="id_invoice2" placeholder="Tgl Pesanan">

                                                            <label>Tanggal Pesanan</label>
                                                            <input autocomplete="off" value="<?= $record[0]->tgl_pesanan ?>" required class="form-control tgl_pesanan" name="tgl_pesanan" id="tgl_pesanan2" placeholder="Tgl Pesanan">
                                                        </div>
                                                        
                                                            <div class="form-group">

                                                            <label>Nomor Faktur</label>
                                                            <input autocomplete="off" value="<?= $record[0]->no_faktur ?>"  required class="form-control" name="no_faktur" id="no_faktur2" placeholder="No. Faktur/Invoice">
                                                        </div>
                                                          <div class="form-group">
                                                            <label>Kode Pesanan </label>
                                                            <select required name="sp" id="sp2" class="form-control">
                                                                <option>Silahkan Pilih</option>
                                                                <?php foreach ($sp as $a) {
                                                                    $s = "";
                                                                    if($record[0]->kode_pesanan == $a->kode_pesanan){
                                                                        $s = "selected";
                                                                    }
                                                                    echo "<option $s value='$a->kode_pesanan'>$a->kode_pesanan | $a->pic_tertuju</option>";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                         <div class="form-group">
                                                            <label>PBF </label>
                                                            <select required name="pbf" id="pbf2" class="form-control">
                                                                <option>Silahkan Pilih</option>
                                                                <?php foreach ($pbf as $p) {
                                                                    $s = "";
                                                                    if($record[0]->id_pbf == $p->id_pbf){
                                                                        $s = "selected";
                                                                    }
                                                                    echo "<option $s value='$p->id_pbf'>$p->nama_pbf</option>";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal</label>
                                                            <input required autocomplete="off" value="<?= $record[0]->nominal ?>" class="form-control" name="nominal" id="harga22" placeholder="Nominal">
                                                        </div>
                                                        
                                                                                                               <div class="form-group">
                                                            <label>Jatuh Tempo</label>
                                                            <select required name="jatuh_tempo" id="jatuh_tempo2" class="form-control">
                                                                <option value="">Silahkan Pilih</option>
                                                                <option value="14">14 Hari</option>
                                                                <option value="21">21 Hari</option>
                                                                <option value="30">30 Hari</option>
                                                            </select>
                                                        </div>
                                <button id="updateInvoice"  name="submit" class="btn btn-primary btn-sm updateInvoice">Update</button> 
                                <SCRIPT>
                                 $(document).on('click', '.updateInvoice', function() {
                                var id_invoice = $('#id_invoice2').val();
                               var tgl_pesanan = $("#tgl_pesanan2").val();
                                var pbf = $("#pbf2").val();
                                                                var sp = $("#sp2").val();

                                var nominal = $("#harga22").val();
                                var no_faktur = $("#no_faktur2").val();
                                var jatuh_tempo = $("#jatuh_tempo2").val();
                                console.log('hal' + id_invoice + tgl_pesanan);
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>Invoice/edit",
                                    data: {
                                        id_invoice: id_invoice,
                                         tgl_pesanan: tgl_pesanan,
                                          sp: sp,

                                        nominal: nominal,
                                        no_faktur: no_faktur,

                                        jatuh_tempo: jatuh_tempo,
                                        pbf: pbf
                                    },
                                    success: function(response) {
                                        var json = $.parseJSON(response);
                                        console.log(json.success);
                                              
                                        if (json.success == 'TRUE') {
                                            $(document).Toasts('create', {
                                                class: 'bg-success',
                                                title: 'Update Sukses ',
                                                autohide: true,
                                                delay: 800,
                                                postition: 'topCenter',
                                                subtitle: 'Close',
                                                body: 'Update data berhasil. \n'  
                                            });
                                           // window.location.reload();
                                                                                 location.reload();

                                           $('#myModal').modal("hide");
                                        } else {
                                           
                                           $('#myModal').modal("hide"); // menampilkan dialog modal nya

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
                            });  </SCRIPT>
                            