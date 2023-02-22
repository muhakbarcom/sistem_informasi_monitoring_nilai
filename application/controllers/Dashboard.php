<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function index()
  {

    // Cek apakah user sudah login
    if (!$this->session->userdata('user')) {
      redirect('login');
    }

    // Ambil role user dari session
    $role = $this->session->userdata('user')['role'];
    // Redirect ke halaman dashboard sesuai role
    if ($role == 'admin') {
      $this->admin();
    } else if ($role == 'guru') {
      $this->guru();
    } else if ($role == 'murid') {
      $this->murid();
    } else {
      show_error('Role tidak valid');
    }
  }

  public function admin()
  {
    $this->load->view('layout/header');
    $this->load->view('dashboard/admin');
    $this->load->view('layout/footer');
  }
  public function guru()
  {
    $this->load->view('layout/header');
    $this->load->view('dashboard/guru');
    $this->load->view('layout/footer');
  }
  public function murid()
  {
    $this->load->model('Murid_model');
    $this->load->model('Nilai_model');

    // Ambil data guru berdasarkan id user yang sedang login
    $id_murid = $this->Murid_model->get_by_id_user($this->session->userdata('user')['id_user']);

    // Ambil data nilai siswa berdasarkan id guru
    $nilai = $this->Nilai_model->getBySiswa($id_murid);


    // Tampilkan data nilai siswa
    $data['nilai'] = $nilai;
    $this->load->view('layout/header');
    $this->load->view('dashboard/murid', $data);
    $this->load->view('layout/footer');
  }
}
