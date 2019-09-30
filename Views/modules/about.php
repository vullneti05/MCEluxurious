<title>About - MCE</title>
<?php  include("Views/includes/mainheader.php");?>
<?php
   $aboutbackground = new BackgroundsModel();
   foreach ( $aboutbackground->aboutbgfetch() as $value) {
?>
<div class="row hero-image hero-img-home mr-0"
   style=" background-image: linear-gradient(to bottom, #0000004b, #000000fa), url(' Views/assets/GalleryImages/<?php echo $value['image'] ?>');">
   <?php } ?>
   <div class="container">
      <div class="hero-content">
         <div class=" col-md-6 offset-md-3 text-center">
            <h1 class="text-white">ABOUT</h1>
         </div>
         <div class=" col-md-8 offset-md-2 hero-quote about-quote">
            <h4 class="text-primary">
               <?php
               $QuoteOverImage = new AboutModel();
                  $QuoteOverImage->fetchquote();
                  foreach($QuoteOverImage->fetchquote() as $quote){
                    echo $quote['aboutus_quote'];
                }
               ?>
            </h4>
         </div>
      </div>
   </div>
</div>
<main>
   <section class="section section-about">
      <div class="container">
         <div class="row about p-y-50">
            <div class="col-12 first-col py-4">
               <?php
               $AboutUs = new AboutModel();
                  $AboutUs->FetchAbout();
                  foreach( $AboutUs->FetchAbout() as $quote){
                    
               ?>
               <div class="row m-2">
                  <div class="col-12 col-md-6 img-box">
                     <img src="Views/assets/GalleryImages/<?php echo $quote['image']?>" alt="Gallery" class="img-fluid">
                  </div>
                  <div class="col-12 col-md-6">
                     <h3 class="text-primary mb-3"><?php  echo $quote['title'];?></h3>
                     <p><?php  echo $quote['description'];?></p>
                  </div>
               </div>
            </div>
            <?php 
               }
            ?>

         </div>
         <div class="row pb-5">
            <div class="col-12 order-12 text-center mt-3">
               <a href="gallery" class="btn ml-3 button-white">Our work</a>
               <a href="contact" class="btn ml-3 button-white">Contact us</a>
            </div>
         </div>
      </div>
   </section>
</main>
<?php  include("Views/includes/mainfooter.php");?>