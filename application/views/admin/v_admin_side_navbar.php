<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url();?>assets/admin/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/admin')?>">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url();?>assets/admin/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/admin')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

      <?php 
        $hitung=0;
      ?>
      <?php foreach($data_divisi as $a) 
        {
            $hitung++;
      ?>
            <li class="nav-item active">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap<?php echo $hitung?>"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="far fa-fw fa-window-maximize"></i>
                <span><?php echo $a['name_divisi']?></span>
              </a>
              <div id="collapseBootstrap<?php echo $hitung?>" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <?php
                    if($a['name_divisi'] != 'admin')
                    {
                  ?>
                  <a class="collapse-item" href="<?php echo base_url('admin/aksi_admin/tampil_employee')?>?name_divisi=<?php echo $a['name_divisi']?>">Data Employee</a>
                  <a class="collapse-item" href="<?php echo base_url('admin/aksi_admin/tampil_category')?>?name_divisi=<?php echo $a['name_divisi']?>">Data Category</a>
                  <a class="collapse-item" href="<?php echo base_url('admin/aksi_admin/tampil_case')?>?name_divisi=<?php echo $a['name_divisi']?>">Data Case</a>
                  <a class="collapse-item" href="<?php echo base_url('admin/aksi_admin/tampil_comment')?>?name_divisi=<?php echo $a['name_divisi']?>">Data Comment</a>
                  <?php
                    }
                  ?>
                  <?php
                    if($a['name_divisi'] == 'admin')
                    {
                  ?>
                        <a class="collapse-item" href="<?php echo base_url('admin/aksi_admin/tampil_log_admin_activity')?>?name_divisi=<?php echo $a['name_divisi']?>">Data Log Admin</a>
                  <?php
                    }
                    else
                    {
                  ?>
                        <a class="collapse-item" href="<?php echo base_url('admin/aksi_admin/tampil_log')?>?name_divisi=<?php echo $a['name_divisi']?>">Data Log</a>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </li>
      <?php
        }
      ?>
      
 
     </ul>
    <!-- Sidebar -->

    <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/ruang-admin.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/demo/chart-area-demo.js"></script>  
</body>