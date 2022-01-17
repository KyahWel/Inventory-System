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
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
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
					<h4 class="modal-title">Edit Admin</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Firstname</label>
						<input type="text" class="form-control" name="firstname" value="'.$records->firstname.'" required>
					</div>
					<div class="form-group">
						<label>Lastname</label>
						<input type="text" class="form-control" name="lastname"  value="'.$records->lastname.'" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username"  value="'.$records->username.'" required>
					</div>
					<div class="form-group">
						<label>Position at Company</label>
						<select name="positon" class="form-control" requred>
							<option value="'.$records->position.'" selected hidden disabled>'.$records->position.'</option>
							<option value="Admin">Admin</option>
							<option value="Secretary">Secretary</option>
						</select>
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
		';
		echo $output;
	}

	public function delete(){
		$adminData = $this->input->post('adminData');
		$output='
				<form action="../AdminFunctions/deleteAdmin/'.$adminData.'">
					<div class="modal-header">
						<h4 class="modal-title">Delete Admin</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
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
