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
            $this->db->from('employee-accounts');
            $this->db->where('employeeNumber',$holder);
            $query=$this->db->get();
        } while($query->num_rows()>0);

		$data = array(
			'employeeID' => NULL,
			'employeeNumber' => $holder,
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'age' => $_POST['age'],
			'position' => $_POST['position'],
			'sss-number' => $_POST['sss-number'],
			'pagibig-number' => $_POST['pagibig-number'],
			'philhealth-number' => $_POST['philhealth-number'],
			'tin-number' => $_POST['tin-number'],
			'employmentDate' => $_POST['employmentDate']	
		);
		$this->db->insert('employee-accounts',$data);
		unset($_POST);
		redirect('Admin/Employee-List');	
	}

	public function viewData() #Read
	{
		$query = $this->db->query('SELECT * FROM `employee-accounts`');
		return $query->result();
	}

	public function getData($id) #Edit
	{
		$query = $this->db->query('SELECT * FROM `employee-accounts` WHERE `employeeID` ='.$id) ;
		return $query->row();
	}

	public function updateData($id) #Update
	{
		$data = array(
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'age' => $_POST['age'],
			'position' => $_POST['position']
		);
		$this->db->where('employeeID',$id);
		$this->db->update('employee-accounts',$data);
	}

	public function deleteAdmin($id){ #Delete
		$this->db->where('employeeID',$id);
		$this->db->delete('employee-accounts');
	}
	
}
