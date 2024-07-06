
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_users');
    }
    /**
     * 
     * ALDYTOI WAS HERE
     * 2021
     * APOTIK ILHAM
     * www.facebook.com/aldytoi1337
     * 
     */
    function login()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil      =   $this->Model_users->login($username,$password);
             
            if($hasil==1)
            {
                $ceckk      =  $this->Model_users->ceck($username,$password)->result();
                // print_r($ceckk[0]->blokir);
                // die;
                if($ceckk[0]->blokir=="Y")
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert">Akun anda telah diblokir</div>');
                    redirect(base_url());
                }
                else{
                // update last login
                $this->db->where('username',$username);
                $this->db->update('users',array('last_login'=>date('Y-m-d H:i:s')));
                // $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
                $session = array(
                    'username'  => $username,
                    'nama_lengkap'  => $ceckk[0]->nama_lengkap,
                    'level'  => $ceckk[0]->level,
                    'id'  => $ceckk[0]->id,

                    'status_login'=>'oke',
                );
                $this->session->set_userdata($session);
                $cek =  $ceckk[0]->level;

                if($cek == "admin"){
                    redirect('Dashboard');

                }else {
                    redirect('Transaksi/kasir');

                } 


                
                }
            }
            else{
                redirect('Auth/login');
            }
        }
        else{
            //$this->load->view('form_login2');
            chek_session_login();
       
            $this->load->view('form_login');
        }
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth/login');
    }
}