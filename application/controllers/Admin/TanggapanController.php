<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TanggapanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		// if (!$this->session->userdata('level')) :
		// 	redirect('Auth/BlockedController');
		// endif;

		$permission	= $_SESSION['role']['permission'] ?? json_decode($_SESSION['role'][0]->permission);
		
		if (!in_array('pengaduan',$permission)) {
			redirect('Auth/BlockedController');
		}

		$this->load->model('Tanggapan_m');
		$this->load->model('Masyarakat_m');
		$this->load->model('Pengaduan_m');
		$this->load->model('Petugas_m');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Semua Pengaduan';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();
		$this->load->view('dashboard/_part/backend_head', $data);
		$this->load->view('dashboard/_part/backend_sidebar_v');
		$this->load->view('dashboard/_part/backend_topbar_v');
		$this->load->view('dashboard/admin/tanggapan');
		$this->load->view('dashboard/_part/backend_footer_v');
		$this->load->view('dashboard/_part/backend_foot');
	}

	public function tanggapan_detail()
	{
		$id = htmlspecialchars($this->input->post('id', true)); // id pengaduan

		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row_array();

		if (!empty($cek_data)) :

			$data['title'] = 'Beri Tanggapan';
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_id(htmlspecialchars($id))->row_array();

			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/tanggapan_detail');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');

		else :
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data tidak ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				</div>');

			redirect('Admin/TanggapanController/tanggapan_proses');
		endif;
	}

	public function tanggapan_detail_selesai()
	{
		$id = htmlspecialchars($this->input->post('id', true)); // id pengaduan

		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row_array();

		if (!empty($cek_data)) :

			$data['title'] = 'Tanggapan Selesai';
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_id(htmlspecialchars($id))->row_array();

			$get = $this->db->get_where('tanggapan', ['id_pengaduan' => $data['data_pengaduan']['id_pengaduan']])->result();
			$data['data_pengaduan']['tanggapan'] = $get;


			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/tanggapan_detail_selesai');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');

		else :
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data tidak ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}

	public function tanggapan_proses_detail()
	{
		$id = htmlspecialchars($this->input->post('id', true)); // id pengaduan

		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row_array();

		if (!empty($cek_data)) :

			$data['title'] = 'Beri Tanggapan';
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_id(htmlspecialchars($id))->row_array();

			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/tanggapan_proses_detail');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');



		endif;
	}

	public function tanggapan_diterima_detail()
	{
		$id = htmlspecialchars($this->input->post('id', true)); // id pengasduan

		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row_array();

		if (!empty($cek_data)) :

			$data['title'] = 'Beri Tanggapan';
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_id(htmlspecialchars($id))->row_array();

			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/tanggapan_diterima_detail');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');



		endif;
	}

	public function tanggapan_proses()
	{
		$data['title'] = 'Pengaduan Proses';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_proses()->result_array();

		$this->load->view('dashboard/_part/backend_head', $data);
		$this->load->view('dashboard/_part/backend_sidebar_v');
		$this->load->view('dashboard/_part/backend_topbar_v');
		$this->load->view('dashboard/admin/tanggapan_proses');
		$this->load->view('dashboard/_part/backend_footer_v');
		$this->load->view('dashboard/_part/backend_foot');
	}

	public function tanggapan_diterima()
	{
		$data['title'] = 'Pengaduan Diterima';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_diterima()->result_array();

		$this->load->view('dashboard/_part/backend_head', $data);
		$this->load->view('dashboard/_part/backend_sidebar_v');
		$this->load->view('dashboard/_part/backend_topbar_v');
		$this->load->view('dashboard/admin/tanggapan_diterima');
		$this->load->view('dashboard/_part/backend_footer_v');
		$this->load->view('dashboard/_part/backend_foot');
	}

	public function tanggapan_proses_lanjutan()
	{
		$data['title'] = 'Pengaduan Proses Lanjutan';
		$data['data_pengaduan'] = $this->Proses_m->data_tanggapan_proses()->result_array();

		$this->load->view('dashboard/_part/backend_head', $data);
		$this->load->view('dashboard/_part/backend_sidebar_v');
		$this->load->view('dashboard/_part/backend_topbar_v');
		$this->load->view('dashboard/admin/tanggapan_proses_detail');
		$this->load->view('dashboard/_part/backend_footer_v');
		$this->load->view('dashboard/_part/backend_foot');
	}


	public function tanggapan_selesai()
	{
		$data['title'] = 'Pengaduan Selesai Dikerjakan';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_selesai()->result_array();

		$this->load->view('dashboard/_part/backend_head', $data);
		$this->load->view('dashboard/_part/backend_sidebar_v');
		$this->load->view('dashboard/_part/backend_topbar_v');
		$this->load->view('dashboard/admin/tanggapan_selesai');
		$this->load->view('dashboard/_part/backend_footer_v');
		$this->load->view('dashboard/_part/backend_foot');
	}

	public function laporan()
	
