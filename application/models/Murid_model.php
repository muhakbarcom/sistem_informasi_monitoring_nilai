<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Murid_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('murid');
    $this->db->join('user', 'murid.id_user = user.id_user');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_by_id($id_murid)
  {
    $this->db->select('*');
    $this->db->from('murid');
    $this->db->join('user', 'murid.id_user = user.id_user');
    $this->db->where('id_murid', $id_murid);
    $query = $this->db->get();
    return $query->row();
  }

  public function insert($data_murid, $data_user)
  {
    $this->db->trans_start();
    $this->db->insert('user', $data_user);
    $id_user = $this->db->insert_id();
    $data_murid['id_user'] = $id_user;
    $this->db->insert('murid', $data_murid);
    $this->db->trans_complete();
  }

  public function update($id_murid, $id_user, $data_murid, $data_user)
  {
    $this->db->trans_start();
    $this->db->where('id_user', $id_user);
    $this->db->update('user', $data_user);
    $this->db->where('id_murid', $id_murid);
    $this->db->update('murid', $data_murid);
    $this->db->trans_complete();
  }

  public function delete($id_murid)
  {
    $this->db->trans_start();
    $this->db->select('id_user');
    $this->db->from('murid');
    $this->db->where('id_murid', $id_murid);
    $query = $this->db->get();
    $id_user = $query->row()->id_user;
    $this->db->where('id_user', $id_user);
    $this->db->delete('user');
    $this->db->where('id_murid', $id_murid);
    $this->db->delete('murid');
    $this->db->trans_complete();
  }
}
