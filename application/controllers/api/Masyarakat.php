<?php

use Restserver\Libraries\REST_Controller;
// use Restserver\Libraries\RestController;
use Restserver\Libraries\Format;

require APPPATH . 'libraries/REST_Controller.php';
// require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Masyarakat extends REST_Controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->model('MasyapiModel');
    }
    
    public function masyarakat_get()
    {
        $id = $this->get('id_masy');
        if($id == null){
        $masyarakat = $this->MasyapiModel->getMasy();
        }else{
        $masyarakat = $this->MasyapiModel->getMasy($id);
        }
        
        if($masyarakat){
            $this->response([
                'status' => '1',
                'data'   => $masyarakat
                ], REST_Controller::HTTP_OK);
        }else{
             $this->response([
                'status' => '0',
                'message'   => 'data tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function nik_get()
    {
        $nik = $this->get('nik');
        if($nik == null){
        $masyarakat = $this->MasyapiModel->getNik();
        }else{
        $masyarakat = $this->MasyapiModel->getNik($nik);
        }
        
        if($masyarakat){
            $this->response([
                'status' => '1',
                'data'   => $masyarakat
                ], REST_Controller::HTTP_OK);
        }else{
             $this->response([
                'status' => '0',
                'message'   => 'data tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
}