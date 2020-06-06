<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelBlog');
		
	}
	

	public function index()
	{
		$data['judul'] = 'List Pelatihan';

		// pagination
		$this->load->library('pagination');

		$data['totalPelatihan'] = $this->modelBlog->dataProgram();

		// config
		$config['total_rows'] = $this->modelBlog->dataProgram();
		$config['per_page'] = 4;

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);

		$data['keyword'] = $this->input->get('keyword');

		$data['program'] = $this->modelBlog->dataAllPelatihan($config['per_page'],$data['start'],$data['keyword']);
		$data['kategori'] = $this->db->get('kategori_pelatihan')->result_array();

		$this->load->view('blog_templates/blog_header', $data);
		$this->load->view('templates/home_templates/header');
		$this->load->view('templates/home_templates/navbar');
		$this->load->view('blog_templates/blog_list', $data);
		$this->load->view('blog_templates/blog_footer');
	}

	
	public function Homepage()
	{
        $data['judul'] = 'Homepage';
        $data['pelatihan'] = $this->db->get('kategori_pelatihan')->result_array();
        $data['program'] = $this->db->limit(3)->get('program_pelatihan')->result_array();

        
        $this->load->view('templates/auth_header',$data);
		$this->load->view('templates/home_templates/header',$data);
		$this->load->view('templates/home_templates/navbar',$data);
		$this->load->view('homepage');
		$this->load->view('templates/home_templates/footer');
	}

	
	function blog_detail($id)
	{
		$data['judul'] = 'Detail Pelatihan';
        $this->db->select('*');
        $this->db->from('program_pelatihan');
        $this->db->join('jadwal_pelatihan','jadwal_pelatihan.id_jadwal = program_pelatihan.jadwal_id');
        $this->db->join('kategori_pelatihan','kategori_pelatihan.id = program_pelatihan.kategori_id');
		$this->db->where('id_program',$id);
		$data['program'] = $this->db->get()->row_array();
	
		$this->load->view('blog_templates/blog_header', $data);
		$this->load->view('templates/home_templates/header',$data);
		$this->load->view('templates/home_templates/navbar',$data);
		$this->load->view('blog_templates/blog_content', $data);
		$this->load->view('templates/home_templates/footer',$data);
		$this->load->view('blog_templates/blog_footer');
	}

	function daftar()
	{
		if(!$this->session->userdata('email')){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
            Silahkan untuk membuat akun terlebih dahulu, sebelum daftar ke pelatihan.
          </div>');
			redirect('authuser');
		}
	}
}
