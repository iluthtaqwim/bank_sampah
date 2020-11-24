<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Data_nasabah_model', 'nasabah');
        $this->load->model('Crud');
    }

    public function index()
    {
        $q = $this->db->query("SELECT * FROM list_transaksi"); //query get list transaksi berdasar uniqid

        $this->template->load('layout/template', 'pages/admin/data_transaksi', $q);
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
        $get_nasabah = $this->transaksi->get_data_nasabah($id_nasabah);

        print_r(json_encode($get_nasabah));
        exit;
    }

    function add_transaksi()
    {
        $id_jenis = $this->input->post('jenis_sampah');
        $q_harga = $this->db->query("SELECT id_jenis_sampah, harga FROM jenis_sampah WHERE id_jenis_sampah = '$id_jenis'")->row();
        print_r($q_harga);
        exit;
        $berat = $this->input->post('berat_sampah');
        $total = $berat * $q_harga;

        $data = array(
            'kode_transaksi' => $this->input->post('uniqid'),
            'id_nasabah' => $this->input->post('nama_nasabah'),
            'id_petugas' => '1',
            'id_jenis_sampah' => $id_jenis,
            'berat_sampah' => $this->input->post('berat_sampah'),
            'total_harga' => $total,
        );

        $data = $this->transaksi_model->insert_data($data);
        echo json_encode($data);
    }
}
