<?php 
	echo "Pelanggan : Umum";
 ?>
 
<table id="my-grid" class="table tabel-transaksi" style='margin-bottom: 0px; margin-top: 10px;'>
	<thead>
		<tr>
			<th>#</th>
			<th>Kode Pesanan</th>
		 			<th>Jumlah</th>

			<th>Tanggal</th> 
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
						<td>".$d->jumlah."</td>
				<td>".$d->tgl."</td>
			 
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
