<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
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
            'pengajar' => $this->pengajar->all()
        ];

        $this->load->view('layout/header');
        $this->load->view('admin/pengajar/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'user' => $this->user->not_pengajar(),
            ];

            $this->load->view('layout/header');
            $this->load->view('admin/pengajar/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'id_user' => $post['user'],
                'nama' => $post['nama'],
                'alamat' => $post['alamat'],
                'no_hp' => $post['no_hp'],
                'jk' => $post['jk'],
            ];

            $cek = $this->pengajar->insert($data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('pengajar/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('pengajar/tambah');
            }
        }
    }

    public function edit($id)
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'pengajar' => $this->pengajar->find($id)
            ];

            $this->load->view('layout/header');
            $this->load->view('admin/pengajar/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => $post['nama'],
                'alamat' => $post['alamat'],
                'no_hp' => $post['no_hp'],
                'jk' => $post['jk'],
            ];

            $cek = $this->pengajar->update($post['pengajar'], $data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('pengajar/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('pengajar/edit/' . $post['pengajar']);
            }
        }
    }

    public function hapus($id)
    {
        $cek = $this->pengajar->destroy($id);

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

        return redirect('pengajar/kelola');
    }
}
