<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
	}

	public function addAdmin()
	{
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
			$this->Admin->insertData();
		}
	}
	public function viewAdmin()
	{	
		// Setup Ajax
		$adminData = $this->input->post('adminData');
        $records = $this->Admin->getData($adminData);
		$output =' ';
		echo $output;
	}
	public function editAdmin()
	{	
		// Setup Ajax
		$adminData = $this->input->post('adminData');
        $records = $this->Admin->getData($adminData); 
		$output = '';
		echo $output;
	}

	public function updateAdmin($id)
	{	
		$this->AdminModel->updateData($id);
		// redirect("Admin/admin"); <- Change to Admin page
	}

	public function deleteAdmin($id)
	{	
		$this->Admin->deleteData($id);
		// redirect("Admin/admin");  <- Change to Admin page
	}


	public function changePass($id)
	{	
		$this->AdminModel->changePassword($id);
	}
}
