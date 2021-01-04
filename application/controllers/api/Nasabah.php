<?php

use chriskacerguis\RestServer\RestController;

class Nasabah extends RestController
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Nasabah', 'nasabah');
    }


    public function index_post()
    {
        $id = $this->input->post('id_nasabah');
        $response = $this->nasabah->nasabah($id);
        $this->response($response);
    }

    public function tabungan_post()
    {
        $id = $this->input->post('id_nasabah');
        $response = $this->nasabah->tabungan($id);
        //tampilkan response
        $this->response($response);
    }
}
