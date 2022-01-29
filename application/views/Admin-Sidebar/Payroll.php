<?php $this->load->view("AdminSidebar") ?>

<head>
	<title>Generate Payroll</title>
	<link href=<?php echo base_url("assets/css/PayrollTab.css")?> rel="stylesheet">
</head>

<main class="page-content">
	<div style="margin-left: 20vw; width: 78.5vw;">
		
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Payroll</h2>
				</div>
				
				<div class="col-sm-6">
					<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateContribution"
						id="generatePayslip"><i class="material-icons"></i>
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
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>
	<!-- MODAL -->

	<div class="modal fade" id="generatePayslipConfirmation" tabindex="-1" aria-labelledby="editAnnouncementHeader"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editAnnouncementHeader">Generate Payslip</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form action="">
					<div class="modal-body">
						<p>Are you sure you want to generate this employee's payslip?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Generate">
					</div>
				</form>
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
							<form action="<?php echo site_url('')?>" method="POST">
								<div class="row">
									<div class="col-6">
										<h5>Employer's Contribution</h5>
										<p>SSS Contribution: <br><input type="text" class="form-control" required name="sssEmployer"></p>
										<p>Pag-IBIG Contribution: <br><input type="text" class="form-control" required name="pagibigEmployer"></p>
										<p>PhilHealth Contribution: <br><input type="text" class="form-control" required name="philhealthEmployer"></p>
										
									</div>
									<div class="col-6">
										<h5>Employee's Contribution</h5>
										<p>SSS Contribution: <br><input type="text" class="form-control" required name="sssEmployee"></p>
										<p>Pag-IBIG Contribution: <br><input type="text" class="form-control" required name="pagibigEmployee"></p>
										<p>PhilHealth Contribution: <br><input type="text" class="form-control" required name="philhealthEmployee"></p>
										
									</div>
								</div>
								<div class="editAnnouncementButton d-flex justify-content-end">
									<button type="cancel" class="btn btn-default bg-white text-dark me-2" value="cancel" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-success" value="submit">Edit</button>
								</div>
							</form>
						</div>
					</div>					
				</div>
			</div>
	</div>
</main>
