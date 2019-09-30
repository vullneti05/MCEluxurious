<?php 
class AdminModel{
	public function InsertAdmin($email,$password){
		$results = Connection::dbconnect()->prepare("INSERT into users_tbl (email,password) VALUES ('$email','$password')");
		$results->execute(array(
				'email'=>$email,
				'password'=>$password
		));
		return $results;
	}

	public function FetchAllAdmins(){
		$results = Connection::dbconnect()->prepare("SELECT * from users_tbl");
		$results->execute();
		return $results->fetchAll();
	}

	public function deleteadminid($idadmin){
		$results = Connection::dbconnect()->prepare("DELETE FROM users_tbl WHERE idusers = '$idadmin'");
		$results->execute(array('id_users'=>$idadmin));
		return $results;
	}

	public function EditAdmin($id){
	$results = Connection::dbconnect()->prepare("SELECT * FROM  users_tbl  WHERE idusers = '$id'");
	       $results->bindParam(":idusers", $id, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
        
	}
	public function UpdateAdmin($editadminid,$editemail ,$editpassword){
 $results = Connection::dbconnect()->prepare("UPDATE users_tbl SET  email = '$editemail' , password = '$editpassword' WHERE idusers = '$editadminid'");
        $results->execute();
    return $results;

	}


	public function Comparison($email,$password){
		$results = Connection::dbconnect()->prepare("SELECT * FROM users_tbl WHERE email = '$email' AND password = '$password' ");
		$results->bindParam(":email",$email, PDO::PARAM_STR);
		$results->bindParam(":password",$password, PDO::PARAM_STR);
		$results->execute();
		return $results->fetch();
	}


}