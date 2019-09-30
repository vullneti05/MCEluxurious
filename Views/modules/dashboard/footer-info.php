<title>Footer info - Dashboard</title>
<main>
   <div class="container-fluid">
      <div class="row page-title">
         <h3>Footer Widgets</h3>
      </div>
      <div class="content">

         <div class="row justify-content-between">

            <div class="col-lg-7 card">
               <div class="alert alert-success alert-dismissible d-none" id="insertedfooter-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Inserted Successfully .
               </div>                 
               <div class="alert alert-info alert-dismissible d-none " id="updatedfooter-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Updated Successfully .
               </div>   
              <div class="alert alert-success alert-dismissible d-none  " id="deletedfooter-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success! </strong> Deleted Successfully .
               </div>
                <div class="alert alert-danger alert-dismissible d-none " id="emptyfieldsfooter-error">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>ERROR! </strong> You Must fill all the fields.
               </div>     
               <h5>New address</h5>
               <span class="small">(maximum 3 addresses)</span>
               <hr>
               <form class="form-section">
                  <label for="city">City</label>
                  <input type="text" name="city" class="form-control" id="city" placeholder="ex: Naples" required>

                  <label for="street">Street name</label>
                  <input type="text" name="street" class="form-control" id="street" placeholder="ex: 1615 Trade Center Way"
                     required>

                  <label for="zipcode">Zip code</label>
                  <input type="number" name="zipcode" class="form-control" id="zipcode" placeholder="ex: 34109" minlength="4" maxlength="9"
                     required>

                  <div class="row mb-3 ">
                     <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control"  id="phone" placeholder="Phone: 239-593-6995">
                     </div>
                     <div class="col-md-6">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" class="form-control" id="fax" placeholder="Fax: 239-593-6995">
                     </div>
                  </div>
                  <h5>Working hours</h5>
                  <hr>
                  <div class="row">
                     <div class="col-6">
                        <label for="mon-fri">Monday-Friday</label>
                        <input type="text" name="mondayfriday" class="form-control" id="mondayfriday" placeholder="ex: 8:00 Am To 5:00 Pm">
                     </div>
                     <div class="col-6">
                        <label for="sat">Saturday</label>
                        <input type="text" name="saturday" class="form-control" id="saturday" placeholder="ex: 8:00 Am To 12:00 Pm">
                     </div>
                  </div>
                <?php 
                $count = new FooterModel();
                if($count->count() < 3){
                echo ' <input type="button" name="savefooter" class="btn button-default " id="savefooter" value="save" onclick="insertfooter()">';

                }else{
                echo '<br><div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>LIMITED ! </strong>  Maximum Footer Address are 3 , <strong>DELETE</strong> or <strong>UPDATE</strong> one row .
                  </div> ';
                }
                ?>
               </form>
            </div>
            <div class="col-lg-5 p-0 px-md-3">
  
               <div class="card">
                  <h5>Social medias</h5>
                  <form>
                     <label for="facebook">Facebook</label>
                     <?php 

                     $results = new FooterModel();
                      
                      $results->showsocialmedias();
                      foreach ($results->showsocialmedias() as $value) {
                        if($results->showsocialmedias() >0){

                          $facebook =  $value['facebook'];
                          $instagram =  $value['instagram'];
                          $twitter =  $value['twitter'];
                 
                        }else{
                          $facebook = "www.facebook.com/vullnetselmani.official";
                          $instagram = "www.instagram.com/vullnetselmaniii";
                          $twitter = "www.twitter.com/vullnetselmani";
                        }
                     ?>
                     <input type="url" name="facebook" class="form-control" id="facebook" placeholder="ex:https://www.facebook.com" required value="<?php echo $facebook ?>">
                     <label for="instagram">Instagram</label>
                     <input type="url" name="instagram" class="form-control" id="instagram" placeholder="ex:https://www.instagram.com" required value="<?php echo $instagram ?>">
                     <label for="twitter">Twitter</label>
                     <input type="url" name="twitter"  id="twitter" class="form-control" placeholder="ex:https://www.twitter.com" required value="<?php echo $twitter ?>">
                     <button type="input" name="save" class="btn button-default " onclick="socialmedias()">Edit </button>
                   <?php }?>
                  </form>
               </div>
            </div>

            <div class="col-12 table-section p-0 mt-3">
               <div class="table-responsive ">
                  <table class="table table-striped">
                     <thead class="">
                        <tr>
                           <th>City</th>
                           <th>Street</th>
                           <th>Zipdode</th>
                           <th>Phone</th>
                           <th>Working hours</th>
                           <th>Options</th>
                        </tr>
                     </thead>
                     <tbody id="tbodyfooter">
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
           <!-- The Modal -->
  <div class="modal" id="footermodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Section</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
    <div class="container-fluid">
      <div class="content">
  <form>
         <div class="row justify-content-between">
   
               <hr>
               <form class="form-section">      
                  <input type="text" name="editid" class="form-control d-none" id="editid" placeholder="ex: Naples" required>
                  <label for="zipcode">City</label>
                  <input type="text" name="editcity" class="form-control " id="editcity"  required>

                  <label for="street">Street name</label>
                  <input type="text" name="editstreet" class="form-control" id="editstreet" placeholder="ex: 1615 Trade Center Way"
                     required>

                  <label for="zipcode">Zip code</label>
                  <input type="number" name="editzipcode" class="form-control" id="editzipcode" placeholder="ex: 34109" minlength="4" maxlength="9"
                     required>

                  <div class="row mb-3 ">
                     <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="editphone" class="form-control"  id="editphone" placeholder="Phone: 239-593-6995">
                     </div>
                     <div class="col-md-6">
                        <label for="fax">Fax</label>
                        <input type="text" name="editfax" class="form-control" id="editfax" placeholder="Fax: 239-593-6995">
                     </div>
                  </div>
                <h5>Working hours</h5>
                <hr>
                  <div class="row">
                     <div class="col-6">
                        <label for="mon-fri">Monday-Friday</label>
                        <input type="text" name="editmondayfriday" class="form-control" id="editmondayfriday" placeholder="ex: 8:00 Am To 5:00 Pm">
                     </div>
                     <div class="col-6">
                        <label for="sat">Saturday</label>
                        <input type="text" name="editsaturday" class="form-control" id="editsaturday" placeholder="ex: 8:00 Am To 12:00 Pm">
                     </div>
                  </div>
               </form>
            </div>

          </form>
         </div>
      </div>
   </div>      <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" name="save" class="btn button-default"  data-dismiss="modal" value="Close" id="close">
          <button type="button" name="Update" class="btn button-default"  id="updateGallery" onclick="updatefooterwithid()">
          Update
          </button>
        </div>
        </div>
  
      </div>
    </div>
  </div>
</main>







