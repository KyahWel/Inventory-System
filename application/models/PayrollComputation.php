<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PayrollComputation extends CI_Model {

	public function __construct(){	
		parent::__construct();
		
	}
	public function computeGrossIncome($timeIn, $timeOut){
		$ratePerDay = 537;
		$late = date_diff(date_create($timeIn), date_create('8:00:00'));
		$overtime = date_diff(date_create($timeOut), date_create('15:00:00'));
		$lateRate = $late->h * 67.13;
		$overtimeRate = $overtime->h * 83.91;

		// $test = (object)[
		// 	'late' => $lateRate,
		// 	'overtime' => $overtimeRate
		// ];
		// return $test;
	}
}
