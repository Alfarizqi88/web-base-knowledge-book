<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url();?>assets/admin/img/logo/logosisi.png" rel="icon">
  <title>Administrator</title>
  <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <?php foreach($divisi as $ct)            
                        { ?>
            <h1 class="h3 mb-0 text-gray-800">DataTables Case <?php echo $ct['name_divisi']?> </h1>
             <?php
                        }
                      ?>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Number</th>
                        <th>ID Case</th>
                        <th>Divisi</th>
                        <th>Title Case</th>
                        <th>Username</th>
                        <th>Category</th>                        
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!-- <tfoot>
                    <tr>
                        <th>ID Case</th>
                        <th>Category</th>
                        <th>Username</th>
                        <th>Title Case</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                      </tr>
                    </tfoot> -->
                    <tbody>
                      <?php
                        $number=0;
                      ?>
                      <?php foreach($data as $a)            
                        {
                            $number++;
                          ?>
                            <tr>
                              <td><?php echo $number ?></td>
                              <td><?php echo $a['id_case']?></td>
                              <td><?php echo $a['name_divisi']?></td>
                              <td><?php echo $a['title_case']?></td>
                              <td><?php echo $a['username']?></td>
                              <td><?php echo $a['name_categories']?></td>                              
                              <td><?php echo $a['description']?></td>
                              <td><?php echo $a['file']?></td>
                              <td>
                                  <a href="<?php echo base_url('admin/aksi_admin/hapus_data_case')?>?id_case=<?php echo $a['id_case']?>&name_divisi=<?php echo $a['name_divisi'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    </body>

  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>