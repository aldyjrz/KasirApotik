<?php 
	echo "Pelanggan : Umum";
 ?>
<!-- 
<input type="hidden" id="nomor_nota" value="<?php echo html_escape($detail->nomor_nota); ?>">
<input type="hidden" id="tanggal" value="<?php echo $detail->tanggal; ?>">
<input type="hidden" id="id_kasir" value="<?php echo $detail->id_kasir; ?>">
 <input type="hidden" id="UangCash" value="<?php echo $detail->bayar; ?>">
<input type="hidden" id="catatan" value="<?php echo html_escape($detail->catatan); ?>">
<input type="hidden" id="TotalBayarHidden" value="<?php echo $detail->grand_total; ?>"> -->

<table id="my-grid" class="table tabel-transaksi" style='margin-bottom: 0px; margin-top: 10px;'>
	<thead>
		<tr>
			<th>#</th>
			<th>Kode Pesanan</th>
			<th>Nama Barang</th>
			<th>Harga Satuan</th>
			<th>Jumlah Beli</th>
			<th>Sub Total</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no 			= 1;
	$est_harga=0;
	foreach($detail  as $d)
	{
		echo "
			<tr>
				<td>".$no."</td>
				<td>".$d->kode_pesanan." <input type='hidden' name='kode_menu[]' value='".html_escape($d->kode_pesanan)."'></td>
				<td>".$d->nama_barang."</td>
				<td>".rupiah($d->harga)." <input type='hidden' name='jumlah_beli[]' value='".$d->harga."'></td>

 				<td>".$d->jumlah." <input type='hidden' name='jumlah_beli[]' value='".$d->jumlah."'></td>
				<td>".rupiah($d->harga*$d->jumlah)." <input type='hidden' name='sub_total[]' value='".$d->harga*$d->jumlah."'></td>
			</tr>
		";
		$est_harga=$est_harga+$d->harga*$d->jumlah;
		$no++;
	}
	echo "
		<tr style='background:#deeffc;'>
			<td colspan='5' style='text-align:right;'><b>Grand Total</b></td>
			<td><b>Rp. ".str_replace(',', '.', number_format($est_harga))."</b></td>
		</tr>
		 
	";
	?>
	</tbody>
</table>
