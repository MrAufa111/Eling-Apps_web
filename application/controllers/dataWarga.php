<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dataWarga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_warga', 'model');
        check_login();
    }
    public function index()
    {
        $data['user'] = $this->db->get('kepala_keluarga')->result_array();
        $data['title'] = 'Data Warga';
        $data['page'] = 'Pages/datawarga/index';
        $this->load->view('Pages/templates/index', $data);
    }
    public function Detail($id)
    {
        $data['user'] = $this->db->get_where('kepala_keluarga', ['id' => $id])->row_array();
        $data['user1'] = $this->db->get_where('anggota_keluarga', ['id_kepala_keluarga' => $id])->result_array();
        $data['title'] = 'Detail Data Warga';
        $data['page'] = 'Pages/datawarga/detail';
        $this->load->view('Pages/templates/index', $data);
    }
    public function tambahDataWarga()
    {
        $data['title'] = 'Tambah Data Warga';
        $data['page'] = 'Pages/datawarga/tambahDataWarga';
        $this->load->view('Pages/templates/index', $data);
    }
    public function addAnggotaKeluarga()
    {
        $input = $this->input->post(null, TRUE);


        $this->model->insertAnggotaKeluarga($input);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'failed']);
        }
    }

    public function UpdateKepala()
    {
        $input = $this->input->post(null, TRUE);
        $id = $input['idKepala'];
        $data['nik'] = $input['nikKepala'];
        $data['nama'] = $input['namaKepala'];
        $data['no_hp'] = $input['telpKepala'];
        $data['tanggal_lahir'] = $input['tanggallahirKepala'];
        $data['jenis_kelamin'] = $input['jkKepala'];
        $data['alamat'] = $input['alamatKepala'];

        $this->model->UpdateKepala($id, $data);
        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'failed']);
        }
    }
    public function updateAnggotaKeluarga($id)
    {
        $input = $this->input->post(null, TRUE);
        $id2 = $input['idRelasi'];
        $data['nik'] = $input['nikAnggota'];
        $data['nama'] = $input['namaAnggota'];
        $data['no_hp'] = $input['telpAnggota'];
        $data['tanggal_lahir'] = $input['tanggallahirAnggota'];
        $data['jenis_kelamin'] = $input['jkAnggota'];
        $data['alamat'] = $input['alamatAnggota'];
        // var_dump($id, $data);
        // die;
        $this->model->UpdateAnggotaKeluarga($id, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('notif', 'Data berhasil di ubah');
            redirect('dataWarga/Detail/' . $id2);
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data yang di update');
            redirect('dataWarga/Detail/' . $id2);
        }
    }

    public function insertData()
    {
        $input = $this->input->post(NULL, TRUE);
        $cek = $this->db->get_where('kepala_keluarga', ['nik' => $input['nikKepala']])->row_array();
        if ($cek == null) {
            if ($input) {
                $data1 = array(
                    'nik' => $input['nikKepala'],
                    'nama' => $input['namaKepala'],
                    'no_hp' => $input['telpKepala'],
                    'tanggal_lahir' => $input['tanggallahirKepala'],
                    'jenis_kelamin' => $input['jkKepala'],
                    'alamat' => $input['alamatKepala'],
                );
                var_dump($data1);
                // echo json_encode(var_dump($data1));
                $id = $this->model->tambahdataKepala($data1);


                if ($id) {

                    $input_data = $this->input->post('data');

                    if ($input_data) {
                        $data = json_decode($input_data, true);

                        if ($data !== null) {
                            $anggota_data = array();

                            foreach ($data as $item) {
                                $anggota_data[] = array(
                                    'id_kepala_keluarga' => $id,
                                    'nik' => $item['nikAnggota'],
                                    'nama' => $item['namaAnggota'],
                                    'no_hp' => $item['telpAnggota'],
                                    'tanggal_lahir' => $item['tanggallahirAnggota'],
                                    'jenis_kelamin' => $item['jkAnggota'],
                                    'alamat' => $item['alamatAnggota'],
                                );
                            }

                            $this->db->insert_batch('anggota_keluarga', $anggota_data);


                            $response['status'] = 'success';
                            $response['message'] = 'Data Berhasil Di Tambah';
                        } else {
                            $this->session->set_flashdata('error', 'Invalid JSON data.');
                            redirect('dataWarga');
                        }
                    }
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Failed to save data to data table.';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'NIK sama';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'NIK sama';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function deleteAngota($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('anggota_keluarga');
        $this->session->set_flashdata('notif', 'Data Berhasil Di Hapus');
        redirect('dataWarga');
    }
    public function delete($id)
    {
        if (!$id || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Invalid ID');
            redirect('dataWarga');
        }

        $this->db->where('id_kepala_keluarga', $id);
        $this->db->delete('anggota_keluarga');

        if ($this->db->affected_rows() > 0) {
            $this->db->where('id', $id);
            $this->db->delete('kepala_keluarga');

            $this->session->set_flashdata('notif', 'Data Berhasil Di Hapus');
            redirect('dataWarga');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete data');
            redirect('dataWarga');
        }
    }
    public function tambahAnggotakeluarga()
    {
        $input = $this->input->post(NULL, TRUE);

        $this->form_validation->set_rules('nikAnggota', 'Nik', 'required|is_unique[anggota_keluarga.nik]');
        $id = $input['idRelasi'];
        if ($this->form_validation->run()) {
            $data = [
                'id_kepala_keluarga' => $input['idRelasi'],
                'nik' => $input['nikAnggota'],
                'nama' => $input['namaAnggota'],
                'no_hp' => $input['telpAnggota'],
                'tanggal_lahir' => $input['tanggallahirAnggota'],
                'jenis_kelamin' => $input['jkAnggota'],
                'alamat' => $input['alamatAnggota'],
            ];
            // var_dump($data);
            // die;
            $this->db->insert('anggota_keluarga', $data);
            $this->session->set_flashdata('notif', 'Data Berhasil Di Simpan');
            redirect('dataWarga/Detail/' . $id);
        } else {
            $this->session->set_flashdata('error', 'NIK SUDAH ADA');
            redirect('dataWarga/Detail/' . $id);
        }
    }
}
