<?php
class Model_obat extends ci_model
{
    /**
     * 
     * ALDYTOI WAS HERE
     */

    function tampil_data()
    {
        $query = "SELECT *
                FROM master_obat order by created_date  ";
        return $this->db->query($query);
    }

    function post($data)
    {
        return  $this->db->insert('master_obat', $data);
    }

    function fetch_data_obat($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        if (!empty($column_order) || !empty($like_value)) {
            $sql = "
			SELECT 
			 *
			FROM 
				master_obat a WHERE 1=1 
		";
        } else {
            $sql = "
			SELECT 
			 *
			FROM 
				master_obat a WHERE 1=1  ORDER BY nama_obat ASC
		";
        }
        $data['totalData'] = $this->db->query($sql)->num_rows();

        if (!empty($like_value)) {
            $sql .= " AND ( ";
            $sql .= "
				a.`nama_obat` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR harga LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR produksi LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
                OR satuan LIKE '%" . $this->db->escape_like_str($like_value) . "%' 

			 			OR kategori LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
            $sql .= " ) ";
        }

        $data['totalFiltered']    = $this->db->query($sql)->num_rows();

        $columns_order_by = array(
            0 => 'id',
            1 => 'nama_obat',
            2 => 'harga', 
            3 => 'diskon',
            4 => 'satuan', 
            5 => 'produksi',
            6=> 'kategori',
            7 => 'created_date'


        );
        if (!empty($column_order)) {
            $sql .= " ORDER BY nama_obat, " . $columns_order_by[$column_order] . " " . $column_dir . ", nama_obat ";
        }
        $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

        $data['query'] = $this->db->query($sql);
        return $data;
    }


    function search($q)
    {
        $query = "SELECT *
                FROM master_obat where nama_obat LIKE '%$q%' order by nama_obat";
        return $this->db->query($query);
    }


    function get_one($id)
    {
        $query = "SELECT *
        FROM master_obat where ID = '$id'";
        return $this->db->query($query);
    }

    function get_satuan()
    {
        $query = "SELECT satuan
        FROM master_obat group by satuan";
        return $this->db->query($query);
    }
    function find_satuan($q)
    {
        $query = "SELECT satuan
        FROM master_obat  where satuan LIKE '%$q%' GROUP BY SATUAN";
        return $this->db->query($query);
    }


    function edit($data, $id)
    {
      
          $this->db->update('master_obat',$data, array('id' => $id));
          $q = $this->db->affected_rows();
          if($q > 0){
             return true;
          }else{
             return false;
          }
      
    }



    function delete($id)
    {
        return  $this->db->delete('master_obat',  array('id' => $id));
    }
}
