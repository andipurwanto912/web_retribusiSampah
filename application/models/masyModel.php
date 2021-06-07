<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masyModel extends CI_Model
{
    public function create($data)
    {
        $this->db->insert('tb_masyarakat', $data);
        return $this->db->affected_rows();
    }
}
