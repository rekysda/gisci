<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gis extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

    }
        public function index()
        {   
            $data['title']='Lokasi';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
            $data['lokasi']=$this->db->get('lokasi')->result_array();
            $this->form_validation->set_rules('nama','nama','required');
            $this->form_validation->set_rules('latitude','latitude','required');
            $this->form_validation->set_rules('longitude','longitude','required');
/* gmaps*/
$this->load->library('googlemaps');
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);

$marker = array();
$marker['position'] = '-7.2622734,112.7460179';
$marker['draggable'] = true;
$marker['ondragend'] = '
document.getElementById("latitude").value = event.latLng.lat();
document.getElementById("longitude").value = event.latLng.lng();
';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();
/* gmaps*/
                if($this->form_validation->run()==false ){
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('templates/topbar',$data);
                $this->load->view('gis/index',$data);
                $this->load->view('templates/footer');
            }else{
                $data=[
                    'nama'=>$this->input->post('nama'),
                    'latitude'=>$this->input->post('latitude'),
                    'longitude'=>$this->input->post('longitude')
                ];
                $this->db->insert('lokasi',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">New added !</div>');
				redirect('gis');
            }
            
        }
        public function hapusLokasi($id){
            $this->load->model('Gis_model','Gis_model');
            $this->Gis_model->hapusDataLokasi($id);
            $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">Data deleted !</div>');
            redirect('gis');
        } 

        public function editLokasi($id)
        {   
            $data['title']='Lokasi';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
            $data['lokasi']=$this->db->get('lokasi')->result_array();
            $this->load->model('Gis_model','Gis_model');
            $data['getlokasi']=$this->Gis_model->getLokasiById($id);
            $this->form_validation->set_rules('nama','nama','required');
            $this->form_validation->set_rules('latitude','latitude','required');
            $this->form_validation->set_rules('longitude','longitude','required');
            /* gmaps*/
$this->load->library('googlemaps');
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);
$latitude = $data['getlokasi']['latitude'];
$longitude = $data['getlokasi']['longitude'];
$marker = array();
$marker['position'] = "$latitude,$longitude";
$marker['draggable'] = true;
$marker['ondragend'] = '
document.getElementById("latitude").value = event.latLng.lat();
document.getElementById("longitude").value = event.latLng.lng();
';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();
/* gmaps*/
            if($this->form_validation->run()==false ){
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('templates/topbar',$data);
                $this->load->view('gis/edit',$data);
                $this->load->view('templates/footer');
            }else{
                $data=[
                    'nama'=>$this->input->post('nama'),
                    'latitude'=>$this->input->post('latitude'),
                    'longitude'=>$this->input->post('longitude'),
                ];
                $this->db->where('id', $id);
                $this->db->update('lokasi', $data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role"alert">Data edited !</div>');
				redirect('gis');
            }
            
        }
    
        public function mapmarker(){
            $data['title']='Lokasi';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
            $data['lokasi']=$this->db->get('lokasi')->result_array();
                        /* gmaps*/
$this->load->library('googlemaps');
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);

foreach($data['lokasi'] as $dt) :
$latitude = $dt['latitude'];
$longitude = $dt['longitude'];
$nama = $dt['nama'];
$marker = array();
$marker['position'] = "$latitude,$longitude";
$marker['infowindow_content'] = "$nama";
$this->googlemaps->add_marker($marker);
endforeach;

$data['map'] = $this->googlemaps->create_map();
/* gmaps*/
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('gis/mapmarker',$data);
            $this->load->view('templates/footer');

        } 
        public function mylocation(){
            $data['title']='My Location';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();
                        /* gmaps*/

$this->load->library('googlemaps');
$config['center'] = 'auto';
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);
$marker = array();
$marker['position'] = "auto";
$marker['infowindow_content'] = "NAMA";
$this->googlemaps->add_marker($marker);

$data['map'] = $this->googlemaps->create_map();
/* gmaps*/
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('gis/mylocation',$data);
            $this->load->view('templates/footer');

        } 
        public function mylocationmap($latitude,$longitude){
            $data['title']='My Location';
            $data['user']= $this->db->get_where('user',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['latitude'] = "$latitude";
            $data['longitude'] = "$longitude";
            $nama = $data['user']['name'];
            $email = $data['user']['email'];
            $image = "<img width='50px' src='".base_url('assets/img/profile/'.$data['user']['image'])."'>";
  /* gmaps*/

  $this->load->library('googlemaps');
  $config['center'] = "$latitude,$longitude";
  $config['zoom'] = 'auto';
  $this->googlemaps->initialize($config);
  $marker = array();
  $marker['position'] = "$latitude,$longitude";
  $marker['infowindow_content'] = "<table><tr><td>$image</td><td>$nama<br>$email</td></tr></table>";
  $this->googlemaps->add_marker($marker);
  
  $data['map'] = $this->googlemaps->create_map();
  /* gmaps*/
              $this->load->view('templates/header',$data);
              $this->load->view('templates/sidebar',$data);
              $this->load->view('templates/topbar',$data);
              $this->load->view('gis/mylocationmap',$data);
              $this->load->view('templates/footer');
        }
//////////// END 
}
 