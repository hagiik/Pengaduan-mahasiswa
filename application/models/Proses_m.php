<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_m extends CI_Model
{

	private $table = 'proses';
	private $primary_key = 'id_proses';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function data_tanggapan_proses_id($id)
	{
		return $this->db->get_where($this->table, ['id_proses' => $id]);
	}

	public function data_tanggapan_proses($id)
	{
		$this->db->select('proses.*,proses.tgl_proses,proses.tanggapan_proses');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_tanggapan = proses.id_tanggapan', 'inner');
		$this->db->where('status', 'proses');
		return $this->db->get();
	}
}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */