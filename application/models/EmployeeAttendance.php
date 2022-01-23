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
		if($employee->num_rows()>0){
			$row = $employee->row();
			date_default_timezone_set('Asia/Manila');
			$data = array(
				'employeeAttendanceID' => NULL,
				'employeeID' => $row->employeeID,
				'timeIn'  => date("H:i:s"),
				'timeOut'  => NULL,
				'dateLogged' => date("Y-m-d"),
				'day' => date("l")
			);
			$query = $this->db->query('	SELECT * FROM employeeattendance 
										WHERE employeeID ='.$row->employeeID.' AND timeIn IS NOT NULL AND dateLogged ="'.date("Y-m-d").'"');
			if($query->num_rows() == 0){
				$this->db->insert('employeeattendance',$data);
				
				$this->session->set_flashdata('timeInSuccess','Time In recorded successfully');
				print_r($query->result());
			}
			else{
				$this->session->set_flashdata('timeInError','Error: Employee already Timed In today');
				print_r($query->result());
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
		if($employee->num_rows()>0){
			$row = $employee->row();
			date_default_timezone_set('Asia/Manila');
			$data = array(
				'timeOut'  => date("H:i:s"),
			);
			$query = $this->db->query('	SELECT * FROM employeeattendance 
										WHERE employeeID ='.$row->employeeID.' AND `timeOut` IS NULL AND dateLogged ="'.date("Y-m-d").'"');
			if($query->num_rows() > 0){
				$this->db->update('employeeattendance',$data);
				$this->db->where('employeeID',$row->employeeID);
				$this->session->set_flashdata('timeOutSuccess','Time Out recorded successfully');
			}
			else{
				$this->session->set_flashdata('timeOutError','Error: Employee already Timed Out today');
			}		
		}
		else{
			$this->session->set_flashdata('employeeError','Error: Employee data not found');
			
		}
	}
}
