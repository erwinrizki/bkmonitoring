<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Gurubk extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'date', 'security', 'string'));
		$this->load->model('m_gurubk','',TRUE);
	}
	
	function get_guru() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$guru = $this->m_gurubk->get_all_guru();
		
		$data = array(
			'guru' => $guru,
			'url' => base_url()
		);
		$this->load->view('admin/data_gurubk', $data);
	}
	
	function tambah_guru() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$data = array(
			'url' => base_url()
		);
		
		$this->load->view('admin/tambah_gurubk', $data);
	}
	
	function add_guru() {
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat_lahir');
		$tanggal = $this->input->post('tanggal');
		$pass = $this->input->post('pass');
		
		$this->m_gurubk->insert_gurubk($nip, $nama, $alamat, $tempat, $tanggal, $pass);
		$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
		redirect('Gurubk/get_guru');
	}
	
	function hapus_guru() {
		$id = $this->uri->segment('3');
		$this->m_gurubk->delete_gurubk($id);
		
		$this->session->set_flashdata('hapus', 'Data Berhasil Dihapus!');
		redirect('Gurubk/get_guru');
	}
	
	function edit_guru() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$id = $this->uri->segment('3');
		$guru = $this->m_gurubk->get_guru_by_id($id);
		
		$data = array(
			'guru' => $guru,
			'url' => base_url()
		);
		
		$this->load->view('admin/update_gurubk', $data);
	}
	
	function update_guru() {
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat_lahir');
		$tanggal = $this->input->post('tanggal');
		$pass = $this->input->post('pass');
		
		$this->m_gurubk->update_gurubk($nip, $nama, $alamat, $tempat, $tanggal, $pass, $id);
		$this->session->set_flashdata('update', 'Data Berhasil Diperbarui!');
		redirect('Gurubk/get_guru');
	}
}