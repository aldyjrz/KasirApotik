<?php
class Obat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_obat');
        $this->load->model('Model_pbf');

        chek_session();
    }


    function index()
    {
        $data['record'] = $this->Model_obat->tampil_data();
        $pbf       = $this->Model_pbf->get_pbf()->result();

        $data['pbf']     =    $pbf;
        $t = $this->session->userdata('level');
        if ($t == 'kasir') {
            $this->template->load('kasir', 'obat/lihat_data', $data);
        } else {

            $this->template->load('template', 'obat/lihat_data', $data);
        }
    }

    function detail()
    {
        $id =  $_POST['id'];
        $pbf       = $this->Model_pbf->get_pbf()->result();

        $data['pbf']     =    $pbf;
        $data['record']     =  $this->Model_obat->get_one($id)->result();
     $this->load->view('obat/detail', $data);
         
    }

    function post()
    {
        if (isset($_POST['submit'])) {


            $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
            $this->form_validation->set_rules(
                'harga',
                'Harga Jual',
                'required',
                array('required' => 'You must provide a %s.')
            );
            $this->form_validation->set_rules('pbf', 'PBF', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');

            if ($this->form_validation->run() == FALSE) {


                $this->template->load('template', 'obat/form_input');
            } else {
                // proses departemen
                $now = date("Y-m-d H:i:s");
                $nama       =   $this->input->post('nama_obat');
                $harga_beli       =   $this->input->post('harga_beli');
                $kategori       =   $this->input->post('kategori');

                $harga       =   $this->input->post('harga');
                $satuan       =   $this->input->post('satuan');
                $pbf       =   $this->input->post('pbf');

                $data       = array(
                    'nama_obat' => strtoupper($nama),
                    'harga' => $harga,
                    'satuan' => $satuan,
                    'produksi' => strtoupper($pbf),
                    'created_date' => $now,
                    'kategori' => $kategori,
                    'harga_beli' => $harga_beli
                );
                $this->Model_obat->post($data);

                redirect('master/Obat');
            }
        } else {
            $sat       = $this->Model_obat->get_satuan()->result();
            $pbf       = $this->Model_pbf->get_pbf()->result();

            $data            = array(
                'satuan' => $sat, 'pbf' => $pbf,
            );

            $this->template->load('template', 'obat/form_input', $data);
        }
    }
    function post_ajax()
    {
         
 
                // proses departemen
                $now = date("Y-m-d H:i:s");
                $nama       =   $this->input->post('nama_obat');
                 $kategori       =   $this->input->post('kategori');
                $diskon       =   $this->input->post('diskon');

                $harga       =   $this->input->post('harga');
                $satuan       =   $this->input->post('satuan');
                $pbf       =   $this->input->post('pbf');
                $pre = $this->input->post('pre');
               $bentuk = $this->input->post('bentuk');

                $data       = array(
                    'nama_obat' => strtoupper($nama),
                    'harga' => $harga,
                    'diskon' => $diskon,
                    'satuan' => strtoupper($satuan),
                    'produksi' => strtoupper($pbf),
                    'bentuk' => strtoupper($bentuk),
                    'zat_prekursor' => strtoupper($pre),

                    'created_date' => $now,
                    'kategori' => $kategori
                );
                $q = $this->Model_obat->post($data);
                if ($q) {
                    echo json_encode(array('success' => 'true'));
                } else {
                    echo json_encode(array('success' => $this->db->error()));
                }
            
        
    }
    public function obat_json()
    {
        $this->load->model('Model_obat');
        $level             = $this->session->userdata('level');

        $requestData    = $_POST;
        $fetch            = $this->Model_obat->fetch_data_obat($_POST['search']['value'], $_POST['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

        $totalData        = $fetch['totalData'];
        $totalFiltered    = $fetch['totalFiltered'];
        $query            = $fetch['query'];

        $data    = array();
        $diskonan = 0;
        foreach ($query->result_array() as $row) {

            $kat = $row['kategori'];

            $har = $row['harga'];
            $dis = $row['diskon'];
           
            if ($kat  == "luar") {
                $harga = $har +  ($har * 0.31);
            } else {
                $harga = $har +  ($har * 0.36);
            }
            
            //cek harga diskon
            //hitung diskon
             if($dis != null && is_numeric($dis)){
                 $diskonan = $dis;
                 if($dis < 11){
                     $disc = 0;
                 }else{
                     $disc  = ($dis-11)/2;
                 }
                $diskon = $harga * $disc / 100;
            }else{
                $diskon = 0;
                $diskonan =0;
                
            }
            
            //harga = harga setelah kategori - hasil diskonan
            $price = bulet(round($harga-$diskon));
            $nestedData = array();
             $id = $row['id'];
            $nestedData[]    = $row['id'];
            $nestedData[]    = $row['nama_obat'];
            $nestedData[]    = rupiah($row['harga']);
            $nestedData[]    =  $diskonan;
            $nestedData[]    = $row['produksi'];

            $nestedData[]    = rupiah($price);
            $nestedData[]    = $row['satuan'];
            $nestedData[]    = $row['created_date'];

            if ($level == 'admin' or $level == 'keuangan') {
                $nestedData[]    = "<a  class='btn btn-success  edit btn-sm' onclick='showDataObat($id)' data-target='#myModal' href='#modal-body' data-toggle='modal' ><i class='fa fa-edit'></i> Edit</a> | <a class='btn btn-danger btn-sm'  href='" . site_url('/master/Obat/delete/' . $row['id']) . "' id='HapusTransaksi'><i class='fa fa-trash'></i> Hapus</a>";
            }

            $data[] = $nestedData;
        }

        $json_data = array(
            "draw"            => intval($requestData['draw']),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }
    function satuan()
    {

        if (!empty($_GET['term'])) {
            $result    =  $this->Model_obat->find_satuan($_GET['term'])->result();
            if (count($result) > 0) {
                foreach ($result as $row) {


                    $arr_result[] = $row->satuan;
                }
            }
            echo json_encode($arr_result);
        }
    }
    function search()
    {
        if (!empty($_GET['term'])) {
            $result    =  $this->Model_obat->search($_GET['term'])->result();
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $a = $row->harga + ($row->harga * 0.35);

                    $arr_result[] = $row->nama_obat . ";" . $a;
                }
            }
            echo json_encode($arr_result);
        }
    }

 function cari()
    {
        if (!empty($_GET['term'])) {
            $result    =  $this->Model_obat->search($_GET['term'])->result();
            if (count($result) > 0) {
                foreach ($result as $row) {
       
                    $arr_result[] = $row->nama_obat;
                }
            }
            echo json_encode($arr_result);
        }
    }
    function edit_ajax(){
          // proses departemen
          $id         =   $this->input->post('id');
          $nama_obat       =   $this->input->post('nama_obat');
          $harga       =   $this->input->post('harga');
          $kategori       =   $this->input->post('kategori');
                    $pre       =   $this->input->post('pre');

          $pbf       =   $this->input->post('pbf');
          $date = date('Y-m-d H:i:s');
          $satuan       =   $this->input->post('satuan');

          $data       = array(
              'nama_obat' => strtoupper($nama_obat),
              'harga' => $harga,
              'zat_prekursor'=> strtoupper($pre),
              'satuan' => strtoupper($satuan),
              'produksi' => $pbf, 'created_date' => $date, 'kategori' => $kategori
          );

           if ( $this->Model_obat->edit($data, $id)) {

          echo json_encode(array('success' =>  $this->Model_obat->edit($data, $id)));
      } else {
          echo json_encode(array('success' => $this->Model_obat->edit($data, $id)));
      }
    }
    function edit()
    {
             // proses departemen
            $id         =   $this->input->post('id');
            $nama_obat       =   $this->input->post('nama_obat');
            $harga       =   $this->input->post('harga');
            $kategori       =   $this->input->post('kategori');
            $pbf       =   $this->input->post('pbf');
                        $diskon       =   $this->input->post('diskon');

                                $pre       =   $this->input->post('pre');
                                $bentuk       =   $this->input->post('bentuk');

            $date = date('Y-m-d H:i:s');
            $satuan       =   $this->input->post('satuan');

            $data       = array(
                'nama_obat' => strtoupper($nama_obat),
                'harga' => $harga,
                'diskon' => $diskon,
                         'zat_prekursor'=> strtoupper($pre),
                         'bentuk' => strtoupper($bentuk),
                'satuan' => strtoupper($satuan),
                'produksi' => $pbf, 'created_date' => $date, 'kategori' => $kategori
            );
           $q =  $this->Model_obat->edit($data, $id);
           if( $this->Model_obat->edit($data, $id) == TRUE){
               echo json_encode(array('success'=>  $q
               ,'data'=>$data));
           }else{
            echo json_encode(array('success'=>  $q
            ,'data'=>$data));
           }
           
    }


    function delete()
    {
        $id =  $this->uri->segment(4);
        $q = $this->Model_obat->delete($id);
        if ($q) {
            echo json_encode(array('success' => 'true'));
        } else {
            echo json_encode(array('success' => 'false'));
        }
    }
}