// 	{
// 	$data['title'] = 'Dashboard';
// 	// $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();
// 	// $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_selesai()->result_array();
// 	$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
// 	$this->db->from("pengaduan");
// 	$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
// 	$this->db->where("status IN ('proses','0','selesai')");
// 	if ($_SESSION['level'] != "admin") {
// 		$this->db->where('jenis_laporan',$_SESSION['level']);
// 	}
	
// 		if (@$_GET['dari']) {
//  			$this->db->where('tgl_pengaduan >=', "$_GET[dari]");
//  			$this->db->where('tgl_pengaduan <=', "$_GET[sampai]");
//  		}
// 	$data['data_pengaduan'] = $this->db->get()->result_array();

// 	// $data['data_pengaduan'] = $this->db->where("status IN ('proses','selesai')")->get('pengaduan')->result_array();
// 	$data['petugas'] = $this->db->get('petugas')->num_rows();
// 	$data['mahasiswa'] = $this->db->get('mahasiswa')->num_rows();
// 	$data['pengaduan'] = $this->db->get('pengaduan')->num_rows();

// 	if ($_SESSION['level'] != "admin") {
// 		$this->db->where('jenis_laporan',$_SESSION['level']);
// 	}
// 	$this->db->where('status','proses','diterima','selesai');
// 	$data['pengaduan_proses'] = $this->db->get('pengaduan')->num_rows();
// 	if ($_SESSION['level'] != "admin") {
// 		$this->db->where('jenis_laporan',$_SESSION['level']);
// 	}
// 	$this->db->where('status','selesai');
// 	$data['pengaduan_selesai'] = $this->db->get('pengaduan')->num_rows();
// 	if ($_SESSION['level'] != "admin") {
// 		$this->db->where('jenis_laporan',$_SESSION['level']);
// 	}
// 	$this->db->where('status','0');
// 	$data['pengaduan_masuk'] = $this->db->get('pengaduan')->num_rows();
// 	if ($_SESSION['level'] != "admin") {
// 		$this->db->where('jenis_laporan',$_SESSION['level']);
// 	}
// 	$this->db->where('status','tolak');
// 	$data['pengaduan_ditolak'] = $this->db->get('pengaduan')->num_rows();
	

// 	if ($_SESSION['level'] != "admin") {
// 		$this->db->where('jenis_laporan',$_SESSION['level']);
// 	}
// 	$this->db->where('status','diterima');
// 	$data['pengaduan_diterima'] = $this->db->get('pengaduan')->num_rows();

// 	$this->load->view('dashboard/_part/backend_head', $data);
// 			$this->load->view('dashboard/_part/backend_sidebar_v');
// 			$this->load->view('dashboard/_part/backend_topbar_v');
// 			$this->load->view('dashboard/admin/laporan');
// 			$this->load->view('dashboard/_part/backend_footer_v');
// 			$this->load->view('dashboard/_part/backend_foot');


