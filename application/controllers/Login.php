<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function index()
  {
    if ($this->session->userdata('user')) {
      redirect('dashboard', 'refresh');
    }
    // load view untuk halaman login
    $this->load->view('login');
  }

  public function process()
  {
    $this->load->model('User_model');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $user = $this->User_model->get_by_username($username);
    if ($user && password_verify($password, $user->password)) {
      $this->set_userdata($user);

      redirect('dashboard');
    } else {
      $this->session->set_flashdata('error', 'Invalid username or password');
      redirect('login');
    }
  }

  public function set_userdata($user)
  {
    // set session user
    $session_data = array(
      'id_user' => $user->id_user,
      'username' => $user->username,
      'role' => $user->role,
      'logged_in' => true
    );
    $this->session->set_userdata('user', $session_data);
  }

  public function logout()
  {
    // menghapus session dan redirect ke halaman login
    $this->session->unset_userdata('user');
    redirect('login');
  }
}
