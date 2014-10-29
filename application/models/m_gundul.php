<?php

class M_gundul extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_login_admin($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('dobos');
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function insert_log_login($user, $pass, $waktu) {
		$this->db->set('username', $user);
		$this->db->set('password', $pass);
		$this->db->set('waktu_login', $waktu);
		$this->db->insert('log_login_admin');
	}
} 