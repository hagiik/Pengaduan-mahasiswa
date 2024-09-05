<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Masyarakat_m');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Register';
		$data['mahasiswa'] = $this->db->get('mahasiswa')->result_array();


		$this->form_validation->set_rules('nim', 'Nim', 'trim|required|numeric|is_unique[mahasiswa.nim]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('prodi', 'Prodi', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('dashboard/_part/login_head', $data);
			$this->load->view('dashboard/register_v');
			$this->load->view('dashboard/_part/login_footer');
		else :
			$params = [
				'nim'			=> htmlspecialchars($this->input->post('nim', TRUE)),
				'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
				'email'			=> htmlspecialchars($this->input->post('email', TRUE)),
				'prodi'			=> htmlspecialchars($this->input->post('prodi', TRUE)),
				'username'		=> htmlspecialchars($this->input->post('username', TRUE)),
				'password'		=> password_hash(htmlspecialchars($this->input->post('password', TRUE)), PASSWORD_DEFAULT),
				'telp'			=> htmlspecialchars($this->input->post('telp', TRUE)),
				'foto_profile'	=> 'user.png',
			];

			$resp = $this->Masyarakat_m->create($params);

			if ($resp) :
				$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
					Register berhasil, Silahkan Login!
					</div>');

				redirect('Auth/Login');
			else :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Register gagal!
					</div>');

				redirect('Auth/Register');
			endif;

		endif;
	}

	public function username_check($str = NULL)
	{
		if (!empty($str)) :
			$mahasiswa = $this->db->get_where('mahasiswa', ['username' => $str])->row_array();

			$petugas = $this->db->get_where('petugas', ['username' => $str])->row_array();

			if ($mahasiswa == TRUE or $petugas == TRUE) :

				$this->form_validation->set_message('username', 'Username ini sudah terdaftar ada.');

				return FALSE;
			else :
				return TRUE;
			endif;
		else :
			$this->form_validation->set_message('username_check', 'Inputan Kosong');

			return FALSE;
		endif;
	}
}

/* End of file RegisterController.php */
/* Location: ./application/controllers/Auth/RegisterController.php */
