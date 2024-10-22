<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_model extends CI_Model
{
    public function jml_hari_ini()
    {
        $absen = $this->db->where('tanggal', date('Y-m-d'))
            ->where('status', 'Masuk')
            ->get('absen')
            ->num_rows();

        return $absen;
    }

    public function all_now($id)
    {
        $pengajar = $this->pengajar->where('id_user', $id)->row();
        $kursus = $this->kursus->where('id_pengajar', $pengajar->id_pengajar)->row();

        $absen = $this->db->select('*')
            ->from('absen')
            ->where('tanggal', date('Y-m-d'))
            ->order_by('jam', 'desc')
            ->order_by('id_siswa', 'desc')
            ->order_by('tanggal', 'desc')
            ->where('id_kursus', $kursus->id_kursus)
            ->get()
            ->result();

        foreach ($absen as &$row) {
            $row->kursus = $this->kursus->find($row->id_kursus);
            $row->siswa = $this->siswa->find($row->id_siswa);
        }

        return $absen;
    }

    public function short_now($id, $kursus)
    {
        $absen = $this->db->select('*')
            ->from('absen')
            ->where('tanggal', date('Y-m-d'))
            ->where('id_siswa', $id)
            ->where('id_kursus', $kursus)
            ->get();

        return $absen;
    }

    public function find_now_pulang($id, $kursus)
    {
        $absen = $this->db->select('*')
            ->from('absen')
            ->where('tanggal', date('Y-m-d'))
            ->where('status', 'pulang')
            ->where('id_siswa', $id)
            ->where('id_kursus', $kursus)
            ->get()
            ->row();

        return $absen;
    }

    public function find($id)
    {
        $absen = $this->db->select('*')
            ->from('absen')
            ->join('siswa', 'siswa.id_siswa = absen.id_siswa')
            ->join('kursus', 'kursus.id_kursus = absen.id_kursus')
            ->where('absen.id_absen', $id)
            ->get()
            ->row();

        return $absen;
    }

    public function where($kondisi, $data)
    {
        $data = $this->db->select('*')
            ->from('absen')
            ->where($kondisi, $data)
            ->get();

        return $data;
    }

    public function get_periode($dari, $sampai)
    {
        $absen = $this->db->select('*')
            ->from('absen')
            ->where('tanggal >=', $dari)
            ->where('tanggal <=', $sampai)
            ->order_by('jam', 'desc')
            ->order_by('id_siswa', 'desc')
            ->order_by('tanggal', 'desc')
            ->get()
            ->result();

        foreach ($absen as &$row) {
            $row->kursus = $this->kursus->find($row->id_kursus);
            $row->siswa = $this->siswa->find($row->id_siswa);
        }

        return $absen;
    }

    public function insert($data)
    {
        return $this->db->insert('absen', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_absen', $id)->update('absen', $data);
    }

    public function destroy($id)
    {
        return $this->db->where('id_absen', $id)->delete('absen');
    }
}
