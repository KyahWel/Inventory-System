<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EventLog extends CI_Model {

	public function __construct(){	
		parent::__construct();
		$this->load->database();
	}

	public function displayAll(){
		$query = $this->db->query('SELECT * FROM `event_log` ORDER BY `date` DESC,`time_happened` DESC');
		return $query->result();
	}

	public function displayPerDate(){
		$query = $this->db->query('SELECT DISTINCT `date` FROM `event_log` ORDER BY `date` DESC');
		return $query->result();
	}
}
