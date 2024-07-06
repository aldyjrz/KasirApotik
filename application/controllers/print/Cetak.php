<?php
class Cetak extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form'); 
 
        $this->load->model('Model_pesanan_pre');
         $this->load->model('Model_pesanan');
                  $this->load->model('Model_pesanan_oot');


     }


    function index()
    {
        $data['record'] = $this->Model_transaksiin->tampil_data();
        $this->template->load('template','transaksiin/lihat_data',$data);
    }


    function sp()
    {
        $id =  $_GET['term'];
 
       
        $data['title'] = "Surat Tanda Terima";
        $data['transaksi'] = $this->Model_pesanan->cetak($id)->result(); 
         $this->load->view('print/sp', $data);
     
    }
   
    function sp_pre()
    {
        $id =  $_GET['term'];
 
       
        $data['title'] = "Surat Tanda Terima";
        $data['transaksi'] = $this->Model_pesanan_pre->cetak($id)->result(); 
         $this->load->view('print/sp_pre', $data);
     
    }
     function sp_oot()
    {
        $id =  $_GET['term'];
 
       
        $data['title'] = "Surat Tanda Terima";
        $data['transaksi'] = $this->Model_pesanan_oot->cetak($id)->result(); 
         $this->load->view('print/sp_oot', $data);
     
    }
}