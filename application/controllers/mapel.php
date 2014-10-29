<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'date', 'security', 'string'));
		$this->load->model('m_mapel', '', TRUE);
	}
	
	function get_mapel() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$mapel = $this->m_mapel->get_all_mapel();
		$data = array(
			'url' => base_url(),
			'mapel' => $mapel
		);
		
		$this->load->view('admin/data_mapel', $data);
	}
	
	function tambah_mapel() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$this->load->view('admin/tambah_mapel');
	}
	
	function add_mapel() {
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$kkm = $this->input->post('kkm');
		
		$this->m_mapel->insert_mapel($kode, $nama, $kkm);
		$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
		redirect('Mapel/get_mapel');
	}
	
	function hapus_mapel() {
		$id = $this->uri->segment('3');
		$this->m_mapel->delete_mapel($id);
		
		$this->session->set_flashdata('hapus', 'Data Berhasil Dihapus!');
		redirect('Mapel/get_mapel');
	}
	
	function edit_mapel() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$id = $this->uri->segment('3');
		$mapel = $this->m_mapel->get_mapel_by_id($id);
		
		$data = array(
			'url' => base_url(),
			'mapel' => $mapel
		);
		
		$this->load->view('admin/update_mapel', $data);
	}
	
	function update_mapel() {
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$kkm = $this->input->post('kkm');
		
		$this->m_mapel->update_mapel($kode, $nama, $kkm, $id);
		$this->session->set_flashdata('update', 'Data Berhasil Diperbarui!');
		redirect('Mapel/get_mapel');
	}
}