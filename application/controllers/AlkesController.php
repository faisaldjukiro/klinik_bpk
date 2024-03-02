<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlkesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Alat Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alkes'] = $this->db->get('tb_alkes')->result_array();        
        $this->load->view('alkes/index', $data);

    }

}