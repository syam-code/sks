<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bph extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Badan Pengurus Harian';
		$this->load->view('bph/index', $data);
	}
}
