<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaguController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pagu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpergesran'] = $this->Admin_model->getPergeseran();
        $this->Admin_model->updatkurangeanggran();
        $this->Admin_model->updatesisaanggran();
        $data['pagu'] = $this->db->get('tb_pagu')->result_array();
        $this->db->select('RIGHT(tb_pagu.kd_pagu,5) as kode_pagu', FALSE);
		$this->db->order_by('kd_pagu','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_pagu');
			if($query->num_rows() <> 0){      
				 $dataa = $query->row();
				 $kode = intval($dataa->kode_pagu) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$data['kode_pagu'] = "PG".$batas;

        $this->form_validation->set_rules('kd_pagu', 'Kode pAgu', 'required|trim', [
            "required" => "Kode Pagu Tidak Boleh Kosong"
        ]);

        $this->form_validation->set_rules('total_anggaran', 'Total Anggaran', 'required|trim', [
            "required" => "Total Anggran Tidak Boleh Kosong"
        ]);

        $this->form_validation->set_rules('tahun_anggaran', 'Obat', 'required|trim', [
            "required" => "Obat Tidak Boleh Kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('pagu/pagu', $data);
        } else {
            $tahun = $this->input->post('tahun_anggaran');
            $this->db->where('YEAR(tahun_anggaran)',$tahun);
            $duplikat = $this->db->get('tb_pagu')->row();
            
                if($duplikat){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Sudah Ada di tahun yang sama!</div>');
                    redirect('pagu');
                }else{
                $this->db->insert('tb_pagu', [
                    'kd_pagu' => $this->input->post('kd_pagu'),
                    'total_anggaran' => str_replace(['Rp', '.'], '',$this->input->post('total_anggaran')),
                    'tahun_anggaran' => $this->input->post('tahun_anggaran'),
                    'anggaran_digunakan' => 0,
                    'sisa_anggaran' => 0,

                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pagu Berhasil ditambahkan!</div>');
                redirect('pagu');
                }
        }
    }
    public function tambahpergeseran()
    {
        $data['title'] = 'Pagu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('kd_pagu', 'Kode pAgu', 'required|trim', [
            "required" => "Kode Pagu Tidak Boleh Kosong"
        ]);

        $this->form_validation->set_rules('jumlah_pergeseran', 'Jumlah Pergeseran', 'required|trim', [
            "required" => "Jumlah Pergeseran Tidak Boleh Kosong"
        ]);

        $this->form_validation->set_rules('tgl_pergeseran', 'tgl pergeseran', 'required|trim', [
            "required" => "Tanggal Pergeseran Tidak Boleh Kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('pagu/pagu', $data);
        } else {
            $this->db->insert('tb_pegeseran_pagu', [
                'kd_pagu' => $this->input->post('kd_pagu'),
                'jumlah_pergeseran' => str_replace(['Rp', '.'], '',$this->input->post('jumlah_pergeseran')),
                'tgl_pergeseran' => $this->input->post('tgl_pergeseran'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => 'tambah'
            ]);

            $id = $this->input->post('kd_pagu');
            $data = [
                'total_anggaran' => str_replace(['Rp', '.'], '',$this->input->post('totaltambahanggaran')),
			];
            $this->db->where('kd_pagu',$id);
        	$this->db->update('tb_pagu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pergeseran Pagu Berhasil ditambahkan!</div>');
            redirect('pagu');
        }
    }

    public function kurangpergeseran()
    {
        $data['title'] = 'Pagu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('kd_pagu', 'Kode pAgu', 'required|trim', [
            "required" => "Kode Pagu Tidak Boleh Kosong"
        ]);

        $this->form_validation->set_rules('jumlah_pergeseran', 'Jumlah Pergeseran', 'required|trim', [
            "required" => "Jumlah Pergeseran Tidak Boleh Kosong"
        ]);

        $this->form_validation->set_rules('tgl_pergeseran', 'tgl pergeseran', 'required|trim', [
            "required" => "Tanggal Pergeseran Tidak Boleh Kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('pagu/pagu', $data);
        } else {
            $this->db->insert('tb_pegeseran_pagu', [
                'kd_pagu' => $this->input->post('kd_pagu'),
                'jumlah_pergeseran' => str_replace(['Rp', '.'], '',$this->input->post('jumlah_pergeseran')),
                'tgl_pergeseran' => $this->input->post('tgl_pergeseran'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => 'kurang'
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pergeseran Pagu Berhasil ditambahkan!</div>');
            redirect('pagu');
        }
    }
    public function getPagu($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->Admin_model->cekPagu($id);
        output_json($query);
    }
}