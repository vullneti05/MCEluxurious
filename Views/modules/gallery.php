<title>Gallery - MCE</title>
<?php  include("Views/includes/mainheader.php");?>
<div class="row hero-image hero-img-gallery mr-0"
   style="background-image: linear-gradient(to bottom, #0000009a, #000000fa), url('Views/assets/images/hero-gallery.png');">
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
               $images = new GalleryModel();
               $images->FetchAll();
               $count = 1;
               foreach($images->FetchAll() as $image){


            ?>
              <div class="col-6 col-md-4 img-box" data-toggle="myModal" data-target=".gallery-slider_<?php echo $image['idgallery'];?>">
               <img src="Views/assets/GalleryImages/<?php echo $image['image'];?>" alt="Gallery" class="img-fluid"
                  onclick="openModal(<?php echo $image['idgallery'];?>);currentSlide(<?php echo $count = $count +1; ?>)">
            </div>
         
   
         <?php }?>         
         <div class="col-12 text-center mt-3">
               <button class="btn button-white ml-3" id="loadMore">Load more</button>
            </div>
         </div>
      </div>
   </section>
</main>

<!-- Gallery modal -->
<div class="modal fade gallery-slider" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-2">
         <div class="mySlides">
            <div class="row my-3">
               <div class="col-5 col-lg-7">
                  <img src="Views/assets/GalleryImages/<?php echo $image['image'];?>" alt="Gallery" class="img-fluid">
               </div>
               <div class="col-7 col-lg-5 description text-dark">
                  <table class="w-100">
                     <tr>
                        <td class="label">Client:</td>
                        <td>OTREKS</td>
                     </tr>
                     <tr>
                        <td class="label">Date:</td>
                        <td>25/07/2019</td>
                     </tr>
                  </table>
                  <p class="text-dark mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                     minima
                     soluta est ut
                     adipisci sed nobis minus? Natus, dolore alias eveniet iste, commodi sit qui velit totam
                     necessitatibus mollitia fugiat?</p>
               </div>
            </div>
         </div>


      </div>
   </div>
   <div class="text-center mt-4 mb-2 next-prevBtn">
      <button class="btn button-white" id="prevBtn" onclick="plusSlides(<?php echo $count = $count-1; ?>);">Previous</button>
      <button class="btn button-white" id="nextBtn" onclick="plusSlides(<?php echo $count = $count+1; ?>);">Next</button>
   </div>
</div>
<script>

</script>