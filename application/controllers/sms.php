<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->model('m_sms', '', TRUE);
		$this->load->model('m_siswa', '', TRUE);
		$this->load->model('m_nilai', '', TRUE);
		$this->load->model('m_mapel', '', TRUE);
	}
	
	function kirim_sms() {
		$id = $this->uri->segment('3');
		$siswa = $this->m_siswa->get_siswa_by_id($id);
		$nilaiindo = $this->m_nilai->get_nilai_indo_by_id($id);
		$nilaimtk = $this->m_nilai->get_nilai_mtk_by_id($id);
		$nilaiingg = $this->m_nilai->get_nilai_ingg_by_id($id);
		$kkmindo = $this->m_mapel->get_kkm_indo();
		$kkmmtk = $this->m_mapel->get_kkm_mtk();
		$kkmingg = $this->m_mapel->get_kkm_ingg();
		
		foreach($siswa as $sis) {
			$nomer = $sis->no_hp_ortu;
		}
		
		$bwhkkmindo = false;
		$tempindo = "";
		$turunindo = false;
		foreach($nilaiindo as $indo) {
			$ind = $indo->nilai;
			
			if($ind < $kkmindo) {
				$bwhkkmindo = true;
			}
			
			if($ind < $tempindo) {
				$turunindo = true;
				$tempindo = $ind;
				//var_dump($turunindo);
				//var_dump($ind);
				//var_dump($tempindo);
			} else {
				$turunindo = false;
				$tempindo = $ind;
				//var_dump($turunindo);
				//var_dump($ind);
				//var_dump($tempindo);
			}
		}
		
		if($bwhkkmindo == true && $turunindo == true) {
			$pesanindo = "Nilai dibawah KKM, perlu banyak belajar";
		} else if ($bwhkkmindo == false && $turunindo == true) {
			$pesanindo = "Nilai turun, tingkatkan lagi belajar";
		} else if ($bwhkkmindo == true && $turunindo == false) {
			$pesanindo = "Ada nilai dibawah KKM, tingkatkan lagi belajar";
		} else {
			$pesanindo = "Nilai sudah bagus, jangan sampai turun";
		}
		
		$bwhkkmmtk = false;
		$tempmtk = "";
		$turunmtk = false;
		foreach($nilaimtk as $mtk) {
			$mat = $mtk->nilai;
			
			if($mat < $kkmmtk) {
				$bwhkkmmtk = true;
			}
			
			if($mat < $tempmtk) {
				$turunmtk = true;
				$tempmtk = $mat;
			} else {
				$turunmtk = false;
				$tempmtk = $mat;
			}
		}
		
		if($bwhkkmmtk == true && $turunmtk == true) {
			$pesanmtk = "Nilai dibawah KKM, perlu banyak belajar";
		} else if ($bwhkkmmtk == false && $turunmtk == true) {
			$pesanmtk = "Nilai turun, tingkatkan lagi belajar";
		} else if ($bwhkkmmtk == true && $turunmtk == false) {
			$pesanmtk = "Ada nilai dibawah KKM, tingkatkan lagi belajar";
		} else {
			$pesanmtk = "Nilai sudah bagus, jangan sampai turun";
		}
		
		$bwhkkmingg = false;
		$turuningg = false;
		$tempingg = "";
		foreach($nilaiingg as $ingg) {
			$inggris = $ingg->nilai;
			$temp = $inggris;
			
			if($inggris < $kkmingg) {
				$bwhkkmingg = true;
			}
			
			if($inggris < $tempingg) {
				$turuningg = true;
				$tempingg = $inggris;
			} else {
				$turuningg = false;
				$tempingg = $inggris;
			}
		}
		
		if($bwhkkmingg == true && $turuningg == true) {
			$pesaningg = "Nilai dibawah KKM, perlu banyak belajar";
		} else if ($bwhkkmingg == false && $turuningg == true) {
			$pesaningg = "Nilai turun, tingkatkan lagi belajar";
		} else if ($bwhkkmingg == true && $turuningg == false) {
			$pesaningg = "Ada nilai dibawah KKM, tingkatkan lagi belajar";
		} else {
			$pesaningg = "Nilai sudah bagus, jangan sampai turun";
		}
		
		$pesansms = "B.Ind: " .$pesanindo. ", MTK: " .$pesanmtk. ", B.Ingg: " .$pesaningg;
		$this->m_sms->kirim_sms($nomer, $pesansms);
		$this->session->set_flashdata('success', 'SMS Berhasil Dikirim Ke Orang Tua Siswa');
		redirect('nilai/lihat_nilai_siswa');
		
		
		//cek nomer dan pesan
		/*
		$data = array(
			'nomer' => $nomer,
			'pesan' => $pesansms,
			'url' => base_url()
		);
		$this->load->view('bk/coba_sms', $data);
		*/
	}
}