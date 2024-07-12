<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelaporanModel'); // Memuat model yang sudah dibuat sebelumnya
    }

    public function index()
    {
        $data['pelaporan'] = $this->PelaporanModel->get_pelaporan();
        $this->load->view('template/header');
        $this->load->view('pelaporan/index', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Aturan validasi untuk form tambah data
        $this->form_validation->set_rules('nama_pelapor', 'Nama_pelapor', 'required');
        $this->form_validation->set_rules('email_pelapor', 'Email_pelapor', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_pengaduan', 'Tanggal_pengaduan', 'required');



        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form tambah data
            $this->load->view('template/header');
            $this->load->view('pelaporan/addpelaporan');
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'nama_pelapor' => $this->input->post('nama_pelapor'),
                'email_pelapor' => $this->input->post('email_pelapor'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_pengaduan' => $this->input->post('tanggal_pengaduan'),

                // Tambahkan field lainnya sesuai kebutuhan
            );

            $this->PelaporanModel->create_pelaporan($data);
            redirect('pelaporan/index'); // Redirect kembali ke halaman utama setelah berhasil menambahkan data
        }
    }

    public function edit($id)
    {
        $data['pelaporan'] = $this->PelaporanModel->get_pelaporan_by_id($id);
        $this->load->view('template/header');
        $this->load->view('pelaporan/editpelaporan', $data);
    }

    public function update($id)
    {
        // Mengambil data yang di-submit dari form
        $data = array(
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'email_pelapor' => $this->input->post('email_pelapor'),
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_pengaduan' => $this->input->post('tanggal_pengaduan'),


        );

        // Memanggil method model untuk melakukan update data karyawan
        $this->PelaporanModel->update_pelaporan($id, $data);

        // Redirect kembali ke halaman index atau halaman lain setelah update berhasil
        redirect('pelaporan/index');
    }


    public function delete($id)
    {
        $this->PelaporanModel->delete_pelaporan($id);
        redirect('pelaporan/index'); // Redirect kembali ke halaman utama setelah menghapus data
    }

    public function search()
    {
        // Ambil keyword dari input form
        $keyword = $this->input->get('keyword');

        // Jika $keyword tidak kosong, lakukan pencarian
        if (!empty($keyword)) {
            // Panggil method dari model untuk melakukan pencarian pendaftaran
            $data['pelaporan'] = $this->PelaporanModel->cari_pelaporan($keyword);
        } else {
            // Jika $keyword kosong, tampilkan semua data pendaftaran
            $data['pelaporan'] = $this->PelaporanModel->get_pelaporan();
        }

        // Load view dengan hasil pencarian
        $this->load->view('template/header');
        $this->load->view('pelaporan/index', $data);
        $this->load->view('template/footer');
    }
}
