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

<div id="colorlib-main">
			<div class="hero-wrap js-fullheight" style="" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
        <div class="container">
        <div class="row">
          <div class="col-1"> 
          </div>
                  <div class="col-10"> 
                     <br>
                     <br>
                      <h1 class="mb-3 font-weight-bold"><?php echo $case['data'][0]['title_case']?></h1>
                      <h6>Author By <?php echo $case['data'][0]['username']?> </h6>
                      <h4><?php echo $case['data'][0]['description']?></h4>
                      <?php
                       $name_divisi = $this->session->userdata('divisi')    
                      ?>
                      <a href="<?php echo base_url();?>/uploads/<?php echo $name_divisi ?>/<?php echo $case['data'][0]['file'] ?>" target="_blank">Preview</a>
                    </div>
          </div>
        </div>
				<div class="js-fullheight d-flex justify-content-center">
					<div class="col-md-12">
						<div class="desc">
            <br>
            <br>
            <br>
            <br>
              <div class="js-fullheight d-flex justify-content-center">
                <?php
                $str = $case['data'][0]['file'];
                  $ambil_tipe_file = explode('.',$str ,2);
                 // echo $ambil_tipe_file[1];
                  if($ambil_tipe_file[1]=='mp4'){
                    ?>
                      <?php
                       $name_divisi = $this->session->userdata('divisi')   
                      ?>
                          <embed width="800" height="470" src="<?php echo base_url();?>/uploads/<?php echo $name_divisi ?>/<?php echo $case['data'][0]['file'] ?>">  </embed>   
                    <?php
                  }elseif($ambil_tipe_file[1]=='doc'||$ambil_tipe_file[1]=='docx'){
                      ?>
                      <h2>Tekan preview untuk download</h2>
                      <?php
                  }else{
                    ?>
                      <?php
                      $name_divisi = $this->session->userdata('divisi') 
                      ?>
                        <embed width="800" height="800" src="<?php echo base_url();?>/uploads/<?php echo $name_divisi ?>/<?php echo $case['data'][0]['file'] ?>">  </embed>  
                    <?php
                  }
                 ?>                 
              </div>
						</div>
					</div>
				</div>
			</div>

<div id="colorlib-page">
      <section class="ftco-section contact-section">
        <div class="container">
               <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                </div>
              </div>
               <br>
               <br>
               <br> 
               <br> 
               <br> 
               <br> 
               <br>     
               <br>     
               <br>     
               <div class="comment-form-wrap pt-5">
                  <h3 class="mb-5">Leave a comment</h3>
                     <form action="<?php echo base_url('comment/tambah_comment')?>?id_case=<?php echo $case['data'][0]['id_case']?>" method="post" class="p-3 p-md-5 bg-light">
                    <div class="form-group">
                      <label for="name">Name *</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('username') ?>" id="name" disabled>
                    </div>
                    <div class="form-group">
                      <label for="comment">Message</label>
                      <textarea name="comment" id="message" cols="30" rows="10" class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                    <a href="<?php echo base_url('comment/tambah_comment')?>?id_case=<?php echo $case['data'][0]['id_case']?>"><input type="submit" value="Post Comments" class="btn btn-primary py-3 px-5"></a>
                    </div>
                  </form>
                </div>
                  <?php $hitung=0 ?>                 
                  <div class="pt-5 mt-5">
                  <?php foreach($comment as $l){?>                
                <?php
                  $hitung++;
                 }
                  ?>  
                  <!-- tambah enter space -->
                  <?php
                  if($ambil_tipe_file[1]!='mp4'){
                    ?>
                    <?php
                  }
                  ?>
                  <h3 class="mb-5 font-weight-bold">
                    <?php  echo $hitung ?> Comments</h3>
                 <ul class="comment-list">
                  <li class="comment">
                    <div class="comment-body">
                        <?php foreach($comment as $a){?>
                       <div class="vcard bio"> 
                   <img src="<?php echo base_url();?>assets/images/person11.png">
                    </div>
                      <h3><?php echo $a['username']?></h3>
                      <p><?php echo $a['comment']?></p>
                      <p>___________________________________________________________________________</p>
                        <?php } ?>  

                        <br>
                        <br>
                    </div>
                  </li>
                </ul>
                <!-- END comment-list -->
              </div>
        </div>
      </section>
</div>
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
    