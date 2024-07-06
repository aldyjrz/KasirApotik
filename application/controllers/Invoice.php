<?php
class Invoice extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_invoice');
        $this->load->model('Model_pbf');
 
    }


    function index()
    {
        

        
       $date = date('m');
        $pbf = $this->Model_pbf->get_pbf()->result();

        $data['pbf'] = $pbf;
                 

        $t = $this->session->userdata('level'); 
        if($t != 'admin' || $t == null){ 

             $qq = "SELECT * FROM `tbl_pesanan` a JOIN master_obat b ON a.nama_barang = b.nama_obat where MONTH(a.created_date) = '$date'  group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_oot` a JOIN master_obat b ON a.nama_barang = b.nama_obat where MONTH(a.created_date) = '$date' group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_pre` a JOIN master_obat b ON a.nama_barang = b.nama_obat where MONTH(a.created_date) = '$date' group by a.kode_pesanan, a.pic_tertuju";
              $datasp = $this->db->query($qq)->result();
                                  $data['sp'] = $datasp;

            $this->template->load('Depan', 'invoice/form_input', $data);

        }else {
            $qq = "SELECT * FROM `tbl_pesanan` a JOIN master_obat b ON a.nama_barang = b.nama_obat group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_oot` a JOIN master_obat b ON a.nama_barang = b.nama_obat group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_pre` a JOIN master_obat b ON a.nama_barang = b.nama_obat group by a.kode_pesanan, a.pic_tertuju";
              $datasp = $this->db->query($qq)->result();
             $data['sp'] = $datasp;
            if (!empty($_POST['dari']) && !empty($_POST['sampai']) && empty($_POST['pbf'])) {
                $dari = $_POST['dari'];
                $sampai = $_POST['sampai'];
               
                $query = "SELECT *   FROM tbl_invoice a  LEFT JOIN master_pbf c ON a.id_pbf = c.id_pbf where  date(a.tgl_pesanan) BETWEEN '$dari' AND '$sampai' order by a.tgl_pesanan;";
    
                $data['record'] = $this->db->query($query)->result();
                $this->template->load('template', 'invoice/lihat_data', $data);
            } else if (!empty($_POST['dari'])  &&  !empty($_POST['sampai'])  &&  !empty($_POST['pbf'])) {
                $dari = $_POST['dari'];
                $sampai = $_POST['sampai'];
                $pbf = $_POST['pbf'];
                $query = "SELECT * 
                    FROM tbl_invoice a  LEFT JOIN master_pbf c ON a.id_pbf = c.id_pbf where c.nama_pbf LIKE '%$pbf%' AND date(a.tgl_pesanan) BETWEEN '$dari' AND '$sampai' order by a.tgl_pesanan;";
    
                $data['record'] = $this->db->query($query)->result();
    
                $this->template->load('template', 'invoice/lihat_data', $data);
            } else if (empty($_POST['dari']) && empty($_POST['sampai']) && empty($_POST['obat'])) {
                $data['pbf'] = $this->Model_pbf->get_pbf()->result(); 
                  $query = "SELECT * 
                    FROM tbl_invoice a   LEFT JOIN master_pbf c ON a.id_pbf = c.id_pbf  ";
    
                $data['record'] = $this->db->query($query)->result();
    
                $this->template->load('template', 'invoice/lihat_data', $data);
            }
        
        }
        
    }
    
    
    function download()
    {
         $pbf       = $this->Model_pbf->get_pbf()->result();

        $data['pbf']     =    $pbf;
        $data['record']     =  $this->Model_invoice->tampil_data()->result();
     $this->load->view('print/invoice_excel', $data);
         
    }

    function detail()
    {
        $id =  $_POST['id'];
        $pbf       = $this->Model_pbf->get_pbf()->result();
 $qq = "SELECT * FROM `tbl_pesanan` a JOIN master_obat b ON a.nama_barang = b.nama_obat group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_oot` a JOIN master_obat b ON a.nama_barang = b.nama_obat group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_pre` a JOIN master_obat b ON a.nama_barang = b.nama_obat group by a.kode_pesanan, a.pic_tertuju";
              $datasp = $this->db->query($qq)->result();
          
        $data['pbf'] = $pbf;
                    $data['sp'] = $datasp;

        $data['pbf']     =    $pbf;
        $data['record']     =  $this->Model_invoice->get_one($id)->result();
     $this->load->view('invoice/detail', $data);
         
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
                $sp       =   $this->input->post('sp');

                $harga       =   $this->input->post('harga');
                $satuan       =   $this->input->post('satuan');
                $pbf       =   $this->input->post('pbf');

                $data       = array(
                    'nama_obat' => $nama,
                    'harga' => $harga,
                    'satuan' => $satuan,
                                        'kode_pesanan' => $sp,

                    'produksi' => $pbf,
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
    
    function get_nosp(){
        $ea = $this->input->post('date',TRUE);
        $pbf = $this->input->post('pbf',TRUE);

        $date = date("Y-m-d",strtotime($ea));
      $before =  date('Y-m-d', strtotime($date. ' - 7 days'));

         $qq = "SELECT * FROM `tbl_pesanan` a JOIN master_obat b ON a.nama_barang = b.nama_obat where date(a.created_date) BETWEEN '$before' AND '$date' AND a.pic_tertuju LIKE '%$pbf%' group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_oot` a JOIN master_obat b ON a.nama_barang = b.nama_obat where  date(a.created_date) BETWEEN '$before' AND '$date' AND a.pic_tertuju LIKE '%$pbf%' group by  a.kode_pesanan, a.pic_tertuju  UNION ALL
              SELECT * FROM `tbl_pesanan_pre` a JOIN master_obat b ON a.nama_barang = b.nama_obat where date(a.created_date) BETWEEN '$before' AND '$date' AND a.pic_tertuju LIKE '%$pbf%' group by a.kode_pesanan, a.pic_tertuju";
               $data = $this->db->query($qq)->result();
           
        echo json_encode($data);
    }
    
    function get_pbf(){
        $ea = $this->input->post('date',TRUE); 
        $date = date("Y-m-d",strtotime($ea));
             $before =  date('Y-m-d', strtotime($date. ' - 7 days'));

         $qq = "SELECT * FROM `tbl_pesanan` a JOIN master_pbf b ON a.pic_tertuju = b.nama_pbf where date(a.created_date) BETWEEN '$before' AND '$date'  group by b.nama_pbf UNION ALL
              SELECT * FROM `tbl_pesanan_oot` a JOIN master_pbf b ON a.pic_tertuju = b.nama_pbf where date(a.created_date) BETWEEN '$before' AND '$date'  group by b.nama_pbf  UNION ALL
              SELECT * FROM `tbl_pesanan_pre` a JOIN master_pbf b ON a.pic_tertuju = b.nama_pbf where  date(a.created_date) BETWEEN '$before' AND '$date'  group by b.nama_pbf";
               $data = $this->db->query($qq)->result();
 
        echo json_encode($data);
    }
    
    function post_ajax()
    {
         
 
                // proses departemen
                $now = date("Y-m-d H:i:s");
                $tgl_pesanan       =   $this->input->post('tgl_pesanan');
                $pbf       =   $this->input->post('pbf');
                $no_faktur       =   $this->input->post('no_faktur');
                $keterangan       =   $this->input->post('keterangan');
                $sp       =   $this->input->post('sp');
               
                $nominal       =   $this->input->post('nominal');
                
                $cekjt = $this->db->query("SELECT * from master_pbf where id_pbf = '$pbf'")->result();
                $interval = $cekjt[0]->jatuh_tempo;
                $jatuh_tempo = date('Y-m-d', strtotime($tgl_pesanan. ' + '.$interval.' days'));
                
                $q = "SELECT * FROM tbl_invoice where no_faktur='$no_faktur'";
                $data = $this->db->query($q)->num_rows();
                $c = $this->db->query($q)->result();
                if($sp == 'Silahkan Pilih'){
                    $sp = '';
                }

                if($data > 0){
                    echo json_encode(array('success' => false, 'message'=> 'data faktur sudah ada '.$c[0]->no_faktur)); 
                    
                }else{
                  $data       = array(
                    'tgl_pesanan' => $tgl_pesanan,
                    'tgl_jatuhtempo' => $jatuh_tempo,
                     'kode_pesanan' => $sp,

                    'keterangan' => $keterangan,
                     'no_faktur' => $no_faktur,

                    'id_pbf' => $pbf,
                    'nominal' => $nominal 
                 
                );
                
                $q = $this->Model_invoice->post($data);
                                     $t = $this->session->userdata('level'); 
   $pbf = $this->Model_pbf->get_pbf()->result();

        $data['pbf'] = $pbf;
        
                if ($q) {
               
                  if($t != 'admin' || $t == null){ 
                          $this->template->load('Depan', 'invoice/form_input', $data);
                  }else{
                           $data['pbf'] = $this->Model_pbf->get_pbf()->result(); 
                  $query = "SELECT * 
                    FROM tbl_invoice a   LEFT JOIN master_pbf c ON a.id_pbf = c.id_pbf  ";
    
                $data['record'] = $this->db->query($query)->result();
                    $data['message'] = "Data berhasil ditambah";
                    $this->template->load('template', 'invoice/lihat_data', $data);
                  }
                 
                } else {
                if($t != 'admin' || $t == null){ 
                          $this->template->load('Depan', 'invoice/form_input', $data);
                  }else{
                           $data['pbf'] = $this->Model_pbf->get_pbf()->result(); 
                  $query = "SELECT * 
                    FROM tbl_invoice a   LEFT JOIN master_pbf c ON a.id_pbf = c.id_pbf  ";
    
                $data['record'] = $this->db->query($query)->result();
                    $data['message'] = "Data berhasil ditambah";
                    $this->template->load('template', 'invoice/lihat_data', $data);
                  }
                }
                }
            
        
    }
    public function invoice_json()
    {
        $this->load->model('Model_invoice');
        $level             = $this->session->userdata('level');

        $requestData    = $_POST;
        $fetch            = $this->Model_invoice->fetch_data_obat($_POST['search']['value'], $_POST['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

        $totalData        = $fetch['totalData'];
        $totalFiltered    = $fetch['totalFiltered'];
        $query            = $fetch['query'];

        $data    = array();
        $no = 1;
        foreach ($query->result_array() as $row) {

           
            $nestedData = array();
                        $nestedData[]    = $no++;

            $nestedData[]    = $row['tgl_pesanan'];
         $nestedData[]    = $row['no_faktur'];
                  $nestedData[]    = $row['kode_pesanan'];

        $id = $row['id_invoice'];
          $nestedData[]    = $row['nama_pbf'];
           $nestedData[]    = rupiah($row['nominal']);
          $nestedData[]    = $row['tgl_jatuhtempo'];
          if ($level == 'admin' or $level == 'keuangan') {
                $nestedData[]    = "<a  class='btn btn-success  edit btn-sm' onclick='showDataObat($id)' data-target='#myModal' href='#modal-body' data-toggle='modal' ><i class='fa fa-edit'></i></a> | <a class='btn btn-danger btn-sm'  href='" . site_url('/Invoice/delete/' .  $id) . "' id='HapusTransaksi'><i class='fa fa-trash'></i></a>";
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

    function edit_ajax(){
          // proses departemen
          $id         =   $this->input->post('id');
          $nama_obat       =   $this->input->post('nama_obat');
          $harga       =   $this->input->post('harga');
          $kategori       =   $this->input->post('kategori');
          $pbf       =   $this->input->post('pbf');
          $date = date('Y-m-d H:i:s');
          $satuan       =   $this->input->post('satuan');

          $data       = array(
              'nama_obat' => $nama_obat,
              'harga' => $harga,
              'satuan' => $satuan,
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
          
            $date = date('Y-m-d H:i:s');
            $tgl_pesanan       =   $this->input->post('tgl_pesanan');
                $pbf       =   $this->input->post('pbf');
                $no_faktur       =   $this->input->post('no_faktur');
                $id = $this->input->post('id_invoice');
                $nominal       =   $this->input->post('nominal');
                $interval       =   $this->input->post('jatuh_tempo');
                $jatuh_tempo = date('Y-m-d', strtotime($tgl_pesanan. ' + '.$interval.' days'));
                

           $data       = array(
                    'tgl_pesanan' => $tgl_pesanan,
                    'tgl_jatuhtempo' => $jatuh_tempo,
                     'no_faktur' => $no_faktur, 
                    'id_pbf' => $pbf,
                    'nominal' => $nominal 
                 
                );
                
          
           if($this->Model_invoice->edit($data, $id)){
               echo json_encode(array('success'=> 'TRUE'
               ,'data'=>$data));
           }else{
            echo json_encode(array('success'=> 'FALSE'
            ,'data'=>$data));
           }
           
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
         $q = $this->Model_invoice->delete($id);
        if ($q) {
            echo json_encode(array('success' => $id));
        } else {
            echo json_encode(array('success' => $id));
        }
    }
}