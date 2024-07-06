<?php
class Model_pbf extends ci_model{
    
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
        $query= "SELECT *
                FROM master_pbf";
        return $this->db->query($query);
    }
      function search($q)
    {
        $query = "SELECT *
                FROM master_pbf  where nama_pbf LIKE '%$q%'";
        return $this->db->query($query);
    }
    function post($data)
    {
        $this->db->insert('master_pbf',$data);
    }
    
    function get_one($id_pbf)
    {
        $param  =   array('id_pbf'=>$id_pbf);
        return $this->db->get_where('master_pbf',$param);
    }
    
    function get_pbf()
    {
        $query= "SELECT id_pbf,nama_pbf
        FROM master_pbf group by nama_pbf";
return $this->db->query($query);
    }
    function edit($data,$id_pbf)
    {
        $this->db->where('id_pbf',$id_pbf);
        $this->db->update('master_pbf',$data);
    }
    
    
    function delete($id_pbf)
    {
        $this->db->where('id_pbf',$id_pbf);
        $this->db->delete('master_pbf');
    }
}