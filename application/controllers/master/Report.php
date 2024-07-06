<?php
date_default_timezone_set('Asia/Jakarta');
class Report extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_pesanan');
        $this->load->model('Model_pbf');
        $this->load->model('Model_obat');
date_default_timezone_set('Asia/Jakarta');
        chek_session();
    }
      
    function index()
    {

        $data['record'] = $this->Model_pesanan->get_laporan($_GET['dari'], $_GET['sampai'])->result();
        $data['detail'] = $this->Model_pesanan->satu($_GET['dari'], $_GET['sampai'])->result();

        $this->load->view('laporan/print',$data);
    }
    
     function report_obat()
    {

           

        if (!empty($_GET['dari']) && !empty($_GET['sampai']) && empty($_GET['obat'])) {
            $data['record'] = $this->Model_pesanan->get_lap_obat($_GET['dari'], $_GET['sampai'])->result();
             $this->load->view('laporan/obat_excel',$data);
        } else if (!empty($_GET['dari'])  &&  !empty($_GET['sampai'])  &&  !empty($_GET['obat'])) {
            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
            $obat = $_GET['obat'];
            $query = "SELECT created_date, count(nama_barang) as pesanan, sum(jumlah) as total_jumlah, 
              nama_barang, pic_tertuju as pbf FROM `tbl_pesanan` WHERE date(created_date) between '$dari' AND '$sampai' AND nama_barang LIKE '%$obat%' group by nama_barang, pic_tertuju  ORDER BY created_date DESC";

            $data['record'] = $this->db->query($query)->result();

        $this->load->view('laporan/obat_excel',$data);
        } else if (empty($_GET['dari']) && empty($_GET['sampai']) && empty($_GET['obat'])) {
            $data['pbf'] = $this->Model_pbf->get_pbf()->result();

        $this->load->view('laporan/obat_excel',$data);
        }
    }

    function get()
    {
        if(isset($_POST['dari'])){
            $data['record'] = $this->Model_pesanan->get_laporan($_POST['dari'], $_POST['sampai'])->result();
            $this->template->load('template','laporan/transaksi',$data);

        }else{
         $this->load->view('template','laporan/transaksi');
        }
    } 
    
    function one()
    {
        if(isset($_GET['no'])){
            $kode = $_GET['no'];
            $data['record'] = $this->Model_pesanan->get_laporan_by_kode($kode)->result();

            $data['detail'] = $this->Model_pesanan->by_kode($kode)->result();
            $this->load->view('laporan/print_kode',$data);

        }else{
         $this->template->load('template','laporan/transaksi');
        }
    }
}