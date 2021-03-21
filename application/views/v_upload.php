<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Input</title>
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
  </head>
  <body>


          
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<nav id="colorlib-main-menu" role="navigation">
				<a href="<?php echo base_url('home');?>"><img src="<?php echo base_url();?>assets/images/sisi.png" ></a>
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section contact-section">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h2 class="h4 font-weight-bold">Upload Documentation Knowledge</h2>
	          </div>
	        </div>
	        <div class="row block-9">
	          <div class="col-md-6 order-md-last pr-md-5">

              <?php if ($this->session->flashdata('error')) {?>
                  <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('error');?>
                </div>
              <?php }?>
              
               <?php
                echo form_open_multipart('upload/do_upload');
                ?>

	            <form action="<?php echo base_url('upload/do_upload')?>" method="post">

	              <div class="form-group">
	                <input type="text" class="form-control" placeholder="Title" name="title" required="">
	              </div>
                     
                      <div class="form-group">
                        <select class="form-control" id = "list_id_categories" name="list_id_categories">
                           <option selected="selected" value="0">pilih categories</option>
                          <?php
                            foreach($categories as $ct){
                              ?>
                          
                                <option value = "<?php echo $ct['id_categories_case']?>"><?php echo $ct['name_categories']?></option>
                          <?php
                              }
                          ?>                         
                       </select>

                       <a href="" data-toggle="modal" data-target="#exampleModalCenter">*Add Categories</a>
                    </div>                    
                
	              <div class="form-group">
	               
                   <textarea name="description" id="" cols="30" rows="7" class="form-control" placeholder="Description" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>Upload file .pdf , .mp4 dan .txt</label>
                  <input type="file" name="file" class="form-control" required="">
                  
                </div>
                <div class="form-group">
                	<p><button class="btn btn-secondary btn-lg btn-block" type="submit">Submit</button></p>
				             </div>
	            </form>
	            <?php echo form_close(); ?>
	          </div>

	        </div>
	      </div>
	    </section>

	
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->


<!-- modal untuk tambah categories -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="home/tambah_categories" method="post">
                              <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Name Category" name="name_categories">
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Save changes</button>
                              </div>
                        </form>
                      </div>
  </div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
    
  </body>
</html>