<title>Home - Dashboard</title>
<main>
   <div class="container-fluid">
      <div class="row page-title">
         <h3>Home</h3>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-lg-7 card">
               <div class="alert alert-success alert-dismissible d-none" id="inserted-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Inserted Successfully .
               </div>
               <div class="alert alert-info alert-dismissible d-none" id="updated-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Updated Successfully .
               </div>
               <div class="alert alert-success alert-dismissible  d-none" id="deleted-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Deleted Successfully .
               </div>
               <div class="alert alert-danger alert-dismissible d-none" id="emptyfields-error">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>ERROR! </strong> You Must fill all the fields.
               </div>
               <div class="col-12 table-section p-0 mt-3">
                  <div class="table-responsive ">
                     <form class="form-section">
                        <?php
                $results = new HomeModel();
                $results->ShowQuotes();
                foreach($results->ShowQuotes() as $home){
              ?>
                        <input type="text" class="form-control d-none" id="editthedash" name="editthedash"
                           value="<?php echo $home['idhome']?>">
                        <label for="banner-quote">Title over image</label>
                        <input type="text" class="form-control" id="editquote" required name="editquote"
                           value="<?php echo $home['quote']?>">

                        <label for="value-quote">Qoute over image</label>
                        <textarea name="editcvalue" id="editcvalue"
                           class="form-control"><?php echo $home['cvalue']?></textarea>


                        <label for="description">Company values title</label>
                        <textarea class="form-control" id="editdescription"
                           name="editdescription"><?php echo $home['description']?></textarea>
                        <?php }?>
                        <button type="button" name="updatedash" id="update" onclick="updateadsh()"
                           class="btn button-default">Update</button>
                     </form>
                     <br><br>
                  </div>
                  <form class="form-section" method="POST">
                     <h4>Company Goals</h4>
                     <label for="value-quote">Right side of company values</label>
                     <input type="text" class="form-control " placeholder="Insert company values" id="goal" name="goal"
                        oninput="checkInput();">
                     <input type="button" name="insertgoal" id="insertgoal" class="btn button-default" value="Insert"
                        disabled onclick="InsertGoal()">
                  </form>

                  <br> <!-- table -->
                  <div class=" table-section">
                     <div class="table-responsive">
                        <table class="table table-striped border" id="showclientimageshere">
                           <thead>
                              <tr>
                                 <th>Company values</th>
                                 <th>Options</th>
                              </tr>
                           </thead>
                           <tbody id="companygoals">
                              <?php 
                                  $goals = new HomeModel();
                                  foreach($goals->ShowGoal() as $goal){                            
                                ?>
                              <tr>

                                 <td class="tableImage"><?php echo $goal['goal']?></td>
                                 <td>
                                    <a href="#" class="btn button-options button-edit" data-toggle="modal"
                                       data-target="#goalmodal" onclick="editgoal(<?php echo $goal['homeid'] ?>)"><i
                                          class="fas fa-pen"></i></a>
                                    <button id="deletegoal" onclick="deletegoal(<?php echo $goal['homeid'] ?>)"
                                       class="btn button-danger button-options">
                                       <i class="far fa-trash-alt"></i>
                                    </button>


                                 </td>

                              </tr>
                              <?php }?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- The Modal -->
            <div class="modal" id="goalmodal">
               <!-- The Modal -->
               <div class="modal-dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Update Section</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body">
                        <form class="form-section">
                           <input type="text" name="editgoalid" class="form-control d-none" id="editgoalid" required>
                           <label>Goal</label>
                           <input type="text" name="editgoal" class="form-control" id="editgoal" required>

                        </form>
                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                        <input type="button" name="save" class="btn button-default" data-dismiss="modal" value="Close"
                           id="close">
                        <input type="button" name="Update" class="btn button-default" value="Update" id="updateabout"
                           onclick="updategoal()">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">

               <div class="card">
                  <h5>Clients section</h5>
                  <hr>
                  <label for="description">Description text</label>
                  <form class="form-section">
                     <?php
                    $results = new HomeModel();
                    $results->showhomeclientdescription();
                    foreach($results->showhomeclientdescription() as $clientdescriptionresult){
                        $ClientDescriptioninhome = $clientdescriptionresult['clientshomedescription'];
                    }
                    ?>
                     <textarea name="clientdescription" id="clientdescription"
                        class="form-control"><?php echo $ClientDescriptioninhome;?></textarea>
                     <button type="button" name="save2" class="btn button-default " onclick="edithomeclients()">Update
                     </button>
                  </form>
               </div>
               <div class="card">
                  <h6>Image for clients</h6>
                  <form class="form-section">
                     <div class="alert alert-warning alert-dismissible d-none" id="deletedclientimage-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Deleted! </strong> Deleted Successfully .
                     </div>
                     <div class="alert alert-success alert-dismissible  d-none" id="Insertedclientimage-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Insert! </strong> Inserted Successfully .
                     </div>
                     <div class="custom-file mt-3">
                        <input type="file" name="clientfiles" class="custom-file-input form-control" id="clientfiles"
                           required="required">
                        <label for="clients" class="custom-file-label col-form-label">Choose file</label>
                     </div>

                     <button type="button" name="InsertHomeClients" id="InsertHomeClients" class="btn button-default "
                        onclick="inserthomeclient()">Insert </button>
                  </form>
               </div>
               <!-- table -->
               <div class=" table-section">
                  <div class="table-responsive">
                     <table class="table table-striped border" id="showclientimageshere">

                        <thead>
                           <tr>
                              <th>Image</th>
                              <th>Options</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                            $resultsclients = new HomeModel();
                            $resultsclients->ShowClientImages();
                            foreach($resultsclients->ShowClientImages() as $result){
                            ?>
                           <tr>
                              <td class="tableImage"><img src="Views/assets/GalleryImages/<?php echo $result['image']?>"
                                    alt="" class="img-fluid">
                              </td>
                              <td>
                                 <a href="#" class="btn button-options button-edit"
                                    onclick="editclients(<?php echo $result['id']?>)" data-toggle="modal"
                                    data-target="#clientimagesmodal"><i class="fas fa-pen"></i></a>
                                 <button id="deleteclientimage" class="btn button-danger button-options"
                                    onclick="deleteclients(<?php echo $result['id']?>)">
                                    <i class="far fa-trash-alt"></i>
                                 </button>
                              </td>
                           </tr>
                           <?php }?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!-- The Modal -->
   <div class="modal" id="clientimagesmodal">
      <!-- The Modal -->

      <div class="modal-dialog">
         <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Update Section</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <form class="form-section">
                  <input type="text" name="editclientimageid" class="form-control d-none" id="editclientimageid"
                     required>
                  <label>Upload image</label>
                  <div class="custom-file" required>
                     <input type="file" id="file" name="file" class="custom-file-input form-control"
                        onchange="loadFile(event)">
                     <label for="image" class="custom-file-label col-form-label" required>Choose file</label>
                     <div class="row">
                        <img src="" id="output" class="foto img-fluid  col-5" />
                        <input type="hidden" id="file" name="file" class="is">
                     </div>
                  </div>
               </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
               <input type="button" name="save" class="btn button-default" data-dismiss="modal" value="Close"
                  id="close">
               <input type="button" name="Update" class="btn button-default" value="Update" id="updateabout"
                  onclick="updateclientimage()">
            </div>
         </div>
      </div>
   </div>
   <!-- The Modal -->
   <div class="modal" id="myModal">
      <div class="modal-dialog">
         <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Update Section</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
               <input type="button" name="save" class="btn button-default" data-dismiss="modal" value="Close"
                  id="close">
               <input type="button" name="Update" class="btn button-default" value="Update" id="update">
            </div>
         </div>
      </div>
   </div>
