<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    function index()
    {
        $data['judul'] = "Dashboard";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/topbar',$data);
        $this->load->view('templates/user_templates/sidebar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }
}



/* End of file filename.php */
