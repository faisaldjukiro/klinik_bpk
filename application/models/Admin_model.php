<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function cekStok($id)
    {
        $this->db->join('tb_satuan s', 'b.id_satuan=s.id_satuan');
        return $this->db->get_where('tb_obat b', ['kd_obat' => $id])->row_array();
    }

    public function cekPagu($id)
    {
        // $this->db->join('tb_satuan s', 'b.id_satuan=s.id_satuan');
        return $this->db->get_where('tb_pagu ', ['kd_pagu' => $id])->row_array();
    }


    public function getStokByKodeObat($kd_obat)
    {
        $query = $this->db->select('stok')
            ->from('tb_obat')
            ->where('kd_obat', $kd_obat)
            ->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->stok;
        } else {
            return 0;
        }
    }
    public function create($data)
    {
        $this->db->insert('tb_obat_keluar', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }
    public function getPergeseran()
    {
        $this->db->select('*');
        $this->db->from('tb_pegeseran_pagu');
        $this->db->order_by('id_pergeseran','DESC');
        return $this->db->get()->result_array();

    }

    public function getListObat()
    {
        $this->db->select('*');
        $this->db->from('tb_obat_keluar a');
        $this->db->join('tb_obat b', 'b.kd_obat = a.kd_obat');
        $this->db->join('tb_peg c', 'c.kd_peg = a.kd_peg');
        $this->db->order_by('a.id_obat_keluar', 'DESC');
        return $this->db->get();
    }
    public function updatkurangeanggran()
    {
        $data = $this->db->query('UPDATE tb_pagu
        SET anggaran_digunakan = (
            SELECT COALESCE(SUM(harga_satuan * jumlah_masuk), 0)
            FROM tb_obat_masuk
            WHERE YEAR(tgl_masuk) = YEAR(tb_pagu.tahun_anggaran)
        )
        +
        (
            SELECT COALESCE(SUM(jumlah_pergeseran), 0)
            FROM tb_pegeseran_pagu
            WHERE kd_pagu = tb_pagu.kd_pagu AND
            status = "kurang"
        )
        WHERE EXISTS (
            SELECT 1
            FROM tb_obat_masuk
            WHERE YEAR(tgl_masuk) = YEAR(tb_pagu.tahun_anggaran)
        )
        OR EXISTS (
            SELECT 1
            FROM tb_pegeseran_pagu
            WHERE kd_pagu = tb_pagu.kd_pagu AND
            status = "kurang"
        )');
         return $data;
    }
    
    public function updatesisaanggran()
    {
        $data = $this->db->query('UPDATE tb_pagu
        SET sisa_anggaran = total_anggaran - anggaran_digunakan
        ');
        return $data;
    }
    public function exportRiwayat($start_date,$end_date)
    {
        $data = $this->db->query("SELECT 'Obat Masuk' as tipe, a.tgl_masuk as tgl_transaksi, b.nama as nama, c.nama_subbagian as nama_sub, d.nama_obat as nama_obat, a.jumlah_masuk as jumlah, a.riwayat_stok as riwayat
        FROM tb_obat_masuk as a
        INNER JOIN user as b ON a.id_user = b.id_user
        INNER JOIN tb_subbagian as c ON b.id_subbagian = c.id_subbagian
        INNER JOIN tb_obat as d ON a.kd_obat = d.kd_obat
        WHERE a.tgl_masuk BETWEEN '$start_date' AND '$end_date'
        UNION
        SELECT 'Obat Keluar' as tipe,  a.tgl_keluar as tgl_transaksi, b.nama_lengkap as nama, c.nama_subbagian as nama_sub, d.nama_obat as nama_obat, a.jumlah_keluar as jumlah, a.riwayat_stok as riwayat
        FROM tb_obat_keluar as a
        INNER JOIN tb_peg as b ON a.kd_peg = b.kd_peg
        INNER JOIN tb_subbagian as c ON b.id_subbagian = c.id_subbagian
        INNER JOIN tb_obat as d ON a.kd_obat = d.kd_obat
        WHERE a.tgl_keluar BETWEEN '$start_date' AND '$end_date'
        ORDER BY tgl_transaksi DESC")->result_array();
        return $data;
    }

}