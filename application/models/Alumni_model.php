<?php
class Alumni_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function tambah_alumni($data) {
        return $this->db->insert('alumni', $data);
    }
    
    public function get_all_alumni() {
        $this->db->select('alumni.*, jurusan.nama_jurusan');
        $this->db->from('alumni');
        $this->db->join('jurusan', 'jurusan.id = alumni.jurusan_id', 'left');
        return $this->db->get()->result();
    }
    
    public function get_alumni_by_id($id) {
        $this->db->select('alumni.*, jurusan.nama_jurusan');
        $this->db->from('alumni');
        $this->db->join('jurusan', 'jurusan.id = alumni.jurusan_id', 'left');
        $this->db->where('alumni.id', $id);
        return $this->db->get()->row();
    }
    
    public function update_alumni($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('alumni', $data);
    }
    
    public function delete_alumni($id) {
        return $this->db->delete('alumni', array('id' => $id));
    }
    
    public function search_alumni($keyword, $tahun) {
        $this->db->select('alumni.*, jurusan.nama_jurusan');
        $this->db->from('alumni');
        $this->db->join('jurusan', 'jurusan.id = alumni.jurusan_id', 'left');
        $this->db->like('alumni.nama', $keyword);
        
        if(!empty($tahun)) {
            $this->db->where('alumni.tahun_lulus', $tahun);
        }
        
        return $this->db->get()->result();
    }
    
    public function get_statistik_tahun() {
        $this->db->select('tahun_lulus, COUNT(*) as jumlah');
        $this->db->group_by('tahun_lulus');
        $this->db->order_by('tahun_lulus', 'ASC');
        return $this->db->get('alumni')->result();
    }
    
    public function get_statistik_jurusan() {
        $this->db->select('jurusan.nama_jurusan, COUNT(alumni.id) as jumlah');
        $this->db->from('alumni');
        $this->db->join('jurusan', 'jurusan.id = alumni.jurusan_id', 'left');
        $this->db->group_by('jurusan.nama_jurusan');
        $this->db->order_by('jumlah', 'DESC');
        return $this->db->get()->result();
    }
    
    public function get_jurusan_options() {
        $this->db->select('id, nama_jurusan');
        $this->db->from('jurusan');
        return $this->db->get()->result();
    }
}
?>