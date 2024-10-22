<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('online')) {
            $this->__logout();
        }
    }

    public function index()
    {
        if (!$this->session->userdata('online')) {
            $this->__login();
        }
    }

    private function __login()
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $this->load->view('auth/login');
        } else {
            $akun = $this->user->where('username', $post['username'])->row();

            if (password_verify($this->input->post('password'), $akun->password)) {
                $userdata = [
                    'akun' => $akun->id_user,
                    'username' => $akun->username,
                    'role' => $akun->role,
                    'online' => true,
                ];

                $this->session->set_userdata($userdata);

                return redirect('home');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email atau password salah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('auth');
            }
        }
    }

    private function __logout()
    {
        $this->session->sess_destroy();

        return redirect('auth');
    }
}
