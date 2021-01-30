<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('divisi_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Kelola Divisi';
		$data['row'] = $this->divisi_m->get_all();
		$this->load->view('organisasi/index', $data);
	}

	function insert()
	{
		$data = array(
			'divisi'  => $this->input->post('divisi'),
			'singkatan'  => $this->input->post('singkatan')
		);
		$this->divisi_m->insert_divisi($data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', '
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
               	Divisi berhasil ditambahkan.
                </div>
            </div>
        ');
			redirect('organisasi');
		}
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->divisi_m->delete_divisi($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', '
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
               	Divisi berhasil di delete.
                </div>
            </div>
        ');
			redirect('organisasi');
		}
	}

	function update()
	{
		$id = $this->input->post('id');
		$post = $this->input->post(null, true);
		$this->divisi_m->update_divisi($id, $post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', '
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
               	Divisi berhasil di update.
                </div>
            </div>
        ');
			redirect('organisasi');
		}
	}
}
