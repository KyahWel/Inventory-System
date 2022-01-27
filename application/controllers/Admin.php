<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication');
		$this->load->model('Employee');
		$this->load->model('AdminModel');
		$this->load->model('EmployeeAttendance');
	}
	
	public function Dashboard()
	{	
		$data['employee'] = $this->Employee->countEmployee();
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Dashboard',$data);
		$this->load->view('Footer');
	}

	public function Admin()
	{	
		$data['employee'] = $this->Employee->viewData();
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
		$data['payroll'] = $this->EmployeeAttendance->view_data();
		$this->load->view('Header');
		$this->load->view('Admin-Sidebar/Payroll',$data);
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
