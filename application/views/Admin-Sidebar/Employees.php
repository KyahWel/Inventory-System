  <head>
  	<title>Employees</title>
  	<link href=<?php echo base_url("assets/css/sidebar.css")?> rel="stylesheet">
  </head>


  <!-- sidebar-wrapper  -->
  <main class="page-content">
  	<div class="container">

  		<h1>Employees</h1>
  		<button class="add-employee" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" id="addEmployee">Add
  			Employee</button>
  		<!-- TABLE -->
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<h4>List of Employees</h4>
  					<div class="table-responsive">
  						<table id="mytable" class="table table-bordred table-striped">
  							<thead>
  								<th>Employee Number</th>
  								<th>First Name</th>
  								<th>Last Name</th>
  								<th>Position</th>
  								<th>Action</th>

  							</thead>
  							<tbody>
  								<!-- SAMPLE EMPLOYEES -->
  								<?php foreach($employee as $row){?>


  								<tr>
  									<td> <a class="view_employee" data-id="<?php echo $row->employeeID?>" id="viewEmployee"
  											data-bs-toggle="modal" data-bs-target="#viewEmployeeModal"> <?php echo $row->employeeNumber?>
  										</a></td>
  									<td><?php echo $row->firstname?></td>
  									<td><?php echo $row->lastname?></td>
  									<td><?php echo $row->position?></td>
  									<td>
  										<button id="editEmployee" class="edit_employee" data-id="<?php echo $row->employeeID?>"
  											data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>
  										<button id="deleteEmployee"
  											onclick="location.href='<?php echo site_url('EmployeeFunctions/deleteEmployee')?>/<?php echo $row->employeeID; ?>'">Delete</button>
  									</td>
  								</tr>
  								<?php } ?>
  							</tbody>
  						</table>
  						<div class="clearfix"></div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addAnnouncementHeader"
  			aria-hidden="true">
  			<div class="modal-dialog modal-lg modal-dialog-centered">
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="addAnnouncementHeader">Add Employee</h5>
  						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
  							aria-label="Close"></button>
  					</div>
  					<div class="modal-body">
  						<form action="<?php echo site_url('EmployeeFunctions/addEmployee')?>" method="POST">
  							<p>First Name: <br><input type="text" required name="firstname"></p>
  							<p>Last Name: <br><input type="text" required name="lastname"></p>
  							<p>Age: <br><input type="text" required name="age"></p>
  							<p>Address: <br><input type="text" required name="address"></p>
  							<p>Position:
  								<select name="position" required id="position">
  									<option value="" selected disabled hidden>Select Position</option>
  									<option value="Driver">Driver</option>
  									<option value="Helper">Helper</option>
  									<option value="Machine Operator">Machine Operator</option>
  									<option value="Secretary">Secretary</option>
  								</select>
  							</p>
  							<p>SSS Number: <br><input type="text" required name="sss-number"></p>
  							<p>Pag-IBIG Number: <br><input type="text" required name="pagibig-number"></p>
  							<p>PhilHealth Number: <br><input type="text" required name="philhealth-number"></p>
  							<p>TIN Number: <br><input type="text" required name="tin-number"></p>
  							<p>Employment Date: <br><input type="date" required name="employmentDate"></p>
  							<div class="editAnnouncementButton d-flex justify-content-end">
  								<button type="submit" value="submit">Add</button>
  								<button type="cancel" value="submit" data-bs-dismiss="modal">Cancel</button>
  							</div>
  						</form>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editAnnouncementHeader"
  			aria-hidden="true">
  			<div class="modal-dialog modal-lg modal-dialog-centered">
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="editAnnouncementHeader">Edit Employee</h5>
  						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
  							aria-label="Close"></button>
  					</div>
  					<div class="modal-body">
  						<div id="edit_employee">
                  
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewAnnouncementHeader"
  			aria-hidden="true">
  			<div class="modal-dialog modal-lg modal-dialog-centered">
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="viewAnnouncementHeader">View Employee</h5>
  						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
  							aria-label="Close"></button>
  					</div>
  					<div class="modal-body">
  						<div id="view_employee">

  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </main>

  <script src=<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>></script>
  <!-- jQuery JS CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- jQuery DataTables JS CDN -->
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- Ajax fetching data -->
  <script type="text/javascript">
  	$(document).ready(function () {
  		$('#dataTable').DataTable();
  		$('.view_employee').click(function () {
  			var employeeData = $(this).data('id');
  			$.ajax({
  				url: "<?php echo site_url('EmployeeFunctions/viewEmployee');?>",
  				method: "POST",
  				data: {
  					employeeData: employeeData
  				},
  				success: function (data) {
  					$('#view_employee').html(data);
  					console.log(employeeData);
  				}
  			});
  		});

  		$('.edit_employee').click(function () {
  			var employeeData = $(this).data('id');
        console.log(employeeData);
  			$.ajax({
  				url: "<?php echo site_url('EmployeeFunctions/edit_Employee');?>",
  				method: "POST",
  				data: {
  					employeeData: employeeData
  				},
  				success: function (data) {
  					$('#edit_employee').html(data);
  					// console.log(employeeData);
  				}
  			});
  		});
  	});

  </script>