</main>
<script type="text/javascript">
var inputGoal = document.getElementById("goal");
var button = document.getElementById("insertgoal");

function checkInput() {
   if (inputGoal.value !== "") {
      button.disabled = false;
   } else {
      button.style.backgroundColor = '#5a6268';
      button.disabled = true;
   }
}
</script>

<script>
function inserthomeclient() {

   if (file_data != "") {
      var file_data = $('#clientfiles').prop('files')[0];

      var form_data = new FormData();



      form_data.append('clientfiles', file_data);
      $.ajax({
         url: 'Ajax/home.php',
         dataType: 'text',
         cache: false,
         contentType: false,
         processData: false,
         data: form_data,
         type: 'post',
         success: function(results) {
            alert("Inserted - Client Image Inserted Successfully");
            window.location = "dashboard";
         }
      });
   }
};

function deleteclients(clientiddelete) {
   var deleteclientimage = clientiddelete;
   $.ajax({
      type: 'GET',
      url: 'Ajax/home.php',
      dataType: "text",
      data: {
         'deleteclientimage': deleteclientimage
      },
      success: function(results) {
         window.location = "dashboard";
         alert("Deleted - Client Image Deleted Successfully");
      }
   });

}

function editclients(gettingidofclientimage) {
   var gettingidofclientimage = gettingidofclientimage;

   data = new FormData();
   data.append("gettingidofclientimage", gettingidofclientimage);
   $.ajax({
      url: 'Ajax/edits.php',
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(results) {
         $("#editclientimageid").val(results['id']);
         $('#aboutfile').val(results['image']);
         if (results["image"] != "") {

            $(".foto").attr('src', "Views/assets/GalleryImages/" + results["image"]);
         } else {
            $(".is").attr('src', "Views/assets/GalleryImages/" + results["image"]);
         }


      }
   });
}

