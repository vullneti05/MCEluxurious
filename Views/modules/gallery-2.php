<title>Gallery - MCE</title>
<?php  include("Views/includes/mainheader.php");?>
<?php
   $gallerybackground = new BackgroundsModel();
   foreach ( $gallerybackground->gallerybgfetch() as $value) {

?>
<div class="row hero-image hero-img-home mr-0"
   style=" background-image: linear-gradient(to bottom, #0000009a, #000000fb), url(' Views/assets/GalleryImages/<?php echo $value['image'] ?>');">
   <?php } ?>
   <div class="container">
      <div class="hero-content row justify-content-center">
         <h1 class="text-white">GALLERY</h1>
      </div>
   </div>
</div>
<main>
   <section class="section gallery-section">
      <div class="container">
         <div class="row p-y-50">
            <?php 
               $results = new GalleryModel();
                  foreach($results->FetchAll() as $res){
            ?>
            <div class="col-6 col-md-4 img-box" data-toggle="modal" data-target=".gallery-slider">
               <img src="Views/assets/GalleryImages/<?php echo $res['image']?>" alt="Gallery" class="img-fluid" onclick="fetch(<?php echo $res['idgallery']?>)">
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
</main>
<!-- Gallery modal -->
<div class="modal fade gallery-slider" tabindex="-1" role="dialog" aria-hidden-true>
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
<script>
 

function fetch(id1) {
    $.ajax({
        method: 'POST',
        url: "te1",
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