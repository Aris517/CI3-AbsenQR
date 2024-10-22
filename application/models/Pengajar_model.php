<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar_model extends CI_Model
{
    public function all()
    {
        $pengajar = $this->db->get('pengajar')->result();

        foreach ($pengajar as &$row) {
            $row->user = $this->user->find($row->id_user);
        }

        return $pengajar;
    }

    public function not_pengajar()
    {
        $data = $this->db->select('pengajar.*')
            ->from('pengajar')
            ->join('kursus', 'pengajar.id_pengajar = kursus.id_pengajar', 'left')
            ->where('kursus.id_pengajar IS NULL')
            ->get()
            ->result();

        return $data;
    }

    public function where($kondisi, $data)
    {
        $data = $this->db->select('*')
            ->from('pengajar')
            ->where($kondisi, $data)
            ->get();

        return $data;
    }

    public function find($id)
    {
        $data = $this->db->select('*')
            ->from('pengajar')
            ->join('user', 'pengajar.id_user = user.id_user')
            ->where('pengajar.id_pengajar', $id)
            ->get()
            ->row();

        return $data;
    }

    public function insert($data)
    {
        return $this->db->insert('pengajar', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_pengajar', $id)->update('pengajar', $data);
    }

    public function destroy($id)
    {
        return $this->db->where('id_pengajar', $id)->delete('pengajar');
    }
}
