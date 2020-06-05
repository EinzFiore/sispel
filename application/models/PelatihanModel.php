<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PelatihanModel extends CI_Model
{
  private $table     = 'kategori_pelatihan';

  // program pelatihan
  function getProgram()
  {
    // $result   = $this->db->get('program_pelatihan');
    $this->db->select('*');
    $this->db->from('program_pelatihan');
    $this->db->join('kategori_peserta', 'kategori_peserta.id_kategori=program_pelatihan.kategori_id', 'LEFT');
    $this->db->join('kategori_pelatihan', 'kategori_pelatihan.id=program_pelatihan.kapel_id', 'LEFT');
    $result   = $this->db->get();
    return $result->result_array();
  }

  function insertProgram($data)
  {
    $this->db->insert('program_pelatihan', $data);
  }

  function getIdProgram($id)
  {
    $row  = $this->db->get_where('program_pelatihan', ['id_program' => $id]);
    return $row->row_array();
  }

  function updateProgram($row, $data)
  {
    $this->db->where($row);
    $this->db->update('program_pelatihan', $data);
  }

  function deleteProgram($row)
  {
    $this->db->where($row);
    $this->db->delete('program_pelatihan');
  }

  // jadwal pelatihan
  function getJadwal()
  {
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=jadwal_pelatihan.program_id');
    $this->db->order_by('status','desc');
    $result = $this->db->get();
    return $result->result_array();
  }

  function getDataJadwal($limit, $start)
  {
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=jadwal_pelatihan.program_id');
    $this->db->where('status',1);
    $this->db->limit($limit, $start);
    $result = $this->db->get();
    return $result->result_array();
  }

  function insertJadwal($data)
  {
    $this->db->insert('jadwal_pelatihan', $data);
  }

  function getIdJadwal($id)
  {
    $row  = $this->db->get_where('jadwal_pelatihan', ['id_jadwal' => $id]);
    return $row->row_array();
  }

  function updateJadwal($row, $data)
  {
    $this->db->where($row);
    $this->db->update('jadwal_pelatihan', $data);
  }

  function countJadwal()
  {
    return $this->db->get_where('jadwal_pelatihan', ['status' => 1])->num_rows();
  }

  function deleteJadwal($row)
  {
    $this->db->where($row);
    $this->db->delete('jadwal_pelatihan');
  }

  // kategori pelatihan
  function getKategori()
  {
    $result = $this->db->get($this->table);
    return $result->result_array();
  }

  function insertKategori($data)
  {
    $this->db->insert($this->table, $data);
  }

  function getIdKategori($id)
  {
    $row = $this->db->get_where($this->table, ['id' => $id]);
    return $row->row_array();
  }

  function updateKategori($row, $data)
  {
    $this->db->where($row);
    $this->db->update($this->table, $data);
  }

  function deleteKategori($row)
  {
    $this->db->where($row);
    $this->db->delete($this->table);
  }
}
