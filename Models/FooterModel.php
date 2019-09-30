<?php
class FooterModel{
	public function InsertFooter($city,$street,$zipcode,$phone,$fax,$mondayfriday,$saturday){

		$results = Connection::dbconnect()->prepare("INSERT INTO footer_widgets_tbl(city , streetname , zipcode ,phone,fax,monday_friday,saturday) VALUES ('$city' , '$street' , '$zipcode','$phone','$fax','$mondayfriday','$saturday')");
		$results->execute(array(
			'city' => $city,
			'streetname' => $street,
			'zipcode' => $zipcode,
			'phone' => $phone,
			'fax' => $fax,
			'monday_friday' => $mondayfriday,
			'saturday' => $saturday,
		));
		return $results;
	}

	public function count(){
		$results = Connection::dbconnect()->prepare("SELECT COUNT(idfooter) AS 'count' FROM footer_widgets_tbl");
		$results->execute();
	
		return $results->fetchColumn();
	}

	public function Fetchfooterdata(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM footer_widgets_tbl");
		$results->execute();
		return $results->FetchAll();
	}

public function fetchsocialmedias(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM social_medias_tbl");
		$results->execute();
		return $results->FetchAll();
}
public function showsocialmedias(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM social_medias_tbl");
		$results->execute();
		return $results->FetchAll();	
}
	public function DeleteFooter($idfooter){

		$results = Connection::dbconnect()->prepare("DELETE FROM footer_widgets_tbl WHERE idfooter = '$idfooter'");

		$results->execute(array('idfooter'=>$idfooter));
		$results->fetch();
	}


	public function Editfooterid($id){
      $results = Connection::dbconnect()->prepare("SELECT * FROM footer_widgets_tbl WHERE idfooter = '$id'");
        $results->bindParam(":idfooter", $id, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();

	}

    public function UpdateFooterwithID($editid,$editcity,$editstreet,$editzipcode ,$editphone ,$editfax ,$editmondayfriday , $editsaturday){
    $results = Connection::dbconnect()->prepare("UPDATE footer_widgets_tbl SET city = '$editcity' ,  streetname = '$editstreet' ,  zipcode = '$editzipcode' ,saturday ='$editsaturday' , phone = '$editphone' , fax = '$editfax' , monday_friday = '$editmondayfriday' WHERE idfooter = '$editid'");
        $results->execute();
    return $results;


    }
    public function updatesocialmedias($facebook,$twitter,$instagram){
    	   $results = Connection::dbconnect()->prepare("UPDATE social_medias_tbl SET facebook = '$facebook' ,  twitter = '$twitter' ,  instagram = '$instagram' WHERE idsocialmedia = 1");
        $results->execute();
    return $results;
    }
}



?>