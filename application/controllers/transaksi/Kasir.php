<?php
class Kasir extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kasir');
		$this->load->model('Model_pbf');
		$this->load->model('Model_obat');

		chek_session();
	}
	function index()
	{
		$ym = date('Ymd');
		$data['kasir'] = $this->session->userdata('username');
		$max =  $this->Model_kasir->get_max()->result_array();

		$crot = $max[0]['id'] + 1;

		$no_transaksi = $crot . "/" . $this->session->userdata('id') . "/" . $ym;
		$data['no_transaksi'] = $no_transaksi;
		$this->template->load('template', 'kasir/transaksi', $data);
	}
	public function post()
	{

		if ($_POST) {
			if (!empty($_POST['kode_menu'])) {



				$nomor_nota 	= $this->input->post('nomor_nota');
				$tanggal		= $this->input->post('tanggal');
				$id_kasir		= $this->input->post('id_kasir');
				$bayar			= $this->input->post('cash');
				$grand_total	= $this->input->post('grand_total');
				$catatan		=  $this->input->post('catatan');

				if ($bayar < $grand_total) {
					$this->query_error("Cash Kurang");
				} else {

					$master =  $this->Model_kasir->insert_master($nomor_nota, $tanggal, $id_kasir, $bayar, $grand_total, $catatan, $this->session->userdata('id'));
					if ($master) {
						$id_master 	= $this->Model_kasir->get_id($nomor_nota)->row()->id;
						$inserted	= 0;



						$no_array	= 0;
						foreach ($_POST['kode_menu'] as $k) {
							if (!empty($k)) {
								$kode_menu 		= $_POST['kode_menu'][$no_array];
								$jumlah_beli 	= $_POST['jumlah_beli'][$no_array];
								$harga_satuan 	= $_POST['harga_satuan'][$no_array];
								$sub_total 		= $_POST['sub_total'][$no_array];
								$insert_detail	= $this->Model_kasir->insert_detail($id_master, $kode_menu, $jumlah_beli, $harga_satuan, $sub_total);
								if ($insert_detail) {

									$inserted++;
								}
							}

							$no_array++;
						}

						if ($inserted > 0) {
							echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
						} else {
							$this->query_error($this->db->error());
						}
					} else {
						$this->query_error("mas" . $master . json_encode($this->db->error()));
					}
				}
			} else {
				$this->query_error("Harap masukan minimal 1 kode menu !");
			}
		} else {

			$this->query_error("Harap masukan minimal 1 kode menu !");
		}
	}

	public function transaksi_cetak()
	{
		$nomor_nota 	= $this->input->get('nomor_nota');
		$tanggal		= $this->input->get('tanggal');
		$id_kasir		= $this->input->get('id_kasir');
		$id_pelanggan	= $this->input->get('id_pelanggan');
		$cash			= $this->input->get('cash');
		$catatan		= $this->input->get('catatan');
		$grand_total	= $this->input->get('grand_total');
		if ($cash < $grand_total) {
			$this->query_error("Cash Kurang");
		} else {

			$kasir = $this->session->userdata('username');



			$this->load->library('Cfpdf');
			$pdf = new FPDF('P', 'mm', 'A5');
			$pdf->AddPage();
			$pdf->SetFont('Arial', '', 10);

			$pdf->Cell(25, 4, 'Nota', 0, 0, 'L');
			$pdf->Cell(85, 4, $nomor_nota, 0, 0, 'L');
			$pdf->Ln();
			$pdf->Cell(25, 4, 'Tanggal', 0, 0, 'L');
			$pdf->Cell(85, 4, date('d-M-Y H:i:s', strtotime($tanggal)), 0, 0, 'L');
			$pdf->Ln();
			$pdf->Cell(25, 4, 'Kasir', 0, 0, 'L');
			$pdf->Cell(85, 4, $kasir, 0, 0, 'L');
			$pdf->Ln();

			$pdf->Ln();
			$pdf->Ln();

			$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(10, 5, 'Kode', 0, 0, 'L');
			$pdf->Cell(60, 5, 'Item', 0, 0, 'L');
			$pdf->Cell(25, 5, 'Harga', 0, 0, 'L');
			$pdf->Cell(15, 5, 'Qty', 0, 0, 'L');
			$pdf->Cell(25, 5, 'Subtotal', 0, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
			$pdf->Ln();

			$this->load->model('Model_obat');
			$this->load->helper('text');

			$no = 0;
			foreach ($_GET['kode_menu'] as $kd) {
				if (!empty($kd)) {
					$nama_menu = $this->Model_obat->get_one($kd)->row()->nama_obat;
					$nama_menu = character_limiter($nama_menu, 20, '..');

					$pdf->Cell(10, 5, $kd, 0, 0, 'L');
					$pdf->Cell(60, 5, $nama_menu, 0, 0, 'L');
					$pdf->Cell(25, 5, str_replace(',', '.', number_format($_GET['harga_satuan'][$no])), 0, 0, 'L');
					$pdf->Cell(15, 5, $_GET['jumlah_beli'][$no], 0, 0, 'L');
					$pdf->Cell(25, 5, str_replace(',', '.', number_format($_GET['sub_total'][$no])), 0, 0, 'L');
					$pdf->Ln();

					$no++;
				}
			}

			$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(100, 5, 'Total Bayar', 0, 0, 'R');
			$pdf->Cell(20, 5, str_replace(',', '.', number_format($grand_total)), 0, 0, 'R');
			$pdf->Ln();

			$pdf->Cell(100, 5, 'Cash', 0, 0, 'R');
			$pdf->Cell(20, 5, str_replace(',', '.', number_format($cash)), 0, 0, 'R');
			$pdf->Ln();

			$pdf->Cell(100, 5, 'Kembali', 0, 0, 'R');
			$pdf->Cell(20, 5, str_replace(',', '.', number_format(($cash - $grand_total))), 0, 0, 'R');
			$pdf->Ln();

			$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(25, 5, 'Catatan : ', 0, 0, 'L');
			$pdf->Ln();
			$pdf->Cell(130, 5, (($catatan == '') ? 'Tidak Ada' : $catatan), 0, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Cell(130, 5, "Terimakasih telah berbelanja dengan kami", 0, 0, 'C');
			echo $pdf->Output();
		}
	}
	function query_error($pesan = "Terjadi kesalahan, coba lagi !")
	{
		$json['status'] = 2;
		$json['pesan'] 	= "<div class='alert alert-danger error_validasi'>" . $pesan . "</div>";
		echo json_encode($json);
	}
	public function history_json()
	{
		$this->load->model('Model_kasir');
		$level 			= $this->session->userdata('level');

		$requestData	= $_POST;
		$fetch			= $this->Model_kasir->fetch_data_penjualan($_POST['search']['value'], $_POST['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a class='btn btn-primary' href='" . site_url('transaksi/kasir/detail_transaksi/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['id_user'];

			if ($level == 'admin' or $level == 'keuangan') {
				$nestedData[]	= "<a class='btn btn-primary'  href='" . site_url('/transaksi/kasir/edit/' . $row['id_penjualan_m']) . "' id='editTransaksi'><i class='fa fa-edit'></i></a> | <a class='btn btn-danger'  href='" . site_url('/transaksi/kasir/delete/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-trash'></i></a>";
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

	public function detail_transaksi($id_penjualan)
	{
		$this->load->model('Model_kasir');

		$dt['detail'] = $this->Model_kasir->tampil_detail($id_penjualan)->result();
		$dt['master'] = $this->Model_kasir->get_baris($id_penjualan)->row();

		$this->load->view('transaksi/transaksi_history_detail', $dt);
	}


	function riwayat_transaksi()
	{
		$data['record'] = $this->Model_kasir->tampil_data();
		$this->template->load('template', 'transaksi/transaksi_history', $data);
	}
	function riwayat_periode()
	{
		$data['record'] = $this->Model_kasir->tampil_by_date();
		$this->template->load('template', 'kasir/lihat_data', $data);
	}
	public function ajax_kode()
	{
		if ($this->input->is_ajax_request()) {
			$keyword 	= $this->input->post('keyword');


			$menu = $this->Model_obat->search($keyword);

			if ($menu->num_rows() > 0) {
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete'>";
				foreach ($menu->result() as $b) {

					$kat = $b->kategori;

					if ($kat  == "luar") {
						$harga = $b->harga +  ($b->harga * 0.3);
					} else {
						$harga = $b->harga +  ($b->harga * 0.35);
					}

					$json['datanya'] .= "
						<li>
							 
							<span hidden id='kodenya'>" . $b->id . "</span> <br />
							<span id='barangnya'>" . $b->nama_obat . "</span>
							<span id='harganya' style='display:none;'>" . bulet($harga)  . "</span>
						</li>
					";
				}
				$json['datanya'] .= "</ul>";
			} else {
				$json['status'] 	= 0;
			}

			echo json_encode($json);
		}
	}


	function satuan()
	{

		$data['record']     =  $this->Model_kasir->get_satuan()->result();
		echo json_encode($data);
	}
	function search()
	{
		if (!empty($_GET['term'])) {
			$result    =  $this->Model_kasir->search($_GET['term'])->result();
			if (count($result) > 0) {
				foreach ($result as $row) {
					$a = $row->harga + ($row->harga * 0.35);

					$arr_result[] = $row->nama_kasir . ";" . $a;
				}
			}
			echo json_encode($arr_result);
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
			// proses departemen
			$id         =   $this->input->post('id');
			$nama_kasir       =   $this->input->post('nama_kasir');
			$harga       =   $this->input->post('harga');
			$harga_beli       =   $this->input->post('harga_beli');
			$kategori       =   $this->input->post('kategori');

			$satuan       =   $this->input->post('satuan');

			$data       = array(
				'nama_kasir' => $nama,
				'harga' => $harga,
				'satuan' => $satuan,
				'produksi' => $pbf, 'created_date' => $date, 'kategori' => $kategori,
				'harga_beli' => $harga_beli
			);
			$this->Model_kasir->edit($data, $id);
			redirect('master/kasir');
		} else {
			$id =  $this->uri->segment(4);

			$data['record']     =  $this->Model_kasir->get_one($id)->result();

			$this->template->load('template', 'transaksi/transaksi_edit', $data);
		}
	}


	function delete()
	{
		$id =  $this->uri->segment(4);
		$this->Model_kasir->delete($id);
		redirect('transaksi/kasir/riwayat_transaksi');
	}
}