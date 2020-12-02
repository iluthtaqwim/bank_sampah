<?php
class Transaksi_model extends CI_Model
{

    public function transaksi_data($uid)
    {

        $this->db->select('*');
        $this->db->from('view_transaksi');
        $this->db->where('kode_transaksi', $uid);
        $data =  $this->db->get();
        return $data->result();
    }

    public function get_data_nasabah($id_nasabah = null)
    {
        $this->db->select('*');
        $this->db->from('view_nasabah');
        $this->db->where('id_nasabah', $id_nasabah);
        $get_data = $this->db->get();
        return $get_data->result()[0];
    }
    public function insert_list_transaksi($data_list_transaksi)
    {
        $this->db->insert('list_transaksi', $data_list_transaksi);
        $this->db->where_not_in('list_transaksi', $data_list_transaksi['kode_transaksi']);
        return $this->db->insert_id();
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
        $delete = $this->db->query("DELETE FROM transaksi WHERE id_transaksi = '$id'");
        return $delete;
    }
}
