<?php $this->load->view("AdminSidebar") ?>
<title>Dashboard</title>
<link href=<?php echo base_url("assets/css/Dashboard.css")?> rel="stylesheet">
</head>

<main class="mt-5">
	<div class="main-div rounded">
		<div class="container bootstrap snippet">
			<?php if($this->session->flashdata('adminError')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<?= $this->session->flashdata('adminError'); ?>
				<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
			</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('successAdmin')) : ?>
			<div class="alert alert-success alert-dismissible fade show">
				<?= $this->session->flashdata('successAdmin'); ?>
				<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
			</div>
			<?php endif; ?>
			<div class=" container d-flex flex-row col-lg-12 col-sm-6">
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg"><i class="fa fa-users fa-fw fa-3x"></i></div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded">Total Employees <br>[As of
								<?php echo date("m/d/Y")?>]</div>
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
							<div class="circle-tile-description text-faded"> SSS Contribution <br> [Employer + Employee]
							</div>
							<div class="circle-tile-number text-faded ">PHP <?php echo $sss?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg">
							<img src="<?php echo base_url("assets/images/phl.png")?>" alt="SSS Logo">
						</div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded">Philhealth Contribution <br> [Employer + Employee]</div>
							<div class="circle-tile-number text-faded ">PHP <?php echo $philhealth?></div>

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle-tile ">
						<div class="circle-tile-heading header-bg"><img class="w-75 mt-1"
								src="<?php echo base_url("assets/images/pg.png")?>" alt="SSS Logo"></div>
						<div class="circle-tile-content dark-blue">
							<div class="circle-tile-description text-faded">Pag Ibig Contribution <br> [Employer + Employee]</div>
							<div class="circle-tile-number text-faded ">PHP <?php echo $pagibig?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class=" container d-flex flex-row col-lg-12 col-sm-6">
			<div class=" d-flex flex-column p-3 m-1 border dark-blue border-dark rounded shadow col-lg-12 col-sm-6">
				<h4 style="font-family:'Century Gothic';" class="text-faded"><?php echo date("Y")?> MONTHLY BREAKDOWN OF
					EXPENSES :</h4><br>
				<canvas id="chart"></canvas>
			</div>
		</div>

		<div class="mt-3 container d-flex flex-row col-lg-12 col-sm-6">
			<div class="container bg-white d-flex mx-1 py-2 dark-blue flex-column rounded">
				<div class="container" style="overflow: scroll">
					<div class="text-center text-faded">
						<h5>Employee activity log for <?php echo date("F d, Y")?></h5><br>
					</div>
					<div class="activtytable">
						<table class="table table-borderless">
							<thead class="text-center text-white">
								<tr>
									<th>
										<h6 style="font-family:'Century Gothic'; font-weight:bold;">EMPLOYEE</h6>
									</th>
									<th>
										<h6 style="font-family:'Century Gothic'; font-weight:bold;">POSITION</h6>
									</th>
									<th>
										<h6 style="font-family:'Century Gothic'; font-weight:bold;">TIME IN</h6>
									</th>
									<th>
										<h6 style="font-family:'Century Gothic'; font-weight:bold;">TIME OUT</h6>
									</th>
								</tr>
							</thead>
							<tbody class="text-center text-faded">
								<?php foreach($logs as $row){?>
									<tr>
										<td>
											<p><?php echo $row->firstname?> <?php echo $row->lastname?></p>
										</td>
										<td>
											<p><?php echo $row->position?></p>
										</td>
										<td>
											<div class="d-inline-flex align-items-center active">
												<div class="circle"></div>
												<?php if ($row->timeIn != NULL):?>
													<div class="ps-2"><?php echo date('h:i:s a', strtotime($row->timeIn))?></div>
												<?php else:?>
													<div class="ps-2"></div>			
												<?php endif?>
											</div>
										</td>
										<td>
										<div class="d-inline-flex align-items-center inactive">
												<div class="circle"></div>
												<?php if ($row->timeOut != NULL):?>
													<div class="ps-2"><?php echo date('h:i:s a', strtotime($row->timeOut))?></div>
												<?php else:?>
													<div class="ps-2"></div>			
												<?php endif?>
											</div>
										</td>
									</tr>
								<?php } ?>							
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class=" p-3  dark-blue rounded shadow  flex-column col-lg-5">
				<h5 style="font-family:'Century Gothic';" class="text-faded">EXPENSES FOR MONTH OF
					<?php echo strtoupper(date('F'))?></h5>
				<br>
				<canvas id="month-chart"></canvas>
			</div>
		</div>

		<div class="mt-2 container d-flex flex-row col-lg-12 col-sm-6">
			<div class="container bg-white d-flex ms-1 py-2 mt-2 dark-blue flex-column rounded">
				<div class="container">
					<div class="text-center text-white">
						<h3>EMPLOYEE AND EMPLOYER'S CONTRIBUTION TABLE</h3><br>
					</div>
					<div class="tablecont">

						<table class="table table-borderless">
							<thead class="text-center text-white">
								<tr>
									<th>
										<h5 style="font-family:'Century Gothic';font-weight:bold;">EMPLOYEE</h5>
									</th>
									<th>
										<h5 style="font-family:'Century Gothic';font-weight:bold;">POSITION</h5>
									</th>
									<th>
										<h5 style="font-family:'Century Gothic';font-weight:bold;">SSS</h5>
									</th>
									<th>
										<h5 style="font-family:'Century Gothic';font-weight:bold;">PHILHEALTH</h5>
									</th>
									<th>
										<h5 style="font-family:'Century Gothic';font-weight:bold;">PAG-IBIG</h5>
									</th>
								</tr>
							</thead>
							<tbody class="text-center text-faded">
								<?php foreach($data as $row){?>
									<tr>
										<td>
											<p><?php echo $row->firstname?> <?php echo $row->lastname?></p>
										</td>
										<td>
											<p><?php echo $row->position?></p>
										</td>
										<td>
											<p><?php echo $row->sssContribution?></p>
										</td>
										<td>
											<p><?php echo $row->philhealthContribution?></p>
										</td>
										<td>
											<p><?php echo $row->pagibigContribution?></p>
										</td>
									</tr>
								<?php } ?>	
							</tbody>
						</table>
					</div>
				</div>
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
			labels: [" ", "January", "February", "March", "April", "May", "June", "July", "August", "September",
				"October",
				"November", "December"
			],
			datasets: [{
					label: 'SSS',

					borderColor: 'rgba(255,99,132,1)',
					data: [0, <?php echo $sss?>],
				},
				{
					label: 'Philhealth',

					borderColor: 'rgba(54, 162, 235, 1)',
					data: [0, <?php echo $philhealth?>],
				},
				{
					label: 'PagIbig',

					borderColor: 'rgba(255, 206, 86, 1)',
					data: [0, <?php echo $pagibig?>],
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
	const myChart2 = new Chart(chart2, {
		type: "doughnut",
		data: {
			labels: ["SSS", "PAGIBIG", " PHILHEALTH"],
			datasets: [{
				backgroundColor: ["#b91d47", "#00aba9", "#2b5797"],
				data: [<?php echo $sss?>, <?php echo $pagibig?>, <?php echo $philhealth?>],
			}]
		},
		options: {

		}
	});

</script>
