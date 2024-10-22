<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function all()
    {
        $data = $this->db->select('*')
            ->from('user')
            ->order_by('role', '1')
            ->get()
            ->result();

        return $data;
    }

    public function where($kondisi, $data)
    {
        $data = $this->db->select('*')
            ->from('user')
            ->where($kondisi, $data)
            ->get();

        return $data;
    }

    public function not_pengajar()
    {
        $data = $this->db->select('user.*')
            ->from('user')
            ->join('pengajar', 'user.id_user = pengajar.id_user', 'left')
            ->where('pengajar.id_user IS NULL')
            ->where('user.role', 2)
            ->get()
            ->result();

        return $data;
    }

    public function find($id)
    {
        return $this->db->where('id_user', $id)->get('user')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_user', $id)->update('user', $data);
    }

    public function destroy($id)
    {
        return $this->db->where('id_user', $id)->delete('user');
    }
}
