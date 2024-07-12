<?php
class AuthModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function check_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password); // Anda dapat menggunakan enkripsi yang lebih kuat
        $query = $this->db->get('user'); // Gantilah 'users' dengan nama tabel yang sesuai di database Anda

        return $query->row_array(); // Mengembalikan satu baris data user jika ditemukan
    }
}
