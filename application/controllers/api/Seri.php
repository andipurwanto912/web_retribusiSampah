<?php

use Restserver\Libraries\REST_Controller;
// use Restserver\Libraries\RestController;
use Restserver\Libraries\Format;

require APPPATH . 'libraries/REST_Controller.php';
// require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Seri extends REST_Controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->model('SeriapiModel');
    }
    
    public function seri_get()
    {
        $id = $this->get('id_seri');
        if($id == null){
        $seri = $this->SeriapiModel->getSeri();
        }else{
        $seri = $this->SeriapiModel->getMasy($id);
        }
        
        if($seri){
            $this->response([
                'status' => '1',
                'data'   => $seri
                ], REST_Controller::HTTP_OK);
        }else{
             $this->response([
                'status' => '0',
                'message'   => 'seri tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}