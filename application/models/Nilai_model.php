<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
  private $table = 'nilai';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    return $this->db->get($this->table)->result_array();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->table, ['id_nilai' => $id])->row_array();
  }

  public function getBySiswa($siswa_id)
  {
    $this->db->join('murid m', 'm.id_murid = n.id_murid', 'left');

    return $this->db->get_where('nilai n', ['n.id_murid' => $siswa_id])->result_array();
  }
  public function get_by_guru_id($guru_id)
  {
    $this->db->join('murid', 'nilai.id_murid = murid.id_murid', 'right');

    return $this->db->get_where($this->table, ['id_guru' => $guru_id])->result_array();
  }

  public function create($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, ['id_nilai' => $id]);
  }
}
