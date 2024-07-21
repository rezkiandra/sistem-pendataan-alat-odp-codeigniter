<?php

class M_teknisi extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_id_teknisi_by_user($id_user)
  {
    $this->db->select('id_teknisi');
    $this->db->from('teknisi');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->id_teknisi;
    } else {
      return null;
    }
  }

  public function get_user()
  {
    $this->db->select('user.*');
    $this->db->from('user');
    $this->db->join('teknisi', 'user.id_user = teknisi.id_user', 'left');
    $this->db->where('user.level', 'pegawai');
    $this->db->where('user.status', 'aktif');
    $this->db->where('teknisi.id_teknisi IS NULL');
    $this->db->order_by('user.id_user', 'ASC');
    return $this->db->get();
  }

  public function get_teknisi()
  {
    $this->db->select('*');
    $this->db->from('teknisi');
    $this->db->join('user', 'user.id_user = teknisi.id_user');
    $this->db->order_by('id_teknisi', 'ASC');
    return $this->db->get();
  }

  public function get_data_join()
  {
    $this->db->select('*');
    $this->db->from('teknisi');
    $this->db->join('user', 'user.id_user = teknisi.id_user');
    return $this->db->get();
  }

  public function get_data_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('teknisi');
    $this->db->join('user', 'user.id_user = teknisi.id_user', 'left');
    $this->db->where('id_teknisi', $id);
    return $this->db->get();
  }

  public function detail_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function detail_join($where)
  {
    $this->db->select('*');
    $this->db->from('teknisi');
    $this->db->where('id_teknisi', $where);
    $this->db->join('user', 'teknisi.id_user = user.id_user');
    return $query = $this->db->get();
  }

  public function insert($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function ubah_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function hapus_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
    if ($this->db->affected_rows() == 1) {
      return TRUE;
    }
    return false;
  }
}
