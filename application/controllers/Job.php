<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller 
{
    function index()
    {
        $data['judul'] = 'Portal Lowongan';

		$this->load->view('blog_templates/blog_header', $data);
		$this->load->view('job_templates/index', $data);
		$this->load->view('blog_templates/blog_footer');
    }
}



/* End of file filename.php */
