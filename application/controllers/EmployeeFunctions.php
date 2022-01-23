<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee');
		$this->load->model('EmployeeAttendance');
	}

	public function addEmployee()
	{
		if(isset($_POST['sss-number']) && isset($_POST['pagibig-number']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
			$this->Employee->insertData();
		}
	}
	public function viewEmployee()
	{	
		// Setup Ajax
		$EmployeeData = $this->input->post('employeeData');
        $records = $this->Employee->getData($EmployeeData);
		$output ='
				<p>First Name: '.$records->firstname.'</p>
                <p>Last Name: '.$records->lastname.'</p>
                <p>Age: '.$records->age.'</p>
				<p>Address: '.$records->address.'</p>
                <p>Position: '.$records->position.'</p>
                <p>SSS Number: '.$records->sss_number.'</p>
                <p>Pag-IBIG Number: '.$records->pagibig_number.'</p>
                <p>PhilHealth Number: '.$records->philhealth_number.'</p>
                <p>TIN Number: '.$records->tin_number.'</p>
                <p>Employment Date: '.$records->employmentDate.'</p>
                <div class="editAnnouncementButton d-flex justify-content-end">
                    <button type="button" class="btn btn-info" value="submit" data-bs-dismiss="modal">Okay</button>
                </div>
		';
		echo $output;
	}
	public function edit_Employee()
	{	
		// Setup Ajax
		$EmployeeData = $this->input->post('employeeData');
        $records = $this->Employee->getData($EmployeeData); 
		$output = '
			<form action="../EmployeeFunctions/updateEmployee/'.$records->employeeID.'" method="POST">
				<div class="row">
					<div class="col-6">
						<p>First Name: <br><input type="text" class="form-control" value="'.$records->firstname.'" required name="firstname"></p>
						<p>Last Name: <br><input type="text" class="form-control" value="'.$records->lastname.'" required name="lastname"></p>
						<p>Age: <br><input type="text" class="form-control" value="'.$records->age.'"required name="age"></p>
						<p>Address: <br><input type="text" class="form-control" value="'.$records->address.'" required name="address"></p>
						<p>Position:
							<select name="position" class="form-control" required id="position">
								<option value="'.$records->position.'" selected hidden>'.$records->position.'</option>
								<option value="driver">Driver</option>
								<option value="helper">Helper</option>
								<option value="machineOperator">Machine Operator</option>
								<option value="secretary">Secretary</option>
							</select>
						</p>
					</div>
					<div class="col-6">
						<p>SSS Number: <br><input type="text" class="form-control" value="'.$records->sss_number.'" disabled required name="sss-number"></p>
						<p>Pag-IBIG Number: <br><input type="text" class="form-control" value="'.$records->pagibig_number.'" disabled  required name="pagibig-number"></p>
						<p>PhilHealth Number: <br><input type="text" class="form-control" value="'.$records->philhealth_number.'" disabled required name="philhealth-number"></p>
						<p>TIN Number: <br><input type="text" class="form-control" value="'.$records->tin_number.'" disabled  required name="tin-number"></p>
						<p>Employment Date: <br><input type="date" class="form-control" value="'.$records->employmentDate.'" disabled required name="employmentDate"></p>
						<div class="editAnnouncementButton d-flex justify-content-end">
							<button type="cancel" class="btn btn-default" value="submit" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-info" value="submit">Save</button>
						</div>
					</div>
				</div>
			</form>
		';
		echo $output;
	}

	public function updateEmployee($id)
	{	
		$this->Employee->updateData($id);
		redirect("Admin/Employee-List");
	}

	public function deleteEmployee()
	{	
		// Setup Ajax
		$EmployeeData = $this->input->post('employeeData');
		$output ='
			<form action="../EmployeeFunctions/delete/'.$EmployeeData.'">
				<div class="modal-header">
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
		// $this->Employee->deleteData($id);
		// redirect("Admin/Employee-List");
	}

	public function delete($id)
	{
		$this->Employee->deleteData($id);
		redirect("Admin/Employee-List");
	}


	public function changePass($id)
	{	
		$this->EmployeeModel->changePassword($id);
	}

	
	public function timeIn(){
		$employeeData = $this->input->post('employeeNumber');
		$this->EmployeeAttendance->timeIn($employeeData);
		redirect('Employee');
	}

	public function timeOut(){
		$employeeData = $this->input->post('employeeNumber');
		$this->EmployeeAttendance->timeOut($employeeData);
		redirect('Employee');
	}
}


