<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	// List all your items
public function index()
{
	$data['title'] = 'Home';
    
    $this->load->view('dashboard/_part/landing/backend_head', $data);
	$this->load->view('dashboard/_part/landing/navbar_v');
	$this->load->view('dashboard/index');
	$this->load->view('dashboard/_part/landing/footer_v');
	$this->load->view('dashboard/_part/landing/backend_foot');
}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/Admin/DashboardController.php */
