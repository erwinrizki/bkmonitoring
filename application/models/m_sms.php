<?php 

class M_sms extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function kirim_sms($nomer, $pesan) {
		$this->sms = $this->load->database('default2', TRUE);
		$this->sms->set('DestinationNumber', $nomer);
		$this->sms->set('TextDecoded', $pesan);
		$this->sms->set('CreatorID', 'Gammu');
		$this->sms->insert('outbox');
	}
}