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
					<h2>List of Employees</h2>
				</div>
				<div class="col-sm-6">
					<button class="btn btn-success" data-bs-toggle="modal"
						data-bs-target="#" id="generatePayroll"><i class="material-icons"></i>
						<span>Generate Payroll</span></button>
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
</main>
