<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		// if ($this->session->userdata('level') != 'admin') :
		// 	redirect('Auth/BlockedController');
		// endif;
		$permission	= $_SESSION['role']['permission'] ?? json_decode($_SESSION['role'][0]->permission);
		
		if (!in_array('role',$permission)) {
			redirect('Auth/BlockedController');
		}
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Tambah Role';
		$data['data_role'] = $this->db->get('role')->result_array();

		$this->form_validation->set_rules('nama','Nama','trim|required|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/role');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');
		else :
			$params = [
				'nama'					=> htmlspecialchars($this->input->post('nama',TRUE)),
				'permission'				=> json_encode($this->input->post('permission',TRUE)),
			];

			$resp = $this->db->insert('role',$params);

			if ($resp) :
				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Buat akun Role berhasil
					</div>');

				redirect('Admin/RoleController');
			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Buat akun role berhasil!
					</div>');

				redirect('Admin/RoleController');
			endif;
		endif;
	}

	public function delete($id)
	{

	$id_petugas = htmlspecialchars($id); // id petugas

	$cek_data = $this->db->get_where('role',['id' => $id_petugas])->row_array();
	
	if ( ! empty($cek_data)) :
		$resp = $this->db->delete('role',['id' => $id_petugas]);

		if ($resp) :
			$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
				Akun berhasil dihapus
				</div>');

			redirect('Admin/RoleController');
		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Akun gagal dihapus!
				</div>');

			redirect('Admin/RoleController');
		endif;
	else :
		$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
			Data tidak ada
			</div>');

		redirect('Admin/RoleController');
	endif;

}

public function edit($id)
{
		$id_petugas = htmlspecialchars($id); // id petugas

		$cek_data = $this->db->get_where('role',['id' => $id_petugas])->row_array();

		if ( ! empty($cek_data)) :

			$data['title'] = 'Edit Role';
			$data['role'] = $cek_data;

			$this->form_validation->set_rules('nama','Nama','trim|required|alpha_numeric_spaces');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('dashboard/_part/backend_head', $data);
				$this->load->view('dashboard/_part/backend_sidebar_v');
				$this->load->view('dashboard/_part/backend_topbar_v');
				$this->load->view('dashboard/admin/edit_role');
				$this->load->view('dashboard/_part/backend_footer_v');
				$this->load->view('dashboard/_part/backend_foot');
			else :

			$params = [
				'nama'					=> htmlspecialchars($this->input->post('nama',TRUE)),
				'permission'					=> json_encode($this->input->post('permission',TRUE)),
			];

			$resp = $this->db->update('role',$params, ['id' => $id_petugas]);

			if ($resp) :
				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Akun role berhasil di edit
					</div>');

				redirect('Admin/RoleController');
			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Akun role gagal di edit!
					</div>');

				redirect('Admin/RoleController');
			endif;

			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Data tidak ada
				</div>');

			redirect('Admin/RoleController');
		endif;
	}	

}

/* End of file PetugasController.php */
/* Location: ./application/controllers/Admin/PetugasController.php */
