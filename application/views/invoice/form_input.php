                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-header"> Tambah Data Obat 
                        </h4>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
						<?php echo validation_errors(); ?>

                            <div class="panel-body">
							
                                <?php echo form_open('Invoice/post_ajax'); ?>
                                <div class="form-group">

                                                            <label>Tanggal Pesanan</label>
                                                            <input autocomplete="off"  required class="form-control" name="tgl_pesanan" id="tgl_pesanan" placeholder="Tgl Pesanan">
                                                        </div>
                                                           
                                                         <div class="form-group">
                                                            <label>PBF </label>
                                                            <select required name="pbf" id="pbf" class="form-control">
                                                                <option value="">Silahkan Pilih</option>
                                                                <?php foreach ($pbf as $p) {
                                                                    echo "<option data-pbf ='$p->nama_pbf' value='$p->id_pbf'>$p->nama_pbf</option>";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        
                                                           <div class="form-group">
                                                            <label>NO SP </label>
                                                            <select   name="sp" id="sp" class="form-control select2">
                                                                <option>Silahkan Pilih</option>
                                                                <?php foreach ($sp as $a) {
                                                                    echo "<option data-pbf = '<?= $a->pic_tertuju ?>' value='$a->kode_pesanan'>$a->kode_pesanan - $a->pic_tertuju</option>";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                            <div class="form-group">

                                                            <label>Nomor Faktur</label>
                                                            <input autocomplete="off"  required class="form-control" name="no_faktur" id="no_faktur" placeholder="No. Faktur/Invoice">
                                                        </div>
                                                     
                                                        <div class="form-group">
                                                            <label>Nominal</label>
                                                            <input required autocomplete="off"  onkeypress="return isNumber(event)" class="form-control" name="nominal" id="harga2" placeholder="Nominal">
                                                        </div>
                                                        
                                                                                                  
                                                          <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <input required autocomplete="off"  class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="add-toi" class="btn btn-success ">Tambah</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                
                <script>
                  $(document).ready(function() {
                      
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
                      $("#sp").select2();
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
                            
                      $("#tgl_pesanan").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true

        });
                          $(document).on('click', '#add-toi', function() {
                                console.log("clicked")
                                var tgl_pesanan = $("#tgl_pesanan").val();
                                var pbf = $("#pbf").val();
                                var nominal = $("#harga2").val();
                                var no_faktur = $("#no_faktur").val();
                                var keterangan = $("#keterangan").val();

                                var jatuh_tempo = $("#jatuh_tempo").val();
                                console.log(nominal);
                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url() ?>Api/post_ajax",
                                    data: {
                                        tgl_pesanan: tgl_pesanan,
                                        nominal: nominal,
                                        keterangan:keterangan,
                                        no_faktur: no_faktur,

                                        jatuh_tempo: jatuh_tempo,
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
                                                location.reload();
                                        } else {
                                            location.reload();

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
                                    }
                                });
                            });
  });
                </script>
                <!-- /. ROW  -->