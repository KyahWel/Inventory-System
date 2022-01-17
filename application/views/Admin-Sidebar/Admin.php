<?php $this->load->view("AdminSidebar") ?>

<head>
	<title>Admin List</title>
	<link href=<?php echo base_url("assets/css/Admin.css")?> rel="stylesheet">
</head>

<body>
	<main class="page-content">

		<div class="container border border-primary">
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col col-sm-3 col-xs-12">
									<h4 class="title">Admin Data List </h4>
								</div>
								<div class="col-sm-9 col-xs-12 text-right">
									<div class="btn_group">
										<input type="text" class="form-control" placeholder="Search">
										<button class="btn btn-default" title="Reload"><i
												class="fa fa-sync-alt"></i></button>
										<button class="btn btn-default" title="Pdf"><i
												class="fa fa-file-pdf"></i></button>
										<button class="btn btn-default" title="Excel"><i
												class="fas fa-file-excel"></i></button>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Full Name</th>
										<th>Age</th>
										<th>Job Title</th>
										<th>City</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Vincent Williamson</td>
										<td>31</td>
										<td>iOS Developer</td>
										<td>Sinaai-Waas</td>
										<td>
											<ul class="action-list">
												<li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
												<li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
