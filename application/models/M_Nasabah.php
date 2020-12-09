<?php

class M_Nasabah extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->userTbl = 'nasabah';
    }

    public function empty_response()
    {
        $response['status'] = 502;
        $response['error'] = true;
        $response['message'] = 'Field tidak boleh kosong';
        return $response;
    }

    public function user_login($username, $password)
    {
        $this->db->where('nama_nasabah', $username);
        $q = $this->db->get($this->userTbl);


        if ($q->num_rows()) {
            $user_pass = $q->row('password');
            if (md5($password) === $user_pass) {
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }

    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->userTbl);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if (array_key_exists("id", $params)) {
            $this->db->where('id', $params['id']);
            $query = $this->db->get();
            $result = $query->row();
        } else {
            //set start and limit
            if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit']);
            }

            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
                $result = $this->db->count_all_results();
            } elseif (array_key_exists("returnType", $params) && $params['returnType'] == 'single') {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->row_array() : false;
            } else {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : false;
            }
        }

        //return fetched data
        return $result;
    }

    // mengambil semua data person
    public function nasabah($id = false)
    {

        if ($id == false) {
            $all = $this->db->get("nasabah")->result();
            $response['status'] = 200;
            $response['error'] = false;
            $response['person'] = $all;
            return $response;
        } else {
            $nasabah = $this->db->where("id_nasabah", $id);
            $nasabah = $this->db->get("nasabah")->result();
            $response['status'] = 200;
            $response['error'] = false;
            $response['person'] = $nasabah;
            return $response;
        }
    }
}
