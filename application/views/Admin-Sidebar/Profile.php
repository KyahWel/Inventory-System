<?php $this->load->view("AdminSidebar") ?>
    <title>Profile</title>
    <link href=<?php echo base_url("assets/css/Profile.css")?> rel="stylesheet">
  </head>

<main class="page-content">
    <div class="profile-container" style="margin-left: 20vw; width: 78.5vw;">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="profile-box d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-2" width="150px" src="http://cdn.onlinewebfonts.com/svg/img_81837.png">
                        <span class="profile-name font-weight-bold"><?= $this->session->userdata('auth_user')['firstname']?> <?= $this->session->userdata('auth_user')['lastname']?></span>
                        <span class="profile-username text-white-50"><?= $this->session->userdata('auth_user')['username']?></span><span> </span>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="profile-settings d-flex justify-content-between align-items-center mb-3">
                            <h4 class="settings text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input class="inputCont" type="text" id="firstname" name="firstname" disabled value="<?= $this->session->userdata('auth_user')['firstname']?>">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Surname</label>
                                <input class="inputCont" type="text" id="lastname" name="lastname" disabled value="<?= $this->session->userdata('auth_user')['lastname']?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Username</label>
                                <input class="inputCont" type="text" id="username" name="username" disabled value="<?= $this->session->userdata('auth_user')['username']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">ID No.</label>
                                <input class="inputCont" type="text" id="adminID" name="adminID" disabled value="<?= $this->session->userdata('auth_user')['adminID']?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Date Added</label>
                                <input class="inputCont" type="text" id="dateAdded" name="dateAdded" disabled value="<?= $this->session->userdata('auth_user')['dateAdded']?>">
                            </div>
                        </div>
                
                        <form class="profile-buttons" method="POST" action="">
                            <div class="d-flex stepButtons justify-content-end pt-3">
                                <div class="mx-2"  id="editDiv" style="display: block;"> 
                                    <button type="button" class="btn btn-sm ms-auto text-center text-black" onclick="switchEdit()" style="width: 5rem; background:#e8e8e9; border:none;">
                                        Edit
                                    </button>
                                </div>

                                <div class="mx-2" id="saveDiv" style="display: none;"> 
                                    <button  button type="submit" class="btn btn-sm ms-auto text-center text-white" style="width: 5rem; background:#303030; border:none;">
                                        Save
                                    </button>
                                </div> 
                
                                <div class="mx-2" id="cancelDiv" style="display: none;"> 
                                    <button  button type="submit" class="btn btn-sm ms-auto text-center text-black" onclick="switchCancel()"  style="width: 5rem; background:#e8e8e9; border:none;">
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

 
    
