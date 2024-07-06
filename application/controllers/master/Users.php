<?php
class Users extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->Model_user->tampil_data();
        $this->template->load('template','users/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses user
            $username       =   $this->input->post('username');
            $password       =   $this->input->post('password');
            $nama_lengkap   =   $this->input->post('nama_lengkap');
            $email          =   $this->input->post('email');
            $level          =   $this->input->post('level');
            $blokir         =   "N";
            $data           = array('username'=>$username,
                                'password'=>md5($password),
                                'nama_lengkap'=>$nama_lengkap,
                                'email'=>$email,
                                'level'=>$level,
                                'blokir'=>$blokir);
            $this->Model_user->post($data);
            redirect('master/users');
        }
        else{
            
            $this->template->load('template','users/form_input');
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses user
            $id         =   $this->input->post('id');
            $username       =   $this->input->post('username');
            $password       =   $this->input->post('password');
            $nama_lengkap   =   $this->input->post('nama_lengkap');
            $email          =   $this->input->post('email');
            $level          =   $this->input->post('level');
            $blokir         =   $this->input->post('blokir');
            if($password==""){
                $data           =   array('username'=>$username,
                'nama_lengkap'=>$nama_lengkap,
                'email'=>$email,
                'level'=>$level,
                'blokir'=>$blokir);
            }
            else{
                $data           =   array('username'=>$username,
                                'password'=>md5($password),
                                'nama_lengkap'=>$nama_lengkap,
                                'email'=>$email,
                                'level'=>$level,
                                'blokir'=>$blokir);
            }
            $this->Model_user->edit($data,$id);
            redirect('master/users');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->Model_user->get_one($id)->row_array();
            $this->template->load('template','users/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->Model_user->delete($id);
        redirect('master/users');
    }
}