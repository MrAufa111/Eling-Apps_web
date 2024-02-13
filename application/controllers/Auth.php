<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['page'] = 'auth/login';
            $data['title'] = 'Login';
            $this->load->view('auth/templates/index', $data);
        } else {
            $this->_login();
        }
    }
    // private function _login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');


    //     $api_url = 'https://3eff-116-206-14-56.ngrok-free.app/login';
    //     $api_data = array(
    //         'username' => $username,
    //         'password' => $password
    //     );

    //     // var_dump($api_url, $api_data);
    //     // die;
    //     $api_response = $this->curl->simple_post($api_url, $api_data);
    //     // var_dump($api_response);
    //     // die;
    //     $api_response = json_decode($api_response, true);

    //     if ($api_response['response'] == 200) {
    //         $this->session->set_userdata('user_data', $api_response['data']);
    //         redirect('dashboard');
    //     } else {
    //         $data['error_message'] = isset($api_response['message']) ? $api_response['message'] : 'Unknown error';
    //         $data['page'] = 'auth/login';
    //         $this->load->view('auth/templates/index', $data);
    //     }
    // }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            //user
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'roleid' => $user['roleid'],
                ];
                $this->session->set_userdata($data);
                if ($user['roleid'] == 1) {
                    redirect('dashboard');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('error', 'Wrong Password');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Username Is Not Active');
            redirect('auth');
        }
    }
    // private function call_api($url, $data)
    // {
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    //     $response = curl_exec($ch);
    //     $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //     curl_close($ch);

    //     // Handle respons API
    //     if ($http_status == 200) {
    //         return json_decode($response, true);
    //     } else {
    //         return array('status' => 'error', 'message' => 'Failed to connect to API');
    //     }
    // }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('roleid');
        $this->session->set_flashdata('notif', 'Logout Success');
        redirect('auth');
    }
}
