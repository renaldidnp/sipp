<?php
class PendaftaranModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat database di konstruktor model
    }

    public function get_pendaftaran()
    {
        $query = $this->db->get('pendaftaran');
        return $query->result_array();
    }

    public function get_pendaftaran_by_id($id)
    {
        $query = $this->db->get_where('pendaftaran', array('id' => $id));
        return $query->row_array();
    }

    public function create_pendaftaran($data)
    {
        return $this->db->insert('pendaftaran', $data);
    }

    public function update_pendaftaran($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pendaftaran', $data);
    }

    public function delete_pendaftaran($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pendaftaran');
    }

    public function cari_pendaftaran($keyword)
    {
        $this->db->like('nama', $keyword); // Sesuaikan dengan kolom yang ingin dicari
        $query = $this->db->get('pendaftaran');
        return $query->result_array(); // Mengembalikan array asosiatif
    }
}
