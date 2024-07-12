<?php
class PelaporanModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat database di konstruktor model
    }

    public function get_pelaporan()
    {
        $query = $this->db->get('pelaporan');
        return $query->result_array();
    }

    public function get_pelaporan_by_id($id)
    {
        $query = $this->db->get_where('pelaporan', array('id' => $id));
        return $query->row_array();
    }

    public function create_pelaporan($data)
    {
        return $this->db->insert('pelaporan', $data);
    }

    public function update_pelaporan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pelaporan', $data);
    }

    public function delete_pelaporan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pelaporan');
    }

    public function cari_pelaporan($keyword)
    {
        $this->db->like('nama_pelapor', $keyword); // Sesuaikan dengan kolom yang ingin dicari
        $query = $this->db->get('pelaporan');
        return $query->result_array(); // Mengembalikan array asosiatif
    }
}
