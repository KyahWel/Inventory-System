<?php $this->load->view("AdminSidebar") ?>
<title>Dashboard</title>
<link href=<?php echo base_url("assets/css/Dashboard.css")?> rel="stylesheet">
</head>

<main class="mt-5">
	<div class="main-div bg-dark rounded">
		<div class="pt-3 px-3 d-flex flex-row  ">
			<div class="container bg-white mx-1 p-2 d-flex flex-column rounded">
				<div class="row align-items-center">
					<div class="col-8">
						<h2 class="price">P 36,000 </h2>
						<h6 class="">SSS <br> Contribution </h6>
					</div>
					<div class="col-4 text-right ">
						<i class="fas fa-money-check fa-3x"></i>
					</div>
				</div>
			</div>
			<div class="container bg-white mx-1 p-2 d-flex flex-column rounded">
				<div class="row align-items-center">
					<div class="col-8">
						<h2 class="price">P 45,000 </h2>
						<h6 class="">Pag-Ibig Contribution</h6>
					</div>
					<div class="col-4 text-right ">
						<i class="fas fa-home fa-3x"></i>
					</div>
				</div>
			</div>
			<div class="container bg-white mx-1 p-2 d-flex flex-column rounded">
				<div class="row align-items-center">
					<div class="col-8">
						<h2 class="price">P 40,000 </h2>
						<h6 class="">PhilHealth Contribution</h6>
					</div>
					<div class="col-4 text-right ">
						<i class="fas fa-medkit fa-3x"></i>
					</div>
				</div>
			</div>
			<div class="container bg-white mx-1 p-2 d-flex flex-column rounded">
				<div class="row align-items-center">
					<div class=" text-center">
						<h4 class=""> <b>Total Expenses</b></h4>
						<h2 class=""> P 40,000  </h2>
					</div>
				</div>
			</div>
		</div>
		<div class="p-3  d-flex flex-row">
			<div class="container bg-white mx-1 p-3 d-flex flex-column">
				<h2>Monthly breakdown of expenses:</h2>
				<canvas id="chart"></canvas>
			</div>
			<div class="container bg-white mx-1 p-2 w-50 d-flex flex-column">
				<h3>Employees</h3>
			</div>
		</div>
	</div>
	<br>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script>
      const ctx = document.getElementById("chart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
		"November", "December"],
          datasets: [{
            label: 'SSS',
            backgroundColor: 'rgba(255, 0, 0, 0.3)',
            data: [3000, 4000, 2000, 5000, 8000, 9000, 2000,2000, 5000, 8000, 9000, 2000],
          },
		  {
            label: 'Philhealth',
            backgroundColor: 'rgba(0, 255, 0, 0.3)',
            data: [1000, 2000, 6000, 4000, 6000, 9000, 3000,3500, 6000, 5000, 7000, 4000],
          },
		  {
            label: 'PagIbig',
            backgroundColor: 'rgba(0, 0, 255, 0.3)',
            data: [2000, 3000, 4000, 6000, 4000, 9000, 3000,3500, 6000, 5000, 7000, 4000],
          }]
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

