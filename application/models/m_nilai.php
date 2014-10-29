<?php 

class M_nilai extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_mapel_guru($id) {
		$this->db->select('*');
		$this->db->from('data_mapel');
		$this->db->join('data_mengajar', 'data_mapel.id_mapel=data_mengajar.id_mapel');
		$this->db->where('data_mengajar.id_guru', $id);
		$this->db->group_by('data_mapel.id_mapel');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function pilih_kelas($mapel, $guru) {
		$this->db->from('data_mengajar');
		$this->db->join('data_kelas', 'data_kelas.id_kelas=data_mengajar.id_kelas');
		$this->db->where('id_mapel', $mapel);
		$this->db->where('id_guru', $guru);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}
	
	function daftar_siswa($kelas) {
		$this->db->where('id_kelas', $kelas);
		$this->db->order_by('nama_siswa', 'asc');
		$query = $this->db->get('data_siswa');
		
		return $query->result();
	}
	
	function insert_nilai($nilaivalue, $nilaikey, $mapel, $kelas, $guru, $semester) {
		$this->db->set('nilai', $nilaivalue);
		$this->db->set('id_siswa', $nilaikey);
		$this->db->set('id_mapel', $mapel);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('id_guru', $guru);
		$this->db->set('semester', $semester);
		
		$this->db->insert('data_nilai');
	}
	
	function cek_ketersediaan_nilai($mapel, $kelas, $semester) {
		$this->db->where('id_mapel', $mapel);
		$this->db->where('id_kelas', $kelas);
		$this->db->where('semester', $semester);
		$query = $this->db->get('data_nilai');
		
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function get_nilai_siswa_by_id($id) {
		$this->db->where('id_siswa', $id);
		$query = $this->db->get('data_nilai');
		
		return $query->result();
	}
	
	function get_nilai_indo_by_id($id) {
		$this->db->where('id_siswa', $id);
		$this->db->where('id_mapel', '1');
		$query = $this->db->get('data_nilai');
		
		return $query->result();
	}
	
	function get_nilai_mtk_by_id($id) {
		$this->db->where('id_siswa', $id);
		$this->db->where('id_mapel', '2');
		$query = $this->db->get('data_nilai');
		
		return $query->result();
	}
	
	function get_nilai_ingg_by_id($id) {
		$this->db->where('id_siswa', $id);
		$this->db->where('id_mapel', '3');
		$query = $this->db->get('data_nilai');
		
		return $query->result();
	}
}