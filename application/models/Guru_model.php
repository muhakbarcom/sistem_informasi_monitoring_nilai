<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Guru_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('user', 'guru.id_user = user.id_user');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_by_id($id_guru)
  {
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('user', 'guru.id_user = user.id_user');
    $this->db->where('id_guru', $id_guru);
    $query = $this->db->get();
    return $query->row();
  }

  public function insert($data_guru, $data_user)
  {
    $this->db->trans_start();
    $this->db->insert('user', $data_user);
    $id_user = $this->db->insert_id();
    $data_guru['id_user'] = $id_user;
    $this->db->insert('guru', $data_guru);
    $this->db->trans_complete();
  }

  public function update($id_guru, $id_user, $data_guru, $data_user)
  {
    $this->db->trans_start();
    $this->db->where('id_user', $id_user);
    $this->db->update('user', $data_user);
    $this->db->where('id_guru', $id_guru);
    $this->db->update('guru', $data_guru);
    $this->db->trans_complete();
  }

  public function delete($id_guru)
  {
    $this->db->trans_start();
    $this->db->select('id_user');
    $this->db->from('guru');
    $this->db->where('id_guru', $id_guru);
    $query = $this->db->get();
    $id_user = $query->row()->id_user;
    $this->db->where('id_user', $id_user);
    $this->db->delete('user');
    $this->db->where('id_guru', $id_guru);
    $this->db->delete('guru');
    $this->db->trans_complete();
  }
}
