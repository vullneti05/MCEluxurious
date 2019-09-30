<?php 
require_once( "../Models/AdminModel.php" );
require_once( "../Models/Connection.php" );

if (isset($_POST['email'])){
	// $_SESSION['admin'] = "zotnia ka qasje ";
  $email			    =	$_POST['email'];
  $password			  	=	$_POST['password'];
  $results     		    = AdminModel::InsertAdmin($email,$password);
  echo json_encode($results);
}
if (isset($_POST['editadminid'])) {
    
    $editadminid = $_POST['editadminid'];
    $editemail = $_POST['editemail'];
    $editpassword = $_POST['editpassword'];   
    $results = AdminModel::UpdateAdmin($editadminid,$editemail ,$editpassword);
	 
	 echo json_encode($results);
}
$results = AdminModel::FetchAllAdmins();

foreach($results as $admin){
echo'<tr>
		<td>'.$admin["email"].'</td>
		<td><input class="form-control col-md-6" type="password" value="'. $admin['password'].'" disabled id="disablepassword"></td>
		<td>
		<a href="#" class="btn button-options button-edit" data-toggle="modal" data-target="#adminmodal" onclick="editadmin('.$admin['idusers'].');" ><i class="fas fa-pen"></i></a>
		<button name="" id="delete" class="btn button-danger button-options" onclick=deleteadmin('.$admin['idusers'].')>
		<i class="far fa-trash-alt"></i>
		</button>
		</td>
		</tr>';
}
if(isset($_GET['idadmin'])){
	$idadmin = $_GET['idadmin'];
	$results = AdminModel::deleteadminid($idadmin);
}




?>