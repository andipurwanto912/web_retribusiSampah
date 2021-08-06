<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasyapiModel extends CI_Model
{
    public function getMasy($id = null)
    {
        if($id == null){
            return $this->db->get('tb_masyarakat')->result_array();
        }else{
            return $this->db->get_where('tb_masyarakat',['id_masy'=> $id])->result_array();
        }
    }
    
    public function getNik($nik = null)
    {
         if($nik == null){
            return $this->db->get('tb_masyarakat')->result_array();
        }else{
            return $this->db->get_where('tb_masyarakat',['nik'=> $nik])->result_array();
        }
    }
}
