<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee');
		$this->load->model('EmployeeAttendance');
		$this->load->model('AdminModel');
		$this->load->helper('security');
	}

	public function addEmployee()
	{
		if(isset($_POST['sss-number']) && isset($_POST['pagibig-number']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
			$config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png';
			
            $this->load->library('upload', $config);
            if($this->upload->do_upload('image')){
				$data = $this->security->xss_clean($this->input->post());
                $this->Employee->insertData($_FILES['image']['name'],$data);
				$this->session->set_flashdata('employeeSuccess','Added Employee Successfully'); 
            }else{
				$this->session->set_flashdata('employeeError','Error adding employee'); 
			
            }
		}
		redirect("Admin/Employee-List");
		
	}

	public function viewEmployee()
	{	
		// Setup Ajax
		$EmployeeData = $this->input->post('employeeData');
        $records = $this->Employee->getData($EmployeeData);
		$output ='
			<div class="row">
				<div class="col-4 text-white text-center row align-items-center">
					<div>
						<div><img src="../uploads/'.$records->image_filename.'" class="img-radius" alt="'.$records->firstname.'-Profile-Image"> </div>
						<h5>'.$records->firstname.' '.$records->lastname.'</h5>
						<p>'.$records->position.'</p>
					</div>
				</div>
				<div class="col-8">
					<h4 class="text-white m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Information</h4>
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<h6 class="m-b-10 f-w-600 ">Age</h6>
								<p class="text-muted f-w-400">'.$records->age.'</p>
							</div>
							<div class="col-sm-4">
								<h6 class="m-b-10 f-w-600">Address</h6>
								<p class="text-muted f-w-400">'.$records->address.'</p>
							</div>
							<div class="col-sm-4">
								<h6 class="m-b-10 f-w-600">Employment Date</h6>
								<p class="text-muted f-w-400">'.$records->employmentDate.'</p>
							</div>
						</div>
					</div>
					<br>
					<h4 class="text-white m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Identification Numbers</h4><br>
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<h6 class="m-b-10 f-w-600">SSS Number</h6>
								<p class="text-muted f-w-400">'.$records->sss_number.'</p>
							</div>
							<div class="col-sm-6">
								<h6 class="m-b-10 f-w-600">Pag-IBIG Number</h6>
								<p class="text-muted f-w-400">'.$records->pagibig_number.'</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h6 class="m-b-10 f-w-600">PhilHealth Number</h6>
								<p class="text-muted f-w-400">'.$records->philhealth_number.'</p>
							</div>
							<div class="col-sm-6">
								<h6 class="m-b-10 f-w-600">TIN Number</h6>
								<p class="text-muted f-w-400">'.$records->tin_number.'</p>
							</div>
						</div>
					</div>
				</div>
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
			<form action="../EmployeeFunctions/updateEmployee/'.$records->employeeID.'" method="POST" enctype="multipart/form-data">
				<div class="upload">
					<button class="uploadButton">
						<input class="uploadButton1" type="file" name="image" id="image"><i class="bi bi-camera"></i>
					</button>
					<p>Update your photo: <br></p>
				</div>
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
							<button type="cancel" class="btn btn-default bg-white text-dark me-2" value="cancel" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-success" value="submit">Edit</button>
						</div>
					</div>
				</div>
			</form>
		';
		echo $output;
	}

	public function updateEmployee($id)
	{	
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
		$records = $this->Employee->getFileName($id);

        $this->load->library('upload', $config);
        if($this->upload->do_upload('image')){
			$oldfilename = "./uploads/".$records->image_filename;
			unlink($oldfilename);
			$data = $this->security->xss_clean($this->input->post());
			$this->Employee->updateData($id,$data, $_FILES['image']['name']);
			$this->session->set_flashdata('employeeSuccess','Updated employee details successfully'); 
        }else{
            $this->session->set_flashdata('employeeError','Failed updatingemployee details'); 
		
        }
		redirect("Admin/Employee-List");
		
	}

	public function deleteEmployee()
	{	
		// Setup Ajax
		$EmployeeData = $this->input->post('employeeData');
		$output ='
			<form action="../EmployeeFunctions/delete/'.$EmployeeData.'">
				<div class="modal-header">
					<h4 class="modal-title text-faded">Delete Employee?</h4>
					<button type="button" class="close text-faded" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body text-faded">
					<p>Are you sure you want to delete this Employee\'s Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="editAnnouncementButton d-flex justify-content-end p-3">
							<button type="cancel" class="btn btn-default bg-white text-dark me-2" value="cancel" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-danger" value="submit">Delete</button>
						</div>
			</form>
		';
		echo $output;
		
	}

	public function delete($id)
	{	
		$records = $this->Employee->getFileName($id);
		$filename = "./uploads/".$records->image_filename;
		unlink($filename);
		$this->Employee->deleteData($id);
		$this->session->set_flashdata('employeeSuccess','Deleted employee details successfully'); 
		redirect("Admin/Employee-List");
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

	public function updateContribution(){

		if(isset($_POST['sssEmployee']) && isset($_POST['philhealthEmployee']) && isset($_POST['pagibigEmployee']) && isset($_POST['sssEmployer']) && isset($_POST['philhealthEmployer']) && isset($_POST['pagibigEmployer'])){
		$this->Employee->updateContribution();
		$this->session->set_flashdata('payrollSuccess','Updated Contribution Successfully');
		}
		else{
			$this->session->set_flashdata('payrollError','Failed on updating contribution');	
		} 
		redirect("Admin/Payroll");
	}
}


