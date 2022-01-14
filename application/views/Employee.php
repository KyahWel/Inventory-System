<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href=<?php echo base_url("assets/css/Employee.css")?>>
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
                <div class="col-lg-12 login-title">
                    EMPLOYEE ATTENDANCE
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="Admin" method="POST">
                            <div class="form-group text-center">            
                                <input type="text" class="form-control">
                                <label class="form-control-label">ENTER EMPLOYEE ID NUMBER</label>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                            </div>
                            <div class="col-12 login-btm login-button">
                                <button type="submit" class="btn col-12 btn-outline-primary">TIME IN</button>
                            </div>
                            <div class="col-12 login-btm login-button">
                                <button type="submit" class="btn col-12 btn-outline-primary">TIME OUT</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url("assets/js/Employee.js")?>"></script>
</body>
</html>

