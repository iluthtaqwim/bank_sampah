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
        $this->template->load('layout/template', 'pages/admin/data_transaksi');
    }

    function tambah_transaksi()
    {
        $nasabah = $this->nasabah->data_nasabah();
        $data = array(
            'nasabah' => $nasabah
        );


        $this->template->load('layout/template', 'pages/admin/tambah_transaksi', $data);
    }

    function get_nasabah($id_nasabah = null)
    {
        $get_nasabah = $this->transaksi->get_data_nasabah($id_nasabah);

        print_r(json_encode($get_nasabah));
        exit;
    }
}
