<?php

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Users extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userapiModel');
    }

    /**
     * Register
     * @method : post
     * url : api/users/register/
     */
    public function register_post()
    {
        header('Access-Control-Allow_Origin: *');
        $_POST = $this->security->xss_clean($_POST);

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[20]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'min_length' => 'password min 8 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {

            //Form Validation Errors
            $message = array(
                'status' => false,
                'error'  => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            // print_r($_POST);
            $email = $this->input->post('email', true);
            $insert_data  = [
                'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'photo' => 'avatar-1.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' =>  time()
            ];
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');

            $output = $this->userapiModel->insert_user($insert_data);

            if ($output > 0 and !empty($output)) {
                # success
                $message = [
                    'status' => true,
                    'message' => "Berhasil daftar, silakan aktivasi email anda!"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
                //tokken

            } else {
                // error
                $message = [
                    'status' => false,
                    'message' => "Gagal Register, silakan coba lagi"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'berbagiinformasiyt@gmail.com',
            'smtp_pass' => 'andi12345',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   =>  'utf-8',
            'newline'   => "\r\n"

        ];

        // $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('berbagiinformasiyt@gmail.com', 'DLH Tegal');
        $this->email->to($this->input->post('email'));
        // verify
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset password : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    /**
     * Login User
     * @param : email dan password
     * link : api/users/login
     * @method : post
     */
    public function login_post()
    {
        header('Access-Control-Allow_Origin: *');
        $_POST = $this->security->xss_clean($_POST);

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            //Form Validation Errors
            $message = array(
                'status' => false,
                'error'  => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            // print_r($_POST);
            //Login function
            $output = $this->userapiModel->user_login($this->input->post('email'), $this->input->post('password'));
            if (!empty($output) and $output != FALSE) {
                $return_data = [
                    'user_id' => $output->id_user,
                    'nama_lengkap' => $output->nama_lengkap,
                    'email' => $output->email,
                    'date_created' => $output->date_created
                ];

                # loginsuccess
                $message = [
                    'status' => true,
                    'data'  => $output,
                    'message' => "user berhasil login"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
                //tokken

            } else {
                // error
                $message = [
                    'status' => false,
                    'message' => "User tidak ditemukan silakan hub. admin"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


    /**
     * Fetch all user
     * @method : get
     */
    public function fetch_all_users_get()
    {
        header('Access-Control-Allow_Origin: *');
        $data = $this->userapiModel->fetch_all_users();
        print_r($data);
        exit;
        $this->response($data);
    }
}
