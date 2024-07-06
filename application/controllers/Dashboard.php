<?php
class Dashboard extends CI_Controller{
    
    /**
     * 
     * ALDYTOI WAS HERE
     * 2021
     * APOTIK ILHAM
     * www.facebook.com/aldytoi1337
     * 
     */
    function index(){

        chek_session();
        $t =$this->session->userdata('level'); 
        if($t == 'kasir'){
            $this->template->load('kasir','v_dashboard') ;

        }else{
        $this->template->load('template','v_dashboard')  ;
    }
        
    }
    
}