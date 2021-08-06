<?php

use Restserver\Libraries\REST_Controller;
// use Restserver\Libraries\RestController;
use Restserver\Libraries\Format;

require APPPATH . 'libraries/REST_Controller.php';
// require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Transaksi extends REST_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('TransaksiapiModel','transaksi');
    }
    
    public function transaksi_get()
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
         
        $id = $this->get('id_transaksi');
        if($id == null){
        $transaksi = $this->transaksi->getTransaksi();
        }else{
        $transaksi = $this->transaksi->getTransaksi($id);
        }
        
        if($transaksi){
            $this->response([
                'status' => '1',
                'data'   => $transaksi
                ], REST_Controller::HTTP_OK);
        }else{
             $this->response([
                'status' => '0',
                'message'   => 'transaksi tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function transaksi_post()
    {   
        $alreadyPayment = $this->transaksi->getTransaksiByNIKMonth($this->input->post('nik'), $this->input->post('bulan'));
        
        $validNik = $this->db->get_where('tb_masyarakat', 
        ['nik' => $this->post('nik')]);
        
        if($alreadyPayment->num_rows()> 0){
            return $this->response([
                'status' => '0',
                'message' => 'Anda sudah membayar bulan ini'
            ], 403);
        }else{
            if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan . $tahun;
            } else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan . $tahun;
            }

            if($validNik->num_rows() > 0){
                $data = [
                    'bulan'        => $this->post('bulan'),
                    'nik'          => $this->post('nik'),
                    'nama_lengkap' => $this->post('nama_lengkap'),
                    'alamat'       => $this->post('alamat'),
                    'kelurahan'    => $this->post('kelurahan'),
                    'kecamatan'    => $this->post('kecamatan'),
                    'seri'         => $this->post('seri'),
                    'jml_bayar'    => $this->post('jml_bayar'),
                ];
    
                // var_dump($data);
                
                if ($this->transaksi->createTransaksi($data) > 0)
                {
                    $this->response([
                        'status' => '1',
                        'message'   => 'pembayaran berhasil'
                        ], REST_Controller::HTTP_CREATED);
                }else{
                    $this->response([
                        'status' => '0',
                        'message'   => 'pembayaran gagal'
                        ], REST_Controller::HTTP_NOT_FOUND);
                }   
            }else{
                return $this->response([
                    'status' => '0',
                    'message' => 'NIK tidak valid'
                ], 400);
            }

        }
    }
}