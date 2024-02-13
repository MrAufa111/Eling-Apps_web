<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }
    public function index()
    {

        $data['title'] = 'Dashboard';
        $this->load->view('Pages/templates/index', $data);
    }
    public function jumlahWarga()
    {
        $totalLaki1 = $this->db->where('jenis_kelamin', 'Laki-laki')->count_all_results('kepala_keluarga');
        $totalPerempuan1 = $this->db->where('jenis_kelamin', 'Perempuan')->count_all_results('kepala_keluarga');
        $totalLaki2 = $this->db->where('jenis_kelamin', 'Laki-laki')->count_all_results('anggota_keluarga');
        $totalPerempuan2 = $this->db->where('jenis_kelamin', 'Perempuan')->count_all_results('anggota_keluarga');

        $user1 = $this->db->count_all_results('kepala_keluarga');
        $user2 = $this->db->count_all_results('anggota_keluarga');

        $jumlahLaki = $totalLaki1 + $totalLaki2;
        $jumlahPerem = $totalPerempuan1 + $totalPerempuan2;
        $jumlah = $user1 + $user2;

        $data = [
            'totalKepala' => $user1,
            'total' => $jumlah,
            'totalLaki' => $jumlahLaki,
            'totalPerempuan' => $jumlahPerem,
        ];
        echo json_encode($data);
    }
}
