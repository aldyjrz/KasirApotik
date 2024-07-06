<?php
class Pbf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_pbf');
        $this->load->model('Model_pbf');
        
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->Model_pbf->tampil_data();
        $this->template->load('template','pbf/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses departemen
            $now = date("Y-m-d H:i:s");
            $nama       =   $this->input->post('nama_pbf');
            $alamat       =   $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $name = $this->session->userdata('nama_lengkap');
            $jatuh_tempo     = $this->input->post('jatuh_tempo');

            $data       = array('nama_pbf'=>strtoupper($nama),
            'alamat'=> strtoupper($alamat),
            'telp'=>$telp,
            'created_date'=>$now,
            'created_by'=>$name,
            'jatuh_tempo' => $jatuh_tempo
        );
            $this->Model_pbf->post($data);
            redirect('master/Pbf');
        }
        else{
             $pbf       = $this->Model_pbf->get_pbf()->result();

            $data            = array( 'pbf' => $pbf,
        );
                            
            $this->template->load('template','pbf/form_input', $data);
        }
    }
    
    function satuan()
    {
 
        $data['record']     =  $this->Model_pbf->get_satuan()->result();
        echo json_encode($data);
    }
    
     function cari()
    {
        if (!empty($_GET['term'])) {
            $result    =  $this->Model_pbf->search($_GET['term'])->result();
            if (count($result) > 0) {
                foreach ($result as $row) {
       
                    $arr_result[] = $row->nama_pbf;
                }
            }
            echo json_encode($arr_result);
        }
    }
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses departemen
            $id         =   $this->input->post('id_pbf');
            $nama       =   $this->input->post('nama_pbf');
                    $alamat       =   $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $name = $this->session->userdata('nama_lengkap');
            $jatuh_tempo     = $this->input->post('jatuh_tempo');

            $data       = array('nama_pbf'=>strtoupper($nama),
             'alamat'=> strtoupper($alamat),
            'telp'=>$telp,
            'created_date'=>date('Y-m-d'),
            'jatuh_tempo' => $jatuh_tempo,
            'created_by'=>$name);
            $this->Model_pbf->edit($data,$id);
            redirect('master/Pbf');
        }
        else{
            $id=  $this->uri->segment(4);
            
            $data['record']     =  $this->Model_pbf->get_one($id)->row_array();
            $this->template->load('template','pbf/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id =  $this->uri->segment(4);
        $this->Model_pbf->delete($id);
        redirect('master/Pbf');
    }
}