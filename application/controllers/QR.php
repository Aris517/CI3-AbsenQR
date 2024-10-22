<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QR extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ciqrcode');
        if (!$this->session->userdata('online')) {
            redirect('auth');
        }
    }

    public function kelola()
    {
        $data = [
            'siswa' => $this->qr->all()
        ];

        $this->load->view('layout/header');
        $this->load->view('admin/qrcode/index', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $cek = $this->qr->delete($id);

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

        return redirect('qr/kelola');
    }

    public function generate($opsi)
    {
        if ($opsi == 'all') {
            $this->__generate_all($opsi);
        } else {
            $this->__generate_one($opsi);
        }
    }

    private function __generate_all()
    {
        $siswa = $this->siswa->all();

        if (empty($siswa)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Tidak ada data siswa
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('qr/kelola');
        }

        foreach ($siswa as $row) {
            $qr = $this->qr->where('id_siswa', $row->id_siswa)->row();

            if (!empty($qr->file)) {
                unlink(FCPATH . 'uploads/qrcode/' . $row->file);
            }

            $hex_data   = bin2hex($row->nik);
            $save_name  = $hex_data . '.png';

            $config['cacheable']    = true;
            $config['imagedir']     = 'uploads/qrcode/';
            $config['quality']      = true;
            $config['size']         = '1024';
            $config['black']        = array(255, 255, 255);
            $config['white']        = array(255, 255, 255);
            $this->ciqrcode->initialize($config);

            $params['data']     = $row->id_siswa . '/' . generate_sha256_hash($row->nik);
            $params['level']    = 'L';
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $save_name;

            $this->ciqrcode->generate($params);

            $data = [
                'file' => $save_name,
            ];

            $this->qr->update($row->id_siswa, $data);
        }

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                QR Code berhasil digenerate
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        return redirect('qr/kelola');
    }

    private function __generate_one($opsi)
    {
        $row = $this->qr->where('id_siswa', $opsi)->row();

        if (!empty($row->file)) {
            unlink(FCPATH . 'uploads/qrcode/' . $row->file);
        }

        $hex_data   = bin2hex($row->nik);
        $save_name  = $hex_data . '.png';

        $config['cacheable']    = true;
        $config['imagedir']     = 'uploads/qrcode/';
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255, 255, 255);
        $config['white']        = array(255, 255, 255);
        $this->ciqrcode->initialize($config);

        $params['data']     = $row->id_siswa . '/' . generate_sha256_hash($row->nik);
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $save_name;

        $this->ciqrcode->generate($params);

        $data = [
            'file' => $save_name,
        ];

        $this->qr->update($row->id_siswa, $data);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                QR Code berhasil digenerate
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        return redirect('qr/kelola');
    }

    public function print($opsi = null)
    {
        if ($opsi == 'all') {
            $qr = $this->qr->all();
        } else {
            $qr = $this->qr->where('id_siswa', $opsi)->result();
        }

        $data = [
            'qr' => $qr,
        ];

        $this->load->view('admin/qrcode/print', $data);
    }
}
