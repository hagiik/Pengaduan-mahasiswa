<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		// if ($this->session->userdata('level') != 'admin') :
		// 	redirect('Auth/BlockedController');
		// endif;
		$permission	= $_SESSION['role']['permission'] ?? json_decode($_SESSION['role'][0]->permission);
		
		if (!in_array('mahasiswa',$permission)) {
			redirect('Auth/BlockedController');
		}

		$this->load->model('Masyarakat_m');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'lihat mahasiswa';
		$data['mahasiswa'] = $this->db->get('mahasiswa')->result_array();

		$this->form_validation->set_rules('nama','Nama','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('nim','Nim','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('prodi','Prodi','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric_spaces|callback_username_check');
	
		$this->form_validation->set_rules('telp','Telp','trim|required|numeric');
		$this->form_validation->set_rules('level','Level','trim|required');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/mahasiswacek');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');
		else :
			$params = [
				'nama'					=> htmlspecialchars($this->input->post('nama',TRUE)),
				'nim'					=> htmlspecialchars($this->input->post('nim',TRUE)),
				'prodi'					=> htmlspecialchars($this->input->post('prodi',TRUE)),
				'username'				=> htmlspecialchars($this->input->post('username',TRUE)),
				// 'password'				=> password_hash(htmlspecialchars($this->input->post('password',TRUE)), PASSWORD_DEFAULT),
				'telp'					=> htmlspecialchars($this->input->post('telp',TRUE)),
				'level'					=> htmlspecialchars($this->input->post('level',TRUE)),
				'foto_profile'			=> 'user.png',
			];

			$resp = $this->Petugas_m->create($params);

			if ($resp) :
				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Buat akun petugas berhasil
					</div>');

				redirect('Admin/PetugasController');
			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Buat akun petugas berhasil!
					</div>');

				redirect('Admin/PetugasController');
			endif;
		endif;
	}

	public function delete($id)
	{

	$nim = htmlspecialchars($id); // id petugas

	$cek_data = $this->db->get_where('mahasiswa',['nim' => $nim])->row_array();
	
	if ( ! empty($cek_data)) :
		$resp = $this->db->delete('mahasiswa',['nim' => $nim]);

		if ($resp) :
			$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
				Akun berhasil dihapus
				</div>');

			redirect('Admin/MahasiswaController');
		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Akun gagal dihapus!
				</div>');

			redirect('Admin/MahasiswaController');
		endif;
	else :
		$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
			Data tidak ada
			</div>');

		redirect('Admin/MahasiswaController');
	endif;

}
}


// public function edit($id)
// {
// 		$nim = htmlspecialchars($id); // id petugas

// 		$cek_data = $this->db->get_where('mahasiswa',['nim' => $nim])->row_array();

// 		if ( ! empty($cek_data)) :

// 			$data['title'] = 'Edit Petugas';
// 			$data['mahasiswa'] = $cek_data;

// 			$this->form_validation->set_rules('nama','Nama','trim|required|alpha_numeric_spaces');
// 			$this->form_validation->set_rules('telp','Telp','trim|required|numeric');
// 			$this->form_validation->set_rules('level','Level','trim|required');

// 			if ($this->form_validation->run() == FALSE) :
// 				$this->load->view('dashboard/_part/backend_head', $data);
// 				$this->load->view('dashboard/_part/backend_sidebar_v');
// 				$this->load->view('dashboard/_part/backend_topbar_v');
// 				$this->load->view('dashboard/admin/edit_petugas');
// 				$this->load->view('dashboard/_part/backend_footer_v');
// 				$this->load->view('dashboard/_part/backend_foot');
// 			else :

// 			$params = [
// 				'nama'					=> htmlspecialchars($this->input->post('nama',TRUE)),
// 				'telp'					=> htmlspecialchars($this->input->post('telp',TRUE)),
// 				'level'					=> htmlspecialchars($this->input->post('level',TRUE)),
// 			];

// 			$resp = $this->db->update('petugas',$params, ['id_petugas' => $id_petugas]);

// 			if ($resp) :
// 				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
// 					Akun petugas berhasil di edit
// 					</div>');

// 				redirect('Admin/PetugasController');
// 			else :
// 				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
// 					Akun petugas gagal di edit!
// 					</div>');

// 				redirect('Admin/PetugasController');
// 			endif;

// 			endif;

// 		else :
// 			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
// 				Data tidak ada
// 				</div>');

// 			redirect('Admin/PetugasController');
// 		endif;
// 	}	

// 	public function username_check($str = NULL)
// 	{
// 		if (!empty($str)) :
// 			$mahasiswa = $this->db->get_where('mahasiswa',['username' => $str])->row_array();

// 			$petugas = $this->db->get_where('petugas',['username' => $str])->row_array();

// 			if ($mahasiswa == true || $petugas == true) :

// 				$this->form_validation->set_message('username_check', 'Username ini sudah terdaftar ada.');

// 				return false;
// 			else :
// 				return true;
// 			endif;
// 		else :
// 			$this->form_validation->set_message('username_check', 'Inputan Kosong');

// 			return false;
// 		endif;
// 	}
// }

/* End of file PetugasController.php */
/* Location: ./application/controllers/Admin/PetugasController.php */