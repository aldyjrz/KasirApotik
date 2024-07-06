
<?php
$k = $_GET['dari'];

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

</tr>
</thead>


<tbody>
<?php
    
foreach($detail as $b){ 

    if($a->kode_pesanan == $b->kode_pesanan){ 
    ?>
    
    <tr>
        <td><?= $b->nama_barang?></td>
        <td><?= $b->jumlah?></td>
    </tr>

    <?php } 
    }?>
</tbody> 

</table>
<br>
<br>
<?php  
    }
 ?>