<?php
date_default_timezone_set('Asia/Jakarta');
function chek_session()
{
    $mon = date('m');
    $y = date('y');
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
  $qq = "UPDATE tbl_pesanan_pre SET nama_barang = REPLACE(nama_barang, '&amp;', '&')";
 $CI->db->query($qq);
   $qq = "UPDATE tbl_pesanan SET nama_barang = REPLACE(nama_barang, '&amp;', '&')";
 $CI->db->query($qq);
    $qq = "UPDATE tbl_pesanan_oot SET nama_barang = REPLACE(nama_barang, '&amp;', '&')";
 $CI->db->query($qq);
    if($session!='oke')
    {
        redirect('Auth/login');
    }
}
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "Minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 
 function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    //$result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun;
    $result = $tgl. " " .$Bulan[(int)$bulan-1]. " ".$tahun;

    return $result;
  }
function rupiah($angka){
    $hasil_rupiah = number_format($angka,0,',','.');
    return "Rp. ".$hasil_rupiah;
    }
function pembulatan($uang)
{
	
 $ratusan = substr($uang, -3);
 if($ratusan<500)
 $akhir = $uang + (500-$ratusan);
 else
 $akhir = $uang + (1000-$ratusan);
  return "Rp. ".number_format($akhir, 2, ',', '.');
}

function bulet($uang)
{
 $ratusan = substr($uang, -3);
 
 if($ratusan<500)
 $akhir = $uang + (500-$ratusan);
 else
 $akhir = $uang + (1000-$ratusan);
  return   $akhir;
}
function chek_session_login()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    if($session=='oke')
    {
        redirect('dashboard');
    }
}
?>
