FetchAdmins();

function FetchAdmins(){
    $.ajax({
        method: 'POST',
        url: "Ajax/admin.php",
        success: function(results) {
            $("#showadmins").html(results);
        }
    });
}
$('#InsertAdmin').on('click', function() {



   var email = $("#email").val();
   var password = $("#password").val();
     if(email !="" && password !=""){
        $.ajax({
            url: "Ajax/admin.php",
            type: "POST",
            data: {
                email: email,
                password: password,
            },
            dataType:"text",
            cache: false,
            success: function(results) {
                $("#updateadmin").addClass("d-none");
                $("#insertadmin").removeClass("d-none");
                $("#deleteadmin").addClass("d-none");
                $("#erroradmin").addClass("d-none");
                 $("#email").val("");
                $("#password").val("");
              FetchAdmins();
            }
        });
  }else{
                $("#updateadmin").addClass("d-none");
                $("#insertadmin").addClass("d-none");
                $("#deleteadmin").addClass("d-none");
                $("#erroradmin").removeClass("d-none");   
  }
})
function deleteadmin(idadmin){
  var idadmin = idadmin;
    $.ajax({
        method: 'GET',
             data: {
            'idadmin': idadmin
        },
        url: "Ajax/admin.php",
        success: function(results) {
                $("#updateadmin").addClass("d-none");
                $("#insertadmin").addClass("d-none");
                $("#deleteadmin").removeClass("d-none");
                $("#erroradmin").addClass("d-none");
             FetchAdmins();
        }
    });
}

function editadmin(editadminid) {
    var idadmin = editadminid;

    data = new FormData();
    data.append("editadminid", idadmin);
    $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(results) {
            $("#editadminid").val(results["idusers"]);
            $("#editemail").val(results["email"]);
            $("#editpassword").val(results["password"]);
        }
    });
}
function updateadmin(){
    var editadminid = $('#editadminid').val();
    var editemail = $('#editemail').val();
    var editpassword = $('#editpassword').val();

    if (editemail != "") {
        $.ajax({
            url: "Ajax/admin.php",
            type: "POST",
            data: {
                editadminid: editadminid,
                editemail: editemail,
                editpassword: editpassword,
            },
            cache: false,
            dataType: "text",
            success: function(results) {
            console.log(results);

                $("#updateadmin").removeClass("d-none");
                $("#insertadmin").addClass("d-none");
                $("#deleteadmin").addClass("d-none");
                $("#erroradmin").addClass("d-none");
                $('#adminmodal').modal('hide');
             FetchAdmins();
            }
        });
    }
}
function changetotext() {

  var myinput = document.getElementById("editpassword");
  if (myinput.type === "password") {
    myinput.type = "text";
  } else {
    myinput.type = "password";
  }
}