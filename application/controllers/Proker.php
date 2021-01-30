<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker extends CI_Controller
{

	public function internal()
	{
		$data['title'] = 'Program Kerja Internal';
		$this->load->view('proker/index', $data);
	}

	public function external()
	{
		$data['title'] = 'Program Kerja External';
		$this->load->view('proker/external', $data);
	}
}
