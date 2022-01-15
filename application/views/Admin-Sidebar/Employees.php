<?php $this->load->view("AdminSidebar") ?>
    <title>Employees</title>
    <link href=<?php echo base_url("")?> rel="stylesheet">
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
    <h3>This is Employees Tab</h3> <br>
   
</div> 

 
    
