<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PayrollComputation extends CI_Model {

	public function __construct(){	
		parent::__construct();
		
	}

	public function computeOTRate ($timeOut){
		$overtime = date_diff(date_create($timeOut), date_create('16:00:00'));
		$overtimeRate = ($overtime->m/30) * 41.955;
		return $overtimeRate;
	}

	public function computeLateRate ($timeIn){
		
		$late = date_diff(date_create($timeIn), date_create('8:00:00'));
		$lateRate =  ($late->m/15) * 16.825;
		return $lateRate;
	}

	public function incomePerDay($overtimeRate, $lateRate){
		return (537+$overtimeRate)-$lateRate;
	}

	public function SSSPagibigDeduction($deduction,$present_days){
		return ((float)($deduction/27))*$present_days;
	}

	public function weeklyIncome($grossSalary, $deduction){
		return $grossSalary-$deduction;
	}

}
