<title>Contact - Dashboard</title>
<main>
   <div class="container-fluid">
      <div class="row page-title">
         <h3>Contact us</h3>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-12 table-section p-0">
               <div class="table-responsive ">
                  <table class="table table-light table-striped mt-3">
                  <div class="alert alert-success alert-dismissible d-none" id="delete-contact-messages-success">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span> <strong>Success! </strong> Deleted Successfully </span>
                  </div> 
                     <thead>
                        <tr>
                           <th>Full Name</th>
                           <th>Email</th>
                           <th>Description</th>
                           <th>Options</th>
                        </tr>
                     </thead>
                     <tbody id="showcontactmessages">
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<script>
   fetchContactMessages();
   function fetchContactMessages(){
    $.ajax({
        method: 'POST',
        url: "Ajax/contact.php",
        dataType:"text",
        success: function(results) {
        $("#showcontactmessages").html(results);

        }
    });
}

function Deleteusermessage(deletemessage) {
    var deletemessage = deletemessage;

  $.ajax({
        type: 'GET',
        url: 'Ajax/contact.php',
        data: {
            'deletemessage': deletemessage
        },
        success: function(results) { 
         $("#delete-contact-messages-success").removeClass('d-none');
            fetchContactMessages();
        }
    });

}
</script>