<?php

require_once("../Models/FooterModel.php");
require_once("../Models/Connection.php");

if (isset($_POST['city'])){
  $city			    =	$_POST['city'];
  $street			  =	$_POST['street'];
  $zipcode		  =	$_POST['zipcode'];
  $phone			  =	$_POST['phone'];
  $fax			    =	$_POST['fax'];
  $mondayfriday	=	$_POST['mondayfriday'];
  $saturday		  =	$_POST['saturday'];
  $results      = FooterModel::InsertFooter($city,$street,$zipcode,$phone,$fax,$mondayfriday,$saturday);
  echo json_encode($results);
}

$results = FooterModel::Fetchfooterdata();
foreach($results as $result){
	echo '<tr>
           <td>'.$result['city'].'</td>
           <td>'.$result['streetname'].'</td>
           <td>'.$result['zipcode'].'</td>
           <td>'.$result['phone'].'</td>
           <td>'.$result['monday_friday'].'</td>
           <td>  
<button class="btn button-options button-edit" data-toggle="modal" data-target="#footermodal" onclick=editfooterid('.$result['idfooter'].')>
           <i class="fas fa-pen"></i>
           </button>
<button name="" id="delete" class="btn button-danger button-options" onclick=deletefooter('.$result['idfooter'].')>
                 <i class="far fa-trash-alt"></i>
              </button>
           </td>
          </tr>';
}

if (isset($_GET['idfooter'])) {
    $idfooter  = $_GET['idfooter'];
    $results = FooterModel::DeleteFooter($idfooter);
    return $results;
    echo json_encode($results);
}


if(isset($_POST['editid'])) {
    $editid             =   $_POST['editid'];
    $editcity           =   $_POST['editcity'];
    $editstreet         =   $_POST['editstreet'];
    $editzipcode        =   $_POST['editzipcode'];
    $editphone          =   $_POST['editphone'];
    $editfax            =   $_POST['editfax'];
    $editmondayfriday   =   $_POST['editmondayfriday'];
    $editsaturday       =   $_POST['editsaturday'];
    $results = FooterModel::UpdateFooterwithID($editid,$editcity,$editstreet,$editzipcode,$editphone,$editfax,$editmondayfriday,$editsaturday);
    echo json_encode($results);
}

if(isset($_POST['facebook'])){
    $facebook             =   $_POST['facebook'];
    $twitter              =   $_POST['twitter'];
    $instagram            =   $_POST['instagram']; 
    $results = FooterModel::updatesocialmedias($facebook,$twitter,$instagram);
    echo json_encode($results);
}


                  
