<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select('*');
        $this->db->from('tb_peg a');
        $this->db->join('tb_staf b', 'a.id_staf = b.id_staf');
        $this->db->join('tb_subbagian c', 'a.id_subbagian = c.id_subbagian');
        $this->db->order_by('a.kd_peg', 'DESC');
        $data['pegawai'] = $this->db->get()->result_array();
        $this->load->view('pegawai/pegawai', $data);
    }

    public function t_pegawai()
    {
        $data['title'] = 'Tambah Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staf'] = $this->db->get('tb_staf')->result_array();
        $data['subbgaian'] = $this->db->get('tb_subbagian')->result_array();
        $this->db->select('RIGHT(tb_peg.kd_peg,5) as kode_peg', FALSE);
        $this->db->order_by('kd_peg', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_peg');
        if ($query->num_rows() <> 0) {
            $dataa = $query->row();
            $kode = intval($dataa->kode_peg) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $data['kode_peg'] = "PEG" . $batas;
        // var_dump($data);
        // die();
        $this->form_validation->set_rules('kd_peg', 'Kode Pegawai', 'required', [
            "required" => "Kode Pegawai Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
            "required" => "Nama Lengkap Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('id_staf', 'Nama Staf', 'required|trim', [
            "required" => "Staf Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('id_subbagian', 'Nama Subbagian', 'required|trim', [
            "required" => "Subbagian Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            "required" => "Tanggal Lahir Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            "required" => "Jenis Kelamin Tidak Boleh Kosong"
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('pegawai/pegawai_tambah', $data);
        } else {
            $this->db->insert('tb_peg', [
                'kd_peg' => $this->input->post('kd_peg'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'id_staf' => $this->input->post('id_staf'),
                'id_subbagian' => $this->input->post('id_subbagian'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'id_kel' => 0


            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pegawai Berhasil ditambahkan!</div>');
            redirect('pegawai');
        }
    }
}
