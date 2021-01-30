<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('auth/login', $data);
	}

	public function register()
	{
		$data['title'] = 'Register';
		$this->load->view('auth/register', $data);
	}
}
