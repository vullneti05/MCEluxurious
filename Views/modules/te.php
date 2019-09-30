 <?php

 if(isset($_POST['id'])){
                  $idActive = $_POST['id'];
                  $results = new GalleryModel();
                  $results->limited();
                  $active = "";
                  $count = 0;
                  $key =0;
                  $imagesArray[]="";
                  if(isset($_POST['idhome'])){
                   echo json_encode($idActive);
                  }

                  foreach($results->limited() as $result){
                           $key++;
                           $idgallery   = $result['idgallery'];
                           $client      = $result['client'];
                           $description = $result['description'];
                           $image       = $result['image'];
                           $datetime    = $result['datetime'];
                           $status      = $result['status'];


                        if($idActive == $idgallery){
                            $active = "active";

                        }else{
                          $active = "";
                        }

                     ?>
         
         
               <div class="carousel-item <?php echo $active;?>" >
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-lg-7 p-0">
                           <img src="Views/assets/GalleryImages/<?php echo $image; ?>" alt="Gallery" class="img-fluid">
                        </div>
                        <div class="col-lg-5 description text-dark">
                           <div class="meta-info my-3">
                              <table class="w-100">
                                 <tr>
                                    <td class="label"><?php echo $idActive;?></td>
                                    <td><?php echo $client;?></td>
                                 </tr>
                                 <tr>
                                    <td class="label">Date:</td>
                                    <td><?php echo date("Y-m-d",strtotime($datetime));?></td>
                                 </tr>
                              </table>
                           </div>
                           <p class="text-dark"><?php echo $description; ?></p>
                        </div>
                     </div>
                  </div>
               </div>
        
               <?php } 
}

               ?>