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
    public function getTotalMasuk()
    {
        $query = $this->db->query("SELECT COALESCE(COUNT(tgl_masuk), 0) AS total
        FROM (
            SELECT 1 AS bulan UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION
            SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
        ) AS all_months
        LEFT JOIN tb_obat_masuk ON MONTH(tgl_masuk) = all_months.bulan AND YEAR(tgl_masuk) = 2024
        GROUP BY all_months.bulan
        ORDER BY all_months.bulan");
        $result = $query->result_array();
        $data = array_column($result, 'total');
        $json_result = json_encode( $data);
        return $json_result;
    }
    public function getTotalKeluar()
    {
        $query = $this->db->query("SELECT COALESCE(COUNT(tgl_keluar), 0) AS total
        FROM (
            SELECT 1 AS bulan UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION
            SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
        ) AS all_months
        LEFT JOIN tb_obat_keluar ON MONTH(tgl_keluar) = all_months.bulan AND YEAR(tgl_keluar) = 2024
        GROUP BY all_months.bulan
        ORDER BY all_months.bulan");
        $result = $query->result_array();
        $data = array_column($result, 'total');
        $json_result = json_encode( $data);
        return $json_result;
    }
    public function getTotalExpire()
    {
        $query = $this->db->query("SELECT COALESCE(COUNT(tb_obat_masuk.tgl_kadaluwarsa), 0) AS total
        FROM (
            SELECT 1 AS bulan UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION
            SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
        ) AS all_months
        LEFT JOIN tb_obat_masuk 
            ON MONTH(tb_obat_masuk.tgl_kadaluwarsa) = all_months.bulan 
            AND YEAR(tb_obat_masuk.tgl_kadaluwarsa) = 2024  
            AND tb_obat_masuk.tgl_kadaluwarsa < CURDATE()
        GROUP BY all_months.bulan
        ORDER BY all_months.bulan");
        
        $result = $query->result_array();
        $data = array_column($result, 'total');
        $json_result = json_encode( $data);
        return $json_result;
    }
    
    public function getObatMasukList()
    {
        $this->db->select('*');
        $this->db->from('tb_obat_masuk a');
        $this->db->join('tb_obat b','a.kd_obat = b.kd_obat');
        $this->db->order_by('id_obat_masuk','DESC');
        return $this->db->get('')->result_array();
    }
    public function getObatKeluarList()
    {
        $this->db->select('*');
        $this->db->from('tb_obat_keluar a');
        $this->db->join('tb_obat b','a.kd_obat = b.kd_obat');
        $this->db->order_by('id_obat_keluar','DESC');
        return $this->db->get('')->result_array();
    }
    public function getObatExpireList($tahun)
    {
        $this->db->select('a.kd_obat,b.nama_obat, COUNT(*) as obat_expire');
        $this->db->from('tb_obat_masuk a');
        $this->db->join('tb_obat b', 'a.kd_obat = b.kd_obat');
        $this->db->where('YEAR(a.tgl_kadaluwarsa)', $tahun);
        $this->db->where('a.tgl_kadaluwarsa <', date('Y-m-d'));
        $this->db->group_by('a.kd_obat');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getObatMinList()
    {
        $this->db->select('*');
        $this->db->from('tb_obat');
        $this->db->where('stok <',10);
        return $this->db->get()->result_array();
    }
}