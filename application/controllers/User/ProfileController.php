<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
	}

	// List all your items
	public function index()
	{
        $data['title'] = 'Profile';

        $mahasiswa = $this->db->get_where('mahasiswa',['username' => $this->session->userdata('username')])->row_array();
		$petugas = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();

		if ($mahasiswa == TRUE) :
			$data['user'] = $mahasiswa;
		elseif ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

        $this->load->view('dashboard/_part/backend_head', $data);
        $this->load->view('dashboard/_part/backend_sidebar_v');
        $this->load->view('dashboard/_part/backend_topbar_v');
        $this->load->view('dashboard/user/profile');
        $this->load->view('dashboard/_part/backend_footer_v');
        $this->load->view('dashboard/_part/backend_foot');
	}
}

/* End of file ProfileController.php */
/* Location: ./application/controllers/User/ProfileController.php */
