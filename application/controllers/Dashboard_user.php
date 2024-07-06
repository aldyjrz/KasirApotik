<?php
class Dashboard_user extends CI_Controller{
    
    /**
     * 
     * ALDYTOI WAS HERE
     * 2021
     * APOTIK ILHAM
     * www.facebook.com/aldytoi1337
     * 
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_obat');
        $this->load->model('Model_pbf');
        
        chek_session();
    }
    function index(){
        chek_session();
        $data['record'] = $this->Model_obat->tampil_data();

        $this->template->load('templates','obat/lihat_data', $data);
    }
    
}