<?php

use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;

class Authentication extends RestController
{
    public function __construct()
    {
        parent::__construct();

        // Load the output model
        $this->load->model('M_Nasabah', 'nasabah');
    }

    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        // Validate the post data
        $output = $this->nasabah->user_login($this->input->post('username'), $this->input->post('password'));
        if (!empty($output)) {
            $qr = base_url('assets/qrcode/') . $output->qr_code;
            // Check if any output exists with the given credentials
            // $params['returnType'] = 'single';
            // $params['conditions'] = array(
            //     'nama_nasabah' => $outputname,
            //     'password' => md5($password),
            //     'status' => 0
            // );
            // $output = $this->nasabah->getRows($params);
            $key = "example_key";
            $data = array(
                'id_nasabah' => $output->id_nasabah,
                'nama_nasabah' => $output->nama_nasabah,
                'alamat' => $output->alamat,
                'tanggal_lahir' => $output->tanggal_lahir,
                'tempat_lahir' => $output->tempat_lahir,
                'id_wilayah' => $output->id_wilayah,
                'no_hp' => $output->no_hp,
                'total_tabungan' => $output->total_tabungan,
                'create_at' => $output->create_at,
                'update_at' => $output->update_at,
                'data_delete' => $output->data_delete,
                'status' => $output->status,
                'update_at' => $output->update_at,
                'qr_code' => $qr

            );
            // $data['id_nasabah'] = $output->id_nasabah;
            // $data['nama_nasabah'] = $output->nama_nasabah;
            // $data['alamat'] = $output->alamat;
            // $data['tanggal_lahir'] = $output->tanggal_lahir;
            // $data['tempat_lahir'] = $output->tempat_lahir;
            // $data['id_wilayah'] = $output->id_wilayah;
            // $data['no_hp'] = $output->no_hp;
            // $data['total_tabungan'] = $output->total_tabungan;
            // $data['create_at'] = $output->create_at;
            // $data['update_at'] = $output->update_at;
            // $data['data_delete'] = $output->data_delete;
            $data['status'] = $output->status;
            $user_token =  JWT::encode($data, $key);
            // $this->set_response(json_encode($user_token, RestController::HTTP_OK));
            // print_r($this->authorization_token->outputData());
            // exit;
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => [
                    'id_nasabah' => $output->id_nasabah,
                    'id_wilayah' => $output->id_wilayah,
                    'nama_nasabah' => $output->nama_nasabah,
                    'token'       => $user_token
                ],
                'message' => 'User login successful.',


            ], RestController::HTTP_OK);
        } else {
            // Set the response and exit
            //BAD_REQUEST (400) being the HTTP response code
            $this->response("Wrong name or password.", RestController::HTTP_BAD_REQUEST);
        }
    }
}
