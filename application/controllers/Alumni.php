<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Alumni_model');
    }
    
    public function index() {
        $data['alumni'] = $this->Alumni_model->get_all_alumni();
        $this->load->view('alumni/list', $data);
    }
    
    public function tambah() {
        $data['jurusan_options'] = $this->Alumni_model->get_jurusan_options();
        $this->load->view('alumni/tambah', $data);
    }
    
    public function simpan() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[alumni.nim]');
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|numeric');
        $this->form_validation->set_rules('jurusan_id', 'Jurusan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'email' => $this->input->post('email'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'jurusan_id' => $this->input->post('jurusan_id'),
            );
            
            $this->Alumni_model->tambah_alumni($data);
            redirect('alumni');
        }
    }
    
    public function edit($id) {
        $data['alumni'] = $this->Alumni_model->get_alumni_by_id($id);
        $data['jurusan_options'] = $this->Alumni_model->get_jurusan_options();
        $this->load->view('alumni/edit', $data);
    }
    
    public function update($id) {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|numeric');
        $this->form_validation->set_rules('jurusan_id', 'Jurusan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'email' => $this->input->post('email'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'jurusan_id' => $this->input->post('jurusan_id'),
            );
            
            $this->Alumni_model->update_alumni($id, $data);
            redirect('alumni');
        }
    }
    
    public function hapus($id) {
        $this->Alumni_model->delete_alumni($id);
        redirect('alumni');
    }
    
    public function cari() {
        $keyword = $this->input->get('keyword');
        $tahun = $this->input->get('tahun_lulus');
        
        $data['alumni'] = $this->Alumni_model->search_alumni($keyword, $tahun);
        $this->load->view('alumni/list', $data);
    }
    
    public function statistik() {
        $data['statistik_tahun'] = $this->Alumni_model->get_statistik_tahun();
        $data['statistik_jurusan'] = $this->Alumni_model->get_statistik_jurusan();
        $this->load->view('alumni/statistik', $data);
    }
}
?>