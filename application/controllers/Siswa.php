<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('online')) {
            redirect('auth');
        }
    }

    public function kelola()
    {
        $data = [
            'siswa' => $this->siswa->all()
        ];

        $this->load->view('layout/header');
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $this->load->view('layout/header');
            $this->load->view('admin/siswa/tambah');
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nik' => $post['nik'],
                'nama' => $post['nama'],
                'alamat' => $post['alamat'],
                'no_hp' => $post['no_hp'],
                'jk' => $post['jk'],
                'kelas' => $post['kelas'],
            ];

            $cek = $this->siswa->insert($data);

            $id_siswa = $this->db->insert_id();

            if ($cek) {
                $this->qr->insert(['id_siswa' => $id_siswa]);

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('siswa/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('siswa/tambah');
            }
        }
    }

    public function edit($id)
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'siswa' => $this->siswa->find($id)
            ];

            $this->load->view('layout/header');
            $this->load->view('admin/siswa/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nik' => $post['nik'],
                'nama' => $post['nama'],
                'alamat' => $post['alamat'],
                'no_hp' => $post['no_hp'],
                'jk' => $post['jk'],
                'kelas' => $post['kelas'],
            ];

            $cek = $this->siswa->update($post['siswa'], $data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('siswa/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('siswa/edit/' . $post['siswa']);
            }
        }
    }

    public function hapus($id)
    {
        $cek = $this->siswa->destroy($id);

        if ($cek) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil hapus data
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal hapus data
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('siswa/kelola');
    }
}
