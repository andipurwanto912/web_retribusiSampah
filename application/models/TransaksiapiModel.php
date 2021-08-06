<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiapiModel extends CI_Model
{
    public function getTransaksi($id = null)
    {
        if($id == null){
            return $this->db->get('tb_transaksi')->result_array();
        }else{
            return $this->db->get_where('tb_transaksi',['id_transaksi'=> $id])->result_array();
        }
    }
    
    public function createTransaksi($data)
    {
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        
        $this->db->insert('tb_transaksi', $data);
        return $this->db->affected_rows();
    }
    
    public function validNIK($nik){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        return $this->db->where('nik', $nik);
    }
    
    public function getTransaksiByNIKMonth($nik, $month){
        return $this->db->get_where('tb_transaksi',
            [
                'bulan' => $month,
                'nik' => $nik
            ]
        );

    }
    
    
}