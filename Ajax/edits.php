<?php
//Connection with database file 
require_once("../Models/Connection.php");

// all modules
require_once("../Models/HomeModel.php");
require_once("../Models/GalleryModel.php");
require_once("../Models/AboutModel.php");
require_once("../Models/FooterModel.php");
require_once("../Models/AdminModel.php");
/*
====================
EDIT HOME CONTROLLER
====================
*/
if(isset($_POST['editid'])){
	$id = $_POST['editid'];
	$results = HomeModel::EditQuotes($id);
	echo json_encode($results);
}
/*
=======================
EDIT GALLERY CONTROLLER
=======================
*/
if(isset($_POST['editgallery'])){
    $editgallery = $_POST['editgallery'];
    $results = GalleryModel::EditGallery($editgallery);
    echo json_encode($results);
}
/*
=====================
EDIT ABOUT CONTROLLER
=====================
*/
if(isset($_POST['editaboutid'])){
	$id = $_POST['editaboutid'];
	$results = AboutModel::EditAbout($id);
	echo json_encode($results);
}
/*
======================
EDIT FOOTER CONTROLLER
======================
*/
if(isset($_POST['footereditid'])){
	$id = $_POST['footereditid'];
	$results = FooterModel::Editfooterid($id);
	echo json_encode($results);
}
/*
============================
EDIT CLIENT IMAGE CONTROLLER
============================
*/
if(isset($_POST['gettingidofclientimage'])){
	$id = $_POST['gettingidofclientimage'];
	$results = HomeModel::EditClientImage($id);
	echo json_encode($results);
}

if(isset($_POST['editadminid'])){
	$id = $_POST['editadminid'];
	$results = AdminModel::EditAdmin($id);
	echo json_encode($results);	
}
if(isset($_POST['editidgoal'])){
	$id = $_POST['editidgoal'];
	$results = HomeModel::EditGoal($id);
	echo json_encode($results);
}

if(isset($_POST['idimage'])){
	$id = $_post['idimage'];
	$results = HomeImage::Edithome($id);
	echo json_encode($results);
}