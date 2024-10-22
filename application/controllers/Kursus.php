<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus extends CI_Controller
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
            'kursus' => $this->kursus->all()
        ];

        $this->load->view('layout/header');
        $this->load->view('admin/kursus/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'pengajar' => $this->pengajar->not_pengajar(),
            ];

            $this->load->view('layout/header');
            $this->load->view('admin/kursus/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'id_pengajar' => $post['pengajar'],
                'kursus' => $post['kursus'],
            ];

            $cek = $this->kursus->insert($data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('kursus/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('kursus/tambah');
            }
        }
    }

    public function edit($id)
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'pengajar' => $this->pengajar->all(),
                'kursus' => $this->kursus->find($id)
            ];

            $this->load->view('layout/header');
            $this->load->view('admin/kursus/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'id_pengajar' => $post['pengajar'],
                'kursus' => $post['kursus'],
            ];

            $cek = $this->kursus->update($post['id'], $data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('kursus/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('kursus/edit/' . $post['id']);
            }
        }
    }

    public function hapus($id)
    {
        $cek = $this->kursus->destroy($id);

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

        return redirect('kursus/kelola');
    }
}
