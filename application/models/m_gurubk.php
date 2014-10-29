<?php

class M_gurubk extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_all_guru() {
		$query = $this->db->get('data_bk');
		return $query->result();
	}
	
	function insert_gurubk($nip, $nama, $alamat, $tempat, $tanggal, $pass) {
		$this->db->set('NIP_bk', $nip);
		$this->db->set('nama_bk', $nama);
		$this->db->set('alamat_bk', $alamat);
		$this->db->set('tempat_lahir_bk', $tempat);
		$this->db->set('tanggal_lahir_bk', $tanggal);
		$this->db->set('password', $pass);
		
		$this->db->insert('data_bk');
	}
	
	function delete_gurubk($id) {
		$this->db->where('id_bk', $id);
		$this->db->delete('data_bk');
	}
	
	function get_guru_by_id($id) {
		$this->db->where('id_bk', $id);
		$query = $this->db->get('data_bk');
		
		return $query->result();
	}
	
	function update_gurubk($nip, $nama, $alamat, $tempat, $tanggal, $pass, $id) {
		$this->db->set('NIP_bk', $nip);
		$this->db->set('nama_bk', $nama);
		$this->db->set('alamat_bk', $alamat);
		$this->db->set('tempat_lahir_bk', $tempat);
		$this->db->set('tanggal_lahir_bk', $tanggal);
		$this->db->set('password', $pass);
		$this->db->where('id_bk', $id);
		$this->db->update('data_bk');
	}
}