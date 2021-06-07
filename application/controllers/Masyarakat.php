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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('masyModel');
    }

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

    public function addMasy()
    {
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik')),
            'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'rt' => htmlspecialchars($this->input->post('rt')),
            'rw' => htmlspecialchars($this->input->post('rw')),
            'kelurahan' => htmlspecialchars($this->input->post('kelurahan')),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
        ];
        if ($this->masyModel->create($data) > 0) {
            $pesan['status'] = 'success';
        } else {
            $pesan['status'] = 'failed';
        };

        $this->output->set_content_type('application/json')->set_output(json_encode($pesan));
    }
}
