<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QRCode_model extends CI_Model
{
    public function all()
    {
        $data = $this->db->select('*')
            ->from('qrcode')
            ->join('siswa', 'siswa.id_siswa = qrcode.id_siswa')
            ->order_by('qrcode.file', null)
            ->get()
            ->result();

        return $data;
    }

    public function where($kondisi, $data)
    {
        $data = $this->db->select('*')
            ->from('qrcode')
            ->join('siswa', 'siswa.id_siswa = qrcode.id_siswa')
            ->where('qrcode.' . $kondisi, $data)
            ->get();

        return $data;
    }

    public function find($id)
    {
        return $this->db->where('id_siswa', $id)->get('siswa')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('qrcode', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_siswa', $id)->update('qrcode', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_siswa', $id)->update('qrcode', ['file' => null]);
    }
}
