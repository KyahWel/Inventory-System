<?php $this->load->view("AdminSidebar") ?>
<title>Employees</title>
<link href=<?php echo base_url("assets/css/changepassword.css")?> rel="stylesheet">
</head>

<body>
	<main class="page-content">
   
	<div class="mainDiv">
  <div class="cardStyle">
    <form action="" method="post" name="signupForm" id="signupForm">

      <h2 class="formTitle">
        Change Password
      </h2>
	
	<div class="inputDiv">
      <label class="inputLabel" for="password">Current Password</label>
      <input type="password" id="password" name="password" required>
    </div>


    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" id="password" name="password" required>
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword">
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" id="submitButton" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
        <span>Continue</span>
      </button>
	  <button type="cancel" id="submitButton" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
        <span>Cancel</span>
      </button>
    </div>
      
  </form>
  </div>
</div>
	</main>
<script type="text/javascript" src="<?php echo base_url("assets/js/changepassword.js")?>"> </script>