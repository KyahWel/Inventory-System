
    <link rel="stylesheet" href=<?php echo base_url("assets/css/Employee.css")?>>
    <title>Employee</title>
</head>

<body>
    <div class="container">
        <div class="text-center col timecheck">
            <div class="row-3">
                <span id="day"></span>    
                <span id="date"></span>
            </div> 
            <div class="row-3">
                <span id="time"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-clock" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">EMPLOYEE ATTENDANCE</div>

                <div class="col-lg-12 login-form px-4">
                    <div class="col-lg-12 login-form">
                        <div class="form-group text-center">            
                            <input type="text" class="form-control">
                            <label class="form-control-label">ENTER EMPLOYEE ID NUMBER</label>
                        </div>
                        <div class="col-12 login-btm login-button">
                            <button type="submit" class="btn col-12 btn-outline-primary">TIME IN</button>
                        </div>
                        <div class="col-12 login-btm login-button">
                            <button type="submit" class="btn col-12 btn-outline-primary">TIME OUT</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url("assets/js/Employee.js")?>"></script>


