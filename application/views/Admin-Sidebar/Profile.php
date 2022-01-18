<?php $this->load->view("AdminSidebar") ?>
    <title>Profile</title>
    <link href=<?php echo base_url("assets/css/Profile.css")?> rel="stylesheet">
  </head>

<main class="page-content">
    <div class="profile-container">
        <div class="col-12 title">
                <h3>My Profile</h3>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="photoCont">
                    <img class="profile-photo"src="http://cdn.onlinewebfonts.com/svg/img_81837.png" width="150"/>
                </div>
            </div>

            <div class="col-10 profile-infoCont">
                <div class="col-6 profile-inputCont">
                    <div class="profile-input">
                        Username: <input class="inputCont" type="text" id="username" name="username" disabled value="<?= $this->session->userdata('auth_user')['username']?>">
                    </div>
                    <div class="profile-input">
                        ID: <input class="inputCont" type="text" id="adminID" name="adminID" disabled value="<?= $this->session->userdata('auth_user')['adminID']?>">
                    </div>
                    <div class="profile-input">
                        First Name: <input class="inputCont" type="text" id="firstname" name="firstname" disabled value="<?= $this->session->userdata('auth_user')['firstname']?>">
                    </div>
                    <div class="profile-input">
                        Last Name: <input class="inputCont" type="text" id="lastname" name="lastname" disabled value="<?= $this->session->userdata('auth_user')['lastname']?>">
                    </div>
                    <div class="profile-input">
                        Date Added: <input class="inputCont" type="text" id="dateAdded" name="dateAdded" disabled value="<?= $this->session->userdata('auth_user')['dateAdded']?>">
                    </div>
                </div>

                <div class="col align-self-end">
                    <form method="POST" action="">
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
</main> 
<script type="text/javascript" src="<?php echo base_url("assets/js/profile.js")?>"> </script>

 
    
