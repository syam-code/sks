<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bulan_m');
		$this->load->model('kas_m');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data['title'] = 'Uang Kas';
		$data['bulan'] = $this->bulan_m->get_all();
		$data['row'] = $this->kas_m->get_all();
		$data['sum_jumlah'] = $this->kas_m->total_kas();
		$this->load->view('kas/index', $data);
	}

	function insert()
	{
		$data = array(
			'user_id'  => $this->input->post('user'),
			'bulan_id' => $this->input->post('bulan'),
			'tahun' => $this->input->post('tahun'),
			'nominal' => $this->input->post('nominal')
		);
		$this->kas_m->insert_kas($data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', '
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
               	Kas berhasil ditambahkan.
                </div>
            </div>
        ');
			redirect('kas');
		}
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->kas_m->delete_kas($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', '
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
               	Kas berhasil di delete.
                </div>
            </div>
        ');
			redirect('kas');
		}
	}

	function update()
	{
		$id = $this->input->post('id');
		$post = $this->input->post(null, true);
		$this->kas_m->update_kas($id, $post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', '
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
               	Kas berhasil di update.
                </div>
            </div>
        ');
			redirect('kas');
		}
	}

	function download_excel()
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date('y-m-d');

		$data = $this->kas_m->get_all()->result();

		include_once APPPATH . '/third_party/xlsxwriter.class.php';
		ini_set('display_errors', 0);
		ini_set('log_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE);
		$filename = "rekap_kas_" . $now . ".xlsx";
		header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		$styles = array('widths' => [5, 30, 20, 20, 20, 20, 20], 'font' => 'Arial', 'font-size' => 12, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'center', 'border' => 'left,right,top,bottom');
		$styles2 = array(['font' => 'Arial', 'font-size' => 10, 'halign' => 'left', 'border' => 'left,right,top,bottom'], ['halign' => 'left'], ['halign' => 'center'], ['halign' => 'center'], ['halign' => 'center'], ['halign' => 'center'], ['halign' => 'center']);

		$header = array(
			'No' => 'integer',
			'Nama' => 'string',
			'Bulan' => 'string',
			'Tahun' => 'integer',
			'Nominal' => 'integer',
			'Created' => 'string',
			'Updated' => 'string'
		);

		$writer = new XLSXWriter();
		$writer->setAuthor('Sistem Monitoring HIMATIF');

		$writer->writeSheetHeader('Sheet1', $header, $styles);
		$no = 1;
		foreach ($data as $row) {
			$writer->writeSheetRow('Sheet1', [$no, $row->user_id, $row->bulan_name, $row->tahun, $row->nominal, $row->created_at, $row->updated_at], $styles2);
			$no++;
		}
		$writer->writeToStdOut();
	}

	function download_pdf()
	{
		$this->load->library('mypdf');
		$view = 'kas/download_pdf';
		$data['row'] = $this->kas_m->get_all();
		$data['sum_jumlah'] = $this->kas_m->total_kas();
		$filename = 'laporan_kas_' .  date('Y-m-d H:m:s');
		$paper = 'A4';
		$orientation = 'potrait';
		$this->mypdf->generate($view, $data,  $filename, $paper, $orientation);
	}
}
