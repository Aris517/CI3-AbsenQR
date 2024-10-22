<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('online')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $this->load->view('layout/header');
            $this->load->view('laporan/index');
            $this->load->view('layout/footer');
        } else {
            $data = [
                'absen' => $this->absen->get_periode($post['dari'], $post['sampai']),
                'dari' => $post['dari'],
                'sampai' => $post['sampai'],
            ];

            $this->load->view('laporan/cetak', $data);
        }
    }
}
