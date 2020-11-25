<?php



class Nasabah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('restclient');
    }

    public function index()
    {
        $post_data = array(
            'id_nasabah' => '',
        );

        $getdata = $this->restclient->get_data('POST', 'nasabah', $post_data);
        echo json_encode($getdata);
    }
}
