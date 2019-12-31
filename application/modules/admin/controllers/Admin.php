<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            is_logged_in();
        }
        
        public function index()
        {   
            $data['title']='Dashboard';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/index',$data);
            $this->load->view('templates/footer');

        }
        
        public function role()
        {   
            $data['title']='Role';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['role']=$this->db->get('user_role')->result_array();
            $this->form_validation->set_rules('role','Role','required');
            if($this->form_validation->run()==false ){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/role',$data);
            $this->load->view('templates/footer');
            }else{
                $data=[
                    'role'=>htmlspecialchars($this->input->post('role'))
                ];
                $this->db->insert('user_role',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">New Role added !</div>');
				redirect('admin/role');   
            }

        }
        
        public function roleaccess($role_id)
        {   
            $data['title']='Role Access';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['role']=$this->db->get_where('user_role',['id'=>$role_id])->row_array();
            
            $this->db->where('id!=',1);
            $data['menu']=$this->db->get('user_menu')->result_array();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/role-access',$data);
            $this->load->view('templates/footer');

        }

        public function changeAccess()
        {
            $menu_id=$this->input->post('menuId');
            $role_id=$this->input->post('roleId');

            $data=[
                'role_id'=> $role_id,
                'menu_id'=> $menu_id
            ];
            $result = $this->db->get_where('user_access_menu',$data);
            if($result->num_rows()<1){
                $this->db->insert('user_access_menu',$data);
            }else{
                $this->db->delete('user_access_menu',$data);
            }
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">Access Changed!</div>');
        } 

        public function userlogin()
        {
            $data['title']='User Login';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
            $this->load->model('Userlogin_model','userlogin');
            
            $data['userlogin']=$this->userlogin->getuserLogin();
            $data['role']=$this->db->get('user_role')->result_array();

            $this->form_validation->set_rules('username','Username','trim|required|is_unique[user.username]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password','password','trim|required');
            $this->form_validation->set_rules('name','Full Name','required');
            $this->form_validation->set_rules('role_id','Role','required');
            
            if($this->form_validation->run()==false ){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/userlogin',$data);
            $this->load->view('templates/footer');
            }else
            {
                $data=[
                    'email'=>htmlspecialchars($this->input->post('email')),
                    'username'=>htmlspecialchars($this->input->post('username')),
                    'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'image'=>'default.jpg',
                    'role_id'=>$this->input->post('role_id'),
                    'is_active'=>$this->input->post('is_active'),
                    'date_created'=>time()
                ];
                $this->db->insert('user',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">New UserLogin added !</div>');
				redirect('admin/userlogin');
            }
        }

        public function useredit($id)
        {   
            $data['title']='User Login';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
            $this->load->model('Userlogin_model','userlogin');
            
            $data['userlogin']=$this->userlogin->getuserLogin();
            $data['getuserlogin']=$this->userlogin->getUserloginById($id);
            $data['role']=$this->db->get('user_role')->result_array();
            $this->form_validation->set_rules('name','Full Name','required|trim');
            $this->form_validation->set_rules('role_id','Role','required');

            if($this->form_validation->run()==false)
            {
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('templates/topbar',$data);
                $this->load->view('admin/userloginedit',$data);
                $this->load->view('templates/footer');
            }else{
                $name=$this->input->post('name');
                $username=$this->input->post('username');
                $email=$this->input->post('email');
                $password=$this->input->post('password');
                $role_id=$this->input->post('role_id');
                $is_active=$this->input->post('is_active');
                // Jika Ada Gambar
                $upload_image = $_FILES['image']['name'];

                if($upload_image){
                    $config['allowed_types'] = 'jpg';
                    $config['max_size']     = '100';
                    $config['upload_path'] = './assets/img/profile/';
                    $config['file_name'] 			= round(microtime(true)*1000);
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('image'))
                    {
                        $old_image=$data['getuserlogin']['image'];
                        if($old_image!='default.jpg'){
                            unlink(FCPATH.'assets/img/profile/'. $old_image);

                        }
                           $new_image=$this->upload->data('file_name');
                           $this->db->set('image',$new_image);
                    }
                    else
                    {
                           echo  $this->upload->display_errors();    
                     }
                }
                if($password){
                    $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                    $this->db->set('password',$password);
                }
                $this->db->set('name',$name);
                $this->db->set('is_active',$is_active);
                $this->db->where('email',$email);
                $this->db->update('user');

                $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">
                User Login has been updated!</div>');
                redirect('admin/userlogin');
            }

        }

        public function userdelete($id){
            $this->load->model('Userlogin_model','user_model');
            $data['getuserlogin']=$this->user_model->getUserloginById($id);
            $old_image=$data['getuserlogin']['image'];
            if($old_image!='default.jpg'){
                unlink(FCPATH.'assets/img/profile/'. $old_image);

            }
            $this->user_model->delete_user($id);
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">User Login deleted !</div>');
            redirect('admin/userlogin');
        } 

        public function roleEdit($id)
        {   
            $data['title']='Role';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
            $data['role']=$this->db->get('user_role')->result_array();
            $this->load->model('User_role_model','role_model');
            $data['getrole']=$this->role_model->get_user_role($id);
            $this->form_validation->set_rules('role','Role','required');
            
            if($this->form_validation->run()==false ){
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('templates/topbar',$data);
                $this->load->view('admin/roleedit',$data);
                $this->load->view('templates/footer');
            }else{
                $id=$this->input->post('id');
                $data=[
                    'role'=>$this->input->post('role')
                ];
                $this->role_model->update_user_role($id,$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">New Role edited !</div>');
				redirect('admin/role');
            }
            
        }

        public function roleDelete($id){
            $this->load->model('User_role_model','role_model');
            $this->role_model->delete_user_role($id);
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">Role deleted !</div>');
            redirect('admin/role');
        } 

        public function websetting()
        {   
            $data['title']='Web Setting';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
           
            $data['websetting']=$this->db->get('web_setting')->result_array();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/websetting',$data);
            $this->load->view('templates/footer');

        }

        public function changeWebsetting()
        {
            $name=$this->input->post('name');
            $is_active=$this->input->post('is_active');
            /*
            $this->db->set('is_active',$is_active);
                $this->db->where('name',$name);
                $this->db->update('web_setting');
*/
if($is_active=='0'){
$this->db->set('is_active','1');
}else{
    $this->db->set('is_active','0');   
}
$this->db->where('name',$name);
$this->db->update('web_setting');
               
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">Web Setting Changed!</div>');
        }
/// END //////////////////
}
 