<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePayslipController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee');
	}

    function index()
    {   
        $data['Employee'] = $this->Employee->viewDataEmployee();
        $this->load->library('Pdf');
        $html = $this->load->view('GeneratePayslip',$data, true);
        $this->pdf->createPDF($html, 'payslip '.date("Y-m-d").'', false);
    }
}
?>