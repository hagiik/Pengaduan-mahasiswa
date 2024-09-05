<?php

class Tampil_m extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('pengaduan')->result_array();
    }

    public function data_pengaduan()
	{
		$this->db->select('pengaduan.*,mahasiswa.nama,mahasiswa.telp');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengaduan.nim', 'inner');
		$this->db->where('status', '0');
		return $this->db->get();
	}
}