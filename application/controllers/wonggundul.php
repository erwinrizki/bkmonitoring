<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Wonggundul extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'string', 'security', 'date'));
		$this->load->model('m_gundul', '', TRUE);
		$this->load->model('m_siswa', '', TRUE);
		$this->load->model('m_ajar', '', TRUE);
	}
	
	function index() {
		$this->load->view('admin/login');
	}
	
	function validasi_login_admin() {
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$passd = md5($pass);
		
		$login = $this->m_gundul->get_login_admin($user, $passd);
		if($login == true) {
			$waktu = date("Y-m-d H:i:s");
			$this->m_gundul->insert_log_login($user, $passd, $waktu);
			
			$this->session->set_userdata('admin', $user);
			redirect('wonggundul/panel_admin');
		} else {
			$this->session->set_flashdata('error', 'Kombinasi Username dan Password Salah!');
			redirect('wonggundul/index');
		}
	}
	
	function panel_admin() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$this->load->view('admin/panel_admin');
	}
	
	function logout() {
		$this->session->set_userdata('admin', '');
		$this->session->sess_destroy();
		
		redirect('wonggundul/index');
	}
	
	function ganti_semester() {
		$siswa = $this->m_siswa->get_semua_siswa();
		
		foreach($siswa as $sis) {
			$id = $sis->id_siswa;
			$sem = $sis->semester;
			$semplus = $sem + 1;
			
			$this->m_siswa->update_semester_by_id($id, $semplus);
		}
		
		$this->session->set_flashdata('semester', 'Ganti Semester Berhasil');
		redirect('wonggundul/panel_admin');
	}
	
	function ganti_tahun_ajaran() {
		$siswa = $this->m_siswa->get_semua_siswa();
		
		foreach($siswa as $sis) {
			$id = $sis->id_siswa;
			$sem = $sis->semester;
			$semplus = $sem + 1;
			
			$this->m_siswa->update_semester_by_id($id, $semplus);
		}
		$this->m_ajar->delete_all_ajar();
		
		$this->session->set_flashdata('ajaran', 'Ganti Tahun Ajaran Berhasil');
		redirect('wonggundul/panel_admin');
	}
}