<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            'user' => $this->user->where('role', 2)->result()
        ];

        $this->load->view('layout/header');
        $this->load->view('admin/user/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $this->load->view('layout/header');
            $this->load->view('admin/user/tambah');
            $this->load->view('layout/footer');
        } else {
            $data = [
                'username' => $post['username'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'role' => $post['role'],
            ];

            $cek = $this->user->insert($data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('user/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal tambah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('user/tambah');
            }
        }
    }

    public function edit($id)
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'user' => $this->user->where('id_user', $id)->row()
            ];

            $this->load->view('layout/header');
            $this->load->view('admin/user/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $user = $this->user->where('id_user', $post['user'])->row();

            if (empty($post['password'])) {
                $pass = $user->password;
            } else {
                $pass = password_hash($post['password'], PASSWORD_DEFAULT);
            }

            $data = [
                'username' => $post['username'],
                'password' => $pass,
                'role' => $post['role'],
            ];

            $cek = $this->user->update($post['user'], $data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('user/kelola');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('user/edit/' . $post['user']);
            }
        }
    }

    public function hapus($id)
    {
        $cek = $this->user->destroy($id);

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

        return redirect('user/kelola');
    }
}
