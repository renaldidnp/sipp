<?php
class PengaduanModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat database di konstruktor model
    }

    public function get_pengaduan()
    {
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }

    public function get_pengaduan_by_id($id)
    {
        $query = $this->db->get_where('pengaduan', array('id' => $id));
        return $query->row_array();
    }

    public function create_pengaduan($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    public function update_pengaduan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengaduan', $data);
    }

    public function delete_pengaduan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pengaduan');
    }
    public function cari_pengaduan($keyword)
    {
        $this->db->like('keterangan_pengaduan', $keyword); // Sesuaikan dengan kolom yang ingin dicari
        $query = $this->db->get('pengaduan');
        return $query->result_array(); // Mengembalikan array asosiatif
    }
}
