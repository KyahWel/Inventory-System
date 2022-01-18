<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct() {
        parent:: __construct();
        $this->load->model('AdminModel');
		if ($this->session->has_userdata('authenticated')){
			$this->session->set_flashdata('logout','Please logout first'); 
			redirect('Admin/Dashboard');
		}
    }

	public function index()
	{
		$this->load->view('Header');
		$this->load->view('Login');
		$this->load->view('Footer');
	}

	public function admin_login(){
		$data = $this->AdminModel->login();
			if($data != NULL){ 
				$auth_userdetails = [
					'adminID' => $data->adminID,
					'password'=> $data->password,
					'firstname' =>  $data->firstname,
					'lastname' =>  $data->lastname,
					'username' =>  $data->username,
					'dateAdded' =>  $data->dateAdded,
					'timeAdded' => $data->timeAdded
				];
				$this->session->set_userdata('auth_user',$auth_userdetails);
				$this->session->set_userdata('authenticated',"1");
				$this->session->set_flashdata('success','Login Succesfully');
				redirect('Admin/Dashboard');
			}
			else{
				$this->session->set_flashdata('loginerror','Invalid Username or Password'); 
				redirect('Login');
			}
	}
}
