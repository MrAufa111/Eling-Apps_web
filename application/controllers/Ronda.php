
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ronda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index()
    {
        $data['user']  = $this->db->get('kepala_keluarga')->result_array();
        $data['haridb'] = $this->db->get('hari_ronda')->result_array();
        $data['semuaHari'] = $this->db->get('anggota_ronda')->result_array();
        $data['page'] = 'Pages/ronda/index';
        $data['title'] = 'Jadwal Ronda';
        $this->load->view('Pages/templates/index', $data);
    }
    public function simpan_data()
    {
        $namaWargaArray = json_decode($this->input->post('namaWarga'), true); // Mendekode JSON menjadi array
        $hari = $this->input->post('hari');

        foreach ($namaWargaArray as $namaWarga) {
            $data = [
                'hari' => $hari,
                'nama' => $namaWarga,
                'tanggal_insert' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('anggota_ronda', $data);
        }

        $response['status'] = 'success';
        $response['message'] = 'Data Berhasil Di Tambah';

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function hapus_data_otomatis()
    {
        $tanggalHapus = date('Y-m-d', strtotime('-7 days'));

        $this->db->where('tanggal_insert <', $tanggalHapus);
        $this->db->delete('anggota_ronda');

        echo "Data yang lebih tua dari $tanggalHapus telah dihapus secara otomatis.";
    }
}
