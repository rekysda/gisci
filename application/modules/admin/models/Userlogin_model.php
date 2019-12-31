<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Userlogin_model extends CI_Model
{

        public function getuserLogin()
        {
            $query="SELECT `user`.*,`user_role`.`role`
                    FROM `user` LEFT JOIN `user_role`
                    ON `user`.`role_id`=`user_role`.`id`          
            ";
            return $this->db->query($query)->result_array();

        }
        public function getUserloginById($id){
                return $this->db->get_where('user', ['id' => $id])->row_array();

        }
        function delete_user($id)
        {
            return $this->db->delete('user',array('id'=>$id));
        }
}