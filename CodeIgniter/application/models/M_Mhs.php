<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mhs extends CI_Model {
	public function getTable() 
	{
		$this->db->select('mahasiswa.*, nilai.IPK');
		$this->db->from('mahasiswa');
		$this->db->join('nilai', 'nilai.id_nilai = mahasiswa.id_nilai');
		$query = $this->db->get();
		return $query->result();
	}
	public function insert($data) 
	{
		return $this->db->insert('mahasiswa', $data);
	}

	public function get($id) {
		return $this->db->where('id', $id)->get('mahasiswa')->row();
	}

	public function Update($data, $id)
	{
		return $this->db->where('id', $id)->update('mahasiswa', $data);
	}

	public function delete($id) {
		return $this->db->where('id', $id)->delete('mahasiswa');
	}
}

