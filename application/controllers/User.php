<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $this->form_validation->set_rules('name', 'nama lengkap', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP sudah terdaftar', 'required|trim|min_length[12]|max_length[13]');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/header', $data);
            $this->load->view('user/editProfile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            
            // jika ada gambar yg di ganti
            $upload_image = $_FILES['image']['name'];
            // $upload_image = $_FILES['error']['error'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['tb_user']['photo'];
                    if ($old_image != 'avatar-1.png') {
                        unlink(FCPATH . 'assets/img/profile' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('photo', $new_image);
                } else {
                  $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                  redirect('user/editProfile');                  // redirect('user/editProfile');
                }
            }
            $this->db->set('nama_lengkap', $name);
            $this->db->set('no_hp', $no_hp);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        profile berhasil di edit!
                      </div>
                    </div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'current password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'new password', 'required|trim|min_length[8]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'confirm new password', 'required|trim|min_length[8]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changePassword', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');
            if (!password_verify($currentPassword, $data['user']['password'])) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>×</span>
                            </button>
                            wrong current password!
                          </div>
                        </div>');
                redirect('user/changePassword');
            } else {
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        new password cannot be the same as current password!
                      </div>
                    </div>');
                    redirect('user/changePassword');
                } else {
                    // password benar
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                       password changed!
                      </div>
                    </div>');
                    redirect('user/changePassword');
                }
            }
        }
    }
}
