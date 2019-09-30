
fetchall();  
    
$('#savegallery').on('click', function() {
    var file_data = $('#file').prop('files')[0];   
    var client = $('#client').val();   
    var file = $('#file').val();   
    var description = $('#description').val();   
    var status = $('#status').val();   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('client', client);     
    form_data.append('description', description);   
    form_data.append('status', status);     

if (client != "" && description != "" && status != "") {     
    $.ajax({
        url: 'Ajax/gallery.php', 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data, 
        client: client,   
        description: description,    
        status: status,                     
        type: 'post',
        success: function(results){
          $("#inserted-Gallery-success").removeClass("d-none");
          $("#Error-Gallery-success").addClass("d-none");
          $("#client").val('');
          $("#description").val('');
          $("#status").val('');

        }
     });
  }else{
      $("#Error-Gallery-success").removeClass("d-none");
      $("#inserted-Gallery-success").addClass("d-none");
  }
});
    var client = $('#client').val();   
    var file = $('#file').val();   
    var description = $('#description').val();   
   function fetchall() {
    $.ajax({
        method: 'POST',
        url: "Ajax/gallery.php",
        success: function(results) {
            $("#tbodygallery").html(results);
        }
    });
}


function DeleteGallery(DeleteID) {
    var idgallery = DeleteID;
    $.ajax({
        type: 'GET',
        url: 'Ajax/gallery.php',
        data: {
            'idgallery': idgallery
        },
        success: function(results) {     
            $("#deleteclass").removeClass("d-none");
            $("#updategallery").addClass("d-none");
            fetchall(); 
        }
    });

   function fetch(){
    $.ajax({
        method: 'POST',
        url: "Ajax/gallery.php",
        success: function(results) {
            $("#tbodygallery").html(results);
        }
    });
}
}

//Change Image in Real Time after Choose File clicked
 var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  }  
function editgallery(editgallery){
   var editgallery = editgallery;
    data = new FormData();
    data.append("editgallery", editgallery);
    $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"text",
        success: function(results) {
              $("#editgallery").val(results['idgallery']);        
              $("#editclient").val(results['client']);
              $("#editdescription").val(results['description']);
              $("#editstatus").val(results['status']);
              $('#file').val(results['image']);
              if(results["image"] !=""){
            $(".foto").attr('src',"Views/assets/GalleryImages/"+results["image"]);
  
                }else{
                    $(".is").attr('src',"Views/assets/GalleryImages/"+results["image"]);
                }
        }
    });
} 