// }

	{
		$data['title'] = 'Laporan Selesai Dikerjakan';

		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from("pengaduan");
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
	    $this->db->where("status IN ('proses','masuk','selesai','tolak' ,'diterima')");
		if ($_SESSION['role'][0]->id != "1") {
			$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
		}
		if (@$_GET['dari']) {
			$this->db->where('tgl_pengaduan >=', "$_GET[dari]");
			$this->db->where('tgl_pengaduan <=', "$_GET[sampai]");
		}

		$data['data_pengaduan'] = $this->db->get()->result_array();

		$btn = @$_GET['btn'];
		if ($btn) {
			$this->load->view('dashboard/admin/cetak',$data);
		} else {
			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/laporan');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');
		}
	}


	public function tanggapan_tolak()
	{
		$data['title'] = 'Pengaduan Ditolak';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_tolak()->result_array();

		$this->load->view('dashboard/_part/backend_head', $data);
		$this->load->view('dashboard/_part/backend_sidebar_v');
		$this->load->view('dashboard/_part/backend_topbar_v');
		$this->load->view('dashboard/admin/tanggapan_tolak');
		$this->load->view('dashboard/_part/backend_footer_v');
		$this->load->view('dashboard/_part/backend_foot');
	}


	public function tanggapan_pengaduan_selesai()
	{
		$id_pengaduan = htmlspecialchars($this->input->post('id', true));
		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();

		if (!empty($cek_data)) :
			$this->form_validation->set_rules('id', 'id', 'trim|required');

			if ($this->form_validation->run() == FALSE) :

				$data['title'] = 'Pengaduan Proses';
				$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_proses()->result_array();

				$this->load->view('dashboard/_part/backend_head', $data);
				$this->load->view('dashboard/_part/backend_sidebar_v');
				$this->load->view('dashboard/_part/backend_topbar_v');
				$this->load->view('dashboard/admin/tanggapan_proses');
				$this->load->view('dashboard/_part/backend_footer_v');
				$this->load->view('dashboard/_part/backend_foot');

			else :

				$params = [
					'status' => $_POST['status'],
				];

				$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

				$this->db->insert('tanggapan', [
					'id_pengaduan' => $id_pengaduan,
					'tgl_tanggapan' => date('Y-m-d'),
					'tanggapan' => $_POST['tanggapan'],
					'status' => $_POST['status'],
					'id_petugas' => $petugas['id_petugas']
				]);

				$update_status_pengaduan = $this->db->update('pengaduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

				if ($update_status_pengaduan) :

					$peng = $this->db->get_where('pengaduan',['id_pengaduan'=>$id_pengaduan])->row();
						$u = $this->db->get_where('mahasiswa',['nim'=>$peng->nim])->row();
						
						$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.googlemail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'hagiihsan27@gmail.com', // change it to yours
						  'smtp_pass' => 'odyz pqcf ituu gbrh', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);
						$tanggapan = $_POST['tanggapan'];
						$status = $_POST['status'];
						
					        $message = "NIM : $peng->nim <br> Judul : $peng->alasan <br> Status : $status <br> Tanggapan : $tanggapan";
					        $this->load->library('email', $config);
					      $this->email->set_newline("\r\n");
					      $this->email->from('Pengaduan'); // change it to yours
					      $this->email->to($u->email);// change it to yours
					      $this->email->subject('Status Pengaduan');
					      $this->email->message($message);
					      if($this->email->send())
						     {
						      echo 'Email sent.';
						     }
						     else
						    {
						     show_error($this->email->print_debugger());
						    }

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Pengaduan Berhasil di selesaikan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				</div>');

					redirect('Admin/TanggapanController/tanggapan_proses');

				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Gagal Update Status
						</div>');

					redirect('Admin/TanggapanController/tanggapan_proses');
				endif;

			endif;
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController/tanggapan_proses');
		endif;
	}

	public function tanggapan_pengaduan_proses()
	{
		$id_pengaduan = htmlspecialchars($this->input->post('id', true));
		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();

		if (!empty($cek_data)) :

			$this->form_validation->set_rules('id', 'id', 'trim|required');

			if ($this->form_validation->run() == FALSE) :

				$data['title'] = 'Pengaduan Proses';
				$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_proses()->result_array();

				$this->load->view('dashboard/_part/backend_head', $data);
				$this->load->view('dashboard/_part/backend_sidebar_v');
				$this->load->view('dashboard/_part/backend_topbar_v');
				$this->load->view('dashboard/admin/tanggapan_diterima');
				$this->load->view('dashboard/_part/backend_footer_v');
				$this->load->view('dashboard/_part/backend_foot');

			else :

				$params = [
					'status' => 'proses',
				];

				$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

				$this->db->insert('tanggapan', [
					'id_pengaduan' => $id_pengaduan,
					'tgl_tanggapan' => date('Y-m-d'),
					'tanggapan' => $_POST['tanggapan'],
					'status' => 'proses',
					'id_petugas' => $petugas['id_petugas']
				]);

				$update_status_pengaduan = $this->db->update('pengaduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

				if ($update_status_pengaduan) :

					$peng = $this->db->get_where('pengaduan',['id_pengaduan'=>$id_pengaduan])->row();
						$u = $this->db->get_where('mahasiswa',['nim'=>$peng->nim])->row();
						
						$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.googlemail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'hagiihsan27@gmail.com', // change it to yours
						  'smtp_pass' => 'odyz pqcf ituu gbrh', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);
						$tanggapan = $_POST['tanggapan'];

					        $message = "NIM : $peng->nim <br> Judul : $peng->alasan <br> Status : Proses <br> Tanggapan : $tanggapan";
					        $this->load->library('email', $config);
					      $this->email->set_newline("\r\n");
					      $this->email->from('Pengaduan'); // change it to yours
					      $this->email->to($u->email);// change it to yours
					      $this->email->subject('Status Pengaduan');
					      $this->email->message($message);
					      if($this->email->send())
						     {
						      echo 'Email sent.';
						     }
						     else
						    {
						     show_error($this->email->print_debugger());
						    }

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Pengaduan Berhasil di proses
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				</div>');

					redirect('Admin/TanggapanController/tanggapan_proses');

				else :

					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Gagal Update Status
						</div>');

					redirect('Admin/TanggapanController/tanggapan_proses');
				endif;

			endif;
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController/tanggapan_proses');
		endif;
	}

	// Tanggapan Proses


	// public function tambah_tanggapan_proses()
	// 	{
	// 		$id_tanggapan 	= htmlspecialchars($this->input->post('id',true));
	// 		$cek_data 		= $this->db->get_where('tanggapan',['id_tanggapan' => $id_tanggapan])->row_array();

	// 		if ( ! empty($cek_data)) :

	// 			$this->form_validation->set_rules('id_tanggapan', 'id', 'trim|required');
	// 			$this->form_validation->set_rules('status', 'Status Pengaduan', 'trim|required');
	// 			$this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');

	// 			if ($this->form_validation->run() == FALSE) :

	// 				$data['title'] = 'Beri Tanggapan';
	// 				$data['data_pengaduan'] = $this->Proses_m->data_tanggapan_proses(htmlspecialchars($id_proses))->row_array();

	// 				$this->load->view('dashboard/_part/backend_head', $data);
	// 				$this->load->view('dashboard/_part/backend_sidebar_v');
	// 				$this->load->view('dashboard/_part/backend_topbar_v');
	// 				$this->load->view('dashboard/admin/tanggapan_proses_detail');
	// 				$this->load->view('dashboard/_part/backend_footer_v');
	// 				$this->load->view('dashboard/_part/backend_foot');

	// 			else :

	// 				$petugas = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();

	// 				$params = [

	// 					'id_proses'			=> $id_proses,
	// 					'tgl_proses'		=> date('Y-m-d'),
	// 					'tanggapan_proses'	=> htmlspecialchars($this->input->post('tanggapan_proses',true)),
	// 					'id_petugas'		=> $petugas['id_petugas'],
	// 					'id_tanggaoan'		=> $tanggapan['id_tanggapan'],
	// 				];

	// 				$menanggapi = $this->db->insert('tanggapan_proses',$params);

	// 				if ($menanggapi) :

	// 					$params = [
	// 						'status' => $this->input->post('status',true),
	// 					];

	// 					$update_status_proses = $this->db->update('proses',$params,['id_proses' =>  $id_proses]);

	// 					if ($update_status_proses) :

	// 						$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
	// 							Menanggapi berhasil
	// 							</div>');

	// 						redirect('Admin/TanggapanController');

	// 					else :
	// 						$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
	// 							Gagal Update Pengaduan
	// 							</div>');

	// 						redirect('Admin/TanggapanController');
	// 					endif;


	// 				else :
	// 					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
	// 						Menanggapi gagal!
	// 						</div>');

	// 					redirect('Admin/TanggapanController');
	// 				endif;

	// 			endif;



	// 		else :
	// 			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
	// 				data tidak ada
	// 				</div>');

	// 			redirect('Admin/TanggapanController');	
	// 		endif;
	// 	}


	// Tambah tanggapan

	public function edit($id)
	{
		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => htmlspecialchars($id)])->row_array();

		if ( ! empty($cek_data)) :

			if ($cek_data['status'] == 'masuk') :

				$data['title'] = 'Edit Pengaduan Mahasiswa';
				$data['pengaduan'] = $cek_data;
				

				// $this->form_validation->set_rules('isi_laporan','Isi Laporan Pengaduan','trim|required');
				$this->form_validation->set_rules('jenis_laporan','Jenis laporan','trim|required');
				// $this->form_validation->set_rules('foto','Foto Pengaduan','trim');
				$data['role'] = $this->db->where("nama NOT IN ('Admin','Mahasiswa')")->get('role')->result();
				
				if ($this->form_validation->run() == FALSE) :
					$this->load->view('dashboard/_part/backend_head', $data);
					$this->load->view('dashboard/_part/backend_sidebar_v');
					$this->load->view('dashboard/_part/backend_topbar_v');
					$this->load->view('dashboard/admin/edit_pengaduan');
					$this->load->view('dashboard/_part/backend_footer_v');
					$this->load->view('dashboard/_part/backend_foot');
				else :

						$params = [
							
							'jenis_laporan'		=> htmlspecialchars($this->input->post('jenis_laporan',true)),
							
						];

						$resp = $this->db->update('pengaduan',$params,['id_pengaduan' => $id]);;

						if ($resp) :
							$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
								Laporan berhasil dibuat
								</div>');

							redirect('Admin/TanggapanController');
						else :
							$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
								Laporan gagal dibuat!
								</div>');

							redirect('Admin/TanggapanController');
						endif;

				

				endif;

			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Pengaduan sedang di proses!
					</div>');

				redirect('Admin/TanggapanController');
			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');				
		endif;
	}

	public function tambah_tanggapan()
	{
		$id_pengaduan = htmlspecialchars($this->input->post('id', true));
		$cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();

		if (!empty($cek_data)) :

			$this->form_validation->set_rules('id', 'id', 'trim|required');
			$this->form_validation->set_rules('status', 'Status Pengaduan', 'trim|required');
			// $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');

			if ($this->form_validation->run() == FALSE) :

				$data['title'] = 'Beri Tanggapan';
				$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_id(htmlspecialchars($id_pengaduan))->row_array();

				$this->load->view('dashboard/_part/backend_head', $data);
				$this->load->view('dashboard/_part/backend_sidebar_v');
				$this->load->view('dashboard/_part/backend_topbar_v');
				$this->load->view('dashboard/admin/tanggapan_detail');
				$this->load->view('dashboard/_part/backend_footer_v');
				$this->load->view('dashboard/_part/backend_foot');

			else :
				$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

				$params = [
					'id_pengaduan'		=> $id_pengaduan,
					'tgl_tanggapan'		=> date('Y-m-d'),
					'tanggapan'			=> htmlspecialchars($this->input->post('tanggapan', true)),
					'id_petugas'		=> $petugas['id_petugas'],
					'status' 			=> $this->input->post('status', true),
				];

				$menanggapi = $this->db->insert('tanggapan', $params);

				if ($menanggapi) :

					$params = [
						'status' => $this->input->post('status', true),
					];

					$update_status_pengaduan = $this->db->update('pengaduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

					if ($update_status_pengaduan) :
						$peng = $this->db->get_where('pengaduan',['id_pengaduan'=>$id_pengaduan])->row();
						$u = $this->db->get_where('mahasiswa',['nim'=>$peng->nim])->row();
						
						$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.googlemail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'hagiihsan27@gmail.com', // change it to yours
						  'smtp_pass' => 'odyz pqcf ituu gbrh', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);

						$sts = $this->input->post('status', true);
					        $message = "NIM : $peng->nim <br> Judul : $peng->alasan <br> Status : $peng->status";
					        $this->load->library('email', $config);
					      $this->email->set_newline("\r\n");
					      $this->email->from('Pengaduan'); // change it to yours
					      $this->email->to($u->email);// change it to yours
					      $this->email->subject('Status Pengaduan');
					      $this->email->message($message);
					      if($this->email->send())
						     {
						      echo 'Email sent.';
						     }
						     else
						    {
						     show_error($this->email->print_debugger());
						    }

						    $u = ucfirst($peng->status);
						$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
							Status Berhasil $u
							</div>');

						redirect('Admin/TanggapanController/tanggapan_diterima');

					else :
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
							Gagal Update Pengaduan
							</div>');

						redirect('Admin/TanggapanController');
					endif;


				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Menanggapi gagal!
						</div>');

					redirect('Admin/TanggapanController');
				endif;

			endif;



		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}
}

/* End of file TanggapanController.php */
/* Location: ./application/controllers/Admin/TanggapanController.php */
