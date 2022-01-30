<?php $this->load->view("AdminSidebar") ?>

<head>
	<title>Generate Payroll</title>
	<link href=<?php echo base_url("assets/css/PayrollTab.css")?> rel="stylesheet">
</head>

<main class="page-content">
	<div style="margin-left: 20vw; width: 78.5vw;">
			<?php if($this->session->flashdata('payrollError')) : ?>
				<div class="alert alert-danger alert-dismissible fade show">
					<?= $this->session->flashdata('payrollError'); ?>
					<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('payrollSuccess')) : ?>
				<div class="alert alert-success alert-dismissible fade show">
					<?= $this->session->flashdata('payrollSuccess'); ?>
					<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
				</div>
			<?php endif; ?>
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Payroll for <?php echo date('Y-m-d', strtotime('monday this week')) ." to ". date('Y-m-d', strtotime('saturday this week')) ?> </h2>
				</div>
				
				<div class="col-sm-6">
					<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateContribution"
						><i class="material-icons"></i>
						<span>Update Contribution</span></button>
					<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generatePayslipConfirmation"
						id="generatePayslip"><i class="material-icons"></i>
						<span>Generate Payslip</span></button>
				</div>
			</div>
		</div>
		<div class="alert alert-primary" role="alert">
			<b> Note! Contribution for SSS, PhilHealth and Pag-Ibig will be deducted in the following weeks: </b> <br>
			<b>1st Week</b> - SSS Contribution <br>
			<b>2nd Week</b> - PhilHealth Contribution <br>
			<b>3rd Week</b> - Pag-Ibig Contribution
		</div>

		<div class="table-responsive">
			<table id="mytable" class="table table-striped table-hover text-center">
				<thead>
					<th>Employee Number</th>
					<th>Name</th>
					<th>Overtime (Hours)</th>
					<th>Late (Hours)</th>
					<th>Rate</th>
					<th>Gross Income</th>
					<th>Deductions</th>
					<th>Net Income</th>
				</thead>
				<tbody>
					<?php foreach($payroll as $payroll){?>
						<tr>
							<td><?php echo $payroll->employeeNumber?></td>
							<td><?php echo $payroll->firstname?> <?php echo $payroll->lastname?></td>
							<td><?php echo ($payroll->minutesOvertime)/60?></td>
							<td><?php echo ($payroll->minutesLate)/60?></td>
							<td>PHP <?php echo number_format($payroll->rate)?></td>
							<td>PHP <?php echo (float)$payroll->GrossIncome?></td>
							<td>PHP 
								<?php date_default_timezone_set('Asia/Manila')?>
								<?php if(date("W")==1):?>
							 		<?php echo (float)$payroll->sssContribution?>
								<?php elseif(date("W")==2):?>
							 		<?php echo (float)$payroll->philhealthContribution?>
								<?php elseif(date("W")==3):?>
							 		<?php echo (float)$payroll->pagibigContribution?>
								<?php else:?>
							 		<?php echo 0?>
								<?php endif?>
							</td>
							<td>PHP <?php echo (float)$payroll->NetIncome?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
	</>
	<!-- MODAL -->

	<div class="modal fade" id="generatePayslipConfirmation" tabindex="-1" aria-labelledby="editAnnouncementHeader"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content dark-blue">
				<div class="modal-header">
					<h5 class="modal-title text-faded" id="editAnnouncementHeader">Generate Payslip</h5>
					<button type="button" class="close text-faded" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body text-faded">
					<p>Are you sure you want to generate employees' payslip?</p>
					<div class="editAnnouncementButton d-flex justify-content-end">
						<button type="cancel" class="btn btn-default bg-white text-dark me-2" value="cancel" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-success" value="submit" onclick="window.open('<?php echo base_url('GeneratePayslipController')?>', '_blank')">Generate</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="updateContribution" tabindex="-1" aria-labelledby="editAnnouncementHeader"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content dark-blue">
					<div class="modal-header">
						<h5 class="modal-title text-faded" id="addAnnouncementHeader">Edit Contribution</h5>
						<button type="button" class="close text-faded" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body text-faded">
						<div class="form-group">
							<form action="<?php echo site_url('EmployeeFunctions/updateContribution')?>" method="POST">
								<div class="row">
									<div class="col-6 text-center">
										<h4>Employer's Contribution</h4>
										<p><br><input type="number" step="any" class="form-control text-center" required name="sssEmployer" >SSS Contribution</p>
										<p><br><input  type="number" step="any" class="form-control text-center" required name="pagibigEmployer">Pag-IBIG Contribution</p>
										<p><br><input  type="number" step="any" class="form-control text-center" required name="philhealthEmployer">PhilHealth Contribution</p>
										
									</div>
									<div class="col-6 text-center">
										<h4>Employee's Contribution</h4>
										<p><br><input type="number" step="any" class="form-control text-center" required name="sssEmployee" >SSS Contribution</p>
										<p><br><input  type="number" step="any" class="form-control text-center" required name="pagibigEmployee">Pag-IBIG Contribution</p>
										<p><br><input  type="number" step="any" class="form-control text-center" required name="philhealthEmployee">PhilHealth Contribution</p>
										
									</div>
								</div>
								<div class="editAnnouncementButton d-flex justify-content-end">
									<button type="cancel" class="btn btn-default bg-white text-dark me-2" value="cancel" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-success" value="submit">Update Contributions</button>
								</div>
							</form>
						</div>
					</div>					
				</div>
			</div>
	</div>
</main>


<script type="text/javascript" src="<?php echo base_url("assets/js/payroll.js")?>"> </script>