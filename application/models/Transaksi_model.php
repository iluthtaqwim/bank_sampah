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

    public function insert_data($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }

    public function update_data($where, $data)
    {
        $this->db->update('list_transaksi', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_data($id)
    {
        $delete = $this->db->query("DELETE FROM list_transaksi WHERE id_list_transaksi = '$id'");
        return $delete;
    }
}
