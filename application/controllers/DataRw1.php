<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataRw1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_nasabah_model', 'nasabah');
        $this->load->library('datatables');
    }
    public function index()
    {

        $this->template->load('layout/template', 'pages/admin/data_rw1');
    }

    public function datarw4()
    {
        $data = $this->Data_nasabah_model->get_rw4();

        echo json_encode($data);
    }

    public function ajax_list()
    {
        $list = $this->nasabah->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $nasabah) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $nasabah->nama_nasabah;
            $row[] = $nasabah->alamat;
            $row[] = $nasabah->tanggal_lahir;
            $row[] = $nasabah->tempat_lahir;
            $row[] = $nasabah->nama_wilayah;
            $row[] = $nasabah->no_hp;
            $row[] = $nasabah->total_tabungan;
            $row[] = '<button type="button" class="btn btn-warning" onclick="editFunction(' . $nasabah->id_nasabah . ')">Edit</button>
            <button  type="button" onclick="deleteFunction(' . $nasabah->id_nasabah . ')" class="btn btn-danger">Delete</button>';


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->nasabah->count_all(),
            "recordsFiltered" => $this->nasabah->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_nasabah($id)
    {
        $data = $this->nasabah->get_by_id_nasabah($id);

        echo json_encode($data);
    }

    public function tambah_nasabah()
    {
        $data = array(
            'nama_nasabah'     => $this->input->post('nama_nasabah'),
            'alamat'           => $this->input->post('alamat'),
            'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            'tempat_lahir'     => $this->input->post('tempat_lahir'),
            'id_wilayah'       => $this->input->post('id_wilayah'),
            'no_hp'            => $this->input->post('no_hp'),
            'password'         => '1234',

        );
        $this->nasabah->add_nasabah($data);
        redirect(site_url('datarw1/'));
    }

    public function edit_nasabah()
    {

        $data = array(
            'nama_nasabah'     => $this->input->post('nama_nasabah'),
            'alamat'           => $this->input->post('alamat'),
            'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            'tempat_lahir'     => $this->input->post('tempat_lahir'),
            'id_wilayah'       => $this->input->post('id_wilayah'),
            'no_hp'            => $this->input->post('no_hp'),

        );
        $this->nasabah->update_nasabah(array('id_nasabah' => $this->input->post('id_nasabah')), $data);
        echo json_encode(array("status" => TRUE));
        redirect(site_url('datarw1/'));
    }

    public function hapus_nasabah($id)
    {
        $cek_flag = $this->db->query("SELECT data_delete, id_nasabah FROM nasabah WHERE id_nasabah = '" . $id . "'")->row();

        if ($cek_flag->data_delete == 'N') {
            $su = "Y";
        } else {
            $su = "N";
        }

        $data = array(
            'data_delete' => $su
        );

        $this->nasabah->update_nasabah(array('id_nasabah' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }
}
