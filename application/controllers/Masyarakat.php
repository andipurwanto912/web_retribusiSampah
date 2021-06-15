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
    $this->load->model('dataModel');
    // $this->load->model('dataModel');
  }

  public function index()
  {
    $data['title'] = 'Data Masyarakat';
    $data['user'] = $this->db->get_where('tb_user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['seri'] = $this->dataModel->get_data('tb_seri')->result();
    $data['masyarakat'] = $this->dataModel->get_data('tb_masyarakat')->result();


    $this->form_validation->set_rules('nik', 'nik', 'required|trim|min_length[16]|is_unique[tb_masyarakat.nik]', [
      'is_unique' => 'nik sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('nama_lengkap', 'nama masyarakat', 'required|trim');
    $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim');
    $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
    $this->form_validation->set_rules('rt', 'rt', 'required|trim');
    $this->form_validation->set_rules('rw', 'rw', 'required|trim');
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required|trim');
    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
    $this->form_validation->set_rules('seri', 'seri', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('masyarakat/index', $data);
      $this->load->view('templates/footer');
    } else {
      $nik                = $this->input->post('nik');
      $nama_lengkap       = $this->input->post('nama_lengkap');
      $tempat_lahir       = $this->input->post('tempat_lahir');
      $tanggal_lahir      = $this->input->post('tanggal_lahir');
      $alamat             = $this->input->post('alamat');
      $rt                 = $this->input->post('rt');
      $rw                 = $this->input->post('rw');
      $kelurahan          = $this->input->post('kelurahan');
      $kecamatan          = $this->input->post('kecamatan');
      $seri               = $this->input->post('seri');

      $data = array(
        'nik'              => $nik,
        'nama_lengkap'     => $nama_lengkap,
        'tempat_lahir'     => $tempat_lahir,
        'tanggal_lahir'    => $tanggal_lahir,
        'alamat'           => $alamat,
        'rt'               => $rt,
        'rw'               => $rw,
        'kelurahan'        => $kelurahan,
        'kecamatan'        => $kecamatan,
        'seri'             => $seri,
      );
      $this->dataModel->insert_data($data, 'tb_masyarakat');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        data masyarakat berhasil ditambahkan!
                      </div>
                    </div>');
      redirect('masyarakat');
    }
  }

  public function editM($id)
  {
    $where = array('id_masy' => $id);
    $data['title'] = 'Update data Masyarakat';
    $data['user'] = $this->db->get_where('tb_user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['seri'] = $this->dataModel->get_data('tb_seri')->result();
    $data['masyarakat'] = $this->db->query("SELECT * FROM tb_masyarakat WHERE id_masy='$id'")->result();

    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/header', $data);
    $this->load->view('masyarakat/editMasy', $data);
    $this->load->view('templates/footer');
  }

  public function editMasyarakat()
  {
    // $this->form_validation->set_rules('jenis_retribusi', 'jenis retribusi', 'required|trim');
    // $this->form_validation->set_rules('tagihan', 'tagihan', 'required|trim');

    $id = $this->input->post('id_masy');

    $id                 = $this->input->post('id_masy');
    $nik                = $this->input->post('nik');
    $nama_lengkap       = $this->input->post('nama_lengkap');
    $tempat_lahir       = $this->input->post('tempat_lahir');
    $tanggal_lahir      = $this->input->post('tanggal_lahir');
    $alamat             = $this->input->post('alamat');
    $rt                 = $this->input->post('rt');
    $rw                 = $this->input->post('rw');
    $kelurahan          = $this->input->post('kelurahan');
    $kecamatan          = $this->input->post('kecamatan');
    $seri               = $this->input->post('seri');

    $data = array(
      'nik'              => $nik,
      'nama_lengkap'     => $nama_lengkap,
      'tempat_lahir'     => $tempat_lahir,
      'tanggal_lahir'    => $tanggal_lahir,
      'alamat'           => $alamat,
      'rt'               => $rt,
      'rw'               => $rw,
      'kelurahan'        => $kelurahan,
      'kecamatan'        => $kecamatan,
      'seri'             => $seri,
    );

    $where = array(
      'id_masy' => $id
    );

    $this->dataModel->update_data('tb_masyarakat', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>×</span>
                          </button>
                          Data berhasil diupdate!
                        </div>
                      </div>');
    redirect('masyarakat');
  }

  public function showM($id)
  {
    $data['title'] = 'Detail Masyarakat';
    $data['user'] = $this->db->get_where('tb_user', ['email' =>
    $this->session->userdata('email')])->row_array();

    // $data['seri'] = $this->dataModel->get_data('tb_seri')->result();
    $detail = $this->dataModel->detail_data($id);
    $data['detail'] = $detail;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('masyarakat/showMasy', $data);
    $this->load->view('templates/footer');
  }



  public function deleteMasy($id)
  {
    $where = array('id_masy' => $id);

    $this->dataModel->delete_data($where, 'tb_masyarakat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>×</span>
                            </button>
                            masyarakat berhasil dihapus!
                          </div>
                        </div>');
    redirect('masyarakat');
  }
}
