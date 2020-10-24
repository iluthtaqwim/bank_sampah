<?php
class Transaksi_model extends CI_Model
{

    public function get_data_nasabah($id_nasabah = null)
    {
        $this->db->select('*');
        $this->db->from('view_nasabah');
        $this->db->where('id_nasabah', $id_nasabah);
        $get_data = $this->db->get();
        return $get_data->result()[0];
    }
}
