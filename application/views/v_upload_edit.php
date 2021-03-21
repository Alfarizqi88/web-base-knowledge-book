<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Input</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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

               
                <?php foreach($case as $a) { ?>
              <form action="<?php echo base_url('home/do_edit_upload')?>?id_case=<?php echo $a['id_case']?>" method="post">
                
                <div class="form-group">
                  Title file
                  <input type="text" class="form-control" value="<?php echo $a['title_case']?>" name="title">
                </div>

                <div class="form-group">
                  Category
                  <br>
                    <select id = "list_id_categories" name="list_id_categories">
                            <option selected="selected" value="<?php echo $a['id_categories_case']?>"><?php echo $a['name_categories']?></option>
                              <!-- looping mengambil nilai caetgories -->
                        <?php
                          foreach($categories as $ct){?>
                        ?>
                            <?php
                              if($a['name_categories'] != $ct['name_categories'] )
                                {
                            ?>
                              <option value = "<?php echo $ct['id_categories_case']?>"><?php echo $ct['name_categories']?></option>
                        <?php
                                }
                            }
                        ?>                         
                     </select>
                </div>

                <div class="form-group">
                 Description file
                   <textarea name="description" id="" cols="30" rows="7" class="form-control" placeholder=""><?php echo $a['description']?></textarea>
                </div>
                <!-- <p>Tidak bisa mengedit file </p> -->


                 <div class="form-group">
                  <label>Upload file .pdf , .mp4 dan .txt</label>
                  <input type="file" name="file" class="form-control" required="">
                  
                </div>
                
              <?php }?>
                <div class="form-group">
                  <p><button class="btn btn-secondary btn-lg btn-block">Submit</button></p>
                     </div>
              </form>
             
            </div>

          </div>
        </div>
      </section>

  
    </div><!-- END COLORLIB-MAIN -->
  </div><!-- END COLORLIB-PAGE -->

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