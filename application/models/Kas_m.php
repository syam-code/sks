<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_m extends CI_Model
{
    function get_all($id = null)
    {
        $this->db->select('tb_kas.*, tb_bulan.bulan as bulan_name');
        $this->db->from('tb_kas');
        $this->db->join('tb_bulan', 'tb_bulan.id = tb_kas.bulan_id');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function insert_kas($data)
    {
        $this->db->insert('tb_kas', $data);
    }

    function delete_kas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kas');
    }

    function update_kas($id, $post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $data['user_id'] = $post['user'];
        if (!empty($post['bulan'])) {
            $data['bulan_id'] = $post['bulan'];
        }
        $data['tahun'] = $post['tahun'];
        $data['nominal'] = $post['nominal'];
        $data['updated_at'] = $now;
        $this->db->where('id', $id);
        $this->db->update('tb_kas', $data);
    }

    function total_kas()
    {
        $this->db->select_sum('nominal', 'jumlah');
        $this->db->from('tb_kas');
        return $this->db->get()->row();
    }
}
