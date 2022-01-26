<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
	}

	public function addAdmin()
	{
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['employeeID'])){
			$this->AdminModel->insertData();
			redirect('Admin/Admin-List');
		}
	}
	public function viewAdmin()
	{	
		// Setup Ajax
		$adminData = $this->input->post('adminData');
        $records = $this->AdminModel->getData($adminData);
		$output =' ';
		echo $output;
	}
	public function editAdmin()
	{	
		// Setup Ajax
		$adminData = $this->input->post('adminData');
        $records = $this->AdminModel->getData($adminData); 
		$output = '
			<form method="POST" action="../AdminFunctions/updateAdmin/'.$records->adminID.'">
				<div class="modal-header">
					<h4 class="modal-title text-faded">Edit Admin</h4>
					<button type="button" class="close text-faded" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class=" text-faded">Firstname</label>
						<input type="text" class="form-control" name="firstname" value="'.$records->firstname.'" required>
					</div>
					<div class="form-group">
						<label class=" text-faded">Lastname</label>
						<input type="text" class="form-control" name="lastname"  value="'.$records->lastname.'" required>
					</div>
					<div class="form-group">
						<label class=" text-faded">Username</label>
						<input type="text" class="form-control" name="username"  value="'.$records->username.'" required>
					</div>	
				</div>
				<div class="modal-footer bg-dark">
					<input type="button" class="btn btn-default bg-white text-dark" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		';
		echo $output;
	}

	public function delete(){
		$adminData = $this->input->post('adminData');
		$output='
				<form action="../AdminFunctions/deleteAdmin/'.$adminData.'">
					<div class="modal-header  text-faded">
						<h4 class="modal-title">Delete Admin</h4>
						<button type="button" class="close text-faded" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body  text-faded">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer bg-dark">
						<input type="button" class="btn btn-default bg-white text-dark" data-bs-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
		';
		echo $output;
	}

	public function updateAdmin($id)
	{	
		$this->AdminModel->updateData($id);
		redirect("Admin/Admin-List");
	}

	public function deleteAdmin($id)
	{	
		$this->AdminModel->deleteAdmin($id);
		redirect("Admin/Admin-List");
	}


	public function changePass($id)
	{	
		$this->AdminModel->changePassword($id);
	}
}
