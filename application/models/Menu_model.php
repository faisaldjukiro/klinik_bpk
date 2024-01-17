<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                  ORDER BY `user_menu`.`menu` ASC, `urutan` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user a');
        $this->db->join('user_role b','b.role_id = a.role_id');
        $data = $this->db->get()->result_array();
        return $data ;
    }
}