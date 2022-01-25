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
					<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generatePayslipConfirmation"
						id="generatePayslip"><i class="material-icons"></i>
						<span>Generate Payslip</span></button>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="mytable" class="table table-striped table-hover">
				<thead>
					<th>Employee Number</th>
					<th>Name</th>
					<th>Overtime (Hours)</th>
					<th>Late (Hours)</th>
					<th>Rate</th>
					<th>Gross Income</th>
					<th>Net Income</th>
				</thead>
				<tbody>
					<tr>

					</tr>
				</tbody>
			</table>
			<div class="clearfix"></div>
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
</main>
