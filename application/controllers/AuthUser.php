<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthUser extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    

    function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Login";
            $this->load->view('templates/auth_header',$data);
            $this->load->view('UserAuth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($user){
            if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if($user['id_role'] == 1){
                        redirect('admin');
                    } else {
                    redirect('user');
                }
                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Password yang dimasukan salah !!
                  </div>');
                  redirect(base_url());       
                }

            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Email belum di aktivasi!!
              </div>');
              redirect(base_url());
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Email belum terdaftar!!
          </div>');
          redirect(base_url());
        }
    }
    
    function buatAkun()
    {
        $data['judul'] = "Registrasi";
        $this->load->view('templates/auth_header',$data);
        $this->load->view('UserAuth/registrasi');
        $this->load->view('templates/auth_footer');
    }
    
    function registration()
    {
        $this->load->model('modelAuth');
        

        // Form validasi registrasi
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email ini telah terdaftar !!'
            ]);
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP','required|max_length[16]|min_length[16]');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|max_length[12]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');
        
        
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Registrasi";
            $this->load->view('templates/auth_header',$data);
            $this->load->view('UserAuth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('full_name',true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp',true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'id_role' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->modelAuth->regMembers($data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Akun Berhasil Dibuat!, Silahkan Cek Email Anda Untuk Aktivasi!
          </div>');
            redirect(base_url());
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Anda telah logout
      </div>');
        redirect(base_url());
    }
}



/* End of file filename.php */