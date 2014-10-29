<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library(array('session', 'pagination'));
		$this->load->helper(array('form', 'url', 'date', 'security', 'string'));
		$this->load->model('m_siswa','',TRUE);
		$this->load->model('m_kelas','',TRUE);
	}
	
	function get_siswa() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		//gunakan ini untuk data siswa tanpa paging
		/*
		$siswa = $this->m_siswa->get_all_siswa();
		
		$data = array(
			'siswa' => $siswa,
			'url' => base_url()
		);
		$this->load->view('admin/data_siswa', $data);
		*/
		
		$jumlah = $this->m_siswa->get_jum_siswa();
		
		$config['base_url'] = base_url(). "/siswa/get_siswa";
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
	   
		$data['siswa'] = $this->m_siswa->get_all_siswa($config["per_page"], $page);
		$data['links'] = $this->pagination->create_links();
		$data['url'] = base_url();
		$this->load->view('admin/data_siswa', $data);
	}
	
	function tambah_siswa() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$kelas = $this->m_kelas->get_kelas();
		$data = array(
			'kelas' => $kelas,
			'url' => base_url()
		);
		
		$this->load->view('admin/tambah_siswa', $data);
	}
	
	function add_siswa() {
		$induk = $this->input->post('induk');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat_lahir');
		$tanggal = $this->input->post('tanggal');
		$ortu = $this->input->post('ortu');
		$nohp = $this->input->post('nohp');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		
		$this->m_siswa->insert_siswa($induk, $nama, $alamat, $tempat, $tanggal, $ortu, $nohp, $kelas, $semester);
		$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
		redirect('Siswa/get_siswa');
	}
	
	function hapus_siswa() {
		$id = $this->uri->segment('3');
		$this->m_siswa->delete_siswa($id);
		
		$this->session->set_flashdata('hapus', 'Data Berhasil Dihapus!');
		redirect('Siswa/get_siswa');
	}
	
	function edit_siswa() {
		if($this->session->userdata('admin') == '') {
			redirect('wonggundul/index');
		}
		
		$id = $this->uri->segment('3');
		$siswa = $this->m_siswa->get_siswa_by_id($id);
		$kelas = $this->m_kelas->get_kelas();
		
		$data = array(
			'kelas' => $kelas,
			'siswa' => $siswa,
			'url' => base_url()
		);
		
		$this->load->view('admin/update_siswa', $data);
	}
	
	function update_siswa() {
		$id = $this->input->post('id');
		$induk = $this->input->post('induk');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat_lahir');
		$tanggal = $this->input->post('tanggal');
		$ortu = $this->input->post('ortu');
		$nohp = $this->input->post('nohp');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		
		$this->m_siswa->update_siswa($induk, $nama, $alamat, $tempat, $tanggal, $ortu, $nohp, $kelas, $semester, $id);
		$this->session->set_flashdata('update', 'Data Berhasil Diperbarui!');
		redirect('Siswa/get_siswa');
	}
}