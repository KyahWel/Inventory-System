<?php $this->load->view("AdminSidebar") ?>
    <title>Eventlog</title>
    <link href="<?php echo base_url('assets/css/event.css'); ?>" rel="stylesheet" type="text/css">
  </head>

  <body>
 <div class="container">
    <?php if($this->session->flashdata('logout')) : ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= $this->session->flashdata('logout'); ?>
            <button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>  
    <?php if($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>  
 </div>
 <div class="container col-9">
    <h3 class="fw-bold">Events Log</h3> <br>
    <!--Event Table-->
    <div class="col-12 align-self-center" id="EventTable">
        <div class="table-wrapper">   
            <div class="table-title">
                <div class="row">
                    <div class="col">
                        <h2 class="text-center text-uppercase">Events Log</h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">  
                <table class="table table-default align-middle table-borderless table-hover" id="table-body">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>User</th>                               
                            <th>Action/Log</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/17/2022</td>
                            <td>11:45:12 AM</td>
                            <td>admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 

 
    
