<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('urutan','DESC');
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('settings/index', $data);
        } else {
            $this->db->insert('user_menu', [
                'menu' => $this->input->post('menu'),
                'urutan' => $this->input->post('urutan')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan!</div>');
            redirect('settings');
        }
    }

    public function editMenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('urutan', 'urutan', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'menu' => $this->input->post('menu'),
                'urutan' => $this->input->post('urutan')
                
            ];
            $this->db->where('id',$id);
            $this->db->update('user_menu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil di ubah!</div>');
            redirect('settings');
        }
    }

    public function hapusMenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('id', 'Id', 'required');
       
        $id = $this->input->post('id');
        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings', $data);
        } else {
            $this->db->query("DELETE FROM `user_menu` WHERE id='$id'");
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu berhasil di hapus!</div>');
            redirect('settings');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/submenu', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru ditambahkan!</div>');
            redirect('settings/submenu');
        }
    }
    
    public function editSubmenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/submenu', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                // 'id' => $this->db->post('id'),
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'urutan' => $this->input->post('urutan'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->where('id',$id);
            $this->db->update('user_sub_menu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil di ubah!</div>');
            redirect('settings/submenu');
        }
    }

    public function hapusSubmenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('id', 'Id', 'required');
       
        $id = $this->input->post('id');
        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/submenu', $data);
        } else {
            $this->db->query("DELETE FROM `user_sub_menu` WHERE id='$id'");
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Submenu berhasil di hapus!</div>');
            redirect('settings/submenu');
        }
    }


    public function user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'user');
        
        $data['userr'] = $this->user->getUser();
        $data['subbagiann'] = $this->db->get('tb_subbagian')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok !',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/user', $data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'id_subbagian' => $this->input->post('id_subbagian'),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User baru ditambahkan!</div>');
            redirect('settings/user');
        }
    }

    public function edit_user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok !',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|matches[password1]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/user', $data);
        } else {
            $id = $this->input->post('id_user');
            $email = $this->input->post('email', true);
            $password = $this->input->post('password1');
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'id_subbagian' => $this->input->post('id_subbagian'),
                'date_created' => time()
            ];
            if (!empty($password)){
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            $this->db->where('id_user',$id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Di Edit!</div>');
            redirect('settings/user');
        }
    }
    
    public function role()
    {
        $data['title'] = 'Role Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('settings/role', $data);
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru ditambahkan!</div>');
            redirect('settings/role');
        }
    }
    
    public function editRole()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/role', $data);
        } else {
            $id = $this->input->post('role_id');
            $data = [
                'role' => $this->input->post('role')
                
            ];
            $this->db->where('role_id',$id);
            $this->db->update('user_role',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil di ubah!</div>');
            redirect('settings/role');
        }
    }

    public function hapusRole()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->model('Menu_model', 'menu');

        // $data['subMenu'] = $this->menu->getSubMenu();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role_id', 'Id', 'required');
       
        $id = $this->input->post('role_id');
        if ($this->form_validation->run() ==  false) {
            $this->load->view('settings/role', $data);
        } else {
            $this->db->query("DELETE FROM `user_role` WHERE role_id='$id'");
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role berhasil di hapus!</div>');
            redirect('settings/role');
        }
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['role_id' => $role_id])->row_array();

        $this->db->where('id !=', 0);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('settings/role-access', $data);
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses berhasil di simpan!</div>');
    }

    
}