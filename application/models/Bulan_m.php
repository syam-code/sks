<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bulan_m extends CI_Model
{
    function get_all($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bulan');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
