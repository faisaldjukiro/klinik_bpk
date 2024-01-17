<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{
 
    public function getTotal()
    {
        $this->db->select('total_anggaran, sisa_anggaran, anggaran_digunakan');
        $this->db->from('tb_pagu');
        return $this->db->get()->row_array();
    }
}