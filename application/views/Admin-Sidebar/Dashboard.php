<?php $this->load->view("AdminSidebar") ?>
<title>Dashboard</title>
<link href=<?php echo base_url("assets/css/Dashboard.css")?> rel="stylesheet">
</head>

<main class="mt-5">

	<div class="main-div rounded">
		<div class="container mx-2 bootstrap snippet">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg"><i class="fa fa-users fa-fw fa-3x"></i></div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded">Total Employees</div>
							<div class="circle-tile-number text-faded "><?php echo $employee?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg">
							<img aria-hidden="true" class="w-75 mt-3"
								src="<?php echo base_url("assets/images/sss.png")?>" alt="SSS Logo">
						</div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded"> SSS Contribution</div>
							<div class="circle-tile-number text-faded ">PHP 30,000</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg">
							<img src="<?php echo base_url("assets/images/phl.png")?>" alt="SSS Logo">
						</div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded">Philhealth Contribution</div>
							<div class="circle-tile-number text-faded ">PHP 30,000</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg"><img class="w-75 mt-1"
								src="<?php echo base_url("assets/images/pg.png")?>" alt="SSS Logo"></div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded">Pag Ibig Contribution</div>
							<div class="circle-tile-number text-faded ">PHP <?php echo $employee*100?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="p-3  d-flex flex-row">
			<div class="mx-1 d-flex flex-column p-3 border dark-blue border-dark rounded shadow">
				<h4 style="font-family:'Century Gothic';" class="text-faded">MONTHLY BREAKDOWN OF EXPENSES:</h4>
				<canvas id="chart" height="350" width="990"></canvas>
			</div>
			
		</div>

		<div class="p-3  d-flex flex-row">
			<div class="container bg-white d-flex mx-1 py-2 border border-dark flex-row rounded">
				<div class="container border border-dark d-flex flex-row ">
					<div class="border border-dark flex-col-10 text-center">
						<span class="dot-active"> </span>
						<h6>[Time In]</h6>
					</div>
					<div class="border border-dark flex-col-8 text-center">
						<h6>William Cris Hod</h6>
					</div>
				</div>
			</div>
			<div class=" p-3 d-flex flex-column border dark-blue border-dark rounded shadow">
				<h4 style="font-family:'Century Gothic';" class="text-faded">EXPENSES FOR MONTH OF
					<?php echo strtoupper(date('F'))?></h4>
				<br>
				<canvas id="month-chart" height="70"  width="120" ></canvas>
			</div>
			
		</div>
		
	</div>
	<br>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

<script>
	Chart.defaults.global.defaultFontColor = 'white';
	Chart.defaults.global.elements.line.fill = false;
	const chart1 = document.getElementById("chart").getContext('2d');
	const myChart1 = new Chart(chart1, {
		type: 'line',
		options: {
			responsive: false,
		},
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
				"October",
				"November", "December"
			],
			datasets: [{
					label: 'SSS',
					
					borderColor: 'rgba(255,99,132,1)',
					data: [3000, 4000, 2000, 5000, 8000, 9000, 2000, 2000, 5000, 8000, 9000, 2000],
				},
				{
					label: 'Philhealth',
				
					borderColor: 'rgba(54, 162, 235, 1)',
					data: [1000, 2000, 6000, 4000, 6000, 7000, 3000, 3500, 6000, 5000, 7000, 4000],
				},
				{
					label: 'PagIbig',
				
					borderColor: 'rgba(255, 206, 86, 1)',
					data: [2000, 3000, 4000, 6000, 4000, 8000, 5000, 4500, 7000, 6000, 8000, 5000],
				}
			]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
					}
				}]
			}
		},
	});

	const chart2 = document.getElementById("month-chart").getContext('2d');
	const myChart2 = new Chart(ctx, {
		type: 'line',
		options: {
			responsive: false,
		},
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
				"October",
				"November", "December"
			],
			datasets: [{
					label: 'SSS',
					
					borderColor: 'rgba(255,99,132,1)',
					data: [3000, 4000, 2000, 5000, 8000, 9000, 2000, 2000, 5000, 8000, 9000, 2000],
				},
				{
					label: 'Philhealth',
				
					borderColor: 'rgba(54, 162, 235, 1)',
					data: [1000, 2000, 6000, 4000, 6000, 7000, 3000, 3500, 6000, 5000, 7000, 4000],
				},
				{
					label: 'PagIbig',
				
					borderColor: 'rgba(255, 206, 86, 1)',
					data: [2000, 3000, 4000, 6000, 4000, 8000, 5000, 4500, 7000, 6000, 8000, 5000],
				}
			]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
					}
				}]
			}
		},
	});
</script>
