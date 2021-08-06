<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seri extends CI_Controller
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
    $this->load->model('DataModel');
  }

  public function index()
  {
    $data['title'] = 'Seri Retribusi';
    $data['user'] = $this->db->get_where('tb_user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    $data['seri'] = $this->DataModel->get_data('tb_seri')->result();

    $this->form_validation->set_rules('seri', 'seri', 'required|trim|is_unique[tb_seri.seri]', [
      'is_unique' => 'seri sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('jenis_retribusi', 'jenis retribusi', 'required|trim');
    $this->form_validation->set_rules('tagihan', 'tagihan', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('seri/index', $data);
      $this->load->view('templates/footer');
    } else {
      $seri               = $this->input->post('seri');
      $jenis_retribusi    = $this->input->post('jenis_retribusi');
      $tagihan            = $this->input->post('tagihan');

      $data = array(
        'seri'              => $seri,
        'jenis_retribusi'   => $jenis_retribusi,
        'tagihan'           => $tagihan,
        );
        
      $this->DataModel->insert_data($data, 'tb_seri');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        seri berhasil ditambahkan!
                      </div>
                    </div>');
      redirect('seri');
    }
  }

  public function edit($id)
  {
    $where = array('id' => $id);
    $data['seri'] = $this->db->query("SELECT * FROM tb_seri WHERE id='$id'")->result();
    $data['title'] = 'Edit Seri';
    $data['user'] = $this->db->get_where('tb_user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/header', $data);
    $this->load->view('seri/editSeri', $data);
    $this->load->view('templates/footer');
  }

  public function editSeri()
  {
    $id = $this->input->post('id');

    // if ($this->form_validation->run() == false) {
    //   $this->edit($id);
    // } else {
    $id              = $this->input->post('id');
    $seri            = $this->input->post('seri');
    $jenis_retribusi = $this->input->post('jenis_retribusi');
    $tagihan         = $this->input->post('tagihan');

    $data = array(
      'seri'              => $seri,
      'jenis_retribusi'   => $jenis_retribusi,
      'tagihan'           => $tagihan,
    );

    $where = array(
      'id' => $id
    );

    $this->DataModel->update_data('tb_seri', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>×</span>
                            </button>
                            seri berhasil diupdate!
                          </div>
                        </div>');
    redirect('seri');
  }

  public function deleteSeri($id)
  {
    $where = array('id' => $id);

    $this->DataModel->delete_data($where, 'tb_seri');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>×</span>
                            </button>
                            seri berhasil dihapus!
                          </div>
                        </div>');
    redirect('seri');
  }
}
