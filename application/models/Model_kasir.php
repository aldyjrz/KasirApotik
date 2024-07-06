<?php
class Model_kasir extends ci_model
{

    function tampil_data()
    {
        $query = "SELECT *, a.id_penjualan_m as id_m FROM pj_penjualan_master a LEFT JOIN pj_penjualan_detail b ON a.id_penjualan_m = b.id_penjualan_m GROUP BY a.nomor_nota";
        return $this->db->query($query);
    }

    function tampil_detail($id_penjualan)
    {
        $query = "SELECT *  FROM pj_penjualan_detail a JOIN master_obat b ON a.`id_menu` = b.`id`  where a.id_penjualan_m ='$id_penjualan'  ";
        return $this->db->query($query);
    }

    function tampil_by_date()
    {
        $query = "SELECT *
                FROM pj_penjualan_master a JOIN pj_penjualan_detail b ON a.id_penjualan_m = b.id_penjualan_m where a.tanggal BETWEEN '2021-08-31' and '2021-09-31'";
        return $this->db->query($query);
    }

    function edit($data, $id)
    {

        $this->db->update('master_obat', $data, array('id' => $id));
        $q = $this->db->affected_rows();
        if ($q > 0) {
            return true;
        } else {
            return false;
        }
    }


    function insert_master($nomor_nota, $tanggal, $id_kasir, $bayar, $grand_total, $catatan)
    {

        $data           = array(
            'nomor_nota' => $nomor_nota,
            'tanggal' => $tanggal,
            'id_user' => $id_kasir,
            'grand_total' => $grand_total,
            'keterangan_lain' => $catatan,

            'bayar' => $bayar
        );
        return $this->db->insert('pj_penjualan_master', $data);
    }

    function fetch_data_penjualan($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				 
				a.`keterangan_lain` AS keterangan   , a.id_user as id_user, b.username as username
			FROM 
				`pj_penjualan_master` AS a 
                LEFT JOIN `users` AS b ON a.`id_user` = b.`id` 

  				, (SELECT @row := 0) r WHERE 1=1 
		";

        $data['totalData'] = $this->db->query($sql)->num_rows();

        if (!empty($like_value)) {
            $sql .= " AND ( ";
            $sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			 			OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
            $sql .= " ) ";
        }

        $data['totalFiltered']    = $this->db->query($sql)->num_rows();

        $columns_order_by = array(
            0 => 'nomor',
            1 => 'a.`tanggal`',
            2 => 'nomor_nota',
            3 => 'a.`grand_total`',
            4 => 'keterangan',
            5 => 'kasir'
        );

        $sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomor ";
        $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

        $data['query'] = $this->db->query($sql);
        return $data;
    }

    function insert_detail($id_master, $id_menu, $jumlah_beli, $harga_satuan, $sub_total)
    {

        $data           = array(
            'id_penjualan_m' => $id_master,
            'id_menu' => $id_menu,
            'jumlah_beli' => $jumlah_beli,
            'harga_satuan' => $harga_satuan,
            'total' => $sub_total
        );
        return  $this->db->insert('pj_penjualan_detail', $data);
    }

    function get_baris($id_penjualan)
    {
        $sql = "
			SELECT 
				a.`nomor_nota`, 
				a.`grand_total`,
				a.`tanggal`,
				a.`bayar`,
				a.`id_user` AS id_kasir,
 				a.`keterangan_lain` AS catatan 
			 
			FROM 
				`pj_penjualan_master` AS a 
 			WHERE 
				a.`id_penjualan_m` = '" . $id_penjualan . "' 
			LIMIT 1
		";
        return $this->db->query($sql);
    }

    function get_max()
    {
        $query = "SELECT  MAX(`id_penjualan_m`) AS  id FROM pj_penjualan_master LIMIT 1 ";
        return $this->db->query($query);
    }

    function get_id($nomor)
    {
        $query = "SELECT  MAX(`id_penjualan_m`) AS  id FROM pj_penjualan_master WHERE nomor_nota = '$nomor'  ";
        return $this->db->query($query);
    }


    function delete($id)
    {
        $this->db->where('id_penjualan_m', $id);
        $this->db->delete('pj_penjualan_master');
    }


    function selesai_belanja($data)
    {
        $this->db->insert('transaksi', $data);
        $last_id =  $this->db->query("select transaksi_id from transaksi order by transaksi_id desc")->row_array();
        $this->db->query("update transaksi_detail set transaksi_id='" . $last_id['transaksi_id'] . "' where status='0'");
        $this->db->query("update transaksi_detail set status='1' where status='0'");
    }


    function laporan_default()
    {
        $query = "SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,operator as o
                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id
                group by t.transaksi_id";
        return $this->db->query($query);
    }

    function laporan_periode($tanggal1, $tanggal2)
    {
        $query = "SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,operator as o
                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id 
                and t.tanggal_transaksi between '$tanggal1' and '$tanggal2'
                group by t.transaksi_id";
        return $this->db->query($query);
    }
}