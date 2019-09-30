<?php
// Models 
require_once("../Models/HomeModel.php");
require_once("../Models/Connection.php");
/*
===================
 INSERT CONTROLLER
===================
*/

  if( isset( $_FILES['clientfiles']['name'] ) ) {
     
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["clientfiles"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['clientfiles']['tmp_name'], $target_dir . $image );
           $results = HomeModel::InsertClientImage($image);

    echo json_encode($results); 
    }



/*
===============
SHOW CONTROLLER
===============
*/
$results = HomeModel::ShowQuotes();
foreach ($results as $row) {
    echo '<tr>
                <td>' . $row['quote'] . '</td>
                <td>' . $row['cvalue'] . '</td>
                <td>' . $row['description'] . '</td>
                <td>
                <button class="btn button-options button-edit" onclick="EditButton(' . $row['idhome'] . ')"  data-toggle="modal" data-target="#myModal">
                <i class="fas fa-pen"></i>
                </button>
                <button  id="delete" onclick="DeleteQuote(' . $row['idhome'] . ')" class="btn button-danger button-options">
                <i class="far fa-trash-alt"></i>
                </button>
                </td>
        </tr>';
}


/*
=================
DELETE CONTROLLER
=================
*/
if (isset($_GET['idhome'])) {
    
    $idhome  = $_GET['idhome'];
    $results = HomeModel::DeleteQuote($idhome);
    return $results;
    
}

/*
=================
UPDATE CONTROLLER
=================
*/
if(isset($_POST['editID'])){
    echo "<script>alert('test')";

}
if (isset($_POST['editthedash'])) {

    $id                = $_POST['editthedash'];
    $updatequote       = $_POST['editquote'];
    $updatecvalue      = $_POST['editcvalue'];
    $updatedescription = $_POST['editdescription'];
    
    $results = HomeModel::UpdateQuote($id, $updatequote, $updatecvalue, $updatedescription);
    
    return $results;
}

if (isset($_POST['clientdescription'])) {
    
    $clientdescription  = $_POST['clientdescription'];
    
    $results = HomeModel::clientdescriptionupdate($clientdescription);
    
    return $results;
}

if(isset($_GET['deleteclientimage'])){

    $deleteclientimage  = $_GET['deleteclientimage'];
    $results = HomeModel::DeleteClientImage($deleteclientimage);
    echo json_encode($results);
}

if(isset($_POST['updateclientimagewithid'])) {
    $id    = $_POST['updateclientimagewithid'];
    if(isset($_FILES["file"]['name'])){
        $image       = $_FILES["file"]["name"];
        $destination = '../Views/assets/GalleryImages/';
        $target_path = $destination . basename( $image );
        
         move_uploaded_file( $_FILES['file']['tmp_name'], $target_path );
            $results = HomeModel::UpdateClientImage($id ,$image);
        echo json_encode($results);
    }
}
if(isset($_POST['goal'])){
    $goal = $_POST['goal'];
    $results = HomeModel::InsertGoal($goal);
    echo json_encode($results); 
}
if (isset($_GET['deletegoalid'])) {
    $id  = $_GET['deletegoalid'];
    $results = HomeModel::deletegoal($id);
    return $results;
}

if(isset($_POST['editgoalid'])){

    $id = $_POST['editgoalid'];
    $editgoal = $_POST['editgoal'];

    $results = HomeModel::Updategoal($id,$editgoal);
     return $results;
}


?>