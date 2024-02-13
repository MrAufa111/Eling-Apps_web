<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function index()
    {
        $data['page'] = 'Pages/pengumuman/index';
        $data['pengumuman'] = $this->db->get('pengumuman')->result_array();
        $data['title'] = 'Pengumuman';
        $this->load->view('Pages/templates/index', $data);
    }
    public function addData()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'konten', 'required');
        if ($this->form_validation->run() == true) {
            $input = $this->input->post(null, TRUE);
            $is_active = $this->input->post('switch');
            $status = ($is_active == 'on') ? 1 : 0;
            $data = [
                'judul' => $input['judul'],
                'konten' => $input['konten'],
                'status' => $status
            ];
            $this->db->insert('pengumuman', $data);
            $this->session->set_flashdata('notif', 'Data Berhasil Di tambah');
            redirect('pengumuman');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Pengumuman/addData');
        }
    }
    public function updatePengumunan($id)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'konten', 'required');
        if ($this->form_validation->run() == true) {
            $input = $this->input->post(null, TRUE);
            $data = [
                'judul' => $input['judul'],
                'konten' => $input['konten'],
            ];
            $this->db->where('id', $id);
            $this->db->update('pengumuman', $data);
            $this->session->set_flashdata('notif', 'Data Berhasil Di tambah');
            redirect('Pengumuman');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Pengumuman/addData');
        }
    }
    public function updateStatus()
    {
        $input = $this->input->post(null, TRUE);

        $newStatus = $input['newStatus'];
        $id = $input['id'];

        $currentStatus = $this->db->get_where('pengumuman', ['id' => $id])->row('status');

        if ($newStatus != $currentStatus) {
            $data['status'] = $newStatus;
            $this->db->where('id', $id);
            $this->db->update('pengumuman', $data);

            $response['status'] = 'success';
            $response['message'] = 'Data Berhasil Di Update';
        } else {
            $response['status'] = 'success';
            $response['message'] = 'Tidak ada perubahan dalam status';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');
        $this->session->set_flashdata('notif', 'Data Berhasil Di Hapus');
        redirect('Pengumuman');
    }
}
