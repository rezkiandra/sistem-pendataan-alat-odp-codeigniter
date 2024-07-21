<?php

class Validasi extends CI_Controller
{
    var $form_validation;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode_odp', 'Kode ODP', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, tampilkan kembali formulir dengan pesan kesalahan
            $this->load->view('barang/form_tambah');
        } else {
            // Validasi berhasil, lakukan aksi yang diinginkan (contoh: simpan ke database)
            // ...

            // Redirect atau tampilkan halaman sukses
            redirect('controller/halaman_sukses');
        }
    }
}
