<?php
class modelBlog extends CI_Model
{
    function dataAllPelatihan($limit,$start,$keyword = null)
    {
       if($keyword){
        $this->db->like('judul_program',$keyword);

       }

        $this->db->select('*');
        $this->db->from('program_pelatihan');
        $this->db->join('jadwal_pelatihan','jadwal_pelatihan.id_jadwal = program_pelatihan.jadwal_id');
        $this->db->join('kategori_pelatihan','kategori_pelatihan.id = program_pelatihan.kategori_id');
        $this->db->limit($limit,$start);
        return $this->db->get()->result_array();
    }

    function dataProgram()
    {
        return $this->db->get('program_pelatihan')->num_rows();
    }
}
