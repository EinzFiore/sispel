<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        user_access();
    }
    

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
    
    function role()
    {
        $data['judul'] = "Role";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['role'] = $this->db->get('role')->result_array();

        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/topbar',$data);
        $this->load->view('templates/user_templates/sidebar',$data);
        $this->load->view('admin/role',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function akses_role($role_id)
    {
        $data['judul'] = "Role Akses";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['role'] = $this->db->get_where('role',['id_role' => $role_id])->row_array();
        $this->db->where('id !=',1);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/topbar',$data);
        $this->load->view('templates/user_templates/sidebar',$data);
        $this->load->view('admin/role_akses',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function ubah_akses()
    {
        $menu_id = $this->input->post('menuID');
        $role_id = $this->input->post('roleID');

        $data = [
            'id_role' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu',$data);
        if($result->num_rows() < 1 ) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu',$data);
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Akses berhasil diubah !!
      </div>');
    }
}



/* End of file filename.php */
