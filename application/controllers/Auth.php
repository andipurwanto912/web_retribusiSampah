<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] = "RS | Login";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      //success
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

    //jika user ada
    if ($user) {
      //user aktif
      if ($user['is_active'] == 1) {
        # code...
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];

          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('user');
          }
        } else {
          # code...
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        password salah!
                      </div>
                    </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        email belum di aktivasi!
                      </div>
                    </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        email belum terdaftar, silakan registrasi dahulu
                      </div>
                    </div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }

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
      $data['title'] = "RS | Registration";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $data  = [
        'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'photo' => 'avatar-1.png',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];

      //tokken
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' =>  time()
      ];

      $this->db->insert('tb_user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        berhasil daftar, silakan aktivasi email anda!
                      </div>
                    </div>');
      redirect('auth');
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

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['date_created'] < (120 * 120 * 24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('tb_user');

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        ' . $email . ' sudah telah aktivasi, silakan login!
                      </div>
                    </div>');
          redirect('auth');
        } else {
          $this->db->delete('tb_user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        token expired!
                      </div>
                    </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        akun aktivasi failed, token salah!
                      </div>
                    </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        akun aktivasi failed, email salah!
                      </div>
                    </div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        berhasil logout!
                      </div>
                    </div>');
    redirect('auth');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }

  public function forgotPassword()
  {
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
      $data['title'] = "RS | Forgot Password";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/forgotPassword');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email');
      $user  = $this->db->get_where('tb_user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        # ada user
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];
        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        silakan buka email untuk reset password!
                      </div>
                    </div>');
        redirect('auth/forgotPassword');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        email belum terdaftar atau belum di aktivasi!
                      </div>
                    </div>');
        redirect('auth/forgotPassword');
      }
    }
  }

  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    if ($user) {
      # email ada
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        # email dan token benar
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        reset password failed! token salah.
                      </div>
                    </div>');
        redirect('auth/forgotPassword');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        reset password failed! email salah.
                      </div>
                    </div>');
      redirect('auth/forgotPassword');
    }
  }

  public function changePassword()
  {
    #user tidak memakai email
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }
    $this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[8]|matches[password2]');
    $this->form_validation->set_rules('password2', 'repeat password', 'trim|required|min_length[8]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = "RS | Change Password";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/changePassword');
      $this->load->view('templates/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('tb_user');

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         password berhasil diubah!
                      </div>
                    </div>');
      redirect('auth');
    }
  }
}
