<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bulan_m');
		$this->load->model('kas_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['sum_jumlah'] = $this->kas_m->total_kas();
		$this->load->view('dashboard/index', $data);
	}
}
