<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<title>SP PREKUSOR - <?= $transaksi[0]->kode_pesanan?> - APOTEK ILHAM </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
<style>
body {
    margin-left: 5px
}

table.main-table {
    border-bottom: 1px solid #000;
    border-collapse: collapse;
    border-top: 1px solid #000;
    border-left: 1px solid #000; 
    border-right: 1px solid #000;
    margin-bottom: -5px;
    margin-top: .5em;
    width: 765px;
    font-size: 12px;
    font-family: helvetica;
}

td.main-td {
    border-bottom: 1px solid #000;
    border-top: 1px solid #000;
    border-left: 1px solid #000;
    border-right: 1px solid #000;
	font-size: 12px;
    font-family: helvetica;
}
td.main-e {
    border-bottom: 1px solid #000;
    border-top: 1px solid #000;
    border-left: 1px solid #000;
    border-right: 1px solid #000;
}
td.border-bottom-only {
    border-bottom: 1px solid #000
}
tbody{
	border-right: 1px solid #000;
}
font.big {
    font-size: 10px
}

font.big10 {
    font-size: 9px
}

font.bold {
    font-weight: 700
}

font.size-kecil {
    font-size: 6px
}

#container {
    height: 100px;
    width: 100;
    position: relative;
}

#stempel {
    z-index: 0;
    position: absolute;
    height: 120px;
    width: 150px;
    left: 80px;
}

#ttd {
    z-index: 1;
    position: absolute;
    left: 65px;
    top: 20px;
    height: 80px;
    width: 80px;
}
</style>
</head>  
<body >
	 
	<table class="main-table">
		<tbody>
			<tr>
				 
				<td width="100%" align="center">
				<img src="../../assets/headerr.png" width=650px height=150px>
					  
				</td>
 
			</tr>
			<tr>
				 
				 <td width="100%" align="center">
				 <font style=" font-size:14px" class="bold">Vila Mutiara Gading II Kav. D.10 No.03A, Karang Satria, Tambun Utara, Kabupaten Bekasi, Jawa Barat 17510</font>				 </td>
  
			 </tr>
			 <tr style="margin-bottom:1px">
				 
				 <td width="100%" align="center">
				 <font style=" font-size:14px; margin-bottom:10px" class="bold"> Telp : 021 - 89994105 , Email : bisnis@apotekilham.com </font>				 </td>
  
			 </tr>
			 <tr style="height:8px">
				 
				 <td width="100%" align="center">
				 </td>
  
			 </tr>
		</tbody>
	</table>
	<table class="main-table" style="margin-top:5px;">
		<tbody>
			<tr>
				<td   style="border-right:1px solid black;" width="100%" align="center">
					<font style="font-weight:bold;font-size:15px;">SURAT PESANAN OBAT MENGANDUNG PREKURSOR FARMASI</font>
				</td>
				
			</tr>
			<tr>
				<td style="border-right:1px solid black; border-bottom:0px;" width="100%" align="center">
					<font style="font-weight:THIN;font-size:12px;">NO :	<?= $transaksi[0]->kode_pesanan?></font>
				</td>
			</tr>
		</tbody>
	</table>

	<table class="main-table" style="padding-bottom:22px; margin-top:5px">
		<tbody  style="border-right:1px solid black;">
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td  width="20%" style="padding-bottom:2px;border-right:1px solid black">
					<font style="margin-left:5px" class="big bold">YANG BERTANDA TANGAN DIBAWAH INI :</font>
				</td>
			 
			</tr>
			<tr>
				<td style="border-right:1px solid black" >
					<font style="margin-left:5px" class="big bold">NAMA</font>  <font  style="margin-left:80px" class="big bold"> :		APT. NURHAYANI HASIBUAN, S.SI. </font>
				</td>
			</tr>
