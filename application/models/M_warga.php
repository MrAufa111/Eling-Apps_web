<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_warga extends CI_Model
{
    public function UpdateKepala($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('kepala_keluarga', $data);
    }
    public function UpdateAnggotaKeluarga($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('anggota_keluarga', $data);
    }
    public function tambahdataKepala($data1)
    {
        $this->db->insert('kepala_keluarga', $data1);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
}
