<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication');
	}
	
	public function Dashboard()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Dashboard');
		$this->load->view('Footer');
	}

	public function Admin()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Admin');
		$this->load->view('Footer');
	}

	public function Employee()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Employees');
		$this->load->view('Footer');
	}

	public function Payroll()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Payroll');
		$this->load->view('Footer');
	}

	public function Profile()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Profile');
		$this->load->view('Footer');
	}

	public function Event()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Eventlog');
		$this->load->view('Footer');
	}

	public function ChangePassword()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/ChangePassword');
		$this->load->view('Footer');
	}
}
