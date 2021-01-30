<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events_m extends CI_Model
{
    function get_all($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_events');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function fetch_all_event()
    {
        $this->db->order_by('id');
        return $this->db->get('tb_events');
    }

    function insert_event($data)
    {
        $this->db->insert('tb_events', $data);
    }

    function update_event($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_events', $data);
    }

    function delete_event($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_events');
    }
}
