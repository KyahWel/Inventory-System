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
			<p>First Name: </p>
                <p>Last Name: </p>
                <p>Age: </p>
                <p>Position:</p>
                <p>SSS Number: </p>
                <p>Pag-IBIG Number: </p>
                <p>PhilHealth Number:</p>
                <p>TIN Number:</p>
                <p>Employment Date: </p>
                <div class="editAnnouncementButton d-flex justify-content-end">
                    <button type="button" value="submit" data-bs-dismiss="modal">Okay</button>
                </div>
		';
		echo $output;
	}
	public function editEmployee()
	{	
		// Setup Ajax
		$EmployeeData = $this->input->post('EmployeeData');
        $records = $this->Employee->getData($EmployeeData); 
		$output = '';
		echo $output;
	}

	public function updateEmployee($id)
	{	
		$this->EmployeeModel->updateData($id);
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
