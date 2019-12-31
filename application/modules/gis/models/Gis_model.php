<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Gis_model extends CI_Model
{

        public function hapusDataLokasi($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('lokasi');

        }

        public function getLokasiById($id){
                return $this->db->get_where('lokasi', ['id' => $id])->row_array();

        }

}


