<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Load model dan library yang dibutuhkan
    $this->load->model('Nilai_model');
    $this->load->model('Murid_model');
    $this->load->model('Guru_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    // Redirect ke halaman dashboard jika user bukan guru
    if ($this->session->userdata('user')['role'] !== 'guru') {
      redirect('dashboard');
    }

    // Ambil data guru berdasarkan id user yang sedang login
    $guru = $this->Guru_model->get_by_id($this->session->userdata('user')['id_user']);
    // Ambil data nilai siswa berdasarkan id guru
    $nilai = $this->Nilai_model->get_by_guru_id($guru->id_guru);


    // Tampilkan data nilai siswa
    $data['nilai'] = $nilai;


    $this->load->view('layout/header');
    $this->load->view('nilai/index', $data);
    $this->load->view('layout/footer');
  }

  public function create()
  {
    // Redirect ke halaman dashboard jika user bukan guru
    if ($this->session->userdata('role') !== 'guru') {
      redirect('dashboard');
    }

    // Validasi input
    $this->form_validation->set_rules('siswa_id', 'Siswa', 'required');
    $this->form_validation->set_rules('nilai', 'Nilai', 'required|numeric');

    if ($this->form_validation->run() === FALSE) {
      // Jika form validation gagal, tampilkan kembali halaman create beserta error message
      $data['siswa'] = $this->Siswa_model->get_all();

      $this->load->view('layout/header');
      $this->load->view('guru/nilai/create', $data);
      $this->load->view('layout/footer');
    } else {
      // Ambil data guru berdasarkan id user yang sedang login
      $guru = $this->Guru_model->get_by_user_id($this->session->userdata('user_id'));

      // Insert data nilai siswa ke database
      $data = array(
        'guru_id' => $guru->id,
        'siswa_id' => $this->input->post('siswa_id'),
        'nilai' => $this->input->post('nilai')
      );
      $this->Nilai_model->insert($data);

      // Set flashdata untuk notifikasi
      $this->session->set_flashdata('success_message', 'Data nilai berhasil ditambahkan.');

      // Redirect ke halaman index nilai
      redirect('nilai');
    }
  }

  public function edit($id)
  {
    // Cek apakah user yang sedang login adalah guru
    if ($this->session->userdata('role') != 'guru') {
      redirect('dashboard');
    }

    // Ambil data nilai berdasarkan id
    $nilai = $this->Nilai_model->get_by_id($id);

    // Jika data nilai tidak ditemukan, redirect ke halaman nilai
    if (!$nilai) {
      redirect('nilai');
    }

    // Cek apakah guru yang sedang login merupakan pengampu mata pelajaran dari siswa yang bersangkutan
    $guru_id = $this->session->userdata('user_id');
    $siswa_id = $nilai->siswa_id;
    if (!$this->Guru_model->is_wali_kelas($guru_id, $siswa_id)) {
      redirect('nilai');
    }

    // Jika form disubmit, validasi input dan update data nilai
    if ($this->input->post('submit')) {
      $this->form_validation->set_rules('nilai', 'Nilai', 'required|numeric|max_length[3]');
      if ($this->form_validation->run()) {
        $nilai_data = array(
          'nilai' => $this->input->post('nilai')
        );
        $this->Nilai_model->update($id, $nilai_data);
        $this->session->set_flashdata('success', 'Data nilai berhasil diupdate');
        redirect('nilai');
      }
    }

    // Load view untuk halaman edit nilai
    $data['nilai'] = $nilai;
    $this->load->view('layout/header');
    $this->load->view('nilai/edit', $data);
    $this->load->view('layout/footer');
  }


  public function input()
  {
    // Cek apakah user memiliki role guru
    if ($this->session->userdata('role') != 'guru') {
      redirect('dashboard');
    }

    // Ambil data siswa dari model Siswa_model
    $data['siswa'] = $this->Siswa_model->get_all_siswa();

    // Cek apakah ada form input yang dikirim
    if ($this->input->post('submit')) {
      // Ambil data yang dikirim dari form
      $siswa_id = $this->input->post('siswa_id');
      $nilai = $this->input->post('nilai');

      // Input data nilai ke dalam database
      $this->Nilai_model->input_nilai($siswa_id, $nilai);

      // Redirect ke halaman dashboard
      redirect('dashboard');
    } else {
      // Load view input_nilai
      $this->load->view('layout/header');
      $this->load->view('guru/input_nilai', $data);
      $this->load->view('layout/footer');
    }
  }

  public function lihat()
  {
    // Ambil data nilai dari model Nilai_model
    $data['nilai'] = $this->Nilai_model->get_all_nilai();

    // Load view lihat_nilai
    $this->load->view('layout/header');
    $this->load->view('siswa/lihat_nilai', $data);
    $this->load->view('layout/footer');
  }
}
