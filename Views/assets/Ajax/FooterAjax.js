fetchfooterdata();
function fetchfooterdata(){
    $.ajax({
        method: 'POST',
        url: "Ajax/footer.php",
        success: function(response) {
            $("#tbodyfooter").html(response);
        }
    });
}

function insertfooter(){
  var city = $('#city').val();
  var street = $('#street').val();
  var zipcode = $('#zipcode').val();
  var phone = $('#phone').val();
  var fax = $('#fax').val();
  var mondayfriday = $('#mondayfriday').val();
  var saturday = $('#saturday').val();
  if (city != "" && street != "" && phone != "") {

    $.ajax({
      url: "Ajax/footer.php",
      type: "POST",
      data: {
      city: city,
      street: street,
      zipcode: zipcode,
      phone: phone,
      fax: fax,
      mondayfriday: mondayfriday,
      saturday: saturday,
      },   
      cache: false,
      dataType:"text",

      success: function(results){
        $("#insertedfooter-success").removeClass("d-none");
        $("#updatedfooter-success").addClass("d-none");
        $("#deletedfooter-success").addClass("d-none");
        $("#emptyfieldsfooter-error").addClass("d-none");
                  window.location.href="footer-info";
        var city = $('#city').val("");
        var street = $('#street').val("");
        var zipcode = $('#zipcode').val("");
        var phone = $('#phone').val("");
        var fax = $('#fax').val("");
        var mondayfriday = $('#mondayfriday').val("");
        var saturday = $('#saturday').val("");
        setTimeout(function(){location.reload();},1000);

      }

    });
  }else{
        $("#insertedfooter-success").addClass("d-none");
        $("#updatedfooter-success").addClass("d-none");
        $("#deletedfooter-success").addClass("d-none");
        $("#emptyfieldsfooter-error").removeClass("d-none");
  }
}


function deletefooter(idfooter){
  var idfooter = idfooter;
  $.ajax({
    type: 'GET',
    url: 'Ajax/footer.php',
    data: {
        'idfooter': idfooter
    },
    success: function(results) {     
        $("#insertedfooter-success").addClass("d-none");
        $("#deletedfooter-success").removeClass("d-none");
        $("#updatedfooter-success").addClass("d-none");
        $("#emptyfieldsfooter-error").addClass("d-none");
      setTimeout(function(){location.reload();},1000);
    }
  });
}


function editfooterid(footereditid){  
  var footereditid = footereditid;
    data = new FormData();

    data.append("footereditid",footereditid);
    $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(results) {
            $("#editid").val(results["idfooter"]);
            $("#editcity").val(results["city"]);
            $("#editstreet").val(results["streetname"]);
            $("#editzipcode").val(results["zipcode"]);
            $("#editphone").val(results["phone"]);
            $("#editfax").val(results["fax"]);
            $("#editmondayfriday").val(results["monday_friday"]);
            $("#editsaturday").val(results["saturday"]);
        }
    });
}

function updatefooterwithid(){

    var editid = $('#editid').val();
    var editcity = $('#editcity').val();
    var editstreet = $('#editstreet').val();
    var editzipcode = $('#editzipcode').val();
    var editphone = $('#editphone').val();
    var editfax = $('#editfax').val();
    var editmondayfriday = $('#editmondayfriday').val();
    var editsaturday = $('#editsaturday').val();

    var form_data = new FormData();    
    form_data.append('editid'           ,   editid);
    form_data.append('editcity'         ,   editcity);
    form_data.append('editstreet'       ,   editstreet);
    form_data.append('editzipcode'      ,   editzipcode);     
    form_data.append('editphone'        ,   editphone);   
    form_data.append('editfax'          ,   editfax);   
    form_data.append('editmondayfriday' ,   editmondayfriday);   
    form_data.append('editsaturday'     ,   editsaturday);   

 if (city != "" && street != "" ) {
        $.ajax({
            url: "Ajax/footer.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache:false,
            dataType: "text",
            success: function(results) {
            $("#insertedfooter-success").addClass("d-none");
            $("#deletedfooter-success").addClass("d-none");
            $("#updatedfooter-success").removeClass("d-none");
            $("#emptyfieldsfooter-error").addClass("d-none");
              $('#footermodal').modal('hide');
              fetchfooterdata();
            }
        });
    }else{
            $("#insertedfooter-success").addClass("d-none");
            $("#deletedfooter-success").addClass("d-none");
            $("#updatedfooter-success").addClass("d-none");
            $("#emptyfieldsfooter-error").removeClass("d-none");
    }
}

function socialmedias(){
    var facebook = $('#facebook').val();
    var twitter = $('#twitter').val();
    var instagram = $('#instagram').val(); 
    var form_data = new FormData();      
    form_data.append('facebook', facebook);
    form_data.append('twitter',twitter);
    form_data.append('instagram', instagram);       
 if (facebook != "") {
        $.ajax({
            url: "Ajax/footer.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache:false,
            dataType: "text",
            success: function(results) {
                     
                   alert("Update ! - SocialMedias Updated Successfully .");


            }
        });
    }
}

