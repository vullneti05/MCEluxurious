<?php
require_once("../Models/ContactModel.php");
require_once("../Models/Connection.php");


if(isset($_POST['fullname'])){

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$contactmessage = $_POST['contactmessage'];

	$results = ContactModel::InsertUsersForm($fullname,$email,$contactmessage);
	echo json_encode($results);
}
if(isset($_GET['deletemessage'])){
    $deletemessage = $_GET['deletemessage'];
    $results   = ContactModel::Deletemessage( $deletemessage);
    return $results;

}

$resultsfetch = ContactModel::ShowContactMessages();

foreach($resultsfetch as $contact){

	        echo'         <tr>
                           <td>'.$contact['name'].'</td>
                           <td>'.$contact['email'].'</td>
                           <td class="tableDescription">'.$contact['description'].'</td>
                           <td>
                              <button name="" id="delete" class="btn button-danger button-options" onclick="Deleteusermessage('.$contact['idcontact'].')">
                                 <i class="far fa-trash-alt"></i>
                              </button>
                           </td>
                        </tr>
';
}



?>