<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterController extends CI_Controller {

	    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
	public function index()
	{
		$data['title'] = 'Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('id_supplier','DESC');
        $data['supplier'] = $this->db->get('tb_supplier')->result_array();
		$this->load->view('data_master/index', $data);
       
	}
	
	public function t_supplier()
	{
		$data['title'] = 'Tambah Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required',[
			"required"=>"Nama Supplier Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required',[
			"required"=>"Nomor Televon Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('alamat_suplier', 'Alamat Supplier', 'required',[
			"required"=>"Alamat Tidak Boleh Kosong"
		]);
        if ($this->form_validation->run() == false) {
            $this->load->view('data_master/supplier_tambah', $data);
        } else {
            $this->db->insert('tb_supplier', [
                'nama_supplier' => $this->input->post('nama_supplier'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat_suplier' => $this->input->post('alamat_suplier')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supplier baru ditambahkan!</div>');
            redirect('master/supplier');
        }
	}

	public function e_supplier($id)
	{
		$data['title'] = 'Edit Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['supplier'] = $this->db->get_where('tb_supplier', ['id_supplier' => $id])->row_array();
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required',[
			"required"=>"Nama Supplier Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required',[
			"required"=>"Nomor Televon Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('alamat_suplier', 'Alamat Supplier', 'required',[
			"required"=>"Alamat Tidak Boleh Kosong"
		]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('data_master/supplier_edit', $data);
        } else {
            $id = $this->input->post('id_supplier');
			$data = [
				'nama_supplier' => $this->input->post('nama_supplier'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat_suplier' => $this->input->post('alamat_suplier')
			];
			$this->db->where('id_supplier',$id);
        	$this->db->update('tb_supplier',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supplier Berhasil di edit!</div>');
            redirect('master/supplier');
        }
	}

	public function h_supplier()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('id_supplier', 'Id', 'required');
	
		$id = $this->input->post('id_supplier');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('master/supplier/', $data);
		} else {
			$this->db->query("DELETE FROM `tb_supplier` WHERE id_supplier='$id'");
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Suplier berhasil di hapus!</div>');
			redirect('master/supplier/');
		}
	}
	
	public function satuan()
	{
		$data['title'] = 'Satuan Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('id_satuan','DESC');
        $data['satuan'] = $this->db->get('tb_satuan')->result_array();
		$this->load->view('data_master/satuan', $data);
       
	}
	
	public function t_satuan()
	{
		$data['title'] = 'Tambah Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required',[
			"required"=>"Nama Satuan Tidak Boleh Kosong"
		]);
       
        
        if ($this->form_validation->run() == false) {
            $this->load->view('data_master/satuan_tambah', $data);
        } else {
            $this->db->insert('tb_satuan', [
                'nama_satuan' => $this->input->post('nama_satuan')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Satuan baru ditambahkan!</div>');
            redirect('master/satuan');
        }
	}

	public function e_satuan($id)
	{
		$data['title'] = 'Edit Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['satuan'] = $this->db->get_where('tb_satuan', ['id_satuan' => $id])->row_array();
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required',[
			"required"=>"Nama Satuan Tidak Boleh Kosong"
		]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('data_master/satuan_edit', $data);
        } else {
            $id = $this->input->post('id_satuan');
			$data = [
				'nama_satuan' => $this->input->post('nama_satuan'),
               
			];
			$this->db->where('id_satuan',$id);
        	$this->db->update('tb_satuan',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Satuan Berhasil di edit!</div>');
            redirect('master/satuan');
        }
	}

	public function h_satuan()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('id_satuan', 'Id', 'required');
	
		$id = $this->input->post('id_satuan');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('master/satuan/', $data);
		} else {
			$this->db->query("DELETE FROM `tb_satuan` WHERE id_satuan='$id'");
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Satuan berhasil di hapus!</div>');
			redirect('master/satuan/');
		}
	}
	
	public function get_items_json() {
        $items = $this->AllModel->get_items();
        echo json_encode($items);
    }

	public function obat()
	{
		$data['title'] = 'Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('kd_obat ','DESC');
		$this->db->join('tb_satuan b','b.id_satuan = a.id_satuan');
        $data['obat'] = $this->db->get('tb_obat a')->result_array();
		$this->load->view('data_master/obat', $data);
       
	}
	
	public function t_obat()
	{
		$data['title'] = 'Tambah Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['satuan'] = $this->db->get('tb_satuan')->result_array();
		$this->db->select('RIGHT(tb_obat.kd_obat,5) as kode_obat', FALSE);
		$this->db->order_by('kd_obat','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_obat');
			if($query->num_rows() <> 0){      
				 $dataa = $query->row();
				 $kode = intval($dataa->kode_obat) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$data['kode_obat'] = "OBT".$batas;
		// var_dump($kodetampil);
		// die();
		
		$this->form_validation->set_rules('kd_obat', 'Kode Obat', 'required',[
			"required"=>"Kode Obat Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required',[
			"required"=>"Nama obat Tidak Boleh Kosong"
		]);
        $this->form_validation->set_rules('id_satuan', 'Nama Satuan', 'required',[
			"required"=>"Nama Satuan Tidak Boleh Kosong"
		]);
        if ($this->form_validation->run() == false) {
            $this->load->view('data_master/obat_tambah', $data);
        } else {
            $this->db->insert('tb_obat', [
                'kd_obat' => $this->input->post('kd_obat'),
                'nama_obat' => $this->input->post('nama_obat'),
                'id_satuan' => $this->input->post('id_satuan'),
                'stok' => 0
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Obat baru ditambahkan!</div>');
            redirect('master/obat');
        }
	}

	public function e_obat($id)
	{
		$data['title'] = 'Edit Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['satuan'] = $this->db->get_where('tb_satuan', ['id_satuan' => $id])->row_array();
		$data['obat'] = $this->db->get_where('tb_obat',['kd_obat' =>$id])->row_array();
		$data['satuanedit'] = $this->db->get('tb_satuan')->result_array();
        $this->form_validation->set_rules('kd_obat', 'KOde Obat', 'required',[
			"required"=>"Nama Satuan Tidak Boleh Kosong"
		]);
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required',[
			"required"=>"Nama Satuan Tidak Boleh Kosong"
		]);
		$this->form_validation->set_rules('id_satuan', 'Satuan', 'required',[
			"required"=>"Nama Satuan Tidak Boleh Kosong"
		]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('data_master/obat_edit', $data);
        } else {
            $id = $this->input->post('kd_obat');
			$data = [
				'kd_obat' => $this->input->post('kd_obat'),
				'nama_obat' => $this->input->post('nama_obat'),
				'id_satuan' => $this->input->post('id_satuan'),
			];
			$this->db->where('kd_obat',$id);
        	$this->db->update('tb_obat',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data oObat Berhasil di edit!</div>');
            redirect('master/obat');
        }
	}

	public function h_obat()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kd_obat', 'Kode Obat', 'required');
	
		$id = $this->input->post('kd_obat');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('master/obat', $data);
		} else {
			$this->db->query("DELETE FROM `tb_obat` WHERE kd_obat='$id'");
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Obat berhasil di hapus!</div>');
			redirect('master/obat');
		}
	}
}