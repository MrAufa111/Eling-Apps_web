<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $api_url = 'https://1f22-103-165-227-178.ngrok-free.app/login';
        $data = array(
            'username' => $username,
            'password' => $password
        );

        $response = $this->curl->simple_post($api_url, $data);

        if ($response === FALSE) {
            // Menangani kesalahan saat pemanggilan API
            return NULL;
        }

        // Dekode respons JSON
        $user = json_decode($response);

        if ($user === NULL) {
            // Menangani kesalahan dekode JSON
            return NULL;
        }

        return $user;
    }
}
