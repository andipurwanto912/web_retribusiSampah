<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModel extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //detail masyarakat
    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tb_masyarakat', array('id_masy' => $id))->row();
        return $query;
    }
    
    //detail transaksi
    public function detail_transaksi($id = NULL)
    {
        $query = $this->db->get_where('tb_transaksi', array('id_transaksi' => $id))->row();
        return $query;
    }
    
    public function jml_total(){
        $sql = "SELECT sum(jml_bayar) as jml_bayar FROM tb_transaksi";
        $result = $this->db->query($sql);
        return $result->row()->jml_bayar;
    }

}
