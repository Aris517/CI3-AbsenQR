<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function all()
    {
        $data = $this->db->select('*')
            ->from('siswa')
            ->order_by('id_siswa', 'desc')
            ->get()
            ->result();

        return $data;
    }

    public function jml_siswa()
    {
        return $this->db->get('siswa')->num_rows();
    }

    public function where($kondisi, $data)
    {
        $data = $this->db->select('*')
            ->from('siswa')
            ->where($kondisi, $data)
            ->get();

        return $data;
    }

    public function find($id)
    {
        return $this->db->where('id_siswa', $id)->get('siswa')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('siswa', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_siswa', $id)->update('siswa', $data);
    }

    public function destroy($id)
    {
        return $this->db->where('id_siswa', $id)->delete('siswa');
    }
}
