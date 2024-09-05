<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Login';

		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('password','Password','trim|required|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('dashboard/_part/login_head', $data);
			$this->load->view('dashboard/login_v');
			$this->load->view('dashboard/_part/login_footer');
		else :
			$username = htmlspecialchars($this->input->post('username',TRUE));
			$password = htmlspecialchars($this->input->post('password',TRUE));

			$this->cek_login($username, $password);
		endif;
	}

	private function cek_login($username, $password)
	{
		// cek akun di table mahasiswa dan petugas berdasarkan username
		$mahasiswa = $this->db->get_where('mahasiswa',['username' => $username])->row_array();
		$petugas = $this->db->get_where('petugas',['username' => $username])->row_array();

		if ($mahasiswa == TRUE) :
			// jika akun mahasiswa == TRUE
			// cek password
			if (password_verify($password, $mahasiswa['password'])) :
				// jika password benar
				// maka buat session userdata
				$get = $this->db->get_where('role',['nama'=>'Mahasiswa'])->result();
				
				$session = [
					'username' 		=> $mahasiswa['username'],
					'role'		=> $get
				];

				$this->session->set_userdata($session);

				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Login berhasil!
					</div>');

				return redirect('User/ProfileController');

			else :
				// password salah
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Username atau Password salah!
					</div>');

				return redirect('Auth/Login');
			endif;

		elseif ($petugas == TRUE) :
			// jika akun petugas == TRUE
			// cek password

			if (password_verify($password, $petugas['password'])) :
				// jika password benar
				// maka buat session userdata
				$get = $this->db->get_where('role',['id'=>$petugas['role_id']])->result();
				
				$session = [
					'username' 		=> $petugas['username'],
					'role'			=> $get,
				];

				$this->session->set_userdata($session);

				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Login berhasil!
					</div>');

				return redirect('Admin/DashboardController');

				// cek level petugas
				// if ($petugas['level'] == 'admin') :
				// 	return redirect('Admin/DashboardController');
				// elseif ($petugas['level'] == 'staff') :
				// 	return redirect('Admin/DashboardController');
				// elseif ($petugas['level'] == 'akademik') :
				// 	return redirect('Admin/DashboardController');
				// elseif ($petugas['level'] == 'sarana') :
				// 	return redirect('Admin/DashboardController');
				// elseif ($petugas['level'] == 'prodi') :
				// 	return redirect('Admin/DashboardController');

				// else :
				// 	// jika level tidak ada maka Logout
				// 	// supaya session di hancurkan
				// 	return redirect('Auth/LogoutController');
				// endif;

			else :
				// jika password salah
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Username atau Password salah!
					</div>');

				return redirect('Auth/Login');
			endif;

		else :
		// tidak ada akun yang di temukan
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Username atau Password salah! petugas
				</div>');
		return redirect('Auth/Login');

		endif;
	}
}

/* End of file LoginController.php */
/* Location: ./application/controllers/Auth/LoginController.php */
