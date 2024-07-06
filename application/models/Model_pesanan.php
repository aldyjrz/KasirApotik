<?php
date_default_timezone_set('Asia/Jakarta');
class Model_pesanan extends ci_model
{

    /**
     * 
     * ALDYTOI WAS HERE
     * 2021
     * APOTIK ILHAM
     * www.facebook.com/aldytoi1337
     * 
     */

    function tampil_data()
    {
        $query = "SELECT *, count(*) as jml FROM tbl_pesanan GROUP BY kode_pesanan ORDER BY created_date DESC;
";
        return $this->db->query($query);
    }
   function konfirmasi($data, $id)
    {

        $this->db->trans_start();
        $this->db->where('kode_pesanan', $id);
        $this->db->update('tbl_pesanan', $data);
        $affected_rows = $this->db->affected_rows(); // moved to here from if condition
        $this->db->trans_complete();
        if ($affected_rows > 0) {
            return TRUE;
        } else {
            if ($this->db->trans_status() == FALSE) {
                return FALSE;
            }
            return FALSE;
        }
    }

    function search($id)
    {

        $query = "SELECT *
                FROM tbl_pesanan where id_pesanan = '$id'";
        return $this->db->query($query);
    }


    function cetak($id)
    {
        $new = $id;

        $query = "SELECT *, a.created_date as tgl 
                FROM tbl_pesanan a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.kode_pesanan = '$new'";
        return $this->db->query($query);
    }

  function get_obat($id, $dari, $sampai, $pbf)
    {
        $new = str_replace("+", " ", $id);
 $pb = str_replace("+", " ", $pbf);

         $query = "SELECT *, a.created_date as tgl 
                FROM tbl_pesanan a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.pic_tertuju = '$pb' AND a.nama_barang = '$new' AND date(a.created_date) BETWEEN '$dari' AND '$sampai'";
        
        return $this->db->query($query);
    }

    function get_count()
    {

        $query = "SELECT COUNT(kode_pesanan) as cou
FROM
    (SELECT * FROM tbl_pesanan
    GROUP BY kode_pesanan) AS cou";
        return $this->db->query($query);
    }

    function count_penjualan()
    {

        $query = "SELECT COUNT(id_penjualan_m) as cou
FROM
    (SELECT * FROM pj_penjualan_master
    GROUP BY id_penjualan_m) AS cou";
        return $this->db->query($query);
    }
    function get_laporan($dari, $sampai)
    {

        $query = "SELECT * , sum(harga*jumlah) as est, a.created_date as tanggal_pesan
                FROM tbl_pesanan a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where DATE(a.created_date) BETWEEN   '$dari' AND '$sampai' GROUP BY kode_pesanan";
        return $this->db->query($query);
    }
        function get_lap_obat($dari, $sampai)
    {

        $query = "SELECT created_date, est_harga, count(nama_barang) as pesanan, sum(jumlah) as total_jumlah, nama_barang, pic_tertuju as pbf FROM `tbl_pesanan` WHERE date(created_date) between '$dari' AND '$sampai'  group by nama_barang, pic_tertuju   ORDER BY created_date DESC ";
        return $this->db->query($query);
    }

    function get_laporan_by_kode($kode)
    {

        $query = "SELECT * , sum(jumlah) as jum, sum(harga*jumlah) as est, a.created_date as tanggal_pesan
                FROM tbl_pesanan a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.kode_pesanan = '$kode' GROUP BY kode_PESANAN";
        return $this->db->query($query);
    }
    function satu($dari, $sampai)
    {

        $query = "SELECT *  , A.created_date as tanggal_pesan, sum(jumlah)
                FROM tbl_pesanan a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where DATE(a.created_date) BETWEEN   '$dari' AND '$sampai'  GROUP BY kode_pesanan,nama_barang ";
        return $this->db->query($query);
    }
    function by_kode($kode)
    {

        $query = "SELECT *  , sum(jumlah) as jum, sum(harga*jumlah) as est, a.created_date as tanggal_pesan, sum(jumlah)
                FROM tbl_pesanan a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.kode_PESANAN = '$kode'  GROUP BY  nama_barang ";
        return $this->db->query($query);
    }
    function post($data)
    {
        $this->db->insert('tbl_pesanan', $data);
    }
    function crot($data)
    {
        return $this->db->insert('tbl_pesanan', $data);
    }
    function get_one($id_pesanan)
    {
        $param  =   array('id_pesanan' => $id_pesanan);
        return $this->db->get_where('tbl_pesanan', $param);
    }
    function get_max()
    {
        $m = date("m");
                $y = date("Y");

    
        $query = "SELECT  MAX(CAST(SUBSTRING_INDEX(kode_pesanan, '/', 1) AS UNSIGNED))  AS id FROM tbl_pesanan where MONTH(created_date) = '$m' and YEAR(created_date) = '$y' LIMIT 1";
        return $this->db->query($query);
    }
    function get_pesanan()
    {
        $query = "SELECT nama_pesanan
        FROM tbl_pesanan group by nama_pesanan";
        return $this->db->query($query);
    }



    function edit($data, $id)
    {

        $this->db->trans_start();
        $this->db->where('id_pesanan', $id);
        $this->db->update('tbl_pesanan', $data);
        $affected_rows = $this->db->affected_rows(); // moved to here from if condition
        $this->db->trans_complete();
        if ($affected_rows > 0) {
            return TRUE;
        } else {
            if ($this->db->trans_status() == FALSE) {
                return FALSE;
            }
            return FALSE;
        }
    }


    function delete($id_pesanan)
    {
        $this->db->where('kode_pesanan', $id_pesanan);
        $this->db->delete('tbl_pesanan');
    }
    function delete_one($id_pesanan)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->delete('tbl_pesanan');
    }
}