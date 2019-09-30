<?php
//Model Class 
class HomeModel
{
    
/*
=====================
INSERT QUERY FUNCTION 
=====================
*/
    public function InsertQuote($quote, $cvalue, $description)
    {
        
        
        $results = Connection::dbconnect()->prepare("INSERT INTO home_tbl(quote , cvalue , description) VALUES ('$quote' , '$cvalue' , '$description')");
        
        $results->execute(array(
            'quote' => $quote,
            'cvalue' => $cvalue,
            'description' => $description
        ));
        
        return $results;
    }
    
/*
===================
SHOW QUERY FUNCTION 
===================
*/  
    public function ShowQuotes()
    {
        $results = Connection::dbconnect()->prepare("SELECT * FROM home_tbl");
        
        $results->fetchAll();
        $results->execute();
        
        return $results;
    }
/*
=====================
DELETE QUERY FUNCTION 
=====================
*/    
    public function DeleteQuote($idhome)
    {
        
        $results = Connection::dbconnect()->prepare("DELETE FROM home_tbl WHERE idhome ='$idhome'");
        
        $results->execute(array(
            'idhome' => $idhome
        ));
        
    }
/*
===================
EDIT QUERY FUNCTION 
===================
*/    
    public function EditQuotes($id)
    {
        
        $results = Connection::dbconnect()->prepare("SELECT * FROM home_tbl WHERE idhome = '$id'");
        $results->bindParam(":idhome", $id, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
        
    }
/*
=====================
UPDATE QUERY FUNCTION 
=====================
*/    
    public function UpdateQuote($id, $updatequote, $updatecvalue, $updatedescription)
    {
        
        $results = Connection::dbconnect()->prepare("UPDATE home_tbl SET quote='$updatequote', cvalue='$updatecvalue', description ='$updatedescription' WHERE idhome='$id'");
        $results->execute(array(
            'quote' => $updatequote,
            'cvalue' => $updatecvalue,
            'description' => $updatedescription
        ));
        return $results;
    }
    
    public function showhomeclientdescription(){
            $results = Connection::dbconnect()->prepare("SELECT * FROM home_clients_tbl WHERE idhomeclients = 1");
        $results->fetch();
        $results->execute();
        
        return $results;
    }
    public function clientdescriptionupdate($clientdescription){
            $results = Connection::dbconnect()->prepare("UPDATE home_clients_tbl SET clientshomedescription = '$clientdescription' WHERE idhomeclients = 1");
            $results->execute();
            return $results;
    }


    public function InsertClientImage($image){
        
        
        $results = Connection::dbconnect()->prepare("INSERT INTO home_clients_images (image) VALUES ('$image')");
        
        $results->execute(array(
            'image' => $image
        ));
        
        return $results;
    }
    public function ShowClientImages(){
        $results = Connection::dbconnect()->prepare("SELECT * FROM home_clients_images");
        $results->execute();
        return $results->fetchAll();
    }
    public function DeleteClientImage($deleteclientimage){
        $results = Connection::dbconnect()->prepare("DELETE FROM home_clients_images WHERE id = '$deleteclientimage'");
        $results->execute(array(
        'id' => $deleteclientimage
        ));
        
    }
    public function EditClientImage($id){

    $results = Connection::dbconnect()->prepare("SELECT * FROM home_clients_images WHERE id = '$id'");
    $results->bindParam(":id", $editgallery, PDO::PARAM_STR);
    $results->execute();
    return $results->fetch();

    }
    public function UpdateClientImage($id,$image){
                 $results = Connection::dbconnect()->prepare("UPDATE home_clients_images SET image = '$image'  WHERE id = '$id'");
        $results->bindParam(":id", $id, PDO::PARAM_STR);

        $results->execute();
    return $results;
    }

    public function InsertGoal($goal){
            $results = Connection::dbconnect()->prepare("INSERT INTO home_goals (goal) VALUES ('$goal')");
        
        $results->execute(array(
            'goal' => $goal
        ));
        
        return $results;
    }
    public function ShowGoal(){
    $results = Connection::dbconnect()->prepare("SELECT * FROM home_goals");
    $results->execute();
    return $results->fetchAll();
    }

    public function deletegoal($id){
        $results = Connection::dbconnect()->prepare("DELETE FROM home_goals WHERE homeid = '$id'");

        $results->execute(array('homeid'=>$id));
        $results->fetch();
        
    }
    public function EditGoal($id){
        $results = Connection::dbconnect()->prepare("SELECT * FROM home_goals WHERE homeid = '$id'");
        $results->bindParam(":homeid", $id, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();

    }
    public function Edithome($id){
           $results = Connection::dbconnect()->prepare("SELECT * FROM home_goals WHERE homeid = '$id'");
        $results->bindParam(":homeid", $id, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
    }
    public function Updategoal($id,$editgoal){
         $results = Connection::dbconnect()->prepare("UPDATE home_goals SET goal = '$editgoal' WHERE homeid = '$id'");
         $results->execute();
        return $results;
    }
}