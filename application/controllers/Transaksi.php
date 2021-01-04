<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_nasabah_model', 'nasabah');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Crud');
    }

    public function index()
    {
        $q = $this->db->query("SELECT * FROM view_transaksi"); //query get list transaksi berdasar uniqid

        $this->template->load('layout/template', 'pages/admin/data_transaksi', $q);
    }

    public function ajax_list()
    {
        $list = $this->transaksi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $transaksi) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $transaksi->kode_transaksi;
            $row[] = $transaksi->nama_nasabah;
            $row[] = $transaksi->tanggal_transaksi;
            $row[] = $transaksi->jenis_sampah;
            $row[] = $transaksi->berat_sampah;
            $row[] = $transaksi->total_harga;
            $row[] = '<button type="button" class="btn btn-warning" onclick="editFunction(' . $transaksi->id_transaksi . ')">Edit</button>
            <button  type="button" onclick="deleteFunction(' . $transaksi->id_transaksi . ')" class="btn btn-danger">Delete</button>';


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->transaksi->count_all(),
            "recordsFiltered" => $this->transaksi->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function tambah_transaksi()
    {
        $q = $this->db->query('SELECT * FROM jenis_sampah');
        $result = $q->result();
        $nasabah = $this->nasabah->data_nasabah();
        $data = array(
            'nasabah' => $nasabah,
            'jenis'   => $result
        );


        $this->template->load('layout/template', 'pages/admin/tambah_transaksi', $data);
    }

    function get_nasabah($id_nasabah = null)
    {
        $get_nasabah = $this->nasabah->get_by_id_nasabah($id_nasabah);

        echo json_encode($get_nasabah);
    }

    function add_list_trans()
    {
        $id_jenis = $this->input->post('jenis_sampah');
        $q_harga = $this->db->query("SELECT harga FROM jenis_sampah WHERE id_jenis_sampah = '$id_jenis'")->row();
        $berat = $this->input->post('berat_sampah');

        $t = $q_harga['harga'] * $berat;
        $data_list_transaksi = array(
            'kode_transaksi' => $this->input->post('uniqid'),
            'total_list' =>  $t,
        );
        $this->transaksi->insert_list_transaksi($data_list_transaksi);
    }

    function add_transaksi()
    {
        $id_jenis = $this->input->post('jenis_sampah');
        $q_harga = $this->db->query("SELECT harga FROM jenis_sampah WHERE id_jenis_sampah = '$id_jenis'")->row();
        $berat = $this->input->post('berat_sampah');

        $t = $q_harga->harga * $berat;
        $data = array(
            'kode_transaksi' => $this->input->post('uniqid'),
            'id_nasabah' => $this->input->post('nama_nasabah'),
            'id_petugas' => '1',
            'id_jenis_sampah' => $id_jenis,
            'berat_sampah' => $this->input->post('berat_sampah'),
            'total_harga' =>  $t,
        );

        $insert_transaksi = $this->transaksi->insert_data($data);


        if ($insert_transaksi) {

            $this->nasabah->update_tabungan();
        }


        $resp = array(
            'status' => 'success'
        );

        echo json_encode($resp);
    }

    function delete_transaksi()

    {
        $id = $this->input->post('id');

        $act = $this->transaksi->delete_data($id);
        if ($act) {
            $data = array(
                'response' => '200OK',
                'id'       => $id
            );
        }

        echo json_encode($data);
    }

    function get_list()
    {
        $uid = $this->input->post('uniqid');

        $data =  $this->transaksi->transaksi_data($uid);

        // $this->template->load('layout/template', 'pages/admin/tambah_transaksi', $data);
        echo json_encode($data);
    }
}
