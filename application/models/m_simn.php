<?php 

class M_simn extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_login_guru($nip, $pass) {
		$this->db->where('NIP_guru', $nip);
		$this->db->where('password', $pass);
		$query = $this->db->get('data_gurumapel');
		
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function get_login_bk($nip, $pass) {
		$this->db->where('NIP_bk', $nip);
		$this->db->where('password', $pass);
		$query = $this->db->get('data_bk');
		
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function get_login_waka($nip, $pass) {
		$this->db->where('NIP_waka', $nip);
		$this->db->where('password', $pass);
		$query = $this->db->get('data_wakasiswa');
		
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function get_guru_by_nip($nip) {
		$this->db->where('NIP_guru', $nip);
		$query = $this->db->get('data_gurumapel');
		foreach($query->result() as $row) {
			$id = $row->id_guru;
		}
		
		return $id;
	}
	
	function get_bk_by_nip($bk) {
		$this->db->where('NIP_bk', $bk);
		$query = $this->db->get('data_bk');
		foreach($query->result() as $row) {
			$id = $row->id_bk;
		}
		
		return $id;
	}
	
	function get_waka_by_nip($waka) {
		$this->db->where('NIP_waka', $waka);
		$query = $this->db->get('data_wakasiswa');
		foreach($query->result() as $row) {
			$id = $row->id_waka;
		}
		
		return $id;
	}
}