<?php
class BackgroundsModel{


public function homebgfetch(){
	$homeresults = Connection::dbconnect()->prepare("SELECT * FROM backgrounds_tbl WHERE idgallery = '1'");

	$homeresults->execute();

	return $homeresults->fetchAll();
}

public function bghome($image){
	 $results = Connection::dbconnect()->prepare("UPDATE backgrounds_tbl SET image = '$image' WHERE idgallery = '1'");
        $results->execute();
    return $results;
}
public function aboutbgfetch(){
	$homeresults = Connection::dbconnect()->prepare("SELECT * FROM backgrounds_tbl WHERE idgallery = '2'");

	$homeresults->execute();

	return $homeresults->fetchAll();
}
public function bgabout($image){
	 $results = Connection::dbconnect()->prepare("UPDATE backgrounds_tbl SET image = '$image' WHERE idgallery = '2'");
        $results->execute();
    return $results;
}
public function gallerybgfetch(){
	$homeresults = Connection::dbconnect()->prepare("SELECT * FROM backgrounds_tbl WHERE idgallery = '3'");
	$homeresults->execute();
	return $homeresults->fetchAll();
}
public function bggallery($image){
	$homeresults = Connection::dbconnect()->prepare("UPDATE backgrounds_tbl SET image = '$image' WHERE idgallery = '3'");
	$homeresults->execute();
	return $homeresults->fetchAll();	
}
public function contactbgfetch(){
	$homeresults = Connection::dbconnect()->prepare("SELECT * FROM backgrounds_tbl WHERE idgallery = '4'");

	$homeresults->execute();

	return $homeresults->fetchAll();
}
public function bgcontact($image){
	$homeresults = Connection::dbconnect()->prepare("UPDATE backgrounds_tbl SET image = '$image' WHERE idgallery = '4'");
	$homeresults->execute();
	return $homeresults->fetchAll();	
}
}
?>