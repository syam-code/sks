<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_m');
	}

	function index()
	{
		$data['title'] = 'Calendar Events';
		$this->load->view('events/index', $data);
	}

	function load()
	{
		$event_data = $this->events_m->fetch_all_event();
		foreach ($event_data->result_array() as $row) {
			$data[] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'start' => $row['start_event'],
				'end' => $row['end_event']
			);
		}
		echo json_encode($data);
	}

	function insert()
	{
		if ($this->input->post('title')) {
			$data = array(
				'title'  => $this->input->post('title'),
				'start_event' => $this->input->post('start'),
				'end_event' => $this->input->post('end')
			);
			$this->events_m->insert_event($data);
		}
	}

	function update()
	{
		if ($this->input->post('id')) {
			$data = array(
				'title'   => $this->input->post('title'),
				'start_event' => $this->input->post('start'),
				'end_event'  => $this->input->post('end')
			);

			$this->events_m->update_event($data, $this->input->post('id'));
		}
	}

	function delete()
	{
		if ($this->input->post('id')) {
			$this->events_m->delete_event($this->input->post('id'));
		}
	}
}
