<?php 

class M_mapel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_all_mapel() {
		$query = $this->db->get('data_mapel');
		return $query->result();
	}
	
	function insert_mapel($kode, $nama, $kkm) {
		$this->db->set('kode_mapel', $kode);
		$this->db->set('nama_mapel', $nama);
		$this->db->set('kkm_mapel', $kkm);
		
		$this->db->insert('data_mapel');
	}
	
	function delete_mapel($id) {
		$this->db->where('id_mapel', $id);
		$this->db->delete('data_mapel');
	}
	
	function get_mapel_by_id($id) {
		$this->db->where('id_mapel', $id);
		$query = $this->db->get('data_mapel');
		
		return $query->result();
	}
	
	function update_mapel($kode, $nama, $kkm, $id) {
		$this->db->set('kode_mapel', $kode);
		$this->db->set('nama_mapel', $nama);
		$this->db->set('kkm_mapel', $kkm);
		$this->db->where('id_mapel', $id);
		$this->db->update('data_mapel');
	}
	
	function get_kkm_indo() {
		$this->db->where('id_mapel', '1');
		$query = $this->db->get('data_mapel');
		
		foreach($query->result() as $row) {
			$kkm = $row->kkm_mapel;
		}
		
		return $kkm;
	}
	
	function get_kkm_mtk() {
		$this->db->where('id_mapel', '2');
		$query = $this->db->get('data_mapel');
		
		foreach($query->result() as $row) {
			$kkm = $row->kkm_mapel;
		}
		
		return $kkm;
	}
	
	function get_kkm_ingg() {
		$this->db->where('id_mapel', '3');
		$query = $this->db->get('data_mapel');
		
		foreach($query->result() as $row) {
			$kkm = $row->kkm_mapel;
		}
		
		return $kkm;
	}
}