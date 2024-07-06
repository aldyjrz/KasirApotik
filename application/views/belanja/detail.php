
                                <?php echo form_open('Belanja/post_konfirmasi'); ?>
<div class="form-group">
    <label>Apakah Pesanan Sesuai??</label>
    <div class="form-check">
        <input class="form-check-input" value = '1' type="radio" name="sesuai" id="sesuai">
        <label class="form-check-label" for="flexRadioDefault1">
           Ya
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value = '0' name="sesuai" id="sesuai" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Tidak
        </label>
    </div>
</div>
<div class="form-group">
    <label>Keterangan</label>
    <input required class="form-control" name="keterangan"  id="keterangan" placeholder="Tulisa Keterangan...">
</div>
 
</div>



 <input type="hidden" value = '<?= $no_sp ?>' id="no_sp" name="no_sp" >
<button id="konfirm" name="submit" class="btn btn-primary btn-sm">Update</button> |
<?php echo anchor('Belanja', 'Kembali', array('class' => 'btn btn-danger btn-sm')) ?>
</form>