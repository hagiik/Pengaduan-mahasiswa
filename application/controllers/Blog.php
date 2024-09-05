<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


	// List all your items
public function index()
{
	$data['title'] = 'Blog';
    
    $this->load->view('dashboard/_part/landing/backend_head', $data);
	$this->load->view('dashboard/_part/landing/navbar_v');
	$this->load->view('blog/blog_v');
	$this->load->view('dashboard/_part/landing/footer_v');
	$this->load->view('dashboard/_part/landing/backend_foot');
}

public function carapengaduan()
{
	$data['title'] = 'Blog';
    
    $this->load->view('dashboard/_part/landing/backend_head', $data);
	$this->load->view('dashboard/_part/landing/navbar_v');
	$this->load->view('blog/penggunaan');
	$this->load->view('dashboard/_part/landing/footer_v');
	$this->load->view('dashboard/_part/landing/backend_foot');
}
}