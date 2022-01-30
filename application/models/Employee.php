<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Model {

	public function __construct(){	
		$this->load->database();
	}

	public function insertData($image,$filtered) #Create
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
			'firstname' => $filtered['firstname'],
			'lastname' => $filtered['lastname'],
			'age' => $filtered['age'],
			'address' => $filtered['address'],
			'position' => $filtered['position'],
			'sss_number' => $filtered['sss-number'],
			'pagibig_number' => $filtered['pagibig-number'],
			'philhealth_number' => $filtered['philhealth-number'],
			'tin_number' => $filtered['tin-number'],
			'employmentDate' => $filtered['employmentDate'],
			'image_filename' => $image	
		);

		$record = array(
			'eventID' => NULL,
			'user' => $this->session->userdata('auth_user')['employeeNumber'],
			'event' => "[ADMIN] ".$this->session->userdata('auth_user')['firstname']." added [".$holder."] ".$_POST['firstname']." as Employee",
			'time_happened' => date("H:i:s"),
			'date' => date("Y-m-d"),
			'day' => date("l"),
			'threatlevel' => "Normal"
		);
		$this->db->insert('event_log',$record);
		$this->db->insert('employee_accounts',$data);
		unset($_POST);
			
	}

	public function viewData() #Read
	{
		$query = $this->db->query('SELECT * FROM `employee_accounts`');
		return $query->result();
	}

	public function viewDataEmployee() #Read
	{
		$query = $this->db->query('	SELECT * FROM `employee_accounts` 
									LEFT JOIN employeeattendance
									ON employee_accounts.employeeID = employeeattendance.employeeID
									WHERE position != "Employer"
									GROUP BY employee_accounts.employeeNumber');
		return $query->result();
	}


	public function countEmployee() #Read
	{
		$query = $this->db->query('SELECT * FROM `employee_accounts` WHERE position != "Employer"');
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

	public function getFileName($id) #Edit
	{
		$query = $this->db->query('SELECT * FROM `employee_accounts` WHERE `employeeID` ='.$id) ;
		return $query->row();
	}

	public function updateData($id,$filtered, $image) #Update
	{
		$data = array(
			'firstname' =>$filtered['firstname'],
			'lastname' => $filtered['lastname'],
			'age' => $filtered['age'],
			'address' => $filtered['address'],
			'position' => $filtered['position'],
			'image_filename' => $image
		);
		$this->db->where('employeeID',$id);
		$this->db->update('employee_accounts',$data);
		
		$query = $this->db->query('SELECT * FROM employee_accounts WHERE employeeID ='.$id);
		$query = $query->row();
		$record = array(
			'eventID' => NULL,
			'user' => $this->session->userdata('auth_user')['employeeNumber'],
			'event' => "[ADMIN] ".$this->session->userdata('auth_user')['firstname']." edited [".$query->employeeNumber."] ".$_POST['firstname']."'s account details",
			'time_happened' => date("H:i:s"),
			'date' => date("Y-m-d"),
			'day' => date("l"),
			'threatlevel' => "Normal"
		);
		$this->db->insert('event_log',$record);
	}

	public function deleteData($id){ #Delete

		$query = $this->db->query('	SELECT * FROM admin_accounts 
									LEFT JOIN employee_accounts 
									ON admin_accounts.employeeID = employee_accounts.employeeID	
									WHERE admin_accounts.employeeID ='.$id);
		
		if($query->num_rows()==0){
			$query = $query->row();
			$record = array(
				'eventID' => NULL,
				'user' => $this->session->userdata('auth_user')['employeeNumber'],
				'event' => "[ADMIN] ".$this->session->userdata('auth_user')['firstname']." deleted [".$query->employeeNumber."] ".$query->firstname." as Employee",
				'time_happened' => date("H:i:s"),
				'date' => date("Y-m-d"),
				'day' => date("l"),
				'threatlevel' => "Normal"
			);
			$this->db->insert('event_log',$record);
			$this->db->where('employeeID',$query->employeeID);
			$this->db->delete('employee_accounts');
		}
		else{
			$query = $query->row();
			$record = array(
				'eventID' => NULL,
				'user' => $this->session->userdata('auth_user')['employeeNumber'],
				'event' => "[ADMIN] ".$this->session->userdata('auth_user')['firstname']." deleted [".$query->employeeNumber."] ".$query->firstname." as Admin and Employee",
				'time_happened' => date("H:i:s"),
				'date' => date("Y-m-d"),
				'day' => date("l"),
				'threatlevel' => "Normal"
			);
			$this->db->insert('event_log',$record);
			$this->db->where('adminID',$query->adminID);
			$this->db->delete('admin_accounts');

			$this->db->insert('event_log',$record);
			$this->db->where('employeeID',$query->employeeID);
			$this->db->delete('employee_accounts');

		}
	}
	

	public function updateContribution(){ 

		$query = $this->db->query('SELECT * FROM employee_accounts');
		$query = $query->result();
		foreach($query as $worker){
			if($worker->position == "Employer"){
				$data = array(
					'sssContribution' => $_POST['sssEmployer'],
					'pagibigContribution' => $_POST['pagibigEmployer'],
					'philhealthContribution' => $_POST['philhealthEmployer']
				);
				$this->db->where('employeeID',$worker->employeeID);
				$this->db->update('employee_accounts',$data);
			}
			else{
				$data = array(
					'sssContribution' => $_POST['sssEmployee'],
					'pagibigContribution' => $_POST['pagibigEmployee'],
					'philhealthContribution' => $_POST['philhealthEmployee']
				);
				$this->db->where('employeeID',$worker->employeeID);
				$this->db->update('employee_accounts',$data);
			}
		}
		$record = array(
			'eventID' => NULL,
			'user' => $this->session->userdata('auth_user')['employeeNumber'],
			'event' => "[ADMIN] ".$this->session->userdata('auth_user')['firstname']." updated the contributions",
			'time_happened' => date("H:i:s"),
			'date' => date("Y-m-d"),
			'day' => date("l"),
			'threatlevel' => "Normal"
		);
		$this->db->insert('event_log',$record);
	}

	public function totalSSS(){
		$query = $this->db->query('SELECT * FROM employee_accounts');
		$query = $query->result();
		$totalSSS = 0;
		foreach($query as $worker){
			$totalSSS += $worker->sssContribution;
		}
		return $totalSSS;
	}

	public function totalPhilhealth(){
		$query = $this->db->query('SELECT * FROM employee_accounts');
		$query = $query->result();
		$totalPhilhealth = 0;
		foreach($query as $worker){
			$totalPhilhealth += $worker->philhealthContribution;
		}
		return $totalPhilhealth;
	}

	public function totalPagibig(){
		$query = $this->db->query('SELECT * FROM employee_accounts');
		$query = $query->result();
		$totalPagibig = 0;
		foreach($query as $worker){
			$totalPagibig += $worker->pagibigContribution;
		}
		return $totalPagibig;
	}

	public function getUserAttendance($id){
		$query = $this->db->query('	SELECT * FROM employeeattendance
									LEFT JOIN employee_accounts
									ON employeeattendance.employeeID = employee_accounts.employeeID
									WHERE ');
		return $query->result();
	}

	
}
