<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Simn extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->model('m_simn', '', TRUE);
	}
	
	function index() {
		$this->load->view('home');
	}
	
	function validasi_login() {
		$nip = $this->input->post('nip');
		$pass = $this->input->post('pass');
		$sbg = $this->input->post('sebagai');
		
		if($sbg == 1) {
			$loginguru = $this->m_simn->get_login_guru($nip, $pass);
			
			if($loginguru == true) {
				$id = $this->m_simn->get_guru_by_nip($nip);
				$data = array(
					'id' => $id,
					'nip' => $nip
				);
				$this->session->set_userdata($data);
				redirect('simn/panel_guru');
			} else {
				$this->session->set_flashdata('error', 'Kombinasi NIP dan Password Salah!');
				redirect('simn/index');
			}
		} else if($sbg == 2) {
			$loginbk = $this->m_simn->get_login_bk($nip, $pass);
			
			if($loginbk == true) {
				$id = $this->m_simn->get_bk_by_nip($nip);
				$data = array(
					'id' => $id,
					'nip' => $nip
				);
				$this->session->set_userdata($data);
				redirect('simn/panel_bk');
			} else {
				$this->session->set_flashdata('error', 'Kombinasi NIP dan Password Salah!');
				redirect('simn/index');
			}
		} else {
			$login = $this->m_simn->get_login_waka($nip, $pass);
			
			if($login == true) {
				$id = $this->m_simn->get_waka_by_nip($nip);
				$data = array(
					'id' => $id,
					'nip' => $nip
				);
				$this->session->set_userdata($data);
				redirect('simn/panel_waka');
			} else {
				$this->session->set_flashdata('error', 'Kombinasi NIP dan Password Salah!');
				redirect('simn/index');
			}
		}
	}
	
	function panel_guru() {
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		//var_dump($this->session->userdata('id'));
		//var_dump($this->session->userdata('nip'));
		$this->load->view('guru/panel_guru');
	}
	
	function panel_bk() {
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$this->load->view('bk/panel_bk');
	}
	
	function panel_waka() {
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$this->load->view('waka/panel_waka');
	}
	
	function logout() {
		$data = array(
			'id' => '',
			'nip' => ''
		);
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		
		redirect('simn/index');
	}
}