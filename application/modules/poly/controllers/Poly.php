<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poly extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

    }
        public function koordinat()
        {   
            $data['title']='Koordinat';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['ismap']=$this->db->get('koordinatismap')->result_array();
            $this->form_validation->set_rules('nama','nama','required');
            $this->form_validation->set_rules('position','position','required');
            if($this->form_validation->run()==false ){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('koordinat',$data);
            $this->load->view('templates/footer');
        }else{
            $data=[
                'nama'=>$this->input->post('nama'),
                'position'=>$this->input->post('position')
            ];
            $this->db->insert('koordinatismap',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">New added !</div>');
            redirect('poly/koordinat');
        }
        }
        public function hapusismap($id){
            $this->db->where('id', $id);
            $this->db->delete('koordinatismap');
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">Data deleted !</div>');
            redirect('poly/koordinat');
        }
//////////// END 
}
 