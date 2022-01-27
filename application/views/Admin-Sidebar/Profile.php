<?php $this->load->view("AdminSidebar") ?>
<title>Profile</title>
<link href=<?php echo base_url("assets/css/Profile.css")?> rel="stylesheet">
</head>

<main class="page-content">
	<div class="profile-container" style="margin-left: 20vw; width: 78.5vw;">
		<div class="container rounded bg-white mt-5 mb-5">
			<div class="row">
				<div class="col-md-4 border-right py-5">
					<div class="d-flex flex-column align-items-center text-center py-5 ">
						<img class="rounded-circle mt-2 border border-2 border-white" width="150px"
							src="http://cdn.onlinewebfonts.com/svg/img_81837.png">
                        <br>
                        <span
							class="profile-username font-weight-light lead">[<?= $this->session->userdata('auth_user')['employeeNumber']?>]</span><span>
						</span>
						<span
							class="profile-name font-weight-bold"><?= $this->session->userdata('auth_user')['firstname']?>
							<?= $this->session->userdata('auth_user')['lastname']?></span>
						<span
							class="profile-username text-white-50"><?= $this->session->userdata('auth_user')['position']?></span><span>
						</span>
					</div>
				</div>

				<div class="col-md-8 d-flex justify-content-center">
					<div class="p-3 py-5 ">
						<div class="profile-settings d-flex justify-content-between align-items-center mb-3">
							<h4 class="settings text-right">USER PROFILE</h4>
						</div>
						<form method="POST" action="">
							<div class="row mt-5">
								<div class="col-md-4 d-flex  flex-column">
									<div class="flex-row row-md-2 text-center">
										<input class="inputCont text-center " type="text" id="firstname"
											name="firstname" disabled size="20"
											value="<?= $this->session->userdata('auth_user')['firstname']?>">
									</div>
									<div class="flex-row row-md-2 text-center">
										<hr class="style">
										<label class="labels align-self-center">First Name</label>
									</div>
								</div>

								<div class="col-md-4 d-flex  flex-column">
									<div class="flex-row row-md-2 text-center">
										<input class="inputCont text-center" type="text" id="lastname" name="lastname"
											disabled value="<?= $this->session->userdata('auth_user')['lastname']?>">
									</div>
									<div class="flex-row row-md-2 text-center">
										<hr class="style">
										<label class="labels align-self-center">Last Name</label>
									</div>
								</div>

								<div class="col-md-4 d-flex  flex-column">
									<div class="flex-row row-md-2 text-center">
										<input class="inputCont text-center" type="text" disabled
											value="<?= $this->session->userdata('auth_user')['employmentDate']?>">
									</div>
									<div class="flex-row row-md-2 text-center">
										<hr class="style">
										<label class="labels">Employment Date</label>
									</div>
								</div>
							</div>
							<div class="row mt-4 px-5">
								<div class="col-md-5 d-flex flex-column">
									<div class="flex-row row-md-2 text-center">
										<input class="inputCont text-center" type="text" id="username" name="username"
											disabled value="<?= $this->session->userdata('auth_user')['username']?>">
									</div>
									<div class="flex-row row-md-2 text-center">
                                    <hr class="style">
										<label class="labels">Username</label>
									</div>

								</div>
								<div class="col-md-7 d-flex flex-column ">
                                    <div class="flex-row row-md-2 text-center">
										<input class="inputCont text-center" type="text" id="dateAdded" name="dateAdded" disabled
											value="<?= $this->session->userdata('auth_user')['dateAdded']?>">
									</div>
									<div class="flex-row row-md-2 text-center">
                                         <hr class="style">
										<label class="labels">Date Added as Admin</label>
									</div>
								</div>				
							</div>
                            <div class="d-flex stepButtons justify-content-end pt-5">
									<div class="mx-2" id="editDiv" style="display: block;">
										<button type="button" class="btn btn-sm ms-auto text-center text-black"
											onclick="switchEdit()"
											style="width: 5rem; background:#e8e8e9; border:none;">
											Edit
										</button>
									</div>

									<div class="mx-2" id="saveDiv" style="display: none;">
										<button type="submit" class="btn btn-sm ms-auto text-center text-white"
											style="width: 5rem; background:#303030; border:none;">
											Save
										</button>
									</div>
									<div class="mx-2" id="cancelDiv" style="display: none;">
										<button type="submit" class="btn btn-sm ms-auto text-center text-black"
											onclick="switchCancel()"
											style="width: 5rem; background:#e8e8e9; border:none;">
											Cancel
										</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript" src="<?php echo base_url("assets/js/profile.js")?>"> </script>
