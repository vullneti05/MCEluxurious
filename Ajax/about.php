<?php
require_once( "../Models/AboutModel.php" );
require_once( "../Models/Connection.php" );


/*
===================
 INSERT CONTROLLER
===================
*/
if( isset( $_POST['title'] ) ) {
$title	=		$_POST['title'];
$description = 	$_POST['description'];
   
    if( isset( $_FILES['aboutfile']['name'] ) ) {
        
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["aboutfile"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['aboutfile']['tmp_name'], $target_dir . $image );
        
    }
    $results = AboutModel::InsertAbout( $title, $description, $image);

    echo json_encode($results);
}

if(isset($_POST['aboutus_quote'])){
    $a="ok";
   return $a;
}

/*
================
 SHOW CONTROLLER
================
*/
$results = AboutModel::FetchAbout();

foreach( $results as $result ) {
    echo '    <tr>
                <td class="tableImage">
                <img src="Views/assets/GalleryImages/' . $result['image'] . '" alt="" class="img-fluid" >
                </td>
                <td>' . $result['title'] . ' </td>
                <td class="tableDescription">
                ' . $result['description'] . ' 
                </td>
                <td>
	 <a href="#" class="btn button-options button-edit" data-toggle="modal" data-target="#myModal"
	 onclick="Editabout(' . $result['idaboutus'] . ')" ><i class="fas fa-pen"></i></a>
                <button name="delete" id="delete" class="btn button-danger button-options" onclick="DeleteAbout(' . $result['idaboutus'] . ')" >
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
if (isset($_GET['idaboutus'])) {
    
    $idaboutus  = $_GET['idaboutus'];
    $results = AboutModel::DeleteAbout($idaboutus);
    return $results;
    
}


/*
=================
UPDATE CONTROLLER
=================
*/
if( isset( $_POST['editaboutid'] ) ) {
    $id              = $_POST['editaboutid'];
    $edittitle      = $_POST['edittitle'];
    $editdescription = $_POST['editdescription'];
    
    if(isset($_FILES["file"]['name'])){
        $image       = $_FILES["file"]["name"];
        $destination = '../Views/assets/GalleryImages/';
        $target_path = $destination . basename( $image );
        
        move_uploaded_file( $_FILES['file']['tmp_name'], $target_path );
            $results = AboutModel::UpdateAbout($id,$edittitle,$editdescription,$image);
    }else{
           $results = AboutModel::UpdateAboutwithoutimage($id,$edittitle,$editdescription);
    }
    
    

    
    echo json_encode( $results );
}

if(isset($_POST['quotechange'])){
$quotechange     =   $_POST['quotechange'];
$results = AboutModel::updatequote($quotechange);
 echo json_encode($results);

}

?>