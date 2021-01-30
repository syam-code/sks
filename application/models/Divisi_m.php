<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi_m extends CI_Model
{
    function get_all($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_divisi');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function insert_divisi($data)
    {
        $this->db->insert('tb_divisi', $data);
    }

    function delete_divisi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_divisi');
    }

    function update_divisi($id, $post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $data['divisi'] = $post['divisi'];
        $data['singkatan'] = $post['singkatan'];
        $data['updated_at'] = $now;
        $this->db->where('id', $id);
        $this->db->update('tb_divisi', $data);
    }
}