<tr>
				<td style="border-right:1px solid black" >
					<font style="margin-left:5px" class="big bold">JABATAN</font>  <font  style="margin-left:64px" class="big bold"> :		APOTEKER PENANGGUNG JAWAB</font>
				</td>
			</tr>
			<tr>
				<td style="padding-bottom:12px;border-right:1px solid black" >
					<font style="margin-left:5px"class="big bold">NO. SIPA</font>  <font  style="margin-left:67px" class="big bold"> :		503/116/DPMPTSP/APT/2021 </font>
				</td>
			</tr>
			<tr>
				<td width="25%" style="margin-left:5px; border-right:1px solid black">
					<font style="margin-left:5px ;" class="big bold">MENGAJUKAN PERMOHONAN KEPADA :</font>
				</td>
			 
			</tr>
			 	<tr>
				<td style="border-right:1px solid black" >
					<font style="margin-left:5px" class="big bold">NAMA PBF</font>  <font  style="margin-left:59px" class="big bold"> :			<?= $transaksi[0]->pic_tertuju?> </font>
				</td>
			</tr>
				<tr>
				<td style="border-right:1px solid black" >
					<font style="margin-left:5px" class="big bold">ALAMAT</font>  <font  style="margin-left:70px" class="big bold"> :			<?= $transaksi[0]->alamat?> </font>
				</td>
			</tr>
				<tr>
				<td style="padding-bottom:12px;border-right:1px solid black" >
					<font style="margin-left:5px" class="big bold">NO TELPON</font>  <font  style="margin-left:53px" class="big bold"> :			<?= $transaksi[0]->telp?> </font>
				</td>
			</tr>
				<tr>
				<td style="padding-bottom:12px;border-right:1px solid black" >
					<font style="margin-left:5px" class="big bold">JENIS OBAT MENGANDUNG PREKUSOR FARMASI SEBAGAI BERIKUT  :</font>
				</td>
			</tr>
		</tbody>
	</table>
	 
	<table class="main-table" border=1 width="100%" style="margin-top:5px">
		<tbody>
			<tr idth="100%">
				<td class="main-td"  align="center" width="4%">
					<font class="big bold">NO</font>
				</td>
				<td class="main-td" align="center" width="35%">
					<font class="big bold">NAMA OBAT</font>
				</td>
				<td class="main-td" align="center" width="10%">
					<font class="big bold">ZAT AKTIF</font>
				</td>
					<td class="main-td" align="center">
					<font class="big bold">BENTUK DAN KEKUATAN SEDIAAN</font>
				</td>
					<td class="main-td" align="center">
					<font class="big bold">SATUAN</font>
				</td>
					<td class="main-td" align="center">
					<font class="big bold">JUMLAH</font>
				</td>
				<td class="main-td" align="center">
					<font class="big bold" align="center">KETERANGAN</font>
				</td>
				 
			</tr>
			<?php
			$no=1; foreach ($transaksi  as $r) { ?>
				<tr>
					<td class="main-td" align="center"><?=$no++?></td>
					<td class="main-td" ><font style="margin-left:5px";><?=$r->nama_barang?></font></td>
										<td class="main-td" align="center"> <?=$r->zat_prekursor?></td>
					<td class="main-td" align="center"> <?=$r->bentuk?></td>
					<td class="main-td" align="center"> <?=$r->satuan?></td>

					<td class="main-td" align="center"> <?=$r->jumlah?></td>
					<td class="main-td" align="left">(<?= terbilang($r->jumlah)?>)</td>
 				</tr>
				<?php } 
			?>
			<tr >
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;
	</td>
				<td class="main-e">&nbsp;
	</td>
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;

				</td>
				 <td class="main-e">&nbsp;
	</td>
			</tr>
			<tr >
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;

				</td>
					</td>
				<td class="main-e">&nbsp;
	</td>
	<td class="main-e">&nbsp;
	</td>
				<td class="main-e">&nbsp;

				<td class="main-e">&nbsp;

				</td>
			 
			</tr>
			<tr>
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;
	</td>
	<td class="main-e">&nbsp;
	</td>
	<td class="main-e">&nbsp;
	</td>
				<td class="main-e">&nbsp;

				</td>
				<td class="main-e">&nbsp;

				</td>
			 
			</tr>
				
		</tbody>
	</table>
	<table class="main-table" style="border:1px solid black; padding-top:20px; margin-top:5px ">
	<tbody>
		    	<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
		    <tr style="margin-left:5px; padding-top:20px">
		        <td colspan="8" > <font style="margin-left:5px; padding-top:20px" class="big bold">UNTUK KEPERLUAN PEDAGANG BESAR FARMASI / APOTEK / RUMAH SAKIT / TOKO OBAT BERIZIN.</font></td>
		    </tr>
		    	<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
		 
			<tr>
				<td  colspan="8">
					<font style="margin-left:5px" class="big bold">NAMA               </font>  <font  style="margin-left:41px" class="big bold"> :		APOTEK ILHAM </font>
				</td>
			</tr>
<tr>
				<td  colspan="8" >
					<font style="margin-left:5px" class="big bold">ALAMAT                </font>  <font  style="margin-left:30px" class="big bold">      :		VILA MUTIARA GADING 2 KAV D.10 NO.03A, KARANG SATRIA, TAMBUN UTARA, BEKASI.</font>
				</td>
			</tr>
			<tr>
				<td  colspan="8" style="padding-bottom:12px;" >
					<font style="margin-left:5px" class="big bold">SURAT IZIN            </font>  <font  style="margin-left:16px" class="big bold"> :		09112100435030001 </font>
				</td>
			</tr>
			 
		<tr style='height: 28px;'> 
					<td colspan="8">&nbsp;</td>
			</tr>
			<tr style='margin-top:10px'> 
				<td width=70% align="center">
					 
				</td>
				<td style="border-right:1px solid black; margin-top:30px"  >
				
					<font style="text-size:12px" class="bold">BEKASI, <?= format_indo(date($r->tgl));?></font>
				</td>
			</tr>
			<tr>
			<tr> 
				<td width=80% align="center">
					 
				</td>
				<td style="border-right:1px solid black; " lass="main-td " rowspan="5" align="center">
					<div id="container" style='right:80px; margin-top:5px; margin-bottom:10px'>
						 	<!--<img id='stempel' src="../../assets/stempel.png" />
							<img id='stempel' src="../../assets/Untitled-1.png" />-->
 					</div>
				</td>
			 
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
			<td></td>
			</tr>
			<tr style="height:0px; margin-bottom:20px">
			 
				<td style="  margin-top:30px" >
			 
				</td>
				<td style="border-right:1px solid black;  margin-top:30px"  >
				<font style="font-size:11px" class="big bold">Apt. NURHAYANI, HS. S.Si.</font><br>
				<font style="font-size:9px" class="bold">SIPA : 503/116/DPMPTSP/APT/2021</font><br>
				</td>
			</tr>
		</tbody>
	</table>
	 
</body>

</html>