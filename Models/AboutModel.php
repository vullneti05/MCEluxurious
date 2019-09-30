<?php
class AboutModel{

/*
===================
 INSERT CONTROLLER
===================
*/

    public function InsertAbout( $title, $description, $image)
    {
        
        
        $results = Connection::dbconnect()->prepare("INSERT INTO aboutus_tbl(title , description , image) VALUES ('$title' , '$description' , '$image')");
        
        $results->execute(array(
            'title' => $title,
            'description' => $description,
            'image' => $image
        ));
        
        return $results;
    }
    
    public function FetchAbout(){
        $results = Connection::dbconnect()->prepare("SELECT * FROM aboutus_tbl");
        
        $results->fetchAll();
        $results->execute();
        
        return $results;
    }

    public function DeleteAbout($idaboutus){

        $results = Connection::dbconnect()->prepare("DELETE FROM aboutus_tbl WHERE idaboutus ='$idaboutus'");
        
        $results->execute(array(
            'idaboutus' => $idaboutus
        ));
    }

    public function EditAbout($id){
        $results = Connection::dbconnect()->prepare("SELECT * FROM aboutus_tbl WHERE idaboutus = '$id'");
        $results->bindParam(":idaboutus", $id, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
}

public function UpdateAbout($id,$edittitle,$editdescription,$image ){
         $results = Connection::dbconnect()->prepare("UPDATE aboutus_tbl SET title = '$edittitle' ,  description = '$editdescription' ,  image = '$image' WHERE idaboutus = '$id'");
        $results->execute();
    return $results;
}
public function UpdateAboutwithoutimage($id,$edittitle,$editdescription ){
         $results = Connection::dbconnect()->prepare("UPDATE aboutus_tbl SET title = '$edittitle' ,  description = '$editdescription' WHERE idaboutus = '$id'");
        $results->execute();
    return $results;
}

// public function updatefooter($id){
//       $results = Connection::dbconnect()->prepare("UPDATE footer_widgets_tbl SET title = '$edittitle' ,  description = '$editdescription' WHERE idaboutus = '$id'");
//         $results->execute();
//     return $results;
// if something goes wrong un comment this out ,
// }

    public function fetchquote(){
        $results = Connection::dbconnect()->prepare("SELECT * FROM aboutus_quote where idquote = 1");
        $results->fetch();
        $results->execute();
        return $results;
    }
public function updatequote($quotechange){
    $results = Connection::dbconnect()->prepare("UPDATE aboutus_quote SET aboutus_quote = '$quotechange' WHERE idquote = 1");
    $results->execute();
    return $results;

}
}
?>