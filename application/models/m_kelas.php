<?php

class M_kelas extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_jum_kelas() {
		$query = $this->db->get('data_kelas');
		return $query->num_rows();
	}
	
	function get_kelas() {
		$query = $this->db->get('data_kelas');
		return $query->result();
	}
	
	function get_all_kelas($limit, $start) {
		//gunakan query ini jika tanpa pagin
		/*
		$query = $this->db->get('data_kelas');
		return $query->result();
		*/
		
		$this->db->limit($limit, $start);
		$query = $this->db->get('data_kelas');
		return $query->result();
	}
	
	function insert_kelas($nama) {
		$this->db->set('nama_kelas', $nama);
		$this->db->insert('data_kelas');
	}
	
	function delete_kelas($id) {
		$this->db->where('id_kelas', $id);
		$this->db->delete('data_kelas');
	}
	
	function get_kelas_by_id($id) {
		$this->db->from('data_kelas');
		$this->db->where('id_kelas', $id);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function update_kelas($id, $nama) {
		$this->db->set('nama_kelas', $nama);
		$this->db->where('id_kelas', $id);
		$this->db->update('data_kelas');
	}
}