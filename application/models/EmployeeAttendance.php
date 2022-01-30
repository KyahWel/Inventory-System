<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeAttendance extends CI_Model {

	public function __construct(){	
		$this->load->database();
		date_default_timezone_set('Asia/Manila');
	}

	public function timeIn($employeeNumber){
		$this->db->select('*');
		$this->db->from('employee_accounts');
		$this->db->where('employeeNumber',$employeeNumber);
		$employee = $this->db->get();
		$dateTimeObject1 = date_create(date("H:i:s")); //Change
		$dateTimeObject2 = date_create('8:00:00'); 
		$late = date_diff($dateTimeObject1, $dateTimeObject2); 
		if($employee->num_rows()>0){
			$row = $employee->row();
			$data = array(
				'employeeAttendanceID' => NULL,
				'employeeID' => $row->employeeID,
				'timeIn'  => date("H:i:s"), 
				'timeOut'  => NULL,
				'dateLogged' => date("Y-m-d"),  
				'day' => date("l")
			);
			$record = array(
				'eventID' => NULL,
				'user' => "Time In",
				'event' => "Employee $row->firstname $row->lastname timed In",
				'time_happened' => date("H:i:s"),
				'date' => date("Y-m-d"),
				'day' => date("l"),
				'threatlevel' => "Normal"
			);
			$query = $this->db->query('	SELECT * FROM employeeattendance 
										WHERE employeeID ='.$row->employeeID.' AND timeIn IS NOT NULL AND dateLogged ="'.date("Y-m-d").'"');  //Change date '.date("Y-m-d").'
			if($query->num_rows() == 0){
				$minutes = $late->days * 24 * 60;
				$minutes += $late->h * 60;
				$minutes += $late->i;
				if(date('l')=="Sunday" or date('l') == "Monday"){
					$payroll = array(
						'payoutID' => NULL,
						'employeeID' => $row->employeeID,
						'minutesLate' => $minutes,
						'minutesOvertime' => 0,
						'amountLate' => (($minutes/15) * 16.825),
						'rate' => 537,
						'amountOvertime' => 0,
						'fromDay' => date("Y-m-d"),
						'toDay' => date("Y-m-d",strtotime('+5 days')),
						'GrossIncome' => 0,
						'NetIncome' => 0,
						'status' => "Unpaid"
					);
					$this->db->insert('employee_payout',$payroll);
				}else{
				
				$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesLate = minutesLate + '.$minutes.',
									    amountLate = amountLate + '. (($minutes/15) * 16.825).'
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('sunday this week')).'"');
			}
			
				$this->db->insert('employeeattendance',$data);
				$this->db->insert('event_log',$record);
				$this->session->set_flashdata('timeInSuccess','Time In recorded successfully');
				
			}
			else{
				$this->session->set_flashdata('timeInError','Error: Employee already Timed In today');
				
			}		
		}
		else{
			$this->session->set_flashdata('employeeError','Error: Employee data not found');
			
		}
	}
	public function timeOut($employeeNumber){
		$this->db->select('*');
		$this->db->from('employee_accounts');
		$this->db->where('employeeNumber',$employeeNumber);
		$employee = $this->db->get();
		$dateTimeObject1 = date_create(date("H:i:s")); //Change
		$dateTimeObject2 = date_create('16:00:00'); 
		if($employee->num_rows()>0){
			$row = $employee->row();
			date_default_timezone_set('Asia/Manila');
			$data = array(
				'timeOut'  => date("H:i:s"), //Change
			);
			$record = array(
				'eventID' => NULL,
				'user' => "Time Out",
				'event' => "Employee $row->firstname $row->lastname timed Out",
				'time_happened' => date("H:i:s"),
				'date' => date("Y-m-d"),
				'day' => date("l"),
				'threatlevel' => "Normal"
			);
			$query = $this->db->query('	SELECT * FROM employeeattendance 
										WHERE employeeID ='.$row->employeeID.' AND `timeOut` IS NULL AND dateLogged ="'.date("Y-m-d").'"'); //Change 
			if($query->num_rows() > 0){	
				$this->db->where('employeeID',$row->employeeID);
				$this->db->where('dateLogged',strval(date("Y-m-d")));
				$this->db->update('employeeattendance',$data);
				$this->db->insert('event_log',$record);
				$this->session->set_flashdata('timeOutSuccess','Time Out recorded successfully');
			
				$overtime = date_diff($dateTimeObject1, $dateTimeObject2); 
				$minutes = $overtime->days * 24 * 60;
				$minutes += $overtime->h * 60;
				$minutes += $overtime->i;
			
					if(date('l') == "Sunday"){
						$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = (GrossIncome + rate - amountLate + amountOvertime)*1.3
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');	
					}
					if(date("W")==1 && date('l')=="Saturday"){
						$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = GrossIncome + rate - amountLate + amountOvertime,
										NetIncome = GrossIncome - '.$row->sssContribution.'
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');	
					}
					elseif(date("W")==2 && date('l')=="Saturday"){
						$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = GrossIncome + rate - amountLate + amountOvertime,
										NetIncome = GrossIncome -  '.$row->philhealthContribution.'
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');	
					}
					elseif(date("W")==3 && date('l')=="Saturday"){
						$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = GrossIncome + rate - amountLate + amountOvertime,
										NetIncome = GrossIncome -  '.$row->pagibigContribution.'
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');	
					}
					elseif(date("W")==4 && date('l')=="Saturday"){
						$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = GrossIncome + rate - amountLate + amountOvertime,
										NetIncome = GrossIncome
										WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');	
					}
					else{
						$this->db->query('	UPDATE `employee_payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = GrossIncome + rate - amountLate + amountOvertime
										WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');	
					}
			
			}
			else{
				$this->session->set_flashdata('timeOutError','Error: Employee already Timed Out today');
			}		
		}
		else{
			$this->session->set_flashdata('employeeError','Error: Employee data not found');
			
		}
	}

	public function view_data(){
		$query = $this->db->query('	SELECT * FROM `employee_payout` 
									LEFT JOIN `employee_accounts` 
									ON `employee_payout`.employeeID = `employee_accounts`.employeeID 
									GROUP BY employeeNumber' );
		return $query->result();
	}
}
