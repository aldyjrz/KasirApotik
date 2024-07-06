<?php
class Model_user extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT *
                FROM users";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('users',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id'=>$id);
        return $this->db->get_where('users',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('users',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('users');
    }
}