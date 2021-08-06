<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SeriapiModel extends CI_Model
{
    public function getSeri($id = null)
    {
        if($id == null){
            return $this->db->get('tb_seri')->result_array();
        }else{
            return $this->db->get_where('tb_seri',['id_seri'=> $id])->result_array();
        }
    }
}
