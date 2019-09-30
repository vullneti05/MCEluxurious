  <footer class="footer-section">
     <div class="top-footer">
        <div class="container ">
           <div class="row p-y-50">

              <?php 
                  $footer = new FooterModel();
                  $footer->Fetchfooterdata();
                  foreach($footer->Fetchfooterdata() as $footer){
               ?>
              <div class="col-6 col-md-3">
                 <div class="location-info">
                    <h5 class="city"><?php echo $footer['city'];?></h5>
                    <p><?php echo $footer['streetname'];?></p>
                    <p class="zip"><?php echo $footer['zipcode'];?></p>
                    <p class="phone">Phone: <span><?php echo $footer['phone'];?></span></p>
                    <p>Fax: <span><?php echo $footer['fax'];?></span></p>
                 </div>
                 <div class="working-days mt-2 mt-md-3">
                    <h6>Monday-Friday</h6>
                    <p><?php echo $footer['monday_friday'];?></p>
                    <h6>Saturday</h6>
                    <p><?php echo $footer['saturday'];?></p>
                    <h6>Sunday</h6>
                    <p>CLOSED</p>
                 </div>
              </div>
              <?php
              }
             ?>
              <div class=" col-6 col-md-3">
                 <div class="location-info">
                    <h5 class="city">ABOUT</h5>

                    <?php 
                  $about = new AboutModel();
                  $about->fetchquote();
                  foreach($about->fetchquote() as $about){
               ?>
                    <p><?php echo $about['aboutus_quote']?></p>
                    <?php }?>
                 </div>
              </div>
           </div>

        </div>
     </div>
     </div>
     <div class="bottom-footer">
        <div class="container">
           <div class="row ">
              <div class="col-6 col-md-5 ">
                 <h6>M.C.E LUXORIOUS ENTERPRICE INC.</h6>
              </div>
              <div class="col-6 col-md-5">
                 <p>Designed by: <a href="https://dribbble.com/armejndi" target="_blank"> Armejndi</a></p>
              </div>
              <div class="col-12 col-md-2 pl-0  social-medias">
                 <?php 
                $socialmedias = new FooterModel();
                $socialmedias->fetchsocialmedias();
                foreach($socialmedias->fetchsocialmedias()as $socialmedia){




                ?>
                 <a href="<?php echo $socialmedia['instagram']?>" target="_blank" class="text-dark ml-3"><i
                       class="fab fa-instagram"></i></a>
                 <a href="<?php echo $socialmedia['twitter']?>" target="_blank" class="text-dark ml-3"><i
                       class="fab fa-twitter"></i></a>
                 <a href="<?php echo $socialmedia['facebook']?>" target="_blank" class="text-dark ml-3"><i
                       class="fab fa-facebook"></i></a>
                 <?php }?>
              </div>
           </div>
        </div>
     </div>

  </footer>
  <!-- Jquery,bootstrap scripts -->
  <script src="Views/assets/js/popper.min.js"></script>
  <script src="Views/assets/js/bootstrap.min.js"></script>
  <script src="Views/assets/js/main.js"></script>
  <!-- Fontawesome -->
  <script src="Views/assets/js/all.min.js"></script>

  </body>

  </html>