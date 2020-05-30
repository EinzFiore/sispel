<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    function index()
    {
        $data['judul'] = "Peserta";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/topbar',$data);
        $this->load->view('templates/user_templates/sidebar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }
}



/* End of file filename.php */