function updateclientimage() {
   var updateclientimagewithid = $("#editclientimageid").val();
   console.log(updateclientimagewithid);
   var files = $('#file')[0].files[0];
   var form_data = new FormData();
   form_data.append('file', files);
   form_data.append('updateclientimagewithid', updateclientimagewithid);

   if (updateclientimagewithid != "") {
      $.ajax({
         url: "Ajax/home.php",
         type: "POST",
         data: form_data,
         contentType: false,
         processData: false,
         cache: false,
         dataType: "text",
         success: function(results) {
            $('#clientimagesmodal').modal('hide');
            setTimeout(function() {
               $("#showclientimageshere").load("dashboard #showclientimageshere");
            }, 1000); //refresh every 2 seconds
         }
      });
   }
}

function updateadsh() {
   var editthedash = $("#editthedash").val();
   var editquote = $("#editquote").val();
   var editcvalue = $("#editcvalue").val();
   var editdescription = $("#editdescription").val();
   console.log(editthedash, editquote, editcvalue, editdescription);
   var form_data = new FormData();
   form_data.append('editthedash', editthedash);
   form_data.append('editquote', editquote);
   form_data.append('editcvalue', editcvalue);
   form_data.append('editdescription', editdescription);
   if (editquote != "" && editcvalue != "" && editdescription != "") {
      $.ajax({
         url: "Ajax/home.php",
         type: "POST",
         data: form_data,
         contentType: false,
         processData: false,
         cache: false,
         dataType: "text",
         success: function(results) {


         }
      });
   }
}

function InsertGoal() {
   if (goal != "") {
      var goal = $('#goal').val();

      var form_data = new FormData();



      form_data.append('goal', goal);
      $.ajax({
         url: 'Ajax/home.php',
         dataType: 'text',
         cache: false,
         contentType: false,
         processData: false,
         data: form_data,
         type: 'post',
         success: function(results) {
            alert("Successfully Inserted new Goal");
            window.location = "dashboard";
         }
      });
   }
}

function deletegoal(deletegoalid) {
   var deletegoalid = deletegoalid;

   $.ajax({
      type: 'GET',
      url: 'Ajax/home.php',
      data: {
         'deletegoalid': deletegoalid
      },
      success: function(results) {
         window.location = "dashboard";
      }
   });
}

function editgoal(editidgoal) {

   var editidgoal = editidgoal;


   data = new FormData();
   data.append("editidgoal", editidgoal);
   $.ajax({
      url: 'Ajax/edits.php',
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(results) {
         $("#editgoalid").val(results["homeid"]);
         $("#editgoal").val(results["goal"]);
      }
   });
}

function updategoal() {

   var editgoalid = $('#editgoalid').val();
   var editgoal = $('#editgoal').val();
   var form_data = new FormData();
   form_data.append('editgoalid', editgoalid);
   form_data.append('editgoal', editgoal);

   if (editgoal != "") {
      $.ajax({
         url: "Ajax/home.php",
         type: "POST",
         data: form_data,
         contentType: false,
         processData: false,
         cache: false,
         dataType: "text",
         success: function(results) {
            window.location = "dashboard";
            // $("#updategallery").removeClass("d-none");
            // $("#deleteclass").addClass("d-none");
            // $('#myModal').modal('hide');
            //  fetchall();
         }
      });
   }
}
</script>