<link rel="stylesheet" href=<?php echo base_url("assets/css/Employee.css")?>>
<title>Employee</title>
</head>

<body>
	<div class="container">
		<div class="text-center col timecheck">
			<div class="row-3">
				<span id="day"></span>
				<span id="date"></span>
			</div>
			<div class="row-3">
				<span id="time"></span>
			</div>
		</div>
		<!-- If user accessed login page or other pages -->
		<?php if($this->session->flashdata('timeInError')) : ?>
		<div class="alert alert-danger alert-dismissible fade show">
			<?= $this->session->flashdata('timeInError'); ?>
			<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
		</div>
		<?php elseif($this->session->flashdata('timeInSuccess')) : ?>
		<div class="alert alert-success alert-dismissible fade show">
			<?= $this->session->flashdata('timeInSuccess'); ?>
			<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
		</div>
        <?php elseif($this->session->flashdata('timeOutError')) : ?>
		<div class="alert alert-danger alert-dismissible fade show">
			<?= $this->session->flashdata('timeOutError'); ?>
			<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
		</div>
		<?php elseif($this->session->flashdata('timeOutSuccess')) : ?>
		<div class="alert alert-success alert-dismissible fade show">
			<?= $this->session->flashdata('timeOutSuccess'); ?>
			<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
		</div>
		<?php elseif($this->session->flashdata('employeeError')) : ?>
		<div class="alert alert-danger alert-dismissible fade show">
			<?= $this->session->flashdata('employeeError'); ?>
			<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
		</div>
		<?php endif ?>

		<div class="row">
			<div class="col-lg-3 col-md-2"></div>
			<div class="col-lg-6 col-md-8 login-box">
				<div class="col-lg-12 login-key">
					<i class="fa fa-clock" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 login-title">EMPLOYEE ATTENDANCE</div>

				<div class="col-lg-12 login-form px-4">
					<form id="form_id" method="POST">
						<div class="col-lg-12 login-form">
							<div class="form-group text-center">
								<input name="employeeNumber" type="text" class="form-control">
								<label class="form-control-label">ENTER EMPLOYEE ID NUMBER</label>
							</div>
							<div class="col-12 login-btm login-button">
								<button type="submit" onclick="timeIn()"
									class="btn col-12 btn-outline-primary timeIn">TIME IN</button>
							</div>
							<div class="col-12 login-btm login-button">
								<button type="submit" onclick="timeOut()" class="btn col-12 btn-outline-primary">TIME OUT</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-3 col-md-2"></div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url("assets/js/Employee.js")?>"></script>
	<!-- jQuery JS CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function timeIn() {
			document.getElementById("form_id").action = "<?php echo site_url('EmployeeFunctions/timeIn');?>";
		}

		function timeOut() {
			document.getElementById("form_id").action = "<?php echo site_url('EmployeeFunctions/timeOut');?>";
		}

	</script>
