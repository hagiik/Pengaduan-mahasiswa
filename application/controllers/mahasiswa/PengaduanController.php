<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaduanController extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		// if ( ! empty($this->session->userdata('level'))) :
		// 	redirect('Auth/BlockedController');
		// endif;
		
		$this->load->model('Pengaduan_m');
	}

	// List all your items
	public function index()
	{
		$permission	= $_SESSION['role']['permission'] ?? json_decode($_SESSION['role'][0]->permission);
		
		if (!in_array('tulis pengaduan',$permission)) {
			redirect('Auth/BlockedController');
		}

		$data['title'] = 'Pengaduan';
		$mahasiswa = $this->db->get_where('mahasiswa',['username' => $this->session->userdata('username')])->row_array();
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_nim($mahasiswa['nim'])->result_array();

		foreach ($data['data_pengaduan'] as $key => $item) {
			$get = $this->db->get_where('tanggapan',['id_pengaduan'=>$item['id_pengaduan']])->result();
			$data['data_pengaduan'][$key]['tanggapan'] = $get;
		}
		
		$this->form_validation->set_rules('isi_laporan','Isi Laporan Pengaduan','trim|required');
		$this->form_validation->set_rules('alasan','Alasan Pengaduan','trim|required');
		$this->form_validation->set_rules('jenis_laporan','Jenis laporan','trim|required');
		// $this->form_validation->set_rules('foto','Foto Pengaduan','trim');

		$data['role'] = $this->db->where("nama NOT IN ('Admin','Mahasiswa')")->get('role')->result();

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/mahasiswa/pengaduan');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');
			
		else :
			$upload_foto = $this->upload_foto('foto'); // parameter nama foto
			
			if ($upload_foto == FALSE) {
				$upload_foto = "";
			}
				$params = [
					'tgl_pengaduan'  	=> date('Y-m-d H:i:s'),
					'nim'				=> $mahasiswa['nim'],
					'isi_laporan'		=> htmlspecialchars($this->input->post('isi_laporan',true)),
					'alasan'			=> htmlspecialchars($this->input->post('alasan',true)),
					'jenis_laporan'		=> htmlspecialchars($this->input->post('jenis_laporan',true)),
					'foto'				=> $upload_foto,
					'status'			=> 'masuk',
				];

				$resp = $this->Pengaduan_m->create($params);

				if ($resp) :
					$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
						Laporan berhasil dibuat
						</div>');

					redirect('mahasiswa/PengaduanController');
				else :
					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
						Laporan gagal dibuat!
						</div>');

					redirect('mahasiswa/PengaduanController');
				endif;

		endif;
	}

	public function tanggapan_detail_selesai()
	{
		$id = htmlspecialchars($this->input->get('id',true)); // id pengaduan

		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => $id])->row_array();

		if ( ! empty($cek_data)) :

			$data['title'] = 'Detail';
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_mahasiswa_id(htmlspecialchars($id))->row_array();
			
				$get = $this->db->get_where('tanggapan',['id_pengaduan'=>$data['data_pengaduan']['id_pengaduan']])->result();
				$data['data_pengaduan']['tanggapan'] = $get;
			

			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/admin/tanggapan_detail_selesai');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');
			
		else :
			$this->session->set_flashdata('msg','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data tidak ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				
				</div>');

			redirect('Admin/TanggapanController');			
		endif;
	}

	public function pengaduan_detail($id)
	{

		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => htmlspecialchars($id)])->row_array();
		
		if (!empty($cek_data)) :

			$data['title'] = 'Detail Pengaduan';

			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_tanggapan(htmlspecialchars($id))->row_array();

			if ($data['data_pengaduan']) :
				$this->load->view('dashboard/_part/backend_head', $data);
				$this->load->view('dashboard/_part/backend_sidebar_v');
				$this->load->view('dashboard/_part/backend_topbar_v');
				$this->load->view('dashboard/mahasiswa/pengaduan_detail');
				$this->load->view('dashboard/_part/backend_footer_v');
				$this->load->view('dashboard/_part/backend_foot');
			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Pengaduan sedang di proses!
					</div>');

				redirect('mahasiswa/PengaduanController');			
			endif;
			
		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('mahasiswa/PengaduanController');			
		endif;
	}

	public function pengaduan_batal($id)
	{
		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => htmlspecialchars($id)])->row_array();

		if ( ! empty($cek_data)) :

			if ($cek_data['status'] == '0') :

				$resp = $this->db->delete('pengaduan',['id_pengaduan' => $id]);

				// hapus file
				$path = './assets/uploads/'.$cek_data['foto'];
				unlink($path);

				if ($resp) :
					$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
						Hapus pengaduan berhasil
						</div>');

					redirect('mahasiswa/PengaduanController');
				else :
					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
						Hapus pengaduan gagal!
						</div>');

					redirect('mahasiswa/PengaduanController');
				endif;

			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Pengaduan sedang di proses!
					</div>');

				redirect('mahasiswa/PengaduanController');
			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('mahasiswa/PengaduanController');				
		endif;
	}

	public function edit($id)
	{
		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => htmlspecialchars($id)])->row_array();

		if ( ! empty($cek_data)) :

			if ($cek_data['status'] == 'masuk') :

				$data['title'] = 'Edit Pengaduan';
				$data['pengaduan'] = $cek_data;

				$this->form_validation->set_rules('isi_laporan','Isi Laporan Pengaduan','trim|required');
				$this->form_validation->set_rules('jenis_laporan','Jenis laporan','trim|required');
				$this->form_validation->set_rules('foto','Foto Pengaduan','trim');
				
				if ($this->form_validation->run() == FALSE) :
					$data['role'] = $this->db->where("nama NOT IN ('Admin','Mahasiswa')")->get('role')->result();
					
					$this->load->view('dashboard/_part/backend_head', $data);
					$this->load->view('dashboard/_part/backend_sidebar_v');
					$this->load->view('dashboard/_part/backend_topbar_v');
					$this->load->view('dashboard/mahasiswa/edit_pengaduan');
					$this->load->view('dashboard/_part/backend_footer_v');
					$this->load->view('dashboard/_part/backend_foot');
				else :

					$upload_foto = $this->upload_foto('foto'); // parameter nama foto

					if ($upload_foto == FALSE) :
						$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
							Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
							</div>');

						redirect('mahasiswa/PengaduanController');
					else :

						// hapus file
						$path = './assets/uploads/'.$cek_data['foto'];
						unlink($path);

						$params = [
							'isi_laporan'		=> htmlspecialchars($this->input->post('isi_laporan',true)),
							'foto'				=> $upload_foto,
						];

						$resp = $this->db->update('pengaduan',$params,['id_pengaduan' => $id]);;

						if ($resp) :
							$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
								Laporan berhasil dibuat
								</div>');

							redirect('mahasiswa/PengaduanController');
						else :
							$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
								Laporan gagal dibuat!
								</div>');

							redirect('mahasiswa/PengaduanController');
						endif;

					endif;

				endif;

			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Pengaduan sedang di proses!
					</div>');

				redirect('mahasiswa/PengaduanController');
			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('mahasiswa/PengaduanController');				
		endif;
	}
	
	

	private function upload_foto($foto)
	{
		$config['upload_path']          = './assets/uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5048;
		$config['remove_spaces']        = TRUE;
		$config['detect_mime']        	= TRUE;
		$config['mod_mime_fix']        	= TRUE;
		$config['encrypt_name']        	= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($foto)) :
			return FALSE;
		else :
			return $this->upload->data('file_name');
		endif;
	}
}

/* End of file PengaduanController.php */
/* Location: ./application/controllers/mahasiswa/PengaduanController.php */
