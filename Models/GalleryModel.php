<?php
class GalleryModel{



public function InsertGallery($client,$description,$image,$status){
       
        $results = Connection::dbconnect()->prepare("INSERT INTO gallery_tbl(client , description ,image,status) VALUES ('$client' , '$description','$image','$status')");
        $results->execute(array(
            'client' => $client,
            'description' => $description,
            'image' => $image,
            'status' => $status
        ));
        return $results;
}




public function FetchAll(){

		$results = Connection::dbconnect()->prepare("SELECT * FROM gallery_tbl");

		$results->execute();


		return $results->FetchAll();
}

public function DeleteGallery($idgallery){
        
    $results = Connection::dbconnect()->prepare("DELETE FROM gallery_tbl WHERE idgallery ='$idgallery'");
    $results->execute(array(
    'idgallery' => $idgallery
    ));
        
    }

public function EditGallery($editgallery){
    $results = Connection::dbconnect()->prepare("SELECT * FROM gallery_tbl WHERE idgallery = '$editgallery'");
    $results->bindParam(":idgallery", $editgallery, PDO::PARAM_STR);
    $results->execute();
    return $results->fetch();
}

public function UpdateGallery($id, $editclient, $editdescription, $editstatus,$image){
 $results = Connection::dbconnect()->prepare("UPDATE gallery_tbl SET client = '$editclient' ,  description = '$editdescription' , status = '$editstatus' , image = '$image' WHERE idgallery = '$id'");
        $results->execute();
    return $results;
}
public function UpdateGallerywithoutimage($id,$editclient,$editdescription,$editstatus){
$results = Connection::dbconnect()->prepare("UPDATE gallery_tbl SET client = '$editclient' ,  description = '$editdescription' , status = '$editstatus'  WHERE idgallery = '$id'");
        $results->execute();
    return $results;
}
public function limited(){
        $results = Connection::dbconnect()->prepare("SELECT * FROM gallery_tbl  ORDER BY idgallery DESC LIMIT 6");
        $results->execute();
        return $results->FetchAll();
}
public function MoreGallery($newkomentet){
        $results = Connection::dbconnect()->prepare('SELECT * FROM gallery_tbl LIMIT '.$newkomentet.'');
        $results->execute();
        return $results->fetchAll();
}

}

?>