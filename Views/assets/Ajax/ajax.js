fetch();


$("#savee").click(function() {

    var quote = $('#banner-quote').val();
    var cvalue = $('#value-quote').val();
    var description = $('#description').val();
 
    if (quote != "" && cvalue != "" && description != "") {

        $.ajax({
            url: "Ajax/home.php",
            type: "POST",
            data: {
                quote: quote,
                cvalue: cvalue,
                description: description,
            },   

             cache: false,

        dataType:"text",
            success: function(results) {
                console.log(results);
                $("#inserted-success").removeClass("d-none");
                $("#emptyfields-error").addClass("d-none");
                $("#deleted-success").addClass("d-none");
                $("#updated-success").addClass("d-none");
                $("#banner-quote").val('');
                $("#value-quote").val('');
                $("#description").val('');
                fetch();
            }
        });
    } else {

        $("#emptyfields-error").removeClass("d-none");
        $("#inserted-success").addClass("d-none");
        $("#deleted-success").addClass("d-none");
        $("#updated-success").addClass("d-none");
    }
});

function fetch() {
    $.ajax({
        method: 'POST',
        url: "Ajax/home.php",
        success: function(response) {
            $("#tbody").html(response);

        }
    });
}

function DeleteQuote(DeleteID) {
    var idhome = DeleteID;
    $.ajax({
        type: 'GET',
        url: 'Ajax/home.php',
        data: {
            'idhome': idhome
        },
        success: function(data) {
            $("#deleted-success").removeClass("d-none");
            $("#emptyfields-error").addClass("d-none");
            $("#inserted-success").addClass("d-none");
            $("#updated-success").addClass("d-none");
            fetch();
        }
    });

}
function EditButton(editid) {
    var id = editid;
    data = new FormData();
    data.append("editid", id);
    $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(results) {

            $("#editID").val(results["idhome"]);
            $("#editbanner-quote").val(results["quote"]);
            $("#editvalue-quote").val(results["cvalue"]);
            $("#editdescription").val(results["description"]);
        }
    });
}

$("#update").click(function() {
    var updateid = $('#editID').val();
    var editquote = $('#editbanner-quote').val();
    var editcvalue = $('#editvalue-quote').val();
    var editdescription = $('#editdescription').val();

    if (editquote != "" && editcvalue != "" && editdescription != "") {
        $.ajax({
            url: "Ajax/home.php",
            type: "POST",
            data: {
                updateid: updateid,
                editquote: editquote,
                editcvalue: editcvalue,
                editdescription: editdescription,
            },
            cache: false,
            dataType: "text",
            success: function(results) {
                $("#updated-success").removeClass("d-none");
                $("#inserted-success").addClass("d-none");
                $("#emptyfields-error").addClass("d-none");
                $("#deleted-success").addClass("d-none");
                $('#myModal').modal('hide');
            fetch();
            }
        });
    }
});
  function edithomeclients(){
    var clientdescription = $('#clientdescription').val();
    var form_data = new FormData();      
    form_data.append('clientdescription', clientdescription);     
 if (clientdescription != "") {
        $.ajax({
            url: "Ajax/home.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache:false,
            dataType: "text",
            success: function(results) {
            alert("CLIENT SECTION   -  Description Updated Successfully .");
            }
        });
    }
  }




