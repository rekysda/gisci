<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Menu_model extends CI_Model
{

        public function getSubMenu()
        {
            $query="SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` LEFT JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id`=`user_menu`.`id`          
            ";
            return $this->db->query($query)->result_array();

        }


        public function hapusDataMenu($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('user_menu');

        }

        public function getMenuById($id){
                return $this->db->get_where('user_menu', ['id' => $id])->row_array();

        }

        public function editMenuById($id){

                $data = [
                        'menu' => $this->input->post('menu',true)
                ];
                
                $this->db->where('id', $id);
                $this->db->update('menu_user', $data);
        }

        public function getSubMenuById($id){
                return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        }

        public function editSubMenuById($id){

                $data = [
                        'submenu' => $this->input->post('submenu',true)
                ];
                
                $this->db->where('id', $id);
                $this->db->update('user_sub_menu', $data);
        }
        public function hapusDataSubMenu($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('user_sub_menu');

        }

}


