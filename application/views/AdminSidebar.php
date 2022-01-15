
    <link href=<?php echo base_url("assets/css/sidebar.css")?> rel="stylesheet">
  
  </head>
    
  <body id ="body-pd">
  
    <div class="l-navbar side" id="nav-bar">
      
        <nav class="nav">
            <div> 
              <div class="nav_logo"> <i class='fa fa-briefcase nav_logo-icon'></i> <span class="nav_logo-name">Prime Laminations Inc.</span> </div>
             
                <div class="d-flex align-items-center flex-column">
                    <div class="flex-row pb-3">
                      <img src="https://iconarchive.com/download/i89153/icons8/ios7/Users-Administrator.ico" alt="" width="100" height="100" class="rounded-circle me-2 border border-white">
                    </div>
                  <div class="dropdown flex-row">
                    <a href="#" class="align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <strong>[Admin] <?= $this->session->userdata('auth_user')['firstname']?></strong>
                    </a>
                      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          
                        <li><a class="dropdown-item" href="<?php echo base_url('Admin/Profile'); ?>">Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Admin/ChangePassword'); ?>">Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Logout'); ?>">Sign out</a></li>
                      </ul>
                   
                </div>
            </div>
            
              <div class="nav_logo"></div>
              <div class="nav_list"> 
                <a href="<?php echo base_url('Admin/Dashboard'); ?>" class="nav_link"> <i class='fa fa-tachometer-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="<?php echo base_url('Admin/Admin-List'); ?>" class="nav_link"> <i class='fa fa-user nav_icon'></i> <span class="nav_name">Admin</span> </a> 
                <a href="<?php echo base_url('Admin/Employee-List'); ?>" class="nav_link"> <i class='fa fa-address-card nav_icon'></i> <span class="nav_name">Employees</span></a>
                <a href="<?php echo base_url('Admin/Event-Log'); ?>" class="nav_link"> <i class='fa fa-clock nav_icon'></i> <span class="nav_name">Event Logs</span> </a> 
                <a href="<?php echo base_url('Admin/Payroll'); ?>" class="nav_link"> <i class='fa fa-wallet nav_icon'></i> <span class="nav_name">Payroll</span> </a> 
              </div>
            </div> 
            
        </nav>
    </div> 

  <script type="text/javascript" src="<?php echo base_url("assets/js/sidebar.js")?>"></script>
  
    
