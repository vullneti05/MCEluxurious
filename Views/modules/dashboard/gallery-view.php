<title>Gallery - Dashboard</title>
<main>

  <div class="alert alert-success alert-dismissible d-none" id="deleteclass">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Delete! </strong> Deleted Successfully .
  </div> 
  <div class="alert alert-secondary alert-dismissible d-none" id="updategallery">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Update! </strong> Updated Successfully .
  </div> 
   <div class="container-fluid">
      <div class="row page-title">
         <h3>Gallery</h3>
      </div>
      <div class="content">
         <div class="row">
            <div class="col-12 table-section p-0">
               <div class="table-responsive ">
                  <table class="table table-light table-striped">
                     <thead>
                        <tr>
                           <th>Image</th>
                           <th>Client</th>
                           <th>Description</th>
                           <th>Options</th>
                        </tr>
                     </thead>
                     <tbody id="tbodygallery">
   
                     </tbody>
                  </table>
               </div>
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
         
               <form class="form-section">
          <input type="text" name="editgallery" class="form-control d-none" id="editgallery">
                  <label for="client">Client</label>
                  <input type="text" name="editclient" class="form-control" id="editclient" required >
                  <label for="description">Description</label>
                  <textarea name="editdescription" class="form-control" id="editdescription" required></textarea>
                  <label>Upload image</label>
                    <div class="custom-file" required>
                      <input type="file" id="file" name="file" class="custom-file-input form-control" onchange="loadFile(event)">
                      <label for="image" class="custom-file-label col-form-label">Choose file</label>
                      <div class="row">
                        <img src="" id="output" class="foto img-fluid  col-5" />
                        <input type="hidden"id="file" name="file" class="is" >
                      </div>
                    </div>
       <!--            <label for="status">Status</label>
                  <select name="editstatus" id="editstatus" class="form-control">
                     <option value="active">Active</option>
                     <option value="passive">Not Active</option>
                  </select> -->
           
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" name="save" class="btn button-default"  data-dismiss="modal" value="Close" id="close">
         <input type="button" name="Update" class="btn button-default" value="Update"  id="updateGallery" onclick="updategallery()">
        </div>
            </form>
      </div>
    </div>
  </div>
</main>
<script>
// $("#updateGallery").click(function(){

//   console.log("test");

// });
</script>
