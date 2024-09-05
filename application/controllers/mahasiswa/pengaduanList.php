<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaduanList extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ( ! empty($this->session->userdata('level'))) :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Pengaduan_l');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Pengaduan List';
		$mahasiswa = $this->db->get_where('mahasiswa',['username' => $this->session->userdata('username')])->row_array();
		$data['data_pengaduan'] = $this->Pengaduan_l->data_pengaduan_mahasiswa_nim($mahasiswa['nim'])->result_array();
		
		$this->form_validation->set_rules('isi_laporan','Isi Laporan Pengaduan','trim|required');
		$this->form_validation->set_rules('lokasi','lokasi laporan','trim|required');
		$this->form_validation->set_rules('jenis_laporan','Jenis laporan','trim|required');
		$this->form_validation->set_rules('foto','Foto Pengaduan','trim');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('dashboard/_part/backend_head', $data);
			$this->load->view('dashboard/_part/backend_sidebar_v');
			$this->load->view('dashboard/_part/backend_topbar_v');
			$this->load->view('dashboard/mahasiswa/pengaduan');
			$this->load->view('dashboard/_part/backend_footer_v');
			$this->load->view('dashboard/_part/backend_foot');
			
		else :
			$upload_foto = $this->upload_foto('foto'); // parameter nama foto
			if ($upload_foto == FALSE) :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
					</div>');

				redirect('mahasiswa/PengaduanList');
				
			else :

				$params = [
					
					'tgl_pengaduan'  	=> date('Y-m-d H:i:s'),
					'nim'				=> $mahasiswa['nim'],
					'isi_laporan'		=> htmlspecialchars($this->input->post('isi_laporan',true)),
					'lokasi'			=> htmlspecialchars($this->input->post('lokasi',true)),
					'jenis_laporan'		=> htmlspecialchars($this->input->post('jenis_laporan',true)),
					'foto'				=> $upload_foto,
					'status'			=> '0',
				];

				$resp = $this->Pengaduan_m->create($params);

				if ($resp) :
					$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
						Laporan berhasil dibuat
						</div>');

					redirect('mahasiswa/PengaduanList');
				else :
					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
						Laporan gagal dibuat!
						</div>');

					redirect('mahasiswa/PengaduanList');
				endif;

			endif;
		endif;
	}

	public function pengaduan_detail($id)
	{

		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => htmlspecialchars($id)])->row_array();

		if ( ! empty($cek_data)) :

			$data['title'] = 'Detail Pengaduan';

			$data['data_pengaduan'] = $this->Pengaduan_l->data_pengaduan_tanggapan(htmlspecialchars($id))->row_array();
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

				redirect('mahasiswa/PengaduanList');			
			endif;
			
		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('mahasiswa/PengaduanList');			
		endif;
	}


}

/* End of file PengaduanController.php */
/* Location: ./application/controllers/mahasiswa/PengaduanController.php */
