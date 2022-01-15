<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication');
	}
	
	public function Home()
	{
		$this->load->view('Header');
		$this->load->view('Admin_Page');
		$this->load->view('Footer');
	}
}
