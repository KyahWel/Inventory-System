<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication');
		$this->load->model('Employee');
		$this->load->model('AdminModel');
	}
	
	public function Dashboard()
	{
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Dashboard');
		$this->load->view('Footer');
	}

	public function Admin()
	{	
		$data['admin'] = $this->AdminModel->viewData();
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Admin',$data);
		$this->load->view('Footer');
	}

	public function Employee()
	{
		$data['employee'] = $this->Employee->viewData();
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Employees', $data);
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
