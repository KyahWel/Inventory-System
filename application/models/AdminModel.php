<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model {

	public function __construct(){	
		$this->load->database();
		date_default_timezone_set('Asia/Manila');
	}



	public function insertData() #Create
	{	
		
		$this->db->select('*');
		$this->db->from('admin_accounts');
		$this->db->where('employeeID',$_POST['employeeID']);
		$queryChecker=$this->db->get();
		print_r($_POST['employeeID']);
		if($queryChecker->num_rows()==0){
			$this->db->select('*');
			$this->db->from('admin_accounts');
			$this->db->where('username',$_POST['username']);
			$query=$this->db->get();	
			if($query->num_rows()==0){
				$data = array(
					'adminID' => NULL,
					'username' => $_POST['username'],
					'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
					'employeeID' => $_POST['employeeID'],
					'dateAdded' => date("Y/m/d"),
					'timeAdded' => date("H:i:s")
				);
				$this->db->insert('admin_accounts',$data);
				$this->session->set_flashdata('adminSuccess','Added new admin successfully'); 
				$this->db->select('*');
				$this->db->from('employee_accounts');
				$this->db->where('employeeID',$_POST['employeeID']);
				$queryCheckerA=$this->db->get();
				$queryCheckerA = $queryCheckerA->row();
				$record = array(
					'eventID' => NULL,
					'user' => $this->session->userdata('auth_user')['employeeNumber'],
					'event' => "[ADMIN] ".$this->session->userdata('auth_user')['firstname']." added [".$queryCheckerA->employeeNumber."] ".$queryCheckerA->firstname." ".$queryCheckerA->lastname." as Admin",
					'time_happened' => date("H:i:s"),
					'date' => date("Y-m-d"),
					'day' => date("l"),
					'threatlevel' => "Normal"
				);
				$this->db->insert('event_log',$record);
				unset($_POST);
			}else{
				$this->session->set_flashdata('adminError','User already exists'); 
				redirect('Admin/Dashboard');
			}
		}
		else{
			$this->session->set_flashdata('adminError','User already exists'); 
				redirect('Admin/Dashboard');
		}
	}

	public function viewData() #Read
	{	
		$query = $this->db->query('	SELECT * FROM `admin_accounts`  
									LEFT JOIN `employee_accounts` 
									ON `admin_accounts`.employeeID = `employee_accounts`.employeeID');
		return $query->result();
	}

	public function getData($id) #Edit
	{
		$query = $this->db->query('	SELECT * FROM `admin_accounts`  
									LEFT JOIN `employee_accounts` 
									ON `admin_accounts`.employeeID = `employee_accounts`.employeeID 
									WHERE `adminID` ='.$id) ;
		return $query->row();
	}

	public function updateData($id) #Edit
	{
		$data = array(
			'username' => $_POST['username'],
		);
		$this->db->where('adminID',$id);
		$this->db->update('admin_accounts',$data);
		$queryCheckerA = $this->db->query('SELECT * FROM `admin_accounts` LEFT JOIN `employee_accounts` ON `admin_accounts`.employeeID = `employee_accounts`.employeeID WHERE adminID ='.$id);
		$queryCheckerA = $queryCheckerA->row();
		$record = array(
			'eventID' => NULL,
			'user' => $this->session->userdata('auth_user')['employeeNumber'],
			'event' => "[ADMIN]  ".$this->session->userdata('auth_user')['firstname']." edited [".$queryCheckerA->employeeNumber."] ".$queryCheckerA->firstname." ".$queryCheckerA->lastname."'s account details",
			'time_happened' => date("H:i:s"),
			'date' => date("Y-m-d"),
			'day' => date("l"),
			'threatlevel' => "Normal"
			);
		$this->db->insert('event_log',$record);
	}

	public function deleteAdmin($id){ #Delete
		$query = $this->db->query('SELECT * FROM `admin_accounts` LEFT JOIN `employee_accounts` ON `admin_accounts`.employeeID = `employee_accounts`.employeeID WHERE adminID ='.$id);
		$query = $query->row();
		$record = array(
			'eventID' => NULL,
			'user' => $this->session->userdata('auth_user')['employeeNumber'],
			'event' => "[ADMIN]  ".$this->session->userdata('auth_user')['firstname']." deleted [".$query->employeeNumber."] ".$query->firstname." as Admin",
			'time_happened' => date("H:i:s"),
			'date' => date("Y-m-d"),
			'day' => date("l"),
			'threatlevel' => "Normal"
		);
		$this->db->insert('event_log',$record);
		$this->db->where('adminID',$id);
		$this->db->delete('admin_accounts');
	}

	public function deleteAdminLinked($id){ #Delete
		$query = $this->db->query('SELECT * FROM `admin_accounts` LEFT JOIN `employee_accounts` ON `admin_accounts`.employeeID = `employee_accounts`.employeeID WHERE adminID ='.$id);
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
		$this->db->where('employeeID',$id);
		$this->db->delete('admin_accounts');
	}

	public function login(){
		$username = $_POST['username'];
		$query = $this->db->query('	SELECT * FROM `admin_accounts` 
									LEFT JOIN `employee_accounts` 
									ON `admin_accounts`.employeeID = `employee_accounts`.employeeID 
									WHERE username = "'.$username.'"' );
		if($query->num_rows()!=0){	
			$row = $query->row();
			if(password_verify($_POST['password'],$row->password)){
				$query =  $query->row();
				$record = array(
					'eventID' => NULL,
					'user' => "Login",
					'event' => "[ADMIN] ".$query->firstname." Logged In Successfully",
					'time_happened' => date("H:i:s"),
					'date' => date("Y-m-d"),
					'day' => date("l"),
					'threatlevel' => "Normal"
				);
				$this->db->insert('event_log',$record);
				return $query;
			}
			else
				$record = array(
					'eventID' => NULL,
					'user' => "Login",
					'event' => "User with username '".$username."' tried to login but entered a wrong password",
					'time_happened' => date("H:i:s"),
					'date' => date("Y-m-d"),
					'day' => date("l"),
					'threatlevel' => "Warning"
					);
				$this->db->insert('event_log',$record);
				return NULL;
		}	
		else 
			if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
				$ip = $_SERVER['HTTP_CLIENT_IP'];  
				}  
			//whether ip is from the proxy  
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
			}  
			//whether ip is from the remote address  
			else{  
					$ip = $_SERVER['REMOTE_ADDR'];  
			}  
			$record = array(
				'eventID' => NULL,
				'user' => "Login",
				'event' => "Someone tried to login but entered invalid credentials. IP Address: ".$ip,
				'time_happened' => date("H:i:s"),
				'date' => date("Y-m-d"),
				'day' => date("l"),
				'threatlevel' => "Alert"
				);
			$this->db->insert('event_log',$record);
			return NULL;
	}

	public function changePassword($id) #Changepassword
	{	
		
			if(password_verify($_POST['oldpass'],$this->session->userdata('auth_user')['password'])){
				$newPassword = $_POST['newpass'];
				$confirmPassword = $_POST['confirmpass'];
				if($newPassword==$this->session->userdata('auth_user')['password']){
					$this->session->set_flashdata('adminError','Old and New passwords are the same'); 
					redirect('Admin/Dashboard');
				}
				else{
					if($newPassword==$confirmPassword){
						$newdata = array(
							'password' => password_hash($newPassword,PASSWORD_DEFAULT)
						);
						$this->db->where('adminID',$id);
						$this->db->update('admin_accounts',$newdata);
						$this->session->set_flashdata('successAdmin','Password changed successfully'); 
						redirect('Admin/Dashboard');
					}
					else
						$this->session->set_flashdata('adminError','Passwords do not match, Please try again'); 
						redirect('Admin/Dashboard');	
				}
			}
			else{
				$this->session->set_flashdata('adminError','Incorrect Old Password'); 
				redirect('Admin/Dashboard');	
			} 	
		
	}
	
}
