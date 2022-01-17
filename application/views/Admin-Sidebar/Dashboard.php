<?php $this->load->view("AdminSidebar") ?>
<title>Dashboard</title>
<link href=<?php echo base_url("")?> rel="stylesheet">
</head>

<main class="page-content">
	<div class="container">
		<h3>Admin Data Check</h3> <br>
		<div class="border border-primary col-6 p-3">
			<b>Username:</b> <?= $this->session->userdata('auth_user')['username']?><br>
			<b>Password: </b> <?= $this->session->userdata('auth_user')['password']?> <br>
			<b>Name: </b><?= $this->session->userdata('auth_user')['firstname']?>
			<?= $this->session->userdata('auth_user')['lastname']?><br>
			<b>Data Added:
			</b><?php echo date('m/d/Y', strtotime($this->session->userdata('auth_user')['dateAdded']))?> at
			<?php echo date('h:i:s a', strtotime($this->session->userdata('auth_user')['timeAdded']))?><br>
			<b>Logged in: </b><span id="day"></span> <span id="date"></span> at <span id="time"></span> <br>
		</div>
	</div>
</main>

<script>
	const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
		"November", "December"
	];

	var x = new Date()
	var month = monthNames[x.getMonth()];
	var day = x.getDate();
	var year = x.getFullYear();
	var minute = x.getMinutes()
	var seconds = x.getSeconds()
	if (day < 10) {
		day = '0' + day;
	}
	if (minute < 10) {
		minute = '0' + minute;
	}
	if (seconds < 10) {
		seconds = '0' + seconds;
	}
	var days = weekday[x.getDay()] + ',';
	var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
	hours = x.getHours() % 12;
	hours = hours ? hours : 12;
	var date = month + ' ' + day + ' ' + year;
	var time = hours + ":" + minute + ":" + seconds + "" + ampm;
	document.getElementById('day').innerHTML = days;
	document.getElementById('date').innerHTML = date;
	document.getElementById('time').innerHTML = time;

</script>
