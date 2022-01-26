<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeAttendance extends CI_Model {

	public function __construct(){	
		$this->load->database();
	}

	public function timeIn($employeeNumber){
		$this->db->select('*');
		$this->db->from('employee-accounts');
		$this->db->where('employeeNumber',$employeeNumber);
		$employee = $this->db->get();
		$dateTimeObject1 = date_create('9:00:00'); 
		$dateTimeObject2 = date_create('8:00:00'); 
		$late = date_diff($dateTimeObject1, $dateTimeObject2); 
		if($employee->num_rows()>0){
			$row = $employee->row();
			date_default_timezone_set('Asia/Manila');
			$data = array(
				'employeeAttendanceID' => NULL,
				'employeeID' => $row->employeeID,
				'timeIn'  =>'9:00:00',
				'timeOut'  => NULL,
				'dateLogged' => date("Y-m-d"),
				'day' => date("l")
			);
			$minutes = $late->days * 24 * 60;
			$minutes += $late->h * 60;
			$minutes += $late->i;
			if(date('l')=="Monday"){
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
					'NetIncome' => 0
				);
				$this->db->insert('employee-payout',$payroll);
			}else{
			
				$this->db->query('	UPDATE `employee-payout` 
								  	SET minutesLate = minutesLate + '.$minutes.',
									    amountLate = amountLate + '. (($minutes/15) * 16.825).'
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');
			}
			$query = $this->db->query('	SELECT * FROM employeeattendance 
										WHERE employeeID ='.$row->employeeID.' AND timeIn IS NOT NULL AND dateLogged ="'.date("Y-m-d").'"');
			if($query->num_rows() == 0){
				$this->db->insert('employeeattendance',$data);
				
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
		$this->db->from('employee-accounts');
		$this->db->where('employeeNumber',$employeeNumber);
		$employee = $this->db->get();
		$dateTimeObject1 = date_create('18:00:00'); 
		$dateTimeObject2 = date_create('16:00:00'); 
		if($employee->num_rows()>0){
			$row = $employee->row();
			date_default_timezone_set('Asia/Manila');
			$data = array(
				'timeOut'  => "18:00:00",
			);
			$query = $this->db->query('	SELECT * FROM employeeattendance 
										WHERE employeeID ='.$row->employeeID.' AND `timeOut` IS NULL AND dateLogged ="'.date("Y-m-d").'"');
			if($query->num_rows() > 0){	
				$this->db->where('employeeID',$row->employeeID);
				$this->db->where('dateLogged',strval(date("Y-m-d")));
				$this->db->update('employeeattendance',$data);
				$this->session->set_flashdata('timeOutSuccess','Time Out recorded successfully');
				$overtime = date_diff($dateTimeObject1, $dateTimeObject2); 
				$minutes = $overtime->days * 24 * 60;
				$minutes += $overtime->h * 60;
				$minutes += $overtime->i;
				$this->db->query('	UPDATE `employee-payout` 
								  	SET minutesOvertime = minutesOvertime + '.$minutes.',
									    amountOvertime = amountOvertime + '. (($minutes/30) * 41.955).',
										GrossIncome = GrossIncome + rate - amountLate + amountOvertime
									WHERE employeeID = '.$row->employeeID.' AND  fromDAY = "'.date('Y-m-d', strtotime('monday this week')).'"');
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
		$query = $this->db->query('SELECT * FROM `employee-payout` LEFT JOIN `employee-accounts` ON `employee-payout`.employeeID = `employee-accounts`.employeeID' );
		return $query->result();
	}
}
