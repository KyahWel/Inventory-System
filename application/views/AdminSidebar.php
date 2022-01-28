<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link href=<?php echo base_url("assets/css/sidebar.css")?> rel="stylesheet">
</head>


<body>
	<div class="page-wrapper chiller-theme toggled">

		<nav class="sidebar-wrapper">
			<div class="sidebar-content">
				<div class="sidebar-brand">
					<a href="#"></a>
				</div>
				<div class="sidebar-header">
					<div class="user-pic">
						<img class="img-responsive img-rounded" src="http://cdn.onlinewebfonts.com/svg/img_81837.png"
							alt="User picture">
					</div>
					<div class="user-info">
						<span class="user-name">
							<strong><?= $this->session->userdata('auth_user')['firstname']?>
								<?= $this->session->userdata('auth_user')['lastname']?></strong>
						</span>
						<span class="user-role"><?= $this->session->userdata('auth_user')['position']?></span>
						<span class="user-status">
							<i class="fa fa-circle"></i>
							<span>Online</span>
						</span>
					</div>
				</div>
				<!-- sidebar-search  -->
				<div class="sidebar-menu">
					<ul>
						<li class="header-menu">
							<span>Profile</span>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Profile'); ?>" active>
								<i class="fa fa-user"></i>
								<span>Profile</span>
							</a>
						</li>
						<li class="header-menu">
							<span>General</span>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Dashboard'); ?>">
								<i class="fa fa-tachometer-alt"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Admin-List'); ?>">
								<i class="fa fa-user-cog"></i>
								<span>Admin</span>
							</a>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Employee-List'); ?>">
								<i class="fa fa-address-card"></i>
								<span>Employees</span>
							</a>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Event-Log'); ?>">
								<i class="fa fa-clock"></i>
								<span>Event Log</span>
							</a>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Payroll'); ?>">
								<i class="fa fa-wallet"></i>
								<span>Payroll</span>
							</a>
						</li>
						<li class="header-menu">
							<span>Settings</span>
						</li>
						<li class="sidebar">
							<a href="#changePasswordModal" class="changePass" data-toggle="modal">
								<i class="fa fa-key"></i>
								<span>Change Password</span>
							</a>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Logout'); ?>">
								<i class="fa fa-sign-out-alt"></i>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- sidebar-menu  -->
			</div>
			<!-- sidebar-content  -->
		</nav>


		<div class="modal fade" id="changePasswordModal">
			<div class=" modal-dialog " style=" width:150vw;height:auto">
			<div class="modal-content dark-blue">
				<div class="modal-body">
					<button type="button" class="close text-faded" data-dismiss="modal" aria-label="Close">&times;</button>
					<div class="form-group">
						<form action="../AdminFunctions/changePass/<?= $this->session->userdata('auth_user')['adminID']?>" method="POST" name="signupForm" id="signupForm">
							<h2 class="formTitle text-faded">
								Change Password
							</h2>
							<div class="inputDiv">
								<label class="inputLabel text-faded" for="password">Current Password</label>
								<input type="password"  name="currentpass"  required>
							</div>
							<div class="inputDiv">
								<label class="inputLabel text-faded" for="password">New Password</label>
								<input type="password" name="newpass" id="newpassword"  required>
							</div>
							<div class="inputDiv">
								<label class="inputLabel text-faded" for="confirmPassword">Confirm Password</label>
								<input type="password" name="confirmpass" id="confirmpassword" required>

							</div>
							<div class="buttonWrapper">
								<button type="submit"
									class="submitButton bg-success">
									<span>Continue</span>
								</button>
								<br>
								<button type="cancel" data-dismiss="modal"
									class="submitButton bg-danger">
									<span>Cancel</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		var newpass = document.getElementById("newpassword");
		var confirmpass = document.getElementById("confirmpassword");
		var unmatched = document.getElementById("notmatch");
		console.log(newpass + confirmpass);
		// new password and confirm password validation
		function validatePassword() {
			if (newpass.value != confirmpass.value) {
				confirmpass.setCustomValidity("Passwords don't Match");

			} else {
				confirmpass.setCustomValidity('');
			}
		}
		newpass.onchange = validatePassword;
		confirmpass.onkeyup = validatePassword;
	</script>

