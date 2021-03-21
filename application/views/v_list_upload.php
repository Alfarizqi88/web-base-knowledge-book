<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logosisi.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logosisi.png">



      
    <div id="colorlib-main">
      <section class="ftco-section contact-section">

        <form method="post" href="<?php echo base_url('home/ambil_list');?>">
         <input class="form-control-lg" type="text" placeholder="Search by Title" name="search">
    </form>

         <table class="table table-striped">
          <thead class="">
            <tr class="">
              <th scope="col">Nomor</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">File</th>
              <th scope="col">Categories</th>
           <th scope="col"><center> Handle</center> </th>
            </tr>
          </thead>
          <tbody>
            <?php $nomer=1; ?>
            <?php foreach($ambil_list as $a)            
            {?>
              <tr>              
                <th scope="row"><?php echo $nomer?></th>
                <td><?php echo $a['title_case']?></td>
                <td><?php echo $a['description']?></td>
                <td><?php echo $a['file']?></td>
                <td><?php echo $a['name_categories']?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="<?php echo base_url('home/delete_upload')?>?id_case=<?php echo $a['id_case']?>" type="button" class="btn btn-danger">Delete</a>
                      <a href="<?php echo base_url('home/edit_upload')?>?id_case=<?php echo $a['id_case']?>" type="button" class="btn btn-info">Edit</a
                    </div>
                </td>
              </tr>
          <?php
            $nomer++;          
           } ?>
            
          </tbody>
        </table>

     </section>
    </div>
      
			
    <footer class="ftco-bg-dark ">
      <div class="container px-md-5">
       
        <div class="row">
          <div class="col-md-12">

          
          </div>
        </div>
      </div>
    </footer>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
   <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10000" stroke="#F96D00"/></svg></div>
  
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/aos.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url();?>assets/js/google-map.js"></script>
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
    