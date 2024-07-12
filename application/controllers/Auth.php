
<?php
// application/controllers/Auth.php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('template/login_header');
        $this->load->view('auth/login');
        $this->load->view('template/login_footer');
    }

    public function login()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman login
            redirect('auth');
        } else {
            // Ambil data dari form
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Cek login menggunakan model
            $user = $this->auth->check_login($email, $password);

            if ($user) {
                // Jika user ditemukan, buat session dan redirect ke halaman dashboard misalnya
                $this->session->set_userdata('user_logged', $user);
                redirect('dashboard'); // Ganti 'dashboard' dengan halaman setelah login berhasil
            } else {
                // Jika user tidak ditemukan, kembali ke halaman login dengan pesan error
                $this->session->set_flashdata('error', 'Email atau password salah');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        // Hapus semua session dan redirect ke halaman login
        $this->session->sess_destroy();
        redirect('auth');
    }
}
