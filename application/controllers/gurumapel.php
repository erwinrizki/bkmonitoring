<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Gurumapel extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library(array('session', 'pagination'));
		$this->load->helper(array('form', 'url', 'date', 'security', 'string'));
		$this->load->model('m_gurumapel','',TRUE);
	}
	
	function get_guru() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		//gunakan ini untuk data guru tanpa paging
		/*
		$guru = $this->m_gurumapel->get_all_guru();
		
		$data = array(
			'guru' => $guru,
			'url' => base_url()
		);
		$this->load->view('admin/data_gurumapel', $data);
		*/
		
		$jumlah = $this->m_gurumapel->get_jum_guru();
		
		$config['base_url'] = base_url(). "/gurumapel/get_guru";
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
	   
		$data['guru'] = $this->m_gurumapel->get_all_guru($config["per_page"], $page);
		$data['links'] = $this->pagination->create_links();
		$data['url'] = base_url();
		$this->load->view('admin/data_gurumapel', $data);
	}
	
	function tambah_guru() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$data = array(
			'url' => base_url()
		);
		
		$this->load->view('admin/tambah_gurumapel', $data);
	}
	
	function add_guru() {
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat_lahir');
		$tanggal = $this->input->post('tanggal');
		$pass = $this->input->post('pass');
		
		$this->m_gurumapel->insert_gurumapel($nip, $nama, $alamat, $tempat, $tanggal, $pass);
		$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
		redirect('Gurumapel/get_guru');
	}
	
	function hapus_guru() {
		$id = $this->uri->segment('3');
		$this->m_gurumapel->delete_gurumapel($id);
		
		$this->session->set_flashdata('hapus', 'Data Berhasil Dihapus!');
		redirect('Gurumapel/get_guru');
	}
	
	function edit_guru() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$id = $this->uri->segment('3');
		$guru = $this->m_gurumapel->get_guru_by_id($id);
		
		$data = array(
			'guru' => $guru,
			'url' => base_url()
		);
		
		$this->load->view('admin/update_gurumapel', $data);
	}
	
	function update_guru() {
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat_lahir');
		$tanggal = $this->input->post('tanggal');
		$pass = $this->input->post('pass');
		
		$this->m_gurumapel->update_gurumapel($nip, $nama, $alamat, $tempat, $tanggal, $pass, $id);
		$this->session->set_flashdata('update', 'Data Berhasil Diperbarui!');
		redirect('Gurumapel/get_guru');
	}
}