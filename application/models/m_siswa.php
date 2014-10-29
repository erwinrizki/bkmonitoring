<?php

class M_siswa extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_jum_siswa() {
		$query = $this->db->get('data_siswa');
		return $query->num_rows();
	}
	
	function get_all_siswa($limit, $start) {
		//gunakan query ini jika tanpa paging
		/*
		$query = $this->db->get('data_siswa');
		return $query->result();
		*/
		
		$this->db->limit($limit, $start);
		$query = $this->db->get('data_siswa');
		return $query->result();
	}
	
	function get_semua_siswa() {
		$query = $this->db->get('data_siswa');
		return $query->result();
	}
	
	function insert_siswa($induk, $nama, $alamat, $tempat, $tanggal, $ortu, $nohp, $kelas, $semester) {
		$this->db->set('no_induk_siswa', $induk);
		$this->db->set('nama_siswa', $nama);
		$this->db->set('alamat_siswa', $alamat);
		$this->db->set('tempat_lahir_siswa', $tempat);
		$this->db->set('tanggal_lahir_siswa', $tanggal);
		$this->db->set('nama_ortu', $ortu);
		$this->db->set('no_hp_ortu', $nohp);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('semester', $semester);
		
		$this->db->insert('data_siswa');
	}
	
	function delete_siswa($id) {
		$this->db->where('id_siswa', $id);
		$this->db->delete('data_siswa');
	}
	
	function get_siswa_by_id($id) {
		$this->db->where('id_siswa', $id);
		$query = $this->db->get('data_siswa');
		
		return $query->result();
	}
	
	function update_siswa($induk, $nama, $alamat, $tempat, $tanggal, $ortu, $nohp, $kelas, $semester, $id) {
		$this->db->set('no_induk_siswa', $induk);
		$this->db->set('nama_siswa', $nama);
		$this->db->set('alamat_siswa', $alamat);
		$this->db->set('tempat_lahir_siswa', $tempat);
		$this->db->set('tanggal_lahir_siswa', $tanggal);
		$this->db->set('nama_ortu', $ortu);
		$this->db->set('no_hp_ortu', $nohp);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('semester', $semester);
		$this->db->where('id_siswa', $id);
		$this->db->update('data_siswa');
	}
	
	function get_siswa_nisn($nisn) {
		$this->db->where('no_induk_siswa', $nisn);
		$query = $this->db->get('data_siswa');
		
		return $query->result();
	}
	
	function get_siswa_nama($nama) {
		$this->db->like('nama_siswa', $nama);
		$query = $this->db->get('data_siswa');
		
		return $query->result();
	}
	
	function update_semester_by_id($id, $semester) {
		$this->db->set('semester', $semester);
		$this->db->where('id_siswa', $id);
		$this->db->update('data_siswa');
	}
}