 fetchAbout();


$('#InsertAbout').on('click', function() {
      var title = $("#title").val();
      var description = $("#description").val();
      var files_data = $('#aboutfile').prop('files')[0];   
      var file = $('#aboutfile').val();   
      var form_about = new FormData();       

         form_about.append('title', title);
         form_about.append('description', description);     
         form_about.append('aboutfile', files_data);   

if (title != "" && description != "" ) {     
    $.ajax({
        url: 'Ajax/about.php', 
        cache: false,
        contentType: false,
        processData: false,
        data: form_about, 
        title: title,   
        description: description,     
        dataType:"text",                  
        type: 'post',
        success: function(results){
          console.log(results);
          $("#title").val("");
          $("#description").val("");
          $("#insertabout").removeClass("d-none");
          $("#updateabout").addClass("d-none");
          $("#deleteabout").addClass("d-none");
          $("#errorabout").addClass("d-none");
          fetchAbout();
        }
     });
          

  }else{
          $("#insertabout").addClass("d-none");
          $("#updateabout").addClass("d-none");
          $("#deleteabout").addClass("d-none");
          $("#errorabout").removeClass("d-none");
  }
});

function DeleteAbout(DeleteAboutID) {
    var idaboutus = DeleteAboutID;
    $.ajax({
        type: 'GET',
        url: 'Ajax/about.php',
        data: {
            'idaboutus': idaboutus
        },
        success: function(results) {     
          $("#insertabout").addClass("d-none");
          $("#deleteabout").removeClass("d-none");
          $("#updateabout").addClass("d-none");
          $("#errorabout").addClass("d-none");
        fetchAbout();
        }
    });
}
   function fetchAbout(){
    $.ajax({
        method: 'POST',
        url: "Ajax/about.php",
        success: function(results) {
            $("#tbodyabout").html(results);
        }
    });
}

function Editabout(editaboutid) {
    var idabout = editaboutid;

    data = new FormData();
    data.append("editaboutid", idabout);
    $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(results) {
        
            $("#editaboutid").val(results["idaboutus"]);
            $("#edittitle").val(results["title"]);
            $("#editaboutdescription").val(results["description"]);
            if(results["image"] !=""){
              $(".foto").attr('src',"Views/assets/GalleryImages/"+results["image"]);
            }else{
              $(".is").attr('src',"Views/assets/GalleryImages/"+results["image"]);
            }
        }
    });
}


// Change Image in Real Time after Choose File clicked
 var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  }  




function updateabout(){

    var editaboutid = $('#editaboutid').val();
    var edittitle = $('#edittitle').val();
    var editdescription = $('#editaboutdescription').val(); 
    var chose = $("#chose").val();
    var files = $('#file')[0].files[0];
    var form_data = new FormData();      

    form_data.append('file', files);
    form_data.append('editaboutid', editaboutid);
    form_data.append('file',files);
    form_data.append('edittitle', edittitle);     
    form_data.append('editdescription', editdescription);   

 if (edittitle != "" && editdescription != "" ) {
        $.ajax({
            url: "Ajax/about.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache:false,
            dataType: "text",
            success: function(results) {
              console.log(results);
          $("#insertabout").addClass("d-none");
          $("#deleteabout").addClass("d-none");
          $("#updateabout").removeClass("d-none");
          $("#errorabout").addClass("d-none");
            $('#myModal').modal('hide');
             fetchAbout();
            }
        });
    }else{
          $("#insertabout").addClass("d-none");
          $("#deleteabout").addClass("d-none");
          $("#updateabout").addClass("d-none");
          $("#errorabout").removeClass("d-none"); 

    }
}
function aboutquotechange(){
    var quotechange = $('#quotechange').val();
    var form_data = new FormData();      
    form_data.append('quotechange', quotechange);     
 if (quotechange != "") {
        $.ajax({
            url: "Ajax/about.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache:false,
            dataType: "text",
            success: function(results) {
            alert("Update ! - Quote Updated Successfully .");
            }
        });
    }
}