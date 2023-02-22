<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('murid_model');
    $this->load->model('user_model');
  }

  public function index()
  {
    $data['murid'] = $this->murid_model->get_all();
    $this->load->view('layout/header');
    $this->load->view('murid/index', $data);
    $this->load->view('layout/footer');
  }

  public function create()
  {

    if ($this->input->post('submit')) {
      $this->form_validation->set_rules('nama_murid', 'Nama', 'required');
      $this->form_validation->set_rules('alamat_murid', 'Alamat', 'required');
      $this->form_validation->set_rules('telepon_murid', 'No HP', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == TRUE) {
        $user_data = array(
          'username' => $this->input->post('username'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'role' => 'murid'
        );
        // $user_id = $this->user_model->insert($user_data);

        $murid_data = array(
          'nama_murid' => $this->input->post('nama_murid'),
          'alamat_murid' => $this->input->post('alamat_murid'),
          'telepon_murid' => $this->input->post('telepon_murid')
        );
        $this->murid_model->insert($murid_data, $user_data);

        redirect('murid');
      }
    }
    $this->load->view('layout/header');
    $this->load->view('murid/create');
    $this->load->view('layout/footer');
  }

  public function edit($id)
  {
    $murid = $this->murid_model->get_by_id($id);

    if (!$murid) {
      show_404();
    }

    if ($this->input->post('submit')) {
      $this->form_validation->set_rules('nama_murid', 'Nama', 'required');
      $this->form_validation->set_rules('alamat_murid', 'Alamat', 'required');
      $this->form_validation->set_rules('telepon_murid', 'No HP', 'required');
      // $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password');

      // Get the current user data
      $user = $murid;

      // Check if there is a change in username
      if ($user->username !== $this->input->post('username')) {
        // Check if the new username is unique
        $count = $this->db->where('username', $this->input->post('username'))->count_all_results('user');
        if ($count > 0) {
          // If the new username is not unique, return an error message
          redirect('murid/edit/' . $id);
        }
      }

      if ($this->form_validation->run() == TRUE) {
        $user_data = array(
          'username' => $this->input->post('username'),
          'role' => 'murid'
        );
        if ($this->input->post('password')) {
          $user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        // $this->user_model->update($murid->user_id, $user_data);

        $murid_data = array(
          'nama_murid' => $this->input->post('nama_murid'),
          'alamat_murid' => $this->input->post('alamat_murid'),
          'telepon_murid' => $this->input->post('telepon_murid')
        );

        $id_user = $this->input->post('id_user');
        $this->murid_model->update($id, $id_user, $murid_data, $user_data);

        redirect('murid');
      }
    }

    $data['murid'] = $murid;
    $this->load->view('layout/header');
    $this->load->view('murid/edit', $data);
    $this->load->view('layout/footer');
  }

  public function delete($id)
  {
    $murid = $this->murid_model->get_by_id($id);

    if (!$murid) {
      show_404();
    }

    $this->murid_model->delete($id);
    // $this->user_model->delete($murid->id_user);

    redirect('murid');
  }
}
