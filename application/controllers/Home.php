<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $role = $this->session->userdata('role');

        $this->load->view('layout/header');

        if ($role == 2) {
            $this->load->view('pengajar/index');
        } else {
            $this->load->view('admin/index');
        }
        $this->load->view('layout/footer');
    }
}
