<?php 

class M_ajar extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_jum_ajar() {
		$query = $this->db->get('data_mengajar');
		return $query->num_rows();
	}
	
	function get_all_ajar($limit, $start) {
		//gunakan query ini untuk data mengajar tanpa paging
		/*
		$this->db->from('data_mengajar');
		$this->db->join('data_gurumapel', 'data_gurumapel.id_guru = data_mengajar.id_guru');
		$this->db->join('data_kelas', 'data_kelas.id_kelas = data_mengajar.id_kelas');
		$this->db->join('data_mapel', 'data_mapel.id_mapel = data_mengajar.id_mapel');
		
		$query = $this->db->get();
		return $query->result();
		*/
		
		$this->db->from('data_mengajar');
		$this->db->join('data_gurumapel', 'data_gurumapel.id_guru = data_mengajar.id_guru');
		$this->db->join('data_kelas', 'data_kelas.id_kelas = data_mengajar.id_kelas');
		$this->db->join('data_mapel', 'data_mapel.id_mapel = data_mengajar.id_mapel');
		$this->db->limit($limit, $start);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function insert_ajar($guru, $kelas, $mapel) {
		$this->db->set('id_guru', $guru);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('id_mapel', $mapel);
		$this->db->insert('data_mengajar');
	}
	
	function delete_ajar($id) {
		$this->db->where('id_ajar', $id);
		$this->db->delete('data_mengajar');
	}
	
	function get_ajar_by_id($id) {
		$this->db->from('data_mengajar');
		$this->db->join('data_gurumapel', 'data_gurumapel.id_guru = data_mengajar.id_guru');
		$this->db->join('data_kelas', 'data_kelas.id_kelas = data_mengajar.id_kelas');
		$this->db->join('data_mapel', 'data_mapel.id_mapel = data_mengajar.id_mapel');
		$this->db->where('id_ajar', $id);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function update_ajar($guru, $kelas, $mapel, $id) {
		$this->db->set('id_guru', $guru);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('id_mapel', $mapel);
		$this->db->where('id_ajar', $id);
		$this->db->update('data_mengajar');
	}
	
	function delete_all_ajar() {
		$this->db->empty_table('data_mengajar');
	}
}