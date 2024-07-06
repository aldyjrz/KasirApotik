                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header"> Buat Pesanan </small>
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/Pesanan_oot/post'); ?>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">No Pesanan *Otomatis</label>
                                    <input required readonly type="text" class="form-control" name="no_pesanan"
                                        id="formGroupExampleInput" placeholder="IA-A-A" value="<?=$kode_pesanan?>">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Tanggal</label>
                                    <input required type="text" class="form-control" name="tanggal"
                                        id="formGroupExampleInput" value="<?=date('Y-m-d H:i:s')?>">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Kepada Tertuju</label>

                                    <select required name="kepada" class="form-control">
                                        <option value="0">Silahkan Pilih</option>
                                        <?php foreach ($pbf as $p) {
                                            echo "<option value='$p->nama_pbf'>$p->nama_pbf</option>";
                                        } ?>
                                    </select>

 
                                </div>

                                <input required type="hidden" class="form-control"
                                    value="<?= $this->session->userdata('nama_lengkap');?>" name="pemesan"
                                    placeholder="IQBAL Ganteng">

                       
                        <div class="form-group after-add-more">
                            <div class="form-row" data-id="1">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Nama Barang</label>
                                    <input required type="text" id="obat-add" name="obat[]"
                                    class="obat-add form-control" placeholder="Inzana ">
                                
                                     <div id="obatList-add"></div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">Jumlah</label>
                                    <input required type="text" name="jumlah[]" class="form-control">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputState">Estimasi Harga</label>
                                    <input required type="text" name="est_harga[]" id = "est_harga" class="est_harga form-control">

                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputState">Add More</label><br>
                                    <button class="btn btn-success add-more" type="button">
                                       + Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="copy  invisible"> 
                            <div class="form-row control-group">
                            <div class="form-group col-md-4">
                                    <label for="inputCity">Nama Barang</label>
                                    <input required  type="text" id="obat-add" name="obat[]"
                                        class="obat-add form-control" placeholder="Inzana ">
                                    <div id="obatList-add"></div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">Jumlah</label>
                                    <input required type="text" name="jumlah[]" class="form-control">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputState">Estimasi Harga</label>
                                    <input required type="text" id="est_harga" name="est_harga[]" class=" est_harga form-control">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputState">Delete  </label><br>
                                    <button class="btn btn-danger remove" type="button">
                                        -
                                    </button>
                                </div>

                            </div>
                                    </div>
  </div>
                        </div>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                        <?php echo anchor('master/Pesanan_oot','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                        </form>
                    </div>
                </div>
                <!-- /. PANEL  -->
                </div>
                </div>
                <!-- /. ROW  -->

             