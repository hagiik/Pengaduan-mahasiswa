<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
				// destroy session
		$session = ['username','level'];

		$this->session->unset_userdata($session);


		redirect('Auth/Login');
	}
}

/* End of file LogoutController.php */
/* Location: ./application/controllers/Auth/LogoutController.php */
