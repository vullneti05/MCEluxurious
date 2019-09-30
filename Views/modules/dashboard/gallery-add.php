<title>Gallery - Dashboard</title>

<main>
   <div class="container-fluid">
      <div class="row page-title">
         <h3>Add new gallery</h3>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-md-8 col-lg-7 card">
               <form class="form-section" id="form1" method="post" enctype="multipart/form-data">
     
               <div class="alert alert-success alert-dismissible d-none" id="inserted-Gallery-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Inserted Successfully - <a href="gallery-view " class="text-primary">visit now</a>
               </div> 
                <div class="alert alert-danger alert-dismissible d-none" id="Error-Gallery-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>ERROR! </strong> You Must fill all the fields.
                </div> 
                  <label for="client">Client</label>
                  <input type="text" name="client" class="form-control" id="client" required>
                  
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control" id="description" required></textarea>

                  <label>Upload image</label>
                  <div class="custom-file ">
                     <input type="file" name="file" class="custom-file-input form-control" id="file" required>
                     <label for="image" class="custom-file-label col-form-label">Choose file</label>
                  </div>
                <input type="button" name="savegallery" class="btn button-default"  value="Save" id="savegallery">
               </form>
            </div>

         </div>
      </div>
   </div>
   </div>
</main>