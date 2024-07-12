<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengaduanModel'); // Memuat model yang sudah dibuat sebelumnya
    }

    public function index()
    {
        $data['pengaduan'] = $this->PengaduanModel->get_pengaduan();
        $this->load->view('template/header');
        $this->load->view('pengaduan/index', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Aturan validasi untuk form tambah data
        $this->form_validation->set_rules('keterangan_pengaduan', 'Keterangan_pengaduan', 'required');
        $this->form_validation->set_rules('status_pengaduan', 'Status_pengaduan', 'required');
        $this->form_validation->set_rules('tanggal_pengaduan', 'Tanggal_pengaduan', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form tambah data
            $this->load->view('template/header');
            $this->load->view('pengaduan/addpengaduan');
            $this->load->view('template/footer');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'keterangan_pengaduan' => $this->input->post('keterangan_pengaduan'),
                'status_pengaduan' => $this->input->post('status_pengaduan'),
                'tanggal_pengaduan' => $this->input->post('tanggal_pengaduan'),

                // Tambahkan field lainnya sesuai kebutuhan
            );

            $this->PengaduanModel->create_pengaduan($data);
            redirect('pengaduan/index'); // Redirect kembali ke halaman utama setelah berhasil menambahkan data
        }
    }

    public function edit($id)
    {
        $data['pengaduan'] = $this->PengaduanModel->get_pengaduan_by_id($id);
        $this->load->view('template/header');
        $this->load->view('pengaduan/editpengaduan', $data);
    }

    public function update($id)
    {
        // Mengambil data yang di-submit dari form
        $data = array(
            'keterangan_pengaduan' => $this->input->post('keterangan_pengaduan'),
            'status_pengaduan' => $this->input->post('status_pengaduan'),
            'tanggal_pengaduan' => $this->input->post('tanggal_pengaduan'),

        );

        // Memanggil method model untuk melakukan update data karyawan
        $this->PengaduanModel->update_pengaduan($id, $data);

        // Redirect kembali ke halaman index atau halaman lain setelah update berhasil
        redirect('pengaduan/index');
    }


    public function delete($id)
    {
        $this->PengaduanModel->delete_pengaduan($id);
        redirect('pengaduan/index'); // Redirect kembali ke halaman utama setelah menghapus data
    }

    public function search()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $data['pengaduan'] = $this->PengaduanModel->cari_pengaduan($keyword);
        } else {
            $data['pengaduan'] = $this->PengaduanModel->get_pengaduan();
        }

        // Load view dengan hasil pencarian
        $this->load->view('template/header');
        $this->load->view('pengaduan/index', $data);
        $this->load->view('template/footer');
    }
}
