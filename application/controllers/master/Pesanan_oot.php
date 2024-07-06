<?php
class Pesanan_oot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pesanan_oot');
        $this->load->model('Model_pbf');
        $this->load->model('Model_obat');

        chek_session();
    }

    function add()
    {
        $m = date('m');
        $y = date('y');
        $get = $this->Model_pesanan_oot->get_max()->result();
        
        if($get[0]->id != null){

             $new = $get[0]->id + 1;
             $a = $new . "/SP/OOT/AI/" . $m . "/" . $y;
        }else{
             $new =   1;
             $a = $new . "/SP/OOT/AI/" . $m . "/" . $y;
        }
        $pbf = $this->Model_pbf->get_pbf()->result();


        $data            = array('pesanan' => $get, 'kode_pesanan' => $a, 'pbf' => $pbf);
        $data['record'] = $this->Model_pesanan_oot->tampil_data();
        $this->template->load('template', 'pesanan_oot/add_pesanan', $data);
    }
    public function detail_transaksi()
    {
        $this->load->model('Model_pesanan_oot');
        $id_penjualan = $_GET['term'];
        $dt['detail'] = $this->Model_pesanan_oot->cetak($id_penjualan)->result();

        $this->load->view('pesanan_oot/pesanan_history_detail', $dt);
    }

    function index()
    {

        $data['record'] = $this->Model_pesanan_oot->tampil_data();
        $this->template->load('template', 'pesanan_oot/lihat_data', $data);
    }

    function report()
    {
        if (isset($_POST['dari'])) {
            $data['record'] = $this->Model_pesanan_oot->get_laporan($_POST['dari'], $_POST['sampai'])->result();
            $this->template->load('template', 'laporan/transaksi', $data);
        } else {
            $this->template->load('template', 'laporan/transaksi');
        }
    }
    public function ajax_kode()
    {
        if ($this->input->is_ajax_request()) {
            $keyword     = $this->input->post('keyword');


            $menu = $this->Model_obat->search($keyword);

            if ($menu->num_rows() > 0) {
                $json['status']     = 1;
                $json['datanya']     = "<ul id='daftar-autocomplete'>";
                foreach ($menu->result() as $b) {

                    $kat = $b->kategori;


                    $harga = $b->harga;


                    $json['datanya'] .= "
						<li>
                        <span hidden id='kodenya'>" . $b->id . "</span>

  							<span id='barangnya'>" . $b->nama_obat . "</span>
							<span id='harganya' style='display:none;'>" . $harga . "</span>
						</li>
					";
                }
                $json['datanya'] .= "</ul>";
            } else {
                $json['status']     = 0;
            }

            echo json_encode($json);
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
    function post()
    {
        if ($_POST) {
            // proses departemen
            $now = date("Y-m-d H:i:s");
            $nama       =   $this->input->post('obat');
            $jumlah       =   $this->input->post('jumlah');
            $kode_pesanan       =   $this->input->post('kode_pesanan');
            $kepada       =   $this->input->post('kepada');
            $pemesan       =  $this->input->post('pemesan');
            $est_harga       =  $this->input->post('est_harga');

            $date       =  $this->input->post('tanggal');
            $co = count($nama) - 1;
            for ($i = 0; $i < $co; $i++) {
                if ($jumlah[$i] == null) {
                    $jum = 1;
                } else {
                    $jum = $jumlah[$i];
                }
                $data       = array(
                    'nama_barang' => $nama[$i],
                    'est_harga' => $est_harga[$i],
                    'kode_pesanan' => $kode_pesanan,
                    'jumlah' => $jum,
                    'pemesan' => $pemesan,
                    'pic_tertuju' => $kepada, 'created_date' => $date,
                     'edit_date' => $date

                );
                $q =  $this->Model_pesanan_oot->crot($data);
            }

            if ($q) {
                echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
            } else {
                echo  json_encode($this->db->error());
            }
        } else {
            echo "a";
        }
    }

    function satuan()
    {

        $data['record']     =  $this->Model_pesanan_oot->get_satuan()->result();
        echo json_encode($data);
    }


    function edit()
    {
        if ($_POST) {
            // proses departemen
            $now = date("Y-m-d H:i:s");
            $id       =   $this->input->post('id_pesanan');
            $kode_pesanan       =   $this->input->post('kode_pesanan');

            $nama       =   $this->input->post('nama_barang');
            $jumlah       =   $this->input->post('jumlah');

            $data       = array(
                'nama_barang' => $nama,
                'jumlah' => $jumlah,
                'edit_date' =>   $now
            );
            $q =  $this->Model_pesanan_oot->edit($data, $id);

            if ($q == TRUE) {
                echo json_encode(array('success' => $q));
            } else {
                echo json_encode(array('success' => $q));
            }
        } else {
            $id =  $_GET['term'];
            $data['pbf'] = $this->Model_pbf->get_pbf()->result();
            $data['aa']     =  $this->Model_pesanan_oot->cetak($id)->result();
            $this->template->load('template', 'pesanan_oot/edit_pesanan', $data);
        }
    }
    function post_ajax()
    {


        // proses departemen
        $now = date("Y-m-d H:i:s");
        $nama_barang       =   $this->input->post('nama_barang');
        $jumlah       =   $this->input->post('jumlah');

        $tertuju       =   $this->input->post('tertuju');
        $kode_pesanan       =   $this->input->post('kode_pesanan');

        $data       = array(
            'nama_barang' => $nama_barang,
            'jumlah' => $jumlah,
            'pic_tertuju' => $tertuju,
            'kode_pesanan' => $kode_pesanan,
            'pemesan' =>  $this->session->userdata('username'),
            'edit_date' => $now
        );
        $q = $this->Model_pesanan_oot->crot($data);
        if ($q) {
            echo json_encode(array('success' => 'true'));
        } else {
            echo json_encode(array('success' => $this->db->_error()));
        }
    }
    function detail()
    {
        $id =  $_POST['id'];

        $data['record']     =  $this->Model_pesanan_oot->get_one($id)->result();
        $this->load->view('pesanan_oot/detail', $data);
    }

    function delete()
    {
        $id =  $_GET['kode'];
        $this->Model_pesanan_oot->delete($id);
        redirect('master/Pesanan');
    }
    function delete_one()
    {
        $id =  $_GET['id'];
        $kode =  $_GET['kode'];

        $this->Model_pesanan_oot->delete_one($id);
        redirect('master/pesanan_oot/edit/?term=' . $kode);
    }
}