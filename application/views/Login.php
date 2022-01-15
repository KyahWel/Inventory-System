    <link rel="stylesheet" href=<?php echo base_url("assets/css/Login.css")?>>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-3 col-md-2"> </div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN LOGIN
                </div>

                <div class="col-lg-12 login-form">
                <?php if($this->session->flashdata('loginerror')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= $this->session->flashdata('loginerror'); ?>
                        <button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('login')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= $this->session->flashdata('login'); ?>
                        <button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                    <div class="col-lg-12 login-form">
                        <form action="<?php echo site_url('Login/admin_login') ?>" method="POST">
                            <div class="form-group px-3">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group px-3">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-lg-12 login-btm login-button text-center loginbttm">
                                <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>


