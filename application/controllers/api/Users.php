<?php

use Restserver\Libraries\REST_Controller;
// use Restserver\Libraries\RestController;
use Restserver\Libraries\Format;

require APPPATH . 'libraries/REST_Controller.php';
// require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Users extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserapiModel');
    }

    /**
     * Register
     * @method : post
     * url : api/users/register/
     */
    /**
     * Login User
     * @param : email dan password
     * link : api/users/login
     * @method : post
     */
    public function login_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        if (!empty($email) && !empty($password)) {
            // var_dump($user);
            // die();
            $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
            if ($user != NULL) {
                $passwordValid = password_verify($password, $user['password']);

                if ($passwordValid) {
                    $this->response([
                        'status' => '1',
                        'message' => 'User login successful.',
                        'data' => $user
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $this->response("Email tidak terdaftar", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response("Harap isi form yang ada", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_get()
    {
        $id = $this->get('id_user');
        if($id == null){
        $user = $this->UserapiModel->getUser();
        }else{
        $user = $this->UserapiModel->getUser($id);
        }
        
        if($user){
            $this->response([
                'status' => '1',
                'data'   => $user
                ], REST_Controller::HTTP_OK);
        }else{
             $this->response([
                'status' => '0',
                'message'   => 'data tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
        
}
