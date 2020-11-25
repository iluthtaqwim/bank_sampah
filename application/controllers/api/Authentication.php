<?php

use chriskacerguis\RestServer\RestController;

class Authentication extends RestController
{
    public function __construct()
    {
        parent::__construct();

        // Load the user model
        $this->load->model('M_Nasabah', 'nasabah');
    }

    public function login_post()
    {
        // Get the post data
        $username = $this->post('username');
        $password = $this->post('password');

        // Validate the post data
        if (!empty($username) && !empty($password)) {

            // Check if any user exists with the given credentials
            $params['returnType'] = 'single';
            $params['conditions'] = array(
                'nama_nasabah' => $username,
                'password' => md5($password),
                'status' => 0
            );
            $user = $this->nasabah->getRows($params);

            if ($user) {
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], RestController::HTTP_OK);
            } else {
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response("Wrong name or password.", RestController::HTTP_BAD_REQUEST);
            }
        } else {
            // Set the response and exit
            $this->response("Provide name and password.", RestController::HTTP_BAD_REQUEST);
        }
    }
}
