<?php
class ContactModel{


public function InsertUsersForm($fullname,$email,$contactmessage){

	$results = Connection::dbconnect()->prepare("INSERT INTO contact_tbl(name , email , description) VALUES ('$fullname' , '$email' , '$contactmessage')");

	$results->execute(array(
			'name' => $fullname,
			'email' => $email,
			'description' => $contactmessage
		));
	return $results;

}


public function ShowContactMessages(){

		$results = Connection::dbconnect()->prepare("SELECT * FROM contact_tbl");

		$results->execute();


		return $results->FetchAll();
}

public function DeleteMessage($deletemessage){
        
    $results = Connection::dbconnect()->prepare("DELETE FROM contact_tbl WHERE idcontact ='$deletemessage'");
    $results->execute(array(
    'idcontact' => $deletemessage
    ));
        
}
}

?>