<title>About - Dashboard</title>
<main>
   <div class="container-fluid">
      <div class="row page-title">
         <h3>About Us</h3>

      </div>
      <div class="content">
         <div class="row justify-content-between">
            <div class="col-lg-7 order-1 order-lg-0 card">
          <form class="form-section">
            <div class="alert alert-success alert-dismissible d-none" id="insertabout">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Insert! </strong> Inserted Successfully .
          </div> 
            <div class="alert alert-primary alert-dismissible d-none" id="updateabout">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Update! </strong> Updated Successfully .
          </div> 
            <div class="alert alert-secondary alert-dismissible d-none" id="deleteabout">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Delete! </strong> Deleted Successfully .
          </div> 
            <div class="alert alert-danger alert-dismissible d-none" id="errorabout">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>*Error! </strong> All fields need to be filled .
          </div> 
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" required>
          <label for="aboutDesc">Description</label>
          <textarea name="description" class="form-control" id="description"></textarea>
          <label>Upload image</label>
          <div class="custom-file mt-3">
          <input type="file" name="aboutfile" class="custom-file-input form-control" id="aboutfile">
          <label for="inputFiles" class="custom-file-label col-form-label">Choose file</label>
          </div>

          <input type="button" name="InsertAbout" class="btn button-default" value="SAVE"  id="InsertAbout" >
          </form>
            </div>
            <div class="col-lg-5 p-0 px-md-3 order-0">
            <div class="card">
            <form >
              <div class="alert alert-primary alert-dismissible d-none" id="updateabout">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Update! </strong>Quote Updated Successfully .
              </div> 
              <label for="heroimage-quote">Quote over image</label>
              <div id="textareaquote">
                <?php
                  $results = AboutModel::fetchquote();
                  foreach($results as $result){     
                  $aboutquote = $result['aboutus_quote'];         
                  $idquote = $result['idquote'];          
                ?>
                  <textarea class="form-control" name="quotechange" id="quotechange"><?php echo $aboutquote;?></textarea>
                   <button type="button" name="save" class="btn button-default " onclick="aboutquotechange()">Edit </button>
                <?php }?>
              </div>
            </form>
            </div>
            </div>
            <!-- Table content section -->
            <div class="col-12 order-12 table-section pl-0 mt-3">
               <div class="table-responsive">
                  <table class="table table-light table-striped">
                     <thead>
                        <tr> 
                           <th>Image</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Option</th>
                        </tr>
                     </thead>
                     <tbody id="tbodyabout">
                     </tbody>
                  </table>
               </div>
            </div>
            <!--// Table content section -->
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



                  <input type="text" name="editaboutid" class="form-control d-none" id="editaboutid" required >

                  <label for="client">Title</label>
                  <input type="text" name="edittitle" class="form-control" id="edittitle" required >
                  <label for="description">Description</label>
                  <textarea class="form-control" id="editaboutdescription" name="editaboutdescription"  required></textarea>




                   <label>Upload image</label>
                    <div class="custom-file" required>
                      <input type="file" id="file" name="file" class="custom-file-input form-control" onchange="loadFile(event)">
                      <label for="image" class="custom-file-label col-form-label">Choose file</label>
                      <div class="row">
                        <img src="" id="output" class="foto img-fluid  col-5" />
                        <input type="hidden"id="aboutfile" name="aboutfile" class="is" >
                      </div>
                    </div>



               </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" name="save" class="btn button-default"  data-dismiss="modal" value="Close" id="close">
          <input type="button" name="Update" class="btn button-default" value="Update"  id="updateabout" onclick="updateabout()">
        </div>
      </div>
    </div>
  </div>
         </div>
         <!--// Row -->
      </div>
      <!-- //Content -->
   </div>
</main>