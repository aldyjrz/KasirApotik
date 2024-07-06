
<?php
$k = $record[0]->pic_tertuju;
$k2 = $record[0]->tanggal_pesan;

    ob_start ();
    
    header("Content-type: application/vnd-excel");
 	header("Content-Disposition: attachment; filename=\"Laporan-".$k.".xls\"");
 
   


foreach($record as $a){ 
?>

<table border=1>
     <tr>
        <td>NO SP</td>
        <td><?=$a->kode_pesanan?></td>

    </tr>
     
 
    <tr>
  
        <td>PBF</td>
        <td><?=$a->pic_tertuju?></td>

    </tr>
     
    <tr>
  
        <td>TANGGAL PESANAN</td>
        <td><?=$a->tanggal_pesan?></td>

    </tr>
    <tr>
  
  <td>Estimasi Tagihan</td>
  <td><?=rupiah($a->est)?></td>
</table>
 <table border=1>
    <thead>
<tr>
  
  <th>Nama Barang</th>
  <th>Jumlah Beli</td>
  <th>Harga</td>

</tr>
</thead>


<tbody>
<?php
    $h = 0;
foreach($detail as $b){ 

    if($a->kode_pesanan == $b->kode_pesanan){ 

         $h = $h + $b->est;
    ?>
    
    <tr>
        <td><?= $b->nama_barang?></td>
        <td><?= $b->jum?></td>
        <td align="right"><?= rupiah($b->est)?></td>

    </tr>

    <?php } 
    }?>
</tbody> 
<tr>
         <td align="right" colspan=2>TOTAL</td>
        <td align="right"><?= rupiah($h)?></td>

    </tr>
</table>
<br>
<br>
<?php  

    }
	
	echo ob_get_clean();
 ?>