<?php

class Mapi_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahDataMahasiswa($data)
    {
        // $data = [
        //     "nim" => $this->input->post('nim', true),
        //     "nama" => $this->input->post('nama', true),
        //     "jurusan" => $this->input->post('jurusan')
        // ];

        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataMahasiswa($id)
    {
        //$this->db->where('id', $id);
        $this->db->delete('mahasiswa', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getMahasiswaByID($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function ubahDataMahasiswa($data, $id)
    {
        // $data = [
        //     "nim" => $this->input->post('nim', true),
        //     "nama" => $this->input->post('nama', true),
        //     "jurusan" => $this->input->post('jurusan')
        // ];

        // $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nim', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
