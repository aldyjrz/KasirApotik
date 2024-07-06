
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html class="en"><head>
	   	
		   		
		
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>:: FORM TANDA TERIMA ::</title>
        <meta name="Description" content="1337Toi">
		
 <style>
.cetak {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight:bold;	
	border-bottom: #CCCCCC 0px solid;
	color:#000000;
	height:10px;
}
	
	h1{
	font-size: 18pt;
	}
	h2{
	font-size: 14pt;
	}
	h3{
		font-size:12pt;
	}
	.header{
	display: block;
	width:14.8cm ;
	text-align: center;
	border: 1px solid #265180;
	margin-right: auto;
	margin-left: auto;

	
}
	.attr{
	font-size:7pt;
	width: 560px;
	padding-top:2pt;
	padding-bottom:2pt;
	border-top: 0.2mm solid #000;
	border-bottom: 0.2mm solid #000;
	}
	.pagebreak {
	page-break-after: always;
}
a:link,a:visited {
  color:#265180;
}
a:hover {
	color: #FF6600;
	text-decoration:none;
}
h2 {
	font: normal 120% Georgia;
	color: #265180;
	background-color: #ccdcd9;
	border-bottom: 1px dotted #265180;
}
table {
	font-family: Tahoma; 
	font-size: 8pt;
	border-width: 1px;
	border-style: solid;
	border-color: #999999;
	border-collapse: collapse;
	margin: 5px 0px;
}
th{
	color: #FFFFFF;
	font-size: 7pt;
	text-transform: uppercase;
	text-align: center;
	padding: 0.5em;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
	background-color: #585b59;
}
td{
	padding: 0.5em;
	vertical-align: top;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
}
input,textarea,select{
	font-family: Tahoma; 
	font-size: 8pt;
}
#footer{
	
	padding: 32px 0 10px 355px;
	background-image: url(../images/foot.jpg);
}


</style>

</head>

<body>
<table cellspacing="0" cellpadding="0" width=65%>
  <tr><td colspan="15" align="center"><h3> FORM TANDA TERIMA </h3></td></tr>
 
  <tr><th>No</th>
                                            <th>Mail ID</th>
                                            <th>Date Mai</th>
                                            <th>PIC</th>
                                            <th>Logistik</th>
                                            <th>Airway Bill</th>
                                            <th>Shipper Name</th>
                                            <th>City</th>
                                            <th>Recipient Name</th>
                                            <th>Departement</th>
                                            <th>Aditional Info</th>
                                            <th>Received By</th>
                                            <th>Received Date</th>
                                            <th>Level Doc</th>
                                            <th>Status</th>
    </tr>
  <?php
  $no=1; foreach ($transaksi->result() as $r) { ?>
            <tr class="gradeU">
                <td><?php echo $no ?></td>
                <td align=left><?php echo $r->mail_id?></td>
                <td align=left><?php echo $r->date_mail?></td>
                <td align=left><?php echo $r->nama_pic?></td>
                <td align=left><?php echo $r->nama_logistik?></td>
                <td align=left><?php echo $r->airwaybill?></td>
                <td align=left><?php echo $r->shipperName?></td>
                <td align=left><?php echo $r->nama_kota?></td>
                <td align=left><?php echo $r->nama_karyawan?></td>
                <td align=left><?php echo $r->nama_departemen?></td>
                <td align=left><?php echo $r->additional_Info?></td>
                <td align=left><?php echo $r->kd_penerima?></td>
                <td align=left><?php echo $r->received_date?></td>
                <td align=left><?php echo $r->nama_leveldoc?></td>
                <?php
                if($r->status=='0'){
                    echo "<td>Cancel </td>";
                    }
                elseif($r->status=='1'){                
                    echo "<td> Request </td>";
                    }
                else{                
                        echo "<td> Success</td>";
                        }
                    ?>
  </tr>
      <?php
	  $no++;
}
?>
<tr class="cetak" height="20" >
    <td height="20" colspan="15"></td>
  </tr>
   <tr height="20">
    <td height="20" width="170" colspan=3><div align="center"><B>Pengirim    :</div></td>
    <td width="201" colspan=4><div align="center"><B>Penerima I:</div></td>
    <td colspan="4" width="307"><div align="center"><B>Penerima II (User) :</div></td>
	<td colspan="4" width="307"><div align="center"><B>Mengetahui :</div></td>
  </tr>
  <tr height="20">
    <td height="10" colspan=3>
      
    <img style="width:100px; height:100px;margin-left: 24px;"src="data:image/gif;base64,<?=$r->received_sign?>"/>    <br>
    <p align="center"><B>Admin</p></td>
    <td height="10" colspan=4>
    <img  style="width:100px; height:100px;margin-left: 75px;"src="data:image/gif;base64,<?=$r->received_sign?>"/>    <br>
    <p align="center" colspan=4><B>Staff</p></td>
    <td height="10" colspan="4">
	<br><br><p align="center">_____________</p>
    <p align="center"></p></td>
	<td height="10" colspan="4">
	<br><br><p align="center">_____________</p>
    <p align="center"><B>Manager.</p></td>
  </tr>
   
  <tr height="20">
    <td colspan="3" height="20" align=right>
	 <td colspan="4" height="20" align=left><B>Tgl :
	 <td colspan="4"><B>Tgl : <br>______________<br>Bagian : <br></td>
    <td colspan="8"><B>Tgl :</td>
  </tr>
</table>
  
</body>
</html> 
<?php
echo "<script>window.print()</script>"
 

?>