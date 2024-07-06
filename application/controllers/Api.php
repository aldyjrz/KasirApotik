<?php
class Api extends CI_Controller
{

    function __construct()
    {
        parent::__construct(); 
        $this->load->model('Model_pbf');
 
    }
      function post_ajax()
    {
         
 
                // proses departemen
                $now = date("Y-m-d H:i:s");
                $tgl_pesanan       =   $this->input->post('tgl_pesanan');
                $pbf       =   $this->input->post('pbf');
                $no_faktur       =   $this->input->post('no_faktur');
                                $sp       =   $this->input->post('sp');

                $keterangan       =   $this->input->post('keterangan');
                 $nominal       =   $this->input->post('nominal');
                  $cekjt = $this->db->query("SELECT * from master_pbf where id_pbf = '$pbf'")->result();
                
                $interval = $cekjt[0]->jatuh_tempo;
                $jatuh_tempo = date('Y-m-d', strtotime($tgl_pesanan. ' + '.$interval.' days'));
                                $sp       =   $this->input->post('sp');
          if($sp == 'Silahkan Pilih'){
                    $sp = '';
                }
                $q = "SELECT * FROM tbl_invoice where no_faktur='$no_faktur'";
                $data = $this->db->query($q)->num_rows();
                if($data > 0){
                    echo json_encode(array('success' => false)); 
                    
                }else{
                  $data       = array(
                    'tgl_pesanan' => $tgl_pesanan,
                    'tgl_jatuhtempo' => $jatuh_tempo,
                     'no_faktur' => $no_faktur,
                     'kode_pesanan' => $sp,
                    'keterangan' => $keterangan,
                    'id_pbf' => $pbf,
                    'nominal' => $nominal 
                 
                );
                
                $q = $this->db->insert('tbl_invoice', $data);
                
                if ($q) {
                    echo json_encode(array('success' => true));
                } else {
                    echo json_encode(array('success' =>false));
                }
                }
            
        
    }

}