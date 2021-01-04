<?php
class Transaksi_model extends CI_Model
{

    var $table = 'view_transaksi';
    var $column_order = array(null, 'kode_transaksi', 'nama_nasabah', 'tanggal_transaksi', 'jenis_sampah', 'berat_sampah', 'total_harga'); //set column field database for datatable orderable
    var $column_search = array('kode_transaksi', 'nama_nasabah', 'tanggal_transaksi', 'jenis_sampah', 'berat_sampah', 'total_harga'); //set column field database for datatable searchable 
    var $order = array('id_transaksi' => 'asc'); // default order 

    public function _get_datatables_query()
    {
        $cek = $this->db->from($this->table);
        print_r($cek);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function transaksi_all()
    {
        $data = $this->db->get('view_transaksi');
        return $data->result();
    }

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

        $this->db->where('id_nasabah', $id_nasabah);
        $get_data = $this->db->get('view_transaksi');
        $response['status'] = 200;
        $response['error'] = false;
        $response['person'] = $get_data->result();
        return  $response;
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
