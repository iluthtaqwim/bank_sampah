<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restclient
{
  var $API = "http://localhost/bank_sampah/api/";
  function __construct()
  {
    $this->CI = &get_instance();
    $this->CI->load->database();
  }

  // function get_token()
  // {
  // 	$post_data = array(
  // 		'act' 		=> 'GetToken',
  // 		'username' 	=> $this->user,
  // 		'password' 	=> $this->pass,
  // 	);

  //   $header = array(
  //     'Accept: */*',
  //     'Accept-Encoding: gzip, deflate',
  //     'Content-Type: application/json',
  //     'cache-control: no-cache'
  //   );


  //   $ch = curl_init();

  //   curl_setopt($ch, CURLOPT_URL,$this->API);
  //   curl_setopt($ch, CURLOPT_POST, 1);
  //   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  //   curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($post_data));
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  //   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  //   $server_output = curl_exec($ch);
  //   $err = curl_error($ch);
  //   $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  //   curl_close ($ch);

  //   if ($server_output) {
  //     $res = json_decode($server_output, true);
  //     return $res;
  //   } else {
  //   	$erres = array(
  //   		'error_code' => 99,
  //   		'error_desc' => $err,
  //   		'data' => array(),
  //   	);
  //     return json_decode($erres, true);
  //   }
  // }

  function get_data($method, $endpoint, $post_data)
  {

    $header = array(
      "x-api-key: CODEX@123",
      "Authorization: Basic aWx1dGg6aWx1dGg="
    );


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->API . $endpoint);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1,);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $server_output = curl_exec($ch);
    $err = curl_error($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($server_output) {
      $res = json_decode($server_output, true);
      return $res;
    } else {
      $erres = array(
        'error_code' => 99,
        'error_desc' => $err,
        'data' => array(),
      );
      return json_decode($erres, true);
    }
  }
}
