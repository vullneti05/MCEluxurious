<title>Home - MCE</title>
<?php  include("Views/includes/mainheader.php");?>
<?php
   $homebackground = new BackgroundsModel();
   foreach ( $homebackground->homebgfetch() as $value) {
?>
<div class="row hero-image hero-img-home mr-0"
   style=" background-image: linear-gradient(to bottom, #0000004b, #000000fa), url(' Views/assets/GalleryImages/<?php echo $value['image'] ?>');">
   <?php } ?>
   <div class="container">
      <div class="hero-content home-quote">
         <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4 text-center welcome-text">
            <?php
                    $results = new HomeModel();
                    $results->ShowQuotes();
                    foreach($results->ShowQuotes() as $home){
                                      
                ?>
            <h1 class="text-primary"><?php  echo $home['quote']?></h1>

         </div>
         <div class=" col-12 ml-2 offset-0 col-md-12 hero-quote">
            <h4 class="text-primary"><?php  echo $home['cvalue']?>
               <a href="about" class="btn ml-3 button-white">Learn more</a>
            </h4>
         </div>
      </div>
   </div>
</div>
<main>
   <section class="section">
      <div class="container">
         <div class="row p-y-50 justify-content-between">
            <div class="col-md-4 mb-4">
               <h2><?php  echo $home['description']?></h2>
            </div>
            <?php } ?>
            <hr class="vertical-hr">
            <div class="col-md-7 col-lg-7">
               <?php 
                     $Goals = new HomeModel();
                     $Goals->ShowGoal();
                     foreach($Goals->ShowGoal() as $goal){
                  ?>
               <div class="container">


                  <div class="row">
                     <span class="col-2 p-0"><label class="container-checkbox">
                           <input type="checkbox" checked="checked" disabled>
                           <span class="checkmark"></span>
                        </label></span>
                     <p class="col-10 pl-0"><?php echo $goal['goal'];?></p>
                  </div>
               </div>
               <?php }?>
            </div>
         </div><main>
   <section class="section gallery-section" >
      <div class="container" >
         <div class="row p-y-50">
            <?php 
               $results = new GalleryModel();
         
                  foreach($results->limited() as $key=>$res){
            ?>
            <div class="col-6 col-md-4 img-box modalPhoto"  data-toggle="modal" data-target=".gallery-slider"
             >
               <img src="Views/assets/GalleryImages/<?php echo $res['image']?>" alt="Gallery" class="img-fluid" onclick="fetch(<?php echo $res['idgallery']?>)">
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
</main>
<!-- Gallery modal -->
<div class="modal fade gallery-slider" tabindex="-1" role="dialog" aria-hidden-true >
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content p-2">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="">
            <div class="carousel-inner" id="tbody">
              
            </div>
         </div>
         <div class="text-center mt-4 mb-2 next-prevBtn">
            <button class="btn button-white" id="prevBtn" href="#carouselExampleIndicators" role="button"
               data-slide="prev">Previous</button>
            <button class="btn button-white" id="nextBtn" href="#carouselExampleIndicators" role="button"
               data-slide="next">Next</button>
         </div>
      </div>
   </div>

</div>


      </div>
      </div>
   </section>
   <section class="section clients">
      <div class="container">
         <div class="row p-y-50 justify-content-between">
            <div class="col-md-4">
               <h3 class="text-primary pb-3">CLIENTS</h3>
               <?php 
                     $clients = new HomeModel();
                     $clients->showhomeclientdescription();
                     foreach($clients->showhomeclientdescription() as $clientsdesc){
                        echo"<p>".$clientsdesc['clientshomedescription']."</p>";
                     }
                  ?>
            </div>
            <hr class="vertical-hr">
            <div class="col-md-7 col-lg-7">
               <div class="row clients testimonials">
                  <?php 
               $clientsimg = new HomeModel();
               $clients->ShowClientImages();
               foreach($clients->ShowClientImages() as $clientimage){
               ?>
                  <div class="col-6 col-md-4 p-md-1 img-box">
                     <img src="Views/assets/GalleryImages/<?php echo $clientimage['image']?> " alt="Gallery"
                        class="img-fluid">
                  </div>
                  <?php }?>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<script>
 

function fetch(id1) {
    $.ajax({
        method: 'POST',
        url: "te",
       data: {
            'id': id1
        }, 
        success: function(response) {
            $("#tbody").html(response);

        }
    });
}
</script>
<?php  include("Views/includes/mainfooter.php");?>