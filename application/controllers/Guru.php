<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('guru_model');
    $this->load->model('user_model');
  }

  public function index()
  {
    $data['guru'] = $this->guru_model->get_all();
    $this->load->view('layout/header');
    $this->load->view('guru/index', $data);
    $this->load->view('layout/footer');
  }

  public function create()
  {

    if ($this->input->post('submit')) {
      $this->form_validation->set_rules('nama_guru', 'Nama', 'required');
      $this->form_validation->set_rules('alamat_guru', 'Alamat', 'required');
      $this->form_validation->set_rules('telepon_guru', 'No HP', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == TRUE) {
        $user_data = array(
          'username' => $this->input->post('username'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'role' => 'guru'
        );
        // $user_id = $this->user_model->insert($user_data);

        $guru_data = array(
          'nama_guru' => $this->input->post('nama_guru'),
          'alamat_guru' => $this->input->post('alamat_guru'),
          'telepon_guru' => $this->input->post('telepon_guru')
        );
        $this->guru_model->insert($guru_data, $user_data);

        redirect('guru');
      }
    }
    $this->load->view('layout/header');
    $this->load->view('guru/create');
    $this->load->view('layout/footer');
  }

  public function edit($id)
  {
    $guru = $this->guru_model->get_by_id($id);

    if (!$guru) {
      show_404();
    }

    if ($this->input->post('submit')) {
      $this->form_validation->set_rules('nama_guru', 'Nama', 'required');
      $this->form_validation->set_rules('alamat_guru', 'Alamat', 'required');
      $this->form_validation->set_rules('telepon_guru', 'No HP', 'required');
      // $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password');

      // Get the current user data
      $user = $guru;

      // Check if there is a change in username
      if ($user->username !== $this->input->post('username')) {
        // Check if the new username is unique
        $count = $this->db->where('username', $this->input->post('username'))->count_all_results('user');
        if ($count > 0) {
          // If the new username is not unique, return an error message
          redirect('guru/edit/' . $id);
        }
      }

      if ($this->form_validation->run() == TRUE) {
        $user_data = array(
          'username' => $this->input->post('username'),
          'role' => 'guru'
        );
        if ($this->input->post('password')) {
          $user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        // $this->user_model->update($guru->user_id, $user_data);

        $guru_data = array(
          'nama_guru' => $this->input->post('nama_guru'),
          'alamat_guru' => $this->input->post('alamat_guru'),
          'telepon_guru' => $this->input->post('telepon_guru')
        );

        $id_user = $this->input->post('id_user');
        $this->guru_model->update($id, $id_user, $guru_data, $user_data);

        redirect('guru');
      }
    }

    $data['guru'] = $guru;
    $this->load->view('layout/header');
    $this->load->view('guru/edit', $data);
    $this->load->view('layout/footer');
  }

  public function delete($id)
  {
    $guru = $this->guru_model->get_by_id($id);

    if (!$guru) {
      show_404();
    }

    $this->guru_model->delete($id);
    // $this->user_model->delete($guru->id_user);

    redirect('guru');
  }
}
