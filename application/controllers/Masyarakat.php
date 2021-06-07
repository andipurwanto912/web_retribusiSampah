<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data['title'] = 'Masyarakat';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['masyarakat'] = $this->db->get('tb_masyarakat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/index', $data);
        $this->load->view('templates/footer');
    }
}
