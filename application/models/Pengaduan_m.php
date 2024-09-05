<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_m extends CI_Model {

	private $table = 'pengaduan';
	private $primary_key = 'id_pengaduan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function data_pengaduan()
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where('status', 'masuk');
		if ($_SESSION['role'][0]->id != "1") {
			$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
		}
		return $this->db->get();
	}

	public function data_pengaduan_mahasiswa_nim($nim)
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where('pengaduan.nim', $nim);
		return $this->db->get();
	}

	public function data_pengaduan_mahasiswa_proses()
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where("status IN ('proses','proses lagi')");
		if ($_SESSION['role'][0]->id != "1") {
			$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
		}
		return $this->db->get();
	}

	public function data_pengaduan_mahasiswa_diterima()
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where('status', 'diterima');
		if ($_SESSION['role'][0]->id != "1") {
			$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
		}
		return $this->db->get();
	}


	public function data_pengaduan_mahasiswa_selesai()
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where('status', 'selesai');
		if ($_SESSION['role'][0]->id != "1") {
			$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
		}
		return $this->db->get();
	}

	public function data_pengaduan_mahasiswa_tolak()
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where('status', 'tolak');
		if ($_SESSION['role'][0]->id != "1") {
			$this->db->where('jenis_laporan',$_SESSION['role'][0]->nama);
		}
		return $this->db->get();
	}

	public function data_pengaduan_mahasiswa_id($id)
	{
		return $this->db->get_where($this->table,['id_pengaduan' => $id]);
	}

	public function data_pengaduan_tanggapan($id)
	{
		$this->db->select('pengaduan.*,tanggapan.tgl_tanggapan,tanggapan.tanggapan');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'inner');
		$this->db->where('pengaduan.id_pengaduan', $id);
		return $this->db->get();
	}


}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */