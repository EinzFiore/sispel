<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'List Pelatihan';
		$this->db->select('*');
		$this->db->from('jadwal_pelatihan');
		$this->db->join('program_pelatihan', 'program_pelatihan.id_program = jadwal_pelatihan.program_id');
		$data['program'] = $this->db->get()->result_array();


		$this->load->view('blog_templates/blog_header', $data);
		$this->load->view('templates/home_templates/header');
		$this->load->view('templates/home_templates/navbar');
		$this->load->view('blog_templates/blog_list', $data);
		$this->load->view('blog_templates/blog_footer');
	}
	
	function blog_detail($id)
	{
		$data['judul'] = 'Detail Pelatihan';
		$this->db->select('*');
		$this->db->from('jadwal_pelatihan');
		$this->db->join('program_pelatihan', 'program_pelatihan.id_program = jadwal_pelatihan.program_id');
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
