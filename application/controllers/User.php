<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUser');
        
    }
    

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
    
    function data_peserta()
    {
        $data['judul'] = "Lengkapi Data Peserta";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/layouttop', $data);
        $this->load->view('user/form_peserta', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');

    }

    function addPeserta()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Lengkapi Data Peserta";
            $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/auth_header',$data);
            $this->load->view('templates/user_templates/layouttop', $data);
            $this->load->view('user/form_peserta', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');

        } else {
            $id = $this->input->post('id_user');
            $data = [
                'nama' => $this->input->post('nama'),
                'no_ktp' => $this->input->post('nik'),
                'alamat' => $this->input->post('alamat'),
                'tgl_lahir' => htmlspecialchars($this->input->post('tl')),
                'jk' => $this->input->post('jk'),
                'id_role' => 2
            ];
            $where = array('id_user' => $id);
            $this->modelUser->updateDataPeserta($where,$data,'user');
            redirect(base_url('user'));
        }
    }

    function edit()
    {
        $data['judul'] = "Ubah Data Diri";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/topbar',$data);
        $this->load->view('templates/user_templates/sidebar',$data);
        $this->load->view('user/edit',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }
}



/* End of file filename.php */
