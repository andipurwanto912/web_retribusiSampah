<?php

class UserapiModel extends CI_Model
{
    public function getUser($id = null)
    {
        if($id == null){
            return $this->db->get('tb_user')->result_array();
        }else{
            return $this->db->get_where('tb_user',['id_user'=> $id])->result_array();
        }
    }
}
