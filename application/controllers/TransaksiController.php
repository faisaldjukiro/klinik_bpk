<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TransaksiController extends CI_Controller {
    
  
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
	public function index()
	{
		$data['title'] = 'Obat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('tb_supplier b', 'a.id_supplier = b.id_supplier');
        $this->db->join('tb_obat c', 'a.kd_obat = c.kd_obat');
        $this->db->join('user d', 'a.id_user = d.id_user');
        $this->db->join('tb_satuan e', 'c.id_satuan = e.id_satuan');
        $this->db->order_by('a.id_obat_masuk','DESC');
        $data['obat_masuk'] = $this->db->get('tb_obat_masuk a')->result_array();
		$this->load->view('transaksi/obat_masuk', $data);
	}

    public function t_obatMasuk()
	{
		$data['title']  = 'Tambah Obat Masuk';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->db->get('tb_obat')->result_array();
        $data['supplier'] = $this->db->get('tb_supplier')->result_array();
        $this->form_validation->set_rules('id_supplier', 'Nama Supplier', 'required',[
			"required"=>"Nama Supplier Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('kd_obat', 'Nama Obat', 'required',[
			"required"=>"Nama Obat Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required',[
			"required"=>"Harga Satuan Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required',[
			"required"=>"Harga Satuan Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masukr', 'required',[
			"required"=>"Jumlah Masuk Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required',[
			"required"=>"Tanggal Masuk Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('tgl_kadaluwarsa', 'Tanggal Kadaluwarsa', 'required',[
			"required"=>"Tanggal Kadaluwarsa Tidak Boleh Kosong"
		]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('transaksi/obat_masuk_t', $data);
        } else {
            $this->db->insert('tb_obat_masuk', [
                'id_supplier' => $this->input->post('id_supplier'),
                'id_user' => $this->input->post('id_user'),
                'kd_obat' => $this->input->post('kd_obat'),
                'harga_satuan' => str_replace(['Rp', '.'], '',$this->input->post('harga_satuan')),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_kadaluwarsa' => $this->input->post('tgl_kadaluwarsa'),
                'riwayat_stok' => $this->input->post('riwayat_stok'),
            ]);
            $id = $this->input->post('kd_obat');
            $data = [
                'stok' => $this->input->post('riwayat_stok'),
			];
            $this->db->where('kd_obat',$id);
        	$this->db->update('tb_obat',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Obat Masuk ditambahkan!</div>');
            redirect('transaksi/obat-masuk');
        }
	}
    
    public function getStok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->Admin_model->cekStok($id);
        output_json($query);
    }
    public function getPagu($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->Admin_model->cekPagu($id);
        output_json($query);
    }

    public function obatKeluar()
	{
		$data['title'] = 'Obat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat_keluar'] = $this->db->query("SELECT
        a.id_obat_keluar,
        a.tgl_keluar,
        b.nama_lengkap,
        d.nama_subbagian,
        GROUP_CONCAT(CONCAT(a.jumlah_keluar, ' ', c.nama_obat) ORDER BY a.kd_obat SEPARATOR ', ') as jumlah_keluar
        FROM tb_obat_keluar as a
        INNER JOIN tb_peg as b ON a.kd_peg = b.kd_peg
        INNER JOIN tb_obat as c ON a.kd_obat = c.kd_obat
        INNER JOIN tb_subbagian as d ON b.id_subbagian = d.id_subbagian
        GROUP BY a.trs_obat")->result_array();
		$this->load->view('transaksi/obat_keluar', $data);
	}

    public function riwayatObat()
    {
        $data['title'] = 'Riwayat Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['riwayat'] = $this->db->query("SELECT 'Obat Masuk' as tipe, a.tgl_masuk as tgl_transaksi, b.nama as nama, c.nama_subbagian as nama_sub, d.nama_obat as nama_obat, a.jumlah_masuk as jumlah, a.riwayat_stok as riwayat
        FROM tb_obat_masuk as a
        INNER JOIN user as b ON a.id_user = b.id_user
        INNER JOIN tb_subbagian as c ON b.id_subbagian = c.id_subbagian
        INNER JOIN tb_obat as d ON a.kd_obat = d.kd_obat
        UNION
        SELECT 'Obat Keluar' as tipe,  a.tgl_keluar as tgl_transaksi , b.nama_lengkap as nama, c.nama_subbagian as nama_sub, d.nama_obat as nama_obat, a.jumlah_keluar as jumlah, a.riwayat_stok as riwayat
        FROM tb_obat_keluar as a
        INNER JOIN tb_peg as b ON a.kd_peg = b.kd_peg
        INNER JOIN tb_subbagian as c ON b.id_subbagian = c.id_subbagian
        INNER JOIN tb_obat as d ON a.kd_obat = d.kd_obat
        ORDER BY tgl_transaksi DESC")->result_array();
        $this->load->view('transaksi/riwayat_obat',$data);
    }

    public function exportRiwayatt() {
       $start_date = $this->input->post('start_date');
       $end_date = $this->input->post('end_date'); 
       $spreadsheet = new Spreadsheet();
       $spreadsheet->getProperties()->setCreator("Your Name")
                                   ->setLastModifiedBy("Your Name")
                                   ->setTitle("Excel Export")
                                   ->setSubject("Excel Export")
                                   ->setDescription("Export data to Excel")
                                   ->setKeywords("excel php codeigniter")
                                   ->setCategory("Export");
       $data = $this->Admin_model->exportRiwayat($start_date, $end_date);
       $spreadsheet->setActiveSheetIndex(0)
                   ->setCellValue('A1', 'Tipe')
                   ->setCellValue('B1', 'Tanggal Transaksi')
                   ->setCellValue('C1', 'Nama')
                   ->setCellValue('D1', 'Nama Sub')
                   ->setCellValue('E1', 'Nama Obat')
                   ->setCellValue('F1', 'Jumlah')
                   ->setCellValue('G1', 'Riwayat');
       $row = 2;
       foreach ($data as $item) {
           $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $item['tipe'])
                                         ->setCellValue('B' . $row, $item['tgl_transaksi'])
                                         ->setCellValue('C' . $row, $item['nama'])
                                         ->setCellValue('D' . $row, $item['nama_sub'])
                                         ->setCellValue('E' . $row, $item['nama_obat'])
                                         ->setCellValue('F' . $row, $item['jumlah'])
                                         ->setCellValue('G' . $row, $item['riwayat']);
           $row++;
       }
       $spreadsheet->getActiveSheet()->setTitle('Sheet 1');
       $spreadsheet->setActiveSheetIndex(0);
       $filename = 'Riwayat Stok ' . date('Y-m-d') . '.xlsx';
       $writer = new Xlsx($spreadsheet);
       ob_end_clean();
       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header('Content-Disposition: attachment;filename="' . $filename . '"');
       header('Cache-Control: max-age=0');
       $writer->save('php://output');
       exit();
    }
}
    