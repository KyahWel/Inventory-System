<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee');
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
                    <button type="button" value="submit" data-bs-dismiss="modal">Okay</button>
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
				<p>First Name: <br><input type="text" value="'.$records->firstname.'" required name="firstname"></p>
				<p>Last Name: <br><input type="text" value="'.$records->lastname.'" required name="lastname"></p>
				<p>Age: <br><input type="text" value="'.$records->age.'"required name="age"></p>
				<p>Address: <br><input type="text" value="'.$records->address.'" required name="address"></p>
				<p>Position:
					<select name="position" required id="position">
						<option value="'.$records->position.'" selected hidden>'.$records->position.'</option>
						<option value="driver">Driver</option>
						<option value="helper">Helper</option>
						<option value="machineOperator">Machine Operator</option>
						<option value="secretary">Secretary</option>
					</select>
				</p>
				<p>SSS Number: <br><input type="text" value="'.$records->sss_number.'" disabled required name="sss-number"></p>
				<p>Pag-IBIG Number: <br><input type="text" value="'.$records->pagibig_number.'" disabled  required name="pagibig-number"></p>
				<p>PhilHealth Number: <br><input type="text" value="'.$records->philhealth_number.'" disabled required name="philhealth-number"></p>
				<p>TIN Number: <br><input type="text" value="'.$records->tin_number.'" disabled  required name="tin-number"></p>
				<p>Employment Date: <br><input type="date" value="'.$records->employmentDate.'" disabled required name="employmentDate"></p>
				<div class="editAnnouncementButton d-flex justify-content-end">
					<button type="submit" value="submit">Edit</button>
					<button type="cancel" value="submit" data-bs-dismiss="modal">Cancel</button>
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

	public function deleteEmployee($id)
	{	
		$this->Employee->deleteData($id);
		redirect("Admin/Employee-List");
	}


	public function changePass($id)
	{	
		$this->EmployeeModel->changePassword($id);
	}
}
