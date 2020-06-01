<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class modelUser extends CI_Model
{
    function updateDataPeserta($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}



/* End of file filename.php */
