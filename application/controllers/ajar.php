<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Ajar extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('session', 'pagination'));
		$this->load->helper(array('form', 'url', 'string', 'security', 'date'));
		$this->load->model('m_ajar', '', TRUE);
		$this->load->model('m_gurumapel', '', TRUE);
		$this->load->model('m_kelas', '', TRUE);
		$this->load->model('m_mapel', '', TRUE);
	}
	
	function get_ajar() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		//gunakan ini untuk data ajar tanpa paging
		/*
		$ajar = $this->m_ajar->get_all_ajar();
		$data = array(
			'ajar' => $ajar,
			'url' => base_url()
		);
		
		$this->load->view('admin/data_ajar', $data);
		*/
		
		$jumlah = $this->m_ajar->get_jum_ajar();
		
		$config['base_url'] = base_url(). "/ajar/get_ajar";
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5;
		
		//gunakan config ini untuk pagination bootstrap
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
	   
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	   
		$data['ajar'] = $this->m_ajar->get_all_ajar($config["per_page"], $page);
		$data['links'] = $this->pagination->create_links();
		$data['url'] = base_url();
		$this->load->view('admin/data_ajar', $data);
	}
	
	function tambah_ajar() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$guru = $this->m_gurumapel->get_guru();
		$kelas = $this->m_kelas->get_kelas();
		$mapel = $this->m_mapel->get_all_mapel();
		
		$data = array(
			'guru' => $guru,
			'kelas' => $kelas,
			'mapel' => $mapel,
			'url' => base_url()
		);
		
		$this->load->view('admin/tambah_ajar', $data);
	}
	
	function add_ajar() {
		$guru = $this->input->post('guru');
		$kelas = $this->input->post('kelas');
		$mapel = $this->input->post('mapel');
		
		$this->m_ajar->insert_ajar($guru, $kelas, $mapel);
		$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
		redirect('ajar/get_ajar');
	}
	
	function hapus_ajar() {
		$id = $this->uri->segment('3');
		$this->m_ajar->delete_ajar($id);
		
		$this->session->set_flashdata('hapus', 'Data Berhasil Dihapus!');
		redirect('ajar/get_ajar');
	}
	
	function edit_ajar() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
	
		$id = $this->uri->segment('3');
		$ajar = $this->m_ajar->get_ajar_by_id($id);
		$guru = $this->m_gurumapel->get_guru();
		$kelas = $this->m_kelas->get_kelas();
		$mapel = $this->m_mapel->get_all_mapel();
		
		$data = array(
			'ajar' => $ajar,
			'guru' => $guru,
			'kelas' => $kelas,
			'mapel' => $mapel,
			'url' => base_url()
		);
		
		$this->load->view('admin/update_ajar', $data);
	}
	
	function update_ajar() {
		$id = $this->input->post('id');
		$guru = $this->input->post('guru');
		$kelas = $this->input->post('kelas');
		$mapel = $this->input->post('mapel');
		
		$this->m_ajar->update_ajar($guru, $kelas, $mapel, $id);
		$this->session->set_flashdata('update', 'Data Berhasil Diperbarui!');
		redirect('ajar/get_ajar');
	}
}