<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePayslipController extends CI_Controller {

    function index()
    {
        $this->load->library('Pdf');
        $html = $this->load->view('GeneratePayslip', [], true);
        $this->pdf->createPDF($html, 'payslip '.date("Y-m-d").'', false);
    }
}
?>