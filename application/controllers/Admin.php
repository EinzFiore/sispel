<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelAdmin');
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
    
    // User Akses

    function role()
    {
        $data['judul'] = "Role";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['role'] = $this->db->get('role')->result_array();


        $this->form_validation->set_rules('addRole', 'Role', 'required',['required' => 'Field Role Wajib Diisi !!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header',$data);
            $this->load->view('templates/user_templates/topbar',$data);
            $this->load->view('templates/user_templates/sidebar',$data);
            $this->load->view('admin/role',$data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $this->db->insert('role',['name_role' => $this->input->post('addRole')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Role baru telah ditambahkan!
          </div>');
          redirect(base_url('admin/role'));
        }
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

    function editRole()
    {
        $this->form_validation->set_rules('editRole', 'Role', 'required',['required' => 'Field Role Wajib Diisi !!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header',$data);
            $this->load->view('templates/user_templates/topbar',$data);
            $this->load->view('templates/user_templates/sidebar',$data);
            $this->load->view('admin/role',$data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $data = array('name_role' => $this->input->post('editRole'));
            $where = array('id_role' => $this->input->post('id_role'));

            $this->modelAdmin->editRole($where,$data,'role');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Role berhasil diubah !!
          </div>');
          redirect(base_url('admin/role'));
        }
    }

    function hapusRole($id)
    {
        $where = array('id_role'=>$id);
        $this->modelAdmin->hapusRole($where,'role');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Role berhasil dihapus !!
      </div>');
      redirect(base_url('admin/role'));
    }

    function data_peserta()
    {
        
        $data['judul'] = "Data Peserta";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['user_data'] = $this->db->get_where('user',array('id_role' => 2))->result_array();
        

        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/topbar',$data);
        $this->load->view('templates/user_templates/sidebar',$data);
        $this->load->view('admin/data_peserta',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }


}



/* End of file filename.php */
