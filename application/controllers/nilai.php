<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('session');
		$this->load->model('m_siswa', '', TRUE);
		$this->load->model('m_mapel', '', TRUE);
		$this->load->model('m_kelas', '', TRUE);
		$this->load->model('m_nilai', '', TRUE);
	}
	
	function pilih_penilaian() {
		$id = $this->session->userdata('id');
		//$mapel = $this->m_mapel->get_all_mapel();
		$mapel = $this->m_nilai->get_mapel_guru($id);
		
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$data = array(
			'url' => base_url(),
			'mapel' => $mapel
		);
		$this->load->view('guru/pilih_penilaian', $data);
	}
	
	function pilih_kelas() {
		$mapel = $this->input->post('mapel');
		$guru = $this->session->userdata('id');
		$kelas = $this->m_nilai->pilih_kelas($mapel, $guru);
		$data .= "<option value=''>Pilih Kelas</option>";
		foreach($kelas as $kls) {
			$data .= "<option value='$kls[id_kelas]'>$kls[nama_kelas]</option>\n";
		}
		echo $data;
	}
	
	function input_nilai() {
		$mapel = $this->input->post('mapel');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$mpl = $this->m_mapel->get_mapel_by_id($mapel);
		$kls = $this->m_kelas->get_kelas_by_id($kelas);
		$siswa = $this->m_nilai->daftar_siswa($kelas);
		$guru = $this->session->userdata('id');
		$ceknilai = $this->m_nilai->cek_ketersediaan_nilai($mapel, $kelas, $semester);
		
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		if($ceknilai == true) {
			$this->session->set_flashdata('error', 'Nilai Untuk Mapel dan Kelas Tersebut Telah Anda Input!');
			redirect('simn/panel_guru');
		}
		
		$data = array(
			'url' => base_url(),
			'mapel' => $mpl,
			'kelas' => $kls,
			'semester' => $semester,
			'siswa' => $siswa
		);
		$this->load->view('guru/input_nilai', $data);
	}
	
	function simpan_nilai() {
		$mapel = $this->input->post('mapel');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$nilai = $this->input->post('nilai');
		$guru = $this->session->userdata('id');
		
		foreach($nilai as $nilaikey => $nilaivalue) {
			$this->m_nilai->insert_nilai($nilaivalue, $nilaikey, $mapel, $kelas, $guru, $semester);
		}
		
		$this->session->set_flashdata('success', 'Nilai Berhasil Disimpan!');
		redirect('simn/panel_guru');
	}
	
	function lihat_nilai_siswa() {
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$this->load->view('bk/lihat_nilai_siswa');
	}
	
	function lihat_nilai_siswa_waka() {
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$this->load->view('waka/lihat_nilai_siswa');
	}
	
	function cari_siswa() {
		if($this->input->get('form_nisn')) {
			$nisn = $this->input->get('nisn');
			$siswa = $this->m_siswa->get_siswa_nisn($nisn);
			
			$data = array(
				'url' => base_url(),
				'nisn' => $nisn,
				'siswa' => $siswa
			);
		} else {
			$nama = $this->input->get('nama');
			$siswa = $this->m_siswa->get_siswa_nama($nama);
			
			$data = array(
				'url' => base_url(),
				'nama' => $nama,
				'siswa' => $siswa
			);
		}
		
		$this->load->view('bk/lihat_nilai_siswa', $data);
	}
	
	function cari_siswa_waka() {
		if($this->input->get('form_nisn')) {
			$nisn = $this->input->get('nisn');
			$siswa = $this->m_siswa->get_siswa_nisn($nisn);
			
			$data = array(
				'url' => base_url(),
				'nisn' => $nisn,
				'siswa' => $siswa
			);
		} else {
			$nama = $this->input->get('nama');
			$siswa = $this->m_siswa->get_siswa_nama($nama);
			
			$data = array(
				'url' => base_url(),
				'nama' => $nama,
				'siswa' => $siswa
			);
		}
		
		$this->load->view('waka/lihat_nilai_siswa', $data);
	}
	
	function lihat_grafik_nilai_siswa() {
		$idsiswa = $this->uri->segment('3');
		$mapel = $this->m_mapel->get_all_mapel();
		$nilai = $this->m_nilai->get_nilai_siswa_by_id($idsiswa);
		$siswa = $this->m_siswa->get_siswa_by_id($idsiswa);
		
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$data = array(
			'url' => base_url(),
			'id_siswa' => $idsiswa,
			'mapel' => $mapel,
			'siswa' => $siswa,
			'nilai' => $nilai
		);
		
		$this->load->view('bk/grafik_nilai_siswa', $data);
	}
	
	function lihat_grafik_nilai_siswa_waka() {
		$idsiswa = $this->uri->segment('3');
		$mapel = $this->m_mapel->get_all_mapel();
		$nilai = $this->m_nilai->get_nilai_siswa_by_id($idsiswa);
		$siswa = $this->m_siswa->get_siswa_by_id($idsiswa);
		
		if($this->session->userdata('id') == '') {
			redirect('simn/index');
		}
		
		$data = array(
			'url' => base_url(),
			'id_siswa' => $idsiswa,
			'mapel' => $mapel,
			'siswa' => $siswa,
			'nilai' => $nilai
		);
		
		$this->load->view('waka/grafik_nilai_siswa', $data);
	}
}