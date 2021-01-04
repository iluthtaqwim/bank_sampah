<?php

use chriskacerguis\RestServer\RestController;

class Transaksi extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index_get()
    {
        $data = $this->transaksi->transaksi_all();
        return $this->response($data);
    }

    public function transaksi_nasabah_post()
    {
        $id = $this->input->post('id_nasabah');
        $response = $this->transaksi->get_data_nasabah($id);
        return $this->response($response);
    }
}
