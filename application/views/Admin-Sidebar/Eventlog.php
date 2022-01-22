<?php $this->load->view("AdminSidebar") ?>

<head>
<title>Eventlog</title>
<link href="<?php echo base_url('assets/css/event.css'); ?>" rel="stylesheet" type="text/css">
</head>

<<main class="page-content">
	<div class="container" style="margin-left: 20vw; width: 78.5vw;">
		<h3 class="fw-bold">Events Log</h3> <br>
		<!--Event Table-->
		<div class="col-12 align-self-center" id="EventTable">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col">
							<h2 class="text-center text-uppercase">Events Log</h2>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-default align-middle table-borderless table-hover" id="table-body">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time</th>
								<th>User</th>
								<th>Action/Log</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>01/17/2022</td>
								<td>11:45:12 AM</td>
								<td>admin</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>
