<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
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
        $data = [
            'absen' => $this->absen->all_now($this->session->userdata('akun'))
        ];

        $this->load->view('layout/header');
        $this->load->view('pengajar/absen/index', $data);
        $this->load->view('layout/footer');
    }

    public function absen()
    {
        $qr_data = $this->input->post('qr_data');

        $parts = explode('/', $qr_data);

        $siswa = $this->siswa->find($parts[0]);

        if (!empty($siswa)) {

            if (verify_sha256_hash(generate_sha256_hash($siswa->nik), $parts[1])) {

                $pengajar = $this->pengajar->where('id_user', $this->session->userdata('akun'))->row();
                $kursus = $this->kursus->where('id_pengajar', $pengajar->id_pengajar)->row();

                $absen = $this->absen->short_now($parts[0], $kursus->id_kursus)->result();

                if (empty($absen)) {

                    $data = [
                        'id_siswa' => $parts[0],
                        'id_kursus' => $kursus->id_kursus,
                        'status' => 'Masuk',
                    ];

                    $this->absen->insert($data);

                    $res = "Berhasil melakukan absen masuk atas nama $siswa->nama";
                } else {
                    $absen_pulang = $this->absen->find_now_pulang($parts[0], $kursus->id_kursus);

                    if (empty($absen_pulang)) {
                        $data = [
                            'id_siswa' => $parts[0],
                            'id_kursus' => $kursus->id_kursus,
                            'status' => 'Pulang',
                        ];

                        $this->absen->insert($data);

                        $res = "Berhasil melakukan absen pulang atas nama $siswa->nama silahkan edit status keterangan jika diperlukan";
                    } else {
                        $res = "Sudah melakukan absen pulang atas nama $siswa->nama silahkan edit status keterangan jika diperlukan";
                    }
                }
            } else {
                $res = 'Token Tidak Valid';
            }
        } else {
            $res = 'Tidak ditemukan siswa ini';
        }

        $response = [
            'status' => $res,
        ];

        echo json_encode($response);
    }

    public function edit($id)
    {
        $post = $this->input->post(null, true);

        if (empty($post)) {
            $data = [
                'absen' => $this->absen->find($id)
            ];

            $this->load->view('layout/header');
            $this->load->view('pengajar/absen/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'keterangan' => $post['keterangan'],
            ];

            $cek = $this->absen->update($post['absen'], $data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('absen');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal ubah data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('absen/edit/' . $post['absen']);
            }
        }
    }

    public function hapus($id)
    {
        $cek = $this->absen->destroy($id);

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

        return redirect('absen');
    }
}
