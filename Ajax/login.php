<?php
require_once( "../Models/AdminModel.php" );
require_once( "../Models/Connection.php" );
session_start();

if(isset($_POST['loginemail'])){
	$email = $_POST['loginemail'];
	$password = $_POST['loginpassword'];

		$results = AdminModel::Comparison($email,$password);
		if($results["email"] === $email && $results["password"] === $password){
			$_SESSION['loggedIn'] = "kaqasje";
			$_SESSION['email']  = $results["email"];
			echo 1;
		}else{
			echo 0;
		}
}



?>