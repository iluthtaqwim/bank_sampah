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
        $nasabah = $this->input->post('nama_nasabah');
        $no = $this->input->post('no_hp');

        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $no . '.png'; //buat name dari qr code sesuai dengan nip

        $params['data'] = $no; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data = array(
            'nama_nasabah'     => $nasabah,
            'alamat'           => $this->input->post('alamat'),
            'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            'tempat_lahir'     => $this->input->post('tempat_lahir'),
            'id_wilayah'       => $this->input->post('id_wilayah'),
            'no_hp'            => $no,
            'password'         => md5('1234'),
            'qr_code'           => $image_name,

        );


        $this->nasabah->add_nasabah($data);
        redirect(site_url('datarw1/'));
    }

    public function edit_nasabah()
    {

        $no_lawas = $this->input->get('no_hp');
        $image_name_lawas = $no_lawas . 'png';
        $nasabah = $this->input->post('nama_nasabah');
        $no = $this->input->post('no_hp');

        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $no . '.png'; //buat name dari qr code sesuai dengan nip

        $params['data'] = $no; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        unlink(FCPATH . $config['imagedir'] . $image_name_lawas);
        $data = array(
            'nama_nasabah'     => $this->input->post('nama_nasabah'),
            'alamat'           => $this->input->post('alamat'),
            'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            'tempat_lahir'     => $this->input->post('tempat_lahir'),
            'id_wilayah'       => $this->input->post('id_wilayah'),
            'no_hp'            => $this->input->post('no_hp'),
            'qr_code'           => $image_name,
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
