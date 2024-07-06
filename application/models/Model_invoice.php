<?php
date_default_timezone_set('Asia/Jakarta');
class Model_invoice extends ci_model
{

    /**
     * 
     * ALDYTOI WAS HERE
     * 2021
     * APOTIK ILHAM
     * www.facebook.com/aldytoi1337
     * 
     */


    function fetch_data_obat($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        if (!empty($column_order) || !empty($like_value)) {
            $sql = "
			SELECT 
			 *
			FROM 
				tbl_invoice a left join master_pbf b on a.id_pbf = b.id_pbf WHERE 1=1 
		";
        } else {
            $sql = "
			SELECT 
			 *
			FROM 
				tbl_invoice a left join master_pbf b on a.id_pbf = b.id_pbf WHERE 1=1  ORDER BY tgl_pesanan ASC
		";
        }
        $data['totalData'] = $this->db->query($sql)->num_rows();

        if (!empty($like_value)) {
            $sql .= " AND ( ";
            $sql .= "
				b.`nama_pbf` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.tgl_pesanan LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.tgl_jatuhtempo LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
  
			";
            $sql .= " ) ";
        }

        $data['totalFiltered']    = $this->db->query($sql)->num_rows();

        $columns_order_by = array(
            0 => 'id_invoice',
            1 => 'tgl_pesanan',
            2 => 'nama_pbf',
            3 => 'tgl_jatuhtempo',
            4 => 'nominal'

        );
        if (!empty($column_order)) {
            $sql .= " ORDER BY nama_pbf, " . $columns_order_by[$column_order] . " " . $column_dir . ", nama_pbf ";
        }
        $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

        $data['query'] = $this->db->query($sql);
        return $data;
    }

    function tampil_data()
    {
        $query = "SELECT * FROM tbl_invoice a left join master_pbf b  on a.id_pbf = b.id_pbf  ORDER BY tgl_pesanan DESC;";
        return $this->db->query($query);
    }


    function search($id)
    {

        $query = "SELECT *
                FROM tbl_invoice where id_pesanan = '$id'";
        return $this->db->query($query);
    }


    function cetak($id)
    {
        $new = $id;

        $query = "SELECT *, a.created_date as tgl 
                FROM tbl_invoice a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.kode_pesanan = '$new'";
        return $this->db->query($query);
    }

  function get_obat($id, $dari, $sampai)
    {
        $new = $id;

         $query = "SELECT *, a.created_date as tgl 
                FROM tbl_invoice a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.nama_barang = '$new' AND date(a.created_date) BETWEEN '$dari' AND '$sampai'";
        return $this->db->query($query);
    }

    function get_count()
    {

        $query = "SELECT COUNT(kode_pesanan) as cou
FROM
    (SELECT * FROM tbl_invoice
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
                FROM tbl_invoice a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where DATE(a.created_date) BETWEEN   '$dari' AND '$sampai' GROUP BY kode_pesanan";
        return $this->db->query($query);
    }
        function get_lap_obat($dari, $sampai)
    {

        $query = "SELECT created_date, count(nama_barang) as pesanan, sum(jumlah) as total_jumlah, nama_barang, pic_tertuju as pbf FROM `tbl_invoice` WHERE date(created_date) between '$dari' AND '$sampai'  group by nama_barang, pic_tertuju  ";
        return $this->db->query($query);
    }

    function get_laporan_by_kode($kode)
    {

        $query = "SELECT * , sum(jumlah) as jum, sum(harga*jumlah) as est, a.created_date as tanggal_pesan
                FROM tbl_invoice a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.kode_pesanan = '$kode' GROUP BY kode_PESANAN";
        return $this->db->query($query);
    }
    function satu($dari, $sampai)
    {

        $query = "SELECT *  , A.created_date as tanggal_pesan, sum(jumlah)
                FROM tbl_invoice a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where DATE(a.created_date) BETWEEN   '$dari' AND '$sampai'  GROUP BY kode_pesanan,nama_barang ";
        return $this->db->query($query);
    }
    function by_kode($kode)
    {

        $query = "SELECT *  , sum(jumlah) as jum, sum(harga*jumlah) as est, a.created_date as tanggal_pesan, sum(jumlah)
                FROM tbl_invoice a LEFT JOIN master_obat b ON a.nama_barang = b.nama_obat where a.kode_PESANAN = '$kode'  GROUP BY  nama_barang ";
        return $this->db->query($query);
    }
    function post($data)
    {
        return  $this->db->insert('tbl_invoice', $data);
    }
    function crot($data)
    {
        return $this->db->insert('tbl_invoice', $data);
    }
    function get_one($id_pesanan)
    {
        $param  =   array('id_invoice' => $id_pesanan);
        return $this->db->get_where('tbl_invoice', $param);
    }
    function get_max()
    {
        $m = date("m");
    
        $query = "SELECT  MAX(CAST(SUBSTRING_INDEX(kode_pesanan, '/', 1) AS UNSIGNED))  AS id FROM tbl_invoice where MONTH(created_date) = '$m' LIMIT 1";
        return $this->db->query($query);
    }
    function get_pesanan()
    {
        $query = "SELECT nama_pesanan
        FROM tbl_invoice group by nama_pesanan";
        return $this->db->query($query);
    }



    function edit($data, $id)
    {

        $this->db->update('tbl_invoice',$data, array('id_invoice' => $id));
          $q = $this->db->affected_rows();
          if($q > 0){
             return true;
          }else{
             return false;
          }
    }


    function delete($id_pesanan)
    {
        $this->db->where('id_invoice', $id_pesanan);
        $this->db->delete('tbl_invoice');
    }
    function delete_one($id_pesanan)
    {
        $this->db->where('id_invoice', $id_pesanan);
        $this->db->delete('tbl_invoice');
    }
}