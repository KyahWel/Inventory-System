<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Model {

	public function __construct(){	
		$this->load->database();
	}

	public function insertData() #Create
	{	
		$digits = 4;
        do{
            $holder = "Employee-".rand(pow(10, $digits-1), pow(10, $digits)-1);
            $this->db->select('*');
            $this->db->from('employee_accounts');
            $this->db->where('employeeNumber',$holder);
            $query=$this->db->get();
        } while($query->num_rows()>0);

		$data = array(
			'employeeID' => NULL,
			'employeeNumber' => $holder,
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'age' => $_POST['age'],
			'address' => $_POST['address'],
			'position' => $_POST['position'],
			'sss_number' => $_POST['sss-number'],
			'pagibig_number' => $_POST['pagibig-number'],
			'philhealth_number' => $_POST['philhealth-number'],
			'tin_number' => $_POST['tin-number'],
			'employmentDate' => $_POST['employmentDate']	
		);
		$this->db->insert('employee_accounts',$data);
		unset($_POST);
		redirect('Admin/Employee-List');	
	}

	public function viewData() #Read
	{
		$query = $this->db->query('SELECT * FROM `employee_accounts`');
		return $query->result();
	}

	public function countEmployee() #Read
	{
		$query = $this->db->query('SELECT * FROM `employee_accounts`');
		return $query->num_rows();
	}

	public function viewEmployeeLogs($date){
		$query = $this->db->query('	SELECT * FROM employeeattendance
									LEFT JOIN employee_accounts
									ON employeeattendance.employeeID = employee_accounts.employeeID
									WHERE `dateLogged`="'.$date.'"');
		return $query->result();
	}

	public function getData($id) #Edit
	{
		$query = $this->db->query('SELECT * FROM `employee_accounts` WHERE `employeeID` ='.$id) ;
		return $query->row();
	}

	public function updateData($id) #Update
	{
		$data = array(
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'age' => $_POST['age'],
			'address' => $_POST['address'],
			'position' => $_POST['position']
		);
		$this->db->where('employeeID',$id);
		$this->db->update('employee_accounts',$data);
	}

	public function deleteData($id){ #Delete
		$this->db->where('employeeID',$id);
		$this->db->delete('employee_accounts');
	}
	
}
