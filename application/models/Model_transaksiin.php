<?php
class Model_transaksiin extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT  a.transaksiin_id, a.mail_id, a.date_mail, a.kd_pic, a.kd_logistik, a.airwaybill, 
        a.shipperName, a.kd_kota, a.nik, f.nama_karyawan, a.additional_Info, a.kd_penerima, a.received_date, 
        a.kd_leveldoc, a.status, b.nama_kota, g.nama_departemen, c.nama_pic, d.nama_logistik, e.nama_leveldoc, a.received_sign
        FROM transaksi_in a 
            LEFT JOIN m_kota b ON a.kd_kota=b.kd_kota 
            LEFT JOIN m_pic c ON a.kd_pic=c.kd_pic 
            LEFT JOIN m_logistik d ON a.kd_logistik=d.kd_logistik 
            LEFT JOIN m_leveldoc e ON a.kd_leveldoc=e.kd_leveldoc 
            LEFT JOIN m_karyawan f ON a.nik=f.nik 
            LEFT JOIN m_departemen g ON f.kd_departemen=g.kd_departemen
            LEFT JOIN m_penerima h ON a.kd_penerima=h.kd_penerima 
            
            ORDER BY a.transaksiin_id ASC";
        return $this->db->query($query);
    }
    function order_by_status()
    {
        $query= "SELECT  a.transaksiin_id, a.mail_id, a.date_mail, a.kd_pic, a.kd_logistik, a.airwaybill, 
        a.shipperName, a.kd_kota, a.nik, f.nama_karyawan, a.additional_Info, a.kd_penerima, a.received_date, 
        a.kd_leveldoc, a.status, b.nama_kota, g.nama_departemen, c.nama_pic, d.nama_logistik, e.nama_leveldoc, a.received_sign
        FROM transaksi_in a 
            LEFT JOIN m_kota b ON a.kd_kota=b.kd_kota 
            LEFT JOIN m_pic c ON a.kd_pic=c.kd_pic 
            LEFT JOIN m_logistik d ON a.kd_logistik=d.kd_logistik 
            LEFT JOIN m_leveldoc e ON a.kd_leveldoc=e.kd_leveldoc 
            LEFT JOIN m_karyawan f ON a.nik=f.nik 
            LEFT JOIN m_departemen g ON f.kd_departemen=g.kd_departemen
            LEFT JOIN m_penerima h ON a.kd_penerima=h.kd_penerima 
            
            ORDER BY a.status ASC";
        return $this->db->query($query);
    }
    function tampil_data_where()
    {
        $query= "SELECT  a.transaksiin_id, a.mail_id, a.date_mail, a.kd_pic, a.kd_logistik, a.airwaybill, 
        a.shipperName, a.kd_kota, a.nik, f.nama_karyawan, a.additional_Info, a.kd_penerima, a.received_date, 
        a.kd_leveldoc, a.status, b.nama_kota, g.nama_departemen, c.nama_pic, d.nama_logistik, e.nama_leveldoc, a.received_sign
        FROM transaksi_in a 
            LEFT JOIN m_kota b ON a.kd_kota=b.kd_kota 
            LEFT JOIN m_pic c ON a.kd_pic=c.kd_pic 
            LEFT JOIN m_logistik d ON a.kd_logistik=d.kd_logistik 
            LEFT JOIN m_leveldoc e ON a.kd_leveldoc=e.kd_leveldoc 
            LEFT JOIN m_karyawan f ON a.nik=f.nik 
            LEFT JOIN m_departemen g ON f.kd_departemen=g.kd_departemen
             WHERE a.nik = '".$this->session->userdata('nik')."'
            
            ORDER BY a.transaksiin_id ASC";
        return $this->db->query($query);
    }
 

    function request()
    {
        $chek= $this->db->where('status',1);
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    function post($data)
    {
        $this->db->insert('transaksi_in',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('transaksiin_id'=>$id);
        return $this->db->get_where('transaksi_in',$param);
    }
  function terimacrot($id,$trans_id, $signature)
    {
		$now = date('Y-m-d');
        $query= "UPDATE transaksi_in SET received_sign = '$signature',  status='2', received_date = '$now' WHERE transaksiin_id = '$trans_id' AND mail_id = '$id'";
        		return ($this->db->affected_rows() != 1) ? false : true;

    }
    function search($id)
    {
 $query= "SELECT  a.transaksiin_id, a.mail_id, a.date_mail, a.kd_pic, a.kd_logistik, a.airwaybill, 
        a.shipperName, a.kd_kota, a.nik, f.nama_karyawan, a.additional_Info, a.kd_penerima, a.received_date, 
        a.kd_leveldoc, a.status, b.nama_kota, g.nama_departemen, c.nama_pic, d.nama_logistik, e.nama_leveldoc, a.received_sign
        FROM transaksi_in a 
            LEFT JOIN m_kota b ON a.kd_kota=b.kd_kota 
            LEFT JOIN m_pic c ON a.kd_pic=c.kd_pic 
            LEFT JOIN m_logistik d ON a.kd_logistik=d.kd_logistik 
            LEFT JOIN m_leveldoc e ON a.kd_leveldoc=e.kd_leveldoc 
            LEFT JOIN m_karyawan f ON a.nik=f.nik 
            LEFT JOIN m_departemen g ON f.kd_departemen=g.kd_departemen 
            WHERE   a.transaksiin_id like '%$id%' OR  a.mail_id like '%$id%' OR  a.additional_info like '%$id%' OR  a.shipperName like '%$id%'   OR  a.airwaybill like '%$id%'
            
            ORDER BY a.transaksiin_id ASC";
         return $this->db->query($query);
    }
    
    function get_one_cetak($id)
    {
        $query= "SELECT  a.transaksiin_id, a.mail_id, a.date_mail, a.kd_pic, a.kd_logistik, a.airwaybill, 
        a.shipperName, a.kd_kota, a.nik, f.nama_karyawan, a.additional_Info, a.kd_penerima, a.kd_penerima as nama_penerima, a.received_date, 
        a.kd_leveldoc, a.status, b.nama_kota, g.nama_departemen, c.nama_pic, d.nama_logistik, e.nama_leveldoc, a.received_sign
        FROM transaksi_in a 
            LEFT JOIN m_kota b ON a.kd_kota=b.kd_kota 
            LEFT JOIN m_pic c ON a.kd_pic=c.kd_pic 
            LEFT JOIN m_logistik d ON a.kd_logistik=d.kd_logistik 
            LEFT JOIN m_leveldoc e ON a.kd_leveldoc=e.kd_leveldoc 
            LEFT JOIN m_karyawan f ON a.nik=f.nik 
            LEFT JOIN m_departemen g ON f.kd_departemen=g.kd_departemen
             where a.transaksiin_id='".$id."'
            ORDER BY a.transaksiin_id ASC";
        return $this->db->query($query);
    }
    function edit($data,$id)
    {
        $this->db->where('transaksiin_id',$id);
        $this->db->update('transaksi_in',$data);
       return ($this->db->affected_rows() != 1) ? false : true;

    }
    
    
    function delete($id)
    {
        $this->db->where('transaksiin_id',$id);
        $this->db->delete('transaksi_in');
    }
}