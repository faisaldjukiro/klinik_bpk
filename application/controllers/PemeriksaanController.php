<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemeriksaanController extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pemeriksaan/index', $data);
    }
    
    public function resepObat()
    {
        $data['title'] = 'Resep Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->db->get('tb_obat')->result_array();
        $data['pegawai'] = $this->db->get('tb_peg')->result_array();
        $data['listobat'] = $this->Admin_model->getListObat()->result_array();
    
        $this->form_validation->set_rules('kd_peg', 'Nama Pgawai', 'required|trim',[
			"required"=>"Nama Pegawai Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('kd_obat', 'Obat', 'required|trim',[
			"required"=>"Obat Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah Keluar', 'required',[
			"required"=>"Jumlah Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('riwayat_stok', 'Stok', 'required',[
			"required"=>"Stok Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('aturan_pakai', 'Aturan Pakai', 'required',[
			"required"=>"Aturan Pakai Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required',[
			"required"=>"Tanggal Keluar Tidak Boleh Kosong"
		]);
        
        if ($this->form_validation->run() == false) {
             $this->load->view('pemeriksaan/resep',$data);
        } else {
            $this->db->insert('tb_obat_keluar', [
                'kd_obat' => $this->input->post('kd_obat'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'jumlah_keluar' => $this->input->post('jumlah_keluar'),
                'aturan_pakai' => $this->input->post('aturan_pakai'),
                'kd_peg' => $this->input->post('kd_peg'),
                'id_user' => $this->input->post('id_user'),
                'booking' => 0,
                'trs_obat' => $this->input->post('kd_peg'). '/'. $this->input->post('tgl_keluar'),
                'riwayat_stok' => $this->input->post('riwayat_stok')
            ]);
            $id = $this->input->post('kd_obat');
            $stok_data = [
                'stok' => $this->input->post('riwayat_stok'),
            ];
            $this->db->where('kd_obat', $id);
            $this->db->update('tb_obat', $stok_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Resep Obat Berhasil ditambahkan!</div>');
            redirect('pemeriksaan/resep');
        }
    }
    public function hapusResep()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('id_obat_keluar', 'ID OBAT KELUAR', 'required');
		$id = $this->input->post('id_obat_keluar');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('pemeriksaan/resep', $data);
		} else {
            $kd_obat = $this->input->post('kd_obat');
            $datajumlah = [
                'jumlah_keluar' => $this->input->post('jumlah_keluar'),
            ];
            $stok = $this->db->get_where('tb_obat', ['kd_obat' => $kd_obat])->row_array();
            $jumlah = $datajumlah['jumlah_keluar'] + $stok['stok'];
            $stokbaru = [
                'stok' => $jumlah
            ];
            $this->db->where('kd_obat',$kd_obat);
            $this->db->update('tb_obat',$stokbaru);
			// $this->db->query("DELETE FROM `tb_obat_keluar` WHERE id_obat_keluar='$id'");
            $this->db->where('id_obat_keluar', $id);
            $this->db->delete('tb_obat_keluar');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Resep berhasil di hapus!</div>');
			redirect('pemeriksaan/resep');
		}
    }
    public function pengembalianResep()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('id_obat_keluar', 'ID OBAT KELUAR', 'required');
		$id = $this->input->post('id_obat_keluar');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('pemeriksaan/resep', $data);
		} else {
            $kd_obat = $this->input->post('kd_obat');
            $jumlah_keluar = [
                'jumlah_keluar' => $this->input->post('jumlah_keluar')
            ];
            $datajumlah = [
                'jumlah_kembali' => $this->input->post('jumlah_kembali')
            ];
            $stok = $this->db->get_where('tb_obat', ['kd_obat' => $kd_obat])->row_array();
            $jumlah = $datajumlah['jumlah_kembali'] + $stok['stok'];
            $jumlah_keluar_baru = $jumlah_keluar['jumlah_keluar'] - $datajumlah['jumlah_kembali'];
            $stokbaru = [
                'stok' => $jumlah
            ];

            $this->db->where('kd_obat',$kd_obat);
            $this->db->update('tb_obat',$stokbaru);
			$this->db->query("UPDATE tb_obat_keluar SET jumlah_keluar='$jumlah_keluar_baru', riwayat_stok = '$jumlah'  WHERE id_obat_keluar='$id'");
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Resep berhasil dikembalikan!</div>');
			redirect('pemeriksaan/resep');
        }
    }
    
    
}