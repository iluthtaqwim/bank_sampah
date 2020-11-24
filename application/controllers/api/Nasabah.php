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

    public function user_get()
    {
        // testing response
        $response['status'] = 200;
        $response['error'] = false;
        $response['user']['username'] = 'erthru';
        $response['user']['email'] = 'ersaka96@gmail.com';
        $response['user']['detail']['full_name'] = 'Suprianto D';
        $response['user']['detail']['position'] = 'Developer';
        $response['user']['detail']['specialize'] = 'Android,IOS,WEB,Desktop';
        //tampilkan response
        $this->response($response);
    }
}
