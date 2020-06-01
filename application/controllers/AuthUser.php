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

        // Cek session agar tidak bisa kembali ke halaman auth jika terdapat session.
        if($this->session->userdata('email')){
            redirect('user');
        }

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
                    } elseif($user['id_role'] == 2) {
                    redirect('user');
                } elseif($user['id_role'] == 6){
                    redirect('user/data_peserta');
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
        // Cek session agar tidak bisa kembali ke halaman auth jika terdapat session.
        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->load->model('modelAuth');
        

        // Form validasi registrasi
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email ini telah terdaftar !!'
            ]);
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
                'no_hp' => htmlspecialchars($this->input->post('no_hp',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'id_role' => 6,
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


    function blocked()
    {
        $data['judul'] = '404 | Maaf Halaman Yang Anda Tuju Tidak Ada';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('userauth/blocked');
        $this->load->view('templates/auth_footer');
    }
}



/* End of file filename.php */
