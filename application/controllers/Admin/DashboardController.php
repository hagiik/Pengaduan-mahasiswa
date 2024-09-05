<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ( ! $this->session->userdata('role')) :
			redirect('Auth/BlockedController');
		endif;

		$this->load->model('Pengaduan_m');


}

	// List all your items
public function index()
{
	$data['title'] = 'Dashboard';
	// $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();
	// $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_selesai()->result_array();
	$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
	$this->db->from("pengaduan");
	$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
	$this->db->where("status IN ('proses','masuk', 'diterima')");
	
	if ($_SESSION['role'][0]->id != "1") {
		$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
	}
	$data['data_pengaduan'] = $this->db->get()->result_array();

	// $data['data_pengaduan'] = $this->db->where("status IN ('proses','selesai')")->get('pengaduan')->result_array();
	$data['petugas'] = $this->db->get('petugas')->num_rows();
	$data['mahasiswa'] = $this->db->get('mahasiswa')->num_rows();
	$data['pengaduan'] = $this->db->get('pengaduan')->num_rows();

	if ($_SESSION['role'][0]->id != "1") {
		$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
	}
	$this->db->where('status','proses','diterima');
	$data['pengaduan_proses'] = $this->db->get('pengaduan')->num_rows();
	if ($_SESSION['role'][0]->id != "1") {
		$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
	}
	$this->db->where('status','masuk');
	$data['pengaduan_masuk'] = $this->db->get('pengaduan')->num_rows();
	if ($_SESSION['role'][0]->id != "1") {
		$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
	}
	$this->db->where('status','tolak');
	$data['pengaduan_ditolak'] = $this->db->get('pengaduan')->num_rows();

	if ($_SESSION['role'][0]->id != "1") {
		$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
	}
	$this->db->where('status','diterima');
	$data['pengaduan_diterima'] = $this->db->get('pengaduan')->num_rows();

	$this->load->view('dashboard/_part/backend_head', $data);
	$this->load->view('dashboard/_part/backend_sidebar_v');
	$this->load->view('dashboard/_part/backend_topbar_v');
	$this->load->view('dashboard/admin/dashboard');
	$this->load->view('dashboard/_part/backend_footer_v');
	$this->load->view('dashboard/_part/backend_foot');
}
}

/* End of file DashboardController.php */
/* Location: ./application/controllers/Admin/DashboardController.php */
