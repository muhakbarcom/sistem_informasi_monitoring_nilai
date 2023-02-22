<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{

  public $table = 'user';

  public function __construct()
  {
    $this->load->database();
  }

  public function get_users()
  {
    $query = $this->db->get($this->table);
    return $query->result();
  }

  public function get_user($id)
  {
    $query = $this->db->get_where($this->table, array('id' => $id));
    return $query->row();
  }

  public function get_by_username($username)
  {
    $query = $this->db->get_where($this->table, array('username' => $username));
    return $query->row();
  }

  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function update_user($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

  public function delete_user($id)
  {
    return $this->db->delete($this->table, array('id' => $id));
  }
}
