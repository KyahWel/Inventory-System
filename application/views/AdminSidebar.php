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
		<button id="show-sidebar" class="btn btn-sm btn-dark">
			<i class="fas fa-bars"></i>
		</button>
		<nav id="sidebar" class="sidebar-wrapper">
			<div class="sidebar-content">
				<div class="sidebar-brand">
					<a href="#"></a>
					<div id="close-sidebar">
						<i class="fas fa-times"></i>
					</div>
				</div>
				<div class="sidebar-header">
					<div class="user-pic">
						<img class="img-responsive img-rounded"
							src="http://cdn.onlinewebfonts.com/svg/img_81837.png"
							alt="User picture">
					</div>
					<div class="user-info">
						<span class="user-name">
							<strong><?= $this->session->userdata('auth_user')['firstname']?>
								<?= $this->session->userdata('auth_user')['lastname']?></strong>
						</span>
						<span class="user-role">Administrator</span>
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
                        <li class="sidebar" >
							<a href="<?php echo base_url('Admin/Profile'); ?>" active>
								<i class="fa fa-user"></i>
								<span>Profile</span>
							</a>
						</li>
						<li class="header-menu">
							<span>General</span>
						</li>
						<li class="sidebar">
							<a href="<?php echo base_url('Admin/Dashboard'); ?>" >
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
							<a href="<?php echo base_url('Admin/ChangePassword'); ?>">
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

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/sidebar.js")?>"></script>
