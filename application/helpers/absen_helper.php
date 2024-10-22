<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('cek_absen_pulang')) {
    function cek_absen_pulang($id_siswa)
    {
        // Get the CI instance
        $CI = &get_instance();

        $pengajar = $CI->pengajar->where('id_user', $CI->session->userdata('akun'))->row();
        $kursus = $CI->kursus->where('id_pengajar', $pengajar->id_pengajar)->row();

        // Call the model method
        $data = $CI->absen->find_now_pulang($id_siswa, $kursus->id_kursus);

        return empty($data);
    }
}

if (!function_exists('jml_absen_hari_ini')) {
    function jml_absen_hari_ini()
    {
        $CI = &get_instance();

        return $CI->absen->jml_hari_ini();
    }
}

if (!function_exists('jml_siswa')) {
    function jml_siswa()
    {
        $CI = &get_instance();

        return $CI->siswa->jml_siswa();
    }
}
