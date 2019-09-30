


<?php
require_once( "../Models/GalleryModel.php" );
require_once( "../Models/Connection.php" );

/*
===================
 INSERT CONTROLLER
===================
*/
if( isset( $_POST['client'] ) ) {
    $client      = $_POST['client'];
    $description = $_POST['description'];
    $status      = $_POST['status'];
    
    if(isset($_FILES['file']['name']) ) {
        
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["file"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['file']['tmp_name'], $target_dir . $image );

        $results = GalleryModel::InsertGallery( $client, $description, $image, $status );
    }
}
/*
===============
SHOW CONTROLLER
===============
*/
$results = GalleryModel::FetchAll();

foreach( $results as $result ) {
    echo '    <tr>
                <td class="tableImage">
                <img src="Views/assets/GalleryImages/' . $result['image'] . '" alt="" class="img-fluid" >
                </td>
                <td>' . $result['client'] . ' </td>

                <td class="tableDescription">
                ' . $result['description'] . ' 
                </td>
                <td>
                                <button class="btn button-options button-edit" onclick="editgallery(' . $result['idgallery'] . ');"  data-toggle="modal" data-target="#myModal">
                <i class="fas fa-pen"></i>
                </button>

                <button name="delete" id="delete" class="btn button-danger button-options"  onclick="DeleteGallery(' . $result['idgallery'] . ')" >
                <i class="far fa-trash-alt"></i>
                </button>
                </td>
            </tr>
    ';
}

/*
=================
DELETE CONTROLLER
=================
*/
if(isset($_POST['newkomentet'])){

    $newkomentet = $_POST['newkomentet'];

    $results = GalleryModel::MoreGallery($newkomentet);
    foreach($results as $result){
echo '
   <section class="section">
            <div class="col-6 col-md-3 img-box">
               <a href="#" data-toggle="modal" data-target=".gallery-slider_<?php echo $result["idgallery"];?>">

                  <img src="Views/assets/GalleryImages/<?php echo $result["image"]?>" alt="Gallery" class="img-fluid">
               </a>
            </div>
            <div class="modal fade gallery-slider_<?php echo $result["idgallery"];?>" tabindex="-1" role="dialog" aria-hidden-true>
               <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content ">
                     <div class="col-lg-12 p-0">
                        <img src="Views/assets/GalleryImages/<?php echo $result["image"]?>" alt="Gallery" class="img-fluid">
                     </div>
                  </div>
               </div>
            </div>
            </div>
   </section>
    
';
}
echo json_encode($results);
}
if( isset( $_GET['idgallery'] ) ) {
    
    $idgallery = $_GET['idgallery'];
    $results   = GalleryModel::DeleteGallery( $idgallery );
    return $results;
    
}
/*
=================
UPDATE CONTROLLER
=================
*/
if( isset( $_POST['editgallery'] ) ) {
 
    $id              = $_POST['editgallery'];
    $editclient      = $_POST['editclient'];
    $editdescription = $_POST['editdescription'];
    $editstatus      = $_POST['editstatus'];
    
    if(isset($_FILES["file"]['name'])) {
        $image       = $_FILES["file"]["name"];
        $destination = 'Views/assets/GalleryImages/';
        $target_path = $destination . basename( $image );
        move_uploaded_file( $_FILES['file']['tmp_name'],$target_path);
        $results = GalleryModel::UpdateGallery($id,$editclient,$editdescription,$editstatus,$image);
        }else{
        $results = GalleryModel::UpdateGallerywithoutimage($id,$editclient,$editdescription,$editstatus);       
        }
    echo json_encode($results);
}
// ?>
<script>
function editgallery(idgallery){
    var editgallery = idgallery;
  
    data = new FormData();
    data.append("editgallery", editgallery);
    $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(results) {
              $("#editgallery").val(results['idgallery']);        
              $("#editclient").val(results['client']);
              $("#editdescription").val(results['description']);
              $("#editstatus").val(results['status']);
              $('#image').val(results['image']);
              if(results["image"] !=""){
            $(".foto").attr('src',"Views/assets/GalleryImages/"+results['image']);
                }else{
                    $(".is").attr('src',"Views/assets/GalleryImages/"+results["image"]);
                }
        }
    });
}

function updategallery(){

    var editgallery = $('#editgallery').val();
    var editclient = $('#editclient').val();
    var editdescription = $('#editdescription').val(); 
    var editstatus = $('#editstatus').val();  
    
    var files = $('#file')[0].files[0];
    var form_data = new FormData();      
    form_data.append('file', files);
    form_data.append('editgallery', editgallery);
    form_data.append('file',files);
    form_data.append('editclient', editclient);     
    form_data.append('editdescription', editdescription);   
    form_data.append('editstatus', editstatus);

 if (editclient != "" && editdescription != "" ) {
        $.ajax({
            url: "Ajax/gallery.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache:false,

            dataType: "text",
            success: function(results) {
            $("#updategallery").removeClass("d-none");
            $("#deleteclass").addClass("d-none");
            $('#myModal').modal('hide');
             fetchall();
            }
        });
    }
}


    
</script>
