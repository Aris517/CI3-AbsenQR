<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus_model extends CI_Model
{
    public function all()
    {
        $kursus = $this->db->get('kursus')->result();

        foreach ($kursus as &$row) {
            $row->pengajar = $this->pengajar->find($row->id_pengajar);
        }

        return $kursus;
    }

    public function where($kondisi, $data)
    {
        $data = $this->db->select('*')
            ->from('kursus')
            ->where($kondisi, $data)
            ->get();

        return $data;
    }

    public function find($id)
    {
        $data = $this->db->select('*')
            ->from('kursus')
            ->join('pengajar', 'pengajar.id_pengajar = kursus.id_pengajar')
            ->where('kursus.id_kursus', $id)
            ->get()
            ->row();

        return $data;
    }

    public function insert($data)
    {
        return $this->db->insert('kursus', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_kursus', $id)->update('kursus', $data);
    }

    public function destroy($id)
    {
        return $this->db->where('id_kursus', $id)->delete('kursus');
    }
}
