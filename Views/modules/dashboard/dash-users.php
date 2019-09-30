<title>Users - Dashboard</title>
<main>
   <div class="container-fluid">
      <div class="row page-title">
         <h3>Users</h3>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-lg-7 card">
               <form class="form-section">
                  <div class="alert alert-success alert-dismissible d-none" id="insertadmin">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Insert! </strong> Inserted Successfully .
                  </div>
                  <div class="alert alert-info alert-dismissible d-none" id="deleteadmin">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Deleted! </strong> Deleted Successfully .
                  </div>
                  <div class="alert alert-primary alert-dismissible d-none" id="updateadmin">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Updated! </strong> Updated Successfully .
                  </div>
                  <div class="alert alert-danger alert-dismissible d-none" id="erroradmin">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>ERROR! </strong> * All fields are required .
                  </div>
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="email"
                     pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 3}$">

                  <label for="password">Paswword</label>
                  <input type="password" name="password" class="form-control" id="password">

                  <button type="button" class="btn button-default" name="InsertAdmin" id="InsertAdmin">Save </button>
               </form>
            </div>

            <!-- Table content section -->
            <div class="col-12 table-section pl-0 mt-3">
               <div class="table-responsive ">
                  <table class="table table-light table-striped">
                     <thead>
                        <tr>
                           <th>Email</th>
                           <th>Password</th>
                           <th>Option</th>
                        </tr>
                     </thead>
                     <tbody id="showadmins">
                     </tbody>
                  </table>
               </div>
            </div>
            <!--// Table content section -->
         </div>
         <!--// Row -->
      </div>
      <!-- //Content -->
   </div>
   <!-- The Modal -->
   <div class="modal" id="adminmodal">
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
                  <input type="text " name="editadminid" class="form-control d-none" id="editadminid">
                  <label for="email">Email address</label>
                  <input type="email" name="editemail" class="form-control" id="editemail" required>

                  <label for="password">Paswword</label>
                  <input type="password" name="editpassword" class="form-control" id="editpassword">
                  <label for="checkbox">Show password</label>
                  <input type="checkbox" class="custom-checkbox" onclick="changetotext()">
               </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
               <input type="button" name="save" class="btn button-default" data-dismiss="modal" value="Close"
                  id="close">
               <input type="button" name="Update" class="btn button-default" value="Update" id="updateGallery"
                  onclick="updateadmin()">
            </div>
         </div>
      </div>
   </div>
</main>


<script>


</script>