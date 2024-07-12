<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftaranModel'); // Memuat model yang sudah dibuat sebelumnya
    }

    public function index()
    {
        $data['pendaftaran'] = $this->PendaftaranModel->get_pendaftaran();
        $this->load->view('template/header');
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Aturan validasi untuk form tambah data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form tambah data
            $this->load->view('template/header');
            $this->load->view('pendaftaran/addpendaftaran');
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'nama' => $this->input->post('nama'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'layanan' => $this->input->post('layanan'),

                // Tambahkan field lainnya sesuai kebutuhan
            );

            $this->PendaftaranModel->create_pendaftaran($data);
            redirect('pendaftaran/index'); // Redirect kembali ke halaman utama setelah berhasil menambahkan data
        }
    }

    public function edit($id)
    {
        $data['pendaftaran'] = $this->PendaftaranModel->get_pendaftaran_by_id($id);
        $this->load->view('template/header');
        $this->load->view('pendaftaran/editpendaftaran', $data);
    }

    public function update($id)
    {
        // Mengambil data yang di-submit dari form
        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'layanan' => $this->input->post('layanan')

        );

        // Memanggil method model untuk melakukan update data karyawan
        $this->PendaftaranModel->update_pendaftaran($id, $data);

        // Redirect kembali ke halaman index atau halaman lain setelah update berhasil
        redirect('pendaftaran/index');
    }


    public function delete($id)
    {
        $this->PendaftaranModel->delete_pendaftaran($id);
        redirect('pendaftaran/index'); // Redirect kembali ke halaman utama setelah menghapus data
    }

    public function search()
    {
        // Ambil keyword dari input form
        $keyword = $this->input->get('keyword');

        // Jika $keyword tidak kosong, lakukan pencarian
        if (!empty($keyword)) {
            // Panggil method dari model untuk melakukan pencarian pendaftaran
            $data['pendaftaran'] = $this->PendaftaranModel->cari_pendaftaran($keyword);
        } else {
            // Jika $keyword kosong, tampilkan semua data pendaftaran
            $data['pendaftaran'] = $this->PendaftaranModel->get_pendaftaran();
        }

        // Load view dengan hasil pencarian
        $this->load->view('template/header');
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('template/footer');
    }
}
