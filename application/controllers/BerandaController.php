<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerandaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $tahun = 2024;
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total'] = $this->Beranda_model->getTotal();
        $data['obat_masuk'] = $this->Beranda_model->getTotalMasuk();
        $data['obat_keluar'] = $this->Beranda_model->getTotalKeluar();
        $data['obat_expire'] = $this->Beranda_model->getTotalExpire();
        $data['list_obatmasuk'] = $this->Beranda_model->getObatMasukList();
        $data['list_obatkeluar'] = $this->Beranda_model->getObatKeluarList();
        $data['list_obatexpire'] = $this->Beranda_model->getObatExpireList($tahun);
        $data['list_stokmin'] = $this->Beranda_model->getObatMinList();
        // var_dump($dataa);
        // die();

        $this->load->view('beranda/index', $data);

    }

}