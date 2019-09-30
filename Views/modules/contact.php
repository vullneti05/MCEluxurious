<title>Contact - MCE</title>
<?php  include("Views/includes/mainheader.php");?>
<?php
   $contactbackground = new BackgroundsModel();


   foreach ( $contactbackground->contactbgfetch() as $value) {

?>
<div class="row hero-image hero-img-home mr-0"
   style=" background-image: linear-gradient(to bottom, #0000004b, #000000fb), url(' Views/assets/GalleryImages/<?php echo $value['image'] ?>');">
   <?php } ?>
   <div class="container">
      <div class="hero-content">
         <div class=" col-md-6 offset-md-3 text-center">
            <h1 class="text-white">CONTACT</h1>
         </div>
         <div class=" col-md-8 offset-md-2 hero-quote about-quote">
            <h4 class="text-primary">We’re here to help and answer any question you might have. For more write us or
               contact at social medias
            </h4>
         </div>
      </div>
   </div>
</div>
<main>
   <section class="section">
      <div class="container">
         <div class="row p-y-50 contact-info">
            <div class="col-12 col-md-7">
               <div id="map"></div>
            </div>
            <div class="col-12 col-md-5">
               <form class="form-section">
                  <div class="alert alert-success alert-dismissible d-none" id="sendmessage">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <span><strong>*Success</strong> - Message successfully sent.</span>
                  </div>
                  <div class="alert alert-danger alert-dismissible d-none" id="sendmessageempty">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>ERROR! </strong> * All fields are required .
                  </div>
                  <input type="text" name="fullname" id="fullname" class="form-control" placeholder="First name:"
                     required>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Last name:" required>
                  <textarea name="contactmessage" id="contactmessage" class="form-control" placeholder="Message"
                     required></textarea>
                  <button type="button" name="contact" id="contactmessage" class="btn button-white"
                     onclick="messagecontact();">Send message</button>
               </form>
            </div>
         </div>
      </div>
   </section>
</main>
<?php  include("Views/includes/mainfooter.php");?>
<script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXaVWORgCzVXIlnwlaHBT_5h0T-7VMjLU&callback=initMap">
</script>
<script>
function messagecontact() {

   var fullname = $("#fullname").val();
   var email = $("#email").val();
   var contactmessage = $("#contactmessage").val();

   form_about = new FormData();
   form_about.append('fullname', fullname);
   form_about.append('email', email);
   form_about.append('contactmessage', contactmessage);

   if (fullname != "" && email != "" && contactmessage != "") {


      $.ajax({
         url: 'Ajax/contact.php',
         method: "post",
         cache: false,
         contentType: false,
         processData: false,
         data: form_about,
         dataType: "text",
         success: function(results) {
            $("#sendmessage").removeClass("d-none");
            $("#sendmessageempty").addClass("d-none");
            $("#fullname").val("");
            $("#email").val("");
            $("#contactmessage").val("");
         }

      })
   } else {
      $("#sendmessage").addClass("d-none");
      $("#sendmessageempty").removeClass("d-none");

   }
};
</script>
<script>
// Geolocation google 
function initMap() {
   // The location of Uluru
   var uluru = {
      lat: 26.219266,
      lng: -81.779913
   };
   // The map, centered at Uluru
   var map = new google.maps.Map(
      document.getElementById('map'), {
         zoom: 15,
         center: uluru
      });
   // The marker, positioned at Uluru
   var marker = new google.maps.Marker({
      position: uluru,
      map: map
   });
}
</script>