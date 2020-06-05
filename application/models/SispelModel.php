<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SispelModel extends CI_Model
{

  function getKategoriPeserta()
  {
    $result =  $this->db->get('kategori_peserta');
    return $result->result_array();
  }

  function insertKategoriPeserta($data)
  {
    $this->db->insert('kategori_peserta', $data);
  }

  function updateKategoriPeserta($row, $data)
  {
    $this->db->where($row);
    $this->db->update('kategori_peserta', $data);
  }

  function deleteKategoriPeserta($row)
  {
    $this->db->where($row);
    $this->db->delete('kategori_peserta');
  }

  function getPeserta()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id_role', 2);
    $result   = $this->db->get();
    return $result->result_array();
  }

  function getPerusahaan()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id_role', 3);
    $result   = $this->db->get();
    return $result->result_array();
  }
}
