<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller
{
    function index()
    {
        $data['judul'] = "Menu Management";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // Tambah Menu
        $this->form_validation->set_rules('menu', 'Menu', 'required',['required' => 'Field Menu Wajib Diisi !!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header',$data);
            $this->load->view('templates/user_templates/topbar',$data);
            $this->load->view('templates/user_templates/sidebar',$data);
            $this->load->view('menu/index',$data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Menu baru berhasil ditambahkan !!
          </div>');
          redirect(base_url('menu'));
        }
    }

    function subMenu()
    {
        $this->load->model('modelMenu');
        

        $data['judul'] = "Submenu Management";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['subMenu'] = $this->modelMenu->getSubmenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header',$data);
            $this->load->view('templates/user_templates/topbar',$data);
            $this->load->view('templates/user_templates/sidebar',$data);
            $this->load->view('menu/submenu',$data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');

        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_submenu',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Submenu baru berhasil ditambahkan !!
          </div>');
          redirect(base_url('menu/subMenu'));
        }
    }
}


/* End of file filename.php */

