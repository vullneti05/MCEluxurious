<title>Backgrounds - Dashboard</title>
<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-5 col-lg-3 p-4">
            <form action="" method="POST" class="row justify-content-between">
               <div class="img-box">
                  <h5>Home</h5>
                  <?php
                    $homeresults = new BackgroundsModel();
                   foreach( $homeresults->homebgfetch() as $home){

                  ?>
                  <img src="Views/assets/GalleryImages/<?php echo $home['image']?>" alt="background-home"
                     class="img-fluid bg-image">
                  <?php }?>
               </div>
               <div class="custom-file mt-3 col-6 col-lg-4 col-md-5">
                  <input type="file" name="homefile" class="custom-file-input" id="homefile" required>
                  <label for="home" class="custom-file-label p-0" id="homefile"></label>
               </div>
               <div class="col-6 col-md-6 col-lg-5">
                  <button class="btn button-white mt-3" name="HomeBackground" id="HomeBackground"
                     type="button">Save</button></div>
            </form>
         </div>
         <div class="col-md-5 col-lg-3 p-4">
            <form action="" method="POST" class="row justify-content-between">
               <div class="img-box">
                  <h5>About</h5>
                  <?php
                    foreach( $homeresults->aboutbgfetch() as $about){
                  ?>

                  <img src="Views/assets/GalleryImages/<?php echo $about['image'] ?>" alt="background"
                     class="img-fluid bg-image">
                  <?php } ?>
               </div>
               <div class="custom-file mt-3 col-6 col-lg-4 col-md-5">
                  <input type="file" name="aboutfile" class="custom-file-input form-control" id="aboutfile" required>
                  <label for="about" class="custom-file-label col-form-label"></label>
               </div>
               <div class="col-6 col-md-6 col-lg-5">
                  <button class="btn button-white mt-3" name="AboutBackground" id="AboutBackground"
                     type="button">Save</button>
               </div>
            </form>
         </div>
         <div class="col-md-5 col-lg-3 p-4">
            <form action="" method="POST" class="row justify-content-between">
               <div class="img-box">
                  <h5>Gallery</h5>
                  <?php 
                    foreach( $homeresults->gallerybgfetch() as $gallery){
                ?>
                  <img src="Views/assets/GalleryImages/<?php echo $gallery['image']?>" alt="background"
                     class="img-fluid bg-image">
                  <?php } ?>
               </div>
               <div class="custom-file mt-3 col-6 col-lg-4 col-md-5">
                  <input type="file" name="galleryfile" class="custom-file-input form-control" id="galleryfile"
                     required>
                  <label for="galleryfile" class="custom-file-label col-form-label"></label>
               </div>
               <div class="col-6 col-md-6 col-lg-5">
                  <button class="btn button-white mt-3" name="GalleryBackground" id="GalleryBackground"
                     type="button">Save</button>
               </div>
            </form>
         </div>
         <div class="col-md-5 col-lg-3 p-4">
            <form action="" method="POST" class="row justify-content-between">
               <div class="img-box">
                  <h5>Contact</h5>
                  <?php 
                  foreach( $homeresults->contactbgfetch() as $contact){
                  ?>
                  <img src="Views/assets/GalleryImages/<?php echo $contact['image']?>" alt="background"
                     class="img-fluid bg-image" id="contact">
                  <?php }?>
               </div>
               <div class="custom-file mt-3 col-6 col-lg-4 col-md-5">
                  <input type="file" name="contactfile" class="custom-file-input form-control" id="contactfile"
                     required>
                  <label for="contactfile" class="custom-file-label col-form-label"></label>
               </div>
               <div class="col-6 col-md-6 col-lg-5">
                  <button class="btn button-white mt-3" name="ContactBackground" id="ContactBackground"
                     type="button">Save</button>
            </form>
         </div>
      </div>
   </div>
</main>

<script>
$('#HomeBackground').on('click', function() {
   var homefile = $('#homefile')[0].files[0];
   var form_data = new FormData();
   form_data.append('homefile', homefile);


   $.ajax({
      url: "Ajax/backgrounds.php",
      type: "POST",
      data: form_data,
      contentType: false,
      processData: false,
      cache: false,
      dataType: "text",
      success: function(results) {
         window.location = "background-images";
      }
   });

});


$('#AboutBackground').on('click', function() {

   var aboutfile = $('#aboutfile')[0].files[0];
   var form_data = new FormData();
   form_data.append('aboutfile', aboutfile);


   $.ajax({
      url: "Ajax/backgrounds.php",
      type: "POST",
      data: form_data,
      contentType: false,
      processData: false,
      cache: false,
      dataType: "text",
      success: function(results) {
         window.location = "background-images";
      }
   });

});



$('#GalleryBackground').on('click', function() {

   var galleryfile = $('#galleryfile')[0].files[0];
   var form_data = new FormData();
   form_data.append('galleryfile', galleryfile);


   $.ajax({
      url: "Ajax/backgrounds.php",
      type: "POST",
      data: form_data,
      contentType: false,
      processData: false,
      cache: false,
      dataType: "text",
      success: function(results) {
         window.location = "background-images";
      }
   });

});


$('#ContactBackground').on('click', function() {

   var contactfile = $('#contactfile')[0].files[0];
   var form_data = new FormData();
   form_data.append('contactfile', contactfile);


   $.ajax({
      url: "Ajax/backgrounds.php",
      type: "POST",
      data: form_data,
      contentType: false,
      processData: false,
      cache: false,
      dataType: "text",
      success: function(results) {
         window.location = "background-images";
      }
   });

});
</script>