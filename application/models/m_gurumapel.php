<?php

class M_gurumapel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_jum_guru() {
		$query = $this->db->get('data_gurumapel');
		return $query->num_rows();
	}
	
	function get_guru() {
		$query = $this->db->get('data_gurumapel');
		return $query->result();
	}
	
	function get_all_guru($limit, $start) {
		//gunakan query ini untuk data guru mapel tanpa paging
		/*
		$query = $this->db->get('data_gurumapel');
		return $query->result();
		*/
		
		$this->db->limit($limit, $start);
		$query = $this->db->get('data_gurumapel');
		return $query->result();
	}
	
	function insert_gurumapel($nip, $nama, $alamat, $tempat, $tanggal, $pass) {
		$this->db->set('NIP_guru', $nip);
		$this->db->set('nama_guru', $nama);
		$this->db->set('alamat_guru', $alamat);
		$this->db->set('tempat_lahir_guru', $tempat);
		$this->db->set('tanggal_lahir_guru', $tanggal);
		$this->db->set('password', $pass);
		
		$this->db->insert('data_gurumapel');
	}
	
	function delete_gurumapel($id) {
		$this->db->where('id_guru', $id);
		$this->db->delete('data_gurumapel');
	}
	
	function get_guru_by_id($id) {
		$this->db->where('id_guru', $id);
		$query = $this->db->get('data_gurumapel');
		
		return $query->result();
	}
	
	function update_gurumapel($nip, $nama, $alamat, $tempat, $tanggal, $pass, $id) {
		$this->db->set('NIP_guru', $nip);
		$this->db->set('nama_guru', $nama);
		$this->db->set('alamat_guru', $alamat);
		$this->db->set('tempat_lahir_guru', $tempat);
		$this->db->set('tanggal_lahir_guru', $tanggal);
		$this->db->set('password', $pass);
		$this->db->where('id_guru', $id);
		$this->db->update('data_gurumapel');
	}
}