<?php $this->load->view("AdminSidebar") ?>
    <title>Profile</title>
    <link href=<?php echo base_url("")?> rel="stylesheet">
  </head>

<main class="page-content">
    <div class="container">

  
    <h3>This is Profile Tab</h3> <br>
         Username: <input type="text" id="username" name="username" disabled value="<?= $this->session->userdata('auth_user')['username']?>">
         First Name: <input type="text" id="firstname" name="firstname" disabled value="<?= $this->session->userdata('auth_user')['firstname']?>">
     
        <form method="POST" action="">
          <div class="d-flex stepButtons justify-content-end pt-3">
              <div class="mx-2"  id="editDiv" style="display: block;"> 
                  <button type="button" class="btn btn-warning ms-auto mb-3 text-center text-white" onclick="switchEdit()" style="width: 7rem; background:maroon; border:none; padding:6.2px 0;">
                        Edit
                  </button>
              </div>
              <div class="mx-2" id="saveDiv" style="display: none;"> 
                  <button  button type="submit" class="btn btn-warning ms-auto mb-3 text-center text-white" style=" width: 7rem; background:maroon; border:none; padding:6.2px 0;">
                        Save
                  </button>
              </div> 
              <div class="mx-2" id="cancelDiv" style="display: none;"> 
                  <button  button type="submit" class="btn btn-warning ms-auto mb-3 text-center text-white" onclick="switchCancel()"  style=" width: 7rem; background:maroon; border:none; padding:6.2px 0;">
                        Cancel
                  </button>
              </div>         
          </div>
         </form>
         </div>
      
</main> 
<script type="text/javascript" src="<?php echo base_url("assets/js/profile.js")?>"> </script>

 
    